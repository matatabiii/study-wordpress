<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">

  <?php
  // デフォルト値を決める
  $meta_description = 'ディスクリプションです';
  $meta_og_type = 'article'; // website | article
  $meta_site_name = 'サイト名';
  $meta_og_image = 'og-image.jpg';
  $meta_og_url = get_pagenum_link( get_query_var( 'paged' ) );
  $meta_canonical = esc_url( get_post_type_archive_link( 'post' ) ); // wp_headがある程度自動で出力(homeのみでOK)
  ?>

  <!-- title -->
  <title><?php echo wp_get_document_title(); ?></title>
  <meta property="og:title" content="<?php echo wp_get_document_title(); ?>">
  <!-- description -->
  <meta name="description" content="<?php echo $meta_description; ?>">
  <meta property="og:description" content="<?php echo $meta_description; ?>">
  <!-- ogp／twitter -->
  <meta name="author" content="<%- fvGet.head.author %>">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="<?php echo $meta_og_type; ?>">
  <meta property="og:image" content="<?php echo $meta_og_image; ?>">
  <meta property="og:site_name" content="<?php echo $meta_site_name ?>">
  <!-- canonical url -->
  <meta property="og:url" content="<?php echo $meta_og_url; ?>">
  <link rel="canonical" href="<?php echo $meta_canonical; ?>">
  <!-- favicon -->
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">

  <?php wp_head(); ?>
</head>
<body>


  <header id="header" class="l-header">
    <div class="l-header__logo">
      <h1 class="l-header__logo__label"><a href="/">WordPressの集い</a></h1>
    </div>

    <nav class="l-header__nav l-nav">
      <ul class="l-nav__lists">
        <li class="l-nav__item"><a class="l-nav__link" href="./">ホーム</a></li>
        <li class="l-nav__item"><a class="l-nav__link" href="./blog/">ブログ</a></li>
        <li class="l-nav__item"><a class="l-nav__link" href="./contact/">お問い合わせ</a></li>
        <li class="l-nav__item"><a class="l-nav__link" href="./works/">実績</a></li>
      </ul>
    </nav>
  </header>
