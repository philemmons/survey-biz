<?php
declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';
$page_title = $page_title ?? 'Survey Programming';
$meta_description = $meta_description ?? 'Freelance survey programming services for research teams.';
if (!isset($canonical_url)) {
    $request_path = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH);
    if ($request_path === '' || $request_path === '/index' || $request_path === '/index.php') {
        $request_path = '/';
    } elseif (str_ends_with($request_path, '.php')) {
        $request_path = substr($request_path, 0, -4);
    }
    $canonical_url = rtrim(SITE_URL, '/') . ($request_path === '/' ? '/' : $request_path);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark">
  <meta name="theme-color" content="#0f1923">
  <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> | Phillip Emmons</title>
  <meta name="description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

  <meta property="og:title" content="<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> | Phillip Emmons">
  <meta property="og:description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:site_name" content="Phillip Emmons - Survey Programming">

  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" href="css/tokens.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/utilities.css">
  <link rel="stylesheet" href="css/accessibility.css">
  <?php
  if (isset($page_stylesheets) && is_array($page_stylesheets)) {
      foreach ($page_stylesheets as $stylesheet) {
          if (is_string($stylesheet) && $stylesheet !== '') {
              echo '  <link rel="stylesheet" href="' . htmlspecialchars($stylesheet, ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
          }
      }
  }
  ?>
</head>
<body>
