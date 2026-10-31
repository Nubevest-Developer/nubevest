<?php
/**
 * Pricing engine and configuration validator for /promotions.
 *
 * The server is authoritative: the browser only sends choices, and every
 * choice is re-validated here against the catalogue. Money is integer cents.
 * A price is returned only for a published, approved tier whose options are
 * all verified; anything else becomes a quote request.
 */

function np_catalog(): array
{
    static $catalog = null;
    return $catalog ??= require __DIR__ . '/catalog.php';
}

/** True when a tier may be shown to customers. */
function np_tier_is_live(array $tier): bool
{
    return ($tier['status'] ?? '') === 'published'
        && !empty($tier['approved_at'])
        && !empty($tier['approved_by'])
        && isset($tier['retail_inc_gst_cents'])
        && is_int($tier['retail_inc_gst_cents'])
        && $tier['retail_inc_gst_cents'] > 0;
}

function np_tier_matches(array $tier, array $choice): bool
{
    foreach ($tier['match'] ?? [] as $key => $value) {
        if (($choice[$key] ?? null) !== $value) {
            return false;
        }
    }
    return true;
}

function np_money(int $cents): string
{
    return number_format($cents / 100, 2, '.', ',');
}

/** GST component of a GST-inclusive amount, rounded half-up to the cent. */
function np_gst_from_inclusive(int $incCents): int
{
    ['num' => $n, 'den' => $d] = np_catalog()['meta']['gst_rate'];
    // inc × n / (d + n), half-up, in integers.
    return intdiv(2 * $incCents * $n + ($d + $n), 2 * ($d + $n));
}

/**
 * Lowest live price for a product (optionally narrowed by a preset such as
 * ['size' => 'a5']). Returns null when nothing is published, which the page
 * renders as "Request a Quote".
 */
function np_from_price(string $productId, array $preset = []): ?array
{
    $product = np_catalog()['products'][$productId] ?? null;
    if (!$product) {
        return null;
    }
    $best = null;
    foreach ($product['price_tiers'] ?? [] as $tier) {
        if (!np_tier_is_live($tier)) {
            continue;
        }
        $conflict = false;
        foreach ($preset as $key => $value) {
            if (isset($tier['match'][$key]) && $tier['match'][$key] !== $value) {
                $conflict = true;
                break;
            }
        }
        if ($conflict || !np_options_verified($product, $tier['match'] ?? [])) {
            continue;
        }
        if ($best === null || $tier['retail_inc_gst_cents'] < $best['retail_inc_gst_cents']) {
            $best = $tier;
        }
    }
    return $best ? ['amount' => np_money($best['retail_inc_gst_cents']), 'qty' => $best['qty']] : null;
}

/** Every chosen option that exists on the product must be verified. */
function np_options_verified(array $product, array $choice): bool
{
    $groups = ['size' => 'sizes', 'stock' => 'stocks', 'finish' => 'finishes', 'sides' => 'sides'];
    foreach ($groups as $key => $group) {
        if (!isset($choice[$key]) || $choice[$key] === '') {
            continue;
        }
        if (empty($product[$group][$choice[$key]]['verified'])) {
            return false;
        }
    }
    return true;
}

/**
 * Catalogue as the browser may see it: labels, structure and verified flags.
 * No price tiers, sources, approvals or supplier costs.
 */
function np_public_catalog(): array
{
    $strip = static fn(array $opts): array => array_map(
        static fn(array $o): array => ['label' => $o['label'], 'verified' => (bool) $o['verified']],
        $opts
    );

    $out = [];
    foreach (np_catalog()['products'] as $id => $p) {
        $pub = [
            'name'       => $p['name'],
            'group'      => $p['group'],
            'kind'       => $p['kind'],
            'phase'      => $p['phase'],
            'quantities' => $p['quantities'] ?? [],
            'moq'        => $p['moq'] ?? null,
            'instant'    => np_from_price($id) !== null,
        ];
        foreach (['sizes', 'stocks', 'finishes', 'sides', 'items'] as $g) {
            if (!empty($p[$g])) {
                $pub[$g] = $strip($p[$g]);
            }
        }
        if (!empty($p['includes'])) {
            $pub['includes'] = $p['includes'];
        }
        if (!empty($p['types'])) {
            foreach ($p['types'] as $tid => $t) {
                $pt = ['label' => $t['label'], 'size_mode' => $t['size_mode'], 'phase' => $t['phase'] ?? 1];
                foreach (['sizes', 'materials', 'stands', 'finishing', 'thickness', 'sides'] as $g) {
                    if (!empty($t[$g])) {
                        $pt[$g] = $strip($t[$g]);
                    }
                }
                if (!empty($t['limits'])) {
                    $pt['limits'] = $t['limits'];
                }
                $pub['types'][$tid] = $pt;
            }
        }
        $out[$id] = $pub;
    }
    return $out;
}

/**
 * Validate a configuration and price it if a live tier exists.
 *
 * @return array{status:string, errors?:array, reason?:string, message?:string, summary?:array, price?:array}
 */
