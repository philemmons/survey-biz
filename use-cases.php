<?php
declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'Use Cases';
$meta_description = 'Survey programming use cases for market research firms, academic and institutional research, corporate and HR teams, and international studies.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="uc-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Use Cases</p>
      <h1 id="uc-hero-heading">The right fit for your research program</h1>
      <p class="hero-sub">From institutional studies to global enterprise campaigns, each engagement is structured for quality, accessibility, and dependable field performance.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="uc-cards-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Who This Fits</p>
      <h2 id="uc-cards-heading">Built for distinct delivery environments</h2>
      <p class="section-deck">Each use case is supported by the same canonical engineering and accessibility baseline.</p>
      <div class="notice-box mt-4" role="note">
        <p class="mb-3">Have a survey workflow that needs to hold up under real field conditions?</p>
        <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
      </div>
      <div class="post-grid">
        <article class="post-card" aria-labelledby="uc1-heading">
          <p class="tag">Market Research Firms</p>
          <h3 id="uc1-heading" class="mt-3">Market Research Firms</h3>
          <p class="card-body-text mt-2">This service supports firms running complex studies with advanced branching logic, quota control, and panel flow management. Projects scale smoothly across languages and markets with disciplined programming standards. Multilingual deployment is paired with reliable campaign operations through Mailgun outreach pipelines. The result is cleaner execution from launch through export.</p>
          <ul class="tag-list" aria-label="Market research tags">
            <li><span class="tag">LimeSurvey</span></li>
            <li><span class="tag">Branching Logic</span></li>
            <li><span class="tag">Mailgun</span></li>
            <li><span class="tag">List Segmentation</span></li>
            <li><span class="tag">Data Export</span></li>
          </ul>
        </article>

        <article class="post-card" aria-labelledby="uc2-heading">
          <p class="tag">Academic and Institutional Research</p>
          <h3 id="uc2-heading" class="mt-3">Academic and Institutional Research</h3>
          <p class="card-body-text mt-2">Accessibility requirements are addressed from the start with WCAG 2.1-informed implementation practices. Data collection flows can be configured for respondent privacy and anonymization requirements. Longitudinal and multi-wave study structures are maintained with consistent instrumentation over time. Deliverables include clean exports ready for SPSS or CSV-based analysis workflows.</p>
          <ul class="tag-list" aria-label="Academic tags">
            <li><span class="tag">WCAG 2.1</span></li>
            <li><span class="tag">Respondent Anonymization</span></li>
            <li><span class="tag">Multi-Wave Surveys</span></li>
            <li><span class="tag">Clean Data Export</span></li>
          </ul>
        </article>

        <article class="post-card" aria-labelledby="uc3-heading">
          <p class="tag">Corporate and HR Teams</p>
          <h3 id="uc3-heading" class="mt-3">Corporate and HR Teams</h3>
          <p class="card-body-text mt-2">Employee engagement programs benefit from branded survey environments aligned with internal communications. Mobile-responsive design supports participation from deskless and distributed teams across devices. Survey logic and flow are optimized to reduce drop-off while preserving question fidelity. Reporting can be segmented by department, business unit, or region for actionable visibility.</p>
          <ul class="tag-list" aria-label="Corporate tags">
            <li><span class="tag">Custom Branding</span></li>
            <li><span class="tag">Mobile-Responsive</span></li>
            <li><span class="tag">Employee Surveys</span></li>
            <li><span class="tag">Segmented Reporting</span></li>
          </ul>
        </article>

        <article class="post-card" aria-labelledby="uc4-heading">
          <p class="tag">International Studies</p>
          <h3 id="uc4-heading" class="mt-3">International Studies</h3>
          <p class="card-body-text mt-2">Global studies are managed through full-pipeline multilingual deployment across 130+ countries. Translation and QA workflows are coordinated to preserve meaning and survey consistency by locale. Mailgun campaign management supports distributed outreach and reminder sequencing. Regional fulfillment tracking keeps stakeholders informed on pace, coverage, and completion quality.</p>
          <ul class="tag-list" aria-label="International tags">
            <li><span class="tag">130+ Countries</span></li>
            <li><span class="tag">Multilingual Deployment</span></li>
            <li><span class="tag">3-Day Translation Turnaround</span></li>
            <li><span class="tag">Regional Tracking</span></li>
          </ul>
        </article>
      </div>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="use-cases-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="use-cases-cta-heading">Turn your use case into a launch-ready plan</h2>
        <p>Move from requirements and constraints to a practical survey build with direct technical guidance.</p>
      </div>
      <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
    </div>
  </section>

</main>
<?php include __DIR__ . '/includes/footer.php'; ?>

