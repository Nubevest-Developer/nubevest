<!-- FOOTER v3 (matches mockup) -->
<footer class="footer footer--v3" role="contentinfo">
  <div class="container">

    <!-- CTA BANNER (a page can hide it with $footer_cta = false) -->
    <?php if ($footer_cta ?? true): ?>
    <div class="fv3-cta">
      <div class="fv3-cta__bg" aria-hidden="true">
        <span class="fv3-cta__arc fv3-cta__arc--1"></span>
        <span class="fv3-cta__arc fv3-cta__arc--2"></span>
      </div>
      <div class="fv3-cta__inner">
        <div class="fv3-cta__ico">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
            <path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H9l-5 4V6z" stroke="#60a5fa" stroke-width="1.8" stroke-linejoin="round"/>
          </svg>
        </div>
        <div class="fv3-cta__text">
          <h3 class="fv3-cta__title">One partner for growth, technology <span class="fv3-cta__title-grad">and operations.</span></h3>
          <p class="fv3-cta__sub">Tell us where the business is losing time, opportunities or confidence &mdash; we&rsquo;ll recommend a practical starting point.</p>
        </div>
        <a href="/contact.php" class="fv3-cta__btn">
          <span class="fv3-cta__btn-ico">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <span>Book a Call</span>
        </a>
      </div>
    </div>
    <?php endif; ?>

    <!-- TOP -->
    <div class="fv3__top">

      <!-- Brand block -->
      <div class="fv3__brand">
        <a href="/" class="fv3__logo" aria-label="Nubevest">
          <img src="/assets/images/nubevest-logo.png" alt="Nubevest">
        </a>
        <p class="fv3__desc">Nubevest is a Melbourne-founded business growth and technology company. Our services, platforms and specialist businesses work together through one clear Nubevest relationship.</p>

        <div class="fv3__contact">
          <a href="tel:1300959514" class="fv3__contact-row">
            <span class="fv3__contact-ico">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 5h3l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v3a2 2 0 0 1-2 2A16 16 0 0 1 3 7a2 2 0 0 1 2-2z" stroke="#60a5fa" stroke-width="1.8" stroke-linejoin="round"/></svg>
            </span>
            <span>1300 959 514</span>
          </a>
          <a href="mailto:info@nubevest.com.au" class="fv3__contact-row">
            <span class="fv3__contact-ico">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="#60a5fa" stroke-width="1.8"/><path d="M4 7l8 6 8-6" stroke="#60a5fa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span>info@nubevest.com.au</span>
          </a>
          <div class="fv3__contact-row fv3__contact-row--addr">
            <span class="fv3__contact-ico">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 22s7-6 7-12a7 7 0 0 0-14 0c0 6 7 12 7 12z" stroke="#60a5fa" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.4" stroke="#60a5fa" stroke-width="1.8"/></svg>
            </span>
            <span>Unit 112/43 Danaher Drive,<br>South Morang VIC 3752</span>
          </div>
        </div>
      </div>

      <!-- Nav columns -->
      <div class="fv3__nav">
        <div class="fv3__col">
          <h4 class="fv3__h">Services</h4>
          <ul class="fv3__list">
            <li><a href="/websites.php">Website Packages</a></li>
            <li><a href="/websites.php#care">Website Care</a></li>
            <li><a href="/marketing.php">Marketing &amp; SEO</a></li>
            <li><a href="/marketing.php#consultation">Consultation</a></li>
            <li><a href="/print-signage/">Design &amp; Print</a></li>
            <li><a href="/solutions/software-apps.php">Software &amp; Apps</a></li>
            <li><a href="/solutions/crm-automation-ai.php">CRM &amp; Automation</a></li>
            <li><a href="/solutions/managed-it-cloud-cybersecurity.php">Managed IT</a></li>
          </ul>
        </div>

        <div class="fv3__col">
          <h4 class="fv3__h">Our Brands</h4>
          <ul class="fv3__list fv3__list--brands">
            <li><a href="/brands/plannor.php"><span class="fv3__b-name">Plannor</span><span class="fv3__b-sub">NDIS provider platform</span></a></li>
            <li><a href="/brands/gometa-crm.php"><span class="fv3__b-name">Go Meta CRM</span><span class="fv3__b-sub">Leads &amp; workflow platform</span></a></li>
            <li><a href="/brands/ndis-pages.php"><span class="fv3__b-name">NDIS Pages</span><span class="fv3__b-sub">Provider discovery &mdash; in development</span></a></li>
            <li><a href="/brands/metameet.php"><span class="fv3__b-name">MetaMeet</span><span class="fv3__b-sub">Domains, hosting, email &amp; SSL</span></a></li>
            <li><a href="/brands/monitormart.php"><span class="fv3__b-name">MonitorMart</span><span class="fv3__b-sub">Hardware &amp; procurement</span></a></li>
          </ul>
        </div>

        <div class="fv3__col">
          <h4 class="fv3__h">Specialist Businesses</h4>
          <ul class="fv3__list fv3__list--brands">
            <li><a href="/brands/skill-to-upskill.php"><span class="fv3__b-name">Skill to Upskill</span><span class="fv3__b-sub">Education &amp; RPL pathways</span></a></li>
            <li><a href="/brands/kangar-dubai-experts.php"><span class="fv3__b-name">Kangar Dubai Experts</span><span class="fv3__b-sub">Dubai property guidance</span></a></li>
            <li><a href="/brands/nuber.php"><span class="fv3__b-name">Nube Rentals</span><span class="fv3__b-sub">Long-term vehicle rentals</span></a></li>
          </ul>
        </div>

        <div class="fv3__col">
          <h4 class="fv3__h">Company</h4>
          <ul class="fv3__list">
            <li><a href="/about.php">About</a></li>
            <li><a href="/industries/">Industries</a></li>
            <li><a href="/work.php">Our Work</a></li>
            <li><a href="/portfolio.php">Portfolio</a></li>
            <li><a href="/events.php">Events</a></li>
            <li><a href="/licences-business-info.php">Licences &amp; Info</a></li>
            <li><a href="/contact.php">Contact</a></li>
            <li><a href="/contact.php#support">Client Support</a></li>
            <li><a href="/assets/docs/Nubevest_Services_Pricing.pdf" target="_blank">View Our Services &amp; Pricing</a></li>
          </ul>
        </div>

        <div class="fv3__col">
          <h4 class="fv3__h">Insights &amp; Resources</h4>
          <ul class="fv3__list">
            <li><a href="/solutions/digital-growth.php">Business Growth</a></li>
            <li><a href="/solutions/websites-ecommerce.php">Websites &amp; Digital Marketing</a></li>
            <li><a href="/solutions/crm-automation-ai.php">CRM, Automation &amp; AI</a></li>
            <li><a href="/solutions/managed-it-cloud-cybersecurity.php">Managed IT &amp; Cybersecurity</a></li>
            <li><a href="/industries/ndis-providers.php">NDIS Business</a></li>
            <li><a href="/solutions/">Guides &amp; Downloads</a></li>
            <li><a href="/contact.php">FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- BOTTOM -->
    <div class="fv3__bottom">
      <div class="fv3__legal">
        <a href="/privacy-policy.php">Privacy Policy</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/terms-of-use.php">Website Terms</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/terms-of-use.php#services">Service Terms</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/event-terms.php">Event Terms &amp; Cancellation</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/disclaimer.php">Disclaimer</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/privacy-policy.php#cookies">Cookies</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/privacy-policy.php#accessibility">Accessibility</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/privacy-policy.php#security">Security</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/contact.php#complaints">Complaints</a>
        <span class="fv3__legal-sep">&middot;</span>
        <a href="/sitemap.php">Sitemap</a>
      </div>
      <div class="fv3__meta">
        <p class="fv3__copy">&copy; <?= date('Y') ?> <strong>Nubevest Pty Ltd</strong>. All rights reserved.</p>
        <div class="fv3__social">
        <a href="https://www.linkedin.com/company/nubevest/" target="_blank" rel="noopener" aria-label="LinkedIn">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM10 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.77 2.65 4.77 6.1V21h-4v-5.4c0-1.3-.02-2.97-1.8-2.97-1.82 0-2.1 1.42-2.1 2.88V21H10z"/></svg>
        </a>
        <a href="https://www.facebook.com/NubevestAus" target="_blank" rel="noopener" aria-label="Facebook">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M13 22v-8h3l.5-4H13V7.5c0-1.15.32-1.94 2-1.94h2V2.14A29 29 0 0 0 14.24 2C11.24 2 9.5 3.66 9.5 6.7V10H6.5v4h3v8z"/></svg>
        </a>
        <a href="https://www.instagram.com/nubevest/" target="_blank" rel="noopener" aria-label="Instagram">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.8"/><circle cx="17.5" cy="6.5" r="1.1" fill="currentColor"/></svg>
        </a>
        <a href="https://www.youtube.com/@nubevest" target="_blank" rel="noopener" aria-label="YouTube">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M21.6 7.2a2.5 2.5 0 0 0-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.4A2.5 2.5 0 0 0 2.4 7.2 26 26 0 0 0 2 12a26 26 0 0 0 .4 4.8 2.5 2.5 0 0 0 1.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.4a2.5 2.5 0 0 0 1.8-1.8A26 26 0 0 0 22 12a26 26 0 0 0-.4-4.8zM10 15V9l5.2 3-5.2 3z"/></svg>
        </a>
      </div>
      </div>
    </div>
  </div>
</footer>


<script src="/assets/js/main.js"></script>

<!-- Nubi — AI chatbot -->
<link rel="stylesheet" href="/assets/css/chatbot.css">
<script>window.NV_BASE = <?= json_encode(defined('BASE_URL') ? BASE_URL : '') ?>;</script>
<script src="/assets/js/chatbot.js" defer></script>
</body>
</html>
