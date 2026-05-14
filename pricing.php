<?php

declare(strict_types=1);
$page_title = 'Pricing';
$meta_description = 'Project-based pricing for professional survey programming. Custom quotes - no retainers, no agency markup.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="pricing-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Pricing</p>
      <h1 id="pricing-hero-heading">Transparent, project-based pricing</h1>
      <p class="hero-sub">No retainers. No agency markup. A custom quote based on exactly what your study needs.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="factors-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Quote Inputs</p>
      <h2 id="factors-heading">What affects your quote</h2>
      <p class="section-deck">Scope is priced from delivery reality, not package tiers.</p>
      <ul class="icon-grid" aria-label="Pricing factors">
        <li class="icon-card">
          <h3>Question Count</h3>
          <p class="card-body-text">Total questionnaire length and section depth influence scripting and QA time.</p>
        </li>
        <li class="icon-card">
          <h3>Logic Complexity</h3>
          <p class="card-body-text">Branching, piping, quota logic, and custom validations affect implementation scope.</p>
        </li>
        <li class="icon-card">
          <h3>Languages Required</h3>
          <p class="card-body-text">Number of languages and localization QA requirements shape deployment effort.</p>
        </li>
        <li class="icon-card">
          <h3>Deployment and Outreach Scope</h3>
          <p class="card-body-text">Email campaign setup, list segmentation, and invite workflows add operational tasks.</p>
        </li>
        <li class="icon-card">
          <h3>Reporting and Dashboard Setup</h3>
          <p class="card-body-text">Progress reporting needs and dashboard complexity impact post-launch support.</p>
        </li>
        <li class="icon-card">
          <h3>Timeline and Turnaround</h3>
          <p class="card-body-text">Delivery speed, revision windows, and launch deadlines influence scheduling.</p>
        </li>
      </ul>
    </section>

    <section class="section" aria-labelledby="included-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Competitive</p>
      <h2 id="included-heading">Transparent Pricing</h2>
      <div class="panel mt-4">
        <ul class="stack-3" aria-label="Transparent Pricing features">
          <li>Get enterprise-quality survey programming without enterprise-agency overhead.</li>
          <li>Contact me for a custom quote based on your project scope and timeline.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="faq-heading" data-reveal>
      <p class="section-number" aria-hidden="true">FAQ</p>
      <h2 id="faq-heading">Frequently asked questions</h2>
      <div class="faq-list mt-4">
        <details class="faq-item" open>
          <summary>How fast can you turn a project around?</summary>
          <div class="faq-answer">Typical turnaround depends on questionnaire complexity, but many studies can be delivered within a few business days with clear specs.</div>
        </details>
        <details class="faq-item">
          <summary>Do you work with small or one-off studies?</summary>
          <div class="faq-answer">Yes. Small studies, pilot projects, and one-off deployments are supported alongside larger recurring engagements.</div>
        </details>
        <details class="faq-item">
          <summary>What survey platform do you use?</summary>
          <div class="faq-answer">LimeSurvey is the primary platform, with implementation patterns focused on reliable logic control and clean data output.</div>
        </details>
        <details class="faq-item">
          <summary>Can you handle multilingual surveys?</summary>
          <div class="faq-answer">Yes. Multilingual deployment workflows include locale setup, translation integration, and QA across language variants.</div>
        </details>
        <details class="faq-item">
          <summary>How do I get a quote?</summary>
          <div class="faq-answer">Send your project requirements through the inquiry page, including timeline and study scope, and you will receive a custom quote.</div>
        </details>
      </div>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="pricing-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="pricing-cta-heading">Get a custom quote</h2>
        <p>Tell me what your study requires and I will provide a clear, project-based estimate.</p>
      </div>
      <a class="btn-primary" href="inquiry.php">Get a Custom Quote</a>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>