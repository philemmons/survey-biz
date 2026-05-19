<?php

declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$posts = [
  [
    'id' => 1,
    'slug' => 'wcag-survey-response-rates',
    'title' => 'Why Accessibility Boosts Participation, Data Quality, and User Trust',
    'category' => 'Accessibility',
    'excerpt' => 'When survey response rates disappoint, teams typically reach for the same set of remedies: shorter questionnaires, more compelling subject lines, or a bigger incentive. These tactics are not wrong, but they all assume that the barrier is motivation. Often, the real barrier is access.',
    'read_time' => '5 min',
    'date' => '2026-05-13',
    'content_filepath' => __DIR__ . '/white_papers/content_for_id_1.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',
  ],
  [
    'id' => 2,
    'slug' => 'multilingual-turnaround',
    'title' => 'How to Cut Multilingual Survey Turnaround from Weeks to Days',
    'category' => 'Deployment',
    'excerpt' => 'Multilingual surveys often slow down because translation, programming, and quality assurance are treated as separate stages instead of a coordinated deployment workflow. Teams may have a stable questionnaire and experienced translators, yet still lose days to missing language strings, broken logic, inconsistent terminology, and repeated correction cycles. In large multi-country studies, those delays compound quickly.',
    'read_time' => '5 min',
    'date' => '2026-05-15',
    'content_filepath' => __DIR__ . '/white_papers/content_for_id_2.php',
    'pdf_filepath' => './pdf/Multilingual_Survey_Turnaround_2026.pdf',
  ],
  [
    'id' => 3,
    'slug' => 'mobile-first-survey-design',
    'title' => 'Mobile-First Survey Design: What Researchers Get Wrong',
    'category' => 'Design',
    'excerpt' => 'Common mobile UX issues that hurt response quality and the design patterns that keep respondents moving.',
    'read_time' => '4 min',
    'date' => '2026-01-30',
    'content_filepath' => __DIR__ . '/white_papers/content_for_id_3.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',

  ],
  [
    'id' => 4,
    'slug' => 'limesurvey-platform-comparison',
    'title' => 'LimeSurvey vs. Other Platforms: A Programmer\'s Perspective',
    'category' => 'Research Ops',
    'excerpt' => 'A delivery-focused comparison of platform strengths, logic flexibility, and export readiness.',
    'read_time' => '7 min',
    'date' => '2025-12-10',
    'content_filepath' => __DIR__ . '/white_papers/content_for_id_4.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',

  ],
  [
    'id' => 5,
    'slug' => 'hiring-survey-programmer',
    'title' => 'What It Is, Why It Matters, and How to Evaluate It',
    'category' => 'Research Ops',
    'excerpt' => 'Somewhere in the middle of a research cycle, after the questionnaire has been finalized, the sample sourced, and the launch window locked in, and a survey programmer sits down and begins turning that questionnaire into a live instrument. What happens in those hours matters more than most research teams realize.',
    'read_time' => '15 min',
    'date' => '2026-05-15',
    'content_filepath' => __DIR__ . '/white_papers/content_for_id_5.php',
    'pdf_filepath' => './pdf/Survey_Programming_Data_Quality_Discipline_2026.pdf',

  ],
];

$requested_slug = sanitize_input($_GET['slug'] ?? '');
$selected_post = null;
foreach ($posts as $candidate_post) {
  if ($candidate_post['slug'] === $requested_slug) {
    $selected_post = $candidate_post;
    break;
  }
}

if ($selected_post === null) {
  header('Location: 404.php');
  exit;
}

$page_title = $selected_post['title'];
$meta_description = $selected_post['excerpt'];
$canonical_url = rtrim(SITE_URL, '/') . '/insight-post?slug=' . urlencode((string) $selected_post['slug']);
$current_page = 'insights.php';
$page_stylesheets = [];
if ((int) ($selected_post['id'] ?? 0) === 1) {
  $page_stylesheets[] = 'css/whitepaper-id-1.css';
}
if ((int) ($selected_post['id'] ?? 0) === 2) {
  $page_stylesheets[] = 'css/whitepaper-id-2.css';
}
if ((int) ($selected_post['id'] ?? 0) === 5) {
  $page_stylesheets[] = 'css/whitepaper-id-5.css';
}

$published_date = date_create($selected_post['date']);
$content_filepath = $selected_post['content_filepath'] ?? '';

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="post-title">
    <div class="container">
      <p class="hero-eyebrow">Article</p>
      <h1 id="post-title"><?= sanitize_input($selected_post['title']); ?></h1>
      <p class="hero-sub"><?= sanitize_input($selected_post['excerpt']); ?></p>
    </div>
  </section>

  <div class="container">
    <section class="section">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="insights.php">Resources and Insights</a></li>
          <li aria-current="page"><?= sanitize_input($selected_post['title']); ?></li>
        </ol>
      </nav>

      <div class="panel">
        <div class="tag-list">
          <span class="tag"><?= sanitize_input($selected_post['category']); ?></span>
        </div>
        <p class="form-help mt-3">
          <time datetime="<?= sanitize_input($selected_post['date']); ?>">
            <?php
            echo $published_date ? sanitize_input($published_date->format('F j, Y')) : sanitize_input($selected_post['date']);
            ?>
          </time>
          | <?= sanitize_input($selected_post['read_time']); ?> read
        </p>

        <div class="stack-4 mt-4">
          <p><a class="btn-secondary" href="<?= sanitize_input($selected_post['pdf_filepath']); ?>" target="_blank">Read the PDF</a></p>
          <?php
          if (is_string($content_filepath) && $content_filepath !== '' && is_file($content_filepath)) {
            include $content_filepath;
          }
          ?>

        </div>
      </div>
    </section>

    <section class="section" aria-label="Work with philemmons.net">
      <div class="notice-box">
        <h2>Need help applying this to a live survey project?</h2>
        <p class="section-deck">Apply this approach to your next study with end-to-end programming, deployment, and launch QA support.</p>
        <p class="mt-4"><a href="inquiry.php" class="btn-primary">Send An Inquiry</a></p>
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

