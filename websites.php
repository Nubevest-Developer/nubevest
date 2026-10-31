<?php
$page = 'websites';
$seo_title = 'Website Packages & Pricing | Nubevest';
$meta_desc = 'Compare website packages from $69 per month. Mobile-friendly websites for Australian small businesses with hosting, SSL and optional care plans included.';
include 'includes/header.php';
?>

<style>
/* ============================================================
   WEBSITES PAGE
   ============================================================ */

/* --- Hero --- */
.wp-hero {
  position: relative;
  background: linear-gradient(165deg, #0a1628 0%, #0f1d33 40%, #162541 100%);
  padding: 140px 0 80px;
  overflow: hidden;
  color: #fff;
}
.wp-hero::before {
  content: '';
  position: absolute; inset: 0;
  background:
    radial-gradient(ellipse 600px 400px at 30% 20%, rgba(66,133,244,0.12), transparent),
    radial-gradient(ellipse 500px 500px at 80% 70%, rgba(124,58,237,0.10), transparent);
  pointer-events: none;
}
.wp-hero__inner {
  position: relative;
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px;
  text-align: center;
}
.wp-hero__kicker {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  color: #60a5fa;
  margin-bottom: 20px;
}
.wp-hero__kicker i {
  width: 6px; height: 6px;
  border-radius: 50%;
  background: #3b82f6;
  display: inline-block;
}
.wp-hero__title {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 5vw, 3.2rem);
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.02em;
  margin-bottom: 16px;
}
.wp-hero__title span {
  background: linear-gradient(90deg, #60a5fa, #a78bfa);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}
.wp-hero__lead {
  font-size: 1.1rem;
  color: #94a3b8;
  max-width: 600px;
  margin: 0 auto 28px;
  line-height: 1.7;
}
.wp-hero__price-hint {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(59,130,246,0.12);
  border: 1px solid rgba(59,130,246,0.25);
  border-radius: 999px;
  padding: 8px 20px;
  font-size: 0.95rem;
  font-weight: 700;
  color: #93c5fd;
}
.wp-hero__price-hint strong {
  font-size: 1.3rem;
  color: #fff;
}

/* --- Toggle --- */
.wp-toggle {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 14px;
  margin: 48px 0 36px;
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--gray-500);
}
.wp-toggle__label { cursor: pointer; transition: color .2s; }
.wp-toggle__label--active { color: var(--gray-900); }
.wp-toggle__switch {
  position: relative;
  width: 52px; height: 28px;
  background: var(--gray-200);
  border-radius: 999px;
  cursor: pointer;
  transition: background .2s;
  border: none;
  padding: 0;
}
.wp-toggle__switch::after {
  content: '';
  position: absolute;
  top: 3px; left: 3px;
  width: 22px; height: 22px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 1px 4px rgba(0,0,0,0.15);
  transition: transform .2s;
}
.wp-toggle__switch[aria-checked="true"] {
  background: #3b82f6;
}
.wp-toggle__switch[aria-checked="true"]::after {
  transform: translateX(24px);
}

/* --- Pricing Cards --- */
.wp-plans {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px 80px;
}
.wp-plans__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  align-items: start;
}
.wp-card {
  position: relative;
  background: #fff;
  border: 1px solid var(--gray-200);
  border-radius: 20px;
  padding: 32px 28px 28px;
  transition: box-shadow .3s, transform .3s;
}
.wp-card:hover {
  box-shadow: 0 20px 50px -15px rgba(15,23,42,0.15);
  transform: translateY(-4px);
}
.wp-card--popular {
  border-color: #3b82f6;
  box-shadow: 0 0 0 1px #3b82f6, 0 20px 50px -15px rgba(59,130,246,0.25);
}
.wp-card__badge {
  position: absolute;
  top: -13px; left: 50%;
  transform: translateX(-50%);
  background: linear-gradient(90deg, #3b82f6, #7c3aed);
  color: #fff;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  padding: 5px 16px;
  border-radius: 999px;
  white-space: nowrap;
}
.wp-card__name {
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 800;
  color: var(--gray-900);
  margin-bottom: 4px;
}
.wp-card__pages {
  font-size: 0.85rem;
  color: var(--gray-500);
  margin-bottom: 20px;
  font-weight: 600;
}
.wp-card__price {
  font-family: var(--font-heading);
  font-size: 2.5rem;
  font-weight: 800;
  color: var(--gray-900);
  letter-spacing: -0.02em;
  line-height: 1;
}
.wp-card__price sup {
  font-size: 1.2rem;
  font-weight: 700;
  vertical-align: super;
  color: var(--gray-500);
}
.wp-card__period {
  font-size: 0.82rem;
  color: var(--gray-400);
  font-weight: 600;
  margin: 4px 0 0;
}
.wp-card__total {
  font-size: 0.8rem;
  color: var(--gray-500);
  margin: 8px 0 0;
  font-weight: 600;
  padding: 6px 10px;
  background: var(--gray-50);
  border-radius: 8px;
  display: inline-block;
}
.wp-card__divider {
  height: 1px;
  background: var(--gray-200);
  margin: 20px 0;
}
.wp-card__features {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.wp-card__features li {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 0.88rem;
  color: var(--gray-700);
  line-height: 1.4;
}
.wp-card__features li svg {
  flex-shrink: 0;
  margin-top: 2px;
}
.wp-card__cta {
  display: block;
  text-align: center;
  margin-top: 24px;
  padding: 13px 20px;
  border-radius: 12px;
  font-size: 0.9rem;
  font-weight: 700;
  text-decoration: none;
  transition: all .2s;
}
.wp-card__cta--primary {
  background: #3b82f6;
  color: #fff;
}
.wp-card__cta--primary:hover { background: #2563eb; }
.wp-card__cta--outline {
  background: transparent;
  color: var(--gray-900);
  border: 1.5px solid var(--gray-200);
}
.wp-card__cta--outline:hover { border-color: #3b82f6; color: #3b82f6; }

/* --- Inclusions --- */
.wp-inclusions {
  background: var(--gray-50);
  padding: 80px 0;
}
.wp-inclusions__inner {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px;
}
.wp-inclusions__header {
  text-align: center;
  margin-bottom: 48px;
}
.wp-inclusions__title {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 4vw, 2.2rem);
  font-weight: 800;
  color: var(--gray-900);
  margin-bottom: 12px;
}
.wp-inclusions__lead {
  font-size: 1rem;
  color: var(--gray-500);
  max-width: 540px;
  margin: 0 auto;
}
.wp-inc-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}
.wp-inc-card {
  background: #fff;
  border: 1px solid var(--gray-200);
  border-radius: 16px;
  padding: 28px;
}
.wp-inc-card__icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: grid;
  place-items: center;
  margin-bottom: 16px;
}
.wp-inc-card__icon--blue  { background: #eff6ff; color: #3b82f6; }
.wp-inc-card__icon--green { background: #f0fdf4; color: #10b981; }
.wp-inc-card__icon--amber { background: #fffbeb; color: #f59e0b; }
.wp-inc-card__icon--purple{ background: #faf5ff; color: #8b5cf6; }
.wp-inc-card h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--gray-900);
  margin-bottom: 8px;
}
.wp-inc-card p {
  font-size: 0.9rem;
  color: var(--gray-600);
  line-height: 1.6;
}

/* --- Not Included --- */
.wp-not-inc {
  max-width: 800px;
  margin: 40px auto 0;
  background: #fff;
  border: 1px solid #fde68a;
  border-radius: 16px;
  padding: 24px 28px;
}
.wp-not-inc h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--gray-900);
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.wp-not-inc ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 6px 20px;
}
.wp-not-inc li {
  font-size: 0.88rem;
  color: var(--gray-600);
  display: flex;
  align-items: center;
  gap: 8px;
}

/* --- Care --- */
.wp-care {
  padding: 80px 0;
}
.wp-care__inner {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px;
}
.wp-care__header {
  text-align: center;
  margin-bottom: 48px;
}
.wp-care__title {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 4vw, 2.2rem);
  font-weight: 800;
  color: var(--gray-900);
  margin-bottom: 12px;
}
.wp-care__lead {
  font-size: 1rem;
  color: var(--gray-500);
  max-width: 540px;
  margin: 0 auto;
}
.wp-care__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px;
  max-width: 820px;
  margin: 0 auto;
}
.wp-care-card {
  background: #fff;
  border: 1px solid var(--gray-200);
  border-radius: 20px;
  padding: 32px 28px;
  transition: box-shadow .3s;
}
.wp-care-card:hover { box-shadow: 0 16px 40px -10px rgba(15,23,42,0.12); }
.wp-care-card__name {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 800;
  color: var(--gray-900);
  margin-bottom: 6px;
}
.wp-care-card__price {
  font-family: var(--font-heading);
  font-size: 1.8rem;
  font-weight: 800;
  color: #3b82f6;
}
.wp-care-card__price span { font-size: 0.9rem; color: var(--gray-400); font-weight: 600; }
.wp-care-card__divider { height: 1px; background: var(--gray-200); margin: 16px 0; }
.wp-care-card__features {
  list-style: none; padding: 0; margin: 0;
  display: flex; flex-direction: column; gap: 8px;
}
.wp-care-card__features li {
  display: flex; align-items: flex-start; gap: 8px;
  font-size: 0.88rem; color: var(--gray-700); line-height: 1.4;
}
.wp-care-card__features li svg { flex-shrink: 0; margin-top: 2px; }

