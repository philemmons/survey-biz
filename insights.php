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
    ],
    [
        'id' => 2,
        'slug' => 'multilingual-turnaround',
        'title' => 'How to Cut Multilingual Survey Turnaround from Weeks to Days',
        'category' => 'Deployment',
        'excerpt' => 'Multilingual surveys often slow down because translation, programming, and quality assurance are treated as separate stages instead of a coordinated deployment workflow. Teams may have a stable questionnaire and experienced translators, yet still lose days to missing language strings, broken logic, inconsistent terminology, and repeated correction cycles. In large multi-country studies, those delays compound quickly.',
        'read_time' => '5 min',
        'date' => '2026-05-15',
    ],
    [
        'id' => 3,
        'slug' => 'mobile-first-survey-design',
        'title' => 'Mobile-First Survey Design: What Researchers Get Wrong',
        'category' => 'Design',
        'excerpt' => 'Common mobile UX issues that hurt response quality and the design patterns that keep respondents moving.',
        'read_time' => '7 min',
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
        'title' => 'What It Is, Why It Matters, and How to Evaluate It',
        'category' => 'Research Ops',
        'excerpt' => 'Somewhere in the middle of a research cycle, after the questionnaire has been finalized, the sample sourced, and the launch window locked in, and a survey programmer sits down and begins turning that questionnaire into a live instrument. What happens in those hours matters more than most research teams realize.',
        'read_time' => '15 min',
        'date' => '2026-05-15',
    ],
];

$categories = ['All', 'Accessibility', 'Deployment', 'Design', 'Research Ops'];
$active_category = sanitize_input($_GET['cat'] ?? 'All');
if (!in_array($active_category, $categories, true)) {
    $active_category = 'All';
}

$filtered_posts = array_values(array_filter($posts, static function (array $post) use ($active_category): bool {
    return $active_category === 'All' || $post['category'] === $active_category;
}));

$page_title = 'Resources & Insights';
$meta_description = 'Practical guidance on survey programming, accessibility, and field research operations from Phillip Emmons.';
$current_page = basename(__FILE__);

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="insight-heading">
    <div class="container">
      <p class="hero-eyebrow" aria-hidden="true">Insights</p>
      <h1 id="insight-heading">Resources and insights</h1>
      <p class="hero-sub">Practical guidance on survey programming, accessibility, and research operations from real delivery work.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" data-reveal>
      <p class="section-number" aria-hidden="true">Browse by Category</p>
      <ul class="tag-list" aria-label="Filter posts by category">
        <?php foreach ($categories as $category): ?>
          <?php $is_active_category = $active_category === $category; ?>
          <li><a href="insights.php?cat=<?= urlencode($category); ?>" class="tag" <?= $is_active_category ? 'aria-current="page"' : ''; ?>><?= sanitize_input($category); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>

    <section class="section" aria-labelledby="posts-heading" data-reveal>
      <h2 id="posts-heading" class="sr-only">Articles</h2>
      <?php if ($filtered_posts !== []): ?>
        <div class="post-grid">
          <?php foreach ($filtered_posts as $post): ?>
            <article class="post-card" aria-labelledby="post-<?= (int) $post['id']; ?>-title">
              <ul class="tag-list" aria-label="Post metadata">
                <li><span class="tag"><?= sanitize_input($post['category']); ?></span></li>
                <li><span class="tag">
                  <time datetime="<?= sanitize_input($post['date']); ?>">
                    <?php
                    $published_date = date_create($post['date']);
                    echo $published_date ? sanitize_input($published_date->format('F j, Y')) : sanitize_input($post['date']);
                    ?>
                  </time>
                </span></li>
              </ul>
              <h3 id="post-<?= (int) $post['id']; ?>-title" class="mt-4 mb-3"><?= sanitize_input($post['title']); ?></h3>
              <p class="card-body-text"><?= sanitize_input($post['excerpt']); ?></p>
              <p class="section-deck"><?= sanitize_input($post['read_time']); ?> read</p>
              <p class="mt-4"><a class="btn-secondary" href="insight-post.php?slug=<?= urlencode($post['slug']); ?>">Read Article</a></p>
            </article>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="alert alert-info" role="status">No articles found in this category yet.</div>
      <?php endif; ?>
    </section>

  </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

