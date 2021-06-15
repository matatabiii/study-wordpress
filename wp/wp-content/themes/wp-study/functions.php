<?php
/**
 * アクションフック: after_setup_theme
 */
add_action( 'after_setup_theme', function () {

  // アイキャッチ画像の有効化
  add_theme_support( 'post-thumbnails' );

  // サムネイルサイズの追加（ 第3引数を true で指定サイズでクロップ ）
  add_image_size( 'og_image' , 1200 , 600 , true );
  add_image_size( '240x160' , 240 , 160 , true );
  add_image_size( '240x160@2x' , 480 , 320 , true );
} );
