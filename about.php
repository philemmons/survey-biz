<?php

declare(strict_types=1); /* BEWARE THE BOM */
$current_page = basename(__FILE__);
$page_stylesheets = ['css/about.css'];
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero about-hero" aria-labelledby="about-hero-heading">
    <div class="container about-hero-inner">
      <p class="hero-eyebrow">About Phillip Emmons</p>
      <h1 id="about-hero-heading">Survey Programmer,<br><em>Deployment Specialist</em></h1>
      <p class="hero-sub">Enterprise-grade survey programming and fielding from a single accountable operator. No handoffs. No account managers. Direct access to the person building your survey from day one.</p>
      <dl class="about-stat-grid" aria-label="Practice highlights">
        <div class="about-stat">
          <dt>100,000+</dt>
          <dd>Panel Members Reached</dd>
        </div>
        <div class="about-stat">
          <dt>130+</dt>
          <dd>Countries Served</dd>
        </div>
        <div class="about-stat">
          <dt>5+</dt>
          <dd>Concurrent Surveys Managed</dd>
        </div>
        <div class="about-stat">
          <dt>3&ndash;5 Days</dt>
          <dd>Multilingual Turnaround</dd>
        </div>
      </dl>
    </div>
  </section>

  <section class="section about-section-alt" aria-labelledby="bio-heading" data-reveal>
    <div class="container about-two-col">
      <div class="about-copy">
        <p class="section-number" aria-hidden="true">Background</p>
        <h2 id="bio-heading">Built On Real Research Production Work</h2>
        <blockquote class="about-quote">
          Survey systems should be precise, accessible, and operationally dependable from day one.
        </blockquote>
        <p>This practice was shaped inside real research operations: environments where timelines are tight, specifications evolve mid-campaign, and launch quality directly affects data integrity. The work combines deep technical implementation with full delivery accountability, so projects move from questionnaire design to field without unnecessary friction or miscommunication.</p>
        <p>Surveys have been programmed and deployed to a 100,000+ member international research panel spanning 130+ countries. That work includes multilingual deployments with full translation pipeline management, sustained outreach via Mailgun API across 16&ndash;25 campaigns per year, and real-time field monitoring that keeps stakeholders informed throughout active data collection.</p>
        <p>Based in Marina, CA, working with research teams, market research agencies, and enterprise clients everywhere.</p>
      </div>

      <aside class="snapshot-card" aria-labelledby="snapshot-heading">
        <h2 id="snapshot-heading" class="snapshot-title">Practice Snapshot</h2>
        <div class="snapshot-row">
          <span class="snapshot-label">Platform</span>
          <p class="snapshot-value">LimeSurvey: open-source, production-grade, no per-response licensing fees.</p>
          <ul class="snapshot-tags" aria-label="Platform capabilities">
            <li>LimeSurvey</li>
            <li>Skip Logic</li>
            <li>Quota Management</li>
          </ul>
        </div>
        <div class="snapshot-row">
          <span class="snapshot-label">Accessibility</span>
          <p class="snapshot-value">WCAG 2.1 verified on every build: keyboard navigation, screen reader support, color contrast, and focus management.</p>
          <ul class="snapshot-tags" aria-label="Accessibility capabilities">
            <li>WCAG 2.1</li>
            <li>Mobile-First</li>
            <li>Cross-Browser</li>
          </ul>
        </div>
        <div class="snapshot-row">
          <span class="snapshot-label">Outreach</span>
          <p class="snapshot-value">16&ndash;25 email campaigns per year via Mailgun API, including list segmentation, bounce handling, and token-based tracking.</p>
          <ul class="snapshot-tags" aria-label="Outreach capabilities">
            <li>Mailgun API</li>
            <li>130+ Countries</li>
            <li>Multilingual</li>
          </ul>
        </div>
        <div class="snapshot-row">
          <span class="snapshot-label">Location</span>
          <p class="snapshot-value">Marina, CA, serving clients across North America, Europe, and globally via remote engagement.</p>
        </div>
      </aside>
    </div>
  </section>

  <section class="section" aria-labelledby="principles-heading" data-reveal>
    <div class="container about-narrow">
      <p class="section-number" aria-hidden="true">How I Work</p>
      <h2 id="principles-heading">What Working Together Actually Looks Like</h2>
      <p class="section-deck">The operational commitments that shape every engagement, independent of project size, platform, or geography.</p>
      <ol class="principles-list">
        <li>
          <span class="principle-num" aria-hidden="true">01</span>
          <div>
            <h3>You Work With The Programmer, Not Through Them</h3>
            <p>There are no account managers, no project coordinators relaying your feedback, and no handoffs between a sales contact and a delivery team. When you send a message, the person programming your survey reads it and responds.</p>
          </div>
        </li>
        <li>
          <span class="principle-num" aria-hidden="true">02</span>
          <div>
            <h3>Specifications Are Taken Seriously, Not Approximated</h3>
            <p>Survey logic errors discovered after launch corrupt data and require re-contact. The approach here is to understand the intent behind each question, not just transcribe it. If a spec is ambiguous or a logic path would produce inconsistent data, that gets raised before programming begins.</p>
          </div>
        </li>
        <li>
          <span class="principle-num" aria-hidden="true">03</span>
          <div>
            <h3>Scope, Cost, And Timeline Are Agreed Before Work Starts</h3>
            <p>Every project begins with a clear scope discussion. The quote reflects actual delivery requirements, not a template tier. Changes to scope mid-project are discussed and priced separately, with no surprise invoices or hourly billing that expands without a ceiling.</p>
          </div>
        </li>
      </ol>
    </div>
  </section>

  <section class="section about-section-alt" aria-labelledby="faq-heading" data-reveal>
    <div class="container about-narrow">
      <p class="section-number" aria-hidden="true">Common Questions</p>
      <h2 id="faq-heading">About This Practice</h2>
      <div class="about-faq-list">
        <article class="about-faq-item">
          <h3>What types of clients and projects does this service work with?</h3>
          <p>The practice primarily serves market research agencies, enterprise research teams, academic institutions, and B2B organizations that need complex surveys programmed and deployed correctly, particularly projects with multilingual requirements, WCAG accessibility mandates, or international fielding. Smaller and one-off studies are also supported; there is no minimum project size. See <a href="/use-cases.php">use cases</a> for specific delivery environments.</p>
        </article>
        <article class="about-faq-item">
          <h3>Is this a freelance practice or an agency?</h3>
          <p>It is an independent practice: one operator, direct access, no subcontractors or offshore handoffs. That structure keeps communication fast, accountability clear, and overhead out of the invoice. It also means project capacity is finite; availability is discussed upfront during scoping so timelines are realistic from the start.</p>
        </article>
        <article class="about-faq-item">
          <h3>Where is this service based, and does location matter for delivery?</h3>
          <p>Based in Marina, CA. Clients are served remotely across North America, Europe, and globally, so location has no impact on delivery quality. All communication, file handoff, and reporting uses standard remote collaboration tools. For projects requiring real-time coordination during active field periods, time zone alignment is discussed during scoping.</p>
        </article>
        <article class="about-faq-item">
          <h3>Where can I find details on services, pricing, and turnaround?</h3>
          <p>Full service descriptions including LimeSurvey programming, WCAG-accessible design, multilingual deployment, and real-time reporting are on the <a href="/services.php">services page</a>. Pricing structure, scope factors, and a comparison against agency and hourly freelancer costs are covered in detail on the <a href="/pricing.php">pricing page</a>.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="cta-band about-cta" aria-labelledby="about-cta-heading">
    <div class="container about-cta-inner">
      <p class="section-number about-cta-label" aria-hidden="true">Ready To Work Together?</p>
      <h2 id="about-cta-heading">Send Your Project Details For A Direct Response</h2>
      <p>Share your questionnaire, timeline, and fielding goals. You will hear back directly with clear guidance on scope, timing, and what it takes to get your survey into field.</p>
      <div class="about-cta-actions" aria-label="About page calls to action">
        <a href="/inquiry.php" class="btn-primary">Send An Inquiry</a>
        <a href="/services.php" class="btn-secondary">View Services</a>
        <a href="/pricing.php" class="btn-secondary">View Pricing</a>
      </div>
      <address class="about-contact-row" aria-label="Contact options">
        <a href="tel:+18312360849">831.236.0849</a>
        <a href="mailto:philemmons.now@gmail.com">philemmons.now@gmail.com</a>
        <a href="/inquiry.php">Inquiry Form</a>
      </address>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
