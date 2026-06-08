<?php
declare(strict_types=1); /* BEWARE THE BOM */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';
$seo_metadata = resolve_site_metadata([
    'page_title' => $page_title ?? null,
    'document_title' => $document_title ?? null,
    'meta_description' => $meta_description ?? null,
    'canonical_url' => $canonical_url ?? null,
    'og_title' => $og_title ?? null,
    'og_type' => $og_type ?? null,
], $current_page ?? null);
$page_title = $seo_metadata['page_title'];
$document_title = $seo_metadata['document_title'];
$meta_description = $seo_metadata['meta_description'];
$canonical_url = $seo_metadata['canonical_url'];
$og_title = $seo_metadata['og_title'];
$og_type = $seo_metadata['og_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark">
  <meta name="theme-color" content="#0f1923">
  <title><?= htmlspecialchars($document_title, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

  <meta property="og:title" content="<?= htmlspecialchars($og_title, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="<?= htmlspecialchars($og_type, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:site_name" content="Phillip Emmons - Survey Programming and Deployment">

  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" href="css/tokens.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/footer.css">
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
