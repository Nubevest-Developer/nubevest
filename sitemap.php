<?php
$page = 'sitemap';
$seo_title = 'Sitemap | Nubevest';
$meta_desc = 'Every page on the Nubevest website — solutions, industries, products, ventures, work, about and contact — in one place.';
include 'includes/header.php';
?>

<style>
.sm-page { padding: 60px 0 60px; position:relative; background: linear-gradient(180deg,#faf9ff 0%, #ffffff 60%); }
.sm-hero { text-align:center; max-width:820px; margin: 0 auto 44px; }
.sm-hero .kicker { margin-bottom:16px; }
.sm-hero h1 { font-size: clamp(2rem, 3.4vw, 2.8rem); font-weight:800; color:#0f172a; letter-spacing:-0.025em; margin: 0 0 14px; line-height:1.15; }
.sm-hero h1 .g { background: linear-gradient(90deg,#10b981,#3b82f6); -webkit-background-clip:text; background-clip:text; color:transparent; }
.sm-hero p { font-size:1.02rem; color:#64748b; line-height:1.6; margin:0; }

.sm-grid { display:grid; grid-template-columns: repeat(3, 1fr); gap:20px; max-width:1120px; margin: 0 auto; }
@media (max-width: 900px){ .sm-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px){ .sm-grid { grid-template-columns: 1fr; } }

.sm-card {
  background:#fff; border:1px solid #eef1f5; border-radius:20px;
  padding:26px; position:relative; overflow:hidden;
  box-shadow: 0 20px 40px -25px rgba(15,23,42,0.08);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.sm-card:hover { transform: translateY(-4px); box-shadow: 0 30px 50px -20px rgba(15,23,42,0.15); }
.sm-card::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; }
.sm-card--blue::before { background: linear-gradient(90deg,#3b82f6,#60a5fa); }
.sm-card--purple::before { background: linear-gradient(90deg,#7c3aed,#a78bfa); }
.sm-card--green::before { background: linear-gradient(90deg,#10b981,#34d399); }
.sm-card--amber::before { background: linear-gradient(90deg,#f59e0b,#fbbf24); }
.sm-card--pink::before { background: linear-gradient(90deg,#ec4899,#f472b6); }
.sm-card--cyan::before { background: linear-gradient(90deg,#06b6d4,#22d3ee); }

.sm-card__head { display:flex; align-items:center; gap:12px; margin-bottom:14px; padding-top:8px; }
.sm-card__ico { width:40px; height:40px; border-radius:12px; display:grid; place-items:center; color:#fff; flex-shrink:0; }
.sm-card--blue .sm-card__ico { background: linear-gradient(135deg,#3b82f6,#2563eb); box-shadow: 0 10px 20px -8px rgba(37,99,235,0.5); }
.sm-card--purple .sm-card__ico { background: linear-gradient(135deg,#7c3aed,#6d28d9); box-shadow: 0 10px 20px -8px rgba(124,58,237,0.5); }
.sm-card--green .sm-card__ico { background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 10px 20px -8px rgba(16,185,129,0.5); }
.sm-card--amber .sm-card__ico { background: linear-gradient(135deg,#f59e0b,#d97706); box-shadow: 0 10px 20px -8px rgba(245,158,11,0.5); }
.sm-card--pink .sm-card__ico { background: linear-gradient(135deg,#ec4899,#db2777); box-shadow: 0 10px 20px -8px rgba(236,72,153,0.5); }
.sm-card--cyan .sm-card__ico { background: linear-gradient(135deg,#06b6d4,#0891b2); box-shadow: 0 10px 20px -8px rgba(6,182,212,0.5); }
.sm-card__t { font-size:1.05rem; font-weight:800; color:#0f172a; letter-spacing:-0.02em; margin:0; }

.sm-list { display:flex; flex-direction:column; gap:2px; }
.sm-list a {
  display:flex; align-items:center; gap:8px;
  padding:9px 10px; border-radius:8px;
  font-size:0.9rem; font-weight:600; color:#334155;
  text-decoration:none;
  transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
}
.sm-list a::before {
  content:''; width:5px; height:5px; border-radius:50%; background:#cbd5e1;
  transition: background 0.2s ease, transform 0.2s ease;
  flex-shrink:0;
}
.sm-list a:hover { background:#f8fafc; color:#0f172a; transform: translateX(3px); }
.sm-list a:hover::before { transform: scale(1.6); }
.sm-card--blue .sm-list a:hover::before { background:#3b82f6; }
.sm-card--purple .sm-list a:hover::before { background:#7c3aed; }
.sm-card--green .sm-list a:hover::before { background:#10b981; }
.sm-card--amber .sm-list a:hover::before { background:#f59e0b; }
.sm-card--pink .sm-list a:hover::before { background:#ec4899; }
.sm-card--cyan .sm-list a:hover::before { background:#06b6d4; }
.sm-list a .ext { margin-left:auto; opacity:0.5; }

.sm-cta { margin-top:44px; background: linear-gradient(135deg,#0f172a 0%, #1e293b 100%); border-radius:20px; padding:32px; color:#fff; text-align:center; position:relative; overflow:hidden; max-width:1120px; margin-left:auto; margin-right:auto; }
.sm-cta::before { content:''; position:absolute; top:-40%; right:-15%; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(124,58,237,0.3), transparent 60%); }
.sm-cta::after { content:''; position:absolute; bottom:-40%; left:-15%; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(16,185,129,0.25), transparent 60%); }
.sm-cta > * { position:relative; }
.sm-cta h3 { margin:0 0 10px; font-size:1.4rem; font-weight:800; letter-spacing:-0.02em; }
.sm-cta h3 .g { background: linear-gradient(90deg,#a78bfa,#60a5fa); -webkit-background-clip:text; background-clip:text; color:transparent; }
.sm-cta p { margin:0 0 20px; color: rgba(255,255,255,0.75); font-size:0.95rem; line-height:1.55; max-width:600px; margin-left:auto; margin-right:auto; }
.sm-cta a { display:inline-flex; align-items:center; gap:8px; padding:12px 22px; background: linear-gradient(135deg,#7c3aed,#6d28d9); color:#fff; border-radius:10px; font-weight:800; text-decoration:none; box-shadow: 0 16px 32px -10px rgba(124,58,237,0.65); transition: transform 0.2s ease; }
.sm-cta a:hover { transform: translateY(-2px); }
</style>

<main id="main">
<section class="sm-page">
  <div class="container">

    <div class="sm-hero reveal">
      <span class="kicker kicker--pill"><i></i>WEBSITE MAP</span>
      <h1>Every page on <span class="g">Nubevest.</span></h1>
      <p>Explore the full structure of the Nubevest website &mdash; solutions, industries, platforms, ventures, work, about and contact &mdash; all in one place.</p>
    </div>

    <div class="sm-grid reveal">

      <!-- Main pages -->
      <div class="sm-card sm-card--blue">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M3 12l9-9 9 9M5 10v10h14V10" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h3 class="sm-card__t">Main pages</h3>
        </div>
        <div class="sm-list">
          <a href="/">Home</a>
          <a href="/about.php">About Nubevest</a>
          <a href="/solutions.php">Solutions overview</a>
          <a href="/products-ventures.php">Products &amp; Ventures</a>
          <a href="/work.php">Our Work</a>
          <a href="/contact.php">Contact</a>
        </div>
      </div>

      <!-- Solutions -->
      <div class="sm-card sm-card--purple">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="2"/></svg></div>
          <h3 class="sm-card__t">Solutions</h3>
        </div>
        <div class="sm-list">
          <a href="/solutions/websites-ecommerce.php">Websites &amp; eCommerce</a>
          <a href="/solutions/software-apps.php">Software &amp; Apps</a>
          <a href="/solutions/crm-automation-ai.php">CRM, Automation &amp; AI</a>
          <a href="/solutions/managed-it-cloud-cybersecurity.php">Managed IT &amp; Cybersecurity</a>
          <a href="/solutions/digital-growth.php">Marketing &amp; Growth</a>
          <a href="/solutions/workplace-technology.php">Workplace Technology</a>
        </div>
      </div>

      <!-- Industries -->
      <div class="sm-card sm-card--green">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 21V9l8-6 8 6v12" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 21v-6h6v6" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h3 class="sm-card__t">Industries</h3>
        </div>
        <div class="sm-list">
          <a href="/industries/ndis-providers.php">NDIS Providers</a>
          <a href="/ndis.php">NDIS Overview</a>
        </div>
      </div>

      <!-- Products & Ventures -->
      <div class="sm-card sm-card--amber">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 3l3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <h3 class="sm-card__t">Products &amp; Ventures</h3>
        </div>
        <div class="sm-list">
          <a href="/products-ventures.php">Ecosystem overview</a>
          <a href="https://monitormart.com.au/" target="_blank" rel="noopener">MonitorMart <span class="ext"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M7 17l10-10M9 7h8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span></a>
          <a href="https://metameet.com.au/" target="_blank" rel="noopener">MetaMeet <span class="ext"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M7 17l10-10M9 7h8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span></a>
          <a href="/products-ventures.php#plannor">Plannor (in development)</a>
          <a href="/products-ventures.php#gometa">Go Meta</a>
          <a href="/events.php">Nubevest Events</a>
        </div>
      </div>

      <!-- Events & Company -->
      <div class="sm-card sm-card--pink">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="2"/><path d="M3 9h18M8 3v4M16 3v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
          <h3 class="sm-card__t">Events &amp; Company</h3>
        </div>
        <div class="sm-list">
          <a href="/events.php">Events</a>
          <a href="/print-signage/">Print &amp; Signage</a>
          <a href="/about.php">Our Story</a>
          <a href="/work.php">Our work</a>
          <a href="/contact.php">Contact team</a>
        </div>
      </div>

      <!-- Legal -->
      <div class="sm-card sm-card--cyan">
        <div class="sm-card__head">
          <div class="sm-card__ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h3 class="sm-card__t">Legal</h3>
        </div>
        <div class="sm-list">
          <a href="/privacy-policy.php">Privacy Policy</a>
          <a href="/terms-of-use.php">Terms of Use</a>
          <a href="/sitemap.php">Sitemap</a>
        </div>
      </div>

    </div>

    <div class="sm-cta reveal">
      <h3>Can&rsquo;t find <span class="g">what you&rsquo;re looking for?</span></h3>
      <p>Tell us what you were looking for &mdash; we&rsquo;ll point you to the right page, or help directly.</p>
      <a href="/contact.php">
        Contact Us
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>

  </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
