<?php
$page = 'legal';
$seo_title = 'Event Terms & Cancellation Policy | Nubevest Events';
$meta_desc = 'The terms, ticketing and cancellation policy that apply to events run by Nubevest Events, a Nubevest Pty Ltd service.';
include 'includes/header.php';
?>

<style>
.lg-page { padding: 60px 0 60px; position:relative; background: linear-gradient(180deg,#faf9ff 0%, #ffffff 60%); }
.lg-hero { text-align:center; max-width:820px; margin: 0 auto 44px; }
.lg-hero .kicker { margin-bottom:16px; }
.lg-hero h1 { font-size: clamp(2rem, 3.4vw, 2.8rem); font-weight:800; color:#0f172a; letter-spacing:-0.025em; margin: 0 0 14px; line-height:1.15; }
.lg-hero h1 .g { background: linear-gradient(90deg,#7c3aed,#2563eb); -webkit-background-clip:text; background-clip:text; color:transparent; }
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
.lg-content::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; background: linear-gradient(90deg,#7c3aed 0%, #2563eb 50%, #10b981 100%); }
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
.lg-callout { margin:16px 0; padding:16px 18px; background:#f5f3ff; border-left:3px solid #7c3aed; border-radius:8px; }
.lg-callout p { margin:0; color:#334155; font-size:0.9rem; }
</style>

<main id="main">
<section class="lg-page">
  <div class="container">
    <div class="lg-hero">
      <span class="kicker kicker--pill"><i></i>NUBEVEST EVENTS &middot; LEGAL</span>
      <h1>Event Terms &amp; <span class="g">Cancellation Policy</span></h1>
      <p>These terms apply to tickets, registrations and attendance for events run by Nubevest Events &mdash; a service of Nubevest Pty Ltd.</p>
      <div class="lg-meta"><i></i>Last updated <?= date('F Y') ?></div>
    </div>

    <div class="lg-wrap">
      <aside class="lg-toc" aria-label="On this page">
        <div class="lg-toc__t">On this page</div>
        <a href="#tickets"><span>1</span>Tickets &amp; registration</a>
        <a href="#cancel-attendee"><span>2</span>Attendee cancellations &amp; refunds</a>
        <a href="#cancel-nubevest"><span>3</span>Cancellation or reschedule by Nubevest</a>
        <a href="#transfer"><span>4</span>Transferring your ticket</a>
        <a href="#conduct"><span>5</span>Conduct at events</a>
        <a href="#media"><span>6</span>Photography, video &amp; recording</a>
        <a href="#liability"><span>7</span>Liability &amp; force majeure</a>
        <a href="#contact"><span>8</span>Contact us</a>
      </aside>

      <div class="lg-content">
        <div class="lg-section" id="tickets">
          <h2><span class="n">1</span>Tickets &amp; registration</h2>
          <p>All bookings for Nubevest events are processed through Eventbrite. When you register, you agree to Eventbrite&rsquo;s own terms in addition to these terms.</p>
          <ul>
            <li>A registration is confirmed only after payment (where a fee applies) has been received and Eventbrite has issued a ticket.</li>
            <li>Tickets are personal to the named attendee and may not be resold for profit.</li>
            <li>Ticket prices are shown in Australian Dollars (AUD) and include GST unless otherwise stated.</li>
          </ul>
        </div>

        <div class="lg-section" id="cancel-attendee">
          <h2><span class="n">2</span>Attendee cancellations &amp; refunds</h2>
          <p>If you can no longer attend, please cancel through your Eventbrite account so the seat can be released.</p>
          <ul>
            <li><strong>More than 7 days before the event:</strong> full refund of any paid ticket, less any Eventbrite processing fees.</li>
            <li><strong>Between 7 days and 48 hours before the event:</strong> 50% refund of any paid ticket, less processing fees.</li>
            <li><strong>Within 48 hours of the event, or no-show:</strong> no refund is available.</li>
            <li>Free events cannot be refunded but should still be cancelled through Eventbrite so waitlisted attendees can be admitted.</li>
          </ul>
          <div class="lg-callout"><p>Refunds are returned to the original payment method within 5&ndash;10 business days of approval.</p></div>
        </div>

        <div class="lg-section" id="cancel-nubevest">
          <h2><span class="n">3</span>Cancellation or reschedule by Nubevest</h2>
          <p>Occasionally an event may need to be cancelled, postponed or moved online due to speaker availability, venue issues, low registrations, weather, public-health requirements or other circumstances outside our reasonable control.</p>
          <ul>
            <li>If Nubevest cancels an event outright, paid tickets are refunded in full.</li>
            <li>If Nubevest reschedules or moves an event online, your ticket automatically applies to the new date or format. If you cannot attend the new arrangement, contact us for a full refund of any paid ticket.</li>
            <li>Nubevest is not responsible for travel, accommodation or other costs incurred to attend a cancelled or rescheduled event.</li>
          </ul>
        </div>

        <div class="lg-section" id="transfer">
          <h2><span class="n">4</span>Transferring your ticket</h2>
          <p>You may transfer your registration to a colleague. Please update the attendee name in Eventbrite, or email us at <a href="mailto:events@nubevest.com.au">events@nubevest.com.au</a> at least 24 hours before the event with the new attendee&rsquo;s name, email and mobile.</p>
        </div>

        <div class="lg-section" id="conduct">
          <h2><span class="n">5</span>Conduct at events</h2>
          <p>Nubevest events are professional, inclusive spaces. Attendees agree to:</p>
          <ul>
            <li>Treat other attendees, speakers, staff and venue teams with respect.</li>
            <li>Follow venue rules, safety directions and any COVID-safe or public-health guidance in force.</li>
            <li>Refrain from harassment, discrimination or disruptive behaviour.</li>
            <li>Not distribute unsolicited marketing material or record sessions without approval.</li>
          </ul>
          <p>Nubevest reserves the right to remove any attendee who breaches these expectations, without refund.</p>
        </div>

        <div class="lg-section" id="media">
          <h2><span class="n">6</span>Photography, video &amp; recording</h2>
          <p>Nubevest and its partners may photograph or record events for use in marketing, social media, recap videos and future promotional material. By attending, you consent to appearing in general audience footage.</p>
          <p>If you would prefer not to be featured, please let a Nubevest team member know on the day and we&rsquo;ll do our best to avoid capturing you in identifiable footage. To have existing footage of you removed, email <a href="mailto:events@nubevest.com.au">events@nubevest.com.au</a>.</p>
        </div>

        <div class="lg-section" id="liability">
          <h2><span class="n">7</span>Liability &amp; force majeure</h2>
          <p>To the maximum extent permitted by law, Nubevest&rsquo;s liability in connection with an event is limited to a refund of the ticket price paid.</p>
          <p>Nubevest is not liable for delays, cancellations or losses caused by events outside our reasonable control, including natural disasters, illness, industrial action, government orders, venue failures or transport disruption.</p>
          <p>Nothing in these terms excludes any guarantees, rights or remedies that cannot be excluded under the Australian Consumer Law.</p>
        </div>

        <div class="lg-section" id="contact">
          <h2><span class="n">8</span>Contact us</h2>
          <p>Questions about a registration, refund or an event you attended?</p>
          <ul>
            <li>Email: <a href="mailto:events@nubevest.com.au">events@nubevest.com.au</a></li>
            <li>Phone: <a href="tel:1300959514">1300 959 514</a></li>
            <li>Post: Nubevest Pty Ltd, Australia</li>
          </ul>
          <p>See also our <a href="/privacy-policy.php">Privacy Policy</a>, <a href="/terms-of-use.php">Website Terms</a> and <a href="/disclaimer.php">Disclaimer</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
