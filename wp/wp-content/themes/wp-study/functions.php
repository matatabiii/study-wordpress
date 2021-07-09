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

/**
 * タイトルタグ関連
 */
// タイトル文字内のセパレーターを変更
add_filter( 'document_title_separator', function( $sep ) {
  $sep = '|';
  return $sep;
} );

// タイトルタグの出力を制御
add_filter( 'document_title_parts', function( $title ) {
  global $post, $paged;
  $sep = '|';
  $post_type_name = get_post_type( $post );
  $post_type_object = get_post_type_object( $post_type_name );

  // $title['title'] = 'タイトル';
  // $title['page']  = '1';
  // $title['tagline'] = 'キャッチフレーズ';
  // $title[ 'site' ] = 'サイト名';

  if ( is_front_page() ) :
    $title[ 'tagline' ] = '';

  elseif ( is_archive() ) :
    $post_type_label = $post_type_object->label;

    // 投稿タイプがpost（標準の投稿）の時には表示設定で指定した固定ページのタイトルを設定
    if ( $post_type_name === 'post' ) :
      $post_type_label = get_the_title( get_option( 'page_for_posts' ) );
    endif;

    // 2ページ目以降
    if ( is_paged() ) :
      $title[ 'page' ] = '';
      $title[ 'title' ] .=  'の一覧 - ' . $paged . 'ページ目 ' . $sep . ' ' . $post_type_label;
    else :
    // 1ページ目
      $title[ 'title' ] .=  'の一覧 ' . $sep . ' ' . $post_type_label;
    endif;
  elseif ( is_home() ) :
    // 2ページ目以降
    if ( is_paged() ) :
      $title[ 'page' ] = '';
      $title[ 'title' ] .=  ' - ' . $paged . 'ページ目 ';
    endif;
  endif;

  return $title;
});

/**
 * サイドバー関連
 */
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


/**
 * ページャー関連
 */
// 連番ページャー
function pager_number_list () {
  global $wp_query, $paged;

  $end_size = 1;
  $mid_size = 2;
  $show_all = false; // 全てのページ番号リストを表示するか
  $current_paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1; // 現在のページ番号取得
  $posts_per_page = get_query_var('posts_per_page'); // 1ページあたりの件数
  $total_paged = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1; // 全ページ数
  $total_posts = $wp_query->found_posts; // 全記事件数

  $is_prev_paged = false; // 前が存在するか
  $is_next_paged = false; // 次が存在するか

  // ページが2未満の場合はページャーを出力しない
  if ( $total_paged < 2 ) return false;

  /*
  * 前後
  */
  // 前のリンク取得
  $prev_html = '<div class="is-disabled">prev</div>';
  if ( $current_paged > 1 ) :
    $is_prev_paged = true;
    $prev_link = esc_url( get_pagenum_link( $current_paged - 1 ) );
    $prev_paged_count = $posts_per_page; // 前のページに何件表示できるか
    $prev_html = '<a style="background: blue;" href="' . $prev_link . '" data-count="' . $prev_paged_count . '" class="">prev</a>';
  endif;

  // 次のリンク取得
  $next_html = '<div class="is-disabled">next</div>';
  if ( $current_paged < $total_paged ) :
    $is_next_paged = true;
    $next_link = esc_url( get_pagenum_link( $current_paged + 1 ) );
    $next_paged_count = $current_paged === $total_paged - 1 ? ( $total_posts - $posts_per_page ) % $posts_per_page : $posts_per_page; // 前のページに何件表示できるか

    if ( $next_paged_count <= 0 ) :
      $next_paged_count = $posts_per_page;
    endif;

    $next_html = '<a style="background: red;" href="' . $next_link . '" data-count="' . $next_paged_count . '" class="">next</a>';
  endif;


  /*
  * 連番処理
  */
  $flag_dots = false; // フラグ: 省略文字列

  /*
  <div class="p-pager-archive">
    <ul class="p-pager-archive__items">
      <li class="p-pager-archive__item"><a class="p-pager-archive__link" href="../">01</a></li>
      <li class="p-pager-archive__item"><a class="p-pager-archive__link" href="../">02</a></li>
      <li class="p-pager-archive__item"><a class="p-pager-archive__link" href="../">03</a></li>
      <li class="p-pager-archive__item"><a class="p-pager-archive__link" href="../">04</a></li>
      <li class="p-pager-archive__item">･･･</li>
      <li class="p-pager-archive__item"><a class="p-pager-archive__link" href="../">05</a></li>
    </ul>
  </div>
  */

  $formats_pager = '
    <div class="p-pager-archive">
      <ul class="p-pager-archive__items">%1$s</ul>
      <div>%2$s</div>
      <div>%3$s</div>
    </div>
  '; // %1$s -> ul, %2$s -> prev, %3$s -> next
  $formats_list_current = '
    <li aria-current="%2$s" class="p-pager-archive__item">
      <span class="is-active p-pager-archive__link">%1$s</span>
    </li>'
  ; // %1$s -> 番号, %2$s -> WAI-ARIA
  $formats_list_default = '
    <li class="p-pager-archive__item">
      <a href="%2$s" class="p-pager-archive__link">%1$s</a>
    </li>
  '; // %1$s -> 番号, %2$s -> リンク
  $formats_list_dots = '
    <li class="p-pager-archive__item">
      ･･･
    </li>
  ';
  $formats_pager_prev_html = $prev_html;
  $formats_pager_next_html = $next_html;

  $lists = []; // liを格納するための配列

  for ( $n = 1; $n <= $total_paged; $n++ ) {
    if ($n == $current_paged) {
      // カレント: フォーマットを元に整形
      $lists[] = sprintf(
        $formats_list_current,
        number_format_i18n( $n ),
        esc_attr( 'page' )
      );

      $flag_dots = true;

    } else {
      if ( $show_all || ($n <= $end_size || ($current_paged && $n >= $current_paged - $mid_size && $n <= $current_paged + $mid_size) || $n > $total_paged - $end_size)) {
        $link = get_pagenum_link($n);

        // デフォルト: フォーマットを元に整形
        $lists[] = sprintf(
          $formats_list_default,
          number_format_i18n( $n ),
          esc_url( apply_filters( 'paginate_links', $link ) )
        );

        $flag_dots = true;

      } elseif ( $flag_dots && !$show_all ) {

        // 省略文字列
        $lists[] = $formats_list_dots;

        $flag_dots = false;
      }
    }
  }


  $html = sprintf(
    $formats_pager, // ul（ラッパー）
    implode("\n\t", $lists), // li
    $formats_pager_prev_html, // 前リンク
    $formats_pager_next_html, // 後リンク
  );

  echo $html;
}
