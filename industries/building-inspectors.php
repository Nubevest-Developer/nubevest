<?php
$industry = [
  'slug' => 'building-inspectors',
  'name' => 'Building Inspectors',
  'tint' => ['#2563eb', '#3b82f6', 'rgba(37,99,235,0.14)', 'rgba(59,130,246,0.10)'],
  'problem_lead' => 'Building inspectors run booking, reporting and follow-up on tight timelines. Nubevest tightens the whole chain &mdash; from the first enquiry to the delivered report &mdash; through one accountable relationship.',
  'pain_points' => [
    'Manual bookings and back-and-forth calls to lock in a time.',
    'Missed follow-up on quote requests and pre-inspection questions.',
    'Report delivery and payment sit in different tools.',
    'Field devices and templates aren&rsquo;t consistent across inspectors.',
    'Website enquiries don&rsquo;t come with enough detail to price properly.',
    'No visibility on which jobs are booked vs. quoted vs. cold.',
  ],
  'solution_mix' => [
    ['label' => 'Booking &amp; enquiry website',              'sub' => 'Capture the right details up front.',                     'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; automated reminders',              'sub' => 'Booking, reminders, follow-up done for you.',              'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Inspection portal &amp; reporting',          'sub' => 'Custom software that fits the workflow.',                  'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',             'sub' => 'Secure data handling for client reports.',                 'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                 'sub' => 'MetaMeet &mdash; reliable foundations.',                   'href' => '/brands/metameet.php'],
    ['label' => 'Hardware for field &amp; office',            'sub' => 'Monitormart &mdash; tablets, laptops, meeting-room A/V.',  'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',   'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'MetaMeet',     'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',  'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=follow-up-crm',
];
include __DIR__ . '/../includes/industry-page.php';