/* --- After 12 Months --- */
.wp-after12 {
  max-width: 800px;
  margin: 40px auto 0;
  background: linear-gradient(135deg, #0f172a, #1e293b);
  border-radius: 20px;
  padding: 32px;
  color: #fff;
  text-align: center;
}
.wp-after12 h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  font-weight: 700;
  margin-bottom: 10px;
}
.wp-after12 p {
  font-size: 0.92rem;
  color: #cbd5e1;
  line-height: 1.6;
  max-width: 560px;
  margin: 0 auto;
}
.wp-after12 .price-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(59,130,246,0.15);
  border: 1px solid rgba(59,130,246,0.3);
  border-radius: 12px;
  padding: 8px 18px;
  margin-top: 16px;
  font-weight: 700;
  font-size: 0.95rem;
  color: #93c5fd;
}

/* --- How it works --- */
.wp-how {
  background: var(--gray-50);
  padding: 80px 0;
}
.wp-how__inner {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px;
}
.wp-how__header {
  text-align: center;
  margin-bottom: 48px;
}
.wp-how__title {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 4vw, 2.2rem);
  font-weight: 800;
  color: var(--gray-900);
  margin-bottom: 12px;
}
.wp-how__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}
.wp-how-step {
  text-align: center;
  position: relative;
}
.wp-how-step__num {
  width: 56px; height: 56px;
  border-radius: 16px;
  background: linear-gradient(135deg, #3b82f6, #7c3aed);
  display: grid;
  place-items: center;
  margin: 0 auto 18px;
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 800;
  color: #fff;
}
.wp-how-step h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--gray-900);
  margin-bottom: 8px;
}
.wp-how-step p {
  font-size: 0.9rem;
  color: var(--gray-600);
  line-height: 1.6;
}

