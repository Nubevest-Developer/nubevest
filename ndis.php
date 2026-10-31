<?php
$page = 'ndis';
$seo_title = 'NDIS Technology Solutions | Nubevest';
$meta_desc = 'Practical technology, CRM, automation and websites built for NDIS providers &mdash; participant-first, compliance-aware and operations-ready.';
include 'includes/header.php';
?>

<main id="main">

<!-- HERO -->
<section class="ab-hero">
  <div class="container ab-hero__container reveal">
    <div class="ab-hero__left">
      <span class="kicker kicker--pill ab-hero__kicker"><i></i>NDIS</span>
      <h1 class="ab-hero__title">Practical technology for <span class="hero__title-gradient">NDIS providers.</span></h1>
      <p class="ab-hero__lead">From participant intake to service delivery, rostering, compliance and reporting &mdash; we help NDIS providers use technology to simplify operations and improve participant experience.</p>
      <div class="ab-hero__cta">
        <a href="/contact.php" class="btn btn--primary">Talk to Our Team</a>
        <a href="#capabilities" class="btn btn--secondary btn--arrow-blue">Our NDIS Capabilities</a>
      </div>
    </div>
    <div class="ab-hero__right">
      <div class="nd-hero">
        <div class="nd-hero__panel">
          <div class="nd-hero__head">
            <div class="nd-hero__title-row">
              <span class="nd-hero__logo"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#2563eb" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
              <span class="nd-hero__title-text">Participant Dashboard</span>
            </div>
            <span class="nd-hero__badge">NDIS Ready</span>
          </div>
          <div class="nd-hero__stats">
            <div class="nd-hero__stat"><div class="nd-hero__stat-label">Active</div><div class="nd-hero__stat-value" style="color:#2563eb">128</div></div>
            <div class="nd-hero__stat"><div class="nd-hero__stat-label">Sessions this wk</div><div class="nd-hero__stat-value" style="color:#10b981">342</div></div>
            <div class="nd-hero__stat"><div class="nd-hero__stat-label">Compliance</div><div class="nd-hero__stat-value" style="color:#7c3aed">100%</div></div>
          </div>
          <div class="nd-hero__rows">
            <div class="nd-hero__row">
              <span class="nd-hero__avatar" style="background:#dbeafe;color:#2563eb">JR</span>
              <div><div class="nd-hero__row-title">Jamie R.</div><div class="nd-hero__row-sub">Core Supports · 12 hrs/wk</div></div>
              <span class="nd-hero__pill nd-hero__pill--green">On plan</span>
            </div>
            <div class="nd-hero__row">
              <span class="nd-hero__avatar" style="background:#ede9fe;color:#7c3aed">MK</span>
              <div><div class="nd-hero__row-title">Mia K.</div><div class="nd-hero__row-sub">Capacity Building · 6 hrs/wk</div></div>
              <span class="nd-hero__pill nd-hero__pill--blue">Review</span>
            </div>
            <div class="nd-hero__row">
              <span class="nd-hero__avatar" style="background:#fef3c7;color:#f59e0b">AS</span>
              <div><div class="nd-hero__row-title">Aarav S.</div><div class="nd-hero__row-sub">Capital Supports · New</div></div>
              <span class="nd-hero__pill nd-hero__pill--amber">Intake</span>
            </div>
          </div>
        </div>
        <div class="nd-hero__float">
          <span class="nd-hero__float-ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="#10b981" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          <div><div class="nd-hero__float-t">Plan submitted</div><div class="nd-hero__float-s">Portal &middot; 2m ago</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CAPABILITIES -->
