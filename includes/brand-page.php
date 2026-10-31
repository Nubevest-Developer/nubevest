<?php
/**
 * Shared brand-page partial.
 * Requires $brand array with keys:
 *   slug, name, classification, endorsement, endorsement_class,
 *   proposition, role, best_fit, buy (array), route, boundary,
 *   primary_cta_label, primary_cta_href, tint (hex color pair)
 */
$b = $brand;
$seo_title = ($b['seo_title']  ?? ($b['name'] . ' — ' . $b['endorsement'] . ' | Nubevest'));
$meta_desc = ($b['meta_desc']  ?? ($b['name'] . ': ' . $b['proposition']));
$page = 'brands';
include __DIR__ . '/header.php';
?>

<style>
.bp-hero {
  position: relative;
  padding: clamp(64px, 8vw, 110px) 0 clamp(40px, 5vw, 60px);
  background:
    radial-gradient(900px 400px at 0% 0%, <?= $b['tint'][2] ?> 0%, transparent 55%),
    radial-gradient(900px 400px at 100% 100%, <?= $b['tint'][3] ?> 0%, transparent 55%),
    linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
  overflow: hidden;
}
.bp-hero__grid { max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 40px; align-items: center; }
@media (max-width: 900px) { .bp-hero__grid { grid-template-columns: 1fr; } }
.bp-badge {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 8px 16px 8px 12px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  color: #334155;
  font-size: 0.7rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase;
  box-shadow: 0 6px 18px -10px rgba(15,23,42,0.18);
}
.bp-badge::before {
  content: ""; width: 8px; height: 8px; border-radius: 50%;
  background: linear-gradient(135deg, <?= $b['tint'][0] ?>, <?= $b['tint'][1] ?>);
  box-shadow: 0 0 0 4px <?= $b['tint'][2] ?>;
}
.bp-name { font-size: clamp(2rem, 4.5vw, 3.2rem); font-weight: 800; letter-spacing: -0.025em; line-height: 1.05; color: #0f172a; margin: 22px 0 6px; }
.bp-class { color: color-mix(in oklab, <?= $b['tint'][0] ?> 65%, #1e293b); font-size: 0.78rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 18px; }
.bp-prop { color: #334155; font-size: 1.1rem; line-height: 1.6; max-width: 560px; margin: 0 0 26px; }
.bp-cta-row { display: flex; flex-wrap: wrap; gap: 12px; }
.bp-btn {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 14px 22px;
  border-radius: 999px;
  font-weight: 700; font-size: 0.95rem;
  text-decoration: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  white-space: nowrap;
}
.bp-btn--primary { background: linear-gradient(135deg, <?= $b['tint'][0] ?>, <?= $b['tint'][1] ?>); color: #fff; box-shadow: 0 14px 30px -14px color-mix(in oklab, <?= $b['tint'][0] ?> 55%, transparent); }
.bp-btn--primary:hover { transform: translateY(-2px); }
.bp-btn--ghost { background: #ffffff; color: #0f172a; border: 1px solid #e6e9f2; }
.bp-btn--ghost:hover { border-color: color-mix(in oklab, <?= $b['tint'][0] ?> 35%, #e6e9f2); transform: translateY(-2px); }

.bp-glyph {
  width: 220px; height: 220px;
  border-radius: 32px;
  background: linear-gradient(135deg, <?= $b['tint'][0] ?>, <?= $b['tint'][1] ?>);
  display: grid; place-items: center;
  color: #fff;
  font-weight: 900; font-size: 6rem; letter-spacing: -0.05em;
  box-shadow: 0 30px 60px -20px color-mix(in oklab, <?= $b['tint'][0] ?> 60%, transparent),
              inset 0 1px 0 rgba(255,255,255,0.35);
  justify-self: center;
  position: relative;
}
.bp-glyph::after {
  content: ""; position: absolute; inset: -18px;
  border-radius: 42px;
  background: linear-gradient(135deg, <?= $b['tint'][0] ?>, <?= $b['tint'][1] ?>);
  filter: blur(28px); opacity: 0.35;
  z-index: -1;
}

.bp-body { padding: clamp(48px, 6vw, 72px) 0; background: #f8fafc; }
.bp-grid { display: grid; grid-template-columns: 1.4fr 1fr; gap: 28px; max-width: 1100px; margin: 0 auto; }
@media (max-width: 900px) { .bp-grid { grid-template-columns: 1fr; } }
.bp-card {
  background: #ffffff;
  border: 1px solid #e6e9f2;
  border-radius: 20px;
  padding: 28px 30px;
  box-shadow: 0 20px 44px -30px rgba(15,23,42,0.20);
}
.bp-card__h {
  color: #64748b; font-size: 0.72rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase;
  margin: 0 0 12px; padding-bottom: 10px; border-bottom: 1px dashed #e6e9f2;
}
.bp-card h3 {
  color: #0f172a; font-size: 1.15rem; font-weight: 800; letter-spacing: -0.01em; margin: 0 0 10px;
}
.bp-card p { color: #475569; font-size: 0.95rem; line-height: 1.65; margin: 0 0 12px; }
.bp-buy { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 10px; }
.bp-buy li {
  padding-left: 26px; position: relative;
  color: #334155; font-size: 0.95rem; line-height: 1.55;
}
.bp-buy li::before {
  content: ""; position: absolute; left: 0; top: 6px;
  width: 14px; height: 14px; border-radius: 50%;
  background: color-mix(in oklab, <?= $b['tint'][0] ?> 15%, #ffffff);
  border: 2px solid color-mix(in oklab, <?= $b['tint'][0] ?> 55%, transparent);
}
.bp-fit {
  padding: 14px 16px; margin-top: 14px;
  background: color-mix(in oklab, <?= $b['tint'][0] ?> 6%, #ffffff);
  border: 1px solid color-mix(in oklab, <?= $b['tint'][0] ?> 22%, #e6e9f2);
  border-radius: 12px;
  color: #334155; font-size: 0.9rem; line-height: 1.6;
}
.bp-fit strong { color: color-mix(in oklab, <?= $b['tint'][0] ?> 70%, #0f172a); }
.bp-note {
  padding: 14px 16px;
  background: #fefce8;
  border: 1px dashed #fde68a;
  border-radius: 12px;
  color: #713f12; font-size: 0.88rem; line-height: 1.6;
  margin-top: 14px;
}
.bp-note strong { color: #713f12; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 0.06em; }

.bp-endnote {
  max-width: 1100px; margin: 32px auto 0;
  padding: 24px 28px;
  background: linear-gradient(135deg, #0f172a, #1e293b);
  color: #cbd5e1; border-radius: 20px;
  display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;
  box-shadow: 0 20px 44px -18px rgba(15,23,42,0.4);
}
.bp-endnote__t { color: #fff; font-weight: 800; margin-bottom: 4px; letter-spacing: -0.005em; }
.bp-endnote__s { color: #94a3b8; font-size: 0.9rem; line-height: 1.5; }
.bp-endnote__btn {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 22px;
  background: linear-gradient(135deg, <?= $b['tint'][0] ?>, <?= $b['tint'][1] ?>);
  color: #ffffff; text-decoration: none; font-weight: 700; font-size: 0.9rem;
  border-radius: 999px;
  transition: transform 0.2s ease;
  white-space: nowrap;
}
.bp-endnote__btn:hover { transform: translateY(-2px); }
</style>

<main id="main">

<section class="bp-hero">
  <div class="container">
    <div class="bp-hero__grid">
      <div>
        <span class="bp-badge"><?= htmlspecialchars($b['endorsement']) ?></span>
        <h1 class="bp-name"><?= htmlspecialchars($b['name']) ?></h1>
        <div class="bp-class"><?= htmlspecialchars($b['classification']) ?></div>
        <p class="bp-prop"><?= $b['proposition'] ?></p>
        <div class="bp-cta-row">
          <a href="<?= $b['primary_cta_href'] ?? '/contact.php' ?>" class="bp-btn bp-btn--primary">
            <?= htmlspecialchars($b['primary_cta_label'] ?? 'Book a Call') ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="/products-ventures.php#platforms" class="bp-btn bp-btn--ghost">Back to Nubevest ecosystem</a>
        </div>
      </div>
      <div class="bp-glyph" aria-hidden="true"><?= substr($b['name'], 0, 1) ?></div>
    </div>
  </div>
</section>

<section class="bp-body">
  <div class="container">
    <div class="bp-grid">

      <div class="bp-card">
        <div class="bp-card__h">Role inside Nubevest</div>
        <p><?= $b['role'] ?></p>

        <div class="bp-card__h" style="margin-top:22px;">What customers can buy</div>
        <ul class="bp-buy">
          <?php foreach ($b['buy'] as $item): ?>
          <li><?= $item ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="bp-card">
        <div class="bp-card__h">Best-fit customers</div>
        <p><?= $b['best_fit'] ?></p>

        <div class="bp-fit">
          <strong>Website &amp; enquiry route.</strong><br>
          <?= $b['route'] ?>
        </div>

        <div class="bp-note">
          <strong>Accuracy boundary</strong><br>
          <?= $b['boundary'] ?>
        </div>
      </div>

    </div>

    <div class="bp-endnote">
      <div>
        <div class="bp-endnote__t">One accountable Nubevest relationship.</div>
        <div class="bp-endnote__s">You engage Nubevest &mdash; not <?= htmlspecialchars($b['name']) ?> as a separate company. Every proposal identifies who&rsquo;s responsible for what.</div>
      </div>
      <a href="/contact.php" class="bp-endnote__btn">
        Book a Call
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </div>
</section>

</main>

<?php include __DIR__ . '/footer.php'; ?>
