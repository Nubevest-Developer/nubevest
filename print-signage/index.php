<?php
declare(strict_types=1);

require __DIR__ . '/lib/config.php';
require __DIR__ . '/lib/pricing.php';

$catalog   = np_catalog();
$products  = $catalog['products'];

// Read by includes/header.php and includes/footer.php.
$page       = 'promotions';
$seo_title  = 'Print &amp; Signage: Printing &amp; Promotional Products | Nubevest';
$meta_desc  = 'Business cards, flyers, brochures, postcards, banners and promotional products for Australian businesses and events. Choose your options and get a price or a tailored quote.';
$canonical  = 'https://nubevest.com.au/print-signage/';
$og_image   = 'https://nubevest.com.au/assets/images/promotions/other-print-items-multi.webp';
$body_class = 'np-page';
$header_cta = ['label' => 'Get a Quote', 'href' => '#price-calculator', 'attrs' => 'data-quote-open'];
$footer_cta = false; // the page ends with its own CTA band

/**
 * Product image inside an art-directed frame. Crops come from the catalogue.
 * $sizes is kept for when responsive variants (srcset) are generated.
 */
function np_media(array $img, string $class = '', bool $lazy = true, string $sizes = '100vw'): string
{
    $style = sprintf('--pos:%s;--zoom:%s', $img['pos'], rtrim(rtrim(number_format($img['zoom'], 2, '.', ''), '0'), '.'));
    return sprintf(
        '<div class="np-media %s" style="%s"><img src="%s" alt="%s" width="%d" height="%d"%s decoding="async"></div>',
        nv_e($class), nv_e($style), nv_e(nv_asset($img['src'])), nv_e($img['alt']), $img['w'], $img['h'],
        $lazy ? ' loading="lazy"' : ' fetchpriority="high"'
    );
}

/** Link target for a category: its own page once live, otherwise the calculator pre-filled. */
function np_category_link(array $cat): array
{
    if ($cat['page_live']) {
        return ['href' => nv_printing($cat['page']), 'data' => ''];
    }
    return [
        'href' => '#price-calculator',
        'data' => ' data-configure="' . nv_e(json_encode(['product' => $cat['product']])) . '" data-category-page="' . nv_e($cat['page']) . '"',
    ];
}

/** Section label: "01 — Shop by category". */
function np_label(string $no, string $text): string
{
    return '<p class="np-label-sec"><span class="np-label-sec__no">' . nv_e($no) . '</span><span>' . nv_e($text) . '</span></p>';
}

/**
 * Spec rows for a featured product. Uses the specification wording from the
 * catalogue (Developer Specification §3) when given, otherwise format plus
 * verified options only.
 */
function np_specs(array $product, array $preset, array $specs = []): array
{
    if ($specs) {
        if (!empty($product['moq'])) {
            $specs['Min. order'] = number_format($product['moq']);
        }
        return $specs;
    }
    $rows = [];
    if (isset($preset['size'], $product['sizes'][$preset['size']])) {
        $rows['Format'] = $product['sizes'][$preset['size']]['label'];
    }
    foreach (['stocks' => 'Stock', 'finishes' => 'Finish', 'sides' => 'Sides'] as $g => $label) {
        $ok = array_filter($product[$g] ?? [], static fn($o) => $o['verified']);
        if ($ok) {
            $rows[$label] = implode(', ', array_column($ok, 'label'));
        }
    }
    if (count($rows) <= (isset($rows['Format']) ? 1 : 0)) {
        $rows['Options'] = 'Confirmed in your quote';
    }
    if (!empty($product['moq'])) {
        $rows['Min. order'] = number_format($product['moq']);
    }
    return $rows;
}

$copy = NV_CHECKOUT_LIVE
    ? ['ordering' => 'Simple online ordering', 'ordering_title' => 'Simple Online Ordering', 'ordering_body' => 'Clear product options and a straightforward order process.']
    : ['ordering' => 'Simple online quotes', 'ordering_title' => 'Simple Online Quotes', 'ordering_body' => 'Clear product options and a straightforward quote process, with checkout coming soon.'];

$icon = [
    'arrow' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'ne'    => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'check' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12.5l4.2 4.2L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'reg'   => '<svg class="np-reg" width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="6.5" stroke="currentColor" stroke-width="1.6"/><path d="M12 1.5v21M1.5 12h21" stroke="currentColor" stroke-width="1.6"/></svg>',
];

$colourbar = '<div class="np-colourbar" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>';

