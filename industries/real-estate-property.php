<?php
$industry = [
  'slug' => 'real-estate-property',
  'name' => 'Real Estate &amp; Property',
  'tint' => ['#8b5cf6', '#ec4899', 'rgba(139,92,246,0.14)', 'rgba(236,72,153,0.10)'],
  'problem_lead' => 'Property businesses run on campaigns, events and reputation. Nubevest brings landing pages, CRM, events, workplace tech and secure operations together &mdash; and offers a verified Australia&ndash;Dubai property pathway where relevant.',
  'pain_points' => [
    'Campaign landing pages are slow to build and don&rsquo;t track conversions well.',
    'Enquiries from portals, socials and events land in different inboxes.',
    'Events (open homes, expos, launches) need coordinated branding and follow-up.',
    'Office A/V, hardware and security aren&rsquo;t coordinated across sites.',
    'No clear pathway for buyers exploring Dubai property.',
  ],
  'solution_mix' => [
    ['label' => 'Landing pages &amp; campaigns',            'sub' => 'Purpose-built for property campaigns.',                    'href' => '/solutions/digital-growth.php'],
    ['label' => 'CRM &amp; enquiry follow-up',              'sub' => 'One inbox, one pipeline, faster response.',                'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Nubevest Events',                          'sub' => 'A Nubevest service &mdash; expos, open homes, launches.',  'href' => '/events.php'],
    ['label' => 'Meeting Rooms &amp; A/V',                  'sub' => 'Coordinated video, displays, presentation tech.',          'href' => '/solutions/workplace-technology.php'],
    ['label' => 'Managed IT &amp; cybersecurity',           'sub' => 'Multi-site security, backups, support.',                   'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Australia&ndash;Dubai pathway',            'sub' => 'Kangar Dubai Experts &mdash; verified UAE-licensed entity.','href' => '/brands/kangar-dubai-experts.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',            'endorsement' => 'A platform by Nubevest',           'href' => '/brands/gometa-crm.php'],
    ['name' => 'Kangar Dubai Experts',  'endorsement' => 'A Nubevest business',              'href' => '/brands/kangar-dubai-experts.php'],
    ['name' => 'MetaMeet',              'endorsement' => 'Powered and delivered by Nubevest','href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',           'endorsement' => 'Powered and delivered by Nubevest','href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=more-enquiries',
];
include __DIR__ . '/../includes/industry-page.php';
