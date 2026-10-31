<?php
// CLEAN_URL_REDIRECT_BLOCK
if (!headers_sent() && in_array(($_SERVER['REQUEST_METHOD'] ?? 'GET'), ['GET','HEAD'], true)) {
    $__path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';
    if (preg_match('#\\.php$#i', $__path)) {
        $__clean = preg_replace('#/index\\.php$#i', '/', $__path);
        if ($__clean === $__path) { $__clean = preg_replace('#\\.php$#i', '', $__path); }
        $__qs = $_SERVER['QUERY_STRING'] ?? '';
        header('Location: ' . $__clean . ($__qs !== '' ? '?' . $__qs : ''), true, 301);
        exit;
    }
}
$page = $page ?? '';
// Optional per-page overrides: $header_cta (['label', 'href', 'attrs']), $og_image,
// $body_class, $extra_head (markup appended to <head>).
$header_cta = $header_cta ?? ['label' => 'Book a Call', 'href' => '/contact.php'];
$header_cta_attrs = !empty($header_cta['attrs']) ? ' ' . $header_cta['attrs'] : '';
// Detect base path so both prod (domain root) and local XAMPP subfolder work.
if (!defined('BASE_URL')) {
  $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
  // Strip anything from /solutions/, /industries/, /brands/, /promotions/ or /print-signage/, or a trailing file.
  $base = preg_replace('#/(solutions|industries|brands|promotions|print-signage)?/?[^/]*\.php$#', '', $script);
  define('BASE_URL', rtrim($base, '/'));
}

// Auto-rewrite root-relative paths so links work in a subfolder install
// (e.g. localhost/nubevestAI/). No-op when BASE_URL is empty (prod at domain root).
if (BASE_URL !== '' && !defined('BASE_URL_REWRITE_ON')) {
  define('BASE_URL_REWRITE_ON', true);
  ob_start(function ($html) {
    $base = BASE_URL;
    // Rewrite href="/..." and src="/..." — but not "//" (protocol-relative) or already-prefixed.
    $prefix_re = preg_quote($base, '/');
    $html = preg_replace(
      '/(\s(?:href|src|action)\s*=\s*)(["\'])\/(?!\/|' . $prefix_re . '\/)/i',
      '$1$2' . $base . '/',
      $html
    );
    // Rewrite url("/...") and url('/...') inside inline style attributes/tags too.
    $html = preg_replace(
      '/url\(\s*(["\']?)\/(?!\/|' . $prefix_re . '\/)/i',
      'url(' . '$1' . $base . '/',
      $html
    );
    return $html;
  });
}
?>
<!DOCTYPE html>
<html lang="en-AU">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $seo_title ?? 'Nubevest - Business Technology & Digital Solutions' ?></title>
  <meta name="description" content="<?= $meta_desc ?? 'Nubevest helps Australian businesses with websites, software, CRM, automation, managed IT, cybersecurity, workplace technology and digital growth.' ?>">
  <?php // NUBEVEST_CANONICAL: auto-compute canonical if not set by page

  if (empty($canonical)) {

      $__scheme = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") ? "https" : "http";

      $__host = $_SERVER["HTTP_HOST"] ?? "nubevest.com.au";

      $__path = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH) ?? "/";

      $__path = preg_replace("#\\.php$#i", "", $__path);

      if ($__path !== "/") { $__path = rtrim($__path, "/"); }

      $canonical = $__scheme . "://" . $__host . $__path;

  } ?>
  <link rel="canonical" href="<?= $canonical ?? '' ?>">
  <meta property="og:title" content="<?= $seo_title ?? '' ?>">
  <meta property="og:description" content="<?= $meta_desc ?? '' ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $og_image ?? '/assets/images/nubevest-logo.png' ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="<?= $og_image ?? '/assets/images/nubevest-logo.png' ?>">
  <meta name="theme-color" content="#4f46e5">

  <!-- Favicons -->
  <?php $favVer = @filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/images/logo-icon.png') ?: '20260903'; ?>
  <link rel="icon" type="image/png" sizes="any" href="/assets/images/logo-icon.png?v=<?= $favVer ?>">
  <link rel="shortcut icon" href="/assets/images/logo-icon.png?v=<?= $favVer ?>">
  <link rel="apple-touch-icon" href="/assets/images/logo-icon.png?v=<?= $favVer ?>">

  <link rel="stylesheet" href="/assets/css/style.css?v=<?php echo @filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/style.css') ?: time(); ?>">
