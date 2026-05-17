<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Keep inquiry-form processing explicit with post/status state.
$submitted_form_values = [];
$status = '';
$status_message = '';
$errors = [];
$field_max_length_by_name = [
    'name' => 120,
    'email' => 120,
    'org' => 150,
    'languages' => 150,
    'subject' => 160,
    'description' => 2000,
];
$field_label_by_name = [
    'name' => 'Name',
    'email' => 'Email',
    'org' => 'Organization',
    'languages' => 'Languages needed',
    'subject' => 'Subject',
    'description' => 'Project description',
];
$count_text_characters = static function (string $value): int {
    if (function_exists('mb_strlen')) {
        return mb_strlen($value, 'UTF-8');
    }
    return strlen($value);
};

generate_csrf_token();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $submitted_form_values = [
        'name' => trim((string) ($_POST['name'] ?? '')),
        'email' => trim((string) ($_POST['email'] ?? '')),
        'org' => trim((string) ($_POST['org'] ?? '')),
        'study_type' => trim((string) ($_POST['study_type'] ?? '')),
        'num_questions' => trim((string) ($_POST['num_questions'] ?? '')),
        'languages' => trim((string) ($_POST['languages'] ?? '')),
        'launch_date' => trim((string) ($_POST['launch_date'] ?? '')),
        'subject' => trim((string) ($_POST['subject'] ?? '')),
        'description' => trim((string) ($_POST['description'] ?? '')),
    ];

    $submitted_csrf_token = (string) ($_POST['csrf_token'] ?? '');
    $beeName = trim((string) ($_POST['beeName'] ?? ''));

    // Validate token before processing user content.
    if (!validate_csrf_token($submitted_csrf_token)) {
        $status = 'error';
        $status_message = 'Your secure form session expired. Please review your details and submit again.';
    // Honeypot must stay empty for human users.
    } elseif ($beeName !== '') {
        $status = 'error';
        $status_message = 'Your submission could not be accepted. Please try again.';
    } else {
        if ($submitted_form_values['name'] === '') {
            $errors['name'] = 'Please enter your name.';
        }

        if ($submitted_form_values['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (!filter_var($submitted_form_values['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if ($submitted_form_values['subject'] === '') {
            $errors['subject'] = 'Please enter a subject.';
        }

        if ($submitted_form_values['description'] === '') {
            $errors['description'] = 'Please describe your study goals and requirements.';
        }

        foreach ($field_max_length_by_name as $field_name => $max_length) {
            if (isset($errors[$field_name])) {
                continue;
            }

            $field_value = (string) ($submitted_form_values[$field_name] ?? '');
            if ($field_value === '') {
                continue;
            }

            if ($count_text_characters($field_value) > $max_length) {
                $field_label = $field_label_by_name[$field_name] ?? ucfirst(str_replace('_', ' ', $field_name));
                $errors[$field_name] = $field_label . ' must be ' . $max_length . ' characters or fewer.';
            }
        }

        if ($errors !== []) {
            $status = 'error';
            $status_message = 'Please correct the highlighted fields and try again.';
        } else {
            $sanitized_subject_line = preg_replace('/[\r\n]+/', ' ', $submitted_form_values['subject']);
            $inquiry_email_subject = 'New Inquiry: ' . trim((string) $sanitized_subject_line);

            $email_payload = [
                'name' => sanitize_input($submitted_form_values['name']),
                'email' => sanitize_input($submitted_form_values['email']),
                'org' => sanitize_input($submitted_form_values['org']),
                'study_type' => sanitize_input($submitted_form_values['study_type']),
                'num_questions' => sanitize_input($submitted_form_values['num_questions']),
                'languages' => sanitize_input($submitted_form_values['languages']),
                'launch_date' => sanitize_input($submitted_form_values['launch_date']),
                'subject' => sanitize_input($submitted_form_values['subject']),
                'description' => sanitize_input($submitted_form_values['description']),
            ];

            // send_inquiry_email() performs safe From/Reply-To construction and checks mail() result.
            $mail_was_accepted = send_inquiry_email($submitted_form_values['email'], $inquiry_email_subject, build_inquiry_email($email_payload));

            if ($mail_was_accepted) {
                $status = 'success';
                $status_message = 'Thanks for your inquiry. I will get back to you within two business days.';
                $submitted_form_values = [];
                $errors = [];
            } else {
                $status = 'error';
                $status_message = 'Your inquiry could not be sent right now. Please try again or call directly.';
            }
        }
    }

    // Rotate token after every POST attempt to reduce replay window.
    rotate_csrf_token();
}

$page_title = 'Inquiry';
$meta_description = 'Start a survey programming inquiry for a custom quote based on your study goals, timeline, and deployment needs.';
$current_page = basename(__FILE__);
include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';

$error_fields_in_display_order = ['name', 'email', 'org', 'languages', 'subject', 'description'];
$error_field_anchor_by_name = [
    'name' => 'name',
    'email' => 'email',
    'org' => 'org',
    'languages' => 'languages',
    'subject' => 'subject',
    'description' => 'description',
];
$error_summary_by_field = [];
foreach ($error_fields_in_display_order as $error_field_name) {
    if (isset($errors[$error_field_name])) {
        $error_summary_by_field[$error_field_name] = $errors[$error_field_name];
    }
}
$get_submitted_value = static function (string $field_name, array $submitted_form_values): string {
    return (string) ($submitted_form_values[$field_name] ?? '');
};
$get_invalid_attribute = static function (string $field_name, array $errors): string {
    return isset($errors[$field_name]) ? ' aria-invalid="true"' : '';
};
?>
<main id="main-content">
  <section class="hero" aria-labelledby="inquiry-hero-heading">
    <div class="container">
      <p class="hero-eyebrow" aria-hidden="true">Inquiry</p>
      <h1 id="inquiry-hero-heading">Request a custom survey programming quote</h1>
      <p class="hero-sub">Tell me about your study and I will send back a project-based estimate, usually within two business days.</p>
      <p class="hero-sub mt-3">You will receive a direct personal response from Phillip Emmons with next steps and pricing tailored to your actual requirements.</p>
      <p class="mt-4"><a href="#inquiry-form" class="btn-primary">Send an Inquiry</a></p>
      <p class="mt-2"><a href="tel:+18312360849" class="btn-secondary" aria-label="Call Phillip Emmons at 831-236-0849">Phone: 831.236.0849</a></p>
    </div>
  </section>

  <section class="proof-strip" aria-label="Key figures">
    <div class="container">
      <div class="proof-grid">
        <div class="proof-item">
          <span class="proof-num">1-2 days</span>
          <span class="proof-label">Typical quote turnaround</span>
        </div>
        <div class="proof-item">
          <span class="proof-num">Direct</span>
          <span class="proof-label">No agency middle layer</span>
        </div>
        <div class="proof-item">
          <span class="proof-num">185,000+</span>
          <span class="proof-label">Panel members supported</span>
        </div>
        <div class="proof-item">
          <span class="proof-num">130+</span>
          <span class="proof-label">Countries served</span>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <section class="section" aria-labelledby="how-it-works-heading" data-reveal>
      <div class="section-head">
        <p class="section-number">How it works</p>
        <h2 id="how-it-works-heading">From inquiry to fielded study in three steps</h2>
        <p class="section-deck">Every project starts with a direct conversation about your requirements. No intake queue, no agency relay, and no account manager layer between you and the person doing the work.</p>
      </div>
      <ol class="grid-3" aria-label="How inquiry projects move forward">
        <li class="panel">
          <p class="section-number">Step 1</p>
          <h3 class="card-title">Send an inquiry</h3>
          <p class="card-body-text">Describe your study in as much or as little detail as you have. Study type, question count, languages, platform preferences, and launch date are all useful, and a rough questionnaire draft is enough to get started.</p>
        </li>
        <li class="panel">
          <p class="section-number">Step 2</p>
          <h3 class="card-title">Receive a custom quote</h3>
          <p class="card-body-text">Phillip reviews your requirements directly and responds with a fixed project-based estimate that reflects your actual scope, including programming, QA, deployment configuration, and agreed reporting setup.</p>
        </li>
        <li class="panel">
          <p class="section-number">Step 3</p>
          <h3 class="card-title">Begin the project</h3>
          <p class="card-body-text">Once timeline and scope are aligned, programming begins. You get direct access throughout implementation for questions, revisions, and QA sign-off until the study is ready to launch.</p>
        </li>
      </ol>
    </section>

    <section class="section" aria-labelledby="pull-quote-heading" data-reveal>
      <div class="panel measure">
        <h2 id="pull-quote-heading" class="card-title">From Phillip Emmons</h2>
        <blockquote class="card-body-text">
          Survey systems should be precise, accessible, and operationally dependable from day one. Every inquiry gets full attention, and every quote reflects the actual work your study requires rather than a generic package tier.
        </blockquote>
        <p class="form-help"><strong>Phillip Emmons</strong>, Survey Programming Specialist, Marina, CA</p>
      </div>
    </section>

    <section class="section" aria-labelledby="why-work-heading" data-reveal>
      <div class="section-head">
        <p class="section-number">Why work with Phillip</p>
        <h2 id="why-work-heading">Direct accountability and enterprise-tested experience</h2>
        <p class="section-deck">You work with the person building and deploying your survey from first inquiry through delivery, with no production handoffs and no communication bottlenecks.</p>
      </div>
      <div class="grid-3">
        <article class="panel">
          <h3 class="card-title">Direct operator access</h3>
          <p class="card-body-text">You communicate directly with Phillip for scope, logic implementation, QA, and launch planning.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">International panel scale</h3>
          <p class="card-body-text">Workflows are shaped by enterprise field operations supporting 185,000+ panel members across 80+ countries.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">WCAG 2.1 first</h3>
          <p class="card-body-text">Accessibility is built into survey interaction patterns from the beginning, not retrofitted late in the process.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Fixed project pricing</h3>
          <p class="card-body-text">Quotes are scoped to deliverables so your base project cost is clear before programming begins.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Platform flexibility</h3>
          <p class="card-body-text">LimeSurvey is primary, with support for Qualtrics, SurveyMonkey, Alchemer, and other platform requirements.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Fast quote turnaround</h3>
          <p class="card-body-text">Most inquiries receive a custom estimate within two business days, with clarifying questions only when needed.</p>
        </article>
      </div>
    </section>

    <section class="section" aria-labelledby="helpful-include-heading" data-reveal>
      <div class="section-head">
        <p class="section-number">Helpful to include</p>
        <h2 id="helpful-include-heading">Details that strengthen your inquiry</h2>
        <p class="section-deck">You do not need a polished specification to request a quote. A working draft plus context is enough, and the details below improve estimate accuracy when available.</p>
      </div>
      <div class="grid-3">
        <article class="panel">
          <h3 class="card-title">Study type</h3>
          <p class="card-body-text">Market research, academic, corporate, or customer experience context helps frame logic and reporting assumptions.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Estimated question count</h3>
          <p class="card-body-text">A rough range is enough and helps scope programming complexity and timeline realistically.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Languages needed</h3>
          <p class="card-body-text">Multilingual work expands setup and QA requirements across each locale and language variant.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Target launch date</h3>
          <p class="card-body-text">Deadlines help prioritize scheduling and surface timing risks before implementation starts.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Reporting needs</h3>
          <p class="card-body-text">Dashboards, exports, and post-field views can be scoped early so reporting requirements are covered in the quote.</p>
        </article>
        <article class="panel">
          <h3 class="card-title">Platform or panel preference</h3>
          <p class="card-body-text">Note existing platform constraints so the estimate reflects your current tooling and deployment workflow.</p>
        </article>
      </div>
    </section>

    <section class="section" aria-labelledby="faq-heading" data-reveal>
      <div class="section-head">
        <p class="section-number">Common questions</p>
        <h2 id="faq-heading">Frequently asked questions about survey programming quotes</h2>
        <p class="section-deck">More pricing and scope guidance is also available on the <a href="pricing.php">Pricing page</a>.</p>
      </div>
      <div class="faq-list mt-4">
        <details class="faq-item">
          <summary>How quickly can I receive a survey programming quote?</summary>
          <div class="faq-answer">
            <p>Most inquiries receive a custom project-based quote within two business days. Complex studies may require clarifying questions before final scoping.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>What survey platforms do you support?</summary>
          <div class="faq-answer">
            <p>LimeSurvey is the primary platform. Phillip also supports Qualtrics, SurveyMonkey, Alchemer, and other platforms based on project requirements.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>Do you program multilingual surveys?</summary>
          <div class="faq-answer">
            <p>Yes. Multilingual deployment includes locale setup, translation integration, and QA across language variants to confirm consistent logic and display behavior.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>How does project-based pricing compare to hourly billing?</summary>
          <div class="faq-answer">
            <p>Project-based pricing ties scope to a clear deliverable and cost, reducing budget uncertainty compared with open-ended hourly billing.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>What information do I need to submit an inquiry?</summary>
          <div class="faq-answer">
            <p>A rough questionnaire draft or project outline is enough. Helpful details include study type, estimated question count, languages, launch date, and reporting requirements.</p>
          </div>
        </details>
        <details class="faq-item">
          <summary>Are surveys built to WCAG 2.1 accessibility standards?</summary>
          <div class="faq-answer">
            <p>Yes. Accessibility is included from the start with keyboard-friendly patterns, screen-reader compatibility, and mobile-responsive behavior.</p>
          </div>
        </details>
      </div>
    </section>

    <section class="section" id="inquiry-form" data-reveal>
      <div class="section-head">
        <p class="section-number">Inquiry form</p>
        <h2 id="inquiry-form-heading">Request a custom survey programming quote</h2>
        <p class="section-deck">Use this form to describe your study and request a project-based estimate. You will receive a direct personal response within two business days.</p>
      </div>

      <div class="split split-main split-start">
        <form method="POST" action="" novalidate aria-labelledby="form-heading" class="form-shell">
          <h3 id="form-heading" class="sr-only">Inquiry Form</h3>
          <p id="form-intro" class="form-help mt-2">Include the details you already have. A polished specification is not required for a meaningful quote.</p>

          <?php if ($status_message !== ''): ?>
            <?php $is_success_status = $status === 'success'; ?>
            <?php $status_alert_class = $is_success_status ? 'alert-success' : 'alert-danger'; ?>
            <?php $status_alert_role = $is_success_status ? 'status' : 'alert'; ?>
            <?php $status_live_mode = $is_success_status ? 'polite' : 'assertive'; ?>
            <div class="alert <?= $status_alert_class; ?>" role="<?= $status_alert_role; ?>" aria-live="<?= $status_live_mode; ?>" tabindex="-1">
              <?= htmlspecialchars($status_message, ENT_QUOTES, 'UTF-8'); ?>
            </div>
          <?php endif; ?>

          <?php if ($error_summary_by_field !== []): ?>
            <div class="alert alert-danger" role="alert" id="form-errors" tabindex="-1">
              <p class="mb-2"><strong>Please correct the following:</strong></p>
              <ul class="error-summary-list">
                <?php foreach ($error_summary_by_field as $error_field_name => $error_message): ?>
                  <li><a href="#<?= sanitize_input($error_field_anchor_by_name[$error_field_name] ?? 'form-heading'); ?>"><?= sanitize_input((string) $error_message); ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars((string) $_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

          <div class="sr-only">
            <label for="beeName">Sunflower Name</label>
            <input id="beeName" name="beeName" type="text" tabindex="-1" autocomplete="off" value="">
          </div>

          <fieldset class="form-group">
            <legend class="form-label">Inquiry details</legend>

            <div class="form-row">
              <label class="form-label" for="name">Name <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <input id="name" name="name" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['name']; ?>" value="<?= htmlspecialchars($get_submitted_value('name', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="name" placeholder="Your full name" required aria-describedby="name-error" <?= $get_invalid_attribute('name', $errors); ?>>
              <p id="name-error" class="field-error"><?= sanitize_input($errors['name'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="email">Email <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <input id="email" name="email" type="email" class="input" maxlength="<?= (int) $field_max_length_by_name['email']; ?>" value="<?= htmlspecialchars($get_submitted_value('email', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="email" inputmode="email" placeholder="you@organization.com" required aria-describedby="email-error" <?= $get_invalid_attribute('email', $errors); ?>>
              <p id="email-error" class="field-error"><?= sanitize_input($errors['email'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="org">Organization</label>
              <input id="org" name="org" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['org']; ?>" value="<?= htmlspecialchars($get_submitted_value('org', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="organization" placeholder="Company, university, or firm" aria-describedby="org-error" <?= $get_invalid_attribute('org', $errors); ?>>
              <p id="org-error" class="field-error"><?= sanitize_input($errors['org'] ?? ''); ?></p>
            </div>
          </fieldset>

          <fieldset class="form-group">
            <legend class="form-label">Project details</legend>

            <div class="form-row">
              <label class="form-label" for="study_type">Study Type</label>
              <select id="study_type" name="study_type" class="select">
                <option value="">-- Select a study type --</option>
                <option value="Market Research" <?= $get_submitted_value('study_type', $submitted_form_values) === 'Market Research' ? 'selected' : ''; ?>>Market Research</option>
                <option value="Academic or Institutional" <?= $get_submitted_value('study_type', $submitted_form_values) === 'Academic or Institutional' ? 'selected' : ''; ?>>Academic or Institutional</option>
                <option value="Corporate or HR" <?= $get_submitted_value('study_type', $submitted_form_values) === 'Corporate or HR' ? 'selected' : ''; ?>>Corporate or HR</option>
                <option value="Other" <?= $get_submitted_value('study_type', $submitted_form_values) === 'Other' ? 'selected' : ''; ?>>Other</option>
              </select>
            </div>

            <div class="form-row">
              <label class="form-label" for="num_questions">Estimated Question Count</label>
              <select id="num_questions" name="num_questions" class="select">
                <option value="">-- Estimated question count --</option>
                <option value="Fewer than 25" <?= $get_submitted_value('num_questions', $submitted_form_values) === 'Fewer than 25' ? 'selected' : ''; ?>>Fewer than 25</option>
                <option value="25-75" <?= $get_submitted_value('num_questions', $submitted_form_values) === '25-75' ? 'selected' : ''; ?>>25-75</option>
                <option value="75-150" <?= $get_submitted_value('num_questions', $submitted_form_values) === '75-150' ? 'selected' : ''; ?>>75-150</option>
                <option value="150+" <?= $get_submitted_value('num_questions', $submitted_form_values) === '150+' ? 'selected' : ''; ?>>150+</option>
              </select>
            </div>

            <div class="form-row">
              <label class="form-label" for="languages">Languages Needed</label>
              <input id="languages" name="languages" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['languages']; ?>" value="<?= htmlspecialchars($get_submitted_value('languages', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. English, Spanish, French" autocomplete="off" aria-describedby="languages-error" <?= $get_invalid_attribute('languages', $errors); ?>>
              <p id="languages-error" class="field-error"><?= sanitize_input($errors['languages'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="launch_date">Target Launch Date</label>
              <input id="launch_date" name="launch_date" type="date" min="<?= date('Y-m-d'); ?>" class="input" value="<?= htmlspecialchars($get_submitted_value('launch_date', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="off">
            </div>

            <div class="form-row">
              <label class="form-label" for="subject">Subject <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <input id="subject" name="subject" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['subject']; ?>" value="<?= htmlspecialchars($get_submitted_value('subject', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Brief description of your inquiry" required aria-describedby="subject-error" <?= $get_invalid_attribute('subject', $errors); ?>>
              <p id="subject-error" class="field-error"><?= sanitize_input($errors['subject'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="description">Project Description <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <textarea id="description" name="description" rows="5" class="textarea" maxlength="<?= (int) $field_max_length_by_name['description']; ?>" placeholder="Describe your study, goals, logic complexity, platform preferences, and reporting needs." required aria-describedby="description-error" <?= $get_invalid_attribute('description', $errors); ?>><?= htmlspecialchars($get_submitted_value('description', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?></textarea>
              <p id="description-error" class="field-error"><?= sanitize_input($errors['description'] ?? ''); ?></p>
            </div>
          </fieldset>

          <button type="submit" name="submit" value="submit" class="btn-primary w-full">Send Inquiry</button>
          <p class="form-help">Fields marked <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only">with an asterisk</span> are required.</p>
          <ul class="trust-row trust-row-light" aria-label="Inquiry trust markers">
            <li class="trust-marker">Response within two business days</li>
            <li class="trust-marker">No agency middle layer</li>
            <li class="trust-marker">Secure direct intake</li>
          </ul>
        </form>

        <aside class="panel stack-4" aria-label="What to expect after submitting">
          <div>
            <h3 class="card-title">What to expect</h3>
            <p class="card-body-text mt-2">After submitting, Phillip reviews your inquiry personally and responds with a tailored estimate based on your actual requirements. This is not an automated system and there is no routing queue between your message and a direct reply.</p>
          </div>
          <ul class="stack-3">
            <li><strong>Personal response:</strong> Phillip reads every inquiry and replies directly.</li>
            <li><strong>No commitment required:</strong> A quote is an estimate with no obligation to proceed.</li>
            <li><strong>Two business day target:</strong> Complex studies may require a clarifying question before final pricing.</li>
            <li><strong>Tailored pricing:</strong> Quotes are based on your actual study scope, not a package minimum.</li>
            <li><strong>Confidential intake:</strong> Project details are handled with discretion.</li>
          </ul>
          <p><strong>Phone:</strong> <a href="tel:+18312360849">831.236.0849</a></p>
        </aside>
      </div>
    </section>
  </div>

</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
