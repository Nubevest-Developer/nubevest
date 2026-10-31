<?php
$page = 'industries';
$seo_title = 'Industries We Work With | Nubevest';
$meta_desc = 'Nubevest works with NDIS providers, aged care, builders and trades, real estate, education, professional services, retail & hospitality and small businesses across Australia.';
include __DIR__ . '/../includes/header.php';

$industries = [
  [
    'title' => 'NDIS &amp; Disability Services',
    'summary' => 'Provider management, participant experience, compliance and operations — with dedicated tools like Plannor.',
    'href' => '/industries/ndis-providers.php',
    'live' => true,
    'accent' => '#3b82f6',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M12 3l8 3v6c0 5-4 8-8 9-4-1-8-4-8-9V6z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.5 12l2.5 2.5L15.5 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
  ],
  [
    'title' => 'Aged Care &amp; Healthcare',
    'summary' => 'Websites, referral capture, staff systems and secure IT for clinics, allied health and aged care providers.',
    'href' => '/industries/aged-care-healthcare.php',
    'live' => true,
    'accent' => '#10b981',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.5-7-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 6.5-7 11-7 11z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
  ],
  [
    'title' => 'Builders, Building Inspectors &amp; Trades',
    'summary' => 'Lead generation, quoting workflow, job systems and websites built for how trades and inspectors actually work.',
    'href' => '/industries/builders-construction.php',
    'live' => true,
    'accent' => '#f59e0b',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 21l6-6M14 7l3-3 4 4-3 3M9 12l3 3M7 14l-3 3 3 3 3-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
  ],
  [
    'title' => 'Real Estate &amp; Property',
    'summary' => 'Websites, portals, CRM and marketing for agencies, property managers and off-the-plan sales teams.',
    'href' => '/industries/real-estate-property.php',
    'live' => true,
    'accent' => '#8b5cf6',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 12l9-7 9 7v9H3z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M10 21v-6h4v6" stroke="currentColor" stroke-width="1.8"/></svg>',
  ],
  [
    'title' => 'Education &amp; Training Organisations',
    'summary' => 'Enrolment funnels, student portals, LMS integration and marketing for RTOs, colleges and training bodies.',
    'href' => '/industries/education-training.php',
    'live' => true,
    'accent' => '#7c3aed',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 8l9-4 9 4-9 4-9-4z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6 10v6c0 1.5 3 3 6 3s6-1.5 6-3v-6" stroke="currentColor" stroke-width="1.8"/></svg>',
  ],
  [
    'title' => 'Professional &amp; Advisory Services',
    'summary' => 'Websites, CRM, document workflow and secure IT for accountants, lawyers, consultants and advisers.',
    'href' => '/industries/professional-services.php',
    'live' => true,
    'accent' => '#0ea5e9',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 7h16v13H4z" stroke="currentColor" stroke-width="1.8"/><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="1.8"/></svg>',
  ],
  [
    'title' => 'Retail, Hospitality &amp; eCommerce',
    'summary' => 'Shopfront websites, online ordering, eCommerce and integrations that keep customer, product and stock data aligned.',
    'href' => '/industries/retail-hospitality-ecommerce.php',
    'live' => true,
    'accent' => '#ec4899',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M4 8h16l-1 12H5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M9 8V6a3 3 0 0 1 6 0v2" stroke="currentColor" stroke-width="1.8"/></svg>',
  ],
  [
    'title' => 'Small &amp; Growing Businesses',
    'summary' => 'Practical websites, systems and IT foundations that give small businesses a starting point they can grow from.',
    'href' => '/industries/small-growing-businesses.php',
    'live' => true,
    'accent' => '#22c55e',
    'icon' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="M3 20h18M6 20V10l3-3 3 3v10M15 20V13l3-2 3 2v7" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
  ],
];
?>

<main id="main">

