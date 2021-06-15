<?php
  $root_path = '../';

  include_once( __DIR__ . '/../includes/header.php' );
?>

  <div class="l-hero">
    <h1 class="l-hero__label">ブログ</h1>
  </div>

  <div class="l-content">
    <main id="main" class="l-main">
      <div class="p-post-group">
        <div class="p-post-group__col">
          <article class="p-feed-post">
            <h3 class="p-feed-post__title"><a href="./single.html">ブログのタイトルが入りますよよよ</a></h3>

            <figure class="p-feed-post__thumb">
              <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
                srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
            </figure>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                  <a class="p-btn" href="./single.html">記事を見る</a>
                </p>
          </article>
        </div>

        <?php
        /*
        <div class="p-post-group__col">
          <article class="p-feed-post">
            <h3 class="p-feed-post__title"><a href="./single.html">WordPressの基本を</a></h3>

            <figure class="p-feed-post__thumb">
              <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
                srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
            </figure>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                  <a class="p-btn" href="./single.html">記事を見る</a>
                </p>
          </article>
        </div>

        <div class="p-post-group__col">
          <article class="p-feed-post">
            <h3 class="p-feed-post__title"><a href="./single.html">ブログのタイトルが入りますよよよ</a></h3>

            <figure class="p-feed-post__thumb">
              <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
                srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
            </figure>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                  <a class="p-btn" href="./single.html">記事を見る</a>
                </p>
          </article>
        </div>

        <div class="p-post-group__col">
          <article class="p-feed-post">
            <h3 class="p-feed-post__title"><a href="./single.html">WordPressの基本を</a></h3>

            <figure class="p-feed-post__thumb">
              <img src="https://placehold.jp/24/cccccc/ffffff/240x160.png?text=サムネイル画像"
                srcset="https://placehold.jp/24/cccccc/ffffff/480x320.png?text=サムネイル画像" width="240" height="160" alt="">
            </figure>

            <time class="p-feed-post__time" datetime="">2021.05.02</time>

            <p
              class="p-feed-post__text">記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま記事の抜粋を何文字取得して表示しま</p>

            <p class="p-feed-post__tags"><a class="p-feed-post__tag" href="./blog/category/hoge/">カテゴリーA</a></p>

            <p class="p-feed-post__btn">
                  <a class="p-btn" href="./single.html">記事を見る</a>
                </p>
          </article>
        </div>*/
        ?>
      </div>

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
    </main>

    <div id="sidebar" class="l-sidebar">
      <aside class="p-sidebar">
        <h2 class="p-sidebar__header">新着記事</h2>
        <ul class="p-sidebar__nav">
          <li><a href="../">記事A</a></li>
          <li><a href="../">記事B</a></li>
          <li><a href="../">記事C</a></li>
        </ul>
      </aside>

      <aside class="p-sidebar">
        <h2 class="p-sidebar__header">カテゴリー</h2>
        <ul class="p-sidebar__nav">
          <li><a href="../">カテゴリーA</a></li>
          <li><a href="../">カテゴリーB</a></li>
          <li>
            <a href="../">カテゴリーC</a>
            <ul>
              <li><a href="../">カテゴリーC - 01</a></li>
              <li><a href="../">カテゴリーC - 02</a></li>
              <li><a href="../">カテゴリーC - 03</a></li>
            </ul>
          </li>
        </ul>
      </aside>

      <aside class="p-sidebar">
        <h2 class="p-sidebar__header">アーカイブ</h2>
        <ul class="p-sidebar__nav">
          <li><a href="../">2021（5）</a></li>
          <li><a href="../">2020（3）</a></li>
          <li><a href="../">2019（10）</a></li>
        </ul>
      </aside>
    </div>
  </div>

<?php
  include_once( __DIR__ . '/../includes/footer.php' );
?>
