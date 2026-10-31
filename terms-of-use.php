<?php
$page = 'legal';
$seo_title = 'Terms of Use | Nubevest';
$meta_desc = 'The terms and conditions that apply when you use the Nubevest website, services and communications.';
include 'includes/header.php';
?>

<style>
.lg-page { padding: 60px 0 60px; position:relative; background: linear-gradient(180deg,#faf9ff 0%, #ffffff 60%); }
.lg-hero { text-align:center; max-width:820px; margin: 0 auto 44px; }
.lg-hero .kicker { margin-bottom:16px; }
.lg-hero h1 { font-size: clamp(2rem, 3.4vw, 2.8rem); font-weight:800; color:#0f172a; letter-spacing:-0.025em; margin: 0 0 14px; line-height:1.15; }
.lg-hero h1 .g { background: linear-gradient(90deg,#3b82f6,#7c3aed); -webkit-background-clip:text; background-clip:text; color:transparent; }
.lg-hero p { font-size:1.02rem; color:#64748b; line-height:1.6; margin:0; }
.lg-meta { display:inline-flex; align-items:center; gap:8px; margin-top:18px; padding:8px 16px; background:#fff; border:1px solid #eef1f5; border-radius:999px; font-size:0.82rem; color:#334155; font-weight:600; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.1); }
.lg-meta i { width:6px; height:6px; border-radius:50%; background:#10b981; }

.lg-wrap { display:grid; grid-template-columns: 260px minmax(0, 1fr); gap:40px; align-items:start; max-width:1080px; margin:0 auto; }
@media (max-width: 900px){ .lg-wrap { grid-template-columns: 1fr; gap:20px; } }

.lg-toc { position:sticky; top:100px; background:#fff; border:1px solid #eef1f5; border-radius:16px; padding:18px; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.08); }
@media (max-width: 900px){ .lg-toc { position:static; } }
.lg-toc__t { font-size:0.72rem; font-weight:800; letter-spacing:0.1em; text-transform:uppercase; color:#2563eb; margin-bottom:12px; }
.lg-toc a { display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; text-decoration:none; color:#475569; font-size:0.88rem; font-weight:600; transition: background 0.2s ease, color 0.2s ease; }
.lg-toc a:hover { background:#eff6ff; color:#2563eb; }
.lg-toc a span { width:20px; height:20px; border-radius:6px; background:#f1f5f9; color:#2563eb; display:grid; place-items:center; font-size:0.7rem; font-weight:800; flex-shrink:0; }

.lg-content { background:#fff; border:1px solid #eef1f5; border-radius:20px; padding:40px; box-shadow: 0 20px 40px -25px rgba(15,23,42,0.08); position:relative; overflow:hidden; }
.lg-content::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; background: linear-gradient(90deg,#3b82f6 0%, #7c3aed 50%, #10b981 100%); }
.lg-section { padding-top:12px; margin-bottom:32px; scroll-margin-top:100px; }
.lg-section:last-child { margin-bottom:0; }
.lg-section h2 { font-size:1.35rem; font-weight:800; color:#0f172a; letter-spacing:-0.02em; margin:0 0 14px; display:flex; align-items:center; gap:12px; }
.lg-section h2 .n { width:32px; height:32px; border-radius:10px; background: linear-gradient(135deg,#dbeafe,#bfdbfe); color:#2563eb; display:grid; place-items:center; font-size:0.85rem; font-weight:800; flex-shrink:0; }
.lg-section h3 { font-size:1rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; margin:16px 0 8px; }
.lg-section p { font-size:0.94rem; color:#475569; line-height:1.7; margin:0 0 12px; }
.lg-section ul { padding-left:20px; margin:0 0 12px; }
.lg-section ul li { font-size:0.94rem; color:#475569; line-height:1.7; margin-bottom:6px; }
.lg-section a { color:#2563eb; font-weight:600; text-decoration:none; }
.lg-section a:hover { text-decoration:underline; }

.lg-cta { margin-top:44px; background: linear-gradient(135deg,#2563eb 0%, #1d4ed8 100%); border-radius:20px; padding:32px; color:#fff; display:grid; grid-template-columns: 1fr auto; gap:20px; align-items:center; box-shadow: 0 30px 60px -20px rgba(37,99,235,0.4); }
@media (max-width: 640px){ .lg-cta { grid-template-columns: 1fr; } }
.lg-cta h3 { margin:0 0 6px; font-size:1.2rem; font-weight:800; letter-spacing:-0.01em; }
.lg-cta p { margin:0; color: rgba(255,255,255,0.85); font-size:0.9rem; line-height:1.55; }
.lg-cta a { display:inline-flex; align-items:center; gap:8px; padding:12px 22px; background:#fff; color:#2563eb; border-radius:10px; font-weight:800; text-decoration:none; box-shadow: 0 12px 24px -8px rgba(15,23,42,0.3); transition: transform 0.2s ease; }
.lg-cta a:hover { transform: translateY(-2px); }
</style>

<main id="main">
<section class="lg-page">
  <div class="container">

    <div class="lg-hero reveal">
      <span class="kicker kicker--pill"><i></i>LEGAL &middot; TERMS</span>
      <h1>Terms of <span class="g">Use</span></h1>
      <p>The terms and conditions that apply when you use the Nubevest website, services, platforms and communications.</p>
      <div class="lg-meta"><i></i>Last updated: 27 August 2026</div>
    </div>

    <div class="lg-wrap">

      <aside class="lg-toc">
        <div class="lg-toc__t">On this page</div>
        <a href="#s1"><span>1</span>Acceptance of terms</a>
        <a href="#s2"><span>2</span>Use of the website</a>
        <a href="#s3"><span>3</span>Intellectual property</a>
        <a href="#s4"><span>4</span>Services &amp; scope</a>
        <a href="#s5"><span>5</span>Third-party links</a>
        <a href="#s6"><span>6</span>Disclaimers</a>
        <a href="#s7"><span>7</span>Liability</a>
        <a href="#s8"><span>8</span>Governing law</a>
      </aside>

      <div class="lg-content">

        <section class="lg-section" id="s1">
          <h2><span class="n">1</span>Acceptance of terms</h2>
          <p>These Terms of Use govern your access to and use of the Nubevest website located at nubevest.com.au and related sub-brands operated by Nubevest Pty Ltd (&ldquo;Nubevest&rdquo;, &ldquo;we&rdquo;, &ldquo;us&rdquo;).</p>
          <p>By accessing or using the website, you agree to be bound by these terms. If you do not accept them, please do not use the website.</p>
          <p>We may update these terms from time to time. Continued use of the website after changes means you accept the updated terms.</p>
        </section>

        <section class="lg-section" id="s2">
          <h2><span class="n">2</span>Use of the website</h2>
          <p>You agree to use the website in a lawful manner and only for legitimate purposes. In particular, you must not:</p>
          <ul>
            <li>Attempt to gain unauthorised access to any part of the website, its systems or connected networks.</li>
            <li>Use the website in any way that could damage, disable, overburden or impair it.</li>
            <li>Introduce viruses, trojans, worms or other malicious code.</li>
            <li>Copy, distribute, sell or exploit any content from the website without written permission.</li>
            <li>Use automated systems (scrapers, bots, spiders) to access the website without our consent.</li>
          </ul>
        </section>

        <section class="lg-section" id="s3">
          <h2><span class="n">3</span>Intellectual property</h2>
          <p>All content on this website &mdash; including text, graphics, logos, icons, images, videos, software and design &mdash; is owned by or licensed to Nubevest and is protected by Australian and international copyright and trade mark laws.</p>
          <p>You may view and print material from the website for personal, non-commercial use, provided you do not modify it or remove any copyright, trade mark or other proprietary notices.</p>
          <p>The Nubevest name, logo and associated brand marks (including Plannor, Go Meta, MonitorMart, MetaMeet and other Nubevest brands) are trade marks or registered trade marks of Nubevest and may not be used without written permission.</p>
        </section>

        <section class="lg-section" id="s4">
          <h2><span class="n">4</span>Services &amp; scope</h2>
          <p>Information about our services on this website is general in nature and is provided for informational purposes only. It does not constitute a service agreement, quotation or binding offer.</p>
          <p>Specific engagements are subject to a separate written proposal or service agreement setting out the scope, deliverables, responsibilities, timing and commercial terms. Nothing on this website should be interpreted as guaranteeing a particular outcome, ranking, lead volume or commercial result.</p>
        </section>

        <section class="lg-section" id="s5">
          <h2><span class="n">5</span>Third-party links &amp; content</h2>
          <p>The website may contain links to third-party websites, platforms and services (including our sub-brands and partners). These links are provided for convenience only and do not imply endorsement.</p>
          <p>We are not responsible for the content, availability, privacy practices or terms of any third-party site. Your use of third-party sites is at your own risk and subject to the terms of those sites.</p>
        </section>

        <section class="lg-section" id="s6">
          <h2><span class="n">6</span>Disclaimers</h2>
          <p>The website and its content are provided &ldquo;as is&rdquo; and &ldquo;as available&rdquo; without warranty of any kind, express or implied, including warranties of merchantability, fitness for a particular purpose or non-infringement.</p>
          <p>We do not warrant that the website will be uninterrupted, error-free, secure or free of viruses, or that the information on it is complete, accurate or current at all times.</p>
        </section>

        <section class="lg-section" id="s7">
          <h2><span class="n">7</span>Limitation of liability</h2>
          <p>To the maximum extent permitted by law, Nubevest is not liable for any indirect, incidental, special, consequential or punitive damages arising out of your use of, or inability to use, this website or its content.</p>
          <p>Nothing in these terms excludes, restricts or modifies any consumer guarantee, right or remedy that cannot be lawfully excluded under the Australian Consumer Law or other applicable legislation.</p>
        </section>

        <section class="lg-section" id="s8">
          <h2><span class="n">8</span>Governing law</h2>
          <p>These Terms of Use are governed by the laws of Victoria, Australia. You submit to the exclusive jurisdiction of the courts of Victoria and the Commonwealth of Australia for any dispute arising out of or in connection with these terms or the website.</p>
          <p>For any questions about these Terms of Use, please contact us at <a href="mailto:info@nubevest.com.au">info@nubevest.com.au</a> or on <a href="tel:1300959514">1300 959 514</a>.</p>
        </section>

        <div class="lg-cta">
          <div>
            <h3>Need to talk through a service agreement?</h3>
            <p>Our team can walk you through scope, terms and deliverables.</p>
          </div>
          <a href="/contact.php">Contact Us
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
