<div id="sidebar" class="l-sidebar">
  <h1>get_sidebar()で読み込み</h1>

  <aside class="p-sidebar">
    <h2 class="p-sidebar__header">新着記事</h2>
    <ul class="p-sidebar__nav">
      <?php
      $args = array(
        'type'            => 'postbypost',
        'limit'           => 3,
        // 'format'          => '',
        'before'          => '<span class="hoge">',
        'after'           => '</span>',
        'show_post_count' => false,
        'echo'            => 1,
        'order'           => 'DESC',
        'post_type'     => 'post'
      );
      wp_get_archives( $args );
      ?>
    </ul>

  </aside>

  <aside class="p-sidebar">
    <h2 class="p-sidebar__header">カテゴリー</h2>
    <ul class="p-sidebar__nav">
    <?php
    $args = array(
      'show_option_all'    => '',
      'orderby'            => 'name',
      'order'              => 'ASC',
      'style'              => 'list',
      'show_count'         => 1,
      'hide_empty'         => 1,
      'use_desc_for_title' => 1,
      'child_of'           => 0,
      'feed'               => '',
      'feed_type'          => '',
      'feed_image'         => '',
      'exclude'            => '',
      'exclude_tree'       => '',
      'include'            => '',
      'hierarchical'       => 1,
      'title_li'           => false,
      'show_option_none'   => __( '' ),
      'number'             => null,
      'echo'               => 1,
      'depth'              => 0,
      'current_category'   => 0,
      'pad_counts'         => 0,
      'taxonomy'           => 'category',
      'walker'             => null
        );
      wp_list_categories( $args );
    ?>
    </ul>
  </aside>

  <aside class="p-sidebar">
    <h2 class="p-sidebar__header">アーカイブ</h2>
    <ul class="p-sidebar__nav">
      <?php
      $args = array(
        'type'            => 'yearly',
        // 'limit'           => 3,
        // 'format'          => '',
        'before'          => '<span class="hoge">',
        'after'           => '</span>',
        'show_post_count' => true,
        'echo'            => 1,
        'order'           => 'DESC',
        'post_type'     => 'post'
      );
      wp_get_archives( $args );
      ?>
    </ul>
  </aside>

  <aside class="p-sidebar">
    <h2 class="p-sidebar__header">アーカイブ（select）</h2>
    <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
      <?php
      $args = array(
        'type'            => 'monthly',
        // 'limit'           => 3,
        'format'          => 'option',
        'before'          => '<span class="hoge">',
        'after'           => '</span>',
        'show_post_count' => true,
        'echo'            => 1,
        'order'           => 'DESC',
        'post_type'     => 'post'
      );
      wp_get_archives( $args );
      ?>
    </select>
  </aside>
</div>
