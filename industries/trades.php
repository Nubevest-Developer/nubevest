<?php
$industry = [
  'slug' => 'trades',
  'name' => 'Trades',
  'tint' => ['#dc2626', '#ef4444', 'rgba(220,38,38,0.14)', 'rgba(239,68,68,0.10)'],
  'problem_lead' => 'Tradies win work in the field but lose it in the follow-up. Nubevest handles the pieces around your trade &mdash; enquiries, quotes, invoicing systems, devices and support &mdash; so you can focus on the job.',
  'pain_points' => [
    'Website enquiries pile up and don&rsquo;t get a proper reply.',
    'Quoting and invoicing live in different places from the customer conversation.',
    'Text messages, photos and job notes are scattered across phones.',
    'Getting reviews is inconsistent even when the work is great.',
    'Old email address on the ute, no professional business email.',
    'Nobody owns the pipeline &mdash; jobs slip based on who shouts loudest.',
  ],
  'solution_mix' => [
    ['label' => 'Trade-focused website',                'sub' => 'Simple, credible, converts phone-first visitors.',       'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; follow-up automation',        'sub' => 'Quotes, reminders, review requests handled.',            'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Business email &amp; hosting',          'sub' => 'MetaMeet &mdash; a professional domain and inbox.',      'href' => '/brands/metameet.php'],
    ['label' => 'Managed IT &amp; devices',              'sub' => 'Phones, tablets, laptops that just work.',               'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Hardware &amp; procurement',            'sub' => 'Monitormart &mdash; setup for team growth.',             'href' => '/brands/monitormart.php'],
    ['label' => 'Recruitment support',                   'sub' => 'Workers Australia &mdash; when the bottleneck is people.','href' => '/brands/workers-australia.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',        'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia', 'endorsement' => 'A Nubevest business',               'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',          'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',       'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=more-enquiries',
];
include __DIR__ . '/../includes/industry-page.php';