<section class="hero hero--sm hero--new" style="background:linear-gradient(135deg,#0a1230 0%, #131a3d 100%);">
  <div class="container reveal">
    <span class="kicker kicker--pill" style="background:rgba(59,130,246,0.15);color:#93c5fd;"><i></i>INDUSTRIES WE WORK WITH</span>
    <h1 style="color:#fff;max-width:900px;">Solutions tuned to <span style="background:linear-gradient(90deg,#60a5fa,#a78bfa);-webkit-background-clip:text;background-clip:text;color:transparent;">how your industry actually works.</span></h1>
    <p style="color:rgba(255,255,255,0.78);max-width:760px;font-size:1.125rem;">
      Every industry has its own workflow, compliance and buying journey. Pick yours to see the problems we solve, the platforms that fit and the work we&rsquo;ve done in that space.
    </p>
  </div>
</section>

<section class="section ind-grid-section">
  <div class="container">
    <div class="ind-grid reveal">
      <?php foreach ($industries as $ind): ?>
        <?php $tag = $ind['live'] ? 'a' : 'div'; $href = $ind['live'] ? 'href="' . $ind['href'] . '"' : ''; ?>
        <<?= $tag ?> <?= $href ?> class="ind-card<?= $ind['live'] ? '' : ' ind-card--soon' ?>" style="--acc:<?= $ind['accent'] ?>;">
          <div class="ind-card__glow" aria-hidden="true"></div>
          <div class="ind-card__head">
            <div class="ind-card__icon">
              <?= $ind['icon'] ?>
            </div>
            <?php if (!$ind['live']): ?>
              <span class="ind-card__badge">Coming soon</span>
            <?php endif; ?>
          </div>
          <h3 class="ind-card__title"><?= $ind['title'] ?></h3>
          <p class="ind-card__desc"><?= $ind['summary'] ?></p>
          <div class="ind-card__foot">
            <?php if ($ind['live']): ?>
              <span class="ind-card__link">Explore this industry
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            <?php else: ?>
              <span class="ind-card__link ind-card__link--muted">In development
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M12 8v4l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </span>
            <?php endif; ?>
          </div>
        </<?= $tag ?>>
      <?php endforeach; ?>
    </div>

    <div class="ind-cta">
      <div class="ind-cta__mark" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 3l1.9 5.9H20l-4.9 3.6L17 18.5 12 15l-5 3.5 1.9-6L4 8.9h6.1L12 3z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
      </div>
      <div class="ind-cta__body">
        <h3>Not sure where you fit?</h3>
        <p>Most Nubevest engagements start with a short conversation about the problem, not the label. We&rsquo;ll recommend where to begin.</p>
      </div>
      <a href="/contact.php" class="btn btn--primary ind-cta__btn">Book a Call
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>
</section>

