<?php
$page = 'legal';
$seo_title = 'Disclaimer | Nubevest';
$meta_desc = 'General disclaimer covering the content, advice and recommendations published across the Nubevest website, blog, events and communications.';
include 'includes/header.php';
?>

<style>
.lg-page { padding: 60px 0 60px; position:relative; background: linear-gradient(180deg,#faf9ff 0%, #ffffff 60%); }
.lg-hero { text-align:center; max-width:820px; margin: 0 auto 44px; }
.lg-hero .kicker { margin-bottom:16px; }
.lg-hero h1 { font-size: clamp(2rem, 3.4vw, 2.8rem); font-weight:800; color:#0f172a; letter-spacing:-0.025em; margin: 0 0 14px; line-height:1.15; }
.lg-hero h1 .g { background: linear-gradient(90deg,#0ea5e9,#7c3aed); -webkit-background-clip:text; background-clip:text; color:transparent; }
.lg-hero p { font-size:1.02rem; color:#64748b; line-height:1.6; margin:0; }
.lg-meta { display:inline-flex; align-items:center; gap:8px; margin-top:18px; padding:8px 16px; background:#fff; border:1px solid #eef1f5; border-radius:999px; font-size:0.82rem; color:#334155; font-weight:600; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.1); }
.lg-meta i { width:6px; height:6px; border-radius:50%; background:#10b981; }
.lg-wrap { display:grid; grid-template-columns: 260px minmax(0, 1fr); gap:40px; align-items:start; max-width:1080px; margin:0 auto; }
@media (max-width: 900px){ .lg-wrap { grid-template-columns: 1fr; gap:20px; } }
.lg-toc { position:sticky; top:100px; background:#fff; border:1px solid #eef1f5; border-radius:16px; padding:18px; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.08); }
@media (max-width: 900px){ .lg-toc { position:static; } }
.lg-toc__t { font-size:0.72rem; font-weight:800; letter-spacing:0.1em; text-transform:uppercase; color:#0ea5e9; margin-bottom:12px; }
.lg-toc a { display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; text-decoration:none; color:#475569; font-size:0.88rem; font-weight:600; transition: background 0.2s ease, color 0.2s ease; }
.lg-toc a:hover { background:#f0f9ff; color:#0ea5e9; }
.lg-toc a span { width:20px; height:20px; border-radius:6px; background:#f1f5f9; color:#0ea5e9; display:grid; place-items:center; font-size:0.7rem; font-weight:800; flex-shrink:0; }
.lg-content { background:#fff; border:1px solid #eef1f5; border-radius:20px; padding:40px; box-shadow: 0 20px 40px -25px rgba(15,23,42,0.08); position:relative; overflow:hidden; }
.lg-content::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; background: linear-gradient(90deg,#0ea5e9 0%, #7c3aed 50%, #10b981 100%); }
.lg-section { padding-top:12px; margin-bottom:32px; scroll-margin-top:100px; }
.lg-section:last-child { margin-bottom:0; }
.lg-section h2 { font-size:1.35rem; font-weight:800; color:#0f172a; letter-spacing:-0.02em; margin:0 0 14px; display:flex; align-items:center; gap:12px; }
.lg-section h2 .n { width:32px; height:32px; border-radius:10px; background: linear-gradient(135deg,#e0f2fe,#bae6fd); color:#0ea5e9; display:grid; place-items:center; font-size:0.85rem; font-weight:800; flex-shrink:0; }
.lg-section h3 { font-size:1rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; margin:16px 0 8px; }
.lg-section p { font-size:0.94rem; color:#475569; line-height:1.7; margin:0 0 12px; }
.lg-section ul { padding-left:20px; margin:0 0 12px; }
.lg-section ul li { font-size:0.94rem; color:#475569; line-height:1.7; margin-bottom:6px; }
.lg-section a { color:#0ea5e9; font-weight:600; text-decoration:none; }
.lg-section a:hover { text-decoration:underline; }
.lg-callout { margin:16px 0; padding:16px 18px; background:#f0f9ff; border-left:3px solid #0ea5e9; border-radius:8px; }
.lg-callout p { margin:0; color:#334155; font-size:0.9rem; }
</style>

<main id="main">
<section class="lg-page">
  <div class="container">
    <div class="lg-hero">
      <span class="kicker kicker--pill"><i></i>LEGAL &middot; DISCLAIMER</span>
      <h1>General <span class="g">Disclaimer</span></h1>
      <p>How to read the information, recommendations and materials Nubevest publishes across our website, blog, events and communications.</p>
      <div class="lg-meta"><i></i>Last updated <?= date('F Y') ?></div>
    </div>

    <div class="lg-wrap">
      <aside class="lg-toc" aria-label="On this page">
        <div class="lg-toc__t">On this page</div>
        <a href="#general"><span>1</span>General information only</a>
        <a href="#advice"><span>2</span>Not professional advice</a>
        <a href="#accuracy"><span>3</span>Accuracy &amp; currency</a>
        <a href="#external"><span>4</span>External links &amp; third parties</a>
        <a href="#brands"><span>5</span>Nubevest brands &amp; services</a>
        <a href="#testimonials"><span>6</span>Testimonials &amp; case studies</a>
        <a href="#liability"><span>7</span>Limitation of liability</a>
        <a href="#changes"><span>8</span>Changes to this disclaimer</a>
      </aside>

      <div class="lg-content">
        <div class="lg-section" id="general">
          <h2><span class="n">1</span>General information only</h2>
          <p>The content published on nubevest.com.au &mdash; including articles, guides, case studies, event material, downloadable resources and social posts &mdash; is provided for general information and educational purposes. It is not intended as a substitute for tailored professional advice.</p>
        </div>

        <div class="lg-section" id="advice">
          <h2><span class="n">2</span>Not professional advice</h2>
          <p>Nothing on this website constitutes legal, financial, tax, accounting, medical, migration, NDIS compliance or investment advice. Before acting on any information you read here, you should:</p>
          <ul>
            <li>Consider whether it applies to your specific circumstances.</li>
            <li>Seek advice from a suitably qualified and licensed professional.</li>
            <li>Check the current position with the relevant regulator or authority.</li>
          </ul>
          <div class="lg-callout"><p>Where a Nubevest team member provides recommendations as part of a paid engagement, those recommendations are governed by the specific engagement letter or statement of work &mdash; not by content on this website.</p></div>
        </div>

        <div class="lg-section" id="accuracy">
          <h2><span class="n">3</span>Accuracy &amp; currency</h2>
          <p>Nubevest takes reasonable care to make sure information published on this website is accurate at the time of publication. However:</p>
          <ul>
            <li>Regulations, technologies, pricing and best practice change &mdash; older content may no longer reflect the current position.</li>
            <li>We do not warrant that content is complete, error-free or suitable for any particular purpose.</li>
            <li>Nubevest may add, amend or remove content at any time without notice.</li>
          </ul>
        </div>

        <div class="lg-section" id="external">
          <h2><span class="n">4</span>External links &amp; third parties</h2>
          <p>This site links to third-party websites, tools and platforms (including Eventbrite, LinkedIn, YouTube and vendor documentation). We include these links for convenience only. Nubevest does not endorse and is not responsible for the content, availability, pricing or practices of third-party sites.</p>
          <p>Any dealings you have with a third party through a link from this site are strictly between you and that third party.</p>
        </div>

        <div class="lg-section" id="brands">
          <h2><span class="n">5</span>Nubevest brands &amp; services</h2>
          <p>Nubevest operates a number of platforms, service brands and specialist Nubevest businesses &mdash; including Plannor, GoMeta CRM, MetaMeet, Monitormart, Workers Australia and Nubevest Events. Each is a Nubevest platform, service brand or business owned or operated by Nubevest Pty Ltd. They are not separate companies unless expressly stated on the relevant page.</p>
          <p>References to a Nubevest brand on this site refer to that Nubevest offering, not to any similarly named unaffiliated business.</p>
        </div>

        <div class="lg-section" id="testimonials">
          <h2><span class="n">6</span>Testimonials &amp; case studies</h2>
          <p>Testimonials, quotes, results and case studies represent the experience of specific clients at a specific time. Individual results depend on many factors and are not a guarantee of what your business will experience.</p>
          <p>Where a case study includes commercial figures, they are shared with the client&rsquo;s permission and rounded for confidentiality.</p>
        </div>

        <div class="lg-section" id="liability">
          <h2><span class="n">7</span>Limitation of liability</h2>
          <p>To the maximum extent permitted by law, Nubevest Pty Ltd, its directors, employees and contractors are not liable for any loss, damage, cost or expense &mdash; direct, indirect or consequential &mdash; arising from your use of, or reliance on, information published on this website.</p>
          <p>Nothing in this disclaimer excludes any guarantees, rights or remedies that cannot be excluded under the Australian Consumer Law.</p>
        </div>

        <div class="lg-section" id="changes">
          <h2><span class="n">8</span>Changes to this disclaimer</h2>
          <p>Nubevest may update this disclaimer from time to time. The version shown on this page always applies. If a change is significant, we&rsquo;ll note it near the top of the page.</p>
          <p>See also our <a href="/privacy-policy.php">Privacy Policy</a>, <a href="/terms-of-use.php">Website &amp; Service Terms</a> and <a href="/event-terms.php">Event Terms</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
