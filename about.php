<?php

declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'About';
$meta_description = 'Phillip Emmons - freelance survey programmer and deployment specialist based in Marina, CA. Enterprise-tested experience across 80+ countries.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="about-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">About</p>
      <h1 id="about-hero-heading">Ready To Plan Your Next Survey?</h1>
      <p class="hero-sub">Share your timeline and project scope for a direct response. Hands-on survey programming and deployment experience shaped by enterprise-scale fieldwork demands.</p>

      <div class="hero-actions mt-5">
        <a href="services.php" class="btn-secondary">View Services</a>
        <a href="pricing.php" class="btn-secondary">View Pricing</a>
      </div>

    </div>
  </section>

  <section class="proof-strip" aria-label="Career highlights">
    <div class="container">
      <dl class="proof-grid">
        <div class="proof-item">
          <dt class="proof-num" data-count-to="100" data-suffix=",000+">100000+</dt>
          <dd class="proof-label">Panel Members</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num" data-count-to="130" data-suffix="+">130+</dt>
          <dd class="proof-label">Countries</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num" data-count-to="5" data-suffix="+">5+</dt>
          <dd class="proof-label">Concurrent Surveys Managed</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num">3&mdash;5 Days</dt>
          <dd class="proof-label">Translation Turnaround</dd>

        </div>
      </dl>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="bio-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Background</p>
      <h2 id="bio-heading">About Phillip</h2>
      <blockquote class="intro-text measure">
        Survey systems should be precise, accessible, and operationally dependable from day one.
      </blockquote>
      <div class="stack-4 mt-5 measure">
        <p>This practice is built around real research production work where timelines are tight, specs evolve quickly, and launch quality matters. The business experience combines technical implementation with day-to-day delivery responsibility, so projects move from questionnaire to field with less friction.</p>
        <p>Enterprise grade surveys have been completed across 100,000+ panelist in 130+ countries. This includes multilingual deployments, managed outreach pipelines, and field monitoring workflows that keep stakeholders informed in real time.</p>
        <p>The approach is straightforward: accessible, clean code; stable survey logic; and direct client communication without handoff layers. Clients get an implementation partner that is accountable for what ships and responsive when priorities change.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="values-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Values</p>
      <h2 id="values-heading">Core Values</h2>
      <ul class="icon-grid mt-4" aria-label="Core values list">
        <li class="icon-card">
          <h3>Direct Accountability</h3>
          <p class="card-body-text">You collaborate directly with the person implementing your survey logic and deployment workflow.</p>
        </li>
        <li class="icon-card">
          <h3>Accessibility First</h3>
          <p class="card-body-text">WCAG-aware practices are integrated from the beginning, not retrofitted after development.</p>
        </li>
        <li class="icon-card">
          <h3>Clean, Reliable Code</h3>
          <p class="card-body-text">Maintainable templates and tested logic reduce launch risk and simplify ongoing updates.</p>
        </li>
      </ul>
      <p class="section-deck mt-4">Based in Marina, CA. Working with clients everywhere.</p>
    </section>

  </div>

  <section class="cta-band" aria-labelledby="about-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="about-cta-heading">Need A Reliable Survey Build Partner?</h2>
        <p>If your project needs technical reliability and clean deployment, send an inquiry.</p>
      </div>
      <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>