<?php

declare(strict_types=1);
$page_title = 'Survey Programming & Deployment';
$meta_description = 'Professional survey programming and deployment by Phillip Emmons - WCAG 2.1 compliant, mobile-responsive, multilingual. Based in Marina, CA.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="hero-heading">
    <div class="container">
      <p class="hero-eyebrow" aria-hidden="true">Survey Programming & Deployment</p>
      <h1 id="hero-heading">Enterprise-grade surveys built to collect cleaner data, reach more respondents, and hold up at scale.</h1>
      <p class="hero-sub">I've programmed and deployed surveys to a 185,000-member international research panel across 80+ countries. Every survey I build carries that same operational discipline — accurate, accessible, and ready to perform on day one.</p>
      <p class="mt-5"><a class="btn-primary" href="inquiry.php">Send an Inquiry</a></p>
      <ul class="trust-row" aria-label="Trust markers">
        <li class="trust-marker">80+ Countries</li>
        <li class="trust-marker">Direct Operator Access</li>
        <li class="trust-marker">B2B Aligned</li>
      </ul>
    </div>
  </section>

  <section class="proof-strip" aria-label="Key performance metrics">
    <div class="container">
      <dl class="proof-grid">
        <div class="proof-item">
          <dt class="proof-label">Panel Members</dt>
          <dd class="proof-num" data-count-to="185" data-suffix=",000+">185,000+</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Countries Served</dt>
          <dd class="proof-num" data-count-to="80" data-suffix="+">80+</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Campaigns per Year</dt>
          <dd class="proof-num">16-25</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-label">Multilingual Translation Turnaround</dt>
          <dd class="proof-num">3-5 Days</dd>
        </div>
      </dl>
    </div>
  </section>

  <div class="container">
    <div class="intro" aria-label="Service overview" data-reveal>
      <p class="intro-text">In a research environment where a poorly structured question, an inaccessible layout, or a slow-loading page can silently kill your response rate, the quality of your survey programming matters. I specialize in building surveys that remove every technical barrier between your questions and your data — across devices, languages, and audiences.</p>
    </div>

    <section class="section" aria-labelledby="services-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Services Preview</p>
      <h2 id="services-heading">What I can build for your team</h2>
      <p class="section-deck">Execution-ready components drawn from recurring enterprise delivery workflows.</p>
      <ul class="feature-list" aria-label="Services preview">
        <li class="feature-card">
          <p class="feature-title">Professional Survey Programming</p>
          <p class="feature-body">Complex branching, piping, randomization, quota management, and response validation.</p>
          <p class="mt-3 px-1"><a href="services.php#s1">Explore survey programming and logic services</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Accessible & High-Performance Design</p>
          <p class="feature-body">Mobile-first layouts and accessible interaction patterns that support diverse respondents.</p>
          <p class="mt-3 px-1"><a href="services.php#s2">Learn about accessible and responsive survey design</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Multilingual Deployment & Outreach</p>
          <p class="feature-body">Multi-country fielding with localized language handling and deployment consistency.</p>
          <p class="mt-3 px-1"><a href="services.php#s3">See multilingual deployment capabilities</a></p>
        </li>
        <li class="feature-card">
          <p class="feature-title">Real-Time Tracking & Data Reporting</p>
          <p class="feature-body">Field monitoring and delivery workflows to keep campaigns on schedule and on target.</p>
          <p class="mt-3 px-1"><a href="services.php#s4">Review real-time tracking and reporting support</a></p>
        </li>
      </ul>
    </section>

    <section class="section" aria-labelledby="why-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Why Work With Me</p>
      <h2 id="why-heading">Grounded in real research operations</h2>
      <p class="section-deck">You get direct accountability, technical precision, and launch discipline on every project.</p>
      <ul class="icon-grid" aria-label="Key differentiators">
        <li class="icon-card">
          <h3>Direct Accountability, No Middlemen</h3>
          <p class="card-body-text">You work directly with me — the person who builds and deploys your survey. No account managers relaying messages, no handoffs between teams.</p>
        </li>
        <li class="icon-card">
          <h3>Enterprise-Tested at International Scale</h3>
          <p class="card-body-text">I've programmed and deployed surveys to a 185,000-member panel spanning 80+ countries. If your study is smaller than that, I have the capacity and the experience to handle it without issue.</p>
        </li>
        <li class="icon-card">
          <h3>Accessibility Built In, Not Bolted On</h3>
          <p class="card-body-text">WCAG 2.1 compliance is part of every build — not an add-on. Every survey I deliver is tested for accessibility before it reaches a single respondent.</p>
        </li>
        <li class="icon-card">
          <h3>Competitive, Transparent Pricing</h3>
          <p class="card-body-text">Get enterprise-quality survey programming without enterprise-agency overhead. Contact me for a custom quote based on your project scope and timeline.</p>
        </li>
      </ul>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="cta-heading">Ready to launch a better survey experience?</h2>
        <p>Let's discuss your questionnaire, timeline, and fielding goals.</p>
      </div>
      <a class="btn-primary" href="inquiry.php">Send an Inquiry</a>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>