function np_evaluate(array $in): array
{
    $cat      = np_catalog();
    $errors   = [];
    $summary  = [];
    $choice   = [];
    $str      = static fn($v): string => is_scalar($v) ? trim((string) $v) : '';

    $productId = $str($in['product'] ?? '');
    $product   = $cat['products'][$productId] ?? null;
    if (!$product) {
        return ['status' => 'error', 'errors' => ['product' => 'Choose a product.']];
    }
    $summary[] = ['Product', $product['name']];

    // Single-choice option from a group. '' means "recommend for me", unless
    // the group has only one option, which is then selected automatically.
    $pick = static function (string $field, array $group, string $label, bool $required = false)
        use ($in, $str, &$errors, &$summary, &$choice) {
        $value = $str($in[$field] ?? '');
        if ($value === '' && count($group) === 1) {
            $value = (string) array_key_first($group);
        }
        if ($value === '') {
            if ($required) {
                $errors[$field] = 'Choose ' . (preg_match('/^[aeiou]/i', $label) ? 'an ' : 'a ') . strtolower($label) . '.';
            } elseif ($group) {
                $summary[] = [$label, 'Recommend for me'];
            }
            return null;
        }
        if (!isset($group[$value])) {
            $errors[$field] = 'That ' . strtolower($label) . ' isn’t available for this product.';
            return null;
        }
        $choice[$field] = $value;
        $summary[] = [$label, $group[$value]['label'] . ($group[$value]['verified'] ? '' : ' (to be confirmed)')];
        return $value;
    };

    $quoteReason = null;

    switch ($product['kind']) {
        case 'paper':
            $pick('size', $product['sizes'], 'Size', true);
            if (!empty($product['stocks']))   { $pick('stock', $product['stocks'], 'Paper stock'); }
            if (!empty($product['finishes'])) { $pick('finish', $product['finishes'], 'Finish'); }
            if (!empty($product['sides']))    { $pick('sides', $product['sides'], 'Printing sides'); }
            break;

        case 'banner':
            $typeId = $str($in['type'] ?? '');
            $type   = $product['types'][$typeId] ?? null;
            if (!$type) {
                $errors['type'] = 'Choose a banner or sign type.';
                break;
            }
            $choice['type'] = $typeId;
            $onRequest = ($type['phase'] ?? 1) > 1;
            $summary[] = ['Type', $type['label'] . ($onRequest ? ' (on request)' : '')];

            if ($type['size_mode'] === 'preset') {
                $pick('size', $type['sizes'], 'Size', true);
                foreach (['width', 'height'] as $f) {
                    if ($str($in[$f] ?? '') !== '') {
                        $errors[$f] = ucfirst($type['plural']) . ' come in set sizes. Choose one from the list.';
                    }
                }
            } else {
                $lim = $type['limits'];
                $w = filter_var($in['width'] ?? null, FILTER_VALIDATE_INT);
                $h = filter_var($in['height'] ?? null, FILTER_VALIDATE_INT);
                if ($w === false) {
                    $errors['width'] = 'Enter the width in whole millimetres.';
                } elseif ($w < $lim['min_w'] || $w > $lim['max_w']) {
                    $errors['width'] = sprintf('Width must be between %s and %s mm. For larger sizes, call us on 1300 959 514.', number_format($lim['min_w']), number_format($lim['max_w']));
                }
                if ($h === false) {
                    $errors['height'] = 'Enter the height in whole millimetres.';
                } elseif ($h < $lim['min_h'] || $h > $lim['max_h']) {
                    $errors['height'] = sprintf('Height must be between %s and %s mm. For larger sizes, call us on 1300 959 514.', number_format($lim['min_h']), number_format($lim['max_h']));
                }
                if (!isset($errors['width']) && !isset($errors['height'])) {
                    if (max($w, $h) / min($w, $h) > $lim['max_aspect']) {
                        $errors['height'] = sprintf('That shape is too long and narrow (more than %d:1). Adjust the width or height.', $lim['max_aspect']);
                    }
                }
                if (!isset($errors['width']) && !isset($errors['height'])) {
                    $choice['width'] = $w;
                    $choice['height'] = $h;
                    $area = $w * $h / 1000000;
                    $summary[] = ['Size', sprintf('%s × %s mm (%s m²)', number_format($w), number_format($h), rtrim(rtrim(number_format($area, 2), '0'), '.'))];
                    $quoteReason = 'custom_size';
                }
            }

            if (!empty($type['materials'])) { $pick('material', $type['materials'], 'Material'); }
            if (!empty($type['thickness'])) { $pick('thickness', $type['thickness'], 'Thickness'); }
            if (!empty($type['stands']))    { $pick('stand', $type['stands'], 'Stand'); }
            if (!empty($type['sides']))     { $pick('sides', $type['sides'], 'Printing sides'); }

            $finishing = $in['finishing'] ?? [];
            if (!is_array($finishing)) {
                $finishing = [$finishing];
            }
            $chosen = [];
            foreach ($finishing as $f) {
                $f = $str($f);
                if ($f === '') {
                    continue;
                }
                if (!isset($type['finishing'][$f])) {
                    $errors['finishing'] = 'That finishing option isn’t available for ' . $type['plural'] . '.';
                    continue;
                }
                $chosen[] = $type['finishing'][$f]['label'];
            }
            // Reject options that belong to other banner types.
            foreach (['stand' => 'stands', 'thickness' => 'thickness'] as $field => $group) {
                if ($str($in[$field] ?? '') !== '' && empty($type[$group])) {
                    $errors[$field] = ucfirst($field) . ' doesn’t apply to ' . $type['plural'] . '.';
                }
            }
            if ($chosen) {
                $summary[] = ['Finishing', implode(', ', $chosen) . ' (to be confirmed)'];
            }
            // Expanded signage (Phase 2) is quoted on request, subject to supplier availability.
            if ($onRequest) {
                $quoteReason = 'on_request';
            }
            break;

        case 'merch':
            $pick('item', $product['items'], 'Item', true);
            $quoteReason = 'quote_only';
            break;

        case 'package':
            $summary[] = ['Includes', implode(', ', $product['includes'])];
            $quoteReason = 'quote_only';
            break;
    }

    // Quantity: a listed preset, or a custom amount (always quoted).
    $qtyRaw = $str($in['quantity'] ?? '');
    if ($product['kind'] !== 'package') {
        if ($qtyRaw === 'custom' || empty($product['quantities'])) {
            $q = filter_var($in['quantity_custom'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100000]]);
            if ($q === false) {
                $errors['quantity_custom'] = 'Enter a quantity between 1 and 100,000.';
            } elseif (!empty($product['moq']) && $q < $product['moq']) {
                $errors['quantity_custom'] = 'The minimum order for this product is ' . number_format($product['moq']) . '.';
            } else {
                $choice['qty'] = $q;
                $summary[] = ['Quantity', number_format($q)];
                $quoteReason ??= 'custom_quantity';
            }
        } else {
            $q = filter_var($qtyRaw, FILTER_VALIDATE_INT);
            if ($q === false || !in_array($q, $product['quantities'], true)) {
                $errors['quantity'] = 'Choose a quantity.';
            } else {
                $choice['qty'] = $q;
                $summary[] = ['Quantity', number_format($q)];
            }
        }
    }

    // Artwork.
    $artwork = ['print-ready' => 'I have print-ready artwork', 'design-help' => 'I need design help', 'unsure' => 'Not sure yet'];
    $art = $str($in['artwork'] ?? '');
    if (!isset($artwork[$art])) {
        $errors['artwork'] = 'Tell us about your artwork.';
    } else {
        $summary[] = ['Artwork', $artwork[$art]];
    }

    // Delivery postcode: required for large format (freight), optional otherwise.
    $postcode = $str($in['postcode'] ?? '');
    if ($postcode === '') {
        if ($product['kind'] === 'banner') {
            $errors['postcode'] = 'Enter a delivery postcode so we can quote freight for large items.';
        }
    } elseif (!preg_match('/^(0[289]\d{2}|[1-9]\d{3})$/', $postcode)) {
        $errors['postcode'] = 'Enter a valid 4-digit Australian postcode.';
    } else {
        $summary[] = ['Delivery postcode', $postcode];
    }

    if ($errors) {
        return ['status' => 'error', 'errors' => $errors];
    }

    // Price only when a live, fully verified tier matches exactly.
    if ($quoteReason === null) {
        foreach ($product['price_tiers'] ?? [] as $tier) {
            if (np_tier_is_live($tier)
                && $tier['qty'] === ($choice['qty'] ?? null)
                && np_tier_matches($tier, $choice)
                && np_options_verified($product, $choice)) {
                $inc = $tier['retail_inc_gst_cents'];
                return [
                    'status'  => 'priced',
                    'summary' => $summary,
                    'price'   => [
                        'currency'      => $cat['meta']['currency'],
                        'total_inc_gst' => np_money($inc),
                        'gst'           => np_money(np_gst_from_inclusive($inc)),
                        'note'          => 'Price includes GST. Delivery is calculated at checkout.',
                    ],
                ];
            }
        }
        $quoteReason = 'no_published_price';
    }

    $messages = [
        'custom_size'        => 'Custom sizes are quoted individually so we can confirm materials, finishing and freight.',
        'custom_quantity'    => 'Custom quantities are quoted individually.',
        'quote_only'         => 'This is quoted to your brief, so we’ll prepare a tailored quote.',
        'on_request'         => 'Expanded signage is quoted on request, subject to supplier availability.',
        'no_published_price' => 'Online pricing for this option isn’t available yet, so we’ll prepare a tailored quote.',
    ];

    return [
        'status'  => 'quote_required',
        'reason'  => $quoteReason,
        'message' => $messages[$quoteReason],
        'summary' => $summary,
    ];
}
