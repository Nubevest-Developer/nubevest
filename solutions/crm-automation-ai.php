<?php
$page = 'solutions';
$seo_title = 'CRM, Automation & AI Solutions | Nubevest';
$meta_desc = 'Connect leads, clients, tasks and workflows with CRM implementation, business automation and practical AI solutions from Nubevest.';
include __DIR__ . '/../includes/header.php';
?>

<style>
/* CRM, Automation & AI — page-specific accents */
.ca-crm {
  position:relative;
  background:#fff;
  border:1px solid #e2e8f0;
  border-radius:18px;
  padding:18px;
  box-shadow: 0 30px 60px -20px rgba(88,28,135,0.4), 0 0 0 6px #fff, 0 0 0 7px rgba(124,58,237,0.15);
  overflow:hidden;
}
.ca-crm__head { display:flex; align-items:center; gap:10px; margin-bottom:14px; }
.ca-crm__logo { width:30px; height:30px; border-radius:8px; background: linear-gradient(135deg,#7c3aed,#3b82f6); display:grid; place-items:center; color:#fff; }
.ca-crm__t { font-size:0.9rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.ca-crm__s { font-size:0.68rem; color:#64748b; font-weight:600; }
.ca-crm__badge { margin-left:auto; padding:4px 10px; background:#f0fdf4; color:#059669; border-radius:999px; font-size:0.62rem; font-weight:800; letter-spacing:0.05em; text-transform:uppercase; }

.ca-pipe { display:grid; grid-template-columns: repeat(3, 1fr); gap:8px; margin-bottom:12px; }
.ca-pipe__col { background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px; padding:10px 8px; }
.ca-pipe__h { display:flex; align-items:center; gap:6px; margin-bottom:8px; }
.ca-pipe__dot { width:8px; height:8px; border-radius:50%; }
.ca-pipe__l { font-size:0.62rem; font-weight:800; color:#0f172a; letter-spacing:0.05em; text-transform:uppercase; }
.ca-pipe__n { margin-left:auto; font-size:0.62rem; color:#64748b; font-weight:700; }
.ca-pipe__card { background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:8px; margin-bottom:6px; box-shadow: 0 2px 6px -3px rgba(15,23,42,0.1); }
.ca-pipe__card:last-child { margin-bottom:0; }
.ca-pipe__ct { font-size:0.7rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.ca-pipe__cs { font-size:0.6rem; color:#64748b; font-weight:600; margin-top:2px; }
.ca-pipe__cta { display:flex; align-items:center; gap:4px; margin-top:6px; font-size:0.58rem; color:#7c3aed; font-weight:800; }

/* Automation flow */
.ca-auto { background: linear-gradient(135deg,#f5f3ff, #eff6ff); border:1px solid #e0e7ff; border-radius:10px; padding:10px 12px; margin-bottom:10px; }
.ca-auto__t { font-size:0.72rem; font-weight:800; color:#4c1d95; letter-spacing:-0.01em; margin-bottom:6px; display:flex; align-items:center; gap:6px; }
.ca-auto__nodes { display:flex; align-items:center; gap:4px; overflow:hidden; }
.ca-auto__node { flex-shrink:0; padding:4px 8px; background:#fff; border:1px solid #ddd6fe; border-radius:6px; font-size:0.6rem; font-weight:700; color:#4c1d95; display:inline-flex; align-items:center; gap:4px; }
.ca-auto__arrow { color:#8b5cf6; }

/* AI hint */
.ca-ai { background: linear-gradient(135deg,#ecfdf5, #ecfeff); border:1px solid #a7f3d0; border-radius:10px; padding:10px 12px; display:flex; align-items:center; gap:10px; }
.ca-ai__ico { width:30px; height:30px; border-radius:8px; background: linear-gradient(135deg,#10b981,#06b6d4); color:#fff; display:grid; place-items:center; flex-shrink:0; }
.ca-ai__t { font-size:0.75rem; font-weight:800; color:#065f46; letter-spacing:-0.01em; }
.ca-ai__s { font-size:0.62rem; color:#047857; font-weight:600; }

/* Floating badges */
.ca-float {
  position:absolute; z-index:3;
  background:#fff; border:1px solid #eef1f5; border-radius:12px;
  padding:8px 12px 8px 10px;
  display:flex; align-items:center; gap:10px;
  box-shadow: 0 18px 36px -12px rgba(15,23,42,0.22);
}
.ca-float--top { top:-14px; right:14px; }
.ca-float--bot { bottom:-16px; left:-14px; }
.ca-float__ico { width:30px; height:30px; border-radius:8px; display:grid; place-items:center; color:#fff; }
.ca-float__t { font-size:0.78rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; }
.ca-float__s { font-size:0.65rem; color:#64748b; font-weight:600; }

/* Signs cards (red-tinted friction cards) */
.ca-signs { display:grid; grid-template-columns: repeat(3, 1fr); gap:14px; }
@media (max-width: 840px){ .ca-signs { grid-template-columns: 1fr; } }
.ca-sign {
  background:#fff; border:1px solid #fee2e2; border-radius:14px;
  padding:16px; display:flex; gap:12px; align-items:flex-start;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}
.ca-sign:hover { transform: translateY(-3px); box-shadow: 0 14px 28px -12px rgba(239,68,68,0.2); border-color:#fecaca; }
.ca-sign__ico { flex-shrink:0; width:34px; height:34px; border-radius:10px; background:#fef2f2; color:#dc2626; display:grid; place-items:center; }
.ca-sign__t { font-size:0.9rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; line-height:1.4; }

/* Metric strip */
.ca-metric {
  margin-top:32px; padding:26px;
  background: linear-gradient(135deg,#0f172a,#1e293b);
  border-radius:20px; color:#fff;
  display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;
  position:relative; overflow:hidden;
}
.ca-metric::before{ content:''; position:absolute; top:-40%; right:-10%; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(16,185,129,0.3), transparent 60%); }
.ca-metric__item { position:relative; }
.ca-metric__n { font-size:1.8rem; font-weight:800; letter-spacing:-0.02em; background:linear-gradient(90deg,#34d399,#a78bfa); -webkit-background-clip:text; background-clip:text; color:transparent; }
.ca-metric__l { font-size:0.85rem; color:#cbd5e1; font-weight:600; margin-top:4px; }
@media (max-width: 780px){ .ca-metric { grid-template-columns: repeat(2, 1fr); } }
</style>

<main id="main">

<!-- HERO -->
<section class="ab-hero">
  <div class="container ab-hero__container reveal">
    <div class="ab-hero__left">
      <span class="kicker kicker--pill ab-hero__kicker"><i></i>CRM, AUTOMATION &amp; AI &middot; A NUBEVEST SOLUTION</span>
      <h1 class="ab-hero__title">Connect the work that happens <span class="hero__title-gradient">between enquiry and delivery.</span></h1>
      <p class="ab-hero__lead">Bring information, tasks, communication and follow-up into the right system &mdash; so leads don&rsquo;t slip, teams stop re-entering the same data, and the pipeline actually reflects reality.</p>
      <div class="ab-hero__cta">
        <a href="/contact.php" class="btn btn--primary">Book a CRM &amp; Automation Review</a>
        <a href="/brands/gometa-crm.php" class="btn btn--secondary btn--arrow-blue">Explore GoMeta CRM</a>
      </div>
    </div>

    <div class="ab-hero__right">
      <div class="ca-crm">
        <div class="ca-crm__head">
          <div class="ca-crm__logo"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 20l17-8L4 4v6l12 2-12 2v6z" fill="#fff"/></svg></div>
          <div>
            <div class="ca-crm__t">Sales pipeline</div>
            <div class="ca-crm__s">Q3 &middot; live sync</div>
          </div>
          <span class="ca-crm__badge">Synced</span>
        </div>

        <div class="ca-pipe">
          <div class="ca-pipe__col">
            <div class="ca-pipe__h"><span class="ca-pipe__dot" style="background:#3b82f6"></span><span class="ca-pipe__l">New</span><span class="ca-pipe__n">4</span></div>
            <div class="ca-pipe__card">
              <div class="ca-pipe__ct">Emma R.</div>
              <div class="ca-pipe__cs">Website enquiry</div>
              <div class="ca-pipe__cta"><svg width="9" height="9" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="2"/></svg> Contact</div>
            </div>
            <div class="ca-pipe__card">
              <div class="ca-pipe__ct">Daniel P.</div>
              <div class="ca-pipe__cs">Referral</div>
              <div class="ca-pipe__cta"><svg width="9" height="9" viewBox="0 0 24 24" fill="none"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2"/></svg> Call</div>
            </div>
          </div>
          <div class="ca-pipe__col">
            <div class="ca-pipe__h"><span class="ca-pipe__dot" style="background:#f59e0b"></span><span class="ca-pipe__l">Qualify</span><span class="ca-pipe__n">3</span></div>
            <div class="ca-pipe__card">
              <div class="ca-pipe__ct">Aarav S.</div>
              <div class="ca-pipe__cs">Demo booked</div>
              <div class="ca-pipe__cta" style="color:#f59e0b"><svg width="9" height="9" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/><path d="M3 9h18" stroke="currentColor" stroke-width="2"/></svg> Fri 2pm</div>
            </div>
            <div class="ca-pipe__card">
              <div class="ca-pipe__ct">Mia K.</div>
              <div class="ca-pipe__cs">Follow-up due</div>
            </div>
          </div>
          <div class="ca-pipe__col">
            <div class="ca-pipe__h"><span class="ca-pipe__dot" style="background:#10b981"></span><span class="ca-pipe__l">Won</span><span class="ca-pipe__n">2</span></div>
            <div class="ca-pipe__card" style="border-color:#a7f3d0; background: linear-gradient(180deg,#ecfdf5,#fff);">
              <div class="ca-pipe__ct" style="color:#065f46">Sarah R.</div>
              <div class="ca-pipe__cs">$18,400</div>
              <div class="ca-pipe__cta" style="color:#10b981"><svg width="9" height="9" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg> Closed</div>
            </div>
          </div>
        </div>

        <div class="ca-auto">
          <div class="ca-auto__t"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M13 3L4 14h7l-1 7 9-11h-7l1-7z" fill="#7c3aed"/></svg> Automation running</div>
          <div class="ca-auto__nodes">
            <span class="ca-auto__node">Form</span>
            <svg class="ca-auto__arrow" width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="ca-auto__node">CRM</span>
            <svg class="ca-auto__arrow" width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="ca-auto__node">Email</span>
            <svg class="ca-auto__arrow" width="10" height="10" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="ca-auto__node">Task</span>
          </div>
        </div>

        <div class="ca-ai">
          <div class="ca-ai__ico"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/></svg></div>
          <div>
            <div class="ca-ai__t">AI drafted 3 follow-up emails</div>
            <div class="ca-ai__s">Reviewed by owner before send</div>
          </div>
        </div>
      </div>

      <div class="ca-float ca-float--top">
        <div class="ca-float__ico" style="background:linear-gradient(135deg,#3b82f6,#7c3aed)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 4h16v6H4zM4 14h16v6H4z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="8" cy="7" r="1" fill="currentColor"/><circle cx="8" cy="17" r="1" fill="currentColor"/></svg></div>
        <div><div class="ca-float__t">1 pipeline &middot; 12 stages</div><div class="ca-float__s">Every step visible</div></div>
      </div>

      <div class="ca-float ca-float--bot">
        <div class="ca-float__ico" style="background:linear-gradient(135deg,#10b981,#059669)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-8 4 4 6-10" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <div><div class="ca-float__t">+42% follow-ups sent</div><div class="ca-float__s">Automation replaced admin</div></div>
      </div>
    </div>
  </div>
</section>

<!-- SIGNS -->
<section class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill" style="background:#fef2f2; border-color:#fecaca; color:#dc2626;"><i style="background:#dc2626;"></i>SOUND FAMILIAR?</span>
      <h2 class="au-h2">Signs the current process <span class="au-grad">needs attention.</span></h2>
      <p>If more than one of these applies, technology can genuinely help &mdash; not by adding a tool, but by removing friction.</p>
    </div>

    <div class="ca-signs reveal stagger">
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Enquiries spread across inboxes, spreadsheets and personal notes</div></div>
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Follow-up depends on one person remembering the next step</div></div>
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Teams enter the same information more than once</div></div>
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Client history is difficult to see in one place</div></div>
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Tasks, documents and communication are disconnected</div></div>
      <div class="ca-sign"><span class="ca-sign__ico"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span><div class="ca-sign__t">Reporting requires manual collection or is not trusted</div></div>
    </div>
  </div>
</section>

<!-- CAPABILITIES -->
<section class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>CAPABILITIES</span>
      <h2 class="au-h2">What we help you connect. <span class="au-grad">End to end.</span></h2>
      <p>From requirements to adoption &mdash; delivered as one engagement, not a stack of separate tools you have to wire together.</p>
    </div>

    <div class="solutions-grid reveal stagger">

      <a href="#" class="sol-card sol-card--blue">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M7 20h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M7 9h4M7 13h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">CRM design &amp; mapping</h3>
            <p class="sol-card__desc">Requirements, workflow mapping and pipeline design &mdash; before the platform is picked.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="8" y="14" width="114" height="74" rx="8" fill="#eff6ff" stroke="#bfdbfe"/><rect x="18" y="24" width="30" height="56" rx="4" fill="#dbeafe"/><rect x="54" y="24" width="30" height="56" rx="4" fill="#dbeafe"/><rect x="90" y="24" width="26" height="56" rx="4" fill="#dbeafe"/><rect x="22" y="30" width="22" height="14" rx="2" fill="#2563eb"/><rect x="22" y="48" width="22" height="14" rx="2" fill="#93c5fd"/><rect x="58" y="30" width="22" height="14" rx="2" fill="#2563eb"/><rect x="58" y="48" width="22" height="14" rx="2" fill="#2563eb"/><rect x="94" y="30" width="18" height="14" rx="2" fill="#2563eb"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--purple">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M13 3L4 14h7l-1 7 9-11h-7l1-7z" fill="currentColor"/></svg></div>
            <h3 class="sol-card__title">Automation &amp; workflows</h3>
            <p class="sol-card__desc">Tasks, reminders, approvals and notifications that keep momentum without micro-management.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="8" y="14" width="114" height="74" rx="8" fill="#f5f3ff" stroke="#ddd6fe"/><rect x="18" y="34" width="24" height="16" rx="4" fill="#8b5cf6"/><rect x="52" y="34" width="24" height="16" rx="4" fill="#a78bfa"/><rect x="86" y="34" width="26" height="16" rx="4" fill="#8b5cf6"/><path d="M42 42h10M76 42h10" stroke="#7c3aed" stroke-width="2" stroke-dasharray="3 3"/><rect x="18" y="60" width="94" height="16" rx="4" fill="#ede9fe" stroke="#c4b5fd"/><path d="M40 68h5M55 68h5M70 68h5M85 68h5" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--green">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/></svg></div>
            <h3 class="sol-card__title">Practical AI</h3>
            <p class="sol-card__desc">Summaries, drafts, classification and search &mdash; where they save real time, with human review.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="8" y="14" width="114" height="74" rx="8" fill="#ecfdf5" stroke="#a7f3d0"/><circle cx="35" cy="46" r="14" fill="#10b981"/><path d="M28 46l6 6 12-12" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/><rect x="60" y="30" width="52" height="6" rx="3" fill="#6ee7b7"/><rect x="60" y="42" width="42" height="4" rx="2" fill="#a7f3d0"/><rect x="60" y="52" width="46" height="4" rx="2" fill="#a7f3d0"/><rect x="60" y="66" width="30" height="10" rx="3" fill="#059669"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--amber">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 7l9 6 9-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="sol-card__title">Comms &amp; email</h3>
            <p class="sol-card__desc">Templates, sequences, triggers and reminders &mdash; consistent, trackable, on-brand.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="60" height="46" rx="4" fill="#fffbeb" stroke="#fde68a"/><rect x="14" y="20" width="52" height="4" rx="2" fill="#f59e0b"/><rect x="14" y="28" width="42" height="3" rx="1.5" fill="#fde68a"/><rect x="14" y="34" width="46" height="3" rx="1.5" fill="#fde68a"/><rect x="14" y="40" width="34" height="3" rx="1.5" fill="#fde68a"/><rect x="14" y="48" width="20" height="8" rx="3" fill="#f59e0b"/><rect x="30" y="40" width="60" height="46" rx="4" fill="#fef3c7" stroke="#fde68a"/><rect x="34" y="46" width="52" height="4" rx="2" fill="#d97706"/><rect x="34" y="54" width="42" height="3" rx="1.5" fill="#fde68a"/><rect x="34" y="60" width="46" height="3" rx="1.5" fill="#fde68a"/><rect x="34" y="66" width="34" height="3" rx="1.5" fill="#fde68a"/><rect x="34" y="74" width="20" height="8" rx="3" fill="#f59e0b"/><rect x="50" y="30" width="66" height="56" rx="4" fill="#fffbeb" stroke="#fde68a"/><rect x="54" y="36" width="58" height="4" rx="2" fill="#f59e0b"/><rect x="54" y="44" width="48" height="3" rx="1.5" fill="#fde68a"/><rect x="54" y="50" width="52" height="3" rx="1.5" fill="#fde68a"/><rect x="54" y="56" width="40" height="3" rx="1.5" fill="#fde68a"/><rect x="54" y="66" width="24" height="10" rx="3" fill="#f59e0b"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--pink">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 16v-4M12 16v-7M16 16v-2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
            <h3 class="sol-card__title">Dashboards &amp; reporting</h3>
            <p class="sol-card__desc">Pipeline health, team activity and outcomes &mdash; without exporting to a spreadsheet first.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="14" width="110" height="74" rx="8" fill="#fdf2f8" stroke="#fbcfe8"/><rect x="20" y="26" width="18" height="46" rx="2" fill="#fbcfe8"/><rect x="42" y="34" width="18" height="38" rx="2" fill="#ec4899"/><rect x="64" y="42" width="18" height="30" rx="2" fill="#fbcfe8"/><rect x="86" y="30" width="18" height="42" rx="2" fill="#ec4899"/><path d="M20 78h84" stroke="#fbcfe8" stroke-width="1.6"/></svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--cyan">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M4 6l8 6 8-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <h3 class="sol-card__title">Data &amp; migration</h3>
            <p class="sol-card__desc">Prepare, clean, migrate and validate the records that the new system depends on.</p>
            <span class="sol-card__link">Included <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none"><rect x="10" y="20" width="38" height="60" rx="6" fill="#ecfeff" stroke="#a5f3fc"/><rect x="16" y="28" width="26" height="4" rx="2" fill="#06b6d4"/><rect x="16" y="38" width="20" height="3" rx="1.5" fill="#a5f3fc"/><rect x="16" y="46" width="24" height="3" rx="1.5" fill="#a5f3fc"/><rect x="16" y="54" width="18" height="3" rx="1.5" fill="#a5f3fc"/><rect x="16" y="66" width="26" height="6" rx="3" fill="#06b6d4"/><path d="M52 50h20M68 46l4 4-4 4" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="80" y="20" width="38" height="60" rx="6" fill="#ecfeff" stroke="#a5f3fc"/><circle cx="99" cy="42" r="10" fill="#06b6d4"/><path d="M95 42l3 3 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><rect x="86" y="58" width="26" height="4" rx="2" fill="#a5f3fc"/><rect x="86" y="66" width="22" height="4" rx="2" fill="#a5f3fc"/></svg>
          </div>
        </div>
      </a>

    </div>

    <div class="ca-metric reveal">
      <div class="ca-metric__item"><div class="ca-metric__n">1 place</div><div class="ca-metric__l">Every lead &amp; client</div></div>
      <div class="ca-metric__item"><div class="ca-metric__n">0 re-entry</div><div class="ca-metric__l">Systems talk to each other</div></div>
      <div class="ca-metric__item"><div class="ca-metric__n">100%</div><div class="ca-metric__l">Follow-up coverage</div></div>
      <div class="ca-metric__item"><div class="ca-metric__n">Live</div><div class="ca-metric__l">Pipeline &amp; team reporting</div></div>
    </div>
  </div>
</section>

<!-- THREE WAYS TO IMPLEMENT -->
<section class="au-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>THREE WAYS TO IMPLEMENT</span>
      <h2 class="au-h2">Pick the path <span class="au-grad">that fits where you are.</span></h2>
    </div>

    <div class="au-model__grid reveal">
      <div class="au-model__card">
        <div class="au-model__num">01</div>
        <div class="au-model__icon-wrap"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="#2563eb" stroke-width="1.8"/></svg></div>
        <h3>Improve an existing CRM</h3>
        <p>Simplify the structure, repair workflows, connect missing steps and help the team use the platform more consistently.</p>
        <ul class="au-model__list"><li>Health check &amp; audit</li><li>Clean-up &amp; refactor</li><li>Adoption support</li><li>Minimal disruption</li></ul>
      </div>

      <div class="au-model__card au-model__card--featured">
        <div class="au-model__num">02</div>
        <div class="au-model__icon-wrap au-model__icon-wrap--purple"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="18" cy="6" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="6" cy="18" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="18" cy="18" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><path d="M8.4 6H15.6M6 8.4v7.2M18 8.4v7.2M8.4 18H15.6" stroke="#7c3aed" stroke-width="1.8" stroke-linecap="round"/></svg></div>
        <h3>Implement Go Meta</h3>
        <p>Use Nubevest&rsquo;s CRM and workflow platform as the foundation for leads, clients, tasks, communication and configured automation.</p>
        <ul class="au-model__list"><li>Pre-built for AU business</li><li>Configured &amp; extended</li><li>Owned &amp; supported by us</li><li>Grows with you</li></ul>
        <span class="au-model__ribbon">Flagship</span>
      </div>

      <div class="au-model__card">
        <div class="au-model__num">03</div>
        <div class="au-model__icon-wrap au-model__icon-wrap--green"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M8 3H5a2 2 0 0 0-2 2v3M16 3h3a2 2 0 0 1 2 2v3M8 21H5a2 2 0 0 1-2-2v-3M16 21h3a2 2 0 0 0 2-2v-3" stroke="#10b981" stroke-width="1.8" stroke-linecap="round"/><rect x="7" y="7" width="10" height="10" rx="2" stroke="#10b981" stroke-width="1.8"/></svg></div>
        <h3>Build a custom workflow</h3>
        <p>Create a tailored system or integration where standard platforms can&rsquo;t support an important process effectively.</p>
        <ul class="au-model__list"><li>Fits your reality</li><li>You own the design</li><li>Integrates with the rest</li><li>Room to evolve</li></ul>
      </div>
    </div>
  </div>
</section>

<!-- PRACTICAL AI -->
<section class="pai">
  <div class="container">
    <div class="pai__wrap">
      <!-- LEFT: text -->
      <div class="pai__text">
        <span class="kicker kicker--pill"><i></i>PRACTICAL AI</span>
        <h2 class="pai__title">AI with a clear job &mdash; <span class="pai__grad">and a human still in charge.</span></h2>
        <p class="pai__lead">AI can summarise, draft, classify or help find information faster. We apply it only where it serves a real purpose &mdash; with scoped access, review steps and human accountability wired in from day one.</p>

        <div class="pai__principles">
          <div class="pai__principle">
            <span class="pai__principle-ico" style="background:rgba(124,58,237,0.10);color:#7c3aed">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/></svg>
            </span>
            <div>
              <strong>AI does the busywork</strong>
              <span>Summaries, drafts, classifications, look-ups.</span>
            </div>
          </div>
          <div class="pai__principle">
            <span class="pai__principle-ico" style="background:rgba(59,130,246,0.10);color:#2563eb">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.8"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </span>
            <div>
              <strong>You make the calls</strong>
              <span>Every AI output goes to a person before it takes effect.</span>
            </div>
          </div>
          <div class="pai__principle">
            <span class="pai__principle-ico" style="background:rgba(16,185,129,0.12);color:#059669">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <div>
              <strong>Everything is logged</strong>
              <span>Full audit trail. Scoped access. Kill switch on every workflow.</span>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: AI assistant mockup -->
      <div class="pai__mock" aria-hidden="true">
        <div class="pai__mock-glow"></div>
        <div class="pai__mock-card">
          <div class="pai__mock-head">
            <div class="pai__mock-avatar">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="#fff" stroke-width="1.8"/></svg>
            </div>
            <div class="pai__mock-title">
              <strong>AI assistant</strong>
              <span><span class="pai__mock-dot"></span>Draft ready · needs review</span>
            </div>
            <span class="pai__mock-badge">01:32</span>
          </div>

          <div class="pai__mock-body">
            <div class="pai__mock-context">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 6h16M4 12h16M4 18h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
              Summarised from 4 emails &amp; 1 support ticket
            </div>

            <div class="pai__mock-message">
              <p>Hi Priya,</p>
              <p>Thanks for flagging the delayed shipment on order <strong>#4821</strong>. I&rsquo;ve confirmed it&rsquo;s currently at the Dandenong depot and expected to arrive <strong>Thursday</strong>. Sending a $20 credit to your account as an apology.</p>
              <p>Anything else I can help with?</p>
            </div>

            <div class="pai__mock-meta">
              <span class="pai__mock-tag pai__mock-tag--blue">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Facts pulled from your CRM
              </span>
              <span class="pai__mock-tag pai__mock-tag--green">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                Scoped to this customer only
              </span>
            </div>
          </div>

          <div class="pai__mock-actions">
            <button class="pai__mock-btn pai__mock-btn--primary">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              Approve &amp; send
            </button>
            <button class="pai__mock-btn pai__mock-btn--ghost">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 20h4l10-10-4-4L4 16v4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
              Edit
            </button>
            <button class="pai__mock-btn pai__mock-btn--danger">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
              Discard
            </button>
          </div>

          <div class="pai__mock-foot">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
            Logged to audit trail · reviewer: <strong>sarah@yourbrand.com.au</strong>
          </div>
        </div>

        <div class="pai__mock-float pai__mock-float--top">
          <span class="pai__mock-float-dot"></span>
          Waiting on you
        </div>
        <div class="pai__mock-float pai__mock-float--bot">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          Zero data leaves scope
        </div>
      </div>
    </div>

  </div>
</section>

<!-- IMPLEMENTATION PROCESS -->
<section class="imp">
  <div class="container">
    <div class="imp__head">
      <span class="kicker kicker--pill"><i></i>IMPLEMENTATION</span>
      <h2 class="imp__title">A six-step path from <span class="imp__grad">friction to flow.</span></h2>
      <p class="imp__lead">Each project follows the same structured process &mdash; so the workflow is designed properly before we start changing tools, and improved after real teams start using it.</p>
    </div>

    <div class="imp__rail" aria-hidden="true"></div>

    <div class="imp__flow">
      <article class="imp__step" style="--tone:#3b82f6;--tone-bg:rgba(59,130,246,0.10)">
        <span class="imp__step-num">01</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="1.8"/><path d="M20 20l-4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Map</h3>
        <p>The current workflow and the highest-value friction points.</p>
      </article>

      <article class="imp__step" style="--tone:#10b981;--tone-bg:rgba(16,185,129,0.10)">
        <span class="imp__step-num">02</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18M9 4v16" stroke="currentColor" stroke-width="1.8"/></svg>
        </div>
        <h3>Define</h3>
        <p>The future workflow, roles, data model and decision points.</p>
      </article>

      <article class="imp__step" style="--tone:#f59e0b;--tone-bg:rgba(245,158,11,0.10)">
        <span class="imp__step-num">03</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M5.6 18.4l2.1-2.1M16.3 7.7l2.1-2.1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/></svg>
        </div>
        <h3>Configure</h3>
        <p>Platform and integrations selected, configured, connected.</p>
      </article>

      <article class="imp__step" style="--tone:#6366f1;--tone-bg:rgba(99,102,241,0.10)">
        <span class="imp__step-num">04</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M4 6l8 6 8-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Prepare</h3>
        <p>Prepare data, test the workflow end-to-end, resolve exceptions.</p>
      </article>

      <article class="imp__step" style="--tone:#22c55e;--tone-bg:rgba(34,197,94,0.10)">
        <span class="imp__step-num">05</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Launch</h3>
        <p>Train users, go live, and actively support real-world adoption.</p>
      </article>

      <article class="imp__step" style="--tone:#ec4899;--tone-bg:rgba(236,72,153,0.10)">
        <span class="imp__step-num">06</span>
        <div class="imp__step-ico">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-6 4 3 6-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 8h6v6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>Improve</h3>
        <p>Review usage and improve the workflow every quarter.</p>
      </article>
    </div>

    <div class="imp__foot">
      <div class="imp__foot-item">
        <span class="imp__foot-num">2&ndash;4</span>
        <span class="imp__foot-lbl">Weeks per stage</span>
      </div>
      <div class="imp__foot-item">
        <span class="imp__foot-num">1</span>
        <span class="imp__foot-lbl">Weekly review call</span>
      </div>
      <div class="imp__foot-item">
        <span class="imp__foot-num">100%</span>
        <span class="imp__foot-lbl">Documented handover</span>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="nxt">
  <div class="container">
    <div class="nxt__card">
      <div class="nxt__bg" aria-hidden="true">
        <div class="nxt__orb nxt__orb--a"></div>
        <div class="nxt__orb nxt__orb--b"></div>
      </div>

      <div class="nxt__left">
        <span class="nxt__kicker">
          <span class="nxt__kicker-dot"></span>
          NEXT STEP
        </span>
        <h2 class="nxt__title">
          Replace disconnected follow-up with <span class="nxt__grad">a clearer operating workflow.</span>
        </h2>
        <p class="nxt__lead">
          Show us how leads, clients and tasks move through your business today. In one working session we&rsquo;ll identify what should be simplified, connected or automated first &mdash; and what to leave alone.
        </p>

        <div class="nxt__actions">
          <a href="/contact.php" class="nxt__btn nxt__btn--primary">
            Book a CRM &amp; Automation review
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="/brands/gometa-crm.php" class="nxt__btn nxt__btn--ghost">Explore GoMeta CRM</a>
        </div>

        <div class="nxt__trust">
          <div class="nxt__trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            45-minute working session
          </div>
          <div class="nxt__trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Actionable summary in 48 hrs
          </div>
          <div class="nxt__trust-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            No lock-in, no pitch deck
          </div>
        </div>
      </div>

      <div class="nxt__right" aria-hidden="true">
        <div class="nxt__wf">
          <span class="nxt__wf-label">Before / After</span>

          <div class="nxt__wf-row nxt__wf-row--before">
            <span class="nxt__wf-tag">Today</span>
            <div class="nxt__wf-tools">
              <span class="nxt__wf-tool">Sheets</span>
              <span class="nxt__wf-tool nxt__wf-tool--broken">Email</span>
              <span class="nxt__wf-tool">Notes</span>
              <span class="nxt__wf-tool nxt__wf-tool--broken">WhatsApp</span>
            </div>
            <span class="nxt__wf-status nxt__wf-status--bad">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>
              Leads slip through
            </span>
          </div>

          <div class="nxt__wf-arrow">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 4v14M6 12l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>

          <div class="nxt__wf-row nxt__wf-row--after">
            <span class="nxt__wf-tag nxt__wf-tag--good">With Nubevest</span>
            <div class="nxt__wf-tools nxt__wf-tools--after">
              <span class="nxt__wf-tool nxt__wf-tool--connected">CRM</span>
              <span class="nxt__wf-tool nxt__wf-tool--connected">Automations</span>
              <span class="nxt__wf-tool nxt__wf-tool--connected">Notifications</span>
            </div>
            <span class="nxt__wf-status nxt__wf-status--good">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
              Every lead followed up
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
