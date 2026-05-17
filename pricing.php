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
      <p class="hero-sub">No retainers. No agency markup. A custom quote based on exactly what your study needs.
        <br><br>
        <strong>Survey programming</strong> sits at the intersection of research design and technical execution. The cost of a project reflects genuine scope — not package tiers built around the average project, and not hourly uncertainty that expands without limit.
      </p>
    </div>
  </section>

  <section class="proof-strip" aria-label="Key pricing metrics">
    <div class="container">
      <dl class="proof-grid">
        <div class="proof-item">

          <dt class="proof-num">$30-$80</dt>
          <dd class="proof-label">Typical hourly range for Qualtrics / platform specialists on Upwork in 2026</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num">$5K-$15K</dt>
          <dd class="proof-label">Baseline cost of a basic online survey project through a full-service agency</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num">20-50%</dt>
          <dd class="proof-label">Added overhead when routing through a research agency vs. a direct programmer</dd>
        </div>
        <div class="proof-item">
          <dt class="proof-num">3-5 days</dt>
          <dd class="proof-label">Typical turnaround for clearly-scoped studies without enterprise queues</dd>
        </div>
      </dl>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="factors-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Quote Inputs</p>
      <h2 id="factors-heading">What affects your quote</h2>
      <p class="section-deck">Scope is priced from delivery reality, not package tiers. Each factor below maps to real work: scripting hours, QA cycles, deployment tasks, and post-launch support. Understanding them helps you scope your project before submitting an inquiry.</p>
    </section>

    <section class="section" aria-labelledby="s1-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">01</p>
          <p class="feature-title" id='s1-heading'>Question count and section depth</p>
          <p class="card-body-text">Total questionnaire length is the most straightforward cost driver. Each question requires scripting, input-type configuration, validation rules, and QA verification. Section depth and advanced structures such as randomization or carry-forward logic multiply that work.</p>
          <p class="pricing-factor-note"><strong>Market context:</strong> Basic agency-led survey projects often start around $5K-$15K, with programming and QA as major pre-fieldwork cost drivers.</p>
        </div>

      </div>
    </section>

    <section class="section" aria-labelledby="s2-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">02</p>
          <p class="feature-title" id='s2-heading'>Logic complexity</p>
          <p class="card-body-text">Branching, skip patterns, display logic, piping, quota management, and custom validations each add implementation and test scope. Complex logic can require dedicated QA cycles to protect data quality before launch.</p>
          <p class="pricing-factor-note"><strong>Why it matters:</strong> Logic errors are expensive after fielding begins, so pricing reflects preventive QA effort up front.</p>
        </div>

      </div>
    </section>

    <section class="section" aria-labelledby="s3-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">03</p>
          <p class="feature-title" id='s3-heading'>Languages required</p>
          <p class="card-body-text">Additional languages increase effort through locale setup, translation integration, and QA across each variant for display, encoding, and logic parity. Right-to-left and non-Latin support can add technical complexity.</p>
          <p class="pricing-factor-note"><strong>Market context:</strong> Multilingual and multi-market projects command premium pricing at agency level; direct programming keeps scope-focused costs clearer.</p>
        </div>

      </div>
    </section>


    <section class="section" aria-labelledby="s4-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">04</p>
          <p class="feature-title" id='s4-heading'>Deployment and outreach scope</p>
          <p class="card-body-text">Programming and deployment are different scopes. Contact upload, segmentation, invite/reminder workflows, token handling, and operational setup can significantly expand project effort.</p>
          <p class="pricing-factor-note"><strong>What this covers:</strong> Participant management and outreach workflows are scoped explicitly so launch operations are predictable.</p>
        </div>

      </div>
    </section>


    <section class="section" aria-labelledby="s5-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">05</p>
          <p class="feature-title" id='s5-heading'>Reporting and dashboard setup</p>
          <p class="card-body-text">Live progress tracking, stakeholder dashboards, and tailored exports are configured deliverables, not automatic defaults. Reporting needs influence both build scope and post-launch support.</p>
          <p class="pricing-factor-note"><strong>Market context:</strong> Clear reporting architecture during build reduces downstream rework and external reporting costs.</p>
        </div>

      </div>
    </section>


    <section class="section" aria-labelledby="s6-heading" data-reveal>
      <div class="pricing-factor-list mt-4">

        <div class="panel pricing-factor">
          <p class="section-number pricing-factor-number" aria-hidden="true">06</p>
          <p class="feature-title" id='s6-heading'>Timeline and turnaround</p>
          <p class="card-body-text">Compressed windows, weekend launches, and multiple concurrent studies require schedule prioritization. A finalized questionnaire and consolidated feedback cycle typically lowers both timeline risk and cost.</p>
          <p class="pricing-factor-note"><strong>Practical note:</strong> The fastest path is complete specs at kickoff: finalized wording, logic rules, sample targets, and launch constraints.</p>
        </div>
        
      </div>
    </section>

    <section class="section" aria-labelledby="included-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Competitive</p>
      <h2 id="included-heading">Transparent pricing and competitive comparison</h2>
      <p class="section-deck">Understanding where direct project-based programming fits relative to hourly freelancers and full-service agencies helps you choose the right sourcing model for your study.</p>
      <div class="pricing-range mt-4" aria-label="Pricing range comparison">
        <div class="pricing-range-item">
          <p class="pricing-range-label">Freelance platform specialist (hourly)</p>
          <p class="pricing-range-value">$30-$80 / hr</p>
        </div>
        <div class="pricing-range-item">
          <p class="pricing-range-label">Basic survey project (agency, end-to-end)</p>
          <p class="pricing-range-value">$5K-$15K</p>
        </div>
        <div class="pricing-range-item">
          <p class="pricing-range-label">Enterprise platform license (annual)</p>
          <p class="pricing-range-value">$5K-$100K+</p>
        </div>
        <div class="pricing-range-item">
          <p class="pricing-range-label">Typical agency overhead</p>
          <p class="pricing-range-value">+20-50%</p>
        </div>
      </div>
      <h3 id="comparison-cards-heading" class="pricing-subheading mt-4">Comparison cards</h3>
      <div class="pricing-compare-grid mt-4" aria-labelledby="comparison-cards-heading">
        <article class="panel pricing-compare-card">
          <p class="section-number pricing-card-label" aria-hidden="true">Option</p>
          <h4>Hourly platform freelancer</h4>
          <ul class="stack-3">
            <li>Hourly variability means scope creep can expand total cost.</li>
            <li>Platform marketplace fees and inconsistent availability are common.</li>
            <li>Delivery accountability varies by provider and engagement model.</li>
          </ul>
        </article>
        <article class="panel pricing-compare-card">
          <p class="section-number pricing-card-label" aria-hidden="true">Option</p>
          <h4>Full-service research agency</h4>
          <ul class="stack-3">
            <li>Overhead and internal layers increase total cost and turnaround.</li>
            <li>Minimum project sizes can exclude pilot or one-off studies.</li>
            <li>Licensing and account-management costs are typically passed through.</li>
          </ul>
        </article>
        <article class="panel pricing-compare-card is-featured">
          <p class="section-number pricing-card-label" aria-hidden="true">This Service</p>
          <h4>Project-based independent programming</h4>
          <ul class="stack-3">
            <li>Fixed project quotes support budget certainty and scope clarity.</li>
            <li>No retainer requirement and no agency markup layer.</li>
            <li>Direct collaboration with the programmer for faster decision cycles.</li>
            <li>Small, one-off, and recurring studies are all supported.</li>
          </ul>
        </article>
      </div>
      <p class="pricing-limesurvey-note mt-4"><strong>LimeSurvey as the primary platform</strong> provides a meaningful cost advantage because it is open-source, avoids enterprise lock-in, and keeps pricing focused on implementation quality rather than platform rent.</p>
    </section>

    <section class="section" aria-labelledby="faq-heading" data-reveal>
      <p class="section-number" aria-hidden="true">FAQ</p>
      <h2 id="faq-heading">Frequently asked questions</h2>
      <div class="faq-list mt-4">
        <details class="faq-item">
          <summary>How fast can you turn a project around?</summary>
          <div class="faq-answer">
            <p>Many studies can be delivered in two to three business days when the questionnaire and logic are finalized at kickoff.</p>
            <p>Complex studies with extensive logic, multilingual scope, or custom validation usually require longer QA cycles.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>Do you work with small or one-off studies?</summary>
          <div class="faq-answer">
            <p>Yes. Pilot studies, one-off deployments, and internal pulse projects are all supported.</p>
            <p>Quotes reflect actual project scope instead of minimum billing thresholds.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>What survey platform do you use, and why?</summary>
          <div class="faq-answer">
            <p>LimeSurvey is the primary platform because it supports advanced logic, multilingual deployment, participant management, and custom styling without enterprise licensing overhead.</p>
            <p>This keeps project budgets focused on delivery quality rather than annual platform contracts.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>Can you handle multilingual surveys?</summary>
          <div class="faq-answer">
            <p>Yes. Multilingual scope includes locale setup, translation integration, encoding verification, and QA for logic parity in each language version.</p>
            <p>Translation content can be provided by your team or translation partner.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>What do you need from me to provide a quote?</summary>
          <div class="faq-answer">
            <p>Share your questionnaire draft or outline, logic requirements, language scope, launch timeline, and deployment/reporting needs.</p>
            <p>A working draft is enough to provide a practical estimate.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>How does project-based pricing compare to hourly billing?</summary>
          <div class="faq-answer">
            <p>Project-based pricing defines scope and price together, improving budget predictability.</p>
            <p>Hourly billing can expand with each clarification or revision and is harder to forecast for fixed-study budgets.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>What happens if I need changes after launch?</summary>
          <div class="faq-answer">
            <p>Post-launch changes are scoped separately. Cosmetic updates are usually straightforward, while logic changes are evaluated carefully to protect data integrity.</p>
            <p>A defined pre-launch QA window helps reduce late-stage change requests.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>How does this compare to doing it in-house with a DIY tool?</summary>
          <div class="faq-answer">
            <p>DIY tools are often sufficient for simple questionnaires. Complex logic, multilingual control, quota management, and robust QA workflows usually require a more specialized build process.</p>
            <p>When data quality drives business decisions, implementation reliability becomes a cost-control decision, not just a technical preference.</p>
          </div>
        </details>
      </div>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="pricing-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="pricing-cta-heading">Get a custom quote</h2>
        <p>Tell me what your study requires and I will provide a clear, project-based estimate with no obligation.</p>
      </div>
      <a class="btn-primary" href="inquiry.php">Get a Custom Quote</a>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>