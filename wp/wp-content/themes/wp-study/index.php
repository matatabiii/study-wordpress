<?php
/**
 * Template Name: 投稿
 */
?>
<?php
  get_header();
?>

<div class="l-content">
  <main id="main" class="l-main">
    <div class="p-post-group">

      <?php // have_posts(), while で記事をループ ?>

      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

      <?php
            $datetime = get_the_date( DATE_W3C );

            // ■投稿に割り当てられたタクソノミーのターム（カスタム分類の項目）を取得する
            $term_list_html_format = '<a class="p-feed-post__tag p-feed-post__tag--%3$s" href="%2$s">%1$s</a>　';
            $term_list_html = '';
            $get_the_terms = get_the_terms( get_the_ID(), 'category' );

            if ( $get_the_terms && ! is_wp_error( $get_the_terms ) ) :
              foreach ( $get_the_terms as $term ) :
                $term_name = esc_html( $term->name );
                $term_slug = esc_html( $term->slug );
                $term_url = get_term_link( $term );

                // フォーマットに合わせて設定
                // $term_list_html .= sprintf(
                //   $term_list_html_format,
                //   $term_name, // %1$s
                //   $term_url, // %2$s
                //   $term_slug // %3$s
                // );

                $term_list_html .= '<a class="p-feed-post__tag p-feed-post__tag--' . $term_slug . '" href="' . $term_url . '">' . $term_name . '</a>　';
              endforeach;
            endif;

            // ■サムネイル画像の取得
            $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), '240x160' );
            $thumbnail_url_2x = get_the_post_thumbnail_url( get_the_ID(), '240x160@2x' );

            // デフォルト画像
            if ( ! $thumbnail_url || ! $thumbnail_url_2x ) :
              $thumbnail_url = 'https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像';
              $thumbnail_url_2x = 'https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像';
            endif;
            ?>

      <div class="p-post-group__col">
        <article class="p-feed-post">
          <h3 class="p-feed-post__title"><a href="<?php the_permalink(); ?>"><?php get_the_title(); ?></a></h3>

          <figure class="p-feed-post__thumb">
            <img src="<?php echo esc_url( $thumbnail_url ); ?>" srcset="<?php echo esc_url( $thumbnail_url_2x ); ?>"
              width="240" height="160" alt="">
          </figure>

          <time class="p-feed-post__time"
            datetime="<?php echo esc_attr( $datetime ); ?>"><?php the_time('Y.m.d'); ?></time>

          <p class="p-feed-post__text"><?php the_excerpt(); ?></p>

          <p class="p-feed-post__tags"><?php echo $term_list_html; ?></p>

          <p class="p-feed-post__btn">
                  <a class="p-btn" href="<?php the_permalink(); ?>">記事を見る</a>
                </p>
        </article>
      </div>
      <?php endwhile; ?>
      <?php else : ?>
      <p>記事がありませーん</p>
      <?php endif; ?>
    </div>

    <?php pager_number_list(); ?>
  </main>

  <?php get_sidebar(); ?>
</div>

<?php
  get_footer();
?>