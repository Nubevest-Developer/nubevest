<?php
$page = 'legal';
$seo_title = 'Privacy Policy | Nubevest';
$meta_desc = 'How Nubevest collects, uses, stores and protects personal information across our websites, services and business operations.';
include 'includes/header.php';
?>

<style>
.lg-page { padding: 60px 0 60px; position:relative; background: linear-gradient(180deg,#faf9ff 0%, #ffffff 60%); }
.lg-hero { text-align:center; max-width:820px; margin: 0 auto 44px; }
.lg-hero .kicker { margin-bottom:16px; }
.lg-hero h1 { font-size: clamp(2rem, 3.4vw, 2.8rem); font-weight:800; color:#0f172a; letter-spacing:-0.025em; margin: 0 0 14px; line-height:1.15; }
.lg-hero h1 .g { background: linear-gradient(90deg,#7c3aed,#3b82f6); -webkit-background-clip:text; background-clip:text; color:transparent; }
.lg-hero p { font-size:1.02rem; color:#64748b; line-height:1.6; margin:0; }
.lg-meta { display:inline-flex; align-items:center; gap:8px; margin-top:18px; padding:8px 16px; background:#fff; border:1px solid #eef1f5; border-radius:999px; font-size:0.82rem; color:#334155; font-weight:600; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.1); }
.lg-meta i { width:6px; height:6px; border-radius:50%; background:#10b981; }

.lg-wrap { display:grid; grid-template-columns: 260px minmax(0, 1fr); gap:40px; align-items:start; max-width:1080px; margin:0 auto; }
@media (max-width: 900px){ .lg-wrap { grid-template-columns: 1fr; gap:20px; } }

.lg-toc { position:sticky; top:100px; background:#fff; border:1px solid #eef1f5; border-radius:16px; padding:18px; box-shadow: 0 8px 20px -12px rgba(15,23,42,0.08); }
@media (max-width: 900px){ .lg-toc { position:static; } }
.lg-toc__t { font-size:0.72rem; font-weight:800; letter-spacing:0.1em; text-transform:uppercase; color:#7c3aed; margin-bottom:12px; }
.lg-toc a { display:flex; align-items:center; gap:8px; padding:8px 10px; border-radius:8px; text-decoration:none; color:#475569; font-size:0.88rem; font-weight:600; transition: background 0.2s ease, color 0.2s ease; }
.lg-toc a:hover { background:#f5f3ff; color:#7c3aed; }
.lg-toc a span { width:20px; height:20px; border-radius:6px; background:#f1f5f9; color:#7c3aed; display:grid; place-items:center; font-size:0.7rem; font-weight:800; flex-shrink:0; }

.lg-content { background:#fff; border:1px solid #eef1f5; border-radius:20px; padding:40px; box-shadow: 0 20px 40px -25px rgba(15,23,42,0.08); position:relative; overflow:hidden; }
.lg-content::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; background: linear-gradient(90deg,#7c3aed 0%, #3b82f6 50%, #10b981 100%); }
.lg-section { padding-top:12px; margin-bottom:32px; scroll-margin-top:100px; }
.lg-section:last-child { margin-bottom:0; }
.lg-section h2 { font-size:1.35rem; font-weight:800; color:#0f172a; letter-spacing:-0.02em; margin:0 0 14px; display:flex; align-items:center; gap:12px; }
.lg-section h2 .n { width:32px; height:32px; border-radius:10px; background: linear-gradient(135deg,#ede9fe,#ddd6fe); color:#7c3aed; display:grid; place-items:center; font-size:0.85rem; font-weight:800; flex-shrink:0; }
.lg-section h3 { font-size:1rem; font-weight:800; color:#0f172a; letter-spacing:-0.01em; margin:16px 0 8px; }
.lg-section p { font-size:0.94rem; color:#475569; line-height:1.7; margin:0 0 12px; }
.lg-section ul { padding-left:20px; margin:0 0 12px; }
.lg-section ul li { font-size:0.94rem; color:#475569; line-height:1.7; margin-bottom:6px; }
.lg-section a { color:#7c3aed; font-weight:600; text-decoration:none; }
.lg-section a:hover { text-decoration:underline; }

.lg-cta { margin-top:44px; background: linear-gradient(135deg,#7c3aed 0%, #6d28d9 100%); border-radius:20px; padding:32px; color:#fff; display:grid; grid-template-columns: 1fr auto; gap:20px; align-items:center; box-shadow: 0 30px 60px -20px rgba(124,58,237,0.4); }
@media (max-width: 640px){ .lg-cta { grid-template-columns: 1fr; } }
.lg-cta h3 { margin:0 0 6px; font-size:1.2rem; font-weight:800; letter-spacing:-0.01em; }
.lg-cta p { margin:0; color: rgba(255,255,255,0.85); font-size:0.9rem; line-height:1.55; }
.lg-cta a { display:inline-flex; align-items:center; gap:8px; padding:12px 22px; background:#fff; color:#7c3aed; border-radius:10px; font-weight:800; text-decoration:none; box-shadow: 0 12px 24px -8px rgba(15,23,42,0.3); transition: transform 0.2s ease; }
.lg-cta a:hover { transform: translateY(-2px); }
</style>

<main id="main">
<section class="lg-page">
  <div class="container">

    <div class="lg-hero reveal">
      <span class="kicker kicker--pill"><i></i>LEGAL &middot; PRIVACY</span>
      <h1>Privacy <span class="g">Policy</span></h1>
      <p>How Nubevest collects, uses, stores and protects personal information across our websites, services and business operations.</p>
      <div class="lg-meta"><i></i>Last updated: 27 August 2026</div>
    </div>

    <div class="lg-wrap">

      <aside class="lg-toc">
        <div class="lg-toc__t">On this page</div>
        <a href="#s1"><span>1</span>About this policy</a>
        <a href="#s2"><span>2</span>Information we collect</a>
        <a href="#s3"><span>3</span>How we use it</a>
        <a href="#s4"><span>4</span>Sharing &amp; disclosure</a>
        <a href="#s5"><span>5</span>Cookies &amp; analytics</a>
        <a href="#s6"><span>6</span>Storage &amp; security</a>
        <a href="#s7"><span>7</span>Your rights</a>
        <a href="#s8"><span>8</span>Contact us</a>
      </aside>

      <div class="lg-content">

        <section class="lg-section" id="s1">
          <h2><span class="n">1</span>About this policy</h2>
          <p>Nubevest Pty Ltd (&ldquo;Nubevest&rdquo;, &ldquo;we&rdquo;, &ldquo;our&rdquo;, &ldquo;us&rdquo;) is committed to protecting the privacy of individuals we interact with through our websites, services, platforms and business operations.</p>
          <p>This Privacy Policy explains what personal information we collect, why we collect it, how we use and protect it, and the choices you have. It applies to information collected through nubevest.com.au, related sub-brands operated by Nubevest, and any interactions with our team.</p>
          <p>We handle personal information in accordance with the <em>Privacy Act 1988</em> (Cth) and the Australian Privacy Principles (APPs).</p>
        </section>

        <section class="lg-section" id="s2">
          <h2><span class="n">2</span>Information we collect</h2>
          <p>We only collect personal information that is reasonably necessary for our business functions. The kinds of information we may collect include:</p>
          <ul>
            <li><strong>Contact details</strong> &mdash; name, organisation, work email, phone number and postal address.</li>
            <li><strong>Enquiry content</strong> &mdash; the message, attachments and context you share when requesting information or support.</li>
            <li><strong>Account &amp; service data</strong> &mdash; records related to services we deliver, agreements, invoices and support requests.</li>
            <li><strong>Website usage data</strong> &mdash; IP address, device, browser, referring page and pages visited via cookies and analytics tools.</li>
            <li><strong>Marketing preferences</strong> &mdash; subscriptions, consent and interactions with our communications.</li>
          </ul>
          <p>We do not knowingly collect sensitive information unless it is directly relevant to a service and you have consented, or where required by law.</p>
        </section>

        <section class="lg-section" id="s3">
          <h2><span class="n">3</span>How we use your information</h2>
          <p>We use personal information to:</p>
          <ul>
            <li>Respond to enquiries and provide information about our services.</li>
            <li>Deliver, support and improve the services or platforms you engage us for.</li>
            <li>Send service updates, invoices and administrative communications.</li>
            <li>Send marketing communications where you have opted in &mdash; you can unsubscribe at any time.</li>
            <li>Meet legal, regulatory or contractual obligations.</li>
            <li>Improve our website and understand how visitors use it.</li>
          </ul>
        </section>

        <section class="lg-section" id="s4">
          <h2><span class="n">4</span>Sharing &amp; disclosure</h2>
          <p>We do not sell personal information. We may share information only with:</p>
          <ul>
            <li>Trusted service providers (hosting, cloud, CRM, payment, communications) who help us deliver our services under confidentiality obligations.</li>
            <li>Sub-brands and related entities within the Nubevest group where relevant to the service.</li>
            <li>Government, regulatory or law-enforcement authorities where required by law.</li>
          </ul>
          <p>Where information is transferred to service providers outside Australia, we take reasonable steps to ensure appropriate protections are in place.</p>
        </section>

        <section class="lg-section" id="s5">
          <h2><span class="n">5</span>Cookies &amp; analytics</h2>
          <p>Our website uses cookies and similar technologies to remember preferences, keep sessions active and understand how visitors use the site.</p>
          <p>We may use analytics platforms such as Google Analytics. These tools collect aggregate usage information which helps us improve the website. You can control cookies through your browser settings; disabling them may affect some features.</p>
        </section>

        <section class="lg-section" id="s6">
          <h2><span class="n">6</span>Storage &amp; security</h2>
          <p>We take reasonable steps to protect the information we hold from misuse, loss, unauthorised access, modification or disclosure. Measures include access controls, encryption in transit, secure hosting and staff training.</p>
          <p>No electronic transmission or storage system can be 100% secure. We hold personal information only for as long as it is required for the purpose it was collected, or for legal retention obligations, after which it is deleted or de-identified.</p>
        </section>

        <section class="lg-section" id="s7">
          <h2><span class="n">7</span>Your rights &amp; choices</h2>
          <p>You have the right to:</p>
          <ul>
            <li>Request access to the personal information we hold about you.</li>
            <li>Ask us to correct inaccurate or out-of-date information.</li>
            <li>Withdraw consent for marketing communications at any time.</li>
            <li>Raise a concern or complaint about how we handle your information.</li>
          </ul>
          <p>Please contact us using the details below to exercise any of these rights. We aim to respond within 30 days.</p>
        </section>

        <section class="lg-section" id="s8">
          <h2><span class="n">8</span>Contact us</h2>
          <p>For any questions, requests or complaints about this Privacy Policy or our handling of personal information, please contact:</p>
          <ul>
            <li><strong>Email:</strong> <a href="mailto:info@nubevest.com.au">info@nubevest.com.au</a></li>
            <li><strong>Phone:</strong> <a href="tel:1300959514">1300 959 514</a></li>
            <li><strong>Post:</strong> Unit 112/43 Danaher Drive, South Morang VIC 3752.</li>
          </ul>
          <p>If you are not satisfied with our response, you may lodge a complaint with the Office of the Australian Information Commissioner at <a href="https://www.oaic.gov.au" target="_blank" rel="noopener">oaic.gov.au</a>.</p>
        </section>

        <div class="lg-cta">
          <div>
            <h3>Questions about your data?</h3>
            <p>Reach out to our team &mdash; we&rsquo;ll respond within one business day.</p>
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
