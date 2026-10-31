<?php
$industry = [
  'slug' => 'education-training',
  'name' => 'Education &amp; Training Organisations',
  'tint' => ['#7c3aed', '#6d28d9', 'rgba(124,58,237,0.14)', 'rgba(109,40,217,0.10)'],
  'problem_lead' => 'RTOs, colleges and training bodies live between marketing, enrolment, compliance and delivery &mdash; and disconnected tools quietly kill conversion and student experience. Nubevest joins the funnel from ad click to certificate.',
  'pain_points' => [
    'Course pages rank poorly and don&rsquo;t clearly show fees, dates or intakes.',
    'Enquiries drop through the funnel &mdash; no clear queue, no timely follow-up.',
    'Enrolment forms, LLN, USI and payment sit across separate tools.',
    'LMS, CRM and student records don&rsquo;t share the same source of truth.',
    'Compliance evidence for ASQA/TEQSA is stitched together at audit time.',
    'Staff logins, devices and shared drives lack a clean security baseline.',
  ],
  'solution_mix' => [
    ['label' => 'Websites &amp; course landing pages',        'sub' => 'Course pages that rank, convert and stay accurate.',            'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; enrolment automation',             'sub' => 'One queue for enquiries, applications and re-enrolments.',      'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Student portals &amp; LMS integration',      'sub' => 'Portals fitted to how learners and trainers actually work.',    'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',             'sub' => 'Secure devices, cloud drives and access for staff and trainers.','href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                 'sub' => 'MetaMeet &mdash; digital foundations done properly.',            'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; devices',                     'sub' => 'Monitormart &mdash; classroom, lab and office kit.',             'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'GoMeta CRM',         'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia',  'endorsement' => 'A Nubevest business',               'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',           'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
    ['name' => 'Monitormart',        'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/monitormart.php'],
  ],
  'cta_href' => '/contact.php?service=education',
];
include __DIR__ . '/../includes/industry-page.php';
