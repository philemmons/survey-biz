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

// Keep conversion-focused SEO copy in one place so shared pages do not drift into mismatched titles, descriptions, or canonical URLs.
function get_site_page_metadata(string $page_filename): array
{
    $page_metadata = [
        'index.php' => [
            'page_title' => 'Survey Programming & Deployment',
            'document_title' => 'Survey Programming & Deployment | LimeSurvey, WCAG & Multilingual Fielding',
            'meta_description' => 'Hire Phillip Emmons for direct survey programming, LimeSurvey deployment, WCAG-aware builds, multilingual fielding, and real-time reporting for research teams.',
            'og_type' => 'website',
            'canonical_path' => '/',
        ],
        'services.php' => [
            'page_title' => 'Survey Programming Services',
            'document_title' => 'Survey Programming Services | LimeSurvey Logic, Accessibility & Deployment',
            'meta_description' => 'Explore professional survey programming services: LimeSurvey logic, accessible design, multilingual deployment, Mailgun outreach, QA, and field reporting.',
            'og_type' => 'website',
            'canonical_path' => '/services.php',
        ],
        'use-cases.php' => [
            'page_title' => 'Survey Programming Use Cases',
            'document_title' => 'Survey Programming Use Cases | Research Teams, Agencies & Global Studies',
            'meta_description' => 'See how direct survey programming supports market research firms, academic teams, HR studies, enterprise research, and multilingual international fieldwork.',
            'og_type' => 'website',
            'canonical_path' => '/use-cases.php',
        ],
        'pricing.php' => [
            'page_title' => 'Survey Programming Pricing',
            'document_title' => 'Survey Programming Pricing | Project-Based Quotes Without Agency Markup',
            'meta_description' => 'Review project-based survey programming pricing with clear scope, no retainers, no agency markup, and direct quotes for LimeSurvey and deployment work.',
            'og_type' => 'website',
            'canonical_path' => '/pricing.php',
        ],
        'about.php' => [
            'page_title' => 'About Phillip Emmons',
            'document_title' => 'About Phillip Emmons | Freelance Survey Programmer & Deployment Specialist',
            'meta_description' => 'Phillip Emmons is a freelance survey programmer and deployment specialist with 100,000+ panel members reached across 130+ countries. Direct access, WCAG-aware delivery, and accountable survey builds.',
            'og_title' => 'About Phillip Emmons | Survey Programmer & Deployment Specialist',
            'og_type' => 'profile',
            'canonical_path' => '/about.php',
        ],
        'insights.php' => [
            'page_title' => 'Survey Programming Insights',
            'document_title' => 'Survey Programming Insights | Accessibility, Deployment & Research Ops',
            'meta_description' => 'Read practical guidance on survey programming, accessibility, multilingual deployment, data quality, and research operations from Phillip Emmons.',
            'og_type' => 'website',
            'canonical_path' => '/insights.php',
        ],
        'insight-post.php' => [
            'page_title' => 'Survey Programming Article',
            'document_title' => 'Survey Programming Article | Phillip Emmons',
            'meta_description' => 'Read practical survey programming guidance from Phillip Emmons.',
            'og_type' => 'article',
        ],
        'inquiry.php' => [
            'page_title' => 'Start A Survey Programming Inquiry',
            'document_title' => 'Start A Survey Programming Inquiry | Direct Project Quote',
            'meta_description' => 'Send your questionnaire, timeline, and fielding goals for a direct survey programming quote from Phillip Emmons.',
            'og_type' => 'website',
            'canonical_path' => '/inquiry.php',
        ],
        'privacy.php' => [
            'page_title' => 'Privacy Policy',
            'document_title' => 'Privacy Policy | CCPA/CPRA Rights And Survey Data Handling',
            'meta_description' => 'Review how Phillip Emmons handles inquiry details, client survey materials, service provider data processing, retention, sharing, and California CCPA/CPRA privacy rights.',
            'og_title' => 'Privacy Policy | Phillip Emmons Survey Programming',
            'og_type' => 'website',
            'canonical_path' => '/privacy.php',
        ],
        'terms.php' => [
            'page_title' => 'Terms of Service',
            'document_title' => 'Terms of Service | Survey Programming Website And Client Inquiry Terms',
            'meta_description' => 'Read the terms for using this survey programming website, submitting inquiries, client responsibilities, intellectual property, liability limits, privacy rights, and California governing law.',
            'og_title' => 'Terms of Service | Phillip Emmons Survey Programming',
            'og_type' => 'website',
            'canonical_path' => '/terms.php',
        ],
        'accessibility.php' => [
            'page_title' => 'Accessibility Statement',
            'document_title' => 'Accessibility Statement | WCAG-Aware Survey Programming',
            'meta_description' => 'Review the accessibility commitment for survey.philemmons.net, including WCAG 2.1 AA-oriented practices, keyboard support, and how to report access barriers.',
            'og_type' => 'website',
            'canonical_path' => '/accessibility.php',
        ],
        'security.php' => [
            'page_title' => 'Data Security Policy',
            'document_title' => 'Data Security Policy | LimeSurvey Hosting And Survey Data Safeguards',
            'meta_description' => 'Review Phillip Emmons data security practices for LimeSurvey deployments, encryption, access control, data minimization, incident response, and California privacy alignment.',
            'og_type' => 'website',
            'canonical_path' => '/security.php',
        ],
        '404.php' => [
            'page_title' => 'Page Not Found',
            'document_title' => 'Page Not Found | Phillip Emmons Survey Programming',
            'meta_description' => 'The page you requested could not be found.',
            'og_type' => 'website',
        ],
    ];

    return $page_metadata[$page_filename] ?? [];
}

