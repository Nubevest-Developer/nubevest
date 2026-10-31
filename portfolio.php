<?php
$page = 'portfolio';
$seo_title = 'Portfolio | Selected Client Projects — Nubevest';
$meta_desc = 'A curated portfolio of Nubevest client projects — websites, apps, CRM systems and digital services delivered across Australia, UAE and India.';
include 'includes/header.php';

/* Portfolio projects — real client work.
   Screenshots resolve to a local cached file if one exists
   (created by tools/warm-portfolio-screenshots.php), otherwise
   fall back to the live WordPress mshots URL. */
function nv_shot($url, $w = 1200) {
    $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', preg_replace('#^https?://(www\.)?#', '', rtrim($url, '/'))));
    $slug = trim($slug, '-');
    $rel  = '/assets/images/portfolio/cache/' . $slug . '-' . intval($w) . '.jpg';
    // Resolve against the project directory (portfolio.php sits at project root),
    // NOT $_SERVER['DOCUMENT_ROOT'] — under XAMPP subfolder installs those differ
    // (DOCUMENT_ROOT is C:/xampp/htdocs while the project is C:/xampp/htdocs/nubevestAI).
    $abs = __DIR__ . $rel;
    if (is_file($abs) && filesize($abs) > 15000) {
        // header.php auto-rewrite prefixes BASE_URL for us in a subfolder install.
        return $rel . '?v=' . filemtime($abs);
    }
    return 'https://s.wordpress.com/mshots/v1/' . rawurlencode($url) . '?w=' . $w;
}

