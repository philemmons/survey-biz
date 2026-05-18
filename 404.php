<?php
declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

header('HTTP/1.0 404 Not Found');

$page_title = 'Page Not Found';
$meta_description = 'The page you requested could not be found.';
$current_page = '404.php';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="not-found-heading">
    <div class="container">
      <p class="hero-eyebrow">404</p>
      <h1 id="not-found-heading">Page not found</h1>
      <p class="hero-sub">The page you are looking for does not exist.</p>
      <p class="mt-5"><a class="btn-primary" href="index.php">Back to Home</a></p>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
