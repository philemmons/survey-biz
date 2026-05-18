<?php
declare(strict_types=1); /* BEWARE THE BOM */

if (session_status() !== PHP_SESSION_ACTIVE) {
    $is_https_request = (
        (!empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off') ||
        (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443)
    );

    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', $is_https_request ? '1' : '0');
    ini_set('session.cookie_samesite', 'Lax');

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => $is_https_request,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();
}

define('SITE_NAME', 'Phillip Emmons');
define('SITE_URL', 'https://survey.philemmons.net');
define('SITE_PHONE', '831.236.0849');
define('SITE_TEL', '+18312360849');
define('CONTACT_EMAIL', 'philemmons.now@gmail.com');
define('MAIL_FROM_EMAIL', 'admin@philemmons.net');
define('BASE_PATH', __DIR__);