$projects = [
  [
    'title'    => 'Building Solutions Website',
    'client'   => 'Competent Building Solutions',
    'url'      => 'https://competent.net.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2024',
    'summary'  => 'Built on Skill. Delivered with Pride. — a trade-focused site for first & second fix carpentry, truss manufacturing, structural framing and building materials supply across South Australia.',
    'tags'     => ['PHP', 'Responsive', 'SEO', 'Contact Forms'],
    'accent'   => 'orange',
    'stat'     => ['500+', 'projects completed'],
    'mobileShot' => '/assets/images/portfolio/cache/competent-mobile.jpg',
  ],
  [
    'title'    => 'Trade Services Website',
    'client'   => 'SA Carpenters',
    'url'      => 'https://sacarpenters.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2024',
    'summary'  => 'Professional carpentry you can trust — a lead-generating website for residential & commercial carpentry, decking, timber flooring, extensions and custom timber solutions across SA.',
    'tags'     => ['PHP', 'SEO', 'Lead Forms', 'Google Reviews'],
    'accent'   => 'green',
    'stat'     => ['12,000+', 'customers served'],
    'mobileShot' => '/assets/images/portfolio/cache/sacarpenters-mobile.jpg',
  ],
  [
    'title'    => 'Food Brand Website',
    'client'   => 'Arth Foods',
    'url'      => 'https://arthfoods.com/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A brand-forward website for a food business — product presentation, story-led content and enquiry capture, built for a growing FMCG audience.',
    'tags'     => ['Responsive', 'Brand', 'SEO'],
    'accent'   => 'orange',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/arthfoods-mobile.jpg',
  ],
  [
    'title'    => 'Farm Produce eCommerce Store',
    'client'   => 'Yarra Valley Hilltop',
    'url'      => 'https://yarravalleyhilltop.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & eCommerce',
    'year'     => '2025',
    'summary'  => 'A farm-to-table eCommerce site for a Yarra Valley producer — online store for fresh produce, jams and pantry goods, with recipes, stockist locator and secure checkout.',
    'tags'     => ['eCommerce', 'Product Catalogue', 'Payments', 'SEO'],
    'accent'   => 'green',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/yarravalleyhilltop-mobile.jpg',
  ],
  [
    'title'    => 'NDIS Support Provider Website',
    'client'   => 'Vibrant Living Support',
    'url'      => 'https://vibrantlivingsupport.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A participant-friendly website for a registered NDIS provider — clear service breakdown, referral pathways and enquiry capture aligned to disability sector standards.',
    'tags'     => ['NDIS', 'Accessible', 'Lead Forms'],
    'accent'   => 'indigo',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/vibrantlivingsupport-mobile.jpg',
  ],
  [
    'title'    => 'Wellbeing & Support Services Website',
    'client'   => 'Living Well Solutions',
    'url'      => 'https://livingwellsolutions.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A calm, trust-led website for a support services provider — clear service pages, credentials and a low-friction path from browsing to first contact.',
    'tags'     => ['Care', 'Accessible', 'SEO'],
    'accent'   => 'purple',
    'stat'     => ['Live', 'production'],
  ],
  [
    'title'    => 'Community Organisation Website',
    'client'   => 'ServeGlobe',
    'url'      => 'https://serveglobe.org.au',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A not-for-profit website built to communicate mission, programs and community impact — with donation and volunteer sign-up flows.',
    'tags'     => ['Non-profit', 'Donations', 'Volunteers'],
    'accent'   => 'orange',
    'stat'     => ['Live', 'production'],
    'desktopShot' => '/assets/images/portfolio/cache/serveglobe-desktop.jpg',
    'mobileShot'  => '/assets/images/portfolio/cache/serveglobe-mobile.jpg',
  ],
  [
    'title'    => 'Community Club Website',
    'client'   => 'Pak Aussie Club',
    'url'      => 'https://pakaussieclub.org.au',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A community club website — events, membership information and communications built for a growing Australian diaspora community.',
    'tags'     => ['Community', 'Events', 'Membership'],
    'accent'   => 'green',
    'stat'     => ['Live', 'production'],
    'desktopShot' => '/assets/images/portfolio/cache/pakaussieclub-desktop.jpg',
    'mobileShot'  => '/assets/images/portfolio/cache/pakaussieclub-mobile.jpg',
  ],
  [
    'title'    => 'Physiotherapy Practice Website',
    'client'   => 'Keep In Motion Physio',
    'url'      => 'https://www.keepinmotionphysio.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A patient-facing website for a physiotherapy clinic — service and condition pages, practitioner profiles and online booking integration.',
    'tags'     => ['Healthcare', 'Online Booking', 'SEO'],
    'accent'   => 'purple',
    'stat'     => ['Live', 'production'],
  ],
  [
    'title'    => 'Physiotherapy Clinic Website',
    'client'   => 'West In Motion Physio',
    'url'      => 'https://westinmotionphysio.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A sister-clinic website with a shared design system — location-specific content, practitioner listings and booking flow for the west-side practice.',
    'tags'     => ['Healthcare', 'Online Booking', 'Multi-site'],
    'accent'   => 'orange',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/westinmotionphysio-mobile.jpg',
  ],
  [
    'title'    => 'Telecommunications Company Website',
    'client'   => 'TIG Telecom',
    'url'      => 'https://tigtelecom.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A telco provider website showcasing Voice, Data, Cloud and Vodafone Mobile services with clear plans, business enquiry capture and My Account access.',
    'tags'     => ['Telco', 'Voice & Data', 'Cloud', 'Customer Portal'],
    'accent'   => 'green',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/tigtelecom-mobile.jpg',
  ],
  [
    'title'    => 'Construction & Projects Website',
    'client'   => 'Oscar Projects',
    'url'      => 'https://oscarprojects.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A projects-led website for a construction business — capability statement, portfolio of completed work and quote-request flow.',
    'tags'     => ['Construction', 'Portfolio', 'Quote Forms'],
    'accent'   => 'indigo',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/oscarprojects-mobile.jpg',
  ],
  [
    'title'    => 'Real Estate Agency Website',
    'client'   => 'Stadium Real Estate',
    'url'      => 'https://stadiumrealestate.com/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A real estate agency website — listing presentation, agent profiles and buyer/seller enquiry pathways built for a fast-moving sales environment.',
    'tags'     => ['Real Estate', 'Listings', 'Lead Capture'],
    'accent'   => 'purple',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/stadiumrealestate-mobile.jpg',
  ],
  [
    'title'    => 'Business Website — Duvar',
    'client'   => 'Duvar',
    'url'      => 'https://duvar.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A responsive business website — product/service presentation, brand-consistent design and enquiry capture aligned to the client&rsquo;s customer journey.',
    'tags'     => ['Business', 'Responsive', 'SEO'],
    'accent'   => 'orange',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/duvar-mobile.jpg',
  ],
  [
    'title'    => 'Business Website — Anpros',
    'client'   => 'Anpros',
    'url'      => 'https://anpros.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A clean, conversion-oriented business website — service pages, credibility content and enquiry forms tuned for the client&rsquo;s target market.',
    'tags'     => ['Business', 'Lead Forms', 'SEO'],
    'accent'   => 'green',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/anpros-mobile.jpg',
  ],
  [
    'title'    => 'Retail Brand Website',
    'client'   => 'Fun Stuff',
    'url'      => 'https://funstuff.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A retail-brand website — product-forward design, category browsing and enquiry/purchase pathways for a consumer audience.',
    'tags'     => ['Retail', 'Product', 'Responsive'],
    'accent'   => 'indigo',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/funstuff-mobile.jpg',
  ],
  [
    'title'    => 'Packaging Business Website',
    'client'   => 'AmPack',
    'url'      => 'https://ampack.com.au',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'A B2B packaging business website — product range presentation, bulk enquiry forms and credibility content for wholesale and commercial buyers.',
    'tags'     => ['B2B', 'Packaging', 'Enquiry Forms'],
    'accent'   => 'purple',
    'stat'     => ['Live', 'production'],
    'mobileShot' => '/assets/images/portfolio/cache/ampack-mobile.jpg',
  ],
  [
    'title'    => 'Heritage Food Brand Website',
    'client'   => 'IXL Foods',
    'url'      => 'https://ixlfoods.com.au/',
    'category' => 'websites',
    'catLabel' => 'Websites & Digital',
    'year'     => '2025',
    'summary'  => 'Crafted with care since 1898 — a heritage Australian food brand website presenting premium jams, marmalades and sauces made from real fruit, with recipes and stockist information.',
    'tags'     => ['Food & Beverage', 'Heritage Brand', 'Responsive'],
    'accent'   => 'green',
    'stat'     => ['Since', '1898'],
  ],
  [
    'title'    => 'NDIS Provider Management Platform',
    'client'   => 'Plannor (In Development)',
    'url'      => 'https://plannor.com.au/',
    'category' => 'software',
    'catLabel' => 'Software & AI',
    'year'     => '2025',
    'summary'  => 'An AI-assisted platform being built for Australian NDIS providers — participant management, rostering, GPS tracking, SCHADS payroll and Claude-powered assistance. Modules ship as verified and available; features still in development are labelled as such.',
    'tags'     => ['Claude API', 'PHP', 'MySQL', 'GPS', 'NDIS'],
    'accent'   => 'purple',
    'stat'     => ['In', 'development'],
    'mobileShot' => '/assets/images/portfolio/cache/plannor-mobile.jpg',
  ],
  [
    'title'    => 'CRM Platform for Growing Businesses',
    'client'   => 'Gometa',
    'url'      => 'https://gometa.com.au/',
    'category' => 'crm',
    'catLabel' => 'CRM, Automation & AI',
    'year'     => '2024',
    'summary'  => 'Best Innovative CRM Solutions Australia for Business Growth — CRM, learning management and email marketing tailored for transport, logistics, NDIS, nursing agencies, finance and education.',
    'tags'     => ['CRM', 'LMS', 'Email Marketing', 'SaaS'],
    'accent'   => 'indigo',
    'stat'     => ['8+', 'industries served'],
    'mobileShot' => '/assets/images/portfolio/cache/gometa-mobile.jpg',
  ],
];