// Prefer the real executing script because nav state and metadata sometimes point at different pages, especially article detail views.
function get_request_page_filename(?string $fallback_page = null): string
{
    $script_name = (string) ($_SERVER['SCRIPT_NAME'] ?? '');
    $php_self = (string) ($_SERVER['PHP_SELF'] ?? '');
    $request_script = $script_name !== '' ? $script_name : $php_self;
    $page_filename = basename($request_script);

    if ($page_filename === '' && is_string($fallback_page)) {
        $page_filename = basename($fallback_page);
    }

    return $page_filename !== '' ? $page_filename : 'index.php';
}

// Use explicit canonical paths for core pages so search engines see the intended PHP URLs instead of request or rewrite variants.
function build_site_canonical_url(string $page_filename, ?string $canonical_path = null): string
{
    if (is_string($canonical_path) && $canonical_path !== '') {
        return rtrim(SITE_URL, '/') . ($canonical_path === '/' ? '/' : $canonical_path);
    }

    $request_path = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH);
    if ($request_path === '' || $request_path === '/index' || $request_path === '/index.php') {
        return rtrim(SITE_URL, '/') . '/';
    }

    if ($page_filename !== '') {
        return rtrim(SITE_URL, '/') . '/' . $page_filename;
    }

    return rtrim(SITE_URL, '/') . $request_path;
}

// Static pages should use the central SEO map; dynamic article pages keep their per-post title, excerpt, and canonical URL.
function resolve_site_metadata(array $page_overrides = [], ?string $fallback_page = null): array
{
    $page_filename = get_request_page_filename($fallback_page);
    $configured_metadata = get_site_page_metadata($page_filename);
    $page_overrides = array_filter($page_overrides, static fn($value): bool => $value !== null);
    $metadata = $page_filename === 'insight-post.php' || $configured_metadata === []
        ? array_merge($configured_metadata, $page_overrides)
        : array_merge($page_overrides, $configured_metadata);

    $page_title = (string) ($metadata['page_title'] ?? 'Survey Programming');
    $document_title = (string) ($metadata['document_title'] ?? $page_title . ' | Phillip Emmons');
    $meta_description = (string) ($metadata['meta_description'] ?? 'Freelance survey programming services for research teams.');
    $canonical_url = (string) ($metadata['canonical_url'] ?? build_site_canonical_url($page_filename, $metadata['canonical_path'] ?? null));
    $og_title = (string) ($metadata['og_title'] ?? $document_title);
    $og_type = (string) ($metadata['og_type'] ?? ($page_filename === 'insight-post.php' ? 'article' : 'website'));

    return [
        'page_title' => $page_title,
        'document_title' => $document_title,
        'meta_description' => $meta_description,
        'canonical_url' => $canonical_url,
        'og_title' => $og_title,
        'og_type' => $og_type,
    ];
}
