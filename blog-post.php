<?php

declare(strict_types=1);

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
    'content_filepath' => __DIR__ . '/blogs/content_for_id_1.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',
  ],
  [
    'id' => 2,
    'slug' => 'multilingual-turnaround',
    'title' => 'How to Cut Multilingual Survey Turnaround from Weeks to Days',
    'category' => 'Deployment',
    'excerpt' => 'A practical deployment workflow for translation QA, launch sequencing, and rapid multi-country field readiness.',
    'read_time' => '6 min',
    'date' => '2026-02-20',
    'content_filepath' => __DIR__ . '/blogs/content_for_id_1.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',
  ],
  [
    'id' => 3,
    'slug' => 'mobile-first-survey-design',
    'title' => 'Mobile-First Survey Design: What Researchers Get Wrong',
    'category' => 'Design',
    'excerpt' => 'Common mobile UX issues that hurt response quality and the design patterns that keep respondents moving.',
    'read_time' => '4 min',
    'date' => '2026-01-30',
    'content_filepath' => __DIR__ . '/blogs/content_for_id_1.php',
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
    'content_filepath' => __DIR__ . '/blogs/content_for_id_4.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',

  ],
  [
    'id' => 5,
    'slug' => 'hiring-survey-programmer',
    'title' => 'What to Look for When Hiring a Freelance Survey Programmer',
    'category' => 'Research Ops',
    'excerpt' => 'A checklist for evaluating technical quality, communication style, and operational reliability before hiring.',
    'read_time' => '5 min',
    'date' => '2025-11-18',
    'content_filepath' => __DIR__ . '/blogs/content_for_id_1.php',
    'pdf_filepath' => './pdf/WCAG_21_Survey_Response_Rates_2026.pdf',

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
$canonical_url = rtrim(SITE_URL, '/') . '/blog-post?slug=' . urlencode((string) $selected_post['slug']);
$current_page = 'blog.php';

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
    <section class="section" data-reveal>
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="blog.php">Resources and Insights</a></li>
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

    <section class="section" aria-label="Work with Phillip" data-reveal>
      <div class="notice-box">
        <h2>Ready to put this into practice?</h2>
        <p class="section-deck">If you want help applying this approach to your next study, I can support programming, deployment, and launch QA end to end.</p>
        <p class="mt-4"><a href="inquiry.php" class="btn-primary">Start a Project</a></p>
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
