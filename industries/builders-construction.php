<?php
$industry = [
  'slug' => 'builders-construction',
  'name' => 'Builders &amp; Construction',
  'tint' => ['#f59e0b', '#f97316', 'rgba(245,158,11,0.14)', 'rgba(249,115,22,0.10)'],
  'problem_lead' => 'Builders and construction teams win work through relationships and reputation &mdash; but poor websites, slow follow-up and disconnected quoting leak enquiries and profitable jobs. Nubevest brings the pieces together.',
  'pain_points' => [
    'Website looks dated and doesn&rsquo;t reflect the quality of finished work.',
    'Enquiries land in personal inboxes and get lost between site visits.',
    'Quotes and follow-up are inconsistent, so warm leads go cold.',
    'Job docs, variations and photos live across texts, drives and phones.',
    'Field devices, laptops and networks are patched together without a plan.',
    'No clear source of truth on what&rsquo;s in the pipeline and what&rsquo;s at risk.',
  ],
  'solution_mix' => [
    ['label' => 'Websites &amp; landing pages',                'sub' => 'Reflect real work and drive qualified enquiries.',       'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; enquiry follow-up',                 'sub' => 'Never lose a warm lead again.',                          'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Quotes, jobs &amp; workflow software',         'sub' => 'Portals that fit how the crew actually works.',           'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',               'sub' => 'Reliable devices and data protection for site &amp; office.', 'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                   'sub' => 'MetaMeet &mdash; digital foundations done properly.',      'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; devices',                       'sub' => 'Monitormart &mdash; laptops, monitors, meeting rooms.',    'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',         'endorsement' => 'A platform by Nubevest',           'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia',  'endorsement' => 'A Nubevest business',              'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',           'endorsement' => 'Powered and delivered by Nubevest','href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',        'endorsement' => 'Powered and delivered by Nubevest','href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=more-enquiries',
];
include __DIR__ . '/../includes/industry-page.php';
