<?php
$industry = [
  'slug' => 'professional-services',
  'name' => 'Professional &amp; Advisory Services',
  'tint' => ['#0ea5e9', '#0284c7', 'rgba(14,165,233,0.14)', 'rgba(2,132,199,0.10)'],
  'problem_lead' => 'Accountants, lawyers, consultants and advisers sell trust &mdash; but dated websites, manual document workflow and weak IT hygiene chip away at reputation and margin. Nubevest fits the pieces so the practice runs like the advice it gives.',
  'pain_points' => [
    'Website looks generic and doesn&rsquo;t reflect the calibre of the practice.',
    'Enquiries land in personal inboxes with no shared pipeline or SLA.',
    'Onboarding, engagement letters and IDs move by email and PDF.',
    'Time, billing, matter and CRM data sit in separate silos.',
    'Client documents live across drives, chat and email &mdash; hard to audit.',
    'Cybersecurity, backups and access control are ad-hoc for a regulated business.',
  ],
  'solution_mix' => [
    ['label' => 'Websites &amp; service pages',              'sub' => 'Credible sites that convert referrals and search traffic.',      'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; onboarding automation',            'sub' => 'One queue for enquiries, onboarding and renewals.',              'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Document &amp; matter workflow',             'sub' => 'Portals fitted to how the practice actually delivers.',          'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',             'sub' => 'Secure devices, backups and access built for regulated work.',   'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                 'sub' => 'MetaMeet &mdash; digital foundations done properly.',            'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; devices',                     'sub' => 'Monitormart &mdash; laptops, monitors and meeting rooms.',       'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',         'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia',  'endorsement' => 'A Nubevest business',               'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',           'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',        'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=professional-services',
];
include __DIR__ . '/../includes/industry-page.php';
