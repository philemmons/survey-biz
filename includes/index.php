<a class="skip-link" href="#main-content">Skip to main content</a>
<header class="site-header">
  <div class="container header-inner">
    <a class="site-name" href="index.php">philemmons.net</a>

    <button
      id="nav-toggle"
      class="nav-toggle"
      type="button"
      aria-controls="primary-nav"
      aria-expanded="false"
      aria-label="Open primary navigation">
      Menu
    </button>

    <nav id="primary-nav" class="site-nav" aria-label="Primary">
      <ul class="site-nav-list">
        <li><a class="site-nav-link" href="index.php" <?= is_current_page('index.php') ? 'aria-current="page"' : ''; ?>>Home</a></li>
        <li><a class="site-nav-link" href="services.php" <?= is_current_page('services.php') ? 'aria-current="page"' : ''; ?>>Services</a></li>
        <li><a class="site-nav-link" href="use-cases.php" <?= is_current_page('use-cases.php') ? 'aria-current="page"' : ''; ?>>Use Cases</a></li>
        <li><a class="site-nav-link" href="pricing.php" <?= is_current_page('pricing.php') ? 'aria-current="page"' : ''; ?>>Pricing</a></li>
        <li><a class="site-nav-link" href="about.php" <?= is_current_page('about.php') ? 'aria-current="page"' : ''; ?>>About</a></li>
        <li><a class="site-nav-link" href="insights.php" <?= is_current_page('insights.php') ? 'aria-current="page"' : ''; ?>>Insights</a></li>
        <li><a class="site-nav-link" href="inquiry.php" <?= is_current_page('inquiry.php') ? 'aria-current="page"' : ''; ?>>Inquiry</a></li>
      </ul>
    </nav>
  </div>
</header>

