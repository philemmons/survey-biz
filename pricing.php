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
      <p class="section-deck">Scope is priced from delivery reality, not package tiers. Each factor below maps to real work — scripting hours, QA cycles, deployment tasks, and post-launch support. Understanding them helps you scope your project before submitting an inquiry.</p>

<!--
      <ul class="icon-grid" aria-label="Pricing factors">
        <li class="icon-card">
          <h3>Question Count</h3>
          <p class="card-body-text">Total questionnaire length and section depth influence scripting and QA time.</p>
        </li>
        <li class="icon-card">
          <h3>Logic Complexity</h3>
          <p class="card-body-text">Branching, piping, quota logic, and custom validations affect implementation scope.</p>
        </li>
        <li class="icon-card">
          <h3>Languages Required</h3>
          <p class="card-body-text">Number of languages and localization QA requirements shape deployment effort.</p>
        </li>
        <li class="icon-card">
          <h3>Deployment and Outreach Scope</h3>
          <p class="card-body-text">Email campaign setup, list segmentation, and invite workflows add operational tasks.</p>
        </li>
        <li class="icon-card">
          <h3>Reporting and Dashboard Setup</h3>
          <p class="card-body-text">Progress reporting needs and dashboard complexity impact post-launch support.</p>
        </li>
        <li class="icon-card">
          <h3>Timeline and Turnaround</h3>
          <p class="card-body-text">Delivery speed, revision windows, and launch deadlines influence scheduling.</p>
        </li>
      </ul>
