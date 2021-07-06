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


add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
	$output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/','（$2）</a>',$output);
	return $output;
}

add_filter( 'wp_list_categories', 'filter_to_wp_list_categories', 10, 2 );
function filter_to_wp_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
  return $output;
}