$categories = [
  'all'       => 'All Work',
  'websites'  => 'Websites',
  'software'  => 'Software & AI',
  'crm'       => 'CRM',
];
?>

<main id="main">

<!-- ============ STYLES ============ -->
<style>
/* -------------------------------------------------------------------------- */
/*  PORTFOLIO — Device-Mockup Showcase                                        */
/* -------------------------------------------------------------------------- */
.pf {
  background: radial-gradient(circle at 20% 0%, #1e1b4b 0%, #0b0f1e 55%);
  color: #e8ecf5; padding: calc(var(--header-height, 122px) + 60px) 0 60px;
  position: relative; overflow: hidden;
}
.pf__bg-glow {
  position: absolute; inset: 0; pointer-events: none;
  background:
    radial-gradient(circle at 85% 15%, rgba(236,72,153,0.20), transparent 40%),
    radial-gradient(circle at 10% 85%, rgba(99,102,241,0.28), transparent 45%);
  animation: pfGlowShift 18s ease-in-out infinite alternate;
}
@keyframes pfGlowShift {
  0%   { transform: translate(0, 0) scale(1); }
  50%  { transform: translate(-2%, 1%) scale(1.05); }
  100% { transform: translate(2%, -1%) scale(1.02); }
}
/* Floating orbs */
.pf__orb {
  position: absolute; pointer-events: none; z-index: 1;
  width: 320px; height: 320px; border-radius: 50%;
  filter: blur(80px); opacity: 0.35;
}
.pf__orb--1 { top: 8%; left: -80px;  background: radial-gradient(circle, #8b5cf6, transparent 70%); animation: pfOrb 22s ease-in-out infinite; }
.pf__orb--2 { top: 40%; right: -100px; background: radial-gradient(circle, #ec4899, transparent 70%); animation: pfOrb 26s ease-in-out infinite reverse; }
.pf__orb--3 { bottom: 10%; left: 30%;  background: radial-gradient(circle, #60a5fa, transparent 70%); animation: pfOrb 30s ease-in-out infinite; }
@keyframes pfOrb {
  0%,100% { transform: translate(0,0); }
  50%     { transform: translate(40px, -30px); }
}
.pf__grid-bg {
  position: absolute; inset: 0; pointer-events: none;
  background-image:
    linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
  background-size: 60px 60px;
  mask-image: radial-gradient(ellipse at 50% 0%, black 30%, transparent 75%);
}
.pf .container { position: relative; z-index: 2; }

/* Hero */
.pf__head { text-align: center; max-width: 800px; margin: 0 auto 56px; }
.pf__kicker {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 8px 16px; background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.12); border-radius: 100px;
  font-size: 12px; letter-spacing: 3px; text-transform: uppercase;
  color: #c7d2fe; font-weight: 600;
}
.pf__kicker i {
  width: 6px; height: 6px; background: #a78bfa; border-radius: 50%;
  box-shadow: 0 0 12px #a78bfa;
}
.pf__title {
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: clamp(2.4rem, 5.5vw, 4.5rem);
  font-weight: 800; line-height: 1.05; letter-spacing: -0.03em;
  margin: 20px 0 20px; color: #ffffff;
}
.pf__title-grad {
  background: linear-gradient(120deg, #a78bfa 0%, #60a5fa 40%, #f472b6 70%, #a78bfa 100%);
  background-size: 200% auto;
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
  animation: pfGradSlide 6s ease-in-out infinite alternate;
}
@keyframes pfGradSlide {
  0%   { background-position: 0% center; }
  100% { background-position: 100% center; }
}
.pf__lead {
  font-size: 1.15rem; line-height: 1.65; color: #9aa4bd; max-width: 680px; margin: 0 auto;
}

/* Filter tabs */
.pf__filters {
  display: flex; flex-wrap: wrap; justify-content: center; gap: 10px;
  margin: 0 auto 60px; max-width: 900px;
}
.pf__filter {
  padding: 10px 22px; background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.10); border-radius: 100px;
  color: #9aa4bd; font-size: 14px; font-weight: 600; cursor: pointer;
  transition: all 0.2s;
}
.pf__filter:hover { color: #fff; border-color: rgba(255,255,255,0.25); }
.pf__filter.is-active {
  background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff;
  border-color: transparent; box-shadow: 0 10px 30px -12px rgba(99,102,241,0.6);
}

/* -------- CAROUSEL WRAPPER -------- */
.pf__carousel { position: relative; max-width: 1280px; margin: 0 auto; padding: 0 8px; }
.pf__cases {
  display: flex;
  gap: 32px;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  scroll-padding-inline: 8px;
  padding: 20px 8px 40px;
  scrollbar-width: none;
  -webkit-overflow-scrolling: touch;
}
.pf__cases::-webkit-scrollbar { display: none; }

/* Prev / next buttons */
.pf__nav {
  position: absolute; top: 50%; transform: translateY(-50%);
  z-index: 5;
  width: 52px; height: 52px; border-radius: 50%;
  display: grid; place-items: center;
  background: rgba(255,255,255,0.08);
  color: #fff;
  border: 1px solid rgba(255,255,255,0.14);
  cursor: pointer;
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  transition: background .2s ease, transform .2s ease, opacity .2s ease;
}
.pf__nav:hover { background: rgba(255,255,255,0.16); transform: translateY(-50%) scale(1.05); }
.pf__nav:disabled { opacity: 0.3; cursor: not-allowed; }
.pf__nav--prev { left: -20px; }
.pf__nav--next { right: -20px; }
.pf__nav svg { width: 22px; height: 22px; }

/* Dot indicators */
.pf__dots {
  display: flex; justify-content: center; gap: 10px;
  margin-top: 8px;
}
.pf__dot {
  width: 10px; height: 10px; border-radius: 50%;
  background: rgba(255,255,255,0.15);
  border: 0; padding: 0; cursor: pointer;
  transition: background .25s ease, transform .25s ease, width .3s ease;
}
.pf__dot:hover { background: rgba(255,255,255,0.35); }
.pf__dot.is-active {
  background: linear-gradient(135deg, #7c3aed, #3b82f6);
  width: 28px; border-radius: 999px;
}

.pf-case {
  display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center;
  padding: 40px; border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,0.045), rgba(255,255,255,0.015));
  border: 1px solid rgba(255,255,255,0.08);
  transition: transform 0.4s cubic-bezier(.2,.7,.2,1), border-color 0.3s, box-shadow 0.4s;
  position: relative; overflow: hidden;
  flex: 0 0 100%;
  scroll-snap-align: start;
  min-width: 0;
}
.pf-case.is-visible { opacity: 1; transform: none; }
.pf-case.is-hidden { display: none !important; }

/* Slide-in transition: each case's content fades/slides in as it becomes the active slide */
.pf-case__body, .pf-devices {
  opacity: 0; transform: translateY(22px);
  transition: opacity 0.7s cubic-bezier(.2,.7,.2,1), transform 0.7s cubic-bezier(.2,.7,.2,1);
}
.pf-case.in-view .pf-case__body { opacity: 1; transform: none; }
.pf-case.in-view .pf-devices { opacity: 1; transform: none; transition-delay: 0.12s; }
@media (max-width: 900px) {
  .pf-case { grid-template-columns: 1fr; gap: 28px; padding: 26px 22px; }
  .pf__nav--prev { left: 4px; }
  .pf__nav--next { right: 4px; }
  .pf__nav { width: 40px; height: 40px; }
}
.pf-case:hover {
  border-color: color-mix(in srgb, var(--case-accent) 45%, transparent);
  box-shadow: 0 40px 90px -30px rgba(0,0,0,0.75),
              0 0 60px -20px color-mix(in srgb, var(--case-accent) 55%, transparent);
  transform: translateY(-4px);
}
.pf-case:hover .pf-laptop { transform: translateY(-6px) rotate(-0.4deg); }
.pf-case:hover .pf-phone  { transform: translateY(-4px) rotate(1.2deg); }
.pf-laptop, .pf-phone { transition: transform 0.5s cubic-bezier(.2,.7,.2,1); }

/* Case number */
.pf-case__num {
  position: absolute; top: 20px; right: 24px; z-index: 4;
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: 4rem; font-weight: 900; line-height: 1;
  color: transparent;
  -webkit-text-stroke: 1px color-mix(in srgb, var(--case-accent) 40%, transparent);
  letter-spacing: -0.05em;
  opacity: 0.55; pointer-events: none;
}
.pf-case:nth-child(even) .pf-case__body { order: -1; }
.pf-case::before {
  content: ''; position: absolute; top: -1px; left: 40px; right: 40px; height: 1px;
  background: linear-gradient(90deg, transparent, var(--case-accent), transparent);
  opacity: 0.6;
}
.pf-case.is-hidden { display: none; }

/* Accent per case */
.pf-case--purple { --case-accent: #a855f7; --case-g1: #4c1d95; --case-g2: #7c3aed; --case-g3: #a855f7; }
.pf-case--indigo { --case-accent: #6366f1; --case-g1: #1e3a8a; --case-g2: #4f46e5; --case-g3: #6366f1; }
.pf-case--orange { --case-accent: #f59e0b; --case-g1: #7c2d12; --case-g2: #ea580c; --case-g3: #f59e0b; }
.pf-case--green  { --case-accent: #10b981; --case-g1: #14532d; --case-g2: #059669; --case-g3: #10b981; }

/* Case body */
.pf-case__cat {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 6px 14px; background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.14); border-radius: 100px;
  font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
  color: var(--case-accent); font-weight: 700;
}
.pf-case__cat::before {
  content: ''; width: 6px; height: 6px; background: var(--case-accent);
  border-radius: 50%; box-shadow: 0 0 10px var(--case-accent);
}
.pf-case__year {
  margin-left: 10px; font-size: 11px; color: #9aa4bd; letter-spacing: 1.5px;
}
.pf-case__client {
  margin-top: 20px; font-size: 12px; letter-spacing: 3px; text-transform: uppercase;
  color: #9aa4bd; font-weight: 700;
}
.pf-case__title {
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: clamp(1.5rem, 2.4vw, 2rem); font-weight: 800;
  line-height: 1.15; letter-spacing: -0.02em; color: #fff; margin: 10px 0 16px;
}
.pf-case__summary { color: #b8c1d9; line-height: 1.7; font-size: 0.98rem; margin: 0 0 20px; }
.pf-case__tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 24px; }
.pf-case__tag {
  padding: 4px 10px; background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.10); border-radius: 6px;
  font-size: 11px; color: #c7d2fe; font-weight: 600; letter-spacing: 0.02em;
}
.pf-case__stat {
  display: inline-flex; align-items: baseline; gap: 10px;
  padding: 14px 20px; border-radius: 12px;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.08);
  margin-bottom: 24px;
}
.pf-case__stat-n {
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: 1.8rem; font-weight: 800; color: var(--case-accent); letter-spacing: -0.03em; line-height: 1;
}
.pf-case__stat-l { font-size: 12px; color: #9aa4bd; letter-spacing: 1px; }
.pf-case__actions { display: flex; flex-wrap: wrap; gap: 10px; }
.pf-case__btn {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 22px; border-radius: 100px;
  font-size: 13px; font-weight: 700; letter-spacing: 0.02em; text-decoration: none;
  transition: all 0.2s;
}
.pf-case__btn--primary {
  background: linear-gradient(135deg, #6366f1, #8b5cf6); color: #fff;
  box-shadow: 0 12px 30px -12px rgba(99,102,241,0.6);
}
.pf-case__btn--primary:hover { transform: translateY(-2px); box-shadow: 0 18px 40px -12px rgba(99,102,241,0.8); }
.pf-case__btn--ghost {
  background: rgba(255,255,255,0.04); color: #c7d2fe;
  border: 1px solid rgba(255,255,255,0.14);
}
.pf-case__btn--ghost:hover { background: rgba(255,255,255,0.08); color: #fff; }

/* -------- DEVICE MOCKUPS -------- */
.pf-devices {
  position: relative; padding: 20px; min-height: 340px;
  display: flex; align-items: center; justify-content: center;
}
.pf-devices::before {
  content: ''; position: absolute; inset: 0; z-index: 0;
  background:
    radial-gradient(ellipse at center, var(--case-accent) 0%, transparent 65%);
  opacity: 0.15; filter: blur(40px);
}

/* Laptop frame */
.pf-laptop {
  position: relative; z-index: 1; width: 100%; max-width: 480px;
  background: #0f172a;
  border-radius: 14px 14px 6px 6px;
  padding: 26px 12px 14px;
  box-shadow: 0 30px 60px -20px rgba(0,0,0,0.7),
              0 0 0 1px rgba(255,255,255,0.08),
              inset 0 1px 0 rgba(255,255,255,0.06);
}
.pf-laptop__bar {
  position: absolute; top: 0; left: 0; right: 0; height: 26px;
  background: linear-gradient(180deg, #1e293b, #0f172a);
  border-radius: 14px 14px 0 0;
  display: flex; align-items: center; gap: 6px;
  padding: 0 14px;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}
.pf-laptop__dot { width: 10px; height: 10px; border-radius: 50%; }
.pf-laptop__dot:nth-child(1) { background: #ef4444; }
.pf-laptop__dot:nth-child(2) { background: #f59e0b; }
.pf-laptop__dot:nth-child(3) { background: #22c55e; }
.pf-laptop__url {
  margin-left: auto; margin-right: auto;
  padding: 3px 12px; background: rgba(255,255,255,0.06);
  border-radius: 20px; font-size: 10px; color: #94a3b8;
  font-family: 'Fira Code', 'Consolas', monospace;
  letter-spacing: 0.3px;
  transform: translateX(-8px);
}
.pf-laptop__screen {
  position: relative;
  aspect-ratio: 16/10;
  border-radius: 4px; overflow: hidden;
  background:
    linear-gradient(135deg, var(--case-g1), var(--case-g2) 50%, var(--case-g3)) center/cover;
}
.pf-laptop__screen img {
  width: 100%; height: 100%; object-fit: cover; object-position: top center;
  display: block;
  animation: fadeIn 0.6s ease;
}
.pf-laptop__screen img.pf-mshot--contain {
  object-fit: contain;
  object-position: center;
  background: #0b1120;
}
.pf-laptop__base {
  position: absolute; bottom: -8px; left: -8%; right: -8%; height: 10px;
  background: linear-gradient(180deg, #1e293b, #0b0f1e);
  border-radius: 0 0 12px 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}
.pf-laptop__base::after {
  content: ''; position: absolute; left: 50%; top: 3px; transform: translateX(-50%);
  width: 60px; height: 4px; background: rgba(255,255,255,0.06); border-radius: 0 0 6px 6px;
}

/* Phone frame */
.pf-phone {
  position: absolute; right: -10px; bottom: -18px; z-index: 3;
  width: 110px;
  background: #0f172a;
  border-radius: 18px;
  padding: 14px 6px 12px;
  box-shadow: 0 20px 40px -14px rgba(0,0,0,0.8),
              0 0 0 1px rgba(255,255,255,0.10),
              inset 0 1px 0 rgba(255,255,255,0.08);
}
.pf-phone::before {
  content: ''; position: absolute; top: 6px; left: 50%; transform: translateX(-50%);
  width: 38px; height: 4px; background: #000; border-radius: 4px;
}
.pf-phone__screen {
  aspect-ratio: 9/19; border-radius: 8px; overflow: hidden;
  background: linear-gradient(135deg, var(--case-g1), var(--case-g3));
}
.pf-phone__screen img {
  width: 100%; height: 100%; object-fit: cover; object-position: top center;
  display: block;
  animation: fadeIn 0.6s ease;
}

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

/* Domain badge overlay when screenshot is loading */
.pf-loading-badge {
  position: absolute; z-index: 2;
  top: 50%; left: 50%; transform: translate(-50%, -50%);
  padding: 8px 16px; border-radius: 100px;
  background: rgba(0,0,0,0.5); backdrop-filter: blur(8px);
  color: #fff; font-size: 11px; letter-spacing: 1.5px;
  text-transform: uppercase; font-weight: 700; opacity: 0.9;
  pointer-events: none;
  border: 1px solid rgba(255,255,255,0.15);
}

/* -------- Responsive -------- */
@media (max-width: 900px) {
  .pf-case { grid-template-columns: 1fr; gap: 40px; padding: 32px 24px; }
  .pf-case:nth-child(even) .pf-case__body { order: 0; }
  .pf-devices { min-height: 300px; }
  .pf-laptop { max-width: 380px; }
  .pf-phone { width: 90px; right: 0; }
}
@media (max-width: 500px) {
  .pf { padding: calc(var(--header-height, 70px) + 30px) 0 40px; }
  .pf-case { padding: 24px 18px; gap: 28px; }
  .pf-laptop { max-width: 100%; padding: 22px 8px 10px; }
  .pf-phone { width: 76px; right: -6px; bottom: -12px; }
  .pf-case__actions .pf-case__btn { flex: 1; justify-content: center; }
}

/* -------- Stats strip -------- */
.pf-stats {
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.08); border-radius: 20px;
  padding: 40px 48px; margin: 100px auto 0; max-width: 1100px;
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px;
  backdrop-filter: blur(8px);
}
@media (max-width: 700px) { .pf-stats { grid-template-columns: repeat(2, 1fr); padding: 32px 24px; gap: 32px 20px; } }
.pf-stats__item {
  text-align: center; padding: 24px 12px; border-radius: 16px;
  transition: transform 0.3s ease, background 0.3s ease;
  cursor: default;
}
.pf-stats__item:hover {
  background: rgba(255,255,255,0.04);
  transform: translateY(-4px);
}
.pf-stats__num {
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: 2.6rem; font-weight: 800; line-height: 1;
  background: linear-gradient(135deg, #a78bfa, #60a5fa);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
  letter-spacing: -0.03em;
}
.pf-stats__lbl { font-size: 12px; color: #9aa4bd; text-transform: uppercase; letter-spacing: 2px; margin-top: 8px; font-weight: 600; }

/* -------- CTA -------- */
.pf-cta { padding: 100px 20px; text-align: center; }
.pf-cta__title {
  font-family: 'Poppins', system-ui, sans-serif;
  font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; letter-spacing: -0.02em;
  margin: 0 0 16px;
  background: linear-gradient(120deg, #fff 30%, #a78bfa 90%);
  -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
}
.pf-cta__lead { color: #9aa4bd; font-size: 1.1rem; margin: 0 auto 32px; max-width: 560px; line-height: 1.6; }
.pf-cta__btn {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 16px 32px; border-radius: 100px;
  background: linear-gradient(135deg, #6366f1, #8b5cf6);
  color: #fff; text-decoration: none; font-weight: 700; font-size: 15px;
  box-shadow: 0 20px 50px -18px rgba(99,102,241,0.6);
  transition: all 0.25s;
}
.pf-cta__btn:hover { transform: translateY(-2px); box-shadow: 0 26px 60px -18px rgba(99,102,241,0.8); }
</style>

<!-- ============ PORTFOLIO ============ -->
<section class="pf">
  <div class="pf__bg-glow"></div>
  <div class="pf__grid-bg"></div>
  <span class="pf__orb pf__orb--1" aria-hidden="true"></span>
  <span class="pf__orb pf__orb--2" aria-hidden="true"></span>
  <span class="pf__orb pf__orb--3" aria-hidden="true"></span>

  <div class="container">
    <div class="pf__head">
      <span class="pf__kicker"><i></i>Portfolio &middot; Selected Projects</span>
      <h1 class="pf__title">Work we're<br><span class="pf__title-grad">quietly proud of.</span></h1>
      <p class="pf__lead">Real client platforms and websites — shown on desktop and mobile — delivered by specialised Nubevest teams under one accountable relationship.</p>
    </div>

    <!-- Filter tabs -->
    <div class="pf__filters" role="tablist">
      <?php foreach ($categories as $key => $label): ?>
        <button type="button" class="pf__filter <?= $key === 'all' ? 'is-active' : '' ?>" data-filter="<?= $key ?>"><?= htmlspecialchars($label) ?></button>
      <?php endforeach; ?>
    </div>

    <!-- Case studies (horizontal banner carousel) -->
    <div class="pf__carousel">
      <button type="button" class="pf__nav pf__nav--prev" id="pfPrev" aria-label="Previous project">
        <svg viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button type="button" class="pf__nav pf__nav--next" id="pfNext" aria-label="Next project">
        <svg viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <div class="pf__cases" id="pfCases">
      <?php foreach ($projects as $i => $p):
        $domain = preg_replace('#https?://|/$#', '', $p['url']);
      ?>
      <article class="pf-case pf-case--<?= $p['accent'] ?>" data-cat="<?= $p['category'] ?>">
        <span class="pf-case__num" aria-hidden="true"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>

        <!-- Body -->
        <div class="pf-case__body">
          <div>
            <span class="pf-case__cat"><?= htmlspecialchars($p['catLabel']) ?></span>
            <span class="pf-case__year"><?= htmlspecialchars($p['year']) ?></span>
          </div>
          <div class="pf-case__client"><?= htmlspecialchars($p['client']) ?></div>
          <h2 class="pf-case__title"><?= htmlspecialchars($p['title']) ?></h2>
          <p class="pf-case__summary"><?= htmlspecialchars($p['summary']) ?></p>

          <div class="pf-case__tags">
            <?php foreach ($p['tags'] as $t): ?>
              <span class="pf-case__tag"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>

          <div class="pf-case__stat">
            <span class="pf-case__stat-n"><?= htmlspecialchars($p['stat'][0]) ?></span>
            <span class="pf-case__stat-l"><?= htmlspecialchars($p['stat'][1]) ?></span>
          </div>

          <div class="pf-case__actions">
            <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener" class="pf-case__btn pf-case__btn--primary">
              Visit live site
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M7 17L17 7M9 7h8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="/contact" class="pf-case__btn pf-case__btn--ghost">Discuss a similar project</a>
          </div>
        </div>

        <!-- Device mockups -->
        <div class="pf-devices">
          <!-- Laptop -->
          <div class="pf-laptop">
            <div class="pf-laptop__bar">
              <span class="pf-laptop__dot"></span>
              <span class="pf-laptop__dot"></span>
              <span class="pf-laptop__dot"></span>
              <span class="pf-laptop__url"><?= htmlspecialchars($domain) ?></span>
            </div>
            <div class="pf-laptop__screen">
              <span class="pf-loading-badge">Generating preview…</span>
<?php
                $desktopSrc = nv_shot($p['url'], 1200);
                $desktopFit = '';
                if (!empty($p['desktopShot'])) {
                    $dAbs = __DIR__ . $p['desktopShot'];
                    if (is_file($dAbs)) {
                        $desktopSrc = $p['desktopShot'] . '?v=' . filemtime($dAbs);
                        $desktopFit = ' pf-mshot--contain';
                    }
                }
              ?>
              <img class="pf-mshot<?= $desktopFit ?>" data-mshot-min="600" src="<?= htmlspecialchars($desktopSrc) ?>" alt="<?= htmlspecialchars($p['client']) ?> — desktop view" loading="lazy" onerror="this.remove()">
            </div>
            <div class="pf-laptop__base"></div>
          </div>
          <!-- Phone -->
          <div class="pf-phone">
            <div class="pf-phone__screen">
<?php
                $mobileSrc = nv_shot($p['url'], 400);
                if (!empty($p['mobileShot'])) {
                    $mAbs = __DIR__ . $p['mobileShot'];
                    if (is_file($mAbs)) {
                        $mobileSrc = $p['mobileShot'] . '?v=' . filemtime($mAbs);
                    }
                }
              ?>
              <img class="pf-mshot" data-mshot-min="250" src="<?= htmlspecialchars($mobileSrc) ?>" alt="<?= htmlspecialchars($p['client']) ?> — mobile view" loading="lazy" onerror="this.remove()">
            </div>
          </div>
        </div>

      </article>
      <?php endforeach; ?>
      </div>
      <div class="pf__dots" id="pfDots" role="tablist" aria-label="Project navigation"></div>
    </div>

    <!-- Stats -->
    <div class="pf-stats">
      <div class="pf-stats__item"><div class="pf-stats__num">120+</div><div class="pf-stats__lbl">Projects Delivered</div></div>
      <div class="pf-stats__item"><div class="pf-stats__num">50+</div><div class="pf-stats__lbl">Active Clients</div></div>
      <div class="pf-stats__item"><div class="pf-stats__num">3</div><div class="pf-stats__lbl">Business Hubs</div></div>
      <div class="pf-stats__item"><div class="pf-stats__num">6</div><div class="pf-stats__lbl">Years Since 2019</div></div>
    </div>
  </div>

  <!-- CTA -->
  <div class="pf-cta">
    <div class="container">
      <h2 class="pf-cta__title">Have a project in mind?</h2>
      <p class="pf-cta__lead">Tell us the business problem — we'll bring the right specialist team to solve it under one accountable relationship.</p>
      <a href="/contact" class="pf-cta__btn">
        Book a Call
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>
</section>

<script>
/* Horizontal carousel + filter behaviour */
(function() {
  const filters = document.querySelectorAll('.pf__filter');
  const track   = document.getElementById('pfCases');
  const cases   = Array.from(document.querySelectorAll('.pf-case'));
  const prev    = document.getElementById('pfPrev');
  const next    = document.getElementById('pfNext');
  const dotsBox = document.getElementById('pfDots');
  if (!track) return;

  cases.forEach(c => c.classList.add('is-visible'));

  let visible = cases.slice();
  let dots    = [];

  function buildDots() {
    dotsBox.innerHTML = '';
    dots = visible.map((_, idx) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.className = 'pf__dot' + (idx === 0 ? ' is-active' : '');
      b.setAttribute('aria-label', 'Go to project ' + (idx + 1));
      b.addEventListener('click', () => scrollToIndex(idx));
      dotsBox.appendChild(b);
      return b;
    });
  }

  function currentIndex() {
    if (!visible.length) return 0;
    const scrollX = track.scrollLeft;
    let best = 0, bestDist = Infinity;
    visible.forEach((el, i) => {
      const d = Math.abs(el.offsetLeft - scrollX);
      if (d < bestDist) { bestDist = d; best = i; }
    });
    return best;
  }

  function updateControls() {
    const i = currentIndex();
    dots.forEach((d, idx) => d.classList.toggle('is-active', idx === i));
    prev.disabled = (i <= 0);
    next.disabled = (i >= visible.length - 1);
  }

  function scrollToIndex(i) {
    if (!visible[i]) return;
    track.scrollTo({ left: visible[i].offsetLeft - track.offsetLeft, behavior: reduceMotion ? 'auto' : 'smooth' });
  }

  prev.addEventListener('click', () => { scrollToIndex(Math.max(0, currentIndex() - 1)); restartAutoplay(); });
  next.addEventListener('click', () => { scrollToIndex(Math.min(visible.length - 1, currentIndex() + 1)); restartAutoplay(); });

  let scrollTimer;
  track.addEventListener('scroll', () => {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(updateControls, 60);
  });

  /* -------- Autoplay -------- */
  const AUTOPLAY_MS = 5000;
  const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let autoplayTimer = null;

  function goNext() {
    const i = currentIndex();
    const nextI = (i >= visible.length - 1) ? 0 : i + 1;
    scrollToIndex(nextI);
  }

  function startAutoplay() {
    if (visible.length <= 1) return;
    stopAutoplay();
    autoplayTimer = setInterval(goNext, AUTOPLAY_MS);
  }

  function stopAutoplay() {
    if (autoplayTimer) { clearInterval(autoplayTimer); autoplayTimer = null; }
  }

  function restartAutoplay() { stopAutoplay(); startAutoplay(); }

  const carouselEl = document.querySelector('.pf__carousel');
  carouselEl.addEventListener('touchstart', stopAutoplay, { passive: true });
  carouselEl.addEventListener('touchend', startAutoplay, { passive: true });
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stopAutoplay(); else startAutoplay();
  });
  dotsBox.addEventListener('click', restartAutoplay);

  function applyFilter(cat) {
    visible = [];
    cases.forEach(c => {
      const show = (cat === 'all' || c.dataset.cat === cat);
      c.classList.toggle('is-hidden', !show);
      if (show) visible.push(c);
    });
    buildDots();
    track.scrollTo({ left: 0, behavior: 'auto' });
    updateControls();
    restartAutoplay();
  }

  filters.forEach(btn => {
    btn.addEventListener('click', () => {
      filters.forEach(f => f.classList.remove('is-active'));
      btn.classList.add('is-active');
      applyFilter(btn.dataset.filter);
    });
  });

  // Initial setup
  buildDots();
  updateControls();
  window.addEventListener('resize', updateControls);
  startAutoplay();

  // Slide-in transition: (re)play the fade/slide-up as each case becomes active
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        entry.target.classList.toggle('in-view', entry.isIntersecting);
      });
    }, { root: track, threshold: 0.6 });
    cases.forEach(c => io.observe(c));
  } else {
    cases.forEach(c => c.classList.add('in-view'));
  }
})();

/* Stats counter animation */
(function() {
  const nums = document.querySelectorAll('.pf-stats__num');
  if (!('IntersectionObserver' in window) || !nums.length) return;
  const animate = (el) => {
    const raw = el.textContent.trim();
    const m = raw.match(/^(\d+)(\D*)$/);
    if (!m) return;
    const target = parseInt(m[1], 10);
    const suffix = m[2] || '';
    const dur = 1400; const start = performance.now();
    const tick = (now) => {
      const t = Math.min(1, (now - start) / dur);
      const eased = 1 - Math.pow(1 - t, 3);
      el.textContent = Math.round(target * eased) + suffix;
      if (t < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { animate(e.target); io.unobserve(e.target); } });
  }, { threshold: 0.6 });
  nums.forEach(n => io.observe(n));
})();

/* mshots preview auto-retry
   WordPress mshots returns a "Generating Preview…" placeholder the first time
   a URL is requested, then caches the real screenshot. Detect the placeholder
   by naturalWidth being smaller than the requested render width, and refetch
   with a cache-buster until the real image arrives (or we give up). */
(function() {
  const MAX_RETRIES = 8;
  const DELAY_MS    = 5000;
  const imgs = document.querySelectorAll('img.pf-mshot');

  imgs.forEach(img => {
    let attempts = 0;
    const min = parseInt(img.dataset.mshotMin || '600', 10);
    const baseSrc = img.getAttribute('src');

    function onLoad() {
      if (img.naturalWidth === 0) return;
      if (img.naturalWidth < min && attempts < MAX_RETRIES) {
        attempts++;
        setTimeout(() => {
          const sep = baseSrc.indexOf('?') >= 0 ? '&' : '?';
          img.src = baseSrc + sep + '_r=' + Date.now();
        }, DELAY_MS);
      } else {
        img.classList.add('is-ready');
        const laptopScreen = img.closest('.pf-laptop__screen');
        if (laptopScreen) {
          const badge = laptopScreen.querySelector('.pf-loading-badge');
          if (badge) badge.remove();
        }
      }
    }

    img.addEventListener('load', onLoad);
    if (img.complete && img.naturalWidth > 0) onLoad();
  });
})();
</script>

</main>

<?php include 'includes/footer.php'; ?>
