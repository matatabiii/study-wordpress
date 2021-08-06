<?php
/**
 * Template Name: トップページ
 */
?>
<?php
  get_header();
?>

<main id="main" class="l-main">

  <?php
  $fv_wp_query = new WP_Query( array(
    'post_type' => 'post', // 投稿タイプ
    'posts_per_page' => 10, // 表示する件数
    'tax_query' => array(
      array(
        'taxonomy' => 'category', // 絞り込みたいタクソノミー
        'field' => 'slug', // スラッグで絞り込みますよ
        'terms' => array( 'important', 'uncategorized' ), // カテゴリーのスラッグ
      )
    )
  ) );
  ?>
  <?php if ( $fv_wp_query->have_posts() ) : ?>
  <section class="p-section">
    <header class="p-section__header">
      <h2 class="p-heading-main p-heading-main--rv">重要なお知らせ</h2>
    </header>

    <div>
      <ul>
        <?php
          while ( $fv_wp_query->have_posts() ) :
            $fv_wp_query->the_post();
        ?>
        <li><a href="<?php the_permalink(); ?>">重要なお知らせ：<?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
  <?php endif; ?>

  <section class="p-section">
    <header class="p-section__header">
      <h2 class="p-heading-main p-heading-main--rv">ブログ</h2>
    </header>

    <?php
    $fv_wp_query = new WP_Query( array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'ignore_sticky_posts' => true
    ) );
    ?>
    <div class="p-post-group">
      <?php if ( $fv_wp_query->have_posts() ) : ?>
      <?php while ( $fv_wp_query->have_posts() ) : $fv_wp_query->the_post(); ?>
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
      <?php endif; ?>
    </div>
  </section>

  <section class="p-section">
    <header class="p-section__header">
      <h2 class="p-heading-main p-heading-main--rv">○○の声</h2>
    </header>

    <div class="p-post-group p-post-group--column">
      <div class="p-post-group__col">
        <article class="p-feed-post p-feed-post--type-b">
          <figure class="p-feed-post__thumb">
            <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
              srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
          </figure>

          <div class="p-feed-post__main">
            <h3 class="p-feed-post__title"><a href="./blog/single.html">ブログのタイトルが入りますよよよ</a></h3>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                <a class="p-btn" href="./blog/single.html">記事を見る</a>
              </p>
          </div>
        </article>
      </div>

      <div class="p-post-group__col">
        <article class="p-feed-post p-feed-post--type-b">
          <figure class="p-feed-post__thumb">
            <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
              srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
          </figure>

          <div class="p-feed-post__main">
            <h3 class="p-feed-post__title"><a href="./blog/single.html">WordPressの基本を</a></h3>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                <a class="p-btn" href="./blog/single.html">記事を見る</a>
              </p>
          </div>
        </article>
      </div>

      <div class="p-post-group__col">
        <article class="p-feed-post p-feed-post--type-b">
          <figure class="p-feed-post__thumb">
            <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
              srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
          </figure>

          <div class="p-feed-post__main">
            <h3 class="p-feed-post__title"><a href="./blog/single.html">ブログのタイトルが入りますよよよ</a></h3>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                <a class="p-btn" href="./blog/single.html">記事を見る</a>
              </p>
          </div>
        </article>
      </div>

      <div class="p-post-group__col">
        <article class="p-feed-post p-feed-post--type-b">
          <figure class="p-feed-post__thumb">
            <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
              srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
          </figure>

          <div class="p-feed-post__main">
            <h3 class="p-feed-post__title"><a href="./blog/single.html">WordPressの基本を</a></h3>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                <a class="p-btn" href="./blog/single.html">記事を見る</a>
              </p>
          </div>
        </article>
      </div>
    </div>
  </section>
</main>

<?php
  get_footer();
?>