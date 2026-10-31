<?php
$page = 'solutions';
$seo_title = 'Business Hardware & Workplace Technology | Nubevest';
$meta_desc = 'Source, configure and support business computers, monitors, meeting-room AV, communications, storage and workplace technology with Nubevest.';
include __DIR__ . '/../includes/header.php';
?>

<style>
/* Workplace Technology — page-specific accents */
.wt-desk {
  position:relative;
  background: linear-gradient(180deg,#f8fafc, #f1f5f9);
  border:1px solid #e2e8f0; border-radius:20px;
  padding:22px 20px 14px;
  box-shadow: 0 30px 60px -20px rgba(6,182,212,0.4), 0 0 0 6px #fff, 0 0 0 7px rgba(6,182,212,0.15);
  overflow:hidden;
}
.wt-desk::before {
  content:''; position:absolute; top:-40%; right:-20%; width:380px; height:380px; border-radius:50%;
  background: radial-gradient(circle, rgba(6,182,212,0.28), transparent 60%);
}
.wt-desk > * { position:relative; }

.wt-desk__head { display:flex; align-items:center; gap:10px; margin-bottom:14px; }
.wt-desk__logo { width:32px; height:32px; border-radius:8px; background: linear-gradient(135deg,#06b6d4,#3b82f6); display:grid; place-items:center; color:#fff; }
.wt-desk__t { font-size:0.95rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.wt-desk__s { font-size:0.7rem; color:#64748b; font-weight:600; }
.wt-desk__badge { margin-left:auto; padding:4px 10px; background:#ecfeff; color:#0e7490; border-radius:999px; font-size:0.62rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase; }

/* Monitor + peripheral scene */
.wt-scene { background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:14px; margin-bottom:12px; }
.wt-scene__row1 { display:flex; align-items:flex-end; gap:10px; margin-bottom:12px; }
.wt-monitor {
  flex:1; background: linear-gradient(180deg,#1e293b,#0f172a);
  border-radius:8px 8px 4px 4px; border:3px solid #334155;
  padding:8px; height:110px; position:relative;
  box-shadow: 0 6px 16px -4px rgba(15,23,42,0.25);
}
.wt-monitor::after { content:''; position:absolute; left:50%; bottom:-10px; transform:translateX(-50%); width:56px; height:6px; background:#334155; border-radius:0 0 8px 8px; }
.wt-monitor__screen {
  height:100%; background: linear-gradient(135deg,#06b6d4 0%, #3b82f6 100%);
  border-radius:4px; padding:10px; display:flex; flex-direction:column; gap:6px;
}
.wt-monitor__topbar { display:flex; align-items:center; gap:4px; margin-bottom:2px; }
.wt-monitor__dot { width:5px; height:5px; border-radius:50%; background: rgba(255,255,255,0.4); }
.wt-monitor__line { height:4px; background: rgba(255,255,255,0.35); border-radius:2px; }
.wt-monitor__line.w60 { width:60%; }
.wt-monitor__line.w80 { width:80%; }
.wt-monitor__line.w40 { width:40%; }
.wt-monitor__block { flex:1; background: rgba(255,255,255,0.15); border-radius:4px; margin-top:auto; }

.wt-laptop {
  flex:0 0 90px; background: linear-gradient(180deg,#334155,#1e293b);
  border-radius:6px 6px 2px 2px; padding:5px; height:78px;
  position:relative;
  box-shadow: 0 6px 16px -4px rgba(15,23,42,0.2);
}
.wt-laptop::after { content:''; position:absolute; left:-6px; right:-6px; bottom:-4px; height:4px; background:#475569; border-radius:0 0 6px 6px; }
.wt-laptop__screen { height:100%; background: linear-gradient(135deg,#8b5cf6,#7c3aed); border-radius:3px; }

.wt-row2 { display:grid; grid-template-columns: 1fr 1fr 1fr; gap:8px; }
.wt-peri {
  background:#f8fafc; border:1px solid #e2e8f0; border-radius:8px;
  padding:8px; display:flex; align-items:center; gap:8px;
}
.wt-peri__ico { width:26px; height:26px; border-radius:6px; display:grid; place-items:center; color:#fff; flex-shrink:0; }
.wt-peri__t { font-size:0.68rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.wt-peri__s { font-size:0.58rem; color:#64748b; font-weight:600; }

/* Order card */
.wt-order {
  background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:12px 14px;
  display:flex; align-items:center; gap:10px;
}
.wt-order__ico { width:32px; height:32px; border-radius:8px; background: linear-gradient(135deg,#06b6d4,#0891b2); color:#fff; display:grid; place-items:center; flex-shrink:0; }
.wt-order__t { font-size:0.78rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.wt-order__s { font-size:0.65rem; color:#64748b; font-weight:600; }
.wt-order__price { margin-left:auto; font-size:0.85rem; font-weight:800; color:#06b6d4; }

/* Floating badges */
.wt-float {
  position:absolute; z-index:3;
  background:#fff; border:1px solid #eef1f5; border-radius:12px;
  padding:8px 12px 8px 10px;
  display:flex; align-items:center; gap:10px;
  box-shadow: 0 18px 36px -12px rgba(15,23,42,0.22);
}
.wt-float--top { top:-14px; right:14px; }
.wt-float--bot { bottom:-16px; left:-14px; }
.wt-float__ico { width:30px; height:30px; border-radius:8px; display:grid; place-items:center; color:#fff; }
.wt-float__t { font-size:0.78rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.wt-float__s { font-size:0.65rem; color:#64748b; font-weight:600; }

/* Metric strip */
.wt-metric {
  margin-top:32px; padding:26px;
  background: linear-gradient(135deg,#0f172a,#1e293b);
  border-radius:20px; color:#fff;
  display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;
  position:relative; overflow:hidden;
}
.wt-metric::before{ content:''; position:absolute; top:-40%; right:-10%; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(6,182,212,0.3), transparent 60%); }
.wt-metric__item { position:relative; }
.wt-metric__n { font-size:1.8rem; font-weight:800; letter-spacing:-0.02em; background:linear-gradient(90deg,#22d3ee,#60a5fa); -webkit-background-clip:text; background-clip:text; color:transparent; }
.wt-metric__l { font-size:0.85rem; color:#cbd5e1; font-weight:600; margin-top:4px; }
@media (max-width: 780px){ .wt-metric { grid-template-columns: repeat(2, 1fr); } }

/* MonitorMart hero band */
.wt-mart {
  position:relative;
  background: linear-gradient(135deg,#0891b2 0%,#06b6d4 50%,#0e7490 100%);
  border-radius:20px; padding:36px;
  color:#fff; overflow:hidden;
  display:grid; grid-template-columns: 1.4fr 1fr; gap:24px; align-items:center;
}
@media (max-width: 780px){ .wt-mart { grid-template-columns: 1fr; padding:24px; } }
.wt-mart::before { content:''; position:absolute; top:-50%; right:-15%; width:420px; height:420px; border-radius:50%; background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 60%); }
.wt-mart > * { position:relative; }
.wt-mart__kicker { display:inline-flex; align-items:center; gap:8px; padding: 6px 14px; background: rgba(255,255,255,0.15); border-radius:999px; font-size:0.72rem; font-weight:800; letter-spacing:0.1em; margin-bottom:14px; }
.wt-mart__kicker::before { content:''; width:8px; height:8px; border-radius:50%; background:#a7f3d0; }
.wt-mart__title { font-size: clamp(1.5rem, 2.6vw, 2rem); font-weight:800; letter-spacing:-0.02em; margin:0 0 12px; line-height:1.15; }
.wt-mart__p { font-size:0.95rem; line-height:1.6; margin:0 0 20px; color: rgba(255,255,255,0.9); max-width:520px; }
.wt-mart__btn { display:inline-flex; align-items:center; gap:8px; padding:11px 20px; background:#fff; color:#0891b2; border-radius:10px; font-weight:800; text-decoration:none; box-shadow: 0 14px 28px -8px rgba(15,23,42,0.3); transition: transform 0.2s ease, box-shadow 0.2s ease; }
.wt-mart__btn:hover { transform: translateY(-2px); box-shadow: 0 20px 32px -8px rgba(15,23,42,0.4); }

.wt-mart__visual { position:relative; height:180px; }
.wt-mart__mon {
  position:absolute; inset:0; margin:auto;
  width:220px; height:140px;
  background: linear-gradient(180deg,#0f172a,#1e293b);
  border-radius:10px 10px 4px 4px; border:5px solid #f8fafc;
  padding:8px;
  box-shadow: 0 20px 40px -8px rgba(15,23,42,0.4);
}
.wt-mart__mon::after { content:''; position:absolute; left:50%; bottom:-14px; transform:translateX(-50%); width:70px; height:8px; background:#f8fafc; border-radius:0 0 10px 10px; }
.wt-mart__mon-screen { height:100%; background: linear-gradient(135deg,#06b6d4, #22d3ee); border-radius:4px; padding:10px; display:flex; flex-direction:column; gap:6px; }
.wt-mart__mon-line { height:4px; background: rgba(255,255,255,0.4); border-radius:2px; }
.wt-mart__mon-line.w70 { width:70%; }
.wt-mart__mon-line.w50 { width:50%; }
.wt-mart__mon-block { flex:1; background: rgba(255,255,255,0.2); border-radius:4px; }
</style>

<main id="main">

<!-- HERO -->
<section class="ab-hero">
  <div class="container ab-hero__container reveal">
    <div class="ab-hero__left">
      <span class="kicker kicker--pill ab-hero__kicker"><i></i>WORKPLACE TECHNOLOGY &middot; A NUBEVEST SOLUTION</span>
      <h1 class="ab-hero__title">The right technology for <span class="hero__title-gradient">your people, space and budget.</span></h1>
      <p class="ab-hero__lead">Select, source, configure and support the hardware and workplace systems your team relies on every day &mdash; from computers and monitors to meeting-room AV and comms.</p>
      <div class="ab-hero__cta">
        <a href="/contact.php" class="btn btn--primary">Plan Your Workplace Setup</a>
        <a href="/brands/monitormart.php" class="btn btn--secondary btn--arrow-blue">Explore Monitormart</a>
      </div>
    </div>

    <div class="ab-hero__right">
      <div class="wt-desk">
        <div class="wt-desk__head">
          <div class="wt-desk__logo"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="12" rx="2" stroke="#fff" stroke-width="2"/><path d="M8 20h8M12 16v4" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg></div>
          <div>
            <div class="wt-desk__t">Workplace bundle</div>
            <div class="wt-desk__s">Delivered &amp; configured</div>
          </div>
          <span class="wt-desk__badge">Ready</span>
        </div>

        <div class="wt-scene">
          <div class="wt-scene__row1">
            <div class="wt-monitor">
              <div class="wt-monitor__screen">
                <div class="wt-monitor__topbar"><span class="wt-monitor__dot"></span><span class="wt-monitor__dot"></span><span class="wt-monitor__dot"></span></div>
                <div class="wt-monitor__line w60"></div>
                <div class="wt-monitor__line w80"></div>
                <div class="wt-monitor__line w40"></div>
                <div class="wt-monitor__block"></div>
              </div>
            </div>
            <div class="wt-laptop">
              <div class="wt-laptop__screen"></div>
            </div>
          </div>
          <div class="wt-row2">
            <div class="wt-peri">
              <div class="wt-peri__ico" style="background: linear-gradient(135deg,#06b6d4,#0891b2);"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="4" y="2" width="10" height="20" rx="2" stroke="currentColor" stroke-width="2"/><path d="M14 8h5v8h-5" stroke="currentColor" stroke-width="2"/></svg></div>
              <div><div class="wt-peri__t">Mic + cam</div><div class="wt-peri__s">Meeting AV</div></div>
            </div>
            <div class="wt-peri">
              <div class="wt-peri__ico" style="background: linear-gradient(135deg,#8b5cf6,#7c3aed);"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12a8 8 0 0 1 16 0M7 12a5 5 0 0 1 10 0M10 12a2 2 0 0 1 4 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="18" r="1.4" fill="currentColor"/></svg></div>
              <div><div class="wt-peri__t">Wi-Fi 6</div><div class="wt-peri__s">Whole office</div></div>
            </div>
            <div class="wt-peri">
              <div class="wt-peri__ico" style="background: linear-gradient(135deg,#10b981,#059669);"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 4v16M8 8h13M8 12h13M8 16h13" stroke="currentColor" stroke-width="2"/></svg></div>
              <div><div class="wt-peri__t">Storage</div><div class="wt-peri__s">NAS + backup</div></div>
            </div>
          </div>
        </div>

        <div class="wt-order">
          <div class="wt-order__ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 4h3l2 12h11l2-8H8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="20" r="1.6" stroke="currentColor" stroke-width="2"/><circle cx="18" cy="20" r="1.6" stroke="currentColor" stroke-width="2"/></svg></div>
          <div>
            <div class="wt-order__t">Team of 12 &middot; ready in 5 days</div>
            <div class="wt-order__s">Sourced &middot; configured &middot; installed</div>
          </div>
          <span class="wt-order__price">All-in</span>
        </div>
      </div>

      <div class="wt-float wt-float--top">
        <div class="wt-float__ico" style="background:linear-gradient(135deg,#06b6d4,#0891b2)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <div><div class="wt-float__t">One PO. One partner.</div><div class="wt-float__s">Sourced + set up</div></div>
      </div>

      <div class="wt-float wt-float--bot">
        <div class="wt-float__ico" style="background:linear-gradient(135deg,#3b82f6,#7c3aed)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="18" height="12" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 21h8M12 18v3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
        <div><div class="wt-float__t">48 monitors deployed</div><div class="wt-float__s">Last quarter</div></div>
      </div>
    </div>
  </div>
</section>

<!-- CAPABILITIES -->
<section id="capabilities" class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>CAPABILITIES</span>
      <h2 class="au-h2">Everything the team needs to work &mdash; <span class="au-grad">sourced, set up and supported.</span></h2>
      <p>From individual devices to whole-office setups &mdash; one accountable partner from purchase order to sign-off.</p>
    </div>

    <div class="solutions-grid reveal stagger">

      <a href="#" class="sol-card sol-card--blue">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 20h8M12 16v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">Computers, laptops &amp; monitors</h3>
            <p class="sol-card__desc">Business-grade hardware selected for the role, application load and lifecycle expectations.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="14" y="16" width="76" height="48" rx="4" fill="#eff6ff" stroke="#bfdbfe"/><rect x="18" y="20" width="68" height="38" rx="2" fill="#2563eb"/><rect x="42" y="66" width="20" height="4" fill="#bfdbfe"/><rect x="30" y="72" width="44" height="4" rx="2" fill="#3b82f6"/><rect x="96" y="30" width="22" height="34" rx="3" fill="#eff6ff" stroke="#bfdbfe"/><rect x="98" y="32" width="18" height="22" rx="1" fill="#3b82f6"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--cyan">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="2" y="6" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M16 10l6-3v10l-6-3z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
            <h3 class="sol-card__title">Meeting-room AV</h3>
            <p class="sol-card__desc">Displays, cameras, microphones and speakers designed around the space and how meetings actually run.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#ecfeff" stroke="#a5f3fc"/><rect x="30" y="24" width="70" height="42" rx="4" fill="#06b6d4"/><rect x="36" y="30" width="26" height="18" rx="2" fill="#22d3ee"/><rect x="66" y="30" width="28" height="18" rx="2" fill="#67e8f9"/><rect x="36" y="52" width="58" height="10" rx="2" fill="#0891b2"/><circle cx="24" cy="72" r="4" fill="#06b6d4"/><circle cx="65" cy="76" r="4" fill="#06b6d4"/><circle cx="106" cy="72" r="4" fill="#06b6d4"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--purple">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 12a8 8 0 0 1 16 0M7 12a5 5 0 0 1 10 0M10 12a2 2 0 0 1 4 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="18" r="1.4" fill="currentColor"/></svg></div>
            <h3 class="sol-card__title">Internet, Wi-Fi &amp; comms</h3>
            <p class="sol-card__desc">Business internet, whole-office Wi-Fi coverage, VoIP phone systems and video conferencing setup.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#f5f3ff" stroke="#ddd6fe"/><circle cx="65" cy="72" r="8" fill="#8b5cf6"/><path d="M35 60a35 35 0 0 1 60 0" stroke="#8b5cf6" stroke-width="3" fill="none" stroke-linecap="round"/><path d="M45 52a25 25 0 0 1 40 0" stroke="#a78bfa" stroke-width="3" fill="none" stroke-linecap="round"/><path d="M55 44a15 15 0 0 1 20 0" stroke="#c4b5fd" stroke-width="3" fill="none" stroke-linecap="round"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--amber">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 15h18M9 19v2M15 19v2M7 21h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">Point-of-sale &amp; retail</h3>
            <p class="sol-card__desc">POS terminals, payment devices, receipt printers and store setup &mdash; ready for opening day.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#fffbeb" stroke="#fde68a"/><rect x="30" y="22" width="70" height="46" rx="4" fill="#f59e0b"/><rect x="36" y="28" width="58" height="30" rx="2" fill="#fef3c7"/><rect x="46" y="34" width="38" height="4" rx="2" fill="#f59e0b"/><rect x="46" y="42" width="24" height="4" rx="2" fill="#fbbf24"/><rect x="46" y="50" width="30" height="4" rx="2" fill="#fbbf24"/><rect x="30" y="72" width="70" height="10" rx="2" fill="#fbbf24"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--green">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 4v16M8 8h13M8 12h13M8 16h13" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <h3 class="sol-card__title">Storage &amp; backup</h3>
            <p class="sol-card__desc">Local NAS, RAID storage and backup planning &mdash; combined with cloud where it makes sense.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#ecfdf5" stroke="#a7f3d0"/><rect x="30" y="22" width="70" height="14" rx="3" fill="#10b981"/><rect x="36" y="26" width="16" height="6" rx="1" fill="#d1fae5"/><circle cx="90" cy="29" r="2" fill="#a7f3d0"/><rect x="30" y="40" width="70" height="14" rx="3" fill="#059669"/><rect x="36" y="44" width="16" height="6" rx="1" fill="#d1fae5"/><circle cx="90" cy="47" r="2" fill="#a7f3d0"/><rect x="30" y="58" width="70" height="14" rx="3" fill="#10b981"/><rect x="36" y="62" width="16" height="6" rx="1" fill="#d1fae5"/><circle cx="90" cy="65" r="2" fill="#a7f3d0"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--pink">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 21V9l8-6 8 6v12" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 21v-6h6v6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
            <h3 class="sol-card__title">Office moves &amp; new setups</h3>
            <p class="sol-card__desc">Full workplace rollouts &mdash; cabling, devices, AV, connectivity and moving day coordination.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#fdf2f8" stroke="#fbcfe8"/><path d="M22 76V44l24-18 24 18v32" fill="#ec4899"/><rect x="34" y="52" width="10" height="10" fill="#fbcfe8"/><rect x="48" y="52" width="10" height="10" fill="#fbcfe8"/><rect x="38" y="66" width="14" height="10" fill="#fbcfe8"/><rect x="76" y="38" width="38" height="38" rx="2" fill="#db2777"/><rect x="82" y="44" width="10" height="8" fill="#fbcfe8"/><rect x="98" y="44" width="10" height="8" fill="#fbcfe8"/><rect x="82" y="56" width="10" height="8" fill="#fbcfe8"/><rect x="98" y="56" width="10" height="8" fill="#fbcfe8"/></svg>
          </div>
        </div>
      </a>

    </div>

    <div class="wt-metric reveal">
      <div class="wt-metric__item"><div class="wt-metric__n">One PO</div><div class="wt-metric__l">Not five suppliers</div></div>
      <div class="wt-metric__item"><div class="wt-metric__n">Day 1</div><div class="wt-metric__l">Setup &amp; sign-off</div></div>
      <div class="wt-metric__item"><div class="wt-metric__n">Lifecycle</div><div class="wt-metric__l">Refresh planned in advance</div></div>
      <div class="wt-metric__item"><div class="wt-metric__n">Compat</div><div class="wt-metric__l">Works with your stack</div></div>
    </div>
  </div>
</section>

<!-- PLAN THE COMPLETE SETUP -->
<style>
.tap-body { max-width: 1100px; display:grid; grid-template-columns: 1.1fr 1fr; gap: 44px; align-items:center; text-align:left; }
.tap-body h2 { color:#ffffff; text-align:left; margin-bottom:16px; }
.tap-body > .tap-left > p { text-align:left; color: rgba(255,255,255,0.78); font-size:1rem; line-height:1.7; margin:0 0 22px; }

.tap-chips { display:flex; flex-wrap:wrap; gap:8px; }
.tap-chip {
  display:inline-flex; align-items:center; gap:6px;
  padding:6px 12px; border-radius:999px;
  background: rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.16);
  color:#e2e8f0; font-size:0.75rem; font-weight:700;
}
.tap-chip svg { color:#60a5fa; flex-shrink:0; }

/* Right — considerations grid */
.tap-grid {
  display:grid; grid-template-columns: 1fr 1fr; gap:12px;
}
.tap-card {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.14);
  border-radius: 14px;
  padding: 16px;
  backdrop-filter: blur(6px);
  transition: transform .2s ease, background .2s ease, border-color .2s ease;
  display:flex; align-items:flex-start; gap:12px;
}
.tap-card:hover { transform: translateY(-2px); background: rgba(255,255,255,0.09); border-color: rgba(255,255,255,0.22); }
.tap-card__ico {
  width:36px; height:36px; border-radius:10px;
  display:grid; place-items:center; flex-shrink:0;
  background: var(--tap-bg); color: var(--tap-fg);
}
.tap-card__t { color:#ffffff; font-size:0.88rem; font-weight:800; letter-spacing:-0.01em; margin-bottom:2px; line-height:1.2; }
.tap-card__s { color: rgba(255,255,255,0.68); font-size:0.75rem; line-height:1.45; }

@media (max-width: 900px) {
  .tap-body { grid-template-columns: 1fr; gap: 28px; text-align:center; }
  .tap-body h2, .tap-body > .tap-left > p, .tap-body > .tap-left { text-align:center; }
  .tap-chips { justify-content:center; }
}
@media (max-width: 520px) {
  .tap-grid { grid-template-columns: 1fr; }
}
</style>
<section class="au-cta">
  <div class="container">
    <div class="au-cta__card reveal">
      <div class="au-cta__glow" aria-hidden="true"></div>
      <div class="au-cta__body tap-body">
        <div class="tap-left">
          <span class="kicker kicker--pill au-cta__kicker"><i></i>THE APPROACH</span>
          <h2>Plan the complete setup &mdash; <span class="au-grad">not just the shopping list.</span></h2>
          <p>A reliable workplace setup depends on more than buying devices. We look at the whole picture &mdash; how people work, what they need, and how it all fits together &mdash; before recommending anything.</p>
          <div class="tap-chips">
            <span class="tap-chip"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>Written recommendations</span>
            <span class="tap-chip"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>No shopping-list guesses</span>
            <span class="tap-chip"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>Vendor-neutral</span>
          </div>
        </div>

        <div class="tap-grid">
          <div class="tap-card" style="--tap-bg:rgba(96,165,250,0.16); --tap-fg:#60a5fa;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.4" stroke="currentColor" stroke-width="1.8"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div><div class="tap-card__t">User roles</div><div class="tap-card__s">Who does what, and where.</div></div>
          </div>

          <div class="tap-card" style="--tap-bg:rgba(167,139,250,0.16); --tap-fg:#a78bfa;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 20h8M12 18v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div><div class="tap-card__t">Software fit</div><div class="tap-card__s">Apps, licences &amp; compatibility.</div></div>
          </div>

          <div class="tap-card" style="--tap-bg:rgba(52,211,153,0.16); --tap-fg:#34d399;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 12a10 10 0 0114 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M8.5 15a5 5 0 017 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="18" r="1.4" fill="currentColor"/></svg></div>
            <div><div class="tap-card__t">Connectivity</div><div class="tap-card__s">Wi-Fi, network &amp; access.</div></div>
          </div>

          <div class="tap-card" style="--tap-bg:rgba(251,191,36,0.16); --tap-fg:#fbbf24;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 4v5c0 5-3.5 8.5-8 9-4.5-.5-8-4-8-9V7l8-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
            <div><div class="tap-card__t">Security</div><div class="tap-card__s">Sensible baseline controls.</div></div>
          </div>

          <div class="tap-card" style="--tap-bg:rgba(244,114,182,0.16); --tap-fg:#f472b6;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 18v2M16 18v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div><div class="tap-card__t">Meeting spaces</div><div class="tap-card__s">Screens, cameras &amp; audio.</div></div>
          </div>

          <div class="tap-card" style="--tap-bg:rgba(148,163,184,0.20); --tap-fg:#cbd5e1;">
            <div class="tap-card__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 4v6h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M20 20a8 8 0 10-4-14.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div><div class="tap-card__t">Lifecycle</div><div class="tap-card__s">Support &amp; replacement.</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW WE HELP -->
<section class="ab-do">
  <div class="container">
    <div class="ab-panel reveal">
      <h2 class="ab-panel__title">How we help</h2>
      <div class="ab-do__flow">
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--blue"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6" stroke="#2563eb" stroke-width="2"/><path d="M20 20l-4-4" stroke="#2563eb" stroke-width="2" stroke-linecap="round"/></svg></div>
          <div class="ab-do__title">Understand</div>
          <p>The users, work environment, applications and budget.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--green"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-6 4 3 6-9" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 8h6v6" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="ab-do__title">Recommend</div>
          <p>Suitable products and system requirements &mdash; in writing.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--amber"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 4h3l2 12h11l2-8H8" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="20" r="1.6" stroke="#f59e0b" stroke-width="2"/><circle cx="18" cy="20" r="1.6" stroke="#f59e0b" stroke-width="2"/></svg></div>
          <div class="ab-do__title">Source</div>
          <p>Through available suppliers or MonitorMart where appropriate.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--blue"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="#2563eb" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="#2563eb" stroke-width="2"/></svg></div>
          <div class="ab-do__title">Configure</div>
          <p>Devices, accounts, connectivity and business applications.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--green"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="#10b981" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="ab-do__title">Install</div>
          <p>Install, test, hand over and document the setup.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--amber"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="#f59e0b" stroke-width="2"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="#f59e0b" stroke-width="2" stroke-linecap="round"/></svg></div>
          <div class="ab-do__title">Support</div>
          <p>Ongoing help under the selected IT arrangement.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MONITORMART BAND -->
<style>
.mm-band {
  position:relative; overflow:hidden;
  background: linear-gradient(135deg,#0b1027 0%, #172554 55%, #4c1d95 100%);
  border-radius: 24px;
  padding: 40px;
  color:#f8fafc;
  display:grid; grid-template-columns: 1.15fr 1fr; gap: 40px; align-items:center;
  box-shadow: 0 30px 60px -30px rgba(76,29,149,0.5);
}
.mm-band::before {
  content:''; position:absolute; right:-100px; top:-100px; width:340px; height:340px;
  background: radial-gradient(circle, rgba(59,130,246,0.35), transparent 65%);
  filter: blur(20px);
}
.mm-band::after {
  content:''; position:absolute; left:-70px; bottom:-70px; width:260px; height:260px;
  background: radial-gradient(circle, rgba(236,72,153,0.28), transparent 65%);
  filter: blur(20px);
}
.mm-band > * { position:relative; }

.mm-kicker {
  display:inline-flex; align-items:center; gap:8px;
  padding:6px 12px; border-radius:999px;
  background: linear-gradient(135deg, rgba(59,130,246,0.2), rgba(236,72,153,0.2));
  border: 1px solid rgba(147,197,253,0.35);
  color:#dbeafe;
  font-size:0.7rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase;
  margin-bottom:16px;
}
.mm-kicker::before { content:''; width:6px; height:6px; border-radius:50%; background:#60a5fa; box-shadow:0 0 0 3px rgba(96,165,250,0.25); }

.mm-title { color:#ffffff; font-size: clamp(1.5rem, 2.6vw, 2rem); font-weight:800; letter-spacing:-0.02em; margin: 0 0 14px; line-height:1.2; }
.mm-title .grad { background: linear-gradient(135deg,#93c5fd,#f472b6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
.mm-desc { color:rgba(255,255,255,0.78); font-size:0.98rem; line-height:1.7; margin: 0 0 22px; }

.mm-signals { display:grid; grid-template-columns: 1fr 1fr; gap:8px 16px; margin: 0 0 22px; list-style:none; padding:0; }
.mm-signals li { display:flex; align-items:center; gap:8px; color:#e2e8f0; font-size:0.85rem; font-weight:600; }
.mm-signals svg { color:#34d399; flex-shrink:0; }

.mm-actions { display:flex; flex-wrap:wrap; gap:12px; align-items:center; }
.mm-btn {
  display:inline-flex; align-items:center; gap:8px;
  padding: 12px 18px;
  background:#ffffff; color:#0f172a;
  border-radius:10px; font-weight:800; font-size:0.9rem;
  text-decoration:none;
  transition: transform .2s ease, box-shadow .2s ease;
}
.mm-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 26px -10px rgba(255,255,255,0.35); }
.mm-btn--ghost {
  background: transparent; color:#ffffff;
  border:1px solid rgba(255,255,255,0.22);
}
.mm-btn--ghost:hover { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.4); box-shadow: none; }

/* Right — sourcing card */
.mm-card {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.16);
  border-radius: 20px;
  padding: 22px;
  backdrop-filter: blur(8px);
}
.mm-card__head { display:flex; align-items:center; justify-content:space-between; gap:10px; margin-bottom: 16px; padding-bottom:14px; border-bottom: 1px dashed rgba(255,255,255,0.18); }
.mm-card__brand { display:flex; align-items:center; gap:10px; }
.mm-card__logo { width:32px; height:32px; border-radius:8px; background: linear-gradient(135deg,#3b82f6,#7c3aed); display:grid; place-items:center; color:#fff; }
.mm-card__brand-t { color:#ffffff; font-size:0.9rem; font-weight:800; letter-spacing:-0.01em; }
.mm-card__brand-s { color:#94a3b8; font-size:0.68rem; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; }
.mm-card__pill { padding:4px 10px; border-radius:999px; background: rgba(52,211,153,0.15); color:#34d399; font-size:0.65rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase; display:inline-flex; align-items:center; gap:5px; }
.mm-card__pill::before { content:''; width:5px; height:5px; border-radius:50%; background:#10b981; box-shadow:0 0 0 3px rgba(16,185,129,0.3); }

.mm-flow { display:flex; align-items:center; justify-content:space-between; gap:6px; margin-bottom:16px; }
.mm-flow__step { flex:1; text-align:center; }
.mm-flow__ico { width:38px; height:38px; border-radius:10px; margin: 0 auto 6px; display:grid; place-items:center; background: rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.16); color:#fff; }
.mm-flow__t { color:#e2e8f0; font-size:0.72rem; font-weight:700; letter-spacing:-0.01em; }
.mm-flow__arrow { color: rgba(147,197,253,0.5); flex-shrink:0; margin-top: 14px; }

.mm-mini { display:grid; grid-template-columns: 1fr 1fr; gap:10px; }
.mm-mini__c { background: rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.12); border-radius:10px; padding: 10px 12px; text-align:center; }
.mm-mini__v { color:#ffffff; font-size:1.15rem; font-weight:900; letter-spacing:-0.02em; line-height:1; }
.mm-mini__v small { font-size:0.75rem; font-weight:800; color:#fde68a; margin-left:2px; }
.mm-mini__l { color:#94a3b8; font-size:0.68rem; font-weight:600; margin-top:4px; }

@media (max-width: 900px) {
  .mm-band { grid-template-columns: 1fr; gap: 28px; padding: 28px; }
  .mm-signals { grid-template-columns: 1fr; }
}
</style>
<section id="monitormart" class="ab-model">
  <div class="container">
    <div class="mm-band reveal">
      <div>
        <span class="mm-kicker">Powered by MonitorMart</span>
        <h2 class="mm-title">Retail-grade sourcing &mdash; <span class="grad">wired into a real IT partner.</span></h2>
        <p class="mm-desc">MonitorMart is operated by Nubevest and focuses on technology retail and sourcing. Where it fits, we combine procurement with configuration, deployment, installation and ongoing IT support &mdash; so a purchase order actually becomes a working setup.</p>

        <ul class="mm-signals">
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Retail sourcing at scale</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Configured before delivery</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>On-site installation</li>
          <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Ongoing IT support</li>
        </ul>

        <div class="mm-actions">
          <a href="#" class="mm-btn">
            Shop MonitorMart
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="/contact.php" class="mm-btn mm-btn--ghost">Talk to Nubevest</a>
        </div>
      </div>

      <div class="mm-card">
        <div class="mm-card__head">
          <div class="mm-card__brand">
            <div class="mm-card__logo"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="12" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M8 20h8M12 16v4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div>
              <div class="mm-card__brand-t">MonitorMart</div>
              <div class="mm-card__brand-s">Sourcing &amp; retail</div>
            </div>
          </div>
          <span class="mm-card__pill">Operated by Nubevest</span>
        </div>

        <div class="mm-flow">
          <div class="mm-flow__step">
            <div class="mm-flow__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 4h3l2 12h11l2-8H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="20" r="1.4" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="20" r="1.4" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <div class="mm-flow__t">Source</div>
          </div>
          <svg class="mm-flow__arrow" width="16" height="10" viewBox="0 0 16 10" fill="none"><path d="M1 5h11M9 1l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div class="mm-flow__step">
            <div class="mm-flow__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/><path d="M12 3v3M12 18v3M3 12h3M18 12h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div class="mm-flow__t">Configure</div>
          </div>
          <svg class="mm-flow__arrow" width="16" height="10" viewBox="0 0 16 10" fill="none"><path d="M1 5h11M9 1l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div class="mm-flow__step">
            <div class="mm-flow__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <div class="mm-flow__t">Install</div>
          </div>
          <svg class="mm-flow__arrow" width="16" height="10" viewBox="0 0 16 10" fill="none"><path d="M1 5h11M9 1l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <div class="mm-flow__step">
            <div class="mm-flow__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="currentColor" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <div class="mm-flow__t">Support</div>
          </div>
        </div>

        <div class="mm-mini">
          <div class="mm-mini__c"><div class="mm-mini__v">1<small>PO</small></div><div class="mm-mini__l">Sourced &amp; installed</div></div>
          <div class="mm-mini__c"><div class="mm-mini__v">1</div><div class="mm-mini__l">Point of contact</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<style>
.pys-body { max-width: 1080px; display:grid; grid-template-columns: 1.15fr 1fr; gap: 44px; align-items:center; text-align:left; }
.pys-body h2 { color:#ffffff; text-align:left; margin-bottom:16px; }
.pys-body > .pys-left > p { text-align:left; color: rgba(255,255,255,0.78); font-size:1.02rem; line-height:1.7; margin: 0 0 22px; }
.pys-body .au-cta__actions { justify-content:flex-start; margin-top:0; }

.pys-panel {
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.14);
  border-radius: 18px;
  padding: 22px;
  backdrop-filter: blur(8px);
}
.pys-panel__t { color:#ffffff; font-size:0.78rem; font-weight:800; letter-spacing:0.08em; text-transform:uppercase; margin-bottom:14px; display:flex; align-items:center; gap:8px; }
.pys-panel__t i { width:6px; height:6px; border-radius:50%; background:#34d399; box-shadow:0 0 0 3px rgba(52,211,153,0.25); }

.pys-checklist { list-style:none; padding:0; margin: 0 0 16px; display:grid; grid-template-columns: 1fr 1fr; gap:10px; }
.pys-checklist li { display:flex; align-items:center; gap:10px; padding:10px 12px; background: rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.12); border-radius:10px; color:#e2e8f0; font-size:0.82rem; font-weight:700; }
.pys-checklist svg { color:#60a5fa; flex-shrink:0; }

.pys-strip { display:flex; align-items:center; gap:12px; padding: 12px 14px; background: rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.12); border-radius:12px; color:#cbd5e1; font-size:0.82rem; }
.pys-strip__ico { width:30px; height:30px; border-radius:8px; background: rgba(52,211,153,0.16); color:#34d399; display:grid; place-items:center; flex-shrink:0; }
.pys-strip strong { color:#fff; font-weight:800; }

@media (max-width: 900px) {
  .pys-body { grid-template-columns: 1fr; gap: 28px; text-align:center; }
  .pys-body h2, .pys-body > .pys-left > p, .pys-body > .pys-left { text-align:center; }
  .pys-body .au-cta__actions { justify-content:center; }
}
@media (max-width: 520px) {
  .pys-checklist { grid-template-columns: 1fr; }
}
</style>
<section class="au-cta">
  <div class="container">
    <div class="au-cta__card reveal">
      <div class="au-cta__glow" aria-hidden="true"></div>
      <div class="au-cta__body pys-body">
        <div class="pys-left">
          <span class="kicker kicker--pill au-cta__kicker"><i></i>PLAN YOUR SETUP</span>
          <h2>A workplace setup <span class="au-grad">that works from day one.</span></h2>
          <p>Share the number of users, the space, the applications and what the team needs to do. We&rsquo;ll plan the right setup &mdash; sourced, configured and installed.</p>
          <div class="au-cta__actions">
            <a href="/contact.php" class="btn btn--primary">Plan Your Workplace Setup</a>
            <a href="#monitormart" class="btn btn--secondary btn--arrow-blue">Shop MonitorMart</a>
          </div>
        </div>

        <div class="pys-panel">
          <div class="pys-panel__t"><i></i>Tell us four things</div>
          <ul class="pys-checklist">
            <li>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="currentColor" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              Users
            </li>
            <li>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18" stroke="currentColor" stroke-width="1.8"/></svg>
              The space
            </li>
            <li>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="4" y="4" width="7" height="7" rx="1.4" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="4" width="7" height="7" rx="1.4" stroke="currentColor" stroke-width="1.8"/><rect x="4" y="13" width="7" height="7" rx="1.4" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="13" width="7" height="7" rx="1.4" stroke="currentColor" stroke-width="1.8"/></svg>
              Applications
            </li>
            <li>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-8 4 4 6-10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 6h6v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              What the team does
            </li>
          </ul>

          <div class="pys-strip">
            <div class="pys-strip__ico">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div><strong>Reply within 1 business day.</strong> Sourced, configured &amp; installed &mdash; one point of contact.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
