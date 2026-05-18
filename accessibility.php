<?php

declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'Accessibility Statement';
$meta_description = 'Review the accessibility commitment for survey.philemmons.net, including WCAG 2.1 AA-oriented practices, keyboard support, and how to report access barriers.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="accessibility-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Trust</p>
      <h1 id="accessibility-hero-heading">Accessibility Statement</h1>
      <p class="hero-sub">A commitment to usable, accessible experiences for researchers, buyers, and partners.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="accessibility-commitment-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Commitment</p>
      <h2 id="accessibility-commitment-heading">Accessibility goals for this website</h2>
      <p class="section-deck">Effective date: May 18, 2026</p>
      <div class="stack-4 mt-4 measure">
        <p>This website aims to support accessible use across devices and browsers, following WCAG 2.1 AA principles where practical for content, structure, and interaction patterns.</p>
        <p>Accessibility is treated as an ongoing process, with continued review and refinement as content and features evolve.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="accessibility-support-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Current Support</p>
      <h2 id="accessibility-support-heading">What the site is designed to support</h2>
      <ul class="icon-grid mt-4" aria-label="Accessibility support areas">
        <li class="icon-card">
          <h3>Semantic structure</h3>
          <p class="card-body-text">Page headings, section structure, and landmark usage are designed to support assistive technologies.</p>
        </li>
        <li class="icon-card">
          <h3>Keyboard navigation</h3>
          <p class="card-body-text">Navigation, links, forms, and key controls are designed to be usable by keyboard input.</p>
        </li>
        <li class="icon-card">
          <h3>Readable contrast</h3>
          <p class="card-body-text">Typography and color choices are selected to improve legibility across content states and screen sizes.</p>
        </li>
        <li class="icon-card">
          <h3>Responsive layouts</h3>
          <p class="card-body-text">Content is designed to adapt across desktop and mobile viewports without hiding primary tasks.</p>
        </li>
      </ul>
    </section>

    <section class="section" aria-labelledby="accessibility-feedback-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Feedback</p>
      <h2 id="accessibility-feedback-heading">Report an accessibility barrier</h2>
      <div class="stack-4 measure">
        <p>If you encounter an accessibility issue, please use the <a href="inquiry.php">Inquiry page</a> so the problem can be reviewed and prioritized.</p>
        <p>Including these details helps speed up resolution:</p>
        <ul>
          <li>The page URL where the issue occurred.</li>
          <li>Your device and browser version.</li>
          <li>Any assistive technology in use, if relevant.</li>
          <li>A short description of what happened and what you expected.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="accessibility-related-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Related Pages</p>
      <h2 id="accessibility-related-heading">Related trust and service information</h2>
      <div class="notice-box stack-4 measure" role="note">
        <p>Accessibility work is closely tied to survey build quality and delivery outcomes. See <a href="services.php">Services</a> for implementation context and <a href="security.php">Security</a> for data handling practices.</p>
        <p>Privacy handling details are also available in the <a href="privacy.php">Privacy Policy</a>.</p>
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
