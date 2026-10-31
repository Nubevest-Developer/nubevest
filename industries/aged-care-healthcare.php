<?php
$industry = [
  'slug' => 'aged-care-healthcare',
  'name' => 'Aged Care &amp; Healthcare',
  'tint' => ['#10b981', '#059669', 'rgba(16,185,129,0.14)', 'rgba(5,150,105,0.10)'],
  'problem_lead' => 'Aged care providers, clinics and allied health teams live or die by trust, referrals and roster reliability &mdash; but outdated websites, scattered intake forms and fragile IT quietly hold clinical teams back. Nubevest brings the digital, data and IT layers together so care stays the focus.',
  'pain_points' => [
    'Website reads like a brochure &mdash; families can&rsquo;t easily see services, availability or how to refer.',
    'Referrals and intake enquiries arrive by phone, PDF and email with no single queue.',
    'Rostering, care notes and billing sit in separate tools that don&rsquo;t talk to each other.',
    'Compliance evidence (training, incidents, consents) is spread across drives and paper.',
    'Staff devices, shared logins and remote access are patched together without a security baseline.',
    'No clear view of occupancy, waitlist or referral source performance.',
  ],
  'solution_mix' => [
    ['label' => 'Websites &amp; referral capture',           'sub' => 'Warm, trustworthy sites that convert families and GPs.',        'href' => '/solutions/websites-ecommerce.php'],
    ['label' => 'CRM &amp; intake automation',               'sub' => 'One queue for referrals, enquiries and follow-ups.',            'href' => '/solutions/crm-automation-ai.php'],
    ['label' => 'Care, rostering &amp; billing software',    'sub' => 'Portals and workflows fitted to how your team actually cares.',  'href' => '/solutions/software-apps.php'],
    ['label' => 'Managed IT &amp; cybersecurity',            'sub' => 'Secure devices, backups and remote access for clinical staff.', 'href' => '/solutions/managed-it-cloud-cybersecurity.php'],
    ['label' => 'Domains, hosting &amp; SSL',                'sub' => 'MetaMeet &mdash; digital foundations done properly.',            'href' => '/brands/metameet.php'],
    ['label' => 'Hardware &amp; devices',                    'sub' => 'Monitormart &mdash; nurse stations, tablets, meeting rooms.',    'href' => '/brands/monitormart.php'],
  ],
  'brand_callouts' => [
    ['name' => 'Plannor',            'endorsement' => 'A platform by Nubevest',            'href' => '/brands/plannor.php'],
    ['name' => 'GoMeta CRM',         'endorsement' => 'A platform by Nubevest',            'href' => '/brands/gometa-crm.php'],
    ['name' => 'Workers Australia',  'endorsement' => 'A Nubevest business',               'href' => '/brands/workers-australia.php'],
    ['name' => 'MetaMeet',           'endorsement' => 'Powered and delivered by Nubevest', 'href' => '/brands/metameet.php'],
  ],
  'cta_href' => '/contact.php?service=aged-care',
];
include __DIR__ . '/../includes/industry-page.php';
