<?php
declare(strict_types=1);

require_once BASE_PATH . '/config.php';

function is_current_page(string $page): bool
{
    return basename($_SERVER['PHP_SELF'] ?? '') === $page;
}

function sanitize_input(string $raw_text): string
{
    $sanitized_text = trim($raw_text);
    $sanitized_text = stripslashes($sanitized_text);
    return htmlspecialchars($sanitized_text, ENT_QUOTES, 'UTF-8');
}

function generate_csrf_token(): string
{
    if (
        empty($_SESSION['csrf_token']) ||
        !is_string($_SESSION['csrf_token']) ||
        !isset($_SESSION['csrf_token_issued_at']) ||
        (int) $_SESSION['csrf_token_issued_at'] <= 0
    ) {
        return rotate_csrf_token();
    }

    return $_SESSION['csrf_token'];
}

function get_csrf_token_ttl_seconds(): int
{
    return 7200;
}

function rotate_csrf_token(): string
{
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_token_issued_at'] = time();
    return $csrf_token;
}

function validate_csrf_token(string $provided_token, ?int $ttl_seconds = null): bool
{
    $session_token_value = $_SESSION['csrf_token'] ?? '';
    $issued_at_timestamp = (int) ($_SESSION['csrf_token_issued_at'] ?? 0);
    $token_ttl_seconds = $ttl_seconds ?? get_csrf_token_ttl_seconds();

    if (
        !is_string($session_token_value) ||
        $session_token_value === '' ||
        $provided_token === '' ||
        $issued_at_timestamp <= 0
    ) {
        return false;
    }

    if ((time() - $issued_at_timestamp) > $token_ttl_seconds) {
        return false;
    }

    return hash_equals($session_token_value, $provided_token);
}

function flash_set(string $alert_type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $alert_type,
        'message' => $message,
    ];
}

function flash_get(): void
{
    if (
        !isset($_SESSION['flash']) ||
        !is_array($_SESSION['flash']) ||
        !isset($_SESSION['flash']['type'], $_SESSION['flash']['message'])
    ) {
        return;
    }

    $alert_type = sanitize_input((string) $_SESSION['flash']['type']);
    $alert_message = sanitize_input((string) $_SESSION['flash']['message']);

    $alert_class_by_type = [
        'success' => 'alert-success',
        'danger' => 'alert-danger',
        'info' => 'alert-info',
    ];
    $alert_class = $alert_class_by_type[$alert_type] ?? 'alert-info';

    echo '<div class="alert ' . $alert_class . '" role="status">';
    echo $alert_message;
    echo '</div>';

    unset($_SESSION['flash']);
}

function build_inquiry_email(array $inquiry_details): string
{
    $email_lines = [];
    foreach ($inquiry_details as $field_name => $field_value) {
        if ($field_name === 'honeypot') {
            continue;
        }
        $field_label = strtoupper((string) $field_name);
        $email_lines[] = $field_label . ': ' . trim((string) $field_value);
    }
    return implode(PHP_EOL, $email_lines);
}

function sanitize_email_header(string $email_address): string
{
    $trimmed_email_address = trim($email_address);
    if ($trimmed_email_address === '') {
        return '';
    }

    // Prevent header injection through CRLF characters.
    if (preg_match('/[\r\n]/', $trimmed_email_address) === 1) {
        return '';
    }

    return filter_var($trimmed_email_address, FILTER_VALIDATE_EMAIL) ? $trimmed_email_address : '';
}

function get_inquiry_log_path(): string
{
    return BASE_PATH . '/logs/inquiry-mail.log';
}

function write_inquiry_log(string $log_message): void
{
    $timestamp_iso8601 = date('c');
    $log_entry = '[' . $timestamp_iso8601 . '] ' . $log_message . PHP_EOL;
    $inquiry_log_path = get_inquiry_log_path();
    $did_write_log = @file_put_contents($inquiry_log_path, $log_entry, FILE_APPEND | LOCK_EX) !== false;

    if (!$did_write_log) {
        error_log('Inquiry log write failed at path: ' . $inquiry_log_path);
        error_log('Inquiry log fallback: ' . trim($log_entry));
    }
}

function send_inquiry_email(string $reply_to_email, string $email_subject, string $email_body): bool
{
    $recipient_email = sanitize_email_header(CONTACT_EMAIL);
    $sender_email = sanitize_email_header(MAIL_FROM_EMAIL);
    $reply_to_address = sanitize_email_header($reply_to_email);

    if ($recipient_email === '' || $sender_email === '' || $reply_to_address === '') {
        write_inquiry_log('Inquiry mail failed: invalid email configuration or reply-to value.');
        error_log('Inquiry mail failed: invalid email configuration or reply-to value.');
        return false;
    }

    $email_headers = [
        'From: ' . $sender_email,
        'Reply-To: ' . $reply_to_address,
        'Sender: ' . $sender_email,
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
    ];
    $header_text = implode("\r\n", $email_headers);

    // Many cPanel/sendmail setups require -f for a valid envelope sender.
    //$sent = @mail($recipient_email, $email_subject, $email_body, $header_text, '-f' . $sender_email);
    //if (!$sent) {
        // Fallback for hosts that disallow additional parameters.
        $sent = @mail($recipient_email, $email_subject, $email_body, $header_text);
    //}

    if (!$sent) {
        $mail_error = error_get_last();
        $mail_error_text = is_array($mail_error) && isset($mail_error['message'])
            ? (string) $mail_error['message']
            : 'unknown mail() failure';
        write_inquiry_log('Inquiry mail failed to=' . $recipient_email . ' from=' . $sender_email . ' reply=' . $reply_to_address . ' error=' . $mail_error_text);
        error_log('Inquiry mail failed: ' . $mail_error_text);
        error_log('Inquiry file log path: ' . get_inquiry_log_path());
        return false;
    }

    write_inquiry_log('Inquiry mail accepted by transport to=' . $recipient_email . ' from=' . $sender_email . ' reply=' . $reply_to_address);
    return true;
}
