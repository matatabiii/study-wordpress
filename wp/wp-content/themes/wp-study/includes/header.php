<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップページ - WordPressの集い</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">

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