<?= $extra_head ?? '' ?>
</head>
<body<?= !empty($body_class) ? ' class="' . $body_class . '"' : '' ?>>
<a href="#main" class="skip-link">Skip to main content</a>

<header class="header" role="banner">
  <div class="header__topbar" aria-label="Utility">
    <div class="header__topbar-inner">
      <a href="/contact.php">Contact</a>
      <span class="header__topbar-sep" aria-hidden="true"></span>
      <a href="/contact.php#support">Client Support</a>
      <span class="header__topbar-sep" aria-hidden="true"></span>
      <a href="tel:1300959514" class="header__topbar-phone">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 5h3l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v3a2 2 0 0 1-2 2A16 16 0 0 1 3 7a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
        1300 959 514
      </a>
    </div>
  </div>
  <div class="header__inner">
    <a href="/" class="header__logo" aria-label="Nubevest Home"><img src="/assets/images/nubevest-logo.png" alt="Nubevest"></a>
    <nav class="header__nav" role="navigation" aria-label="Main navigation">
      <ul class="header__nav-list">
        <li class="has-mega">
          <a href="/websites.php" class="header__nav-link <?= $page === 'websites' ? 'active' : '' ?>">Websites</a>
          <div class="mega-menu mega-menu--compact" role="menu">
            <a href="/websites.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">Website Packages</div><div class="mega-menu__desc">Compare plans &amp; pricing</div></div>
            </a>
            <a href="/websites.php#inclusions" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">What&rsquo;s Included</div><div class="mega-menu__desc">Features, hosting &amp; support</div></div>
            </a>
            <a href="/websites.php#care" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-it">&#9741;</div>
              <div><div class="mega-menu__label">Website Care</div><div class="mega-menu__desc">Updates, backups &amp; edits</div></div>
            </a>
            <a href="/portfolio.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-soft">&#9881;</div>
              <div><div class="mega-menu__label">Our Work</div><div class="mega-menu__desc">Selected websites &amp; projects</div></div>
            </a>
          </div>
        </li>
        <li class="has-mega">
          <a href="/marketing.php" class="header__nav-link <?= $page === 'marketing' ? 'active' : '' ?>">Marketing</a>
          <div class="mega-menu mega-menu--compact" role="menu">
            <a href="/marketing.php#seo" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-growth">&#9650;</div>
              <div><div class="mega-menu__label">SEO</div><div class="mega-menu__desc">Search visibility &amp; local rankings</div></div>
            </a>
            <a href="/marketing.php#meta-ads" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">Meta Ads</div><div class="mega-menu__desc">Facebook &amp; Instagram advertising</div></div>
            </a>
            <a href="/marketing.php#google-ads" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">Google Ads</div><div class="mega-menu__desc">Search &amp; display campaigns</div></div>
            </a>
            <a href="/marketing.php#consultation" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-soft">&#9881;</div>
              <div><div class="mega-menu__label">Consultation</div><div class="mega-menu__desc">Strategy sessions &amp; action plans</div></div>
            </a>
          </div>
        </li>
        <li><a href="/print-signage/" class="header__nav-link <?= $page === 'design-print' ? 'active' : '' ?>">Design &amp; Print</a></li>
        <li class="has-mega">
          <a href="/solutions/" class="header__nav-link <?= $page === 'solutions' ? 'active' : '' ?>">Solutions</a>
          <div class="mega-menu" role="menu">
            <a href="/solutions/websites-ecommerce.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">Websites &amp; eCommerce</div><div class="mega-menu__desc">Design, development &amp; online stores</div></div>
            </a>
            <a href="/solutions/digital-growth.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-growth">&#9650;</div>
              <div><div class="mega-menu__label">Digital Growth</div><div class="mega-menu__desc">SEO, ads &amp; digital strategy</div></div>
            </a>
            <a href="/solutions/crm-automation-ai.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">CRM, Automation &amp; AI</div><div class="mega-menu__desc">Leads, workflows &amp; smart tools</div></div>
            </a>
            <a href="/solutions/software-apps.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-soft">&#9881;</div>
              <div><div class="mega-menu__label">Software &amp; Apps</div><div class="mega-menu__desc">Custom web &amp; mobile applications</div></div>
            </a>
            <a href="/solutions/managed-it-cloud-cybersecurity.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-it">&#9741;</div>
              <div><div class="mega-menu__label">Managed IT &amp; Cybersecurity</div><div class="mega-menu__desc">Cloud, support &amp; security</div></div>
            </a>
            <a href="/solutions/workplace-technology.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-workplace">&#9881;</div>
              <div><div class="mega-menu__label">Workplace Technology</div><div class="mega-menu__desc">Hardware, networks &amp; office tech</div></div>
            </a>
            <a href="/print-signage/" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-print">&#9998;</div>
              <div><div class="mega-menu__label">Design &amp; Print</div><div class="mega-menu__desc">Business cards, signage &amp; more</div></div>
            </a>
          </div>
        </li>
        <li class="has-mega">
          <a href="/industries/" class="header__nav-link <?= $page === 'industries' ? 'active' : '' ?>">Industries</a>
          <div class="mega-menu" role="menu">
            <a href="/industries/small-growing-businesses.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-growth">&#9650;</div>
              <div><div class="mega-menu__label">Small &amp; Growing Businesses</div><div class="mega-menu__desc">Start-ups &amp; SMEs</div></div>
            </a>
            <a href="/industries/ndis-providers.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">NDIS Providers</div><div class="mega-menu__desc">Compliance, websites &amp; Plannor</div></div>
            </a>
            <a href="/industries/trades.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-it">&#9741;</div>
              <div><div class="mega-menu__label">Trades</div><div class="mega-menu__desc">Electricians, plumbers &amp; more</div></div>
            </a>
            <a href="/industries/professional-services.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-soft">&#9881;</div>
              <div><div class="mega-menu__label">Professional Services</div><div class="mega-menu__desc">Accountants, lawyers &amp; consultants</div></div>
            </a>
            <a href="/industries/builders-construction.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">Builders &amp; Construction</div><div class="mega-menu__desc">Builders, developers &amp; construction</div></div>
            </a>
            <a href="/industries/" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-workplace">&#9881;</div>
              <div><div class="mega-menu__label">All Industries</div><div class="mega-menu__desc">View all industry solutions</div></div>
            </a>
          </div>
        </li>
        <li class="has-mega">
          <a href="/brands/" class="header__nav-link <?= $page === 'brands' ? 'active' : '' ?>">Our Brands</a>
          <div class="mega-menu mega-menu--compact" role="menu">
            <a href="/brands/plannor.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">Plannor</div><div class="mega-menu__desc">NDIS provider platform</div></div>
            </a>
            <a href="/brands/gometa-crm.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-growth">&#9650;</div>
              <div><div class="mega-menu__label">Go Meta CRM</div><div class="mega-menu__desc">Leads &amp; workflow platform</div></div>
            </a>
            <a href="/brands/ndis-pages.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">NDIS Pages</div><div class="mega-menu__desc">Provider discovery</div></div>
            </a>
            <a href="/brands/metameet.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-it">&#9741;</div>
              <div><div class="mega-menu__label">MetaMeet</div><div class="mega-menu__desc">Domains, hosting &amp; email</div></div>
            </a>
            <a href="/brands/monitormart.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-soft">&#9881;</div>
              <div><div class="mega-menu__label">MonitorMart</div><div class="mega-menu__desc">Hardware &amp; procurement</div></div>
            </a>
          </div>
        </li>
        <li class="has-mega">
          <a href="/work.php" class="header__nav-link <?= ($page === 'work' || $page === 'portfolio') ? 'active' : '' ?>">Our Work</a>
          <div class="mega-menu mega-menu--compact" role="menu">
            <a href="/work.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-crm">&#9733;</div>
              <div><div class="mega-menu__label">Case Studies</div><div class="mega-menu__desc">Featured client outcomes</div></div>
            </a>
            <a href="/portfolio.php" class="mega-menu__item" role="menuitem">
              <div class="mega-menu__icon icon-web">&#9672;</div>
              <div><div class="mega-menu__label">Portfolio</div><div class="mega-menu__desc">Selected websites &amp; projects</div></div>
            </a>
          </div>
        </li>
        <li><a href="/events.php" class="header__nav-link <?= $page === 'events' ? 'active' : '' ?>">Events</a></li>
        <li><a href="/about.php" class="header__nav-link <?= $page === 'about' ? 'active' : '' ?>">About</a></li>
        <li><a href="/contact.php" class="header__nav-link <?= $page === 'contact' ? 'active' : '' ?>">Contact</a></li>
      </ul>
      <div class="header__ctas">
        <a href="https://metameet.com.au/" target="_blank" rel="noopener" class="btn btn--secondary btn--sm header__cta header__cta--domain">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" stroke="currentColor" stroke-width="1.8"/></svg>
          Buy Domain
        </a>
        <a href="<?= htmlspecialchars($header_cta['href']) ?>" class="btn btn--primary btn--sm header__cta"<?= $header_cta_attrs ?>><?= htmlspecialchars($header_cta['label']) ?></a>
      </div>
    </nav>
    <button class="mobile-toggle" aria-label="Toggle menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<div class="mobile-menu" role="dialog" aria-label="Mobile navigation">
  <a href="/" class="mobile-menu__link">Home</a>
  <a href="/websites.php" class="mobile-menu__link" data-submenu>Websites</a>
  <div class="mobile-menu__sub">
    <a href="/websites.php">Website Packages</a>
    <a href="/websites.php#inclusions">What&rsquo;s Included</a>
    <a href="/websites.php#care">Website Care</a>
    <a href="/portfolio.php">Our Work</a>
  </div>
  <a href="/marketing.php" class="mobile-menu__link" data-submenu>Marketing</a>
  <div class="mobile-menu__sub">
    <a href="/marketing.php#seo">SEO</a>
    <a href="/marketing.php#meta-ads">Meta Ads</a>
    <a href="/marketing.php#google-ads">Google Ads</a>
    <a href="/marketing.php#consultation">Consultation</a>
  </div>
  <a href="/print-signage/" class="mobile-menu__link">Design &amp; Print</a>
  <a href="/solutions/" class="mobile-menu__link" data-submenu>Solutions</a>
  <div class="mobile-menu__sub">
    <a href="/solutions/websites-ecommerce.php">Websites &amp; eCommerce</a>
    <a href="/solutions/digital-growth.php">Digital Growth</a>
    <a href="/solutions/crm-automation-ai.php">CRM, Automation &amp; AI</a>
    <a href="/solutions/software-apps.php">Software &amp; Apps</a>
    <a href="/solutions/managed-it-cloud-cybersecurity.php">Managed IT &amp; Cybersecurity</a>
    <a href="/solutions/workplace-technology.php">Workplace Technology</a>
  </div>
  <a href="/industries/" class="mobile-menu__link" data-submenu>Industries</a>
  <div class="mobile-menu__sub">
    <a href="/industries/small-growing-businesses.php">Small &amp; Growing Businesses</a>
    <a href="/industries/ndis-providers.php">NDIS Providers</a>
    <a href="/industries/trades.php">Trades</a>
    <a href="/industries/professional-services.php">Professional Services</a>
    <a href="/industries/builders-construction.php">Builders &amp; Construction</a>
    <a href="/industries/">All Industries</a>
  </div>
  <a href="/brands/" class="mobile-menu__link" data-submenu>Our Brands</a>
  <div class="mobile-menu__sub">
    <a href="/brands/plannor.php">Plannor</a>
    <a href="/brands/gometa-crm.php">Go Meta CRM</a>
    <a href="/brands/ndis-pages.php">NDIS Pages</a>
    <a href="/brands/metameet.php">MetaMeet</a>
    <a href="/brands/monitormart.php">MonitorMart</a>
  </div>
  <a href="/work.php" class="mobile-menu__link" data-submenu>Our Work</a>
  <div class="mobile-menu__sub">
    <a href="/work.php">Case Studies</a>
    <a href="/portfolio.php">Portfolio</a>
  </div>
  <a href="/events.php" class="mobile-menu__link">Events</a>
  <a href="/about.php" class="mobile-menu__link">About</a>
  <a href="/contact.php" class="mobile-menu__link">Contact</a>
  <a href="/contact.php#support" class="mobile-menu__link">Client Support</a>
  <a href="tel:1300959514" class="mobile-menu__link" style="color:#60a5fa;font-weight:600;">
    &#9742; 1300 959 514
  </a>
  <div style="padding: var(--space-xl) 0; display:flex; flex-direction:column; gap:10px;">
    <a href="https://metameet.com.au/" target="_blank" rel="noopener" class="btn btn--secondary" style="width:100%;justify-content:center;">Buy Domain</a>
    <a href="<?= htmlspecialchars($header_cta['href']) ?>" class="btn btn--primary" style="width:100%;justify-content:center;"<?= $header_cta_attrs ?>><?= htmlspecialchars($header_cta['label']) ?></a>
  </div>
</div>