/* --- CTA Banner --- */
.wp-cta-banner {
  max-width: var(--max-width);
  margin: 0 auto;
  padding: 0 24px 80px;
}
.wp-cta-banner__inner {
  background: linear-gradient(135deg, #0f172a, #1e293b);
  border-radius: 24px;
  padding: 48px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.wp-cta-banner__inner::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 500px; height: 500px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(59,130,246,0.2), transparent 60%);
  pointer-events: none;
}
.wp-cta-banner h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.4rem, 3vw, 1.8rem);
  font-weight: 800;
  color: #fff;
  margin-bottom: 12px;
  position: relative;
}
.wp-cta-banner p {
  font-size: 1rem;
  color: #94a3b8;
  margin-bottom: 24px;
  position: relative;
}
.wp-cta-banner a {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 14px 28px;
  background: #3b82f6;
  color: #fff;
  border-radius: 12px;
  font-weight: 700;
  font-size: 0.95rem;
  text-decoration: none;
  transition: background .2s;
  position: relative;
}
.wp-cta-banner a:hover { background: #2563eb; }

/* --- GST note --- */
.wp-gst-note {
  text-align: center;
  padding: 16px 24px;
  font-size: 0.82rem;
  color: var(--gray-400);
  max-width: 600px;
  margin: 0 auto;
}

/* --- Responsive --- */
@media (max-width: 960px) {
  .wp-plans__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 640px) {
  .wp-plans__grid { grid-template-columns: 1fr; max-width: 400px; margin-left: auto; margin-right: auto; }
  .wp-inc-grid { grid-template-columns: 1fr; }
  .wp-care__grid { grid-template-columns: 1fr; }
  .wp-how__grid { grid-template-columns: 1fr; gap: 32px; }
  .wp-not-inc ul { grid-template-columns: 1fr; }
  .wp-hero { padding: 120px 0 60px; }
  .wp-cta-banner__inner { padding: 32px 24px; }
}
</style>

<main id="main">

<!-- HERO -->
<section class="wp-hero">
  <div class="wp-hero__inner">
    <span class="wp-hero__kicker"><i></i> WEBSITE PACKAGES</span>
    <h1 class="wp-hero__title">A professional website <br><span>from $69 per month.</span></h1>
    <p class="wp-hero__lead">Choose a plan, complete your brief and we build your mobile-friendly business website. Hosting and SSL included for the first 12 months.</p>
    <span class="wp-hero__price-hint">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#60a5fa" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="#60a5fa" stroke-width="1.6"/></svg>
      Starting from <strong>$69/mo</strong> &nbsp;or&nbsp; <strong>$599 upfront</strong>
    </span>
  </div>
</section>

<!-- PRICING TOGGLE -->
<section class="wp-plans" id="plans">
  <div class="wp-toggle">
    <span class="wp-toggle__label wp-toggle__label--active" id="toggleMonthly">Monthly for 12 months</span>
    <button class="wp-toggle__switch" role="switch" aria-checked="false" aria-label="Toggle pricing" id="priceToggle"></button>
    <span class="wp-toggle__label" id="toggleUpfront">Pay upfront</span>
  </div>

  <div class="wp-plans__grid">
    <!-- Starter -->
    <div class="wp-card">
      <div class="wp-card__name">Starter</div>
      <div class="wp-card__pages">1 page</div>
      <div class="wp-card__price" data-monthly="69" data-upfront="599">
        <sup>$</sup><span class="price-val">69</span>
      </div>
      <div class="wp-card__period period-label">per month for 12 months</div>
      <div class="wp-card__total total-label">Minimum total: $828 incl. GST*</div>
      <div class="wp-card__divider"></div>
      <ul class="wp-card__features">
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Mobile-friendly single page</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contact form</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Basic SEO setup</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 2 revision rounds</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 12 months hosting &amp; SSL</li>
      </ul>
      <a href="/contact.php" class="wp-card__cta wp-card__cta--outline">Get Started</a>
    </div>

    <!-- Business (Popular) -->
    <div class="wp-card wp-card--popular">
      <span class="wp-card__badge">MOST POPULAR</span>
      <div class="wp-card__name">Business</div>
      <div class="wp-card__pages">Up to 5 pages</div>
      <div class="wp-card__price" data-monthly="99" data-upfront="899">
        <sup>$</sup><span class="price-val">99</span>
      </div>
      <div class="wp-card__period period-label">per month for 12 months</div>
      <div class="wp-card__total total-label">Minimum total: $1,188 incl. GST*</div>
      <div class="wp-card__divider"></div>
      <ul class="wp-card__features">
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Up to 5 mobile-friendly pages</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contact form</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Basic SEO setup</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 2 revision rounds</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 12 months hosting &amp; SSL</li>
      </ul>
      <a href="/contact.php" class="wp-card__cta wp-card__cta--primary">Choose Business</a>
    </div>

    <!-- Growth -->
    <div class="wp-card">
      <div class="wp-card__name">Growth</div>
      <div class="wp-card__pages">Up to 10 pages</div>
      <div class="wp-card__price" data-monthly="149" data-upfront="1499">
        <sup>$</sup><span class="price-val">149</span>
      </div>
      <div class="wp-card__period period-label">per month for 12 months</div>
      <div class="wp-card__total total-label">Minimum total: $1,788 incl. GST*</div>
      <div class="wp-card__divider"></div>
      <ul class="wp-card__features">
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Up to 10 mobile-friendly pages</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contact form</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Basic SEO setup</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 2 revision rounds</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 12 months hosting &amp; SSL</li>
      </ul>
      <a href="/contact.php" class="wp-card__cta wp-card__cta--outline">Choose Growth</a>
    </div>

    <!-- Store -->
    <div class="wp-card">
      <div class="wp-card__name">Store</div>
      <div class="wp-card__pages">5 pages + 10 products</div>
      <div class="wp-card__price" data-monthly="199" data-upfront="1999">
        <sup>$</sup><span class="price-val">199</span>
      </div>
      <div class="wp-card__period period-label">per month for 12 months</div>
      <div class="wp-card__total total-label">Minimum total: $2,388 incl. GST*</div>
      <div class="wp-card__divider"></div>
      <ul class="wp-card__features">
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 5 content pages + 10 products</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> eCommerce functionality</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Contact form &amp; basic SEO</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 2 revision rounds</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> 12 months hosting &amp; SSL</li>
      </ul>
      <a href="/contact.php" class="wp-card__cta wp-card__cta--outline">Choose Store</a>
    </div>
  </div>

  <p class="wp-gst-note">*All prices shown include GST. GST treatment is subject to final confirmation. Prices are for the standard package as described. Custom requirements are quoted separately.</p>
</section>

<!-- INCLUSIONS -->
<section class="wp-inclusions" id="inclusions">
  <div class="wp-inclusions__inner">
    <div class="wp-inclusions__header">
      <h2 class="wp-inclusions__title">What&rsquo;s included in every plan</h2>
      <p class="wp-inclusions__lead">Every website package includes the essentials to get your business online with a professional, mobile-friendly website.</p>
    </div>

    <div class="wp-inc-grid">
      <div class="wp-inc-card">
        <div class="wp-inc-card__icon wp-inc-card__icon--blue">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="5" y="2" width="14" height="20" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M9 18h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Mobile-Friendly Design</h3>
        <p>Built using an approved template, optimised for phones, tablets and desktops. Fast-loading and accessible.</p>
      </div>
      <div class="wp-inc-card">
        <div class="wp-inc-card__icon wp-inc-card__icon--green">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Hosting &amp; SSL Certificate</h3>
        <p>Secure, reliable hosting and SSL included for the first 12 months. Your visitors see the padlock from day one.</p>
      </div>
      <div class="wp-inc-card">
        <div class="wp-inc-card__icon wp-inc-card__icon--purple">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Basic Search Metadata</h3>
        <p>Page titles, descriptions and structure set up for Google. A solid starting point for search visibility.</p>
      </div>
      <div class="wp-inc-card">
        <div class="wp-inc-card__icon wp-inc-card__icon--amber">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 10h6M9 13h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Contact Form &amp; Revisions</h3>
        <p>A working contact form and two rounds of design revisions included. We build it right, together.</p>
      </div>
    </div>

    <!-- Not Included -->
    <div class="wp-not-inc">
      <h3>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#f59e0b" stroke-width="1.8"/><path d="M12 8v4M12 16h.01" stroke="#f59e0b" stroke-width="1.8" stroke-linecap="round"/></svg>
        Not included in the base price
      </h3>
      <ul>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> Domain registration</li>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> Premium plugins or licences</li>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> eCommerce platform subscriptions</li>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> Transaction or payment gateway fees</li>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> Full copywriting or new branding</li>
        <li><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M18 6L6 18M6 6l12 12" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/></svg> Bespoke features or custom development</li>
      </ul>
    </div>
  </div>
</section>

<!-- WEBSITE CARE -->
<section class="wp-care" id="care">
  <div class="wp-care__inner">
    <div class="wp-care__header">
      <h2 class="wp-care__title">Website Care Plans</h2>
      <p class="wp-care__lead">Keep your website secure, updated and running smoothly with optional monthly care.</p>
    </div>

    <div class="wp-care__grid">
      <div class="wp-care-card">
        <div class="wp-care-card__name">Website Care</div>
        <div class="wp-care-card__price">$30 <span>/month</span></div>
        <div class="wp-care-card__divider"></div>
        <ul class="wp-care-card__features">
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Software &amp; security updates</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Regular backups</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Uptime monitoring</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Up to 15 minutes of minor edits monthly</li>
        </ul>
      </div>

      <div class="wp-care-card">
        <div class="wp-care-card__name">Website Care Plus</div>
        <div class="wp-care-card__price">$69 <span>/month</span></div>
        <div class="wp-care-card__divider"></div>
        <ul class="wp-care-card__features">
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Everything in Website Care</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Up to 45 minutes of minor edits monthly</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg> Priority response</li>
        </ul>
      </div>
    </div>

    <p class="wp-gst-note" style="margin-top:20px">Care is an optional recurring service, not an additional website instalment. Unused editing time does not roll over. New pages, redesigns and development require a separate quote.</p>

    <!-- After 12 months -->
    <div class="wp-after12">
      <h3>After 12 months</h3>
      <p>Your build instalments stop after 12 successful payments. To keep your site live, hosting and SSL renewal continues at a simple flat rate. Website Care continues separately if you choose to keep it.</p>
      <span class="price-tag">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#60a5fa" stroke-width="1.8" stroke-linejoin="round"/></svg>
        Hosting &amp; SSL from $25/month
      </span>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="wp-how">
  <div class="wp-how__inner">
    <div class="wp-how__header">
      <h2 class="wp-how__title">How it works</h2>
    </div>

    <div class="wp-how__grid">
      <div class="wp-how-step">
        <div class="wp-how-step__num">1</div>
        <h3>Choose a Plan</h3>
        <p>Pick the website package that fits your business. Select monthly instalments or pay upfront, and add optional Website Care.</p>
      </div>
      <div class="wp-how-step">
        <div class="wp-how-step__num">2</div>
        <h3>Complete Your Brief</h3>
        <p>After payment, we send you a simple brief to gather your business details, content, images and preferences. Delivery starts when your brief is complete.</p>
      </div>
      <div class="wp-how-step">
        <div class="wp-how-step__num">3</div>
        <h3>We Build &amp; Launch</h3>
        <p>Our team designs and builds your site using an approved template. You review, we refine, and your new website goes live.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="wp-cta-banner">
  <div class="wp-cta-banner__inner">
    <h2>Need something more custom?</h2>
    <p>Larger websites, bespoke features, complex eCommerce or multi-site projects? We provide custom quotations.</p>
    <a href="/contact.php">
      Talk to us
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </a>
  </div>
</section>

</main>

<script>
(function(){
  var toggle = document.getElementById('priceToggle');
  var lblM = document.getElementById('toggleMonthly');
  var lblU = document.getElementById('toggleUpfront');
  if(!toggle) return;

  var monthlyTotals = { '69':'$828', '99':'$1,188', '149':'$1,788', '199':'$2,388' };
  var upfrontTotals = { '599':'$599', '899':'$899', '1499':'$1,499', '1999':'$1,999' };

  toggle.addEventListener('click', function(){
    var isUpfront = toggle.getAttribute('aria-checked') === 'false';
    toggle.setAttribute('aria-checked', isUpfront ? 'true' : 'false');
    lblM.classList.toggle('wp-toggle__label--active', !isUpfront);
    lblU.classList.toggle('wp-toggle__label--active', isUpfront);

    document.querySelectorAll('.wp-card__price').forEach(function(el){
      var val = isUpfront ? el.dataset.upfront : el.dataset.monthly;
      el.querySelector('.price-val').textContent = Number(val).toLocaleString();
    });

    document.querySelectorAll('.period-label').forEach(function(el){
      el.textContent = isUpfront ? 'one-time payment' : 'per month for 12 months';
    });

    document.querySelectorAll('.total-label').forEach(function(el){
      if(isUpfront){
        el.style.display = 'none';
      } else {
        el.style.display = '';
      }
    });
  });
})();
</script>

<?php include 'includes/footer.php'; ?>