-->
    </section>

    <div class="factors-grid">

    <div class="factor">
      <div class="factor-num">01</div>
      <div>
        <h3>Question Count &amp; Section Depth</h3>
        <p>Total questionnaire length is the most straightforward cost driver. Each question requires scripting, input-type configuration, validation rules, and QA verification. Section depth — how questions are organized into blocks, rotations, or randomized sets — multiplies that work. A 20-question survey with flat structure and a 20-question survey with block randomization, carry-forward answer pipes, and custom display templates are very different builds.</p>
        <div class="factor-note"><strong>Market context:</strong> Agency-produced online surveys with 400 respondents start around $5,000–$15,000 — and professional programming labor typically represents the largest time component of that cost before fieldwork begins.</div>
      </div>
    </div>

    <div class="factor">
      <div class="factor-num">02</div>
      <div>
        <h3>Logic Complexity</h3>
        <p>Branching, skip patterns, display logic, piping, quota management, and custom JavaScript or CSS validations each add implementation and testing scope. A simple linear survey scripts in hours. A study with nested quota logic, conditional question text, mid-survey redirects, and custom end-page routing can require days of structured QA alone. Logic errors in deployed surveys corrupt data and require re-contact — the cost of getting it wrong far exceeds the cost of getting it right the first time.</p>
        <div class="factor-note"><strong>Why it matters:</strong> Platform specialists on the open market charge specifically for this expertise — Qualtrics and LimeSurvey both require deep familiarity with logic sequencing and platform-specific edge cases that generic developers don't carry.</div>
      </div>
    </div>

    <div class="factor">
      <div class="factor-num">03</div>
      <div>
        <h3>Languages Required</h3>
        <p>Each additional language multiplies deployment effort in three ways: locale setup within the platform, translation integration (mapping translated strings to question IDs accurately), and QA across every language variant to confirm display, encoding, and skip logic parity. Right-to-left language support and character encoding for non-Latin scripts add further technical considerations. A three-language study is not three times the work of a single-language study, but it is meaningfully more.</p>
        <div class="factor-note"><strong>Market context:</strong> Multi-market research studies running across several countries can run $150,000+ at the agency level — localization and field logistics account for a large share of that premium. Direct programming dramatically reduces this overhead.</div>
      </div>
    </div>

    <div class="factor">
      <div class="factor-num">04</div>
      <div>
        <h3>Deployment &amp; Outreach Scope</h3>
        <p>Survey programming ends at the script. Deployment begins there. Email campaign setup, contact list segmentation and upload, invite and reminder scheduling, unsubscribe and opt-out handling, and token-based respondent tracking are distinct operational tasks that extend total project scope. Studies that require double-opt-in flows, unique survey links per respondent, or integrations with CRM or panel providers add additional configuration and testing before a single response arrives.</p>
        <div class="factor-note"><strong>What this covers:</strong> LimeSurvey's token-based participant management, email queue setup, bounce handling, and outreach timing workflows — tasks that are often underestimated when clients receive platform-only quotes.</div>
      </div>
    </div>

    <div class="factor">
      <div class="factor-num">05</div>
      <div>
        <h3>Reporting &amp; Dashboard Setup</h3>
        <p>Data collection is the means; insight is the end. Real-time progress dashboards, response-rate monitoring, automated cross-tab outputs, and stakeholder-facing reporting views are not defaults — they are configured. The complexity of what you need to see during and after field shapes post-launch support requirements significantly. Simple CSV export is trivial. A live dashboard with filtered views by segment, wave, or quota status is a separate scope item.</p>
        <div class="factor-note"><strong>Market context:</strong> Strategic reports with visualizations and recommendations from research agencies run $3,000–$10,000+ as a standalone deliverable. Building clarity into the platform from the start reduces that downstream cost.</div>
      </div>
    </div>

    <div class="factor">
      <div class="factor-num">06</div>
      <div>
        <h3>Timeline &amp; Turnaround</h3>
        <p>Delivery speed is a real resource constraint, not a filler factor. A study with clear specifications, no mid-build revisions, and a reasonable runway can often be delivered within a few business days. Compressed timelines — same-day or next-day launches, weekend fielding windows, or concurrent builds across multiple studies — require schedule prioritization that affects other commitments. Revision windows during QA also influence scheduling: one round of consolidated feedback is faster and cheaper to address than iterative single-item change requests.</p>
        <div class="factor-note"><strong>Practical note:</strong> Providing a complete questionnaire document with finalized wording, agreed logic, and confirmed sample targets before programming begins is the single highest-leverage thing a client can do to reduce total cost and turnaround time.</div>
      </div>
    </div>

  </div>

  <!-- COMPETITIVE SECTION -->
  <div class="section-head">
    <span class="section-tag">Competitive</span>
    <h2>Transparent Pricing</h2>
  </div>

  <p style="color:var(--mid); font-size:0.92rem; margin-bottom:1.8rem; max-width:640px; line-height:1.7;">
    Understanding where project-based independent programming fits relative to the alternatives helps you make the right sourcing decision for your study.
  </p>

  <div class="pricing-range">
    <div>
      <div class="range-label">Freelance platform specialist (Upwork/hourly)</div>
      <div class="range-val">$30 – $80 / hr</div>
    </div>
    <div class="range-divider"></div>
    <div>
      <div class="range-label">Basic survey project (agency, end-to-end)</div>
      <div class="range-val">$5K – $15K</div>
    </div>
    <div class="range-divider"></div>
    <div>
      <div class="range-label">Enterprise platform license (Qualtrics, annual)</div>
      <div class="range-val">$5K – $100K+</div>
    </div>
    <div class="range-divider"></div>
    <div>
      <div class="range-label">Agency overhead added to programmer cost</div>
      <div class="range-val">+20 – 50%</div>
    </div>
  </div>

  <div class="compare-grid">
    <div class="compare-col">
      <div class="col-label">Option</div>
      <div class="col-title">Hourly Platform Freelancer</div>
      <ul>
        <li>Rate uncertainty — scope creep bills at the same rate</li>
        <li>Platform fees (Upwork takes 5–10% from client invoices)</li>
        <li>Varying familiarity with LimeSurvey vs. Qualtrics vs. other tools</li>
        <li>No fixed-price accountability on delivery</li>
        <li>Portfolio-dependent — quality varies widely at the same rate tier</li>
      </ul>
    </div>
    <div class="compare-col">
      <div class="col-label">Option</div>
      <div class="col-title">Full-Service Research Agency</div>
      <ul>
        <li>20–50% overhead layered onto every deliverable</li>
        <li>Retainers required for ongoing access to senior staff</li>
        <li>Minimum project sizes often exclude smaller or one-off studies</li>
        <li>Slow internal queues — enterprise timelines, not research timelines</li>
        <li>Qualtrics enterprise licenses at $5,000–$100,000+/year passed to clients</li>
      </ul>
    </div>
    <div class="compare-col highlight">
      <div class="col-label">This Service</div>
      <div class="col-title">Project-Based Independent Programming</div>
      <ul>
        <li>Fixed quote per project — no hourly uncertainty, no runaway invoices</li>
        <li>No retainers, no agency markup, no platform license overhead</li>
        <li>LimeSurvey expertise with open-source cost advantages for clients</li>
        <li>Small and one-off studies explicitly welcomed</li>
        <li>Direct access — no account manager layer between you and the programmer</li>
        <li>2–3 day turnaround on clearly-scoped studies</li>
      </ul>
    </div>
  </div>

  <p style="color:var(--mid); font-size:0.88rem; line-height:1.7; max-width:640px;">
    <strong style="color:var(--ink); font-weight:500;">LimeSurvey as the primary platform</strong> offers a meaningful cost advantage: the platform itself is open-source, with no per-response licensing fees and no enterprise contract requirements. This keeps the per-project cost focused on programming expertise and delivery quality rather than platform rent.
  </p>

  <!-- FAQ -->
  <div class="section-head">
    <span class="section-tag">FAQ</span>
    <h2>Frequently asked questions</h2>
  </div>

  <div class="faq-list">

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>How fast can you turn a project around?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>Many studies can be delivered within two to three business days when a finalized questionnaire document is provided at the start. The bottleneck in survey programming is rarely the programming itself — it's the specification. Studies that arrive with wording still in flux, logic not yet confirmed, or sample targets undecided require back-and-forth that adds days to any timeline.</p>
        <p>For complex studies (extensive quota logic, multiple languages, custom validation), five to ten business days is a more realistic window, with QA cycles built in. Rush delivery for confirmed specifications within 24–48 hours is possible but may carry a scheduling premium.</p>
        <p class="inline-note">For comparison: full-service agencies typically require 2–4 weeks for the same scope due to internal handoff queues and approval layers.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>Do you work with small or one-off studies?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>Yes — explicitly. Many agencies impose minimum project sizes that price out pilot studies, concept tests, or single-wave qualitative supplements. Small studies, one-off deployments, and internal pulse surveys are supported alongside larger recurring programs. A 15-question employee feedback survey is a legitimate project.</p>
        <p>The quote simply reflects actual scope rather than a minimum billing threshold. If your study is small, the quote will be small.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>What survey platform do you use, and why?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>LimeSurvey is the primary platform. It is open-source, self-hostable, and fully-featured — supporting advanced branching, piping, quota logic, multilingual deployment, token-based participant management, and custom styling without per-response pricing or enterprise license fees. This keeps client costs focused on expertise, not platform rent.</p>
        <p>For context: Qualtrics enterprise licensing ranges from a few thousand to over $100,000 per year depending on organizational scale. LimeSurvey Cloud plans run €29–€170/month, and self-hosted instances are license-free. The platform choice has a direct impact on your total project cost.</p>
        <p>If your organization already has a preferred platform (SurveyMonkey, Alchemer, Typeform, etc.), that is worth discussing at inquiry. Platform requirements shape what's possible in a given quote.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>Can you handle multilingual surveys?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>Yes. Multilingual deployment includes locale setup within LimeSurvey, translation string integration, encoding verification for non-Latin scripts, and QA across each language variant to confirm logic parity, display accuracy, and correct skip-pattern behavior in each locale.</p>
        <p>Translation content is provided by the client or a translation partner — this is not a translation service. What this service covers is the technical integration, QA, and deployment of translated content into a working, validated multilingual survey.</p>
        <p class="inline-note">Multi-market research through agencies can reach $150,000+ for global deployments. Direct programming removes the agency overhead layer without sacrificing technical quality.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>What do you need from me to provide a quote?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>A useful quote requires: the questionnaire draft or outline (even a rough one), the approximate question count and logic complexity, any language requirements, whether you need email deployment and outreach setup or just the programmed survey link, your target launch date, and any reporting or dashboard requirements.</p>
        <p>You don't need a polished specification — a working draft and a summary of what the study needs to do is sufficient to provide a meaningful estimate. Submit through the inquiry page and include as much of that information as you have.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>How does project-based pricing protect me compared to hourly billing?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>Hourly billing transfers scope risk to the client. Every revision, every clarification request, every unexpected platform behavior bills at the same rate with no ceiling. Hourly freelancers on platforms like Upwork also come with platform fees (5–10% added to client invoices) and no fixed accountability on what the final cost will be.</p>
        <p>A project-based quote defines the deliverable and the price together. Changes to scope can be scoped and quoted as additions — but the base project has a known cost. For research teams with fixed budgets per study, this predictability has direct operational value.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>What happens if I need changes after the survey launches?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>Post-launch changes are handled as separate scope items and quoted accordingly. The nature of the change matters significantly: cosmetic adjustments (label wording, color, instruction text) are low-effort. Logic changes after responses have been collected require careful handling to avoid data integrity issues or respondent experience inconsistencies.</p>
        <p>The standard practice is to clearly define revision scope before launch, including a designated QA window for consolidated feedback. This minimizes post-launch change requests and keeps the study on its intended timeline.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-q" onclick="toggle(this)">
        <span>How does this compare to doing it in-house with a DIY survey tool?</span>
        <span class="faq-icon">+</span>
      </div>
      <div class="faq-a">
        <p>DIY tools like SurveyMonkey or Google Forms cover simple, flat questionnaires well. Where they fall short: complex branching logic, quota management, multilingual deployment, custom validation, token-based participant tracking, and clean data output for professional analysis. Attempting to force those requirements into a tool not built for them produces workarounds that compromise data quality.</p>
        <p>Professional programming on LimeSurvey or comparable platforms produces cleaner data, more reliable logic execution, and a respondent experience that doesn't break on edge cases. For studies where the data drives actual decisions, the cost of professional programming is typically small relative to the cost of collecting bad data.</p>
      </div>
    </div>

  </div>
