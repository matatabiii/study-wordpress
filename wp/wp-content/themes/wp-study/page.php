<?php
  // OG画像の処理
  $image_id = get_field('fv_og_image');
  if( $image_id ) {
    // sizeは add_image_size で追加したもの
    $image = wp_get_attachment_image_src( $image_id, 'og_image' );
    // OG画像を設定
    $set_fv_meta_og_image = $image[ 0 ];

    // どんなデータが取得できているかの確認
    // echo '<pre>';
    // var_dump( $image );
    // echo '</pre>';

     /*
    $image = array(4) {
      [0]=> url
      [1]=> width
      [2]=> height
      [3]=> リサイズされているか
    }
    */
  }

  $set_fv_meta_description = get_field( 'fv_description' );

  get_header();

  // fv_description
  // fv_og_image
?>

<div class="l-hero">
  <div class="l-hero__label">固定ページ</div>
</div>

<div class="l-content">
  <main id="main" class="l-main">
    <?php while( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </main>
</div>

<?php
  get_footer();
?>
