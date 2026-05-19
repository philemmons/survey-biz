<?php

declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$practices = [
  [
    'title' => 'Access Control Configuration',
    'body' => 'LimeSurvey deployments configured with token-based respondent access, authentication scoping, and permission controls.',
  ],
  [
    'title' => 'Respondent Anonymization',
    'body' => 'Surveys configured to collect no personally identifiable information where studies require it.',
  ],
  [
    'title' => 'Clean Code, No Plugin Bloat',
    'body' => 'No fragile third-party dependencies that introduce vulnerabilities or unpredictable behavior.',
  ],
  [
    'title' => 'WCAG 2.1 As a Baseline',
    'body' => 'Accessibility compliance is standard on every build, tested before any survey reaches a respondent.',
  ],
  [
    'title' => 'Secure Data Lifecycle',
    'body' => 'Participant data is protected through collection, storage, and handoff to your team\'s existing tooling.',
  ],
];

$page_title = 'Security & Data Practices';
$meta_description = 'How Phillip Emmons protects your research data - access controls, anonymization, clean code, and WCAG 2.1 compliance on every survey build.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="sec-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Security</p>
      <h1 id="sec-hero-heading">Security and data practices</h1>
      <p class="hero-sub">What to expect when research data is handled by this service.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="practices-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Security Model</p>
      <h2 id="practices-heading">How your data is protected</h2>
      <ul class="icon-grid mt-4" aria-label="Security practices">
        <?php foreach ($practices as $practice_index => $practice): ?>
          <li class="icon-card" aria-labelledby="practice-<?= (int) $practice_index; ?>-heading">
            <h3 id="practice-<?= (int) $practice_index; ?>-heading"><?= sanitize_input($practice['title']); ?></h3>
            <p class="card-body-text"><?= sanitize_input($practice['body']); ?></p>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="notice-box mt-5" role="note">
        <p class="mb-3">Have compliance or data requirements for your study? Include them in your inquiry for direct review.</p>
        <a href="inquiry.php" class="btn-primary">Send An Inquiry About a Secure Survey Build</a>
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

