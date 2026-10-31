<?php
$page = 'marketing';
$seo_title = 'Marketing Services — SEO, Meta Ads, Google Ads & Consultation | Nubevest';
$meta_desc = 'Grow your business with SEO, Meta Ads, Google Ads and expert consultation from Nubevest. Compare Silver, Gold and Platinum plans. Advertising spend is separate — we manage results, not budgets.';
include 'includes/header.php';
?>

<style>
/* ============================================================
   MARKETING SERVICES PAGE
   ============================================================ */

/* Hero */
.mk-hero {
  position: relative;
  background: linear-gradient(160deg, #0f172a 0%, #1e1b3a 50%, #2d1a3e 100%);
  padding: calc(var(--header-height) + 60px) 0 80px;
  overflow: hidden;
  color: #fff;
}
.mk-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 60% 50% at 70% 40%, rgba(236,72,153,0.18) 0%, transparent 70%),
              radial-gradient(ellipse 40% 40% at 20% 80%, rgba(139,92,246,0.12) 0%, transparent 70%);
  pointer-events: none;
}
.mk-hero .container { position: relative; z-index: 1; max-width: var(--max-width); margin: 0 auto; padding: 0 24px; }
.mk-hero__kicker {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 6px 16px; border-radius: 9999px;
  background: rgba(236,72,153,0.15); border: 1px solid rgba(236,72,153,0.25);
  font-size: 0.75rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;
  color: #f9a8d4; margin-bottom: 20px;
}
.mk-hero__kicker i { width: 6px; height: 6px; border-radius: 50%; background: #ec4899; }
.mk-hero__title {
  font-family: var(--font-heading); font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 20px;
}
.mk-hero__title-grad {
  background: linear-gradient(90deg, #ec4899, #f59e0b);
  -webkit-background-clip: text; background-clip: text; color: transparent;
}
.mk-hero__lead {
  font-size: 1.1rem; color: #cbd5e1; line-height: 1.7; max-width: 640px; margin-bottom: 32px;
}
.mk-hero__cta { display: flex; gap: 12px; flex-wrap: wrap; }

/* Sections */
.mk-section {
  padding: 80px 0;
}
.mk-section--alt { background: var(--gray-50); }
.mk-section .container { max-width: var(--max-width); margin: 0 auto; padding: 0 24px; }

.mk-section__kicker {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 6px 16px; border-radius: 9999px;
  font-size: 0.75rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;
  margin-bottom: 16px;
}
.mk-section__title {
  font-family: var(--font-heading); font-size: clamp(1.75rem, 4vw, 2.5rem);
  font-weight: 800; line-height: 1.15; letter-spacing: -0.02em;
  color: var(--gray-900); margin-bottom: 16px;
}
.mk-section__lead {
  font-size: 1.05rem; color: var(--gray-500); line-height: 1.7; max-width: 640px; margin-bottom: 48px;
}

/* Tier cards */
.mk-tiers { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 40px; }
.mk-tier {
  background: #fff; border: 1px solid var(--gray-200); border-radius: 16px;
  padding: 32px 28px; position: relative; transition: var(--transition);
}
.mk-tier:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.mk-tier--featured {
  border-color: #ec4899;
  box-shadow: 0 0 0 1px #ec4899, 0 8px 30px -10px rgba(236,72,153,0.25);
}
.mk-tier__badge {
  position: absolute; top: -12px; left: 50%; transform: translateX(-50%);
  padding: 4px 16px; border-radius: 9999px;
  background: linear-gradient(90deg, #ec4899, #f472b6); color: #fff;
  font-size: 0.7rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
  white-space: nowrap;
}
.mk-tier__name {
  font-family: var(--font-heading); font-size: 1.25rem; font-weight: 800;
  color: var(--gray-900); margin-bottom: 4px;
}
.mk-tier__price {
  font-family: var(--font-heading); font-size: 2.5rem; font-weight: 800;
  color: var(--gray-900); line-height: 1.1; margin-bottom: 4px;
}
.mk-tier__price sup { font-size: 1.2rem; top: -0.8em; }
.mk-tier__period { font-size: 0.85rem; color: var(--gray-400); margin-bottom: 24px; }
.mk-tier__list { list-style: none; padding: 0; margin: 0 0 28px; }
.mk-tier__list li {
  padding: 8px 0; border-bottom: 1px solid var(--gray-100);
  font-size: 0.9rem; color: var(--gray-600); display: flex; align-items: flex-start; gap: 10px;
}
.mk-tier__list li:last-child { border-bottom: none; }
.mk-tier__check {
  flex-shrink: 0; width: 18px; height: 18px; border-radius: 50%;
  background: #ecfdf5; display: grid; place-items: center; margin-top: 2px;
}
.mk-tier__check svg { width: 10px; height: 10px; }
.mk-tier__cta {
  display: block; text-align: center; padding: 12px 20px; border-radius: 10px;
  font-size: 0.9rem; font-weight: 700; text-decoration: none; transition: var(--transition);
}
.mk-tier__cta--primary {
  background: linear-gradient(135deg, #ec4899, #f472b6); color: #fff;
}
.mk-tier__cta--primary:hover { opacity: 0.9; }
.mk-tier__cta--outline {
  background: transparent; color: var(--gray-700); border: 1px solid var(--gray-200);
}
.mk-tier__cta--outline:hover { border-color: var(--gray-400); }

/* Setup note */
.mk-setup {
  display: flex; align-items: center; gap: 16px;
  padding: 20px 24px; border-radius: 12px;
  background: #fffbeb; border: 1px solid #fde68a;
  font-size: 0.9rem; color: var(--gray-700); margin-bottom: 16px;
}
.mk-setup__icon {
  flex-shrink: 0; width: 36px; height: 36px; border-radius: 10px;
  background: #fef3c7; display: grid; place-items: center;
}
.mk-disclaimer {
  font-size: 0.82rem; color: var(--gray-400); line-height: 1.6;
  max-width: 720px; padding: 0;
}

/* Consultation grid */
.mk-consult-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-bottom: 40px; }
.mk-consult-card {
  background: #fff; border: 1px solid var(--gray-200); border-radius: 14px;
  padding: 28px 24px; transition: var(--transition);
}
.mk-consult-card:hover { box-shadow: var(--shadow-sm); transform: translateY(-2px); }
.mk-consult-card__name {
  font-family: var(--font-heading); font-size: 1rem; font-weight: 700;
  color: var(--gray-900); margin-bottom: 6px;
}
.mk-consult-card__price {
  font-family: var(--font-heading); font-size: 1.5rem; font-weight: 800;
  color: #ec4899; margin-bottom: 4px;
}
.mk-consult-card__freq { font-size: 0.8rem; color: var(--gray-400); margin-bottom: 12px; }
.mk-consult-card__desc { font-size: 0.88rem; color: var(--gray-500); line-height: 1.6; }

/* Bottom CTA */
.mk-bottom-cta {
  text-align: center; padding: 80px 24px;
  background: linear-gradient(160deg, #0f172a 0%, #1e1b3a 50%, #2d1a3e 100%);
  color: #fff;
}
.mk-bottom-cta__title {
  font-family: var(--font-heading); font-size: clamp(1.5rem, 3.5vw, 2.25rem);
  font-weight: 800; margin-bottom: 16px;
}
.mk-bottom-cta__lead { font-size: 1.05rem; color: #cbd5e1; max-width: 540px; margin: 0 auto 32px; line-height: 1.7; }
.mk-bottom-cta__btns { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; }

/* Coming soon tag */
.mk-coming {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 4px 12px; border-radius: 9999px;
  background: rgba(236,72,153,0.1); border: 1px solid rgba(236,72,153,0.2);
  font-size: 0.7rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
  color: #ec4899; margin-bottom: 16px;
}

@media (max-width: 860px) {
  .mk-tiers { grid-template-columns: 1fr; max-width: 420px; margin-left: auto; margin-right: auto; }
  .mk-hero { padding-top: calc(var(--header-height) + 40px); padding-bottom: 60px; }
}
@media (max-width: 600px) {
  .mk-consult-grid { grid-template-columns: 1fr; }
}
</style>

<main id="main">

<!-- HERO -->
<section class="mk-hero">
  <div class="container">
    <span class="mk-hero__kicker"><i></i> MARKETING SERVICES</span>
    <h1 class="mk-hero__title">
      Grow your business with<br>
      <span class="mk-hero__title-grad">SEO, ads &amp; expert strategy.</span>
    </h1>
    <p class="mk-hero__lead">SEO, Meta Ads, Google Ads and consultation services designed for small businesses. Compare plans, choose what fits, and let our specialists handle execution while you run your business.</p>
    <div class="mk-hero__cta">
      <a href="#seo" class="btn btn--primary">View Plans</a>
      <a href="/contact.php" class="btn btn--secondary btn--arrow-blue">Book a Consultation</a>
    </div>
  </div>
</section>

<!-- SEO -->
<section class="mk-section" id="seo">
  <div class="container">
    <span class="mk-section__kicker" style="background:rgba(16,185,129,0.1);color:#10b981;border:1px solid rgba(16,185,129,0.2);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="#10b981" stroke-width="2"/><path d="M20 20l-3.5-3.5" stroke="#10b981" stroke-width="2" stroke-linecap="round"/></svg>
      SEO
    </span>
    <h2 class="mk-section__title">Search Engine Optimisation</h2>
    <p class="mk-section__lead">Improve your visibility on Google and attract the right local customers. We handle audits, on-page improvements, content and Google Business Profile management.</p>

    <span class="mk-coming">Online Purchase Coming Soon</span>

    <div class="mk-tiers">
      <!-- Silver -->
      <div class="mk-tier">
        <div class="mk-tier__name">Silver</div>
        <div class="mk-tier__price"><sup>$</sup>299</div>
        <div class="mk-tier__period">per month</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One location</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Google Business Profile support</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 2 page improvements monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Initial audit &amp; monthly reporting</li>
        </ul>
        <a href="/contact.php?service=seo-silver" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>

      <!-- Gold -->
      <div class="mk-tier mk-tier--featured">
        <span class="mk-tier__badge">Most Popular</span>
        <div class="mk-tier__name">Gold</div>
        <div class="mk-tier__price"><sup>$</sup>399</div>
        <div class="mk-tier__period">per month</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One location</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Google Business Profile support</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 4 page improvements monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One short content piece monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Initial audit &amp; monthly reporting</li>
        </ul>
        <a href="/contact.php?service=seo-gold" class="mk-tier__cta mk-tier__cta--primary">Contact Us</a>
      </div>

      <!-- Platinum -->
      <div class="mk-tier">
        <div class="mk-tier__name">Platinum</div>
        <div class="mk-tier__price"><sup>$</sup>499</div>
        <div class="mk-tier__period">per month</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One location</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Google Business Profile support</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 6 page improvements monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Two content pieces monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Initial audit &amp; monthly reporting</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Custom technical repairs included</li>
        </ul>
        <a href="/contact.php?service=seo-platinum" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>
    </div>

    <p class="mk-disclaimer">Results depend on competition, content quality and domain history. We report agreed measures and enquiry quality &mdash; we do not promise specific rankings or lead volumes.</p>
  </div>
</section>

<!-- META ADS -->
<section class="mk-section mk-section--alt" id="meta-ads">
  <div class="container">
    <span class="mk-section__kicker" style="background:rgba(59,130,246,0.1);color:#3b82f6;border:1px solid rgba(59,130,246,0.2);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#3b82f6" stroke-width="2"/><path d="M8 12a4 4 0 1 0 8 0 4 4 0 0 0-8 0z" stroke="#3b82f6" stroke-width="2"/></svg>
      META ADS
    </span>
    <h2 class="mk-section__title">Meta Ads Management</h2>
    <p class="mk-section__lead">Facebook and Instagram advertising managed by specialists. We create campaigns, design assets and optimise performance so your ad spend works harder.</p>

    <span class="mk-coming">Online Purchase Coming Soon</span>

    <div class="mk-tiers">
      <!-- Silver -->
      <div class="mk-tier">
        <div class="mk-tier__name">Silver</div>
        <div class="mk-tier__price"><sup>$</sup>299</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One offer</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 2 campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 2 new static ad concepts monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=meta-silver" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>

      <!-- Gold -->
      <div class="mk-tier mk-tier--featured">
        <span class="mk-tier__badge">Most Popular</span>
        <div class="mk-tier__name">Gold</div>
        <div class="mk-tier__price"><sup>$</sup>399</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Multiple offers</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 3 campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 4 ad concepts monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=meta-gold" class="mk-tier__cta mk-tier__cta--primary">Contact Us</a>
      </div>

      <!-- Platinum -->
      <div class="mk-tier">
        <div class="mk-tier__name">Platinum</div>
        <div class="mk-tier__price"><sup>$</sup>499</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Multiple offers</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 4 campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 6 concepts + 1 simple video edit</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=meta-platinum" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>
    </div>

    <div class="mk-setup">
      <span class="mk-setup__icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 9v4M12 17h.01M4.93 4.93l14.14 14.14M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </span>
      <div><strong>Initial setup fee:</strong> $199 per advertising platform. Advertising spend is separate and paid by you directly to Meta. No filming or unlimited creative revisions included.</div>
    </div>
  </div>
</section>

<!-- GOOGLE ADS -->
<section class="mk-section" id="google-ads">
  <div class="container">
    <span class="mk-section__kicker" style="background:rgba(234,67,53,0.1);color:#ea4335;border:1px solid rgba(234,67,53,0.2);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="3" stroke="#ea4335" stroke-width="2"/><path d="M8 12h8M12 8v8" stroke="#ea4335" stroke-width="2" stroke-linecap="round"/></svg>
      GOOGLE ADS
    </span>
    <h2 class="mk-section__title">Google Ads Management</h2>
    <p class="mk-section__lead">Reach customers actively searching for your services. We set up, manage and optimise Google Search campaigns so you appear at the right time.</p>

    <span class="mk-coming">Online Purchase Coming Soon</span>

    <div class="mk-tiers">
      <!-- Silver -->
      <div class="mk-tier">
        <div class="mk-tier__name">Silver</div>
        <div class="mk-tier__price"><sup>$</sup>299</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 1 service group</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 1 location</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 2 Search campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=google-silver" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>

      <!-- Gold -->
      <div class="mk-tier mk-tier--featured">
        <span class="mk-tier__badge">Most Popular</span>
        <div class="mk-tier__name">Gold</div>
        <div class="mk-tier__price"><sup>$</sup>399</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 2 service groups</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Multiple locations</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 3 campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=google-gold" class="mk-tier__cta mk-tier__cta--primary">Contact Us</a>
      </div>

      <!-- Platinum -->
      <div class="mk-tier">
        <div class="mk-tier__name">Platinum</div>
        <div class="mk-tier__price"><sup>$</sup>499</div>
        <div class="mk-tier__period">per month + ad spend</div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> 3 service groups</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Multiple locations</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 5 campaigns</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Performance reporting</li>
        </ul>
        <a href="/contact.php?service=google-platinum" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>
    </div>

    <div class="mk-setup">
      <span class="mk-setup__icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 9v4M12 17h.01M4.93 4.93l14.14 14.14M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </span>
      <div><strong>Initial setup fee:</strong> $199 per advertising platform. Advertising spend is separate and paid by you directly to Google. Shopping feeds and complex ecommerce campaigns require a custom quote.</div>
    </div>

    <p class="mk-disclaimer">Larger advertising budgets require review rather than unlimited management at entry pricing. We report agreed measures and enquiry quality &mdash; we do not promise specific rankings, lead volumes or revenue.</p>
  </div>
</section>

<!-- CONSULTATION & DESIGN -->
<section class="mk-section mk-section--alt" id="consultation">
  <div class="container">
    <span class="mk-section__kicker" style="background:rgba(139,92,246,0.1);color:#8b5cf6;border:1px solid rgba(139,92,246,0.2);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="#8b5cf6" stroke-width="2" stroke-linejoin="round"/></svg>
      CONSULTATION &amp; DESIGN
    </span>
    <h2 class="mk-section__title">Consultation &amp; Design Services</h2>
    <p class="mk-section__lead">Expert advice, actionable marketing plans and professional design assets. Book a session, get a strategy, or order design work &mdash; all at clear, upfront prices.</p>

    <div class="mk-consult-grid">
      <div class="mk-consult-card">
        <div class="mk-consult-card__name">45-Minute Consultation</div>
        <div class="mk-consult-card__price">$99</div>
        <div class="mk-consult-card__freq">One-off</div>
        <div class="mk-consult-card__desc">A focused session covering your questions, priorities and next steps. Includes a short written action summary.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">Monthly Advisor</div>
        <div class="mk-consult-card__price">$199</div>
        <div class="mk-consult-card__freq">Per month</div>
        <div class="mk-consult-card__desc">One 60-minute meeting each month with ongoing strategic guidance and accountability for your marketing direction.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">90-Day Marketing Action Plan</div>
        <div class="mk-consult-card__price">$399</div>
        <div class="mk-consult-card__freq">One-off</div>
        <div class="mk-consult-card__desc">A structured 90-day plan covering positioning, channels, content priorities and measurable goals for your business.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">Business Card Design</div>
        <div class="mk-consult-card__price">$49</div>
        <div class="mk-consult-card__freq">One-off &middot; 1 revision</div>
        <div class="mk-consult-card__desc">Professional business card design. Print-ready files supplied. Printing quoted separately by quantity and stock.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">Single-Sided Flyer Design</div>
        <div class="mk-consult-card__price">$79</div>
        <div class="mk-consult-card__freq">One-off &middot; 1 revision</div>
        <div class="mk-consult-card__desc">Eye-catching flyer design for promotions, events or services. Print-ready files supplied.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">Pull-Up Banner Design</div>
        <div class="mk-consult-card__price">$99</div>
        <div class="mk-consult-card__freq">One-off &middot; 1 revision</div>
        <div class="mk-consult-card__desc">Professional pull-up banner design for events, expos and shopfronts. Printing quoted separately.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">4-Page Brochure Design</div>
        <div class="mk-consult-card__price">$199</div>
        <div class="mk-consult-card__freq">One-off &middot; 1 revision</div>
        <div class="mk-consult-card__desc">Professional brochure layout with your branding and content. Print-ready files supplied.</div>
      </div>

      <div class="mk-consult-card">
        <div class="mk-consult-card__name">Monthly Design Retainer</div>
        <div class="mk-consult-card__price">$149</div>
        <div class="mk-consult-card__freq">Per month</div>
        <div class="mk-consult-card__desc">Two simple static design assets each month for social media, ads or marketing. One revision per asset included.</div>
      </div>
    </div>

    <p class="mk-disclaimer">Design assets include one revision each. Printing is quoted separately by quantity, stock, finishing and delivery. All prices are proposed and subject to confirmation.</p>
  </div>
</section>

<!-- BOTTOM CTA -->
<section class="mk-bottom-cta">
  <div class="container">
    <h2 class="mk-bottom-cta__title">Ready to grow your business?</h2>
    <p class="mk-bottom-cta__lead">Book a consultation to discuss your goals, or contact us for a tailored marketing recommendation.</p>
    <div class="mk-bottom-cta__btns">
      <a href="/contact.php" class="btn btn--primary">Book a Consultation &mdash; $99</a>
      <a href="/contact.php" class="btn btn--secondary btn--arrow-blue">Contact Us</a>
    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
