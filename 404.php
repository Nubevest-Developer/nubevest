<?php
$page = '';
$seo_title = 'Page Not Found | Nubevest';
include 'includes/header.php';
?>

<main id="main">

<section class="error-page">
  <div class="container">
    <div class="reveal" style="text-align: center;">
      <span class="kicker">PAGE NOT FOUND</span>
      <div class="error-page__code">404</div>
      <h1>This page is not where we expected it to be.</h1>
      <p class="lead">The page may have moved, the link may be outdated or the address may have been entered incorrectly.</p>
      <div class="btn-group" style="justify-content: center;">
        <a href="/" class="btn btn--primary">Return Home</a>
        <a href="/contact.php" class="btn btn--secondary">Contact Nubevest</a>
      </div>
    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
