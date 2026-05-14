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
      <h1 id="inquiry-hero-heading">Start a project</h1>
      <p class="hero-sub">Tell me about your study and I will send back a custom quote, usually within two business days.</p>
    </div>
  </section>

  <div class="container">
    <section class="section" data-reveal>
      <div class="split split-start">
        <aside class="panel stack-4" aria-label="Inquiry details">
          <p><strong>Phone:</strong> <a href="tel:+18312360849">831.236.0849</a></p>
          <p class="card-body-text">You will receive a direct personal response from Phillip Emmons with next steps and a tailored quote based on your requirements.</p>
          <div>
            <h2 class="card-title">Helpful to include</h2>
            <ul class="stack-3 mt-3">
              <li>Study Type</li>
              <li>Estimated Question Count</li>
              <li>Languages Needed</li>
              <li>Target Launch Date</li>
              <li>Reporting Needs</li>
            </ul>
          </div>
        </aside>

        <form method="POST" action="" novalidate aria-labelledby="form-heading" class="form-shell">
          <h2 id="form-heading" class="sr-only">Inquiry Form</h2>
          <p id="form-intro" class="form-help mt-2">Use this form to request a quote. You will receive a response within two business days.</p>

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
              <input id="name" name="name" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['name']; ?>" value="<?= htmlspecialchars($get_submitted_value('name', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="name" required aria-describedby="name-error" <?= $get_invalid_attribute('name', $errors); ?>>
              <p id="name-error" class="field-error"><?= sanitize_input($errors['name'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="email">Email <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <input id="email" name="email" type="email" class="input" maxlength="<?= (int) $field_max_length_by_name['email']; ?>" value="<?= htmlspecialchars($get_submitted_value('email', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="email" inputmode="email" required aria-describedby="email-error" <?= $get_invalid_attribute('email', $errors); ?>>
              <p id="email-error" class="field-error"><?= sanitize_input($errors['email'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="org">Organization</label>
              <input id="org" name="org" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['org']; ?>" value="<?= htmlspecialchars($get_submitted_value('org', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" autocomplete="organization" aria-describedby="org-error" <?= $get_invalid_attribute('org', $errors); ?>>
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
              <input id="subject" name="subject" type="text" class="input" maxlength="<?= (int) $field_max_length_by_name['subject']; ?>" value="<?= htmlspecialchars($get_submitted_value('subject', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?>" required aria-describedby="subject-error" <?= $get_invalid_attribute('subject', $errors); ?>>
              <p id="subject-error" class="field-error"><?= sanitize_input($errors['subject'] ?? ''); ?></p>
            </div>

            <div class="form-row">
              <label class="form-label" for="description">Project Description <span class="required-indicator" aria-hidden="true">*</span><span class="sr-only"> required</span></label>
              <textarea id="description" name="description" rows="5" class="textarea" maxlength="<?= (int) $field_max_length_by_name['description']; ?>" placeholder="Describe your study, goals, and any special requirements." required aria-describedby="description-error" <?= $get_invalid_attribute('description', $errors); ?>><?= htmlspecialchars($get_submitted_value('description', $submitted_form_values), ENT_QUOTES, 'UTF-8'); ?></textarea>
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
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
