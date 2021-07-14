<?php
  global $set_fv_meta_description, $set_fv_meta_og_image;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">

  <!-- title -->
  <title><?php echo wp_get_document_title(); ?></title>
  <meta property="og:title" content="<?php echo wp_get_document_title(); ?>">

  <?php
  // ディスクリプション用変数
  $fv_meta_description = $set_fv_meta_description;
  // og:type
  $fv_meta_og_type = is_front_page() ? 'website' : 'article';
  // og:image（初期値）
  $fv_meta_og_image = get_template_directory_uri() . 'assets/images/' . 'og-image.jpg';
  if ( ! empty( $set_fv_meta_og_image ) ) :
    $fv_meta_og_image = $set_fv_meta_og_image;
  endif;

  // sprintf();
  ?>

  <!-- ディスクリプション -->
  <?php if ( ! empty( $set_fv_meta_description ) ) : ?>
  <meta name="description" content="<?php echo $fv_meta_description ?>">
  <meta property="og:description" content="<?php echo $fv_meta_description ?>">
  <?php endif; ?>

  <!-- ogp／twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="<?php echo $fv_meta_og_type; ?>">
  <meta property="og:image" content="<?php echo $fv_meta_og_image; ?>">
  <meta property="og:site_name" content="WEBサイト名">

  <!-- canonical url -->
  <meta property="og:url" content="カレントURL">
  <link rel="canonical" href="基本カレントURL">

  <!-- favicon -->
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="apple-touch-icon" size="180x180" href="apple-touch-icon.png">

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
