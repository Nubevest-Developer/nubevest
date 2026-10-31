<?php
/**
 * Printing catalogue — the single source of truth for what the storefront may
 * show and what the price endpoint may quote.
 *
 * Rules (Developer Specification v1.0, §3, §6, §7):
 *  - Every option carries `verified`. Only verified options may be presented as
 *    available specifications; unverified ones are collected as customer
 *    preferences for a quote and labelled "to be confirmed".
 *  - Price tiers are server-only. A tier is used only when status is
 *    'published', it has an approval record, and every option it prices is
 *    verified. Everything else falls back to "Request a Quote".
 *  - The §7 seed prices are illustrative drafts, NOT supplier quotes. They are
 *    stored as 'draft' and are never sent to the browser.
 *  - Supplier costs (`supplier_cost_ex_gst_cents`) must never leave the server.
 *
 * In Phase B this array is replaced by database tables (Product, ProductVariant,
 * SupplierPriceTier, RetailPriceRule, PriceApproval) with the same shape.
 */

$img = static fn(string $file, int $w, int $h, string $alt, string $pos = '50% 50%', float $zoom = 1.0): array =>
    ['src' => '/assets/images/' . $file, 'w' => $w, 'h' => $h, 'alt' => $alt, 'pos' => $pos, 'zoom' => $zoom];

$opt = static fn(string $label, bool $verified = false, array $extra = []): array =>
    ['label' => $label, 'verified' => $verified] + $extra;

$draft = static fn(int $qty, int $cents, array $match = []): array => [
    'qty'                        => $qty,
    'match'                      => $match,
    'retail_inc_gst_cents'       => $cents,
    'status'                     => 'draft',
    'source'                     => 'Developer Specification v1.0 §7 (illustrative, not a supplier quote)',
    'approved_by'                => null,
    'approved_at'                => null,
    'supplier_cost_ex_gst_cents' => null,
];