<section id="capabilities" class="ab-model">
  <div class="container">
    <div class="ab-panel reveal">
      <div class="wnp-head">
        <span class="kicker kicker--pill"><i></i>What we do</span>
        <h2 class="ab-panel__title">What we help <span class="au-grad">NDIS providers do</span></h2>
        <p class="wnp-lead">Three core capabilities &mdash; wired around the participant, then into the operations that keep delivery sustainable.</p>
      </div>

      <style>
      .wnp-head { text-align:center; max-width: 720px; margin: 0 auto 32px; }
      .wnp-head .kicker { margin-bottom:14px; }
      .wnp-head .ab-panel__title { margin-bottom:12px; }
      .wnp-lead { color:#64748b; font-size:0.98rem; line-height:1.65; margin:0; }

      .wnp-grid {
        display:grid; grid-template-columns: repeat(3, 1fr); gap:18px;
      }
      .wnp-card {
        position:relative;
        background:#ffffff; border:1px solid #e2e8f0; border-radius:16px;
        padding: 24px 22px 22px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        overflow:hidden;
      }
      .wnp-card:hover { transform: translateY(-3px); box-shadow: 0 22px 44px -22px rgba(37,99,235,0.28); border-color:#dbeafe; }
      .wnp-card::before {
        content:''; position:absolute; top:0; left:20px; right:20px; height:3px; border-radius:0 0 3px 3px;
        background: var(--wnp-grad);
      }
      .wnp-card__head { display:flex; align-items:center; gap:12px; margin-bottom:12px; }
      .wnp-card__ico {
        width:44px; height:44px; border-radius:12px;
        display:grid; place-items:center; flex-shrink:0;
        background: var(--wnp-bg); color: var(--wnp-fg);
      }
      .wnp-card__num {
        margin-left:auto; font-size:0.72rem; font-weight:800; letter-spacing:0.08em;
        color:#94a3b8;
      }
      .wnp-card h3 { margin:0; color:#0f172a; font-size:1.08rem; font-weight:800; letter-spacing:-0.01em; }
      .wnp-card__desc { margin: 0 0 14px; color:#64748b; font-size:0.9rem; line-height:1.65; }
      .wnp-card__tags { display:flex; flex-wrap:wrap; gap:6px; }
      .wnp-card__tag {
        display:inline-flex; padding: 4px 10px; border-radius:999px;
        background:#f1f5f9; color:#334155;
        font-size:0.7rem; font-weight:700; letter-spacing:0.02em;
      }

      /* Full-width accent strip */
      .wnp-accent {
        margin-top: 18px;
        display:flex; align-items:center; gap:16px;
        padding: 20px 24px;
        background: linear-gradient(135deg, #eff6ff 0%, #ede9fe 100%);
        border: 1px solid #e0e7ff;
        border-radius: 16px;
        position:relative;
      }
      .wnp-accent__ico {
        width:48px; height:48px; border-radius:12px;
        background: linear-gradient(135deg,#2563eb,#7c3aed);
        display:grid; place-items:center; color:#fff; flex-shrink:0;
      }
      .wnp-accent p { margin:0; color:#334155; font-size:0.98rem; line-height:1.65; font-weight:500; }
      .wnp-accent p strong { color:#0f172a; font-weight:800; }

      @media (max-width: 900px) { .wnp-grid { grid-template-columns: 1fr; } .wnp-accent { flex-direction:column; text-align:center; } }
      @media (max-width: 520px) { .wnp-accent { padding: 18px; } }
      </style>

      <div class="wnp-grid">
        <div class="wnp-card" style="--wnp-grad:linear-gradient(90deg,#3b82f6,#6366f1); --wnp-bg:#dbeafe; --wnp-fg:#2563eb;">
          <div class="wnp-card__head">
            <div class="wnp-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="currentColor" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3>Participant CRM</h3>
            <span class="wnp-card__num">01</span>
          </div>
          <p class="wnp-card__desc">Central records, plan tracking, notes and communications &mdash; visible to the whole team, controlled by role.</p>
          <div class="wnp-card__tags">
            <span class="wnp-card__tag">Plan tracking</span>
            <span class="wnp-card__tag">Notes</span>
            <span class="wnp-card__tag">Role-based access</span>
          </div>
        </div>

        <div class="wnp-card" style="--wnp-grad:linear-gradient(90deg,#10b981,#059669); --wnp-bg:#d1fae5; --wnp-fg:#059669;">
          <div class="wnp-card__head">
            <div class="wnp-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3>Rostering &amp; scheduling</h3>
            <span class="wnp-card__num">02</span>
          </div>
          <p class="wnp-card__desc">Match participants to support workers by skill, availability and location &mdash; with reminders and shift confirmations.</p>
          <div class="wnp-card__tags">
            <span class="wnp-card__tag">Skill match</span>
            <span class="wnp-card__tag">Reminders</span>
            <span class="wnp-card__tag">Shift confirmations</span>
          </div>
        </div>

        <div class="wnp-card" style="--wnp-grad:linear-gradient(90deg,#7c3aed,#a855f7); --wnp-bg:#ede9fe; --wnp-fg:#7c3aed;">
          <div class="wnp-card__head">
            <div class="wnp-card__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3>Compliance &amp; audit</h3>
            <span class="wnp-card__num">03</span>
          </div>
          <p class="wnp-card__desc">Structured records, incident tracking and audit-ready exports aligned with NDIS Practice Standards.</p>
          <div class="wnp-card__tags">
            <span class="wnp-card__tag">Incident tracking</span>
            <span class="wnp-card__tag">Audit exports</span>
            <span class="wnp-card__tag">Practice Standards</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HOW WE WORK WITH NDIS PROVIDERS -->
<section class="ab-do">
  <div class="container">
    <div class="ab-panel reveal">
      <h2 class="ab-panel__title">How we work with NDIS providers</h2>
      <div class="ab-do__flow">
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--blue"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6" stroke="#2563eb" stroke-width="2"/><path d="M20 20l-4-4" stroke="#2563eb" stroke-width="2" stroke-linecap="round"/></svg></div>
          <div class="ab-do__title">Discover</div>
          <p>We map current tools, workflows and the outcomes participants and staff actually experience.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--green"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 4h16v12H8l-4 4V4z" stroke="#10b981" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <div class="ab-do__title">Design</div>
          <p>We propose a practical plan: what to change now, what to phase, what to leave alone.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--amber"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 21h18M6 21V10l6-6 6 6v11" stroke="#f59e0b" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <div class="ab-do__title">Implement</div>
          <p>Build, migrate and train &mdash; with the least possible disruption to service delivery.</p>
        </div>
        <div class="ab-do__arrow" aria-hidden="true"><svg width="80" height="16" viewBox="0 0 80 16" fill="none"><path d="M2 8h68" stroke="#c7d2fe" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/><path d="M64 3l6 5-6 5" stroke="#3b82f6" stroke-width="2" stroke-linejoin="round"/></svg></div>
        <div class="ab-do__step">
          <div class="ab-do__icon ab-do__icon--blue"><svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 14v-2a8 8 0 1 1 16 0v2" stroke="#2563eb" stroke-width="2"/><rect x="3" y="13" width="4" height="7" rx="1.5" stroke="#2563eb" stroke-width="2"/><rect x="17" y="13" width="4" height="7" rx="1.5" stroke="#2563eb" stroke-width="2"/></svg></div>
          <div class="ab-do__title">Support</div>
          <p>Ongoing service, improvements and updates as your organisation and the scheme evolve.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- OUTCOMES -->
<section class="ab-tri">
  <div class="container">
    <div class="ab-panel reveal">
      <h2 class="ab-panel__title">Outcomes NDIS providers care about</h2>
      <div class="nd-out">
        <div class="nd-out__item">
          <div class="nd-out__num" style="color:#2563eb">30%</div>
          <div class="nd-out__label">Less admin time per participant</div>
          <p>By replacing spreadsheet handoffs with one connected record.</p>
        </div>
        <div class="nd-out__item">
          <div class="nd-out__num" style="color:#10b981">100%</div>
          <div class="nd-out__label">Audit-ready notes</div>
          <p>Structured session notes and incident logs, exportable in a click.</p>
        </div>
        <div class="nd-out__item">
          <div class="nd-out__num" style="color:#f59e0b">2x</div>
          <div class="nd-out__label">Faster intake</div>
          <p>Digital participant intake with prefilled plan data and consent tracking.</p>
        </div>
        <div class="nd-out__item">
          <div class="nd-out__num" style="color:#7c3aed">24/7</div>
          <div class="nd-out__label">Family &amp; participant portal</div>
          <p>Simple visibility of upcoming supports, session summaries and updates.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="ab-cta">
  <div class="container">
    <div class="ab-cta__inner reveal">
      <div class="ab-cta__icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#7c3aed" stroke-width="1.8" stroke-linejoin="round"/></svg></div>
      <div class="ab-cta__text">
        <h3>Ready to make your NDIS operations simpler?</h3>
        <p>We&rsquo;ll help you understand the options and identify a sensible first step.</p>
      </div>
      <a href="/contact.php" class="ab-cta__btn">Talk to Our Team <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
