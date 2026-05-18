<?php

declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'Services';
$meta_description = 'Four core service areas: survey programming and logic, accessible high-performance design, multilingual deployment and outreach, and real-time tracking and reporting.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="services-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Service Framework</p>
      <h1 id="services-hero-heading">Custom Survey Design & Data Collection</h1>
      <p class="hero-sub">End-to-end survey programming services built for accessibility, speed, international reach, and reporting clarity.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-label="Service navigation" data-reveal>
      <div class="panel">
        <p class="card-title">Jump to a section</p>
        <p class="card-body-text mb-3">Use these anchors to move through each delivery area.</p>
        <ul class="tag-list">
          <li><a class="tag" href="#s1">Professional Survey Programming</a></li>
          <li><a class="tag" href="#s2">Accessible & High-Performance Design</a></li>
          <li><a class="tag" href="#s3">Multilingual Deployment & Outreach</a></li>
          <li><a class="tag" href="#s4">Real-Time Tracking & Data Reporting</a></li>
        </ul>
      </div>
    </section>

    <section id="s1" class="section" aria-labelledby="s1-heading" data-reveal>
      <p class="section-number" aria-hidden="true">01</p>
      <h2 id="s1-heading">Professional Survey Programming</h2>
      <p class="section-deck">Your research questions deserve more than a form builder. I program surveys in LimeSurvey with the logic and structure that serious data collection requires.</p>
      <ul class="feature-list" aria-label="Survey programming services">
        <li class="feature-card">
          <p class="feature-title">Advanced Branching & Skip Logic</p>
          <p class="feature-body">Respondents see only the questions relevant to them. Conditional routing keeps surveys focused, reduces fatigue, and protects data integrity across complex, multi-path instruments.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Multi-Format Question Design</p>
          <p class="feature-body">Likert scales, multiple-choice, matrix grids, open-ended, and ranking questions — selected and structured to match your research objectives, not forced into a one-size template.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Multi-Phase & Daisy-Chained Surveys</p>
          <p class="feature-body">I've maintained up to five concurrently active, chained surveys in support of continuous research programs. If your study has multiple waves or rollover logic, I've built it before.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Custom Branding & Visual Design</p>
          <p class="feature-body">Survey layouts styled to match your organization's colors, typography, and brand identity - so respondents experience a consistent, professional presence from invitation to completion.</p>
        </li>
      </ul>
      <ul class="tag-list" aria-label="Survey logic tags">
        <li><span class="tag">LimeSurvey</span></li>
        <li><span class="tag">Conditional Logic</span></li>
        <li><span class="tag">Skip Logic</span></li>
        <li><span class="tag">Likert Scales</span></li>
        <li><span class="tag">Matrix Questions</span></li>
        <li><span class="tag">Open-Ended Response</span></li>
      </ul>
    </section>

    <section id="s2" class="section" aria-labelledby="s2-heading" data-reveal>
      <p class="section-number" aria-hidden="true">02</p>
      <h2 id="s2-heading">Accessible & High-Performance Design</h2>
      <p class="section-deck">Surveys that exclude users — or load slowly — cost you responses. Every survey I build is tested for accessibility and optimized for performance before it goes live.</p>
      <ul class="feature-list" aria-label="Accessibility and performance services">
        <li class="feature-card">
          <p class="feature-title">WCAG 2.1 Compliance</p>
          <p class="feature-body">Surveys are verified against WCAG 2.1 guidelines through both automated and manual testing — covering keyboard navigation, screen reader compatibility, color contrast, and focus management — ensuring participation is open to users with disabilities.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Mobile-Responsive Layouts</p>
          <p class="feature-body">Surveys are built and tested to function correctly across smartphones, tablets, and desktops. With most respondents on mobile, a layout that breaks on a small screen is a response you won't get back.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Cross-Browser & Cross-Device Testing</p>
          <p class="feature-body">Surveys are validated across commonly used browsers and devices before launch, so platform inconsistencies don't become data collection gaps.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Clean, Reliable Code</p>
          <p class="feature-body">Surveys are built to industry best practices — no plugin bloat, no fragile dependencies. Reliable code means predictable behavior on every submission, and zero data loss from technical failures.</p>
        </li>
      </ul>
      <ul class="tag-list" aria-label="Accessibility tags">
        <li><span class="tag">WCAG 2.1</span></li>
        <li><span class="tag">Mobile-Responsive</span></li>
        <li><span class="tag">PageSpeed Insights</span></li>
        <li><span class="tag">Keyboard Navigation</span></li>
        <li><span class="tag">Screen Reader Compatible</span></li>
      </ul>
    </section>

    <section id="s3" class="section" aria-labelledby="s3-heading" data-reveal>
      <p class="section-number" aria-hidden="true">03</p>
      <h2 id="s3-heading">Multilingual Deployment & Outreach</h2>
      <p class="section-deck">Reaching a global or bilingual audience requires more than a translation file. I've built and managed the full end-to-end outreach pipeline for international research programs.</p>
      <ul class="feature-list" aria-label="Deployment and outreach services">
        <li class="feature-card">
          <p class="feature-title">Multilingual Survey Delivery</p>
          <p class="feature-body">Surveys deployed in respondents' native languages across 130+ countries. I've managed the full translation workflow — from template standardization to final QA — cutting translation turnaround from three weeks to three days.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Email Campaign Management via Mailgun</p>
          <p class="feature-body">I've executed 16 to 25 targeted survey outreach campaigns per year using the Mailgun API, managing list segmentation, delivery, and bounce handling to maintain high deliverability to research panels.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Secure Data Collection</p>
          <p class="feature-body">Surveys are configured with appropriate access controls, respondent anonymization where required, and data security measures that protect participant information throughout the collection and storage lifecycle.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Smooth Survey Launch</p>
          <p class="feature-body">I manage all pre-launch testing and configuration so your survey goes live correctly the first time — with no broken logic, missing translations, or surprise formatting issues on launch day.</p>
        </li>
      </ul>
      <ul class="tag-list" aria-label="Deployment tags">
        <li><span class="tag">Mailgun API</span></li>
        <li><span class="tag">Multilingual Deployment</span></li>
        <li><span class="tag">130+ Countries</span></li>
        <li><span class="tag">Email Campaign Management</span></li>
        <li><span class="tag">List Segmentation</span></li>
      </ul>
    </section>

    <section id="s4" class="section" aria-labelledby="s4-heading" data-reveal>
      <p class="section-number" aria-hidden="true">04</p>
      <h2 id="s4-heading">Real-Time Tracking & Data Reporting</h2>
      <p class="section-deck">Data collection doesn't end at deployment. I provide the tracking and reporting infrastructure your team needs to monitor progress and act on results quickly.</p>
      <ul class="feature-list" aria-label="Reporting services">
        <li class="feature-card">
          <p class="feature-title">Daily Progress Monitoring</p>
          <p class="feature-body">I've tracked survey fulfillment counts and completion rates daily throughout active campaigns — by geographic region and respondent segment — keeping research programs on schedule and on quota.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Shared Dashboards & Visualizations</p>
          <p class="feature-body">Results are compiled into shared Google Sheets with charts and graphs so your team can review progress at a glance without waiting for a formal report.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Segmented Performance Analysis</p>
          <p class="feature-body">Completion and fulfillment data broken out by region, developer type, or other relevant segments — giving you the detail needed to manage field quotas and adjust outreach mid-campaign.</p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Flexible Data Export</p>
          <p class="feature-body">Survey data exported in the formats your analytics or CRM workflow requires, so results move smoothly from LimeSurvey into your team's existing tooling without manual reformatting.</p>
        </li>
      </ul>
      <ul class="tag-list" aria-label="Reporting tags">
        <li><span class="tag">LimeSurvey Reporting</span></li>
        <li><span class="tag">Google Sheets</span></li>
        <li><span class="tag">Data Visualization</span></li>
        <li><span class="tag">Regional Segmentation</span></li>
        <li><span class="tag">Data Export</span></li>
      </ul>
    </section>

    <section class="section" aria-labelledby="why-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Why Work With Me</p>
      <h2 id="why-heading">Grounded in real research operations</h2>
      <p class="section-deck">These are proven systems, not theory, built under real delivery pressure.</p>
      <ul class="icon-grid" aria-label="Differentiators">
        <li class="icon-card">
          <h3>Direct Accountability</h3>
          <p class="card-body-text">You work directly with the developer responsible for implementation quality and delivery.</p>
        </li>
        <li class="icon-card">
          <h3>International Scale</h3>
          <p class="card-body-text">Processes and tooling prepared for multilingual, multi-region research initiatives.</p>
        </li>
        <li class="icon-card">
          <h3>Accessibility Built In</h3>
          <p class="card-body-text">Inclusive interaction patterns are integrated throughout planning, build, and QA.</p>
        </li>
        <li class="icon-card">
          <h3>Transparent Pricing</h3>
          <p class="card-body-text">Project scope, timelines, and pricing are communicated clearly from the start.</p>
        </li>
      </ul>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="services-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="services-cta-heading">Need a survey built to exact specifications?</h2>
        <p>Share your questionnaire and timeline, and I will outline the best deployment path.</p>
      </div>
      <a href="inquiry.php" class="btn-primary">Send an Inquiry</a>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>