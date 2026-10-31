<?php
$page = 'solutions';
$seo_title = 'Website Design & Development Melbourne | Nubevest';
$meta_desc = 'Plan, design and build a business website, eCommerce store, landing page or portal with strategy, integrations and ongoing support from Nubevest.';
include __DIR__ . '/../includes/header.php';
?>

<style>
/* Websites & eCommerce — page-specific accents */
.we-browser {
  position:relative;
  background:#fff;
  border:1px solid #e2e8f0;
  border-radius:16px;
  box-shadow: 0 30px 60px -25px rgba(88,28,135,0.35), 0 0 0 6px #fff, 0 0 0 7px rgba(59,130,246,0.15);
}
.ab-hero__right { padding: 22px 24px 26px; }
.we-browser__bar { display:flex; align-items:center; gap:8px; padding:12px 14px; background:#f8fafc; border-bottom:1px solid #e2e8f0; border-radius:16px 16px 0 0; }
.we-browser__dot { width:10px; height:10px; border-radius:50%; }
.we-browser__url { flex:1; margin-left:14px; padding:6px 14px; background:#fff; border:1px solid #e2e8f0; border-radius:8px; font-size:0.78rem; color:#64748b; letter-spacing:-0.01em; display:flex; align-items:center; gap:8px; }
.we-browser__body { padding:22px; }

.we-hero-nav { display:flex; align-items:center; gap:6px; margin-bottom:18px; }
.we-hero-logo { width:26px; height:26px; border-radius:8px; background: linear-gradient(135deg,#3b82f6,#7c3aed); }
.we-hero-nav-links { display:flex; gap:14px; margin-left:14px; font-size:0.72rem; color:#64748b; font-weight:600; }
.we-hero-nav-links span.active { color:#0f172a; }
.we-hero-nav-cta { margin-left:auto; padding:6px 12px; background:#3b82f6; color:#fff; font-size:0.72rem; font-weight:700; border-radius:6px; }

.we-hero-h {
  font-size:1.4rem; font-weight:800; color:#0f172a; letter-spacing:-0.02em; line-height:1.15; margin:0 0 10px;
}
.we-hero-h .g { background: linear-gradient(90deg,#3b82f6,#7c3aed); -webkit-background-clip: text; background-clip:text; color:transparent; }
.we-hero-lead { font-size:0.82rem; color:#64748b; line-height:1.55; margin:0 0 14px; }
.we-hero-cta { display:flex; gap:8px; margin-bottom:18px; }
.we-hero-btn { padding:8px 14px; background:#0f172a; color:#fff; font-size:0.75rem; font-weight:700; border-radius:8px; display:inline-flex; align-items:center; gap:6px; }
.we-hero-btn.alt { background:transparent; color:#0f172a; border:1px solid #cbd5e1; }

.we-hero-cards { display:grid; grid-template-columns: repeat(3, 1fr); gap:8px; }
.we-hero-card { padding:10px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; }
.we-hero-card__ico { width:22px; height:22px; border-radius:6px; display:grid; place-items:center; margin-bottom:6px; }
.we-hero-card__t { font-size:0.7rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.we-hero-card__s { font-size:0.62rem; color:#94a3b8; font-weight:600; margin-top:2px; }

/* Floating badges */
.we-float {
  position:absolute; z-index:2;
  background:#fff; border:1px solid #eef1f5; border-radius:12px;
  padding:8px 12px 8px 10px;
  display:flex; align-items:center; gap:10px;
  box-shadow: 0 16px 30px -12px rgba(15,23,42,0.2);
}
.we-float--top { top:-14px; right:12px; }
.we-float--bot { bottom:-16px; left:-14px; }
.we-float-ico { width:30px; height:30px; border-radius:8px; display:grid; place-items:center; color:#fff; }
.we-float-t { font-size:0.78rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.we-float-s { font-size:0.65rem; color:#64748b; font-weight:600; }

/* Metric strip */
.we-metric {
  margin-top:32px; padding:26px;
  background: linear-gradient(135deg,#0f172a,#1e293b);
  border-radius:20px; color:#fff;
  display:grid; grid-template-columns: repeat(4, 1fr); gap:20px;
  position:relative; overflow:hidden;
}
.we-metric::before{ content:''; position:absolute; top:-40%; right:-10%; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(124,58,237,0.35), transparent 60%); }
.we-metric__item { position:relative; }
.we-metric__n { font-size:1.8rem; font-weight:800; letter-spacing:-0.02em; background:linear-gradient(90deg,#60a5fa,#a78bfa); -webkit-background-clip:text; background-clip:text; color:transparent; }
.we-metric__l { font-size:0.85rem; color:#cbd5e1; font-weight:600; margin-top:4px; }
@media (max-width: 780px){ .we-metric { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px){
  .we-browser { max-width: 100%; box-shadow: 0 20px 40px -20px rgba(88,28,135,0.28), 0 0 0 4px #fff, 0 0 0 5px rgba(59,130,246,0.12); }
  .we-browser__body { padding: 16px; }
  .we-browser__url { font-size: 0.68rem; padding: 5px 10px; }
  .we-hero-nav-links { gap: 8px; font-size: 0.62rem; margin-left: 8px; }
  .we-hero-nav-cta { padding: 4px 8px; font-size: 0.62rem; }
  .we-hero-h { font-size: 1.05rem; }
  .we-hero-lead { font-size: 0.72rem; }
  .we-hero-cards { grid-template-columns: 1fr; gap: 6px; }
  .we-hero-card__t { font-size: 0.72rem; }
  .we-metric { grid-template-columns: 1fr 1fr; gap: 14px; padding: 20px; }
  .we-metric__n { font-size: 1.4rem; }
  .we-metric__l { font-size: 0.72rem; }
  .we-float { padding: 6px 10px 6px 8px; }
  .we-float-t { font-size: 0.68rem; }
  .we-float-s { font-size: 0.58rem; }
  .we-float--top { right: 6px; top: -10px; }
  .we-float--bot { left: -6px; bottom: -10px; }
  .ab-hero__right { padding: 14px 6px 20px; }
}
</style>

<main id="main">

<!-- HERO -->
<section class="ab-hero">
  <div class="container ab-hero__container reveal">
    <div class="ab-hero__left">
      <span class="kicker kicker--pill ab-hero__kicker"><i></i>WEBSITES &amp; ECOMMERCE &middot; A NUBEVEST SOLUTION</span>
      <h1 class="ab-hero__title">A website designed to do a job &mdash; <span class="hero__title-gradient">not just fill a screen.</span></h1>
      <p class="ab-hero__lead">Create a clear, credible and usable digital experience that supports the way customers discover, understand and engage with your business &mdash; and connects to the systems behind it.</p>
      <div class="ab-hero__cta">
        <a href="/contact.php" class="btn btn--primary">Plan Your Website</a>
        <a href="/brands/metameet.php" class="btn btn--secondary btn--arrow-blue">Explore MetaMeet Hosting</a>
        <a href="#capabilities" class="btn btn--secondary btn--arrow-blue">See What We Deliver</a>
      </div>
    </div>

    <div class="ab-hero__right">
      <div class="we-browser">
        <div class="we-browser__bar">
          <span class="we-browser__dot" style="background:#f87171"></span>
          <span class="we-browser__dot" style="background:#fbbf24"></span>
          <span class="we-browser__dot" style="background:#34d399"></span>
          <span class="we-browser__url">
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
            yourbusiness.com.au
          </span>
        </div>
        <div class="we-browser__body">
          <div class="we-hero-nav">
            <span class="we-hero-logo"></span>
            <strong style="font-size:0.85rem; color:#0f172a; letter-spacing:-0.02em;">Brand</strong>
            <div class="we-hero-nav-links"><span class="active">Home</span><span>Services</span><span>About</span><span>Contact</span></div>
            <span class="we-hero-nav-cta">Book</span>
          </div>

          <h3 class="we-hero-h">Websites that <span class="g">win the enquiry.</span></h3>
          <p class="we-hero-lead">Clear message. Fast pages. Real conversions &mdash; from first click to booked meeting.</p>
          <div class="we-hero-cta">
            <span class="we-hero-btn">Get Started <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span class="we-hero-btn alt">See work</span>
          </div>

          <div class="we-hero-cards">
            <div class="we-hero-card">
              <div class="we-hero-card__ico" style="background:#dbeafe;color:#2563eb"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-6 4 3 6-9" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
              <div class="we-hero-card__t">Fast</div>
              <div class="we-hero-card__s">98 Lighthouse</div>
            </div>
            <div class="we-hero-card">
              <div class="we-hero-card__ico" style="background:#dcfce7;color:#059669"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
              <div class="we-hero-card__t">Secure</div>
              <div class="we-hero-card__s">SSL &amp; hardening</div>
            </div>
            <div class="we-hero-card">
              <div class="we-hero-card__ico" style="background:#ede9fe;color:#7c3aed"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="4" y="4" width="16" height="16" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M4 12h16" stroke="currentColor" stroke-width="1.8"/></svg></div>
              <div class="we-hero-card__t">Responsive</div>
              <div class="we-hero-card__s">All devices</div>
            </div>
          </div>
        </div>

        <div class="we-float we-float--top">
          <div class="we-float-ico" style="background:linear-gradient(135deg,#10b981,#059669)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div><div class="we-float-t">New enquiry</div><div class="we-float-s">2s ago &middot; from Google</div></div>
        </div>

        <div class="we-float we-float--bot">
          <div class="we-float-ico" style="background:linear-gradient(135deg,#3b82f6,#2563eb)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 18l6-8 4 4 6-10" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div><div class="we-float-t">+34% conversions</div><div class="we-float-s">Last 30 days</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CAPABILITIES GRID -->
<section id="capabilities" class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>WHAT WE DELIVER</span>
      <h2 class="au-h2">Everything a website needs &mdash; <span class="au-grad">and the systems around it.</span></h2>
      <p>From first strategy conversation to launch and ongoing improvement &mdash; delivered as a single connected engagement.</p>
    </div>

    <div class="solutions-grid reveal stagger">

      <a href="#" class="sol-card sol-card--blue">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">Strategy &amp; discovery</h3>
            <p class="sol-card__desc">Clarify the audience, offer, competitors, message and the outcomes the site must deliver.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="8" y="14" width="114" height="74" rx="8" fill="#eff6ff" stroke="#bfdbfe"/><circle cx="65" cy="50" r="20" stroke="#2563eb" stroke-width="2"/><path d="M80 65l14 14" stroke="#2563eb" stroke-width="2" stroke-linecap="round"/><rect x="22" y="24" width="34" height="4" rx="2" fill="#3b82f6"/><rect x="22" y="76" width="60" height="4" rx="2" fill="#93c5fd"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--purple">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18M9 4v16" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <h3 class="sol-card__title">UX, IA &amp; design</h3>
            <p class="sol-card__desc">Sitemaps, user journeys, wireframes and interface design across every device.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="60" height="74" rx="6" fill="#f5f3ff" stroke="#ddd6fe"/><rect x="80" y="14" width="40" height="74" rx="6" fill="#f5f3ff" stroke="#ddd6fe"/><rect x="16" y="22" width="48" height="6" rx="3" fill="#8b5cf6"/><rect x="16" y="34" width="34" height="4" rx="2" fill="#c4b5fd"/><rect x="16" y="44" width="48" height="30" rx="4" fill="#a78bfa"/><rect x="86" y="22" width="28" height="6" rx="3" fill="#8b5cf6"/><rect x="86" y="34" width="24" height="30" rx="4" fill="#c4b5fd"/><rect x="86" y="70" width="28" height="6" rx="3" fill="#7c3aed"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--green">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v11H8l-4 4V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8 10h8M8 13h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">Copy &amp; content</h3>
            <p class="sol-card__desc">Structure the message, refine the words and coordinate the content each page needs.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#ecfdf5" stroke="#a7f3d0"/><rect x="20" y="24" width="60" height="6" rx="3" fill="#10b981"/><rect x="20" y="36" width="90" height="4" rx="2" fill="#6ee7b7"/><rect x="20" y="44" width="80" height="4" rx="2" fill="#6ee7b7"/><rect x="20" y="52" width="70" height="4" rx="2" fill="#6ee7b7"/><rect x="20" y="66" width="30" height="12" rx="3" fill="#059669"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--amber">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M8 3H5a2 2 0 0 0-2 2v3M16 3h3a2 2 0 0 1 2 2v3M8 21H5a2 2 0 0 1-2-2v-3M16 21h3a2 2 0 0 0 2-2v-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><rect x="7" y="7" width="10" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <h3 class="sol-card__title">Responsive dev</h3>
            <p class="sol-card__desc">WordPress, Shopify, WooCommerce or a suitable CMS &mdash; built for speed, SEO and stability.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="14" y="20" width="60" height="60" rx="4" fill="#fffbeb" stroke="#fde68a"/><rect x="82" y="30" width="24" height="42" rx="3" fill="#fffbeb" stroke="#fde68a"/><rect x="112" y="40" width="12" height="26" rx="2" fill="#fffbeb" stroke="#fde68a"/><rect x="20" y="26" width="48" height="6" rx="2" fill="#f59e0b"/><rect x="20" y="38" width="40" height="30" rx="3" fill="#fcd34d"/><rect x="86" y="34" width="16" height="4" rx="2" fill="#f59e0b"/><rect x="86" y="44" width="16" height="22" rx="2" fill="#fcd34d"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--pink">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M6 6h15l-2 10H8L6 3H3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9" cy="20" r="1.6" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="20" r="1.6" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <h3 class="sol-card__title">eCommerce stores</h3>
            <p class="sol-card__desc">Product catalogues, checkout, payments, shipping, tax and integrated inventory setup.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="55" height="74" rx="6" fill="#fdf2f8" stroke="#fbcfe8"/><rect x="70" y="14" width="50" height="34" rx="6" fill="#fdf2f8" stroke="#fbcfe8"/><rect x="70" y="54" width="50" height="34" rx="6" fill="#fdf2f8" stroke="#fbcfe8"/><rect x="16" y="20" width="43" height="30" rx="3" fill="#ec4899"/><rect x="16" y="56" width="30" height="4" rx="2" fill="#f472b6"/><rect x="16" y="64" width="20" height="4" rx="2" fill="#fbcfe8"/><rect x="16" y="76" width="34" height="8" rx="3" fill="#db2777"/><circle cx="95" cy="31" r="10" fill="#ec4899"/><path d="M91 31l3 3 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--cyan">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="6" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="6" cy="18" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="18" r="2.4" stroke="currentColor" stroke-width="1.8"/><path d="M8.4 6H15.6M6 8.4v7.2M18 8.4v7.2M8.4 18H15.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">CRM &amp; integrations</h3>
            <p class="sol-card__desc">Forms, bookings, payments and analytics wired to your CRM and business tools.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#ecfeff" stroke="#a5f3fc"/><circle cx="30" cy="34" r="10" fill="#06b6d4"/><circle cx="100" cy="34" r="10" fill="#06b6d4"/><circle cx="30" cy="68" r="10" fill="#06b6d4"/><circle cx="100" cy="68" r="10" fill="#06b6d4"/><circle cx="65" cy="51" r="12" fill="#22d3ee"/><path d="M40 34h20M75 34l15 0M40 68h20M75 68h15M53 51h0M77 51h0" stroke="#0891b2" stroke-width="1.6" stroke-dasharray="3 3"/></svg>
          </div>
        </div>
      </a>

    </div>

    <!-- Metric strip -->
    <div class="we-metric reveal">
      <div class="we-metric__item"><div class="we-metric__n">98+</div><div class="we-metric__l">Lighthouse performance targets</div></div>
      <div class="we-metric__item"><div class="we-metric__n">100%</div><div class="we-metric__l">Responsive across devices</div></div>
      <div class="we-metric__item"><div class="we-metric__n">SEO-ready</div><div class="we-metric__l">Foundations from day one</div></div>
      <div class="we-metric__item"><div class="we-metric__n">A11y</div><div class="we-metric__l">Accessibility considered</div></div>
    </div>
  </div>
</section>

<!-- BUILT AROUND JOURNEY -->
<section class="ap-section">
  <div class="ap-section__bg" aria-hidden="true">
    <div class="ap-section__orb ap-section__orb--1"></div>
    <div class="ap-section__orb ap-section__orb--2"></div>
    <svg class="ap-section__dots" width="160" height="160" viewBox="0 0 160 160" fill="none">
      <g fill="#c7d2fe" opacity="0.55">
        <circle cx="4" cy="4" r="1.4"/><circle cx="24" cy="4" r="1.4"/><circle cx="44" cy="4" r="1.4"/><circle cx="64" cy="4" r="1.4"/>
        <circle cx="4" cy="24" r="1.4"/><circle cx="24" cy="24" r="1.4"/><circle cx="44" cy="24" r="1.4"/>
        <circle cx="4" cy="44" r="1.4"/><circle cx="24" cy="44" r="1.4"/>
        <circle cx="4" cy="64" r="1.4"/>
      </g>
    </svg>
  </div>

  <div class="container">
    <div class="ap-grid">
      <!-- Left: intro -->
      <div class="ap-intro reveal">
        <span class="kicker kicker--pill ap-intro__kicker"><i></i>THE APPROACH</span>
        <h2 class="ap-intro__title">Built around <br><span class="ap-intro__grad">the customer journey.</span></h2>
        <p class="ap-intro__lead">A strong website answers the right questions in the right order. We clarify who the site is for, what they need to understand, what action they should take and what should happen after they act. Design and technology then support that journey &mdash; <strong>not the other way around</strong>.</p>

      </div>

      <!-- Right: 4 question ladder -->
      <div class="ap-ladder reveal">
        <div class="ap-step" style="--apc1:#3b82f6;--apc2:#6366f1;">
          <span class="ap-step__num">01</span>
          <div class="ap-step__body">
            <div class="ap-step__q">Who is the site for?</div>
            <div class="ap-step__a">Real audiences &mdash; not generic personas.</div>
          </div>
          <span class="ap-step__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="#fff" stroke-width="1.8"/><circle cx="16.5" cy="9" r="2.4" stroke="#fff" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
        </div>
        <span class="ap-connector"></span>

        <div class="ap-step" style="--apc1:#10b981;--apc2:#34d399;">
          <span class="ap-step__num">02</span>
          <div class="ap-step__body">
            <div class="ap-step__q">What do they need to understand?</div>
            <div class="ap-step__a">The message that answers their actual question.</div>
          </div>
          <span class="ap-step__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.8"/><path d="M9 9h.01M9 12h6M9 15h4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
        </div>
        <span class="ap-connector"></span>

        <div class="ap-step" style="--apc1:#f59e0b;--apc2:#fbbf24;">
          <span class="ap-step__num">03</span>
          <div class="ap-step__body">
            <div class="ap-step__q">What action should they take?</div>
            <div class="ap-step__a">A single, clear next step.</div>
          </div>
          <span class="ap-step__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
        </div>
        <span class="ap-connector"></span>

        <div class="ap-step" style="--apc1:#8b5cf6;--apc2:#ec4899;">
          <span class="ap-step__num">04</span>
          <div class="ap-step__body">
            <div class="ap-step__q">What happens after they act?</div>
            <div class="ap-step__a">A follow-up experience that keeps the promise.</div>
          </div>
          <span class="ap-step__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-14" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="wp2-section">
  <div class="wp2-section__bg" aria-hidden="true">
    <div class="wp2-section__orb wp2-section__orb--1"></div>
    <div class="wp2-section__orb wp2-section__orb--2"></div>
  </div>

  <div class="container">
    <div class="wp2-head reveal">
      <span class="kicker kicker--pill wp2-head__kicker"><i></i>WEBSITE PROCESS</span>
      <h2 class="wp2-head__title">Our website process, <span class="wp2-head__grad">stage by stage.</span></h2>
      <p class="wp2-head__lead">Six connected stages from first conversation to ongoing improvement &mdash; each one has a clear deliverable and a clear handover.</p>
    </div>

    <!-- Sticky progress rail -->
    <div class="wp2-flow reveal">
      <div class="wp2-rail" aria-hidden="true">
        <span class="wp2-rail__track"></span>
        <span class="wp2-rail__fill"></span>
      </div>

      <div class="wp2-grid">
        <article class="wp2-card" style="--wpc1:#3b82f6;--wpc2:#6366f1;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">01</span>
            <span class="wp2-card__ico">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6" stroke="#fff" stroke-width="2"/><path d="M20 20l-4-4" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Discover</h4>
          <p class="wp2-card__p">Define audience, offer, goals, content, systems and constraints.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv">Written brief</span>
          </div>
        </article>

        <article class="wp2-card" style="--wpc1:#10b981;--wpc2:#34d399;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">02</span>
            <span class="wp2-card__ico">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M9 4v16" stroke="#fff" stroke-width="1.8"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Plan</h4>
          <p class="wp2-card__p">Sitemap, page priorities, user journeys and functional scope.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv">Sitemap &amp; scope</span>
          </div>
        </article>

        <article class="wp2-card" style="--wpc1:#f59e0b;--wpc2:#fbbf24;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">03</span>
            <span class="wp2-card__ico">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Design</h4>
          <p class="wp2-card__p">Visual direction and responsive page experience.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv">Design mockups</span>
          </div>
        </article>

        <article class="wp2-card" style="--wpc1:#ec4899;--wpc2:#f472b6;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">04</span>
            <span class="wp2-card__ico">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M3 21h18M6 21V10l6-6 6 6v11" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Build</h4>
          <p class="wp2-card__p">Configure or develop the site, content, integrations and tracking.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv">Staging site</span>
          </div>
        </article>

        <article class="wp2-card" style="--wpc1:#06b6d4;--wpc2:#22d3ee;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">05</span>
            <span class="wp2-card__ico">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Test &amp; launch</h4>
          <p class="wp2-card__p">Usability, responsiveness, forms, performance and handover checks.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv">Live website</span>
          </div>
        </article>

        <article class="wp2-card wp2-card--now" style="--wpc1:#8b5cf6;--wpc2:#a78bfa;">
          <div class="wp2-card__top">
            <span class="wp2-card__num">06</span>
            <span class="wp2-card__ico">
              <span class="wp2-card__pulse"></span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="#fff" stroke-width="1.8"/></svg>
            </span>
          </div>
          <h4 class="wp2-card__t">Support &amp; improve</h4>
          <p class="wp2-card__p">Maintain the site and prioritise future improvements over time.</p>
          <div class="wp2-card__foot">
            <span class="wp2-card__deliv wp2-card__deliv--now">Continuous partnership</span>
          </div>
        </article>
      </div>
    </div>

  </div>
</section>

<!-- BEYOND LAUNCH -->
<section class="bl-section">
  <div class="bl-section__bg" aria-hidden="true">
    <div class="bl-section__orb bl-section__orb--1"></div>
    <div class="bl-section__orb bl-section__orb--2"></div>
    <svg class="bl-section__grid" viewBox="0 0 200 200" preserveAspectRatio="none">
      <defs>
        <pattern id="bl-g" width="40" height="40" patternUnits="userSpaceOnUse">
          <path d="M40 0H0V40" stroke="rgba(99,102,241,0.05)" stroke-width="1" fill="none"/>
        </pattern>
      </defs>
      <rect width="200" height="200" fill="url(#bl-g)"/>
    </svg>
  </div>

  <div class="container">
    <div class="bl-head reveal">
      <span class="kicker kicker--pill bl-head__kicker"><i></i>BEYOND LAUNCH</span>
      <h2 class="bl-head__title">A website connected <span class="bl-head__grad">to the rest of the business.</span></h2>
      <p class="bl-head__lead">Your site can route enquiries to CRM, trigger acknowledgements, create follow-up tasks, take bookings or payments and give the business clearer reporting.</p>
    </div>

    <div class="bl-panel reveal">
      <!-- Connection diagram -->
      <div class="bl-diagram" aria-hidden="true">
        <div class="bl-diagram__hub">
          <div class="bl-diagram__hub-inner">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="14" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M7 14h6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <div class="bl-diagram__hub-t">Your website</div>
        </div>
        <svg class="bl-diagram__lines" viewBox="0 0 500 200" fill="none" preserveAspectRatio="xMidYMid meet">
          <defs>
            <linearGradient id="bl-line-1" x1="0" x2="1"><stop offset="0" stop-color="#3b82f6"/><stop offset="1" stop-color="#3b82f6" stop-opacity="0.3"/></linearGradient>
            <linearGradient id="bl-line-2" x1="0" x2="1"><stop offset="0" stop-color="#8b5cf6"/><stop offset="1" stop-color="#8b5cf6" stop-opacity="0.3"/></linearGradient>
            <linearGradient id="bl-line-3" x1="0" x2="1"><stop offset="0" stop-color="#10b981"/><stop offset="1" stop-color="#10b981" stop-opacity="0.3"/></linearGradient>
          </defs>
          <path d="M250 100 Q 180 50 100 40" stroke="url(#bl-line-1)" stroke-width="2" stroke-dasharray="5 5" fill="none"/>
          <path d="M250 100 Q 250 160 250 180" stroke="url(#bl-line-2)" stroke-width="2" stroke-dasharray="5 5" fill="none"/>
          <path d="M250 100 Q 320 50 400 40" stroke="url(#bl-line-3)" stroke-width="2" stroke-dasharray="5 5" fill="none"/>
        </svg>
      </div>

      <!-- 3 capability cards -->
      <div class="bl-grid">
        <article class="bl-card" style="--blc1:#3b82f6;--blc2:#6366f1;">
          <span class="bl-card__stripe"></span>
          <div class="bl-card__head">
            <span class="bl-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 7l9 6 9-6" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span class="bl-card__badge">CRM</span>
          </div>
          <h3 class="bl-card__t">Enquiry routing</h3>
          <p class="bl-card__p">Forms deliver to the right inbox, CRM record and follow-up workflow &mdash; nothing lost.</p>
          <div class="bl-card__flow">
            <span>Form</span>
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <span>CRM</span>
            <svg width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <span>Follow-up</span>
          </div>
        </article>

        <article class="bl-card" style="--blc1:#8b5cf6;--blc2:#ec4899;">
          <span class="bl-card__stripe"></span>
          <div class="bl-card__head">
            <span class="bl-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </span>
            <span class="bl-card__badge">TRANSACT</span>
          </div>
          <h3 class="bl-card__t">Bookings &amp; payments</h3>
          <p class="bl-card__p">Calendars, checkout, subscriptions and connected accounts &mdash; live on your domain.</p>
          <div class="bl-card__tags">
            <span>Calendar</span>
            <span>Checkout</span>
            <span>Subscriptions</span>
          </div>
        </article>

        <article class="bl-card" style="--blc1:#10b981;--blc2:#34d399;">
          <span class="bl-card__stripe"></span>
          <div class="bl-card__head">
            <span class="bl-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-6 4 3 6-9" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 8h6v6" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span class="bl-card__badge">INSIGHTS</span>
          </div>
          <h3 class="bl-card__t">Analytics &amp; reporting</h3>
          <p class="bl-card__p">What drives enquiries, what converts &mdash; measured through agreed lead stages.</p>
          <div class="bl-card__mini">
            <svg viewBox="0 0 100 30" fill="none" preserveAspectRatio="none">
              <path d="M2 22 C 20 12, 40 20, 60 8 S 90 16, 98 4" stroke="#10b981" stroke-width="1.8" fill="none" stroke-linecap="round"/>
              <circle cx="60" cy="8" r="3" fill="#10b981"/>
              <circle cx="98" cy="4" r="3" fill="#10b981"/>
            </svg>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="fq-section">
  <div class="fq-section__bg" aria-hidden="true">
    <div class="fq-section__orb fq-section__orb--1"></div>
    <div class="fq-section__orb fq-section__orb--2"></div>
    <svg class="fq-section__dots" width="160" height="160" viewBox="0 0 160 160" fill="none">
      <g fill="#c7d2fe" opacity="0.55">
        <circle cx="4" cy="4" r="1.4"/><circle cx="24" cy="4" r="1.4"/><circle cx="44" cy="4" r="1.4"/><circle cx="64" cy="4" r="1.4"/>
        <circle cx="4" cy="24" r="1.4"/><circle cx="24" cy="24" r="1.4"/><circle cx="44" cy="24" r="1.4"/>
        <circle cx="4" cy="44" r="1.4"/><circle cx="24" cy="44" r="1.4"/>
        <circle cx="4" cy="64" r="1.4"/>
      </g>
    </svg>
  </div>

  <div class="container">
    <div class="fq-grid">
      <!-- Left: intro (sticky) -->
      <div class="fq-intro reveal">
        <span class="kicker kicker--pill fq-intro__kicker"><i></i>COMMON QUESTIONS</span>
        <h2 class="fq-intro__title">The things clients <br><span class="fq-intro__grad">usually want to know.</span></h2>
        <p class="fq-intro__lead">Short, honest answers to the questions that come up on almost every website engagement. If yours isn&rsquo;t here, ask us directly &mdash; the first call is always free.</p>

        <div class="fq-intro__cta">
          <a href="/contact.php" class="fq-intro__btn">
            Ask a Different Question
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>

        <!-- Stat card -->
        <div class="fq-stat">
          <div class="fq-stat__ico">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v10H8l-4 4V6z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
          </div>
          <div>
            <div class="fq-stat__t">Not seeing your question?</div>
            <div class="fq-stat__s">First conversation is always free.</div>
          </div>
        </div>
      </div>

      <!-- Right: FAQ accordion -->
      <div class="fq-list reveal">
        <details class="fq-item" open style="--fqc1:#3b82f6;--fqc2:#6366f1;">
          <summary class="fq-item__q">
            <span class="fq-item__num">Q1</span>
            <span class="fq-item__t">Can you help with the content?</span>
            <span class="fq-item__toggle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </summary>
          <div class="fq-item__a">
            Yes. We can help structure the message, write or refine the copy and coordinate the content required for each page.
          </div>
        </details>

        <details class="fq-item" style="--fqc1:#10b981;--fqc2:#34d399;">
          <summary class="fq-item__q">
            <span class="fq-item__num">Q2</span>
            <span class="fq-item__t">Can you work with our existing brand?</span>
            <span class="fq-item__toggle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </summary>
          <div class="fq-item__a">
            Yes. We can apply an established brand system or help define the visual and messaging foundations the website needs.
          </div>
        </details>

        <details class="fq-item" style="--fqc1:#f59e0b;--fqc2:#fbbf24;">
          <summary class="fq-item__q">
            <span class="fq-item__num">Q3</span>
            <span class="fq-item__t">Can you connect our other systems?</span>
            <span class="fq-item__toggle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </summary>
          <div class="fq-item__a">
            Where suitable access and integration options are available, we can connect forms, CRM, bookings, payments, analytics and other business tools.
          </div>
        </details>

        <details class="fq-item" style="--fqc1:#ec4899;--fqc2:#f472b6;">
          <summary class="fq-item__q">
            <span class="fq-item__num">Q4</span>
            <span class="fq-item__t">Do you provide support after launch?</span>
            <span class="fq-item__toggle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </summary>
          <div class="fq-item__a">
            Yes. Hosting, updates, security maintenance, content changes, SEO and further development can be included in a separately agreed support arrangement.
          </div>
        </details>

        <details class="fq-item" style="--fqc1:#8b5cf6;--fqc2:#a78bfa;">
          <summary class="fq-item__q">
            <span class="fq-item__num">Q5</span>
            <span class="fq-item__t">How is the project priced?</span>
            <span class="fq-item__toggle"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </summary>
          <div class="fq-item__a">
            After discovery, we provide a written scope explaining the deliverables, assumptions, responsibilities, timing and commercial terms.
          </div>
        </details>
      </div>
    </div>
  </div>
</section>

<!-- PLAN YOUR WEBSITE -->
<section class="pw-section">
  <div class="container">
    <div class="pw-card reveal">
      <!-- Background layers -->
      <div class="pw-card__bg" aria-hidden="true">
        <span class="pw-card__orb pw-card__orb--1"></span>
        <span class="pw-card__orb pw-card__orb--2"></span>
        <span class="pw-card__orb pw-card__orb--3"></span>
        <svg class="pw-card__grid" viewBox="0 0 600 400" preserveAspectRatio="none">
          <defs>
            <pattern id="pw-g" width="36" height="36" patternUnits="userSpaceOnUse">
              <path d="M36 0H0V36" stroke="rgba(255,255,255,0.06)" stroke-width="1" fill="none"/>
            </pattern>
          </defs>
          <rect width="600" height="400" fill="url(#pw-g)"/>
        </svg>
      </div>

      <div class="pw-card__inner">
        <!-- Left: content -->
        <div class="pw-card__body">
          <span class="pw-kicker">
            <span class="pw-kicker__ico">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="14" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M7 14h6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </span>
            PLAN YOUR WEBSITE
          </span>

          <h2 class="pw-title">
            Build the website your
            <span class="pw-title__grad">next stage of business needs.</span>
          </h2>

          <p class="pw-lead">Tell us what the site needs to achieve, what isn&rsquo;t working today and which systems it should connect with. We&rsquo;ll walk you through the <strong>options</strong>.</p>

          <!-- Focus chips -->
          <div class="pw-focus">
            <div class="pw-focus__label">Tell us about:</div>
            <div class="pw-focus__chips">
              <span><span class="pw-focus__dot" style="background:#3b82f6"></span>The audience</span>
              <span><span class="pw-focus__dot" style="background:#10b981"></span>The goal</span>
              <span><span class="pw-focus__dot" style="background:#f59e0b"></span>Existing systems</span>
              <span><span class="pw-focus__dot" style="background:#ec4899"></span>What isn&rsquo;t working</span>
            </div>
          </div>

          <div class="pw-actions">
            <a href="/contact.php" class="pw-btn pw-btn--primary">
              Plan Your Website
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="/work.php" class="pw-btn pw-btn--ghost">
              View Our Work
            </a>
          </div>
        </div>

        <!-- Right: browser mock preview -->
        <div class="pw-card__visual" aria-hidden="true">
          <div class="pw-browser">
            <div class="pw-browser__head">
              <div class="pw-browser__dots">
                <span></span><span></span><span></span>
              </div>
              <div class="pw-browser__url">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="5" y="11" width="14" height="9" rx="2" stroke="#94a3b8" stroke-width="1.8"/><path d="M8 11V8a4 4 0 0 1 8 0v3" stroke="#94a3b8" stroke-width="1.8"/></svg>
                yourbrand.com.au
              </div>
              <div class="pw-browser__actions">
                <span></span><span></span>
              </div>
            </div>

            <div class="pw-browser__body">
              <!-- Nav strip -->
              <div class="pw-browser__nav">
                <span class="pw-browser__logo">
                  <span class="pw-browser__logo-dot"></span>
                  Brand
                </span>
                <span class="pw-browser__links">
                  <span></span><span></span><span></span><span></span>
                </span>
                <span class="pw-browser__cta"></span>
              </div>

              <!-- Hero preview -->
              <div class="pw-browser__hero">
                <div class="pw-browser__hero-l">
                  <div class="pw-browser__pill">HERO</div>
                  <div class="pw-browser__lines">
                    <span></span>
                    <span class="pw-browser__lines--wide"></span>
                    <span class="pw-browser__lines--wide"></span>
                    <span></span>
                  </div>
                  <div class="pw-browser__hero-btn">Get Started</div>
                </div>
                <div class="pw-browser__hero-r">
                  <svg width="100%" height="100%" viewBox="0 0 100 80" fill="none" preserveAspectRatio="none">
                    <defs>
                      <linearGradient id="pw-hero-g" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0" stop-color="#3b82f6" stop-opacity="0.3"/>
                        <stop offset="0.5" stop-color="#8b5cf6" stop-opacity="0.3"/>
                        <stop offset="1" stop-color="#ec4899" stop-opacity="0.3"/>
                      </linearGradient>
                    </defs>
                    <rect width="100" height="80" rx="6" fill="url(#pw-hero-g)"/>
                    <path d="M8 60 C 24 40, 40 55, 56 30 S 90 20, 96 10" stroke="#3b82f6" stroke-width="1.4" fill="none" stroke-linecap="round"/>
                    <circle cx="56" cy="30" r="2" fill="#3b82f6"/>
                    <circle cx="96" cy="10" r="2" fill="#ec4899"/>
                  </svg>
                </div>
              </div>

              <!-- 3 section blocks -->
              <div class="pw-browser__blocks">
                <div class="pw-browser__block">
                  <span class="pw-browser__block-ico" style="background:#dbeafe;color:#2563eb">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                  <span class="pw-browser__block-bar"></span>
                </div>
                <div class="pw-browser__block">
                  <span class="pw-browser__block-ico" style="background:#ede9fe;color:#7c3aed">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                  </span>
                  <span class="pw-browser__block-bar"></span>
                </div>
                <div class="pw-browser__block">
                  <span class="pw-browser__block-ico" style="background:#fce7f3;color:#db2777">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18" stroke="currentColor" stroke-width="1.8"/></svg>
                  </span>
                  <span class="pw-browser__block-bar"></span>
                </div>
              </div>
            </div>
          </div>

          <!-- Floating chips -->
          <span class="pw-chip pw-chip--tr">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-14" stroke="#10b981" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Fully responsive
          </span>
          <span class="pw-chip pw-chip--bl">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#f59e0b" stroke-width="1.8" stroke-linejoin="round"/></svg>
            Secure &amp; hosted
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
