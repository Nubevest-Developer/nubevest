<?php
/**
 * Shared industry-page partial.
 * Requires $industry array with keys:
 *   slug, name, tint (color pair + tints), problem_lead,
 *   pain_points (array), solution_mix (array of {label, href, sub}),
 *   brand_callouts (array of {name, href, endorsement}), cta_href
 */
$i = $industry;

// Normalise the name so data with either raw '&' or already-encoded '&amp;'
// renders correctly wherever we escape it again below.
$i['name']       = html_entity_decode($i['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$name_lower      = mb_strtolower($i['name']);
$name_upper      = mb_strtoupper($i['name']);

$seo_title = ($i['seo_title']  ?? ($i['name'] . ' — Nubevest solutions built around how you operate'));
$meta_desc = ($i['meta_desc']  ?? ('Nubevest brings websites, CRM, software, IT, hardware and events together for ' . $name_lower . ' — one accountable relationship.'));
$page = 'industries';
include __DIR__ . '/header.php';
?>

<style>
/* Solid white header — no glass/transparency effect */
.header {
  background: #ffffff !important;
  backdrop-filter: none !important;
  -webkit-backdrop-filter: none !important;
  border-bottom: 1px solid #eef2f7 !important;
}
.header.scrolled {
  background: #ffffff !important;
  backdrop-filter: none !important;
  -webkit-backdrop-filter: none !important;
  box-shadow: 0 4px 20px -12px rgba(15,23,42,0.12) !important;
}
.header__logo img { filter: none !important; }
.header__nav-link { color: #334155 !important; font-weight: 600; }
.header__nav-link:hover,
.header__nav-link.active { color: #0f172a !important; background: rgba(37,99,235,0.06) !important; }
.header__nav-link.active {
  background: rgba(37,99,235,0.10) !important;
  box-shadow: inset 0 0 0 1px rgba(37,99,235,0.18) !important;
  color: #2563eb !important;
}

.ip-hero {
  position: relative;
  /* Content clears the fixed header; header itself stays untouched */
  padding: calc(var(--header-height, 118px) + clamp(40px, 5vw, 70px)) 0 clamp(52px, 6vw, 80px);
  background:
    radial-gradient(900px 400px at 0% 0%, <?= $i['tint'][2] ?> 0%, transparent 55%),
    radial-gradient(900px 400px at 100% 100%, <?= $i['tint'][3] ?> 0%, transparent 55%),
    linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
  overflow: hidden;
}
/* Decorative dot grid */
.ip-hero::before {
  content: "";
  position: absolute; inset: 0;
  background-image: radial-gradient(circle at 1px 1px, color-mix(in oklab, <?= $i['tint'][0] ?> 45%, transparent) 1px, transparent 0);
  background-size: 28px 28px;
  opacity: .12;
  mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000, transparent 75%);
  pointer-events: none;
}
.ip-hero__inner { position: relative; max-width: 920px; margin: 0 auto; text-align: center; }
.ip-hero__kicker {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 8px 18px 8px 14px;
  background: #ffffff; border: 1px solid #e2e8f0;
  border-radius: 999px;
  color: #334155;
  font-size: 0.7rem; font-weight: 800; letter-spacing: 0.16em; text-transform: uppercase;
  box-shadow: 0 8px 22px -12px rgba(15,23,42,0.18), 0 0 0 4px rgba(255,255,255,.6);
}
.ip-hero__kicker::before {
  content: ""; width: 9px; height: 9px; border-radius: 50%;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  box-shadow: 0 0 0 4px <?= $i['tint'][2] ?>;
  animation: ipPulse 2.4s ease-in-out infinite;
}
@keyframes ipPulse {
  0%, 100% { box-shadow: 0 0 0 4px <?= $i['tint'][2] ?>; }
  50%      { box-shadow: 0 0 0 8px color-mix(in oklab, <?= $i['tint'][0] ?> 12%, transparent); }
}
.ip-hero h1 {
  font-size: clamp(2.1rem, 4.6vw, 3.25rem);
  font-weight: 800; letter-spacing: -0.028em; line-height: 1.08;
  color: #0f172a; margin: 24px 0 18px;
}
.ip-hero__grad {
  background: linear-gradient(90deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  -webkit-background-clip: text; background-clip: text; color: transparent;
  padding-right: 2px;
}
.ip-hero p { color: #475569; font-size: 1.08rem; line-height: 1.7; margin: 0 auto 32px; max-width: 660px; }

/* Stat/chip row under hero copy — subtle credibility strip */
.ip-hero__chips { display: inline-flex; flex-wrap: wrap; gap: 8px; margin-top: 22px; justify-content: center; }
.ip-hero__chip {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 8px 14px; border-radius: 999px;
  background: rgba(255,255,255,.75);
  border: 1px solid #e2e8f0;
  color: #475569; font-size: .78rem; font-weight: 600;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.ip-hero__chip svg { width: 14px; height: 14px; color: <?= $i['tint'][0] ?>; }
.ip-cta {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 14px 24px;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  color: #fff; text-decoration: none; font-weight: 700; font-size: 0.95rem;
  border-radius: 999px;
  box-shadow: 0 14px 30px -14px color-mix(in oklab, <?= $i['tint'][0] ?> 55%, transparent);
  transition: transform 0.2s ease;
}
.ip-cta:hover { transform: translateY(-2px); }

.ip-section { padding: clamp(56px, 7vw, 96px) 0; position: relative; }
.ip-section--tint {
  background:
    radial-gradient(1200px 400px at 50% -20%, <?= $i['tint'][2] ?> 0%, transparent 60%),
    #f8fafc;
}
.ip-head { text-align: center; max-width: 740px; margin: 0 auto 44px; }
.ip-head h2 {
  font-size: clamp(1.75rem, 3.2vw, 2.4rem);
  font-weight: 800; color: #0f172a; letter-spacing: -0.024em; line-height: 1.15;
  margin: 14px 0 12px;
}
.ip-head p { color: #475569; font-size: 1rem; line-height: 1.65; margin: 0; }
.ip-kicker {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 7px 16px;
  background: <?= $i['tint'][2] ?>;
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 75%, #1e293b);
  border: 1px solid color-mix(in oklab, <?= $i['tint'][0] ?> 22%, transparent);
  border-radius: 999px;
  font-size: 0.7rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase;
}
.ip-kicker::before {
  content: ""; width: 6px; height: 6px; border-radius: 50%;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
}

/* PAIN POINTS — clean numbered cards with left accent rail */
.ip-pain {
  display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 18px; max-width: 1100px; margin: 0 auto;
  counter-reset: pain;
}
.ip-pain__item {
  position: relative;
  background: #ffffff;
  border: 1px solid #e6e9f2;
  border-radius: 16px;
  padding: 22px 24px 22px 24px;
  color: #334155; font-size: 0.95rem; line-height: 1.6;
  transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
  counter-increment: pain;
  overflow: hidden;
  isolation: isolate;
}
/* Left accent rail — reveals on hover */
.ip-pain__item::before {
  content: "";
  position: absolute; top: 0; bottom: 0; left: 0; width: 4px;
  background: linear-gradient(180deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  transform: scaleY(.3);
  transform-origin: top;
  transition: transform .35s cubic-bezier(.2,.7,.2,1);
  border-radius: 16px 0 0 16px;
}
.ip-pain__item:hover {
  transform: translateY(-3px);
  border-color: color-mix(in oklab, <?= $i['tint'][0] ?> 30%, #e6e9f2);
  box-shadow: 0 18px 34px -22px color-mix(in oklab, <?= $i['tint'][0] ?> 40%, rgba(15,23,42,0.25));
}
.ip-pain__item:hover::before { transform: scaleY(1); }

/* Header row: number + warning chip */
.ip-pain__head {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 14px;
}
.ip-pain__num {
  font-size: 1.6rem; font-weight: 900; letter-spacing: -.04em; line-height: 1;
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 60%, #0f172a);
  font-variant-numeric: tabular-nums;
}
.ip-pain__num::before { content: "0" counter(pain); }
.ip-pain__chip {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 4px 10px 4px 8px;
  border-radius: 999px;
  background: #fef2f2;
  color: #b91c1c;
  font-size: .65rem; font-weight: 800; letter-spacing: .06em; text-transform: uppercase;
  border: 1px solid rgba(185,28,28,.14);
}
.ip-pain__chip svg { width: 12px; height: 12px; }
.ip-pain__text {
  color: #334155; font-size: .95rem; line-height: 1.6;
  display: block;
}
/* keep the old .ip-pain__x usable if any file still emits it */
.ip-pain__x { display: none; }

/* SOLUTION MIX — feature cards, stacked, generous */
.ip-mix {
  display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 18px; max-width: 1200px; margin: 0 auto;
}
.ip-mix a {
  position: relative;
  display: flex; flex-direction: column;
  padding: 26px 26px 22px;
  background: #ffffff;
  border: 1px solid #e6e9f2;
  border-radius: 20px;
  text-decoration: none; color: #0f172a;
  transition: transform 0.3s cubic-bezier(.2,.7,.2,1), border-color 0.25s ease, box-shadow 0.3s ease;
  overflow: hidden;
  isolation: isolate;
  min-height: 200px;
}
/* Ambient corner glow */
.ip-mix a::before {
  content: "";
  position: absolute;
  top: -80px; right: -80px;
  width: 240px; height: 240px;
  border-radius: 50%;
  background: radial-gradient(closest-side, color-mix(in oklab, <?= $i['tint'][0] ?> 22%, transparent), transparent 70%);
  opacity: 0;
  transition: opacity .35s ease;
  z-index: -1;
  pointer-events: none;
}
/* Bottom gradient rail */
.ip-mix a::after {
  content: "";
  position: absolute; inset: auto 0 0 0;
  height: 3px;
  background: linear-gradient(90deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .4s cubic-bezier(.2,.7,.2,1);
}
.ip-mix a:hover {
  transform: translateY(-4px);
  border-color: color-mix(in oklab, <?= $i['tint'][0] ?> 40%, #e6e9f2);
  box-shadow: 0 24px 44px -22px color-mix(in oklab, <?= $i['tint'][0] ?> 50%, rgba(15,23,42,0.22));
}
.ip-mix a:hover::before { opacity: 1; }
.ip-mix a:hover::after { transform: scaleX(1); }
.ip-mix a:hover .ip-mix__check { transform: rotate(-5deg) scale(1.06); }
.ip-mix a:hover .ip-mix__go {
  color: <?= $i['tint'][0] ?>;
  gap: 10px;
}
.ip-mix a:hover .ip-mix__go svg { transform: translateX(4px); }

.ip-mix__head {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 18px;
}
.ip-mix__check {
  width: 44px; height: 44px; border-radius: 14px;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  color: #fff;
  display: grid; place-items: center;
  box-shadow: 0 10px 22px -10px color-mix(in oklab, <?= $i['tint'][0] ?> 60%, transparent);
  transition: transform .35s cubic-bezier(.2,.7,.2,1);
}
.ip-mix__check svg { width: 20px; height: 20px; }
.ip-mix__tag {
  font-size: .65rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase;
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 65%, #64748b);
  padding: 5px 10px;
  border-radius: 999px;
  background: color-mix(in oklab, <?= $i['tint'][0] ?> 10%, #ffffff);
  border: 1px solid color-mix(in oklab, <?= $i['tint'][0] ?> 18%, transparent);
}

.ip-mix__body { min-width: 0; flex-grow: 1; }
.ip-mix__label {
  display: block;
  font-weight: 800; font-size: 1.05rem; color: #0f172a;
  letter-spacing: -0.012em; line-height: 1.3;
  margin-bottom: 8px;
}
.ip-mix__sub {
  display: block; font-size: 0.9rem; color: #64748b;
  line-height: 1.55;
}

.ip-mix__go {
  display: inline-flex; align-items: center; gap: 6px;
  margin-top: 18px;
  padding-top: 16px;
  border-top: 1px dashed #e5e7eb;
  font-size: .85rem; font-weight: 700;
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 55%, #64748b);
  transition: gap .25s ease, color .25s ease;
}
.ip-mix__go svg { transition: transform .25s ease; }

/* BRAND CALLOUTS — visual badges with monogram */
.ip-brands {
  display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 16px; max-width: 1100px; margin: 0 auto;
}
.ip-brands a {
  position: relative;
  display: flex; flex-direction: column; gap: 4px;
  padding: 22px 22px 20px;
  background: #ffffff;
  border: 1px solid #e6e9f2;
  border-radius: 18px;
  text-decoration: none;
  transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
  overflow: hidden;
}
.ip-brands a::before {
  content: "";
  position: absolute;
  top: -40px; right: -40px;
  width: 120px; height: 120px;
  border-radius: 50%;
  background: radial-gradient(closest-side, color-mix(in oklab, <?= $i['tint'][0] ?> 18%, transparent), transparent 70%);
  opacity: 0;
  transition: opacity .3s ease;
}
.ip-brands a:hover {
  transform: translateY(-4px);
  border-color: color-mix(in oklab, <?= $i['tint'][0] ?> 35%, #e6e9f2);
  box-shadow: 0 20px 38px -22px color-mix(in oklab, <?= $i['tint'][0] ?> 40%, rgba(15,23,42,0.22));
}
.ip-brands a:hover::before { opacity: 1; }
.ip-brands__mono {
  width: 42px; height: 42px; border-radius: 12px;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  color: #fff;
  display: inline-grid; place-items: center;
  font-weight: 900; font-size: 1.1rem; letter-spacing: -.02em;
  margin-bottom: 12px;
  box-shadow: 0 10px 20px -10px color-mix(in oklab, <?= $i['tint'][0] ?> 55%, transparent);
}
.ip-brands__name { color: #0f172a; font-weight: 800; letter-spacing: -0.005em; font-size: 1.02rem; }
.ip-brands__endorse {
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 65%, #475569);
  font-size: 0.68rem; font-weight: 700; letter-spacing: 0.06em;
  text-transform: uppercase; margin-top: 2px;
}
.ip-brands__arrow {
  margin-top: 14px;
  display: inline-flex; align-items: center; gap: 6px;
  font-size: .85rem; font-weight: 700;
  color: color-mix(in oklab, <?= $i['tint'][0] ?> 70%, #334155);
}
.ip-brands a:hover .ip-brands__arrow svg { transform: translateX(4px); }
.ip-brands__arrow svg { transition: transform .25s ease; }

/* END CTA — brand-tinted glass panel with accent glow */
.ip-endnote {
  position: relative;
  max-width: 1100px; margin: 0 auto;
  padding: 40px 40px;
  background:
    radial-gradient(700px 300px at 0% 0%, color-mix(in oklab, <?= $i['tint'][0] ?> 35%, transparent), transparent 55%),
    radial-gradient(700px 300px at 100% 100%, color-mix(in oklab, <?= $i['tint'][1] ?> 30%, transparent), transparent 55%),
    linear-gradient(135deg, #0b1220, #1e293b);
  color: #cbd5e1; border-radius: 24px;
  display: grid; grid-template-columns: auto 1fr auto; gap: 26px; align-items: center;
  box-shadow: 0 30px 60px -24px rgba(15,23,42,0.45);
  overflow: hidden;
}
.ip-endnote::before {
  content: "";
  position: absolute; inset: 0;
  background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,.08) 1px, transparent 0);
  background-size: 24px 24px;
  mask-image: linear-gradient(180deg, transparent, #000 40%, transparent);
  pointer-events: none;
}
.ip-endnote__icon {
  position: relative; flex: none;
  width: 60px; height: 60px; border-radius: 18px;
  display: grid; place-items: center;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  color: #fff;
  box-shadow: 0 14px 28px -10px color-mix(in oklab, <?= $i['tint'][0] ?> 65%, transparent);
}
.ip-endnote__body { position: relative; min-width: 0; }
.ip-endnote__t { color: #ffffff; font-weight: 800; margin-bottom: 6px; letter-spacing: -0.01em; font-size: 1.2rem; }
.ip-endnote__s { color: #a4b0c3; font-size: 0.95rem; line-height: 1.55; max-width: 560px; }
.ip-endnote__btn {
  position: relative;
  display: inline-flex; align-items: center; gap: 8px;
  padding: 14px 24px;
  background: linear-gradient(135deg, <?= $i['tint'][0] ?>, <?= $i['tint'][1] ?>);
  color: #fff; text-decoration: none; font-weight: 700; font-size: 0.95rem;
  border-radius: 999px;
  white-space: nowrap;
  box-shadow: 0 14px 30px -12px color-mix(in oklab, <?= $i['tint'][0] ?> 65%, transparent);
  transition: transform 0.2s ease, box-shadow 0.25s ease;
}
.ip-endnote__btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 20px 38px -12px color-mix(in oklab, <?= $i['tint'][0] ?> 75%, transparent);
}
.ip-endnote__btn svg { transition: transform .25s ease; }
.ip-endnote__btn:hover svg { transform: translateX(4px); }

@media (max-width: 720px) {
  .ip-endnote { grid-template-columns: 1fr; padding: 28px 22px; text-align: left; }
  .ip-endnote__btn { justify-self: start; }
}
</style>

<main id="main">

<section class="ip-hero">
  <div class="container">
    <div class="ip-hero__inner">
      <span class="ip-hero__kicker">INDUSTRY &middot; <?= htmlspecialchars($name_upper, ENT_QUOTES, 'UTF-8') ?></span>
      <h1><?= htmlspecialchars($i['name'], ENT_QUOTES, 'UTF-8') ?> &mdash; <span class="ip-hero__grad">practical solutions from Nubevest.</span></h1>
      <p><?= $i['problem_lead'] ?></p>
      <a href="<?= $i['cta_href'] ?? '/contact.php' ?>" class="ip-cta">
        Book a Call
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
      <div class="ip-hero__chips">
        <span class="ip-hero__chip"><svg viewBox="0 0 24 24" fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>One accountable relationship</span>
        <span class="ip-hero__chip"><svg viewBox="0 0 24 24" fill="none"><path d="M4 12h16M12 4v16" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Websites, CRM, IT &amp; hardware</span>
        <span class="ip-hero__chip"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Australia-wide delivery</span>
      </div>
    </div>
  </div>
</section>

<section class="ip-section ip-section--tint">
  <div class="container">
    <div class="ip-head">
      <span class="ip-kicker">Where time and opportunities leak</span>
      <h2>Common bottlenecks we hear from <?= htmlspecialchars($name_lower, ENT_QUOTES, 'UTF-8') ?>.</h2>
      <p>Tell us which of these matches your situation &mdash; we&rsquo;ll shape the response accordingly.</p>
    </div>
    <div class="ip-pain">
      <?php foreach ($i['pain_points'] as $p): ?>
      <div class="ip-pain__item">
        <div class="ip-pain__head">
          <span class="ip-pain__num" aria-hidden="true"></span>
          <span class="ip-pain__chip">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3l10 18H2L12 3z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M12 10v5M12 18v.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            Pain point
          </span>
        </div>
        <span class="ip-pain__text"><?= $p ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="ip-section">
  <div class="container">
    <div class="ip-head">
      <span class="ip-kicker">One connected response</span>
      <h2>The Nubevest solution mix.</h2>
      <p>Nubevest leads the engagement, brings in the right services, platforms and specialist Nubevest businesses, and explains who&rsquo;s responsible for what.</p>
    </div>
    <div class="ip-mix">
      <?php foreach ($i['solution_mix'] as $idx => $s): ?>
      <a href="<?= $s['href'] ?>">
        <div class="ip-mix__head">
          <span class="ip-mix__check"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          <span class="ip-mix__tag">0<?= $idx + 1 ?></span>
        </div>
        <div class="ip-mix__body">
          <span class="ip-mix__label"><?= htmlspecialchars(html_entity_decode($s['label'], ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES, 'UTF-8') ?></span>
          <?php if (!empty($s['sub'])): ?><span class="ip-mix__sub"><?= $s['sub'] ?></span><?php endif; ?>
        </div>
        <span class="ip-mix__go">Explore this solution
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if (!empty($i['brand_callouts'])): ?>
<section class="ip-section ip-section--tint">
  <div class="container">
    <div class="ip-head">
      <span class="ip-kicker">Specialist support</span>
      <h2>Nubevest brands that fit this industry.</h2>
      <p>Each is a Nubevest platform, service brand or specialist Nubevest business &mdash; visibly connected to Nubevest, never a separate company.</p>
    </div>
    <div class="ip-brands">
      <?php foreach ($i['brand_callouts'] as $bc):
        $bcName   = html_entity_decode($bc['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $bcEndor  = html_entity_decode($bc['endorsement'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Monogram: first letter of first two words (e.g. GoMeta CRM → GC), or first two chars.
        $words    = preg_split('/\s+/', trim($bcName));
        $mono     = mb_strtoupper(mb_substr($words[0] ?? '?', 0, 1) . mb_substr($words[1] ?? mb_substr($words[0] ?? '', 1, 1), 0, 1));
      ?>
      <a href="<?= $bc['href'] ?>">
        <span class="ip-brands__mono"><?= htmlspecialchars($mono, ENT_QUOTES, 'UTF-8') ?></span>
        <div class="ip-brands__name"><?= htmlspecialchars($bcName, ENT_QUOTES, 'UTF-8') ?></div>
        <div class="ip-brands__endorse"><?= htmlspecialchars($bcEndor, ENT_QUOTES, 'UTF-8') ?></div>
        <span class="ip-brands__arrow">Learn more
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="ip-section">
  <div class="container">
    <div class="ip-endnote">
      <span class="ip-endnote__icon" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
      </span>
      <div class="ip-endnote__body">
        <div class="ip-endnote__t">Not sure where to start?</div>
        <div class="ip-endnote__s">Tell us where the business is losing time or opportunities &mdash; we&rsquo;ll recommend a practical starting point, one accountable Nubevest relationship.</div>
      </div>
      <a href="/contact.php" class="ip-endnote__btn">
        Book a Call
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . '/footer.php'; ?>
