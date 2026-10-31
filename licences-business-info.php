<?php
$page = 'licences';
$seo_title = 'Licences & Business Information | Nubevest';
$meta_desc = 'Nubevest Pty Ltd (ABN 32 645 344 378) — legal entity, group brand relationships, regulated scope disclosures and licence boundaries.';
include 'includes/header.php';
?>

<style>
:root {
  --lb-ink: #0f172a;
  --lb-muted: #475569;
  --lb-line: #e6e9f2;
  --lb-bg: #f8fafc;
  --lb-blue: #2563eb;
  --lb-blue-2: #6366f1;
}
.lb-page {
  padding: clamp(56px, 8vw, 96px) 0 clamp(48px, 7vw, 80px);
  background:
    radial-gradient(900px 400px at 0% 0%, #eef2ff 0%, transparent 55%),
    radial-gradient(900px 400px at 100% 100%, #ecfeff 0%, transparent 55%),
    linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
}
.lb-hero { max-width: 820px; margin: 0 auto 44px; text-align: center; }
.lb-hero__kicker {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 8px 16px 8px 12px;
  background: #fff; border: 1px solid var(--lb-line);
  border-radius: 999px;
  color: #334155;
  font-size: 0.7rem; font-weight: 800; letter-spacing: 0.16em;
  box-shadow: 0 6px 18px -10px rgba(15,23,42,0.18);
}
.lb-hero__kicker::before {
  content: ""; width: 8px; height: 8px; border-radius: 50%;
  background: linear-gradient(135deg, var(--lb-blue), var(--lb-blue-2));
  box-shadow: 0 0 0 4px rgba(59,130,246,0.12);
}
.lb-hero h1 {
  font-size: clamp(1.9rem, 3.6vw, 2.6rem);
  font-weight: 800; letter-spacing: -0.025em; line-height: 1.15;
  color: var(--lb-ink); margin: 20px 0 16px;
}
.lb-hero p { color: var(--lb-muted); font-size: 1.02rem; line-height: 1.65; margin: 0; }

.lb-grid {
  display: grid; gap: 20px;
  max-width: 1080px; margin: 0 auto;
}
.lb-card {
  background: #fff;
  border: 1px solid var(--lb-line);
  border-radius: 20px;
  padding: 28px 30px;
  box-shadow: 0 20px 44px -30px rgba(15,23,42,0.22);
}
.lb-card__head {
  display: flex; align-items: center; gap: 14px;
  padding-bottom: 18px;
  margin-bottom: 20px;
  border-bottom: 1px dashed var(--lb-line);
}
.lb-card__ico {
  width: 44px; height: 44px; border-radius: 12px;
  display: grid; place-items: center;
  background: linear-gradient(135deg, var(--lb-blue), var(--lb-blue-2));
  color: #fff;
  box-shadow: 0 10px 22px -10px rgba(37,99,235,0.55);
}
.lb-card__title { font-size: 1.15rem; font-weight: 800; letter-spacing: -0.01em; color: var(--lb-ink); margin: 0; }
.lb-card__sub { font-size: 0.82rem; color: var(--lb-muted); margin-top: 4px; }

.lb-table {
  width: 100%; border-collapse: collapse;
}
.lb-table th, .lb-table td {
  padding: 14px 14px;
  text-align: left;
  font-size: 0.92rem;
  border-bottom: 1px solid #f1f5f9;
  vertical-align: top;
}
.lb-table th {
  color: #64748b;
  font-weight: 700;
  font-size: 0.72rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  background: #f8fafc;
}
.lb-table tr:last-child td { border-bottom: 0; }
.lb-table .lb-name { color: var(--lb-ink); font-weight: 700; }

.lb-badge {
  display: inline-block;
  font-size: 0.66rem; font-weight: 800; letter-spacing: 0.06em;
  padding: 3px 9px;
  border-radius: 999px;
  text-transform: uppercase;
  white-space: nowrap;
}
.lb-badge--tech    { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }
.lb-badge--platform{ background: #f5f3ff; color: #5b21b6; border: 1px solid #ddd6fe; }
.lb-badge--business{ background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
.lb-badge--service { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }

.lb-note {
  padding: 14px 16px;
  border-radius: 12px;
  background: #fefce8;
  border: 1px dashed #fde68a;
  color: #713f12;
  font-size: 0.9rem;
  line-height: 1.55;
  margin-top: 16px;
}
.lb-note strong { color: #713f12; }

.lb-list { margin: 0; padding-left: 20px; }
.lb-list li { color: var(--lb-muted); font-size: 0.95rem; line-height: 1.7; margin-bottom: 6px; }
.lb-list li strong { color: var(--lb-ink); }

.lb-kv {
  display: grid;
  grid-template-columns: 200px 1fr;
  gap: 14px 24px;
  font-size: 0.95rem;
}
.lb-kv dt { color: #64748b; font-weight: 700; letter-spacing: 0.02em; }
.lb-kv dd { color: var(--lb-ink); margin: 0; }

@media (max-width: 640px) {
  .lb-card { padding: 24px 20px; }
  .lb-kv { grid-template-columns: 1fr; gap: 2px 0; }
  .lb-kv dd { margin-bottom: 10px; }
}
</style>

<main id="main">

<section class="lb-page">
  <div class="container">

    <div class="lb-hero reveal">
      <span class="lb-hero__kicker">TRUST &amp; DISCLOSURES</span>
      <h1>Licences &amp; Business Information</h1>
      <p>Nubevest is a Melbourne-founded business growth and technology company. This page lists the legal entity, the brands operating under it, and the scope boundaries that apply to regulated activities.</p>
    </div>

    <div class="lb-grid">

      <!-- LEGAL ENTITY -->
      <div class="lb-card reveal">
        <div class="lb-card__head">
          <span class="lb-card__ico">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <div>
            <h2 class="lb-card__title">Legal entity</h2>
            <div class="lb-card__sub">The contracting party for all Nubevest engagements.</div>
          </div>
        </div>
        <dl class="lb-kv">
          <dt>Registered name</dt><dd>Nubevest Pty Ltd</dd>
          <dt>ABN</dt><dd>32 645 344 378</dd>
          <dt>Jurisdiction</dt><dd>Australia (Victoria)</dd>
          <dt>Registered office</dt><dd>Unit 112/43 Danaher Drive, South Morang VIC 3752</dd>
          <dt>General enquiries</dt><dd><a href="tel:1300959514">1300 959 514</a> &middot; <a href="mailto:info@nubevest.com.au">info@nubevest.com.au</a></dd>
        </dl>
      </div>

      <!-- BRAND ARCHITECTURE -->
      <div class="lb-card reveal">
        <div class="lb-card__head">
          <span class="lb-card__ico">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M12 3v18M3 12h18" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="9" stroke="#fff" stroke-width="1.8"/></svg>
          </span>
          <div>
            <h2 class="lb-card__title">Brand architecture &amp; contracting party</h2>
            <div class="lb-card__sub">Every brand below operates under Nubevest Pty Ltd unless a separate entity is disclosed in the proposal.</div>
          </div>
        </div>
        <div style="overflow-x:auto;">
          <table class="lb-table">
            <thead>
              <tr>
                <th>Brand</th>
                <th>Classification</th>
                <th>Public endorsement</th>
                <th>Contracting entity</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="lb-name">MetaMeet</td>
                <td><span class="lb-badge lb-badge--tech">Technology service brand</span></td>
                <td>Powered and delivered by Nubevest</td>
                <td>Nubevest Pty Ltd</td>
              </tr>
              <tr>
                <td class="lb-name">Monitormart</td>
                <td><span class="lb-badge lb-badge--tech">Technology service brand</span></td>
                <td>Powered and delivered by Nubevest</td>
                <td>Nubevest Pty Ltd &middot; seller of record subject to verification</td>
              </tr>
              <tr>
                <td class="lb-name">Plannor</td>
                <td><span class="lb-badge lb-badge--platform">Platform</span></td>
                <td>A platform by Nubevest</td>
                <td>Nubevest Pty Ltd</td>
              </tr>
              <tr>
                <td class="lb-name">GoMeta CRM</td>
                <td><span class="lb-badge lb-badge--platform">Platform</span></td>
                <td>A platform by Nubevest</td>
                <td>Nubevest Pty Ltd</td>
              </tr>
              <tr>
                <td class="lb-name">NDIS Pages</td>
                <td><span class="lb-badge lb-badge--platform">Platform &mdash; pre-launch</span></td>
                <td>A platform by Nubevest</td>
                <td>Nubevest Pty Ltd</td>
              </tr>
              <tr>
                <td class="lb-name">Nubevest Events</td>
                <td><span class="lb-badge lb-badge--service">Nubevest service</span></td>
                <td>A Nubevest service &mdash; not a separate company</td>
                <td>Nubevest Pty Ltd</td>
              </tr>
              <tr>
                <td class="lb-name">Skill to Upskill</td>
                <td><span class="lb-badge lb-badge--business">Nubevest business</span></td>
                <td>A Nubevest business</td>
                <td>Part of the Nubevest network &mdash; entity confirmation pending</td>
              </tr>
              <tr>
                <td class="lb-name">Workers Australia</td>
                <td><span class="lb-badge lb-badge--business">Nubevest business</span></td>
                <td>A Nubevest business</td>
                <td>Part of the Nubevest network &mdash; licence details pending verification</td>
              </tr>
              <tr>
                <td class="lb-name">Kangar Dubai Experts</td>
                <td><span class="lb-badge lb-badge--business">Nubevest business</span></td>
                <td>A Nubevest business</td>
                <td>Contracted through the verified UAE-licensed entity disclosed in proposal</td>
              </tr>
              <tr>
                <td class="lb-name">NubeR &mdash; Long-Term Vehicle Rentals</td>
                <td><span class="lb-badge lb-badge--business">Nubevest business</span></td>
                <td>A Nubevest business</td>
                <td>Lessor disclosed in offer &mdash; entity confirmation pending</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- SCOPE BOUNDARIES -->
      <div class="lb-card reveal">
        <div class="lb-card__head">
          <span class="lb-card__ico">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M4 12l6 6 10-12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <div>
            <h2 class="lb-card__title">Scope &amp; regulatory boundaries</h2>
            <div class="lb-card__sub">What Nubevest and its associated businesses do &mdash; and where formal regulated authority sits with third parties.</div>
          </div>
        </div>

        <ul class="lb-list">
          <li><strong>NDIS.</strong> Nubevest supports NDIS providers with websites, digital growth, CRM/operations software and workforce services. Nubevest is not itself a registered NDIS provider unless separately disclosed. Participant-facing NDIS services are delivered by registered providers.</li>
          <li><strong>Education / RTO.</strong> Skill to Upskill helps individuals understand pathways, prepare evidence and engage with an appropriate Registered Training Organisation. Skill to Upskill is not itself an RTO, trainer, assessor or qualification issuer. Formal assessment and qualifications are controlled by the relevant RTO.</li>
          <li><strong>Recruitment &amp; workforce (Workers Australia).</strong> Where a labour-hire, migration or specialist workforce licence applies, the licence number, licensee, jurisdiction and scope will be published here and in the proposal after current primary-source verification.</li>
          <li><strong>Dubai property (Kangar Dubai Experts).</strong> Regulated real-estate activities are performed by the UAE-licensed contracting entity disclosed on invoices and agreements. A business name is not proof of a real-estate licence.</li>
          <li><strong>Long-term vehicle rentals (NubeR).</strong> Availability, eligibility, insurance, bond and rental terms are confirmed by the lessor before an offer is published. The lessor of record appears in the rental agreement.</li>
          <li><strong>Manufacturer relationships (Monitormart).</strong> Product references (for example Yealink and Logitech) are used only as product names. Manufacturer partner marks, authorised reseller badges and distributor status appear only after written verification.</li>
        </ul>

        <div class="lb-note">
          <strong>Accuracy commitment.</strong> Nubevest does not publish licence numbers, partner badges, guaranteed outcomes, review counts or performance metrics without current primary-source evidence. Where a detail is still being verified, this page and the associated proposal will say so explicitly.
        </div>
      </div>

      <!-- POLICIES -->
      <div class="lb-card reveal">
        <div class="lb-card__head">
          <span class="lb-card__ico">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M6 3h9l4 4v14H6z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/><path d="M15 3v4h4" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/></svg>
          </span>
          <div>
            <h2 class="lb-card__title">Policies &amp; terms</h2>
            <div class="lb-card__sub">The documents that govern how Nubevest handles data and engagements.</div>
          </div>
        </div>
        <ul class="lb-list">
          <li><a href="/privacy-policy.php"><strong>Privacy Policy</strong></a> &mdash; how Nubevest collects, uses and stores personal information.</li>
          <li><a href="/terms-of-use.php"><strong>Terms of Use</strong></a> &mdash; the conditions that apply when using this website and Nubevest services.</li>
          <li><a href="/sitemap.php"><strong>Sitemap</strong></a> &mdash; overview of pages on the Nubevest website.</li>
        </ul>
        <div class="lb-note">
          <strong>Something out of date?</strong> If any information here contradicts a Nubevest proposal, invoice or agreement you&rsquo;ve received, the signed document takes precedence &mdash; and please tell us at <a href="mailto:info@nubevest.com.au">info@nubevest.com.au</a>.
        </div>
      </div>

    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
