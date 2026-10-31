<?php
$page = 'products';
$seo_title = 'Platforms & Nubevest Businesses | Nubevest';
$meta_desc = 'Nubevest platforms and specialist Nubevest businesses — including Plannor, GoMeta CRM, MetaMeet, Monitormart, Skill to Upskill, Workers Australia, Kangar Dubai Experts and NubeR.';
include 'includes/header.php';
?>

<main id="main">

<!-- HERO -->
<section class="ne-hero">
  <div class="ne-hero__bg" aria-hidden="true">
    <div class="ne-hero__grid"></div>
    <div class="ne-hero__orb ne-hero__orb--1"></div>
    <div class="ne-hero__orb ne-hero__orb--2"></div>
    <div class="ne-hero__orb ne-hero__orb--3"></div>
  </div>

  <div class="container ne-hero__container reveal">
    <div class="ne-hero__left">
      <span class="ne-kicker">
        <span class="ne-kicker__ico">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M3 7l9-4 9 4-9 4-9-4zM3 12l9 4 9-4M3 17l9 4 9-4" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
        </span>
        <span class="ne-kicker__t"><b>THE NUBEVEST</b> <em>&middot;</em> <span class="ne-kicker__grad">ECOSYSTEM</span></span>
      </span>

      <h1 class="ne-hero__title">
        We don&rsquo;t only advise businesses.
        <span class="ne-hero__grad">We build and operate them.</span>
      </h1>

      <p class="ne-hero__lead">Nubevest develops technology platforms and supports specialist ventures &mdash; creating direct experience of the customer, operational and technology challenges <strong>businesses face every day</strong>.</p>

      <div class="ne-hero__cta">
        <a href="#platforms" class="ne-btn ne-btn--primary">
          Explore the Ecosystem
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <a href="/contact" class="ne-btn ne-btn--ghost">Discuss a Partnership</a>
      </div>

      <!-- Category strip -->
      <div class="ne-hero__cats">
        <div class="ne-cat" style="--nec1:#3b82f6;--nec2:#6366f1;">
          <span class="ne-cat__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4M7 14h4M7 17h6" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
          <div>
            <div class="ne-cat__t">Technology platforms</div>
            <div class="ne-cat__s">Systems we build</div>
          </div>
        </div>
        <div class="ne-cat" style="--nec1:#10b981;--nec2:#34d399;">
          <span class="ne-cat__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="18" height="12" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 8l9 6 9-6" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <div>
            <div class="ne-cat__t">Technology commerce</div>
            <div class="ne-cat__s">Digital foundations</div>
          </div>
        </div>
        <div class="ne-cat" style="--nec1:#f59e0b;--nec2:#fbbf24;">
          <span class="ne-cat__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="#fff" stroke-width="1.8"/><circle cx="16.5" cy="9" r="2.4" stroke="#fff" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
          <div>
            <div class="ne-cat__t">Specialist ventures</div>
            <div class="ne-cat__s">Focused delivery</div>
          </div>
        </div>
        <div class="ne-cat ne-cat--dev" style="--nec1:#8b5cf6;--nec2:#ec4899;">
          <span class="ne-cat__ico">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.8"/><path d="M12 7v5l3 2" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
          </span>
          <div>
            <div class="ne-cat__t">Initiatives in development</div>
            <div class="ne-cat__s">What&rsquo;s next</div>
          </div>
          <span class="ne-cat__badge">
            <span class="ne-cat__badge-dot"></span>
            NEW
          </span>
        </div>
      </div>
    </div>

    <div class="ne-hero__right">
      <style>
        .ne-hero__right { display:flex; align-items:center; justify-content:center; }
        .ne-stack {
          width: 100%;
          max-width: 420px;
          position: relative;
        }
        .ne-stack::before {
          content: "";
          position: absolute;
          inset: -30px -20px;
          background:
            radial-gradient(circle at 20% 20%, rgba(236,72,153,0.10), transparent 55%),
            radial-gradient(circle at 80% 80%, rgba(16,185,129,0.10), transparent 55%);
          filter: blur(30px);
          z-index: -1;
        }
        .ne-stack__header {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 16px;
        }
        .ne-stack__badge {
          display: inline-flex;
          align-items: center;
          gap: 8px;
          padding: 8px 14px;
          background: #ffffff;
          border: 1px solid #eef2f7;
          border-radius: 999px;
          font-size: 0.75rem;
          font-weight: 800;
          letter-spacing: 0.06em;
          text-transform: uppercase;
          color: #7c3aed;
          box-shadow: 0 8px 20px -12px rgba(15,23,42,0.15);
        }
        .ne-stack__hint {
          font-size: 0.72rem;
          font-weight: 700;
          color: #64748b;
          letter-spacing: 0.04em;
        }
        .ne-stack__cards {
          display: flex;
          flex-direction: column;
          gap: 14px;
        }
        .ne-scard {
          position: relative;
          padding: 20px;
          border-radius: 20px;
          background: #ffffff;
          border: 1px solid #eef2f7;
          box-shadow: 0 10px 24px -14px rgba(15,23,42,0.12);
          overflow: hidden;
          transition: transform 0.3s cubic-bezier(.2,.7,.2,1), box-shadow 0.3s ease, border-color 0.25s ease;
          cursor: default;
        }
        .ne-scard::before {
          content: "";
          position: absolute;
          top: 0; bottom: 0; left: 0;
          width: 4px;
          background: linear-gradient(180deg, var(--sc), var(--sc2));
        }
        .ne-scard::after {
          content: "";
          position: absolute;
          top: -60px; right: -60px;
          width: 180px; height: 180px;
          border-radius: 50%;
          background: radial-gradient(closest-side, color-mix(in srgb, var(--sc) 25%, transparent), transparent 70%);
          opacity: 0;
          transition: opacity .3s ease;
          pointer-events: none;
        }
        .ne-scard:hover {
          transform: translateX(6px);
          border-color: color-mix(in srgb, var(--sc) 35%, #eef2f7);
          box-shadow: 0 20px 40px -18px color-mix(in srgb, var(--sc) 50%, rgba(15,23,42,0.2));
        }
        .ne-scard:hover::after { opacity: 1; }
        .ne-scard:hover .ne-scard__arrow { transform: translateX(4px); color: var(--sc); }

        .ne-scard__head {
          display: flex; justify-content: space-between; align-items: center;
          margin-bottom: 14px;
        }
        .ne-scard__icon {
          width: 44px; height: 44px;
          border-radius: 12px;
          background: linear-gradient(135deg, var(--sc), var(--sc2));
          color: #fff;
          display: grid; place-items: center;
          box-shadow: 0 10px 22px -10px color-mix(in srgb, var(--sc) 60%, transparent);
        }
        .ne-scard__flag {
          font-size: 0.62rem;
          font-weight: 800;
          letter-spacing: 0.14em;
          padding: 4px 10px;
          border-radius: 999px;
          background: rgba(139,92,246,0.10);
          color: #6d28d9;
        }
        .ne-scard__flag--live {
          background: rgba(16,185,129,0.12);
          color: #059669;
        }

        .ne-scard__body h3.ne-scard__name {
          margin: 0 0 6px;
          font-size: 1.1rem;
          font-weight: 800;
          color: #0f172a;
          letter-spacing: -0.015em;
        }
        .ne-scard__sub {
          margin: 0;
          font-size: 0.88rem;
          color: #64748b;
          line-height: 1.5;
        }
        .ne-scard__foot {
          display: flex; justify-content: space-between; align-items: center;
          margin-top: 14px;
          padding-top: 14px;
          border-top: 1px dashed #e5e7eb;
        }
        .ne-scard__tag {
          font-size: 0.68rem;
          font-weight: 800;
          letter-spacing: 0.1em;
          text-transform: uppercase;
          color: color-mix(in srgb, var(--sc) 70%, #64748b);
        }
        .ne-scard__arrow {
          font-size: 1.1rem;
          font-weight: 700;
          color: #94a3b8;
          transition: transform .25s ease, color .25s ease;
        }

        @media (max-width: 900px) {
          .ne-stack { max-width: 100%; }
        }
      </style>
      <div class="ne-stack">
        <div class="ne-stack__header">
          <div class="ne-stack__badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Nubevest Ecosystem
          </div>
          <div class="ne-stack__hint">4 platforms &middot; one accountable partner</div>
        </div>

        <div class="ne-stack__cards">
          <!-- Card 1: Go Meta -->
          <div class="ne-scard" style="--sc:#f59e0b;--sc2:#fbbf24;">
            <div class="ne-scard__head">
              <div class="ne-scard__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="6" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="6" cy="18" r="2.4" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="18" r="2.4" stroke="currentColor" stroke-width="1.8"/><path d="M8.4 6H15.6M6 8.4v7.2M18 8.4v7.2M8.4 18H15.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>

            </div>
            <div class="ne-scard__body">
              <h3 class="ne-scard__name">Go Meta</h3>
              <p class="ne-scard__sub">CRM and workflow platform &mdash; a clearer way for Australian businesses to manage customer and operational activity.</p>
            </div>
            <div class="ne-scard__foot">
              <span class="ne-scard__tag">CRM &amp; Workflow</span>
              <span class="ne-scard__arrow" aria-hidden="true">&rarr;</span>
            </div>
          </div>

          <!-- Card 2: MonitorMart -->
          <div class="ne-scard" style="--sc:#2563eb;--sc2:#60a5fa;">
            <div class="ne-scard__head">
              <div class="ne-scard__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 21h8M12 17v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>

            </div>
            <div class="ne-scard__body">
              <h3 class="ne-scard__name">MonitorMart</h3>
              <p class="ne-scard__sub">Technology retail and sourcing &mdash; connecting hardware procurement with workplace technology setup and support.</p>
            </div>
            <div class="ne-scard__foot">
              <span class="ne-scard__tag">Hardware &amp; Procurement</span>
              <span class="ne-scard__arrow" aria-hidden="true">&rarr;</span>
            </div>
          </div>

          <!-- Card 3: Skill to Upskill -->
          <div class="ne-scard" style="--sc:#7c3aed;--sc2:#a78bfa;">
            <div class="ne-scard__head">
              <div class="ne-scard__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M3 8l9-4 9 4-9 4-9-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6 10v6c0 1.5 3 3 6 3s6-1.5 6-3v-6" stroke="currentColor" stroke-width="1.8"/></svg>
              </div>

            </div>
            <div class="ne-scard__body">
              <h3 class="ne-scard__name">Skill to Upskill</h3>
              <p class="ne-scard__sub">Education and RPL pathways &mdash; helping learners convert experience into recognised qualifications.</p>
            </div>
            <div class="ne-scard__foot">
              <span class="ne-scard__tag">Education &amp; RPL</span>
              <span class="ne-scard__arrow" aria-hidden="true">&rarr;</span>
            </div>
          </div>

          <!-- Card 4: Kangar RE -->
          <div class="ne-scard" style="--sc:#10b981;--sc2:#34d399;">
            <div class="ne-scard__head">
              <div class="ne-scard__icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M3 11l9-7 9 7v9a1 1 0 0 1-1 1h-5v-6h-6v6H4a1 1 0 0 1-1-1v-9z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
              </div>

            </div>
            <div class="ne-scard__body">
              <h3 class="ne-scard__name">Kangar Dubai Experts</h3>
              <p class="ne-scard__sub">Dubai property guidance for Australian investors &mdash; off-plan, resale and residency-linked options.</p>
            </div>
            <div class="ne-scard__foot">
              <span class="ne-scard__tag">Dubai Property</span>
              <span class="ne-scard__arrow" aria-hidden="true">&rarr;</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PLATFORMS -->
<section id="platforms" class="au-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>PLATFORMS &amp; SERVICE BRANDS &middot; A PLATFORM BY NUBEVEST</span>
      <h2 class="au-h2">Software and service brands, <span class="au-grad">powered by Nubevest.</span></h2>
      <p>In-house Nubevest platforms and technology service brands &mdash; all delivered through one accountable Nubevest relationship, never as separate companies.</p>
    </div>

    <div class="au-model__grid reveal">
      <div class="au-model__card">
        <div class="au-model__num">01</div>
        <div class="au-model__icon-wrap">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#2563eb" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4M7 14h4M7 17h6" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Plannor</h3>
        <p>A platform in development for Australian NDIS providers, focused on connecting key provider workflows &mdash; participants, staff, rosters, timesheets, documents and billing &mdash; in one operating environment.</p>
        <ul class="au-model__list">
          <li>Participant &amp; staff records</li>
          <li>Roster &amp; timesheets</li>
          <li>Documents &amp; billing</li>
          <li>Provider-first design</li>
        </ul>
        <a href="https://plannor.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__url">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>
          plannor.com.au
        </a>
        <a href="https://plannor.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__link">Learn About Plannor
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <div class="au-model__card au-model__card--featured">
        <div class="au-model__num">02</div>
        <div class="au-model__icon-wrap au-model__icon-wrap--purple">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="18" cy="6" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="6" cy="18" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><circle cx="18" cy="18" r="2.4" stroke="#7c3aed" stroke-width="1.8"/><path d="M8.4 6H15.6M6 8.4v7.2M18 8.4v7.2M8.4 18H15.6" stroke="#7c3aed" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Go Meta</h3>
        <p>A CRM and workflow platform for Australian businesses managing leads, clients, tasks, communication, scheduling and automation &mdash; running in production today.</p>
        <ul class="au-model__list">
          <li>Leads &amp; client CRM</li>
          <li>Task &amp; scheduling</li>
          <li>Communications hub</li>
          <li>Workflow automation</li>
        </ul>
        <a href="https://gometa.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__url">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>
          gometa.com.au
        </a>
        <a href="https://gometa.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__link">View Go Meta
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <span class="au-model__ribbon">Flagship</span>
      </div>

      <div class="au-model__card">
        <div class="au-model__num">03</div>
        <div class="au-model__icon-wrap au-model__icon-wrap--green">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="18" height="12" rx="2" stroke="#10b981" stroke-width="1.8"/><path d="M3 8l9 6 9-6" stroke="#10b981" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <h3>MetaMeet</h3>
        <p>Domain registration, hosting, business email, SSL and related digital foundations for organisations building their online presence.</p>
        <ul class="au-model__list">
          <li>Domain &amp; DNS</li>
          <li>Business email</li>
          <li>Hosting &amp; SSL</li>
          <li>Setup support</li>
        </ul>
        <a href="https://metameet.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__url">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>
          metameet.com.au
        </a>
        <a href="https://metameet.com.au/" target="_blank" rel="noopener noreferrer" class="au-model__link">Visit MetaMeet
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- TECHNOLOGY COMMERCE -->
<section class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>TECHNOLOGY COMMERCE</span>
      <h2 class="au-h2">Hardware sourcing <span class="au-grad">the operating way.</span></h2>
    </div>

    <div class="solutions-grid reveal stagger" style="grid-template-columns:repeat(2, minmax(0, 1fr));">

      <a href="https://monitormart.com.au/" target="_blank" rel="noopener noreferrer" class="sol-card sol-card--amber">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 21h8M12 17v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3 class="sol-card__title">MonitorMart</h3>
            <p class="sol-card__desc">Online technology retail and sourcing for monitors, computers, laptops, software, accessories and other business hardware.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>monitormart.com.au</span>
            <span class="sol-card__link">Visit MonitorMart
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="18" y="14" width="94" height="56" rx="4" fill="#fffbeb" stroke="#fde68a"/>
              <rect x="24" y="20" width="82" height="44" rx="2" fill="#f59e0b"/>
              <rect x="30" y="26" width="24" height="4" rx="2" fill="#fef3c7"/>
              <rect x="30" y="34" width="60" height="24" rx="2" fill="#fbbf24"/>
              <rect x="52" y="74" width="26" height="8" fill="#fde68a"/>
              <rect x="40" y="82" width="50" height="6" rx="3" fill="#f59e0b"/>
            </svg>
          </div>
        </div>
      </a>

      <a href="#" class="sol-card sol-card--blue">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M6 3h9l6 6v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M14 3v6h6M8 14h8M8 18h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3 class="sol-card__title">Sourcing &amp; procurement</h3>
            <p class="sol-card__desc">Practical hardware, licensing and setup support tied into your business operations &mdash; with visibility of orders, delivery and lifecycle.</p>
            <span class="sol-card__link">Talk sourcing
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="12" y="20" width="106" height="60" rx="8" fill="#eff6ff" stroke="#bfdbfe"/>
              <rect x="20" y="30" width="40" height="6" rx="3" fill="#2563eb"/>
              <rect x="20" y="42" width="52" height="4" rx="2" fill="#93c5fd"/>
              <rect x="20" y="52" width="46" height="4" rx="2" fill="#93c5fd"/>
              <rect x="20" y="64" width="34" height="10" rx="3" fill="#2563eb"/>
              <circle cx="98" cy="50" r="14" fill="#dbeafe" stroke="#3b82f6" stroke-width="1.6"/>
              <path d="M92 50l4 4 8-8" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
      </a>

    </div>
  </div>
</section>

<!-- NUBEVEST BUSINESSES -->
<section id="businesses" class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>NUBEVEST BUSINESSES &middot; A NUBEVEST BUSINESS</span>
      <h2 class="au-h2">Specialist Nubevest businesses. <span class="au-grad">Distinct offers, one relationship.</span></h2>
      <p>Recruitment &amp; workforce, education pathway support, Dubai property and long-term vehicle rental &mdash; each visibly connected to Nubevest, with the contracting entity disclosed in every proposal.</p>
    </div>

    <div class="solutions-grid reveal stagger">

      <!-- Workers Australia -->
      <a href="/contact?service=workers-australia" class="sol-card sol-card--purple">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3.2" stroke="currentColor" stroke-width="1.8"/><circle cx="16.5" cy="9" r="2.4" stroke="currentColor" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M14 19c0-2 2-4 5-4s2 2 2 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3 class="sol-card__title">Workers Australia</h3>
            <p class="sol-card__desc">A specialist recruitment and workforce business helping organisations source suitable people and strengthen workforce capacity, including relevant opportunities across care and support-sector organisations.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>workersaustralia.com.au</span>
            <span class="sol-card__link">Explore Workers Australia
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="10" y="16" width="110" height="70" rx="10" fill="#f5f3ff" stroke="#ddd6fe"/>
              <circle cx="34" cy="42" r="10" fill="#8b5cf6"/>
              <path d="M22 66c0-6 6-10 12-10s12 4 12 10" stroke="#8b5cf6" stroke-width="2" fill="none"/>
              <circle cx="66" cy="42" r="10" fill="#a78bfa"/>
              <path d="M54 66c0-6 6-10 12-10s12 4 12 10" stroke="#a78bfa" stroke-width="2" fill="none"/>
              <circle cx="98" cy="42" r="10" fill="#c4b5fd"/>
              <path d="M86 66c0-6 6-10 12-10s12 4 12 10" stroke="#c4b5fd" stroke-width="2" fill="none"/>
              <path d="M24 78h82" stroke="#ddd6fe" stroke-width="1.6" stroke-dasharray="3 3"/>
            </svg>
          </div>
        </div>
      </a>

      <!-- Skill to Upskill -->
      <a href="https://skilltoupskill.com.au/" target="_blank" rel="noopener noreferrer" class="sol-card sol-card--green">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M2 9l10-5 10 5-10 5-10-5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6 11v5c2 2 4 3 6 3s4-1 6-3v-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3 class="sol-card__title">Skill to Upskill</h3>
            <p class="sol-card__desc">An education support and referral service helping eligible people explore Recognition of Prior Learning pathways through qualified consultants and partner RTOs. Skill to Upskill is not an RTO.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>skilltoupskill.com.au</span>
            <span class="sol-card__link">Visit Skill to Upskill
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="14" y="18" width="102" height="64" rx="6" fill="#ecfdf5" stroke="#a7f3d0"/>
              <path d="M20 30l45-14 45 14-45 14-45-14z" fill="#10b981"/>
              <path d="M30 34v14c8 7 22 9 35 9s27-2 35-9V34" stroke="#059669" stroke-width="1.6" stroke-linecap="round" fill="none"/>
              <rect x="52" y="58" width="26" height="14" rx="2" fill="#d1fae5" stroke="#34d399"/>
              <path d="M56 65l4 4 10-10" stroke="#059669" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
      </a>

      <!-- Nube Rentals -->
      <a href="https://nuber.au/" target="_blank" rel="noopener noreferrer" class="sol-card sol-card--blue">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 14l2-6h12l2 6v4h-2v-2H6v2H4v-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="8" cy="17" r="1.6" stroke="currentColor" stroke-width="1.8"/><circle cx="16" cy="17" r="1.6" stroke="currentColor" stroke-width="1.8"/></svg>
            </div>
            <h3 class="sol-card__title">Nube Rentals</h3>
            <p class="sol-card__desc">A vehicle-rental business focused on practical mobility options, including longer-term rental needs for individuals and organisations.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>nuber.au</span>
            <span class="sol-card__link">Explore Nube Rentals
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="8" y="20" width="114" height="60" rx="10" fill="#eff6ff" stroke="#bfdbfe"/>
              <path d="M22 62l6-16h44l6 16v10H22z" fill="#2563eb"/>
              <path d="M30 46l4-8h32l4 8" fill="#3b82f6"/>
              <rect x="34" y="52" width="30" height="10" rx="2" fill="#dbeafe"/>
              <circle cx="32" cy="72" r="6" fill="#0f172a"/>
              <circle cx="32" cy="72" r="2.5" fill="#93c5fd"/>
              <circle cx="72" cy="72" r="6" fill="#0f172a"/>
              <circle cx="72" cy="72" r="2.5" fill="#93c5fd"/>
              <rect x="90" y="52" width="24" height="6" rx="3" fill="#93c5fd"/>
              <rect x="96" y="62" width="18" height="4" rx="2" fill="#bfdbfe"/>
            </svg>
          </div>
        </div>
      </a>

      <!-- Kangar Real Estate -->
      <a href="https://kangarrealestate.com/" target="_blank" rel="noopener noreferrer" class="sol-card sol-card--amber">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 21V9l8-6 8 6v12" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 21v-6h6v6" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </div>
            <h3 class="sol-card__title">Kangar Real Estate</h3>
            <p class="sol-card__desc">A Dubai-focused property and business-support venture assisting clients through services delivered within its scope and partner arrangements.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>kangarrealestate.com</span>
            <span class="sol-card__link">Explore Kangar Real Estate
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="14" y="34" width="30" height="52" rx="2" fill="#fffbeb" stroke="#fde68a"/>
              <rect x="50" y="14" width="34" height="72" rx="2" fill="#fef3c7" stroke="#fde68a"/>
              <rect x="90" y="26" width="26" height="60" rx="2" fill="#fffbeb" stroke="#fde68a"/>
              <rect x="18" y="40" width="6" height="6" fill="#f59e0b"/>
              <rect x="30" y="40" width="6" height="6" fill="#f59e0b"/>
              <rect x="18" y="52" width="6" height="6" fill="#fbbf24"/>
              <rect x="30" y="52" width="6" height="6" fill="#fbbf24"/>
              <rect x="18" y="64" width="6" height="6" fill="#f59e0b"/>
              <rect x="30" y="64" width="6" height="6" fill="#fbbf24"/>
              <rect x="56" y="22" width="6" height="6" fill="#f59e0b"/>
              <rect x="68" y="22" width="6" height="6" fill="#f59e0b"/>
              <rect x="56" y="34" width="6" height="6" fill="#fbbf24"/>
              <rect x="68" y="34" width="6" height="6" fill="#fbbf24"/>
              <rect x="56" y="46" width="6" height="6" fill="#f59e0b"/>
              <rect x="68" y="46" width="6" height="6" fill="#fbbf24"/>
              <rect x="56" y="58" width="6" height="6" fill="#f59e0b"/>
              <rect x="68" y="58" width="6" height="6" fill="#f59e0b"/>
              <rect x="96" y="34" width="6" height="6" fill="#fbbf24"/>
              <rect x="106" y="34" width="6" height="6" fill="#fbbf24"/>
              <rect x="96" y="46" width="6" height="6" fill="#f59e0b"/>
              <rect x="106" y="46" width="6" height="6" fill="#fbbf24"/>
              <rect x="96" y="58" width="6" height="6" fill="#fbbf24"/>
              <rect x="106" y="58" width="6" height="6" fill="#f59e0b"/>
            </svg>
          </div>
        </div>
      </a>

      <!-- Nubevest Events -->
      <a href="/events" class="sol-card sol-card--pink">
        <div class="sol-card__inner">
          <div class="sol-card__body">
            <div class="sol-card__icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </div>
            <h3 class="sol-card__title">Nubevest Events</h3>
            <p class="sol-card__desc">End-to-end strategy and delivery for business, industry and community events &mdash; from venue and supplier coordination to promotion, registrations, exhibitors, sponsors, branded walls, flags, signage, on-site operations and post-event content.</p>
            <span class="sol-card__url"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.6"/></svg>nubevest.com.au/events</span>
            <span class="sol-card__link">Explore Nubevest Events
              <svg class="sol-card__arrow" width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <div class="sol-card__art" aria-hidden="true">
            <svg viewBox="0 0 130 100" fill="none">
              <rect x="14" y="18" width="102" height="66" rx="8" fill="#fdf2f8" stroke="#fbcfe8"/>
              <rect x="14" y="18" width="102" height="14" rx="8" fill="#ec4899"/>
              <circle cx="34" cy="14" r="4" stroke="#ec4899" stroke-width="2"/>
              <circle cx="96" cy="14" r="4" stroke="#ec4899" stroke-width="2"/>
              <rect x="24" y="42" width="16" height="14" rx="2" fill="#fbcfe8"/>
              <rect x="46" y="42" width="16" height="14" rx="2" fill="#f472b6"/>
              <rect x="68" y="42" width="16" height="14" rx="2" fill="#fbcfe8"/>
              <rect x="90" y="42" width="16" height="14" rx="2" fill="#fbcfe8"/>
              <rect x="24" y="62" width="16" height="14" rx="2" fill="#fbcfe8"/>
              <rect x="46" y="62" width="16" height="14" rx="2" fill="#fbcfe8"/>
              <rect x="68" y="62" width="16" height="14" rx="2" fill="#ec4899"/>
              <rect x="90" y="62" width="16" height="14" rx="2" fill="#fbcfe8"/>
            </svg>
          </div>
        </div>
      </a>

    </div>

  </div>
</section>

<!-- INITIATIVES IN DEVELOPMENT -->
<section class="ab-model">
  <div class="container">
    <div class="au-head au-head--center reveal">
      <span class="kicker kicker--pill"><i></i>INITIATIVES IN DEVELOPMENT</span>
      <h2 class="au-h2">Ideas being shaped &mdash; <span class="au-grad">not yet released.</span></h2>
      <p>Initiatives labelled as in development are shared for transparency. They are not presented as live products, and no public Visit or Join CTA is added until a suitable destination exists.</p>
    </div>

    <div class="au-model__grid reveal" style="grid-template-columns:repeat(2, minmax(0, 1fr));">

      <div class="au-model__card">
        <div class="au-model__icon-wrap">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="#2563eb" stroke-width="1.8"/><path d="M3 9h18" stroke="#2563eb" stroke-width="1.8"/></svg>
        </div>
        <h3>NDIS Pages</h3>
        <p>A planned discovery platform intended to help people find relevant NDIS businesses, services, events and industry information more easily.</p>
        <ul class="au-model__list">
          <li>Provider discovery</li>
          <li>Service &amp; event listings</li>
          <li>Industry information</li>
          <li>Planned initiative</li>
        </ul>
      </div>

      <div class="au-model__card au-model__card--featured">
        <div class="au-model__icon-wrap au-model__icon-wrap--purple">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#7c3aed" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4M7 14h4M7 17h6" stroke="#7c3aed" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <h3>Plannor</h3>
        <p>Provider platform being built by Nubevest &mdash; connecting participants, staff, rosters, timesheets, documents and billing in one operating environment. Capabilities are described as they become available.</p>
        <ul class="au-model__list">
          <li>Participant &amp; staff records</li>
          <li>Roster &amp; timesheets</li>
          <li>Documents &amp; billing</li>
          <li>Australian NDIS focus</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- HOW IT FITS -->
<section class="hf-section">
  <div class="hf-section__bg" aria-hidden="true">
    <div class="hf-section__orb hf-section__orb--1"></div>
    <div class="hf-section__orb hf-section__orb--2"></div>
    <svg class="hf-section__dots" width="160" height="160" viewBox="0 0 160 160" fill="none">
      <g fill="#c7d2fe" opacity="0.55">
        <circle cx="4" cy="4" r="1.4"/><circle cx="24" cy="4" r="1.4"/><circle cx="44" cy="4" r="1.4"/><circle cx="64" cy="4" r="1.4"/><circle cx="84" cy="4" r="1.4"/>
        <circle cx="4" cy="24" r="1.4"/><circle cx="24" cy="24" r="1.4"/><circle cx="44" cy="24" r="1.4"/>
        <circle cx="4" cy="44" r="1.4"/><circle cx="24" cy="44" r="1.4"/>
        <circle cx="4" cy="64" r="1.4"/>
      </g>
    </svg>
  </div>

  <div class="container">
    <div class="hf-grid">
      <!-- Left: intro -->
      <div class="hf-intro reveal">
        <span class="kicker kicker--pill hf-intro__kicker"><i></i>HOW IT FITS</span>
        <h2 class="hf-intro__title">One ecosystem. <br><span class="hf-intro__grad">Clear responsibilities.</span></h2>
        <p class="hf-intro__lead">Each platform and venture has its own purpose, customer journey, commercial terms and regulatory position. Nubevest provides shared technology, marketing or operational capability where applicable &mdash; while keeping each offering&rsquo;s responsibilities and customer commitments distinct.</p>

        <div class="hf-summary">
          <div class="hf-summary__row">
            <span class="hf-summary__dot" style="background:#3b82f6"></span>
            <span>Each brand keeps its own website &amp; terms</span>
          </div>
          <div class="hf-summary__row">
            <span class="hf-summary__dot" style="background:#8b5cf6"></span>
            <span>Regulatory position stays with each offering</span>
          </div>
          <div class="hf-summary__row">
            <span class="hf-summary__dot" style="background:#10b981"></span>
            <span>Shared capability where it makes sense</span>
          </div>
        </div>
      </div>

      <!-- Right: 3 pillar cards, staggered -->
      <div class="hf-pillars reveal">
        <div class="hf-pillar" style="--hfc1:#3b82f6;--hfc2:#6366f1;">
          <span class="hf-pillar__stripe"></span>
          <div class="hf-pillar__head">
            <span class="hf-pillar__num">01</span>
            <span class="hf-pillar__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="#fff" stroke-width="1.6"/></svg>
            </span>
          </div>
          <h3 class="hf-pillar__t">Distinct customer journeys</h3>
          <p class="hf-pillar__p">Each brand serves its own audience through its own website, terms and support channels.</p>
          <div class="hf-pillar__meta">
            <span>Own website</span>
            <span>Own terms</span>
            <span>Own support</span>
          </div>
        </div>

        <div class="hf-pillar" style="--hfc1:#8b5cf6;--hfc2:#ec4899;">
          <span class="hf-pillar__stripe"></span>
          <div class="hf-pillar__head">
            <span class="hf-pillar__num">02</span>
            <span class="hf-pillar__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
          </div>
          <h3 class="hf-pillar__t">Own regulatory position</h3>
          <p class="hf-pillar__p">Compliance, licensing and scope statements sit with each offering &mdash; not blurred across the group.</p>
          <div class="hf-pillar__meta">
            <span>Compliance</span>
            <span>Licensing</span>
            <span>Scope</span>
          </div>
        </div>

        <div class="hf-pillar" style="--hfc1:#10b981;--hfc2:#34d399;">
          <span class="hf-pillar__stripe"></span>
          <div class="hf-pillar__head">
            <span class="hf-pillar__num">03</span>
            <span class="hf-pillar__ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="6" r="2.4" stroke="#fff" stroke-width="1.8"/><circle cx="18" cy="6" r="2.4" stroke="#fff" stroke-width="1.8"/><circle cx="12" cy="18" r="2.4" stroke="#fff" stroke-width="1.8"/><path d="M8 6h8M7.5 8l4 8M16.5 8l-4 8" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
            </span>
          </div>
          <h3 class="hf-pillar__t">Shared capability</h3>
          <p class="hf-pillar__p">Common technology, marketing and operations where it makes each brand faster and better.</p>
          <div class="hf-pillar__meta">
            <span>Technology</span>
            <span>Marketing</span>
            <span>Operations</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="pt-section">
  <div class="container">
    <div class="pt-card reveal">
      <!-- Background layers -->
      <div class="pt-card__bg" aria-hidden="true">
        <span class="pt-card__orb pt-card__orb--1"></span>
        <span class="pt-card__orb pt-card__orb--2"></span>
        <span class="pt-card__orb pt-card__orb--3"></span>
        <svg class="pt-card__grid" viewBox="0 0 600 400" preserveAspectRatio="none">
          <defs>
            <pattern id="pt-g" width="36" height="36" patternUnits="userSpaceOnUse">
              <path d="M36 0H0V36" stroke="rgba(255,255,255,0.06)" stroke-width="1" fill="none"/>
            </pattern>
          </defs>
          <rect width="600" height="400" fill="url(#pt-g)"/>
        </svg>
      </div>

      <div class="pt-card__inner">
        <!-- Left: content -->
        <div class="pt-card__body">
          <span class="pt-kicker">
            <span class="pt-kicker__ico">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M3 7l9-4 9 4-9 4-9-4zM3 12l9 4 9-4M3 17l9 4 9-4" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </span>
            PARTNERSHIPS
          </span>

          <h2 class="pt-title">
            Explore a platform, venture or
            <span class="pt-title__grad">partnership opportunity.</span>
          </h2>

          <p class="pt-lead">Choose the relevant brand for a specific service, or contact Nubevest to discuss technology delivery, channels and strategic partnerships.</p>

          <!-- Path chooser -->
          <div class="pt-paths">
            <div class="pt-path" style="--ptc1:#3b82f6;--ptc2:#6366f1;">
              <div class="pt-path__num">01</div>
              <div class="pt-path__body">
                <div class="pt-path__t">Need a specific service?</div>
                <div class="pt-path__s">Choose the brand that delivers it.</div>
              </div>
              <a href="#platforms" class="pt-path__arrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
            <div class="pt-path" style="--ptc1:#8b5cf6;--ptc2:#ec4899;">
              <div class="pt-path__num">02</div>
              <div class="pt-path__body">
                <div class="pt-path__t">Building something bigger?</div>
                <div class="pt-path__s">Talk to Nubevest about a strategic partnership.</div>
              </div>
              <a href="/contact" class="pt-path__arrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
          </div>

          <div class="pt-actions">
            <a href="#platforms" class="pt-btn pt-btn--primary">
              Explore the Ecosystem
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="/contact" class="pt-btn pt-btn--ghost">Discuss a Partnership</a>
          </div>
        </div>

        <!-- Right: opportunity board visual -->
        <div class="pt-card__visual" aria-hidden="true">
          <div class="pt-board">
            <div class="pt-board__head">
              <div class="pt-board__title">
                <span class="pt-board__title-ico">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 20l6-8 4 4 6-10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 6h6v6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                Opportunity board
              </div>
              <span class="pt-board__badge">
                <span class="pt-board__badge-dot"></span>
                Open now
              </span>
            </div>

            <div class="pt-board__body">
              <div class="pt-board__row">
                <span class="pt-board__row-ico" style="background:linear-gradient(135deg,#3b82f6,#6366f1)">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18" stroke="#fff" stroke-width="1.8"/></svg>
                </span>
                <div class="pt-board__row-body">
                  <div class="pt-board__row-t">Platform integration</div>
                  <div class="pt-board__row-s">Go Meta &middot; MetaMeet</div>
                </div>
                <span class="pt-board__pill pt-board__pill--blue">Live</span>
              </div>

              <div class="pt-board__row">
                <span class="pt-board__row-ico" style="background:linear-gradient(135deg,#10b981,#34d399)">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="9" cy="8" r="3" stroke="#fff" stroke-width="1.8"/><path d="M3 19c0-3 3-5 6-5s6 2 6 5" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
                </span>
                <div class="pt-board__row-body">
                  <div class="pt-board__row-t">Workforce channel</div>
                  <div class="pt-board__row-s">Workers Australia</div>
                </div>
                <span class="pt-board__pill pt-board__pill--green">Live</span>
              </div>

              <div class="pt-board__row">
                <span class="pt-board__row-ico" style="background:linear-gradient(135deg,#f59e0b,#fbbf24)">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M3 9h18M8 3v4M16 3v4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
                </span>
                <div class="pt-board__row-body">
                  <div class="pt-board__row-t">Event sponsorship</div>
                  <div class="pt-board__row-s">Nubevest Events</div>
                </div>
                <span class="pt-board__pill pt-board__pill--amber">Live</span>
              </div>

              <div class="pt-board__row pt-board__row--dev">
                <span class="pt-board__row-ico" style="background:linear-gradient(135deg,#8b5cf6,#ec4899)">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.8"/><path d="M12 7v5l3 2" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
                </span>
                <div class="pt-board__row-body">
                  <div class="pt-board__row-t">Provider platform pilot</div>
                  <div class="pt-board__row-s">Plannor &middot; NDIS Pages</div>
                </div>
                <span class="pt-board__pill pt-board__pill--dev">In dev</span>
              </div>
            </div>

            <div class="pt-board__foot">
              <span class="pt-board__foot-l">Talk to us about a fit</span>
              <span class="pt-board__foot-arrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </div>

          <!-- Floating chips -->
          <span class="pt-chip pt-chip--tl">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-14" stroke="#10b981" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Australian-led
          </span>
          <span class="pt-chip pt-chip--br">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#f59e0b" stroke-width="1.8" stroke-linejoin="round"/></svg>
            Clear scope &amp; terms
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
