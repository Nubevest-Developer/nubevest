<?php
$industry = [
  'slug' => 'small-growing-businesses',
  'name' => 'Small &amp; Growing Businesses',
  'tint' => ['#10b981', '#06b6d4', 'rgba(16,185,129,0.14)', 'rgba(6,182,212,0.10)'],
  'problem_lead' => 'Most growing businesses don&rsquo;t have one isolated problem. A weak website creates poor enquiries; slow follow-up loses opportunities; unreliable IT slows the team. Nubevest looks at the full journey and recommends the smallest practical combination of services.',
  'pain_points' => [
    'Website enquiries aren&rsquo;t translating into real customers.',
    'Follow-up depends on the founder remembering, not a system.',
    'Tools were bolted on over years and don&rsquo;t talk to each other.',
    'IT support is reactive, expensive and slow.',
    'Getting a new starter set up takes days and looks amateur.',
    'Nobody owns growth &mdash; it happens when there&rsquo;s spare time.',
  ],
  'solution_mix' => [
    ['label' => 'Website &amp; digital growth',           'sub' => 'Position, launch, and grow enquiries.',                     'href' => '/solutions/digital-growth.php'],
    ['label' => 'CRM &amp; automation',                    'sub' => 'Turn enquiries into a repeatable follow-up system.',        'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Software &amp; portals',                  'sub' => 'Custom tools that fit how your team works.',                'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',          'sub' => 'Reliable devices, cloud and protection.',                   'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',              'sub' => 'MetaMeet &mdash; digital foundations done properly.',       'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; procurement',              'sub' => 'Monitormart &mdash; standard kit for new starters.',        'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',   'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'MetaMeet',     'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',  'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=not-sure',
];
include __DIR__ . '/../includes/industry-page.php';
