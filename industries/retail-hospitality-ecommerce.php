<?php
$industry = [
  'slug' => 'retail-hospitality-ecommerce',
  'name' => 'Retail, Hospitality &amp; eCommerce',
  'tint' => ['#ec4899', '#db2777', 'rgba(236,72,153,0.14)', 'rgba(219,39,119,0.10)'],
  'problem_lead' => 'Shops, venues and online stores rise and fall on customer experience, stock accuracy and speed &mdash; but disconnected sites, POS, ordering and stock tools leak revenue every day. Nubevest joins the front-of-house and back-office into one honest system.',
  'pain_points' => [
    'Website and online ordering are slow, dated or off-brand.',
    'POS, eCommerce and stock live in different systems that don&rsquo;t reconcile.',
    'Bookings, orders and enquiries land in different inboxes with no single view.',
    'Loyalty, reviews and customer data are scattered across platforms.',
    'Kitchen, floor and back-office devices are patched together without support.',
    'No clear numbers on top items, waste, no-shows or repeat customer value.',
  ],
  'solution_mix' => [
    ['label' => 'Websites, eCommerce &amp; online ordering',  'sub' => 'Shopfront sites and stores that convert and stay in sync.',      'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM, loyalty &amp; marketing automation',    'sub' => 'One view of the customer across venues and channels.',           'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'POS, stock &amp; ops software',              'sub' => 'Portals and integrations built for how the venue runs.',         'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',             'sub' => 'Reliable devices, Wi-Fi and payments for front and back of house.','href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                 'sub' => 'MetaMeet &mdash; digital foundations done properly.',            'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; devices',                     'sub' => 'Monitormart &mdash; POS terminals, screens and office kit.',     'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',         'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia',  'endorsement' => 'A Nubevest business',               'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',           'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',        'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=retail-hospitality',
];
include __DIR__ . '/../includes/industry-page.php';
