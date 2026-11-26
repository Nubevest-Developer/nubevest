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
  padding: calc(var(--header-height) + 60px) 0 100px;
  overflow: hidden;
  color: #fff;
}
.mk-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse 60% 50% at 75% 35%, rgba(236,72,153,0.22) 0%, transparent 65%),
              radial-gradient(ellipse 45% 45% at 15% 85%, rgba(139,92,246,0.18) 0%, transparent 70%),
              radial-gradient(ellipse 30% 30% at 90% 85%, rgba(245,158,11,0.10) 0%, transparent 70%);
  pointer-events: none;
}
.mk-hero::after {
  content: '';
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
  background-size: 48px 48px;
  mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 80%);
  -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 80%);
  pointer-events: none;
}
.mk-hero .container {
  position: relative; z-index: 1; max-width: var(--max-width); margin: 0 auto; padding: 0 24px;
  display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: center;
}
.mk-hero__kicker {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 6px 16px; border-radius: 9999px;
  background: rgba(236,72,153,0.15); border: 1px solid rgba(236,72,153,0.25);
  font-size: 0.75rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;
  color: #f9a8d4; margin-bottom: 20px;
}
.mk-hero__kicker i { width: 6px; height: 6px; border-radius: 50%; background: #ec4899; box-shadow: 0 0 0 0 rgba(236,72,153,0.7); animation: mkPulse 2s infinite; }
@keyframes mkPulse {
  0%   { box-shadow: 0 0 0 0 rgba(236,72,153,0.7); }
  70%  { box-shadow: 0 0 0 8px rgba(236,72,153,0); }
  100% { box-shadow: 0 0 0 0 rgba(236,72,153,0); }
}
.mk-hero__title {
  font-family: var(--font-heading); font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 800; line-height: 1.1; letter-spacing: -0.03em; margin-bottom: 20px;
  color: #fff;
}
.mk-hero__title-grad {
  background: linear-gradient(90deg, #ec4899, #f59e0b);
  -webkit-background-clip: text; background-clip: text; color: transparent;
}
.mk-hero__lead {
  font-size: 1.1rem; color: #cbd5e1; line-height: 1.7; max-width: 560px; margin-bottom: 28px;
}
.mk-hero__cta { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 36px; }
.mk-hero__trust {
  display: flex; flex-wrap: wrap; gap: 22px 28px; padding-top: 24px;
  border-top: 1px solid rgba(255,255,255,0.08);
}
.mk-hero__trust-item { display: flex; flex-direction: column; gap: 2px; }
.mk-hero__trust-num { font-size: 1.5rem; font-weight: 800; color: #fff; line-height: 1; letter-spacing: -0.02em; }
.mk-hero__trust-num span { background: linear-gradient(90deg, #ec4899, #f59e0b); -webkit-background-clip: text; background-clip: text; color: transparent; }
.mk-hero__trust-lbl { font-size: 0.78rem; color: #94a3b8; letter-spacing: 0.02em; }

/* Hero visual */
.mk-hero__visual { position: relative; height: 480px; }
.mk-hero__orb {
  position: absolute; width: 320px; height: 320px; border-radius: 50%; top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  background: radial-gradient(circle at 30% 30%, rgba(236,72,153,0.35), rgba(139,92,246,0.15) 60%, transparent 75%);
  filter: blur(20px);
  animation: mkOrbFloat 8s ease-in-out infinite;
}
@keyframes mkOrbFloat { 0%,100% { transform: translate(-50%,-50%) scale(1);} 50% { transform: translate(-50%,-55%) scale(1.08);} }

.mk-chcard {
  position: absolute; background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.12); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border-radius: 16px; padding: 14px 16px; display: flex; align-items: center; gap: 12px;
  box-shadow: 0 20px 50px -20px rgba(0,0,0,0.5);
  animation: mkCardFloat 6s ease-in-out infinite;
}
.mk-chcard__ico { width: 40px; height: 40px; border-radius: 10px; display: grid; place-items: center; flex-shrink: 0; }
.mk-chcard__ttl { font-size: 0.82rem; font-weight: 700; color: #fff; line-height: 1.1; margin-bottom: 3px; }
.mk-chcard__sub { font-size: 0.72rem; color: #94a3b8; line-height: 1.1; }

.mk-chcard--seo   { top: 10%;  left: 0;   animation-delay: 0s; }
.mk-chcard--meta  { top: 45%;  right: 0;  animation-delay: 1.5s; }
.mk-chcard--google{ bottom: 15%; left: 8%; animation-delay: 3s; }

.mk-chcard--seo .mk-chcard__ico    { background: rgba(16,185,129,0.15); color: #10b981; border: 1px solid rgba(16,185,129,0.25); }
.mk-chcard--meta .mk-chcard__ico   { background: rgba(139,92,246,0.15); color: #a78bfa; border: 1px solid rgba(139,92,246,0.25); }
.mk-chcard--google .mk-chcard__ico { background: rgba(245,158,11,0.15); color: #f59e0b; border: 1px solid rgba(245,158,11,0.25); }

@keyframes mkCardFloat {
  0%,100% { transform: translateY(0); }
  50%     { transform: translateY(-10px); }
}

.mk-metric {
  position: absolute; top: 2%; right: 4%;
  background: rgba(15,23,42,0.75); border: 1px solid rgba(255,255,255,0.1);
  backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
  border-radius: 14px; padding: 12px 14px; min-width: 150px;
  box-shadow: 0 20px 50px -20px rgba(0,0,0,0.5);
}
.mk-metric__row { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 8px; }
.mk-metric__lbl { font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.06em; }
.mk-metric__val { font-size: 1.1rem; font-weight: 800; color: #10b981; }
.mk-metric__val::before { content: '↑'; margin-right: 2px; }
.mk-metric__bars { display: flex; align-items: flex-end; gap: 4px; height: 32px; }
.mk-metric__bar { flex: 1; background: linear-gradient(180deg, #ec4899, #f59e0b); border-radius: 2px; opacity: 0.85; animation: mkBarGrow 2.4s ease-in-out infinite; }
.mk-metric__bar:nth-child(1) { height: 30%; animation-delay: 0s; }
.mk-metric__bar:nth-child(2) { height: 50%; animation-delay: 0.3s; }
.mk-metric__bar:nth-child(3) { height: 40%; animation-delay: 0.6s; }
.mk-metric__bar:nth-child(4) { height: 70%; animation-delay: 0.9s; }
.mk-metric__bar:nth-child(5) { height: 85%; animation-delay: 1.2s; }
.mk-metric__bar:nth-child(6) { height: 100%; animation-delay: 1.5s; }
@keyframes mkBarGrow { 0%,100% { transform: scaleY(1); } 50% { transform: scaleY(0.75); } }

@media (max-width: 960px) {
  .mk-hero .container { grid-template-columns: 1fr; gap: 40px; }
  .mk-hero__visual { height: 360px; max-width: 420px; margin: 0 auto; width: 100%; }
}
@media (max-width: 600px) {
  .mk-hero__visual { height: 320px; }
  .mk-hero__orb { width: 240px; height: 240px; }
  .mk-chcard { padding: 10px 12px; }
  .mk-chcard__ico { width: 34px; height: 34px; }
  .mk-chcard__ttl { font-size: 0.75rem; }
  .mk-chcard__sub { font-size: 0.68rem; }
  .mk-metric { min-width: 130px; padding: 10px 12px; }
  .mk-hero__trust { gap: 16px 22px; }
  .mk-hero__trust-num { font-size: 1.25rem; }
}

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
  font-family: var(--font-heading); font-size: clamp(2rem, 4.5vw, 2.75rem);
  font-weight: 800; line-height: 1.15; letter-spacing: -0.02em;
  color: var(--gray-900); margin-bottom: 18px;
}
.mk-section__title-hl {
  background: linear-gradient(90deg, #ec4899, #f59e0b);
  -webkit-background-clip: text; background-clip: text; color: transparent;
}
.mk-section__lead {
  font-size: 1.05rem; color: var(--gray-500); line-height: 1.7; max-width: 640px; margin-bottom: 48px;
}

/* Section header block (centered, decorated) */
.mk-section__header {
  text-align: center; max-width: 760px; margin: 0 auto 56px;
  position: relative;
}
.mk-section__header .mk-section__kicker { margin-bottom: 20px; }
.mk-section__header .mk-section__title { margin-bottom: 16px; }
.mk-section__header .mk-section__lead { margin: 0 auto 28px; }

.mk-section__tile {
  display: inline-grid; place-items: center;
  width: 72px; height: 72px; border-radius: 20px;
  margin-bottom: 20px; position: relative;
  box-shadow: 0 20px 40px -20px rgba(15,23,42,0.25);
}
.mk-section__tile::after {
  content: '';
  position: absolute; inset: -8px; border-radius: 24px;
  border: 1px dashed currentColor; opacity: 0.25;
}
.mk-section__tile svg { width: 32px; height: 32px; }
.mk-section__tile--seo    { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #059669; }
.mk-section__tile--meta   { background: linear-gradient(135deg, #dbeafe, #bfdbfe); color: #2563eb; }
.mk-section__tile--google { background: linear-gradient(135deg, #ffedd5, #fed7aa); color: #ea580c; }
.mk-section__tile--consult{ background: linear-gradient(135deg, #ede9fe, #ddd6fe); color: #7c3aed; }

.mk-section__divider {
  display: inline-block; width: 60px; height: 3px; border-radius: 2px;
  background: linear-gradient(90deg, #ec4899, #f59e0b); margin: 0 0 24px;
}

.mk-coming--float {
  display: inline-flex; margin: 0 auto 28px;
}

/* Tier cards */
.mk-tiers {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 40px;
  align-items: stretch;
}
.mk-tier {
  background: #fff; border: 1px solid var(--gray-200); border-radius: 20px;
  padding: 36px 28px 32px; position: relative;
  transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
  display: flex; flex-direction: column;
  isolation: isolate;
}
.mk-tier::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 4px;
  background: linear-gradient(90deg, #cbd5e1, #94a3b8);
  border-top-left-radius: 20px; border-top-right-radius: 20px;
  z-index: 1;
}
.mk-tier::after {
  content: '';
  position: absolute; top: 0; right: 0; width: 180px; height: 180px;
  background: radial-gradient(circle at top right, rgba(203,213,225,0.35), transparent 60%);
  border-top-right-radius: 20px;
  pointer-events: none; z-index: 0;
  overflow: hidden;
}
.mk-tier > * { position: relative; z-index: 1; }
.mk-tier:hover {
  box-shadow: 0 25px 50px -20px rgba(15,23,42,0.18);
  transform: translateY(-6px);
  border-color: var(--gray-300);
}

.mk-tier--silver::before   { background: linear-gradient(90deg, #cbd5e1, #94a3b8); }
.mk-tier--silver::after    { background: radial-gradient(circle at top right, rgba(148,163,184,0.25), transparent 60%); }
.mk-tier--gold::before     { background: linear-gradient(90deg, #ec4899, #f59e0b); }
.mk-tier--gold::after      { background: radial-gradient(circle at top right, rgba(236,72,153,0.22), transparent 60%); }
.mk-tier--platinum::before { background: linear-gradient(90deg, #8b5cf6, #3b82f6); }
.mk-tier--platinum::after  { background: radial-gradient(circle at top right, rgba(139,92,246,0.22), transparent 60%); }

.mk-tier--featured {
  border-color: transparent;
  box-shadow: 0 0 0 2px #ec4899, 0 25px 50px -15px rgba(236,72,153,0.35);
  transform: translateY(-8px);
}
.mk-tier--featured::before { display: none; }
.mk-tier--featured:hover { transform: translateY(-14px); box-shadow: 0 0 0 2px #ec4899, 0 35px 60px -15px rgba(236,72,153,0.45); }

.mk-tier__badge {
  position: absolute; top: -16px; left: 50%; transform: translateX(-50%);
  padding: 6px 18px; border-radius: 9999px;
  background: linear-gradient(90deg, #ec4899, #f59e0b); color: #fff;
  font-size: 0.68rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase;
  white-space: nowrap; z-index: 3;
  box-shadow: 0 0 0 4px #fff, 0 10px 25px -8px rgba(236,72,153,0.5);
  display: inline-flex; align-items: center; gap: 6px;
}
.mk-tier__badge::before { content: '★'; font-size: 0.75rem; }

.mk-tier__head { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
.mk-tier__icon {
  width: 42px; height: 42px; border-radius: 12px;
  display: grid; place-items: center; flex-shrink: 0;
  font-family: var(--font-heading); font-weight: 800; font-size: 1.05rem;
}
.mk-tier--silver .mk-tier__icon   { background: linear-gradient(135deg, #e2e8f0, #cbd5e1); color: #475569; }
.mk-tier--gold .mk-tier__icon     { background: linear-gradient(135deg, #fde68a, #f59e0b); color: #78350f; }
.mk-tier--platinum .mk-tier__icon { background: linear-gradient(135deg, #c7d2fe, #818cf8); color: #312e81; }

.mk-tier__name { font-family: var(--font-heading); font-size: 1.35rem; font-weight: 800; color: var(--gray-900); line-height: 1; }
.mk-tier__sub { font-size: 0.78rem; color: var(--gray-400); margin-top: 3px; letter-spacing: 0.02em; }

.mk-tier__price-wrap {
  display: flex; align-items: baseline; gap: 10px;
  padding-bottom: 24px; margin-bottom: 24px;
  border-bottom: 1px dashed var(--gray-200);
}
.mk-tier__price {
  font-family: var(--font-heading); font-size: 2.75rem; font-weight: 800;
  color: var(--gray-900); line-height: 1;
  display: inline-flex; align-items: flex-start;
}
.mk-tier__price sup { font-size: 1.1rem; top: 0.2em; margin-right: 2px; color: var(--gray-500); font-weight: 700; }
.mk-tier__period { font-size: 0.85rem; color: var(--gray-400); }

.mk-tier__list { list-style: none; padding: 0; margin: 0 0 28px; flex: 1; }
.mk-tier__list li {
  padding: 9px 0;
  font-size: 0.9rem; color: var(--gray-700); display: flex; align-items: flex-start; gap: 10px;
  line-height: 1.5;
}
.mk-tier__check {
  flex-shrink: 0; width: 20px; height: 20px; border-radius: 50%;
  background: #ecfdf5; display: grid; place-items: center; margin-top: 2px;
  border: 1px solid #a7f3d0;
}
.mk-tier__check svg { width: 10px; height: 10px; }
.mk-tier--featured .mk-tier__check { background: #fce7f3; border-color: #fbcfe8; }
.mk-tier--featured .mk-tier__check svg path { stroke: #ec4899 !important; }

.mk-tier__cta {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  padding: 14px 20px; border-radius: 12px;
  font-size: 0.95rem; font-weight: 700; text-decoration: none;
  transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}
.mk-tier__cta--primary {
  background: linear-gradient(135deg, #ec4899, #f59e0b); color: #fff;
  box-shadow: 0 10px 25px -10px rgba(236,72,153,0.5);
}
.mk-tier__cta--primary:hover { transform: translateY(-2px); box-shadow: 0 15px 30px -10px rgba(236,72,153,0.6); }
.mk-tier__cta--outline {
  background: #fff; color: var(--gray-800); border: 1.5px solid var(--gray-200);
}
.mk-tier__cta--outline:hover { border-color: var(--gray-800); background: var(--gray-50); }
.mk-tier__cta::after { content: '→'; transition: transform .2s ease; }
.mk-tier__cta:hover::after { transform: translateX(3px); }

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
  color: #fff;
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
    <div class="mk-hero__text">
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
      <div class="mk-hero__trust">
        <div class="mk-hero__trust-item">
          <span class="mk-hero__trust-num"><span>4</span></span>
          <span class="mk-hero__trust-lbl">Channels covered</span>
        </div>
        <div class="mk-hero__trust-item">
          <span class="mk-hero__trust-num"><span>100%</span></span>
          <span class="mk-hero__trust-lbl">AU specialists</span>
        </div>
        <div class="mk-hero__trust-item">
          <span class="mk-hero__trust-num"><span>Monthly</span></span>
          <span class="mk-hero__trust-lbl">Reporting &amp; reviews</span>
        </div>
      </div>
    </div>

    <div class="mk-hero__visual" aria-hidden="true">
      <div class="mk-hero__orb"></div>

      <div class="mk-chcard mk-chcard--seo">
        <div class="mk-chcard__ico">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
        </div>
        <div>
          <div class="mk-chcard__ttl">SEO</div>
          <div class="mk-chcard__sub">Search visibility</div>
        </div>
      </div>

      <div class="mk-chcard mk-chcard--meta">
        <div class="mk-chcard__ico">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95 0-5.52-4.48-10-10-10z"/></svg>
        </div>
        <div>
          <div class="mk-chcard__ttl">Meta Ads</div>
          <div class="mk-chcard__sub">Facebook &amp; Instagram</div>
        </div>
      </div>

      <div class="mk-chcard mk-chcard--google">
        <div class="mk-chcard__ico">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="15 7 21 7 21 13"/></svg>
        </div>
        <div>
          <div class="mk-chcard__ttl">Google Ads</div>
          <div class="mk-chcard__sub">Search &amp; display</div>
        </div>
      </div>

      <div class="mk-metric">
        <div class="mk-metric__row">
          <span class="mk-metric__lbl">Growth</span>
          <span class="mk-metric__val">42%</span>
        </div>
        <div class="mk-metric__bars">
          <span class="mk-metric__bar"></span>
          <span class="mk-metric__bar"></span>
          <span class="mk-metric__bar"></span>
          <span class="mk-metric__bar"></span>
          <span class="mk-metric__bar"></span>
          <span class="mk-metric__bar"></span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SEO -->
<section class="mk-section" id="seo">
  <div class="container">
    <div class="mk-section__header">
<span class="mk-section__kicker" style="background:rgba(16,185,129,0.1);color:#10b981;border:1px solid rgba(16,185,129,0.2);">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="#10b981" stroke-width="2"/><path d="M20 20l-3.5-3.5" stroke="#10b981" stroke-width="2" stroke-linecap="round"/></svg>
        SEO
      </span>
      <h2 class="mk-section__title">Search Engine <span class="mk-section__title-hl">Optimisation</span></h2>
      <span class="mk-section__divider"></span>
      <p class="mk-section__lead">Improve your visibility on Google and attract the right local customers. We handle audits, on-page improvements, content and Google Business Profile management.</p>
      <span class="mk-coming mk-coming--float">Online Purchase Coming Soon</span>
    </div>

    <div class="mk-tiers">
      <!-- Silver -->
      <div class="mk-tier mk-tier--silver">
        <div class="mk-tier__head">
          <div class="mk-tier__icon">S</div>
          <div><div class="mk-tier__name">Silver</div><div class="mk-tier__sub">Starter plan</div></div>
        </div>
        <div class="mk-tier__price-wrap">
          <div class="mk-tier__price"><sup>$</sup>299</div>
          <div class="mk-tier__period">per month</div>
        </div>
        <ul class="mk-tier__list">
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> One location</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Google Business Profile support</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Up to 2 page improvements monthly</li>
          <li><span class="mk-tier__check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-5" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span> Initial audit &amp; monthly reporting</li>
        </ul>
        <a href="/contact.php?service=seo-silver" class="mk-tier__cta mk-tier__cta--outline">Contact Us</a>
      </div>

      <!-- Gold -->
      <div class="mk-tier mk-tier--gold mk-tier--featured">
        <span class="mk-tier__badge">Most Popular</span>
        <div class="mk-tier__head">
          <div class="mk-tier__icon">G</div>
          <div><div class="mk-tier__name">Gold</div><div class="mk-tier__sub">Most chosen</div></div>
        </div>
        <div class="mk-tier__price-wrap">
          <div class="mk-tier__price"><sup>$</sup>399</div>
          <div class="mk-tier__period">per month</div>
        </div>
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
      <div class="mk-tier mk-tier--platinum">
        <div class="mk-tier__head">
          <div class="mk-tier__icon">P</div>
          <div><div class="mk-tier__name">Platinum</div><div class="mk-tier__sub">Full coverage</div></div>
        </div>
        <div class="mk-tier__price-wrap">
          <div class="mk-tier__price"><sup>$</sup>499</div>
          <div class="mk-tier__period">per month</div>
        </div>
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
    <div class="mk-section__header">
<span class="mk-section__kicker" style="background:rgba(59,130,246,0.1);color:#3b82f6;border:1px solid rgba(59,130,246,0.2);">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#3b82f6" stroke-width="2"/><path d="M8 12a4 4 0 1 0 8 0 4 4 0 0 0-8 0z" stroke="#3b82f6" stroke-width="2"/></svg>
        META ADS
      </span>
      <h2 class="mk-section__title">Meta Ads <span class="mk-section__title-hl">Management</span></h2>
      <span class="mk-section__divider"></span>
      <p class="mk-section__lead">Facebook and Instagram advertising managed by specialists. We create campaigns, design assets and optimise performance so your ad spend works harder.</p>
      <span class="mk-coming mk-coming--float">Online Purchase Coming Soon</span>
    </div>

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
    <div class="mk-section__header">
<span class="mk-section__kicker" style="background:rgba(234,67,53,0.1);color:#ea4335;border:1px solid rgba(234,67,53,0.2);">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="3" stroke="#ea4335" stroke-width="2"/><path d="M8 12h8M12 8v8" stroke="#ea4335" stroke-width="2" stroke-linecap="round"/></svg>
        GOOGLE ADS
      </span>
      <h2 class="mk-section__title">Google Ads <span class="mk-section__title-hl">Management</span></h2>
      <span class="mk-section__divider"></span>
      <p class="mk-section__lead">Reach customers actively searching for your services. We set up, manage and optimise Google Search campaigns so you appear at the right time.</p>
      <span class="mk-coming mk-coming--float">Online Purchase Coming Soon</span>
    </div>

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
    <div class="mk-section__header">
<span class="mk-section__kicker" style="background:rgba(139,92,246,0.1);color:#8b5cf6;border:1px solid rgba(139,92,246,0.2);">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="#8b5cf6" stroke-width="2" stroke-linejoin="round"/></svg>
        CONSULTATION &amp; DESIGN
      </span>
      <h2 class="mk-section__title">Consultation &amp; <span class="mk-section__title-hl">Design Services</span></h2>
      <span class="mk-section__divider"></span>
      <p class="mk-section__lead">Expert advice, actionable marketing plans and professional design assets. Book a session, get a strategy, or order design work &mdash; all at clear, upfront prices.</p>
    </div>

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
