<?php

declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_title = 'Security & Data Practices';
$meta_description = 'How philemmons.net protects your research data - access controls, anonymization, clean code, and WCAG 2.1 compliance on every survey build.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>
<main id="main-content">
  <section class="hero" aria-labelledby="sec-hero-heading">
    <div class="container">
      <p class="hero-eyebrow">Security</p>
       <h1 id="sec-hero-heading">Data Security Policy</h1>
      <p class="hero-sub">Technical, administrative, and operational safeguards for client and participant data.</p>

      <div class="hero-actions mt-5">
        <a href="services.php" class="btn-secondary">View Services</a>
        <a href="pricing.php" class="btn-secondary">View Pricing</a>
      </div>

    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="security-overview-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Overview</p>
       <h2 id="security-overview-heading">Overview And Scope</h2>
      <p class="section-deck">Effective date: June 2026. Location of operations: California, USA.</p>
      <div class="stack-4 mt-4 measure">
        <p>This Data Security Policy outlines the technical, administrative, and operational safeguards implemented by philemmons.net to protect the confidentiality, integrity, and availability of client and participant data.</p>
        <p>The infrastructure used for survey programming and deployment specializes in secure, isolated LimeSurvey deployments designed to prioritize data minimization, privacy-by-design, and strict alignment with United States and international privacy frameworks.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="security-compliance-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Compliance</p>
       <h2 id="security-compliance-heading">California And International Compliance Alignment</h2>
      <div class="stack-4 measure">
        <p>As a California-based business, data practices are engineered to meet or exceed applicable state and federal privacy mandates.</p>
        <ul class="stack-3">
          <li><strong>CCPA/CPRA readiness:</strong> this business acts as a Service Provider under the California Consumer Privacy Act. It does not sell, share, or retain client or participant data for any purpose outside the specific business relationship defined in service agreements.</li>
          <li><strong>CalOPPA:</strong> transparent data practice disclosures are maintained so participants can understand what data is collected and how it is used.</li>
          <li><strong>Data sovereignty:</strong> while operations are based in California, surveys can be deployed on regionally compliant infrastructure, such as EU-based servers for GDPR alignment, when requested by clients.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="security-encryption-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Encryption</p>
       <h2 id="security-encryption-heading">Encryption And Data Lifecycle</h2>
      <div class="stack-4 measure">
        <p>Data is cryptographically secured at each stage to reduce the risk of unauthorized interception or exposure.</p>
        <ul class="stack-3">
          <li><strong>In transit:</strong> external connections to survey applications and administrative interfaces are enforced over HTTPS using TLS 1.2 or higher with modern, secure cipher suites.</li>
          <li><strong>At rest:</strong> database volumes, backups, and stored assets are encrypted at rest using AES-256 encryption where supported by the hosting environment.</li>
          <li><strong>Secure destruction:</strong> following project completion and verified data handoff, data is permanently purged from primary databases and rolling backups using secure electronic erasure practices aligned with NIST SP 800-88 guidelines.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="security-infrastructure-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Infrastructure</p>
       <h2 id="security-infrastructure-heading">Infrastructure And Network Security</h2>
      <div class="stack-4 measure">
        <p>External threats are mitigated by maintaining a restricted hosting footprint and minimizing unnecessary application surface area.</p>
        <ul class="stack-3">
          <li><strong>Zero plugin bloat:</strong> survey deployments are built on core, audited LimeSurvey code. By rejecting unverified third-party plugins, the primary attack vector for many open-source application vulnerabilities is reduced.</li>
          <li><strong>Network isolation:</strong> servers are shielded behind strict firewalls with default-deny rules, restricting access to essential application ports.</li>
          <li><strong>Vulnerability management:</strong> operating systems and application frameworks are patched continuously, with critical security updates targeted for deployment within seven days of public release.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="security-access-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Access Control</p>
       <h2 id="security-access-heading">Access Control And Authentication</h2>
      <div class="stack-4 measure">
        <p>Strict operational identity barriers are used to prevent internal and external unauthorized access.</p>
        <ul class="stack-3">
          <li><strong>Multi-factor authentication:</strong> access to server management consoles, hosting infrastructure, and administrative survey panels requires MFA.</li>
          <li><strong>Respondent security:</strong> closed-access surveys use individual, cryptographically unique tokens to ensure only designated participants can access a survey and to help prevent response manipulation.</li>
          <li><strong>Audit trails:</strong> system logs record administrative access, data exports, and configuration changes. These logs are retained for a minimum of 90 days where supported by the hosting environment and project requirements.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="security-minimization-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Minimization</p>
       <h2 id="security-minimization-heading">Data Minimization And Anonymization</h2>
      <div class="stack-4 measure">
        <p>In accordance with privacy-by-design principles, risk is minimized by avoiding the collection of unnecessary data.</p>
        <p>For anonymous studies, survey configurations can strip respondent IP addresses, browser user agents, and precise submission timestamps so personally identifiable information is not written to the database when anonymity is required by scope.</p>
      </div>
    </section>

    <section class="section" aria-labelledby="security-incident-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Incident Response</p>
       <h2 id="security-incident-heading">California Data Breach Notification And Incident Response</h2>
      <div class="stack-4 measure">
        <p>In compliance with California Civil Code Section 1798.82, this business maintains an incident response process for suspected security events.</p>
        <ul class="stack-3">
          <li><strong>Immediate mitigation:</strong> upon suspicion of a security incident, affected systems are isolated and any ongoing exposure is stopped as quickly as practicable.</li>
          <li><strong>Notification timeline:</strong> if unauthorized acquisition of unencrypted personal information is confirmed, affected clients will be notified without unreasonable delay and no later than 72 hours from discovery.</li>
          <li><strong>Reporting:</strong> notice will provide a clear description of the incident, the categories of data exposed, steps taken to secure the environment, and direct mitigation guidance.</li>
        </ul>
      </div>
    </section>

    <section class="section" aria-labelledby="security-contact-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Contact</p>
       <h2 id="security-contact-heading">Contact And Privacy Inquiries</h2>
      <div class="notice-box stack-4 measure" role="note">
        <p>For security questionnaires, Data Processing Addendums, or privacy inquiries, contact philemmons.net through the California operations office.</p>
        <p>Email: <a href="mailto:<?= CONTACT_EMAIL; ?>"><?= CONTACT_EMAIL; ?></a></p>
        <p>Location: Monterey Bay, CA</p>
      </div>
    </section>
  </div>

  <section class="cta-band" aria-labelledby="security-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
         <h2 id="security-cta-heading">Have Compliance Or Data Requirements For Your Study?</h2>
        <p>Include them in your inquiry for direct review.</p>
      </div>
      <a href="inquiry.php" class="btn-primary">Send An Inquiry</a>
    </div>
  </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
