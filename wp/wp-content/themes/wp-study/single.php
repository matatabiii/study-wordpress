<?php
  $root_path = '../';

  include_once( __DIR__ . '/includes/header.php' );
?>

  <div class="l-hero">
    <div class="l-hero__label">ブログ</div>
  </div>

  <div class="l-content">
    <main id="main" class="l-main">

    <?php while( have_posts() ) : the_post(); ?>

      <?php
      // ■投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得する
      $term_list_html_format = '<li><a href="%2$s">%1$s</a></li>';
      $term_list_html = '';
      $get_the_terms = get_the_terms( get_the_ID(), 'category' );

      if ( $get_the_terms && ! is_wp_error( $get_the_terms ) ) :
        foreach ( $get_the_terms as $term ) :
          $term_name = esc_html( $term->name );
          $term_slug = esc_html( $term->slug );
          $term_url = get_term_link( $term );

          // フォーマットに合わせて設定
          $term_list_html .= sprintf(
            $term_list_html_format,
            $term_name, // %1$s
            $term_url, // %2$s
          );
        endforeach;
      endif;
      ?>

      <article>
        <h1 class="p-heading-main"><?php the_title(); ?></h1>

        <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php the_time( 'Y.m.d' ) ?></time>

        <?php if ( ! empty( $term_list_html ) ) : ?>
        <ul>
          <?php echo $term_list_html; ?>
        </ul>
        <?php endif; ?>

        <div class="c-editor">
          <?php the_content(); ?>
        </div>
      </article>

    <?php endwhile; ?>

      <div class="p-pager-post">
        <div class="p-pager-post__btn"><a class="p-pager-post__link" href="./">古い記事</a></div>
        <div class="p-pager-post__btn"><a class="p-pager-post__link" href="./">一覧に戻る</a></div>
        <div class="p-pager-post__btn"><a class="p-pager-post__link" href="./">新しい記事</a></div>
      </div>
    </main>

    <?php get_sidebar(); ?>
  </div>

<?php
  include_once( __DIR__ . '/includes/footer.php' );
?>
