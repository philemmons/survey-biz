<?php

declare(strict_types=1); /* BEWARE THE BOM */
$page_title = 'Terms of Service';
$meta_description = 'Read the website terms for survey programming services, including inquiry process, project agreements, client responsibilities, and content limitations.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="terms-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Trust</p>
      <h1 id="terms-hero-heading">Terms of Service</h1>
      <p class="hero-sub">Guidelines for using this website and starting survey programming engagements.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="terms-website-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Website Use</p>
      <h2 id="terms-website-heading">Using this website</h2>
      <p class="section-deck">Effective date: May 18, 2026</p>
      <div class="stack-4 mt-4 measure">
        <p>This website provides service information for survey programming, deployment, and related research operations support.</p>
        <p>Content is provided for general business information and planning context. Service details may change over time as offerings evolve.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="terms-inquiry-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Inquiries</p>
      <h2 id="terms-inquiry-heading">Inquiry and proposal process</h2>
      <div class="stack-4 measure">
        <p>Submitting an inquiry is a request for communication. It does not, by itself, create a client relationship or service agreement.</p>
        <p>Project scope, deliverables, timeline expectations, and delivery responsibilities are confirmed through written proposals or agreements when work moves forward.</p>
        <p>Questions about data handling can be reviewed on the <a href="security.php">Security page</a> and in the <a href="privacy.php">Privacy Policy</a>.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="terms-client-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Client Responsibilities</p>
      <h2 id="terms-client-heading">Client-side responsibilities</h2>
      <div class="stack-4 measure">
        <p>Clients are responsible for providing accurate project requirements, approved survey content, testing feedback, and timely decision input needed to deliver on schedule.</p>
        <p>Clients are also responsible for lawful collection and use of their survey data and materials within their own research context.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="terms-ip-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Ownership and Limits</p>
      <h2 id="terms-ip-heading">Intellectual property and information limits</h2>
      <div class="stack-4 measure">
        <p>Website content remains the property of this business unless otherwise stated. Project-specific ownership and usage rights are defined in client agreements when applicable.</p>
        <p>No guarantee is made that website information alone will fit every project scenario. Delivery outcomes depend on scope, requirements, and collaboration quality.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="terms-contact-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Questions</p>
      <h2 id="terms-contact-heading">Contact for terms questions</h2>
      <div class="notice-box stack-4 measure" role="note">
        <p>For questions about these terms or a specific proposal, use the <a href="inquiry.php">Inquiry page</a> and include the relevant project context.</p>
        <p>For service details, visit <a href="services.php">Services</a> or <a href="pricing.php">Pricing</a>.</p>
      </div>
    </section>
  </div>
  
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>