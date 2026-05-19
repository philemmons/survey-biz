<?php

declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'Survey Programming & Deployment';
$meta_description = 'Professional survey programming and deployment by Phillip Emmons - WCAG 2.1 compliant, mobile-responsive, multilingual. Based in Marina, CA.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="hero-heading">
    <div class="container">
      <p class="hero-eyebrow" aria-hidden="true">Survey Programming & Deployment</p>
      <h1 id="hero-heading">Enterprise-grade surveys built to collect cleaner data, reach more respondents, and hold up at scale.</h1>
      <p class="hero-sub">Programmed and deployed surveys to a 100000+ member international research panels across 130+ countries. Every survey built carries the same operational discipline: accuracy, accessible, and gathering critical business data for clients.</p>

      <div class="hero-actions mt-5">
        <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
        <a href="services.php" class="btn-secondary">View Services</a>
        <a href="tel:<?= SITE_TEL; ?>" class="phone-inline" aria-label="Phone <?= SITE_PHONE; ?>"><?= SITE_PHONE; ?></a>
      </div>

      <ul class="trust-row" aria-label="Trust markers">
        <li class="trust-marker">130+ Countries</li>
        <li class="trust-marker">Direct Operator Access</li>
        <li class="trust-marker">B2B Aligned</li>
      </ul>
    </div>
  </section>

  <section class="proof-strip" aria-label="Key performance metrics">
    <div class="container">
      <dl class="proof-grid">
        <div class="proof-item">
          <dt class="proof-label">Panel Members</dt>
          <dd class="proof-num" data-count-to="100" data-suffix=",000+">100000+</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Countries Served</dt>
          <dd class="proof-num" data-count-to="130" data-suffix="+">130+</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Campaigns per Year</dt>
          <dd class="proof-num">16—25</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Multilingual Translation Turnaround</dt>
          <dd class="proof-num">3—5 Days</dd>
        </div>
      </dl>
    </div>
  </section>

  <div class="container">
    <div class="intro" aria-label="Service overview" data-reveal>
      <p class="intro-text">In a research environment where a poorly structured question, an inaccessible layout, or a slow-loading page can silently kill your response rate, the quality of your survey programming matters. This business specializes in building surveys that remove every technical barrier between your questions and your data — across devices, languages, and audiences.</p>
    </div>

    <section class="section" aria-labelledby="services-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Services Preview</p>
      <h2 id="services-heading">What this service can build for your team</h2>
      <p class="section-deck">Execution-ready components drawn from recurring enterprise delivery workflows.</p>
      <ul class="feature-list" aria-label="Services preview">
        <li class="feature-card">
          <p class="feature-title">Professional Survey Programming</p>
          <p class="feature-body">Complex branching, piping, randomization, quota management, and response validation.</p>
          <p class="mt-3 px-1"><a href="services.php#s1">Explore survey programming and logic services</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Accessible & High-Performance Design</p>
          <p class="feature-body">Mobile-first layouts and accessible interaction patterns that support diverse respondents.</p>
          <p class="mt-3 px-1"><a href="services.php#s2">Learn about accessible and responsive survey design</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Multilingual Deployment & Outreach</p>
          <p class="feature-body">Multi-country fielding with localized language handling and deployment consistency.</p>
          <p class="mt-3 px-1"><a href="services.php#s3">See multilingual deployment capabilities</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Real-Time Tracking & Data Reporting</p>
          <p class="feature-body">Field monitoring and delivery workflows to keep campaigns on schedule and on target.</p>
          <p class="mt-3 px-1"><a href="services.php#s4">Review real-time tracking and reporting support</a></p>
        </li>
      </ul>
    </section>

    <section class="section" aria-labelledby="why-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Why Work With This Service</p>
      <h2 id="why-heading">Grounded in real research operations</h2>
      <p class="section-deck">You get direct accountability, technical precision, and launch discipline on every project.</p>
      <ul class="icon-grid" aria-label="Key differentiators">
        <li class="icon-card">
          <h3>Direct Accountability, No Middlemen</h3>
          <p class="card-body-text">You work directly with the survey programmer and deployment lead. No account managers relaying messages and no handoffs between teams.</p>
        </li>
        <li class="icon-card">
          <h3>Enterprise-Tested at International Scale</h3>
          <p class="card-body-text">Surveys have been programmed and deployed to a 100000+ member panel spanning 130+ countries. Projects of smaller scope are handled with the same capacity and discipline.</p>
        </li>
        <li class="icon-card">
          <h3>Accessibility Built In, Not Bolted On</h3>
          <p class="card-body-text">WCAG 2.1 compliance is part of every build — not an add-on. Every survey is tested, and re-tested, for accessibility before it reaches a single respondent.</p>
        </li>
        <li class="icon-card">
          <h3>Competitive, Transparent Pricing</h3>
          <p class="card-body-text">Get enterprise-quality survey programming without enterprise-agency overhead. Request a custom quote based on the clients project scope and timeline.</p>
        </li>
      </ul>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="home-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="home-cta-heading">Ready to move from planning to launch?</h2>
        <p>Share your project details for clear guidance on scope, timing, and deployment.</p>
      </div>
      <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
    </div>
  </section>

</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