<!--
    <section class="section" aria-labelledby="included-heading" data-reveal>
      <p class="section-number" aria-hidden="true">Competitive</p>
      <h2 id="included-heading">Transparent Pricing</h2>
      <div class="panel mt-4">
        <ul class="stack-3" aria-label="Transparent Pricing features">
          <li>Get enterprise-quality survey programming without enterprise-agency overhead.</li>
          <li>Contact me for a custom quote based on your project scope and timeline.</li>
        </ul>
      </div>
    </section>
-->
    <!--
    <section class="section" aria-labelledby="faq-heading" data-reveal>
      <p class="section-number" aria-hidden="true">FAQ</p>
      <h2 id="faq-heading">Frequently asked questions</h2>
      <div class="faq-list mt-4">
        <details class="faq-item" open>
          <summary>How fast can you turn a project around?</summary>
          <div class="faq-answer">Typical turnaround depends on questionnaire complexity, but many studies can be delivered within a few business days with clear specs.</div>
        </details>
        <details class="faq-item">
          <summary>Do you work with small or one-off studies?</summary>
          <div class="faq-answer">Yes. Small studies, pilot projects, and one-off deployments are supported alongside larger recurring engagements.</div>
        </details>
        <details class="faq-item">
          <summary>What survey platform do you use?</summary>
          <div class="faq-answer">LimeSurvey is the primary platform, with implementation patterns focused on reliable logic control and clean data output.</div>
        </details>
        <details class="faq-item">
          <summary>Can you handle multilingual surveys?</summary>
          <div class="faq-answer">Yes. Multilingual deployment workflows include locale setup, translation integration, and QA across language variants.</div>
        </details>
        <details class="faq-item">
          <summary>How do I get a quote?</summary>
          <div class="faq-answer">Send your project requirements through the inquiry page, including timeline and study scope, and you will receive a custom quote.</div>
        </details>
      </div>
    </section>
  </div>
-->
  <section class="cta-band" aria-labelledby="pricing-cta-heading">
    <div class="container cta-inner">
      <div class="cta-text">
        <h2 id="pricing-cta-heading">Get a custom quote</h2>
        <p>Tell me what your study requires and I will provide a clear, project-based estimate.</p>
      </div>
      <a class="btn-primary" href="inquiry.php">Get a Custom Quote</a>
    </div>
  </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>