return [

    'meta' => [
        'currency'  => 'AUD',
        'gst_rate'  => ['num' => 1, 'den' => 10], // 10%, kept as a fraction for exact integer maths
        'version'   => '2026-10-13-draft',
    ],

    /* ------------------------------------------------------------------ */
    /*  Category tiles                                                     */
    /* ------------------------------------------------------------------ */
    'categories' => [
        'business-cards' => [
            'name'      => 'Business Cards',
            'blurb'     => 'Make every introduction count.',
            'cta'       => 'Explore Business Cards',
            'product'   => 'business-cards',
            'page'      => '/print-signage/business-cards',
            'tone'      => 'green', // accent from the site palette (.np-tone--*)
            'page_live' => false,
            'phase'     => 1,
            'image'     => $img('promotions/other-print-items-multi.webp', 1672, 941, 'Stack of printed business cards with a green brand design', '28% 98%', 2.14),
        ],
        'flyers' => [
            'name'      => 'Flyers',
            'blurb'     => 'Get your message into more hands.',
            'cta'       => 'Explore Flyers',
            'product'   => 'flyers',
            'page'      => '/print-signage/flyers',
            'tone'      => 'blue',
            'page_live' => false,
            'phase'     => 1,
            'image'     => $img('promotions/dl-flyer-showcase.webp', 1536, 1024, 'A stack of DL real-estate flyers beside an A4 fitness flyer on a white surface', '30% 50%', 1.4),
        ],
        'brochures' => [
            'name'      => 'Brochures',
            'blurb'     => 'Present your business beautifully.',
            'cta'       => 'Explore Brochures',
            'product'   => 'brochures',
            'page'      => '/print-signage/brochures',
            'tone'      => 'purple',
            'page_live' => false,
            'phase'     => 1,
            'image'     => $img('promotions/brochure-trifold.webp', 1536, 1024, 'Tri-fold brochure shown closed and opened flat', '45% 50%', 1.1),
        ],
        'postcards' => [
            'name'      => 'Postcards',
            'blurb'     => 'Make your next campaign memorable.',
            'cta'       => 'Explore Postcards',
            'product'   => 'postcards',
            'page'      => '/print-signage/postcards',
            'tone'      => 'pink',
            'page_live' => false,
            'phase'     => 1,
            'image'     => $img('promotions/other-print-items-multi.webp', 1672, 941, 'Printed promotional postcard with a special-offer design beside round stickers', '96% 57%', 2.4),
        ],
        'banners' => [
            'name'      => 'Banners & Signage',
            'blurb'     => 'Stand out at events and exhibitions.',
            'cta'       => 'Explore Banners',
            'product'   => 'banners',
            'page'      => '/print-signage/banners',
            'tone'      => 'amber',
            'page_live' => false,
            'phase'     => 1,
            'image'     => $img('promotions/standee-showcase.webp', 1254, 1254, 'Pull-up banner on a retractable aluminium stand', '50% 30%', 1.0),
        ],
        'promotional-products' => [
            'name'      => 'Promotional Products',
            'blurb'     => 'Put your brand into everyday use.',
            'cta'       => 'Explore Merchandise',
            'product'   => 'promotional-products',
            'page'      => '/print-signage/promotional-products',
            'tone'      => 'cyan',
            'page_live' => false,
            'phase'     => 2,
            'image'     => $img('promotions/kit-showcase-multi.webp', 1536, 1024, 'Branded tote bag, notebook, drink bottle, mug and pen', '30% 58%', 1.5),
        ],
    ],

    /* ------------------------------------------------------------------ */
    /*  Configurable products                                              */
    /* ------------------------------------------------------------------ */
    'products' => [

        'business-cards' => [
            'name'       => 'Business cards',
            'group'      => 'Print',
            'kind'       => 'paper',
            'phase'      => 1,
            'sizes'      => ['90x55' => $opt('Standard 90 × 55 mm')],
            'stocks'     => ['400gsm' => $opt('400gsm premium card')],
            'finishes'   => ['matte' => $opt('Matte'), 'gloss' => $opt('Gloss'), 'soft-touch' => $opt('Soft-touch')],
            'sides'      => ['double' => $opt('Double-sided, full colour'), 'single' => $opt('Single-sided, full colour')],
            'quantities' => [250, 500, 1000],
            'moq'        => null,
            'price_tiers' => [$draft(250, 6900), $draft(500, 9900), $draft(1000, 14900)],
        ],

        'flyers' => [
            'name'       => 'Flyers',
            'group'      => 'Print',
            'kind'       => 'paper',
            'phase'      => 1,
            'sizes'      => ['a5' => $opt('A5 · 148 × 210 mm'), 'a4' => $opt('A4 · 210 × 297 mm')],
            'stocks'     => ['170gsm' => $opt('170gsm paper'), '250gsm' => $opt('250gsm paper')],
            'finishes'   => [],
            'sides'      => ['double' => $opt('Double-sided, full colour'), 'single' => $opt('Single-sided, full colour')],
            'quantities' => [250, 500, 1000],
            'moq'        => null,
            'price_tiers' => [
                $draft(250, 14900, ['size' => 'a5']), $draft(500, 19900, ['size' => 'a5']), $draft(1000, 29900, ['size' => 'a5']),
                $draft(250, 19900, ['size' => 'a4']), $draft(500, 27900, ['size' => 'a4']), $draft(1000, 39900, ['size' => 'a4']),
            ],
        ],

        'brochures' => [
            'name'       => 'Folded brochures',
            'group'      => 'Print',
            'kind'       => 'paper',
            'phase'      => 1,
            'sizes'      => ['dl-trifold' => $opt('DL tri-fold · folds to 99 × 210 mm'), 'a4-bifold' => $opt('A4 bi-fold · folds to 210 × 297 mm')],
            'stocks'     => [],
            'finishes'   => [],
            'sides'      => ['double' => $opt('Double-sided, full colour')],
            'quantities' => [100, 250, 500],
            'moq'        => null,
            'price_tiers' => [
                $draft(100, 19900, ['size' => 'dl-trifold']), $draft(250, 29900, ['size' => 'dl-trifold']), $draft(500, 44900, ['size' => 'dl-trifold']),
            ],
        ],

        'postcards' => [
            'name'       => 'Postcards',
            'group'      => 'Print',
            'kind'       => 'paper',
            'phase'      => 1,
            'sizes'      => ['a6' => $opt('A6 · 105 × 148 mm'), 'a5' => $opt('A5 · 148 × 210 mm')],
            'stocks'     => ['premium' => $opt('Premium cardstock')],
            'finishes'   => [],
            'sides'      => ['double' => $opt('Double-sided, full colour')],
            'quantities' => [250, 500],
            'moq'        => null,
            'price_tiers' => [$draft(250, 14900), $draft(500, 22900)],
        ],

        'banners' => [
            'name'       => 'Banners and signage',
            'group'      => 'Large format',
            'kind'       => 'banner',
            'phase'      => 1,
            'quantities' => [1, 2, 5, 10],
            'moq'        => null,
            // No banner prices are seeded (spec §7): exact supplier specs and costs are required first.
            'price_tiers' => [],
            'types' => [
                'pull-up' => [
                    'label'     => 'Pull-up banner (retractable)',
                    'plural'    => 'pull-up banners',
                    'size_mode' => 'preset',
                    'sizes'     => ['850x2000' => $opt('850 × 2000 mm'), '1000x2000' => $opt('1000 × 2000 mm')],
                    'materials' => ['pull-up-film' => $opt('Pull-up banner film')],
                    'stands'    => ['standard' => $opt('Standard retractable stand'), 'premium' => $opt('Premium retractable stand')],
                    'sides'     => ['single' => $opt('Single-sided')],
                ],
                'vinyl' => [
                    'label'     => 'Vinyl banner',
                    'plural'    => 'vinyl banners',
                    'size_mode' => 'custom',
                    // Intake limits for online quote requests, not supplier limits. Larger sizes: call us.
                    'limits'    => ['min_w' => 300, 'max_w' => 6000, 'min_h' => 300, 'max_h' => 3000, 'max_aspect' => 12],
                    'materials' => ['pvc-vinyl' => $opt('PVC vinyl')],
                    'finishing' => ['hems' => $opt('Hemmed edges'), 'eyelets' => $opt('Eyelets'), 'reinforced' => $opt('Reinforced edges')],
                    'sides'     => ['single' => $opt('Single-sided')],
                ],
                'corflute' => [
                    'label'     => 'Corflute sign',
                    'plural'    => 'corflute signs',
                    'size_mode' => 'custom',
                    'limits'    => ['min_w' => 200, 'max_w' => 2400, 'min_h' => 200, 'max_h' => 1200, 'max_aspect' => 12],
                    'materials' => ['corflute' => $opt('Corflute (fluted polypropylene)')],
                    'thickness' => ['3mm' => $opt('3 mm'), '5mm' => $opt('5 mm')],
                    'sides'     => ['single' => $opt('Single-sided'), 'double' => $opt('Double-sided')],
                ],
                'foam-board' => [
                    'label'     => 'Foam board',
                    'plural'    => 'foam boards',
                    'size_mode' => 'custom',
                    'limits'    => ['min_w' => 200, 'max_w' => 2400, 'min_h' => 200, 'max_h' => 1200, 'max_aspect' => 12],
                    'materials' => ['foam-board' => $opt('Foam board')],
                    'thickness' => ['5mm' => $opt('5 mm'), '10mm' => $opt('10 mm')],
                    'sides'     => ['single' => $opt('Single-sided')],
                ],
                // Phase 2 — expanded signage (spec §3, §5): quote only, subject to supplier availability.
                'mesh' => [
                    'label' => 'Mesh banner', 'plural' => 'mesh banners', 'phase' => 2, 'size_mode' => 'custom',
                    'limits'    => ['min_w' => 300, 'max_w' => 6000, 'min_h' => 300, 'max_h' => 3000, 'max_aspect' => 12],
                    'finishing' => ['hems' => $opt('Hemmed edges'), 'eyelets' => $opt('Eyelets'), 'reinforced' => $opt('Reinforced edges')],
                ],
                'fabric' => [
                    'label' => 'Fabric banner', 'plural' => 'fabric banners', 'phase' => 2, 'size_mode' => 'custom',
                    'limits'    => ['min_w' => 300, 'max_w' => 6000, 'min_h' => 300, 'max_h' => 3000, 'max_aspect' => 12],
                ],
                'x-banner' => [
                    'label' => 'X-banner', 'plural' => 'X-banners', 'phase' => 2, 'size_mode' => 'custom',
                    'limits'    => ['min_w' => 300, 'max_w' => 1500, 'min_h' => 600, 'max_h' => 2500, 'max_aspect' => 6],
                ],
                'a-frame' => [
                    'label' => 'A-frame sign', 'plural' => 'A-frame signs', 'phase' => 2, 'size_mode' => 'custom',
                    'limits'    => ['min_w' => 300, 'max_w' => 1200, 'min_h' => 400, 'max_h' => 1500, 'max_aspect' => 4],
                    'sides'     => ['single' => $opt('Single-sided'), 'double' => $opt('Double-sided')],
                ],
                'media-wall' => [
                    'label' => 'Media wall or event backdrop', 'plural' => 'media walls and event backdrops', 'phase' => 2, 'size_mode' => 'custom',
                    'limits'    => ['min_w' => 1000, 'max_w' => 8000, 'min_h' => 1000, 'max_h' => 3500, 'max_aspect' => 8],
                ],
            ],
        ],

        'promotional-products' => [
            'name'       => 'Promotional products',
            'group'      => 'Promotional',
            'kind'       => 'merch',
            'phase'      => 2,
            'items'      => [
                // Spec §3: mugs, pens, bags, notebooks, polos, shirts, hoodies and other verified products.
                'mugs' => $opt('Mugs'), 'pens' => $opt('Pens'), 'bags' => $opt('Bags'),
                'notebooks' => $opt('Notebooks'), 'polos' => $opt('Polos'), 'shirts' => $opt('Shirts'),
                'hoodies' => $opt('Hoodies'), 'other' => $opt('Something else'),
            ],
            'quantities' => [],
            'moq'        => null,
            'price_tiers' => [],
        ],

        'package-business-starter' => [
            'name'     => 'Business Starter Pack',
            'group'    => 'Packages',
            'kind'     => 'package',
            'phase'    => 1,
            'includes' => ['Business cards', 'Flyers', 'Pull-up banner'],
            'quantities' => [], 'moq' => null, 'price_tiers' => [],
        ],
        'package-expo-exhibitor' => [
            'name'     => 'Expo Exhibitor Pack',
            'group'    => 'Packages',
            'kind'     => 'package',
            'phase'    => 1,
            'includes' => ['Pull-up banner', 'Flyers', 'Business cards'],
            'quantities' => [], 'moq' => null, 'price_tiers' => [],
        ],
        'package-event-branding' => [
            'name'     => 'Event Branding Pack',
            'group'    => 'Packages',
            'kind'     => 'package',
            'phase'    => 2,
            'includes' => ['Backdrop', 'Directional signage', 'Vinyl banner'],
            'quantities' => [], 'moq' => null, 'price_tiers' => [],
        ],
    ],

    /* ------------------------------------------------------------------ */
    /*  Featured products (Popular Printing Products)                      */
    /* ------------------------------------------------------------------ */
    'featured' => [
        [
            'title'   => 'Premium Business Cards',
            'product' => 'business-cards',
            'preset'  => ['size' => '90x55'],
            'summary' => 'Heavyweight cards for a confident first impression.',
            'specs'   => ['Format' => 'Standard 90 × 55 mm', 'Stock' => '400gsm, where offered', 'Print' => 'Double-sided, full colour', 'Finish' => 'Matte, gloss or soft-touch, subject to availability'],
            'image'   => $img('promotions/business-cards-green.webp', 1774, 887, 'Premium dark green and white business cards with a green wave design', '50% 50%', 1.0),
        ],
        [
            'title'   => 'A5 Flyers',
            'product' => 'flyers',
            'preset'  => ['size' => 'a5'],
            'summary' => 'Handouts for events, counters and letterboxes.',
            'specs'   => ['Format' => 'A5 · 148 × 210 mm (A4 also available)', 'Stock' => '170 or 250gsm, where offered', 'Print' => 'Double-sided'],
            'image'   => $img('promotions/dl-flyer-showcase.webp', 1536, 1024, 'Full-colour A5 fitness flyer with photography', '49% 50%', 1.7),
        ],
        [
            'title'   => 'DL Tri-Fold Brochures',
            'product' => 'brochures',
            'preset'  => ['size' => 'dl-trifold'],
            'summary' => 'Six panels for your services, story and contact details.',
            'specs'   => ['Format' => 'DL tri-fold (A4 bi-fold also available)', 'Print' => 'Double-sided'],
            'image'   => $img('promotions/brochure-showcase-purple.webp', 1536, 1024, 'Cover of a DL tri-fold brochure in purple and white', '6% 18%', 2.2),
        ],
        [
            'title'   => 'Premium Postcards',
            'product' => 'postcards',
            'preset'  => [],
            'summary' => 'Thick, double-sided cards for mail-outs and offers.',
            'specs'   => ['Format' => 'A6 or A5', 'Stock' => 'Premium cardstock', 'Print' => 'Double-sided'],
            'image'   => $img('promotions/promo-hero-print-multi.webp', 1671, 941, 'Stack of printed postcards with a landscape photograph', '97% 70%', 3.6),
        ],
        [
            'title'   => 'Pull-Up Banners',
            'product' => 'banners',
            'preset'  => ['type' => 'pull-up'],
            'summary' => 'Portable, retractable displays for stands and receptions.',
            'specs'   => ['Type' => 'Retractable banner with stand', 'Sizes' => 'Validated for your order'],
            'image'   => $img('promotions/plannor-rollup.webp', 856, 2000, 'Pull-up banner artwork for Plannor, a Nubevest platform', '50% 6%', 1.0),
        ],
    ],

    /* ------------------------------------------------------------------ */
    /*  Packages                                                           */
    /* ------------------------------------------------------------------ */
    'packages' => [
        [
            'product' => 'package-business-starter',
            'kicker'  => 'Launch or refresh',
            'summary' => 'The core pieces a business needs to look consistent from the first handshake.',
            'image'   => $img('promotions/other-print-items-multi.webp', 1672, 941, 'Business cards, a poster and a pull-up banner sharing one brand design', '40% 60%', 1.3),
        ],
        [
            'product' => 'package-expo-exhibitor',
            'kicker'  => 'Expos and trade shows',
            'summary' => 'A stand-out presence for your booth, with handouts and cards for every conversation.',
            'image'   => $img('promotions/promo-hero-print-multi.webp', 1671, 941, 'Pull-up banner, poster, flyers and business cards for an exhibition stand', '55% 42%', 1.45),
            'featured'=> true,
        ],
        [
            'product' => 'package-event-branding',
            'kicker'  => 'Conferences and launches',
            'summary' => 'Large-format branding that sets the scene and guides guests around your venue.',
            'image'   => $img('events/hero-1.jpg', 900, 940, 'Branded stage backdrop at a Nubevest event', '60% 0%', 1.0),
            'note'    => 'Backdrops subject to supplier availability',
        ],
    ],

    /* ------------------------------------------------------------------ */
    /*  Range and specifications (Developer Specification §3)              */
    /* ------------------------------------------------------------------ */
    'range' => [
        ['name' => 'Premium business cards', 'phase' => 1, 'configure' => ['product' => 'business-cards'],
         'spec' => ['400gsm, where offered', 'Double-sided, full colour', 'Matte, gloss or soft-touch, subject to availability']],
        ['name' => 'Flyers', 'phase' => 1, 'configure' => ['product' => 'flyers'],
         'spec' => ['A5 and A4', '170 or 250gsm, where offered', 'Double-sided']],
        ['name' => 'Folded brochures', 'phase' => 1, 'configure' => ['product' => 'brochures'],
         'spec' => ['DL tri-fold and A4 bi-fold, where offered', 'Double-sided']],
        ['name' => 'Postcards', 'phase' => 1, 'configure' => ['product' => 'postcards'],
         'spec' => ['A6 and A5', 'Premium cardstock', 'Double-sided']],
        ['name' => 'Banners and signage', 'phase' => 1, 'configure' => ['product' => 'banners'],
         'spec' => ['Vinyl banners, pull-up banners, corflute and foam board', 'Sizes and finishes validated for each order']],
        ['name' => 'Expanded signage', 'phase' => 2, 'configure' => ['product' => 'banners', 'type' => 'mesh'],
         'spec' => ['Mesh and fabric banners, X-banners and A-frames', 'Media walls and event backdrops', 'Subject to supplier availability']],
        ['name' => 'Promotional merchandise', 'phase' => 2, 'configure' => ['product' => 'promotional-products'],
         'spec' => ['Mugs, pens, bags and notebooks', 'Polos, shirts and hoodies', 'Other products on request']],
    ],
];