<style>
  .ind-grid-section { padding: clamp(56px, 8vw, 96px) 0; background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); }

  .ind-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 22px;
  }

  .ind-card {
    position: relative;
    display: flex;
    flex-direction: column;
    padding: 28px 26px 24px;
    border-radius: 20px;
    background: #ffffff;
    border: 1px solid #eef2f7;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
    isolation: isolate;
    transition: transform .35s cubic-bezier(.2,.7,.2,1), box-shadow .35s ease, border-color .3s ease;
    box-shadow: 0 1px 2px rgba(15,23,42,.03);
  }

  /* Top accent bar */
  .ind-card::before {
    content: '';
    position: absolute;
    inset: 0 0 auto 0;
    height: 4px;
    background: linear-gradient(90deg, var(--acc), color-mix(in srgb, var(--acc) 55%, #c026d3));
    transform: scaleX(.35);
    transform-origin: left;
    transition: transform .4s cubic-bezier(.2,.7,.2,1);
    border-radius: 20px 20px 0 0;
  }
  /* Ambient glow that fades in on hover */
  .ind-card__glow {
    position: absolute;
    top: -60px; right: -60px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: radial-gradient(closest-side, color-mix(in srgb, var(--acc) 28%, transparent), transparent 70%);
    opacity: 0;
    transition: opacity .4s ease;
    z-index: -1;
    pointer-events: none;
  }

  .ind-card:hover {
    transform: translateY(-4px);
    border-color: color-mix(in srgb, var(--acc) 40%, #e5e7eb);
    box-shadow:
      0 22px 40px -22px color-mix(in srgb, var(--acc) 55%, rgba(15,23,42,.25)),
      0 4px 10px -4px rgba(15,23,42,.06);
  }
  .ind-card:hover::before { transform: scaleX(1); }
  .ind-card:hover .ind-card__glow { opacity: 1; }
  .ind-card:hover .ind-card__icon {
    background: var(--acc);
    color: #fff;
    transform: rotate(-4deg) scale(1.05);
  }
  .ind-card:hover .ind-card__link {
    gap: 10px;
    color: var(--acc);
  }
  .ind-card:hover .ind-card__link svg { transform: translateX(4px); }

  .ind-card__head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 22px;
  }
  .ind-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px; height: 56px;
    border-radius: 16px;
    background: color-mix(in srgb, var(--acc) 12%, #ffffff);
    color: var(--acc);
    transition: background .3s ease, color .3s ease, transform .35s cubic-bezier(.2,.7,.2,1);
    box-shadow: inset 0 0 0 1px color-mix(in srgb, var(--acc) 18%, transparent);
  }
  .ind-card__icon svg { width: 26px; height: 26px; }

  .ind-card__badge {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
    color: color-mix(in srgb, var(--acc) 75%, #334155);
    background: color-mix(in srgb, var(--acc) 12%, #ffffff);
    border: 1px solid color-mix(in srgb, var(--acc) 25%, transparent);
  }

  .ind-card__title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.3;
    margin: 0 0 10px;
    letter-spacing: -.01em;
  }
  .ind-card__desc {
    font-size: .95rem;
    line-height: 1.6;
    color: #475569;
    margin: 0 0 22px;
    flex-grow: 1;
  }
  .ind-card__foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px dashed #e5e7eb;
  }
  .ind-card__link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
    font-size: .9rem;
    color: #334155;
    transition: gap .25s ease, color .25s ease;
  }
  .ind-card__link svg { transition: transform .25s ease; }
  .ind-card__link--muted { color: #94a3b8; }

  .ind-card--soon { opacity: .78; }
  .ind-card--soon:hover { transform: translateY(-2px); }

  /* Bottom CTA */
  .ind-cta {
    display: flex;
    align-items: center;
    gap: 22px;
    margin-top: 56px;
    padding: 28px 32px;
    border-radius: 22px;
    background:
      radial-gradient(120% 200% at 0% 0%, rgba(37,99,235,.08), transparent 40%),
      radial-gradient(120% 200% at 100% 100%, rgba(192,38,211,.08), transparent 45%),
      linear-gradient(135deg, #ffffff, #f8fafc);
    border: 1px solid #e5e7eb;
    box-shadow: 0 4px 30px -18px rgba(37,99,235,.25);
  }
  .ind-cta__mark {
    flex: none;
    width: 56px; height: 56px;
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #2563eb 0%, #7c3aed 55%, #c026d3 100%);
    color: #fff;
    box-shadow: 0 8px 20px -8px rgba(124,58,237,.6);
  }
  .ind-cta__body { flex: 1; }
  .ind-cta__body h3 { margin: 0 0 4px; font-size: 1.1rem; color: #0f172a; }
  .ind-cta__body p  { margin: 0; color: #64748b; font-size: .95rem; }
  .ind-cta__btn { flex: none; display: inline-flex; align-items: center; gap: 8px; }

  @media (max-width: 720px) {
    .ind-grid { grid-template-columns: 1fr; gap: 16px; }
    .ind-card { padding: 24px 22px 20px; border-radius: 18px; }
    .ind-cta { flex-direction: column; align-items: flex-start; text-align: left; padding: 24px; }
    .ind-cta__btn { width: 100%; justify-content: center; }
  }
</style>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