ob_start(); ?>
  <meta property="og:url" content="<?= nv_e($canonical) ?>">
  <link rel="preload" as="image" href="<?= nv_e(nv_asset('/assets/images/promotions/other-print-items-multi.webp')) ?>" fetchpriority="high">
  <link rel="stylesheet" href="<?= nv_e(nv_asset('/assets/css/printing.css')) ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[
    {"@type":"ListItem","position":1,"name":"Home","item":"https://nubevest.com.au/"},
    {"@type":"ListItem","position":2,"name":"Print & Signage","item":"<?= nv_e($canonical) ?>"}
  ]}
  </script>
<?php
$extra_head = ob_get_clean();

include __DIR__ . '/../includes/header.php';
?>

<main id="main">

  <!-- ================================ HERO ================================ -->
  <section class="np-hero" aria-labelledby="np-hero-title">
    <div class="np-wrap np-hero__grid">
      <div class="np-hero__copy">
        <p class="np-mono np-hero__eyebrow"><?= $icon['reg'] ?>Nubevest Print &amp; Promotional Products</p>
        <h1 id="np-hero-title" class="np-hero__title">Bring Your Brand <span class="np-hero__accent">to Life.</span></h1>
        <p class="np-hero__lead">High-quality printing and promotional products to help your business stand out. From business cards to banners, we make it easy to create, customise and order print products for your business and events.</p>
        <div class="np-hero__actions">
          <a href="#price-calculator" class="btn btn--primary np-btn">Calculate Your Price <?= $icon['arrow'] ?></a>
          <a href="#products" class="btn btn--secondary np-btn">Explore Products</a>
        </div>
        <ul class="np-hero__trust" aria-label="Why print with Nubevest">
          <li><span class="np-mono">01</span>Quality-focused printing</li>
          <li><span class="np-mono">02</span><?= nv_e($copy['ordering']) ?></li>
          <li><span class="np-mono">03</span>Delivery quoted to your postcode</li>
        </ul>
      </div>

      <figure class="np-hero__figure">
        <div class="np-hero__frame">
          <?= np_media(['src' => '/assets/images/promotions/other-print-items-multi.webp', 'w' => 1672, 'h' => 941, 'alt' => 'Print suite on a bright studio surface: business cards, an A4 poster, a pull-up banner, a postcard and stickers in a range of brand colours', 'pos' => '46% 50%', 'zoom' => 1.0], 'np-hero__media', false) ?>
          <span class="np-crop np-crop--tl" aria-hidden="true"></span>
          <span class="np-crop np-crop--bl" aria-hidden="true"></span>
        </div>
        <div class="np-hero__inset">
          <?= np_media(['src' => '/assets/images/promotions/tshirt-trio-multi.webp', 'w' => 1774, 'h' => 887, 'alt' => 'Branded T-shirts in white, purple and dark green', 'pos' => '64% 52%', 'zoom' => 1.55], '', false) ?>
        </div>
        <figcaption class="np-mono np-hero__caption"><span>Fig. 01</span> Cards, posters, banners and apparel in one brand</figcaption>
      </figure>
    </div>
    <div class="np-wrap np-hero__base"><?= $colourbar ?><p class="np-mono">Business cards · Flyers · Folded brochures · Postcards · Banners &amp; signage · Merchandise</p></div>
  </section>

  <!-- ============================ 01 CATEGORIES =========================== -->
  <section class="np-sec" id="products" aria-labelledby="np-cats-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('01', 'Shop by category') ?>
        <h2 id="np-cats-title" class="np-h2">Everything Your Brand Needs</h2>
        <p class="np-sec__lead">Explore our range of print and promotional products for everyday business, marketing campaigns and events.</p>
      </header>

      <ul class="np-index" role="list">
        <?php $i = 0; foreach ($catalog['categories'] as $cat): $link = np_category_link($cat); $i++; ?>
        <li class="np-index__cell np-tone--<?= nv_e($cat['tone'] ?? 'blue') ?> reveal" style="--d:<?= $i - 1 ?>">
          <a class="np-index__link" href="<?= nv_e($link['href']) ?>"<?= $link['data'] ?>>
            <span class="np-index__top">
              <span class="np-mono"><?= sprintf('%02d', $i) ?></span>
              <?php if ($cat['phase'] > 1): ?><span class="np-mono np-index__tag">Quoted on request</span><?php endif; ?>
              <span class="np-index__arrow"><?= $icon['ne'] ?></span>
            </span>
            <?= np_media($cat['image'], 'np-index__media') ?>
            <span class="np-index__name"><?= nv_e($cat['name']) ?></span>
            <span class="np-index__blurb"><?= nv_e($cat['blurb']) ?></span>
            <span class="np-index__more"><?= nv_e($cat['cta']) ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- ======================= 02 RANGE AND SPECIFICATIONS ===================== -->
  <section class="np-sec np-sec--tint" id="range" aria-labelledby="np-range-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('02', 'Range and specifications') ?>
        <h2 id="np-range-title" class="np-h2">The range, specified.</h2>
        <p class="np-sec__lead">Every size, material, finish, print side and quantity is checked against supplier availability before you order. Not every product supports every option, including double-sided printing.</p>
      </header>

      <div class="np-range reveal" role="table" aria-label="Product range and specifications">
        <div class="np-range__row np-range__row--head np-mono" role="row">
          <span role="columnheader">No.</span>
          <span role="columnheader">Range</span>
          <span role="columnheader">Specification</span>
          <span role="columnheader">Availability</span>
          <span role="columnheader"><span class="np-sr">Action</span></span>
        </div>
        <?php foreach ($catalog['range'] as $n => $r): ?>
        <div class="np-range__row" role="row">
          <span class="np-mono np-range__no" role="cell"><?= sprintf('%02d', $n + 1) ?></span>
          <span class="np-range__name" role="rowheader"><?= nv_e($r['name']) ?></span>
          <span class="np-range__spec" role="cell"><?php foreach ($r['spec'] as $s): ?><span><?= nv_e($s) ?></span><?php endforeach; ?></span>
          <span role="cell"><span class="np-mono np-avail <?= $r['phase'] > 1 ? 'np-avail--later' : '' ?>"><?= $r['phase'] > 1 ? 'On request' : 'Launch range' ?></span></span>
          <span role="cell"><a href="#price-calculator" class="np-range__go" data-configure="<?= nv_e(json_encode($r['configure'])) ?>"><?= $r['phase'] > 1 ? 'Request a quote' : 'Configure' ?> <?= $icon['arrow'] ?></a></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================= 03 POPULAR ============================= -->
  <section class="np-sec" id="popular" aria-labelledby="np-popular-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('03', 'Popular') ?>
        <h2 id="np-popular-title" class="np-h2">Popular Printing Products</h2>
        <p class="np-sec__lead">Quality print essentials for businesses, brands and events.</p>
      </header>

      <?php foreach ($catalog['featured'] as $n => $f):
          $p         = $products[$f['product']];
          $from      = np_from_price($f['product'], $f['preset']);
          $specs     = np_specs($p, $f['preset'], $f['specs'] ?? []);
          $configure = nv_e(json_encode(['product' => $f['product']] + $f['preset']));
          $no        = sprintf('No. %02d', $n + 1);
          if ($n === 1): ?><div class="np-shelf"><?php endif; ?>

      <article class="<?= $n === 0 ? 'np-feature' : 'np-item' ?> reveal" style="--d:<?= max(0, $n - 1) ?>">
        <?= np_media($f['image'], $n === 0 ? 'np-feature__media' : 'np-item__media') ?>
        <div class="<?= $n === 0 ? 'np-feature__body' : 'np-item__body' ?>">
          <p class="np-mono np-item__no"><?= nv_e($no) ?><?= $n === 0 ? ' <span>— Featured</span>' : '' ?></p>
          <h3 class="<?= $n === 0 ? 'np-feature__title' : 'np-item__title' ?>"><?= nv_e($f['title']) ?></h3>
          <p class="np-item__summary"><?= nv_e($f['summary']) ?></p>
          <dl class="np-spec">
            <?php foreach ($specs as $label => $value): ?><div><dt><?= nv_e($label) ?></dt><dd><?= nv_e($value) ?></dd></div><?php endforeach; ?>
            <div class="np-spec__price"><dt>Pricing</dt><dd><?= $from ? 'From $' . nv_e($from['amount']) . ' inc. GST' : 'Tailored quote' ?></dd></div>
          </dl>
          <a href="#price-calculator" class="<?= $n === 0 ? 'btn btn--primary np-btn' : 'np-item__btn' ?>" data-configure="<?= $configure ?>"><?= $from ? 'Calculate Your Price' : 'Request a Quote' ?><?= $n === 0 ? ' ' . $icon['arrow'] : '' ?></a>
        </div>
      </article>

      <?php endforeach; ?></div>
    </div>
  </section>

  <!-- ========================== 03 PRICE CALCULATOR ======================= -->
  <section class="np-sec np-sec--tint" id="price-calculator" aria-labelledby="np-calc-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('04', 'Price calculator') ?>
        <h2 id="np-calc-title" class="np-h2">Get the Right Print for Your Business</h2>
        <p class="np-sec__lead">Choose your product and options to view an available price or request a tailored quote.</p>
      </header>

      <div class="np-calc reveal">
        <form class="np-calc__form" id="np-config" novalidate aria-describedby="np-calc-help">
          <p id="np-calc-help" class="np-sr">Fields update to show only the options that apply to the product you choose.</p>
          <div class="np-errsum" id="np-errsum" role="alert" tabindex="-1" hidden></div>

          <div class="np-step">
            <p class="np-mono np-step__label"><span>Step 01</span> Product</p>
            <div class="np-field">
              <label class="np-label np-sr" for="np-product">Product</label>
              <div class="np-select np-select--lg">
                <select id="np-product" name="product" required aria-describedby="np-product-err">
                  <option value="">Choose a product</option>
                  <?php $groups = [];
                  foreach ($products as $id => $p) { $groups[$p['group']][$id] = $p; }
                  foreach ($groups as $g => $items): ?>
                  <optgroup label="<?= nv_e($g) ?>">
                    <?php foreach ($items as $id => $p): ?><option value="<?= nv_e($id) ?>"><?= nv_e($p['name']) ?></option><?php endforeach; ?>
                  </optgroup>
                  <?php endforeach; ?>
                </select>
              </div>
              <p class="np-err" id="np-product-err"></p>
            </div>
            <div class="np-quickpick" role="group" aria-label="Popular choices">
              <?php foreach (['business-cards' => 'Business cards', 'flyers' => 'Flyers', 'brochures' => 'Brochures', 'postcards' => 'Postcards', 'banners' => 'Banners', 'promotional-products' => 'Merchandise', 'package-expo-exhibitor' => 'Expo pack'] as $id => $label): ?>
              <button type="button" class="np-quickpick__btn" data-pick="<?= nv_e($id) ?>" aria-pressed="false"><?= nv_e($label) ?></button>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="np-step" data-step="options" hidden>
            <p class="np-mono np-step__label"><span>Step 02</span> Options</p>
            <div id="np-options" class="np-options"></div>
            <p class="np-hint np-hint--tbc" id="np-tbc-hint" hidden>
              <?= $icon['reg'] ?>
              Options marked “to be confirmed” are recorded as your preference. We confirm availability before quoting.
            </p>
          </div>

          <div class="np-step" data-step="details" hidden>
            <p class="np-mono np-step__label"><span>Step 03</span> Quantity and delivery</p>
            <div id="np-qty" class="np-field"></div>

            <fieldset class="np-field">
              <legend class="np-label">Artwork</legend>
              <div class="np-cards3" role="radiogroup" aria-describedby="np-artwork-err">
                <label class="np-radio-card"><input type="radio" name="artwork" value="print-ready"><span><strong>Print-ready</strong><small>I have finished artwork</small></span></label>
                <label class="np-radio-card"><input type="radio" name="artwork" value="design-help"><span><strong>Design help</strong><small>I need artwork created or adjusted</small></span></label>
                <label class="np-radio-card"><input type="radio" name="artwork" value="unsure"><span><strong>Not sure yet</strong><small>Talk me through it</small></span></label>
              </div>
              <p class="np-err" id="np-artwork-err"></p>
            </fieldset>

            <div class="np-field np-field--narrow">
              <label class="np-label" for="np-postcode">Delivery postcode <span class="np-label__opt" id="np-postcode-opt">(optional)</span></label>
              <input class="np-input" type="text" id="np-postcode" name="postcode" inputmode="numeric" autocomplete="postal-code" maxlength="4" placeholder="3000" aria-describedby="np-postcode-hint np-postcode-err">
              <p class="np-hint" id="np-postcode-hint">Used to quote delivery to your area.</p>
              <p class="np-err" id="np-postcode-err"></p>
            </div>
          </div>

          <div class="np-calc__actions">
            <button type="submit" class="btn btn--primary np-btn" id="np-calc-btn">
              <span class="np-btn__spinner" aria-hidden="true"></span>
              <span class="np-btn__label">Calculate Your Price</span>
            </button>
            <button type="button" class="btn btn--secondary np-btn" data-quote-open>Request a Custom Quote</button>
          </div>
        </form>

        <aside class="np-ticket" aria-labelledby="np-summary-title">
          <div class="np-ticket__paper" id="np-summary" data-state="idle" aria-live="polite">
            <div class="np-ticket__head np-mono"><span>Job ticket</span><span>Nubevest Print</span></div>
            <h3 class="np-ticket__title" id="np-summary-title">Choose a product to start</h3>
            <ol class="np-ticket__idle" id="np-summary-idle">
              <li><strong>Choose your options.</strong> Only the options that apply to your product are shown.</li>
              <li><strong>See your itemised price.</strong> Where supplier pricing is approved, you’ll see it instantly in AUD, including GST.</li>
              <li><strong>Or get a tailored quote.</strong> Unusual sizes, custom quantities and packages are quoted by our team, with no payment until you approve.</li>
            </ol>
            <dl class="np-ticket__list" id="np-summary-list"></dl>
            <div class="np-ticket__result" id="np-result"></div>
          </div>
          <p class="np-ticket__note">Prices are in AUD and include GST where it applies. They’re only shown for options with approved supplier pricing; everything else is quoted individually. Delivery is calculated for your postcode, and oversized items are quoted with freight. There’s no obligation to order.</p>
        </aside>
      </div>

      <!-- Quote request (posts to the existing Nubevest contact handler) -->
      <div class="np-quote" id="np-quote" hidden>
        <div class="np-quote__inner">
          <div class="np-quote__intro">
            <p class="np-mono np-step__label"><span>Step 04</span> Request a quote</p>
            <h3 class="np-quote__title" id="np-quote-title" tabindex="-1">Tell us where to send your quote</h3>
            <p class="np-quote__lead" id="np-quote-lead">We’ll review your selection and reply with a tailored quote. There’s no obligation to order.</p>
            <dl class="np-ticket__list np-quote__summary" id="np-quote-summary"></dl>
          </div>

          <form class="np-quote__form" id="np-quote-form" action="<?= nv_e(NV_QUOTE_ENDPOINT) ?>" method="POST" novalidate data-recaptcha-key="<?= nv_e(NV_RECAPTCHA_KEY) ?>" data-recaptcha-action="contact_submit">
            <input type="text" name="website" value="" tabindex="-1" autocomplete="off" class="np-hp" aria-hidden="true">
            <input type="hidden" name="g-recaptcha-response" value="">
            <input type="hidden" name="service" value="<?= nv_e(NV_QUOTE_SERVICE) ?>">
            <input type="hidden" name="business_type" value="">
            <input type="hidden" name="timing" value="">
            <input type="hidden" name="message" value="">
            <input type="hidden" name="desired_result" value="">

            <div class="np-alert" id="np-quote-alert" role="alert" hidden></div>

            <div class="np-quote__grid">
              <div class="np-field">
                <label class="np-label" for="q-name">Your name</label>
                <input class="np-input" id="q-name" name="name" type="text" autocomplete="name" required aria-describedby="q-name-err">
                <p class="np-err" id="q-name-err"></p>
              </div>
              <div class="np-field">
                <label class="np-label" for="q-business">Business name <span class="np-label__opt">(optional)</span></label>
                <input class="np-input" id="q-business" name="business" type="text" autocomplete="organization">
              </div>
              <div class="np-field">
                <label class="np-label" for="q-email">Email</label>
                <input class="np-input" id="q-email" name="email" type="email" autocomplete="email" required aria-describedby="q-email-err">
                <p class="np-err" id="q-email-err"></p>
              </div>
              <div class="np-field">
                <label class="np-label" for="q-phone">Phone <span class="np-label__opt">(optional)</span></label>
                <input class="np-input" id="q-phone" name="phone" type="tel" autocomplete="tel" placeholder="04xx xxx xxx">
              </div>
              <div class="np-field">
                <label class="np-label" for="q-needed">Needed by <span class="np-label__opt">(optional)</span></label>
                <input class="np-input" id="q-needed" type="date">
              </div>
              <div class="np-field np-field--full">
                <label class="np-label" for="q-notes">Anything else we should know? <span class="np-label__opt" id="q-notes-opt">(optional)</span></label>
                <textarea class="np-input np-textarea" id="q-notes" rows="4" placeholder="Event name, colours, quantities for each item, artwork questions…" aria-describedby="q-notes-err"></textarea>
                <p class="np-err" id="q-notes-err"></p>
              </div>
              <div class="np-field np-field--full">
                <label class="np-check"><input type="checkbox" name="consent" id="q-consent" required aria-describedby="q-consent-err"><span>I consent to Nubevest using this information to respond to my quote request, in line with the <a href="<?= nv_e(nv_site('/privacy-policy.php')) ?>">Privacy Policy</a>.</span></label>
                <p class="np-err" id="q-consent-err"></p>
                <label class="np-check"><input type="checkbox" name="marketing_consent"><span>Optional: send me occasional useful updates from Nubevest (unsubscribe anytime).</span></label>
              </div>
            </div>

            <div class="np-quote__actions">
              <button type="submit" class="btn btn--primary np-btn" id="np-quote-btn">
                <span class="np-btn__spinner" aria-hidden="true"></span>
                <span class="np-btn__label">Send Quote Request</span>
              </button>
              <?php if (NV_RECAPTCHA_KEY !== ''): ?>
              <p class="np-fine">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Terms of Service</a> apply.</p>
              <?php endif; ?>
            </div>
          </form>

          <div class="np-quote__done" id="np-quote-done" hidden tabindex="-1">
            <span class="np-quote__done-ico" aria-hidden="true"><?= $icon['check'] ?></span>
            <h3 class="np-quote__title">Quote request sent</h3>
            <p>Thanks. We’ve received your request and will reply by email. If it’s urgent, call us on <a href="tel:1300959514">1300 959 514</a>.</p>
            <button type="button" class="btn btn--secondary np-btn" id="np-quote-again">Start another quote</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================= 04 PACKAGES ============================ -->
  <section class="np-sec" id="packages" aria-labelledby="np-packs-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('05', 'Packages') ?>
        <h2 id="np-packs-title" class="np-h2">Business and Event Printing Packages</h2>
        <p class="np-sec__lead">Grouped essentials for launches, expos and events, quoted together so every piece shares one brand. Package totals are built from the approved prices of the products inside.</p>
      </header>

      <div class="np-packs">
        <?php foreach ($catalog['packages'] as $n => $pk): $p = $products[$pk['product']]; ?>
        <article class="np-pack <?= !empty($pk['featured']) ? 'np-pack--featured' : '' ?> reveal" style="--d:<?= $n ?>">
          <?= np_media($pk['image'], 'np-pack__media') ?>
          <div class="np-pack__body">
            <p class="np-mono np-pack__no">Pack <?= chr(65 + $n) ?> <span>— <?= nv_e($pk['kicker']) ?></span></p>
            <h3 class="np-pack__title"><?= nv_e($p['name']) ?></h3>
            <p class="np-pack__summary"><?= nv_e($pk['summary']) ?></p>
            <ol class="np-pack__list">
              <?php foreach ($p['includes'] as $k => $inc): ?><li><span class="np-mono"><?= sprintf('%02d', $k + 1) ?></span><?= nv_e($inc) ?></li><?php endforeach; ?>
            </ol>
            <?php if (!empty($pk['note'])): ?><p class="np-mono np-pack__note"><?= nv_e($pk['note']) ?></p><?php endif; ?>
            <div class="np-pack__foot">
              <p class="np-pack__price"><span class="np-mono">Pricing</span> Request a Quote</p>
              <a href="#price-calculator" class="btn <?= !empty($pk['featured']) ? 'btn--primary' : 'btn--secondary' ?> np-btn np-btn--block" data-configure="<?= nv_e(json_encode(['product' => $pk['product']])) ?>">Build Your Package</a>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================== 05 WHY ================================ -->
  <section class="np-why" id="why" aria-labelledby="np-why-title">
    <div class="np-why__band">
      <?= np_media(['src' => '/assets/images/promotions/kit-showcase-multi.webp', 'w' => 1536, 'h' => 1024, 'alt' => 'Finished branded materials on a studio surface: tote bag, notebook, drink bottle, mug, cap, presentation box, T-shirt, pen and USB drive', 'pos' => '50% 46%', 'zoom' => 1.0], 'np-why__media') ?>
      <span class="np-crop np-crop--tl" aria-hidden="true"></span>
      <span class="np-crop np-crop--tr" aria-hidden="true"></span>
    </div>
    <div class="np-wrap">
      <div class="np-why__panel reveal">
        <?= np_label('06', 'Why Nubevest') ?>
        <h2 id="np-why-title" class="np-h2">Quality Printing. Real Support.</h2>
        <p class="np-sec__lead">From choosing the right product to preparing your artwork and organising delivery, we make the printing process straightforward.</p>
      </div>
      <ul class="np-benefits" role="list">
        <?php
        $benefits = [
            ['Quality-Focused Products', 'Carefully selected print materials and finishes.', '<path d="M12 3l2.6 5.3 5.8.8-4.2 4.1 1 5.8L12 16.3 6.8 19l1-5.8L3.6 9.1l5.8-.8z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>'],
            [$copy['ordering_title'], $copy['ordering_body'], '<rect x="4" y="3" width="16" height="18" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M8 8h8M8 12h8M8 16h5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>'],
            ['Support When You Need It', 'Help with product selection and artwork requirements.', '<path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>'],
            ['Solutions for Every Occasion', 'Business marketing, exhibitions, promotions and events.', '<rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M3 10h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>'],
        ];
        foreach ($benefits as $n => [$title, $body, $path]): ?>
        <li class="np-benefit reveal" style="--d:<?= $n ?>">
          <span class="np-benefit__top"><span class="np-mono"><?= sprintf('%02d', $n + 1) ?></span><svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><?= $path ?></svg></span>
          <h3><?= nv_e($title) ?></h3>
          <p><?= nv_e($body) ?></p>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- =========================== 06 HOW IT WORKS ========================== -->
  <section class="np-sec np-sec--tint" id="how-it-works" aria-labelledby="np-how-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('07', 'How it works') ?>
        <h2 id="np-how-title" class="np-h2">From idea to printed, in four steps</h2>
      </header>
      <ol class="np-steps">
        <?php
        $steps = [
            ['Choose Your Product', 'Explore the available products and select suitable options.'],
            ['Upload Your Artwork', 'Supply print-ready artwork or request design assistance.'],
            ['Confirm Your Price', 'Review the verified price or receive a tailored quotation.'],
            ['Place Your Order', 'Complete checkout when pricing is approved, or proceed with the quote process.'],
        ];
        foreach ($steps as $n => [$title, $body]): ?>
        <li class="np-steps__item reveal" style="--d:<?= $n ?>">
          <span class="np-steps__node" aria-hidden="true"><?= $icon['reg'] ?></span>
          <span class="np-steps__num" aria-hidden="true"><?= sprintf('%02d', $n + 1) ?></span>
          <h3><span class="np-sr">Step <?= $n + 1 ?>: </span><?= nv_e($title) ?></h3>
          <p><?= nv_e($body) ?></p>
        </li>
        <?php endforeach; ?>
      </ol>

      <div class="np-track reveal">
        <div class="np-track__intro">
          <p class="np-mono np-track__label">After you order</p>
          <p class="np-track__text">Each order moves through these stages, and we email you as it does. Unusual sizes and custom requirements are quoted first, with no payment until you approve.</p>
        </div>
        <ol class="np-track__stages">
          <?php foreach (['Quote or payment', 'Artwork review', 'Proof approval, if required', 'Production', 'Dispatched', 'Delivered'] as $k => $stage): ?>
          <li><span class="np-mono"><?= sprintf('%02d', $k + 1) ?></span><?= nv_e($stage) ?></li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>
  </section>

  <!-- ======================== 08 ARTWORK AND SUPPORT ====================== -->
  <section class="np-sec" id="artwork" aria-labelledby="np-trust-title">
    <div class="np-wrap">
      <header class="np-sec__head reveal">
        <?= np_label('08', 'Artwork and support') ?>
        <h2 id="np-trust-title" class="np-h2">Print-ready, with a person checking.</h2>
        <p class="np-sec__lead">Every file is reviewed by our team before it goes to print; automated checks never have the final say. If we adjust your artwork or design it for you, we’ll send a proof for your approval first.</p>
      </header>

      <div class="np-proof reveal">
        <div class="np-proof__sheet" aria-hidden="true">
          <div class="np-sheet">
            <span class="np-sheet__bleed"></span>
            <span class="np-sheet__trim"><span class="np-sheet__logo">Your brand</span></span>
            <span class="np-sheet__safe"></span>
            <span class="np-crop np-crop--tl"></span><span class="np-crop np-crop--tr"></span>
            <span class="np-crop np-crop--bl"></span><span class="np-crop np-crop--br"></span>
          </div>
          <ul class="np-sheet__legend np-mono">
            <li><span class="np-key np-key--bleed"></span>Bleed</li>
            <li><span class="np-key np-key--trim"></span>Trim</li>
            <li><span class="np-key np-key--safe"></span>Safe area</li>
          </ul>
        </div>
        <div class="np-proof__list">
          <h3 class="np-proof__title">Before you send artwork</h3>
          <ol>
            <li><span class="np-mono">01</span><span><strong>File type.</strong> PDF, PNG or JPG. A print-ready PDF usually gives the best result.</span></li>
            <li><span class="np-mono">02</span><span><strong>Front and back.</strong> For double-sided products, supply the front and back as separate files.</span></li>
            <li><span class="np-mono">03</span><span><strong>Size, bleed and safe area.</strong> Match the product’s dimensions, extend backgrounds past the trim edge, and keep text and logos inside the safe area.</span></li>
            <li><span class="np-mono">04</span><span><strong>Resolution and colour.</strong> Use high-resolution images at the final print size. We’ll share colour guidance for your product.</span></li>
          </ol>
        </div>
      </div>

      <div class="np-support reveal">
        <div>
          <p class="np-mono np-support__kicker">Talk to a real person</p>
          <h3 class="np-support__title">Not sure which product or stock suits your job?</h3>
          <p class="np-support__text">Our Melbourne-based team can help you choose, check your artwork and organise design if you need it.</p>
        </div>
        <div class="np-support__actions">
          <a href="tel:1300959514" class="np-support__link"><span class="np-mono">Call</span>1300 959 514</a>
          <a href="mailto:info@nubevest.com.au" class="np-support__link"><span class="np-mono">Email</span>info@nubevest.com.au</a>
          <a href="#price-calculator" class="btn btn--primary np-btn" data-quote-open>Request a Quote</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================ 08 FAQ =============================== -->
  <section class="np-sec np-sec--tint" id="faq" aria-labelledby="np-faq-title">
    <div class="np-wrap np-faq">
      <header class="np-faq__intro reveal">
        <?= np_label('09', 'FAQs') ?>
        <h2 id="np-faq-title" class="np-h2">Questions, answered.</h2>
        <p class="np-sec__lead">Can’t see your question? Call <a href="tel:1300959514">1300 959 514</a> or <a href="mailto:info@nubevest.com.au">email us</a>.</p>
      </header>
      <div class="np-accordion reveal" data-accordion>
        <?php
        $faqs = [
            ['What printing products do you offer?',
             'Our launch range covers premium business cards, flyers (A5 and A4), folded brochures (DL tri-fold and A4 bi-fold), postcards (A6 and A5), and banners and signage: vinyl banners, pull-up banners, corflute and foam board. Expanded signage (mesh and fabric banners, X-banners, A-frames, media walls and event backdrops) and promotional merchandise (mugs, pens, bags, notebooks, polos, shirts and hoodies) are available on request, subject to supplier availability.'],
            ['Which artwork file formats can I upload?',
             'PDF, PNG or JPG. For double-sided products, supply the front and back as separate files. We’ll confirm the dimensions, bleed, safe area, resolution and colour guidance for your product, and our team reviews every file before it prints.'],
            ['Can I request help with my design?',
             'Yes. Choose “Design help” in the price calculator, or mention it in your quote request. Our team can create new artwork or adjust what you already have, and we’ll send you a proof to approve before anything is printed. Design work is quoted separately from printing.'],
            ['Do all products support double-sided printing?',
             'No. Business cards, flyers, folded brochures and postcards are offered double-sided where available. For banners and signage it depends on the material. The calculator only shows the options that apply to your product, and we confirm them before you order.'],
            ['How do I calculate printing and delivery costs?',
             'Choose your product and options in the price calculator. Where a price has been approved, you’ll see an itemised price in AUD including GST. Unusual sizes, custom quantities and anything not yet priced go to a tailored quote, with no payment until you approve it. Delivery is calculated for your postcode, and oversized items are quoted with freight.'],
            ['Can I request a quote for custom banners?',
             'Yes. Choose “Banners and signage”, pick the type and enter the width and height in millimetres. You can add finishing such as hemmed edges, eyelets or reinforced edges, or choose a stand for pull-up banners. We check the size, material and stand compatibility, and quote freight for oversized items. If your size is larger than the calculator allows, call us on 1300 959 514.'],
            ['How can I track my order?',
             'We’ll email you as your order moves through each stage: when your quote is received, when your order is paid, if your artwork needs attention, when a proof is ready, and when your order is dispatched and delivered. We’ll include tracking details when the carrier provides them.'],
            ['Are prices in AUD, and do they include GST?',
             'Yes. All prices are in Australian dollars, and any price shown online includes GST where it applies. Your quote or invoice shows the GST amount separately.'],
        ];
        foreach ($faqs as $n => [$q, $a]): ?>
        <div class="np-acc">
          <h3 class="np-acc__h">
            <button type="button" class="np-acc__btn" id="faq-btn-<?= $n ?>" aria-expanded="false" aria-controls="faq-panel-<?= $n ?>">
              <span class="np-mono np-acc__no" aria-hidden="true">Q.<?= sprintf('%02d', $n + 1) ?></span>
              <span class="np-acc__q"><?= nv_e($q) ?></span>
              <span class="np-acc__icon" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="np-acc__panel" id="faq-panel-<?= $n ?>" role="region" aria-labelledby="faq-btn-<?= $n ?>" hidden>
            <p><?= nv_e($a) ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============================== FINAL CTA ============================= -->
  <section class="np-final" aria-labelledby="np-final-title">
    <div class="np-final__shapes" aria-hidden="true">
      <span class="np-final__ring np-final__ring--1"></span>
      <span class="np-final__ring np-final__ring--2"></span>
    </div>
    <div class="np-wrap np-final__inner">
      <span class="np-crop np-crop--tl" aria-hidden="true"></span><span class="np-crop np-crop--tr" aria-hidden="true"></span>
      <span class="np-crop np-crop--bl" aria-hidden="true"></span><span class="np-crop np-crop--br" aria-hidden="true"></span>
      <p class="np-mono np-final__label"><?= $icon['reg'] ?>Start your print job</p>
      <h2 id="np-final-title" class="np-final__title">Ready to Make Your Brand Stand Out?</h2>
      <div class="np-final__row">
        <p class="np-final__lead">Find the right print products for your business, marketing campaign or next event.</p>
        <div class="np-final__actions">
          <a href="#products" class="btn np-btn np-btn--white">Explore Products</a>
          <a href="#price-calculator" class="btn np-btn np-btn--ghost" data-quote-open>Request a Quote</a>
        </div>
      </div>
      <?= $colourbar ?>
    </div>
  </section>

</main>

<script type="application/json" id="np-catalog"><?= json_encode(np_public_catalog(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
<script>window.NP_CONFIG = <?= json_encode(['priceEndpoint' => nv_js_url('/print-signage/api/price.php')], JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>;</script>
<?php // Deferred, so it still runs after main.js, which the footer loads. ?>
<script src="<?= nv_e(nv_asset('/assets/js/printing.js')) ?>" defer></script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
