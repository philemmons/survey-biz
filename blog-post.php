<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$posts = [
    [
        'id' => 1,
        'slug' => 'wcag-survey-response-rates',
        'title' => 'Why WCAG 2.1 Compliance Matters for Survey Response Rates',
        'category' => 'Accessibility',
        'excerpt' => 'Accessible survey design improves completion rates by reducing friction for keyboard and assistive-technology users.',
        'read_time' => '5 min',
        'date' => '2026-03-15',
    ],
    [
        'id' => 2,
        'slug' => 'multilingual-turnaround',
        'title' => 'How to Cut Multilingual Survey Turnaround from Weeks to Days',
        'category' => 'Deployment',
        'excerpt' => 'A practical deployment workflow for translation QA, launch sequencing, and rapid multi-country field readiness.',
        'read_time' => '6 min',
        'date' => '2026-02-20',
    ],
    [
        'id' => 3,
        'slug' => 'mobile-first-survey-design',
        'title' => 'Mobile-First Survey Design: What Researchers Get Wrong',
        'category' => 'Design',
        'excerpt' => 'Common mobile UX issues that hurt response quality and the design patterns that keep respondents moving.',
        'read_time' => '4 min',
        'date' => '2026-01-30',
    ],
    [
        'id' => 4,
        'slug' => 'limesurvey-platform-comparison',
        'title' => 'LimeSurvey vs. Other Platforms: A Programmer\'s Perspective',
        'category' => 'Research Ops',
        'excerpt' => 'A delivery-focused comparison of platform strengths, logic flexibility, and export readiness.',
        'read_time' => '7 min',
        'date' => '2025-12-10',
    ],
    [
        'id' => 5,
        'slug' => 'hiring-survey-programmer',
        'title' => 'What to Look for When Hiring a Freelance Survey Programmer',
        'category' => 'Research Ops',
        'excerpt' => 'A checklist for evaluating technical quality, communication style, and operational reliability before hiring.',
        'read_time' => '5 min',
        'date' => '2025-11-18',
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
            $published_date = date_create($selected_post['date']);
            echo $published_date ? sanitize_input($published_date->format('F j, Y')) : sanitize_input($selected_post['date']);
            ?>
          </time>
          | <?= sanitize_input($selected_post['read_time']); ?> read
        </p>

        <div class="stack-4 mt-4">
          <p>Replace with actual post content. This section should open with the core research operations challenge this article solves and why it matters for delivery outcomes.</p>
          <p>Replace with actual post content. Use this section for concrete implementation guidance, including examples from field deployment, QA workflow, and stakeholder communication.</p>
          <p>Replace with actual post content. Add practical steps readers can use immediately, including what to prioritize first and what to avoid under deadline pressure.</p>
          <p>Replace with actual post content. Close with a short recap and a bridge to related services for teams that need hands-on survey programming support.</p>
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
