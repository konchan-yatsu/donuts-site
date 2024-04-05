<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>

<head>
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/index.css">
  <title>index | donuts-site</title>
</head>
<?php
if (isset($_SESSION['customer'])) {
  // ログインしてる
  echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['name'], '様</p>';
} else {
  // ログインしてない
  echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
}
?>

<body>
  <div id="stalker"></div>
  <section>
    <img class="sp_only hero_img" src="common/images/top_hero_sp.png" alt="top">
    <img class="pc_only hero_img" src="common/images/top_hero_pc.png" alt="top">
  </section>
  <section class="cont-1">
    <div class="dounts_content">
      <div class="dounts_line">
        <p class="dount_img01">
          <img class="dounts_img" src="common/images/top_cont1_summercitrus_pc.png" alt="サマーシストラス">
        </p>
        <p>サマーシトラス</p>
        <p class="new">新商品</p>
        <p></p>
      </div><!-- dounts_line_1 -->

      <div class="dounts_line_2">
        <p class="dounts_img02">
          <img src="common/images/top_cont1_donutslife_pc.png" alt="ドーナッツのある生活">
        </p>
        <p>ドーナッツのある生活</p>
      </div> <!-- dounts_line_2 -->
    </div> <!-- dounts_content -->

    <div class="dounts_line_3">
      <p class="product_img">
        <a href="product.php"><img class="sp_only" src="common/images/top_cont1_donutslist_sp.png" alt="商品一覧">
          <a href="product.php"><img class="pc_only" src="common/images/top_cont1_donutslist_pc.png" alt="商品一覧"></a>
          <p>商品一覧</p>
      </p>
    </div> <!-- dounts_line_3 -->
  </section>

  <section>
    <div class="philosophy_content">
      <p class="philosophy_img">
        <img class="sp_only" src="common/images/top_cont2_background_sp.png" alt="ドーナッツ">
        <img class="pc_only" src="common/images/top_cont2_background_pc.png" alt="ドーナッツ">
      </p>
      <div class="philosophy_text">
        <p>Philosophy</p>
        <p>私たちの信念</p>
        <p>"Creating Connections"</p>
        <p>ドーナツでつながる</p>
      </div>
    </div> <!-- philosophy_content -->
  </section>

  <section>
    <div class="ranking_title">
      <h1>人気ランキング</h1>
    </div><!-- ranking_title -->
    <div class="ranking">
      <?php
      $img = [
        'top_cont3_No1_sp.png', 'top_cont3_No2_sp.png', 'top_cont3_No3_sp.png',
        'top_cont3_No4_sp.png', 'top_cont3_No5_sp.png', 'top_cont3_No6_sp.png'
      ];
      $name = ['CCドーナツ 当店オリジナル(5個入り)', 'フルーツドーナツセット(12個入り)', 'フルーツドーナツセット(14個入り)', 'チョコレートデライト(5個入り)', 'ベストセレクションボックス(4個入り)', 'ストロベ リークラッ
シュ（5個入り)'];
      $price = ['税込 ￥1,500', '税込 ￥3,500', '税込 ￥4,000', '税込 ￥1,600', '税込 ￥1,200', '税込 ￥1,800'];
      $number = [1, 2, 3, 4, 5, 6];
      $id = [1, 7, 8, 2, 9, 6];


      foreach (array_map(null, $img, $name, $price, $id) as $key => [$i, $n, $p, $id]) {
        if ($id <= 6) {
          $category = 1;
        } else {
          $category = 2;
        }
        $num = 1;
        $num += $key;
        echo <<< END
      <div class="ranking_item slideIn">
      <div class="ranking_wrap">
        <div class="ranking_h5">
        <h5>{$num}</h5>
        </div>
        <p><a  href="detail-{$category}.php?id={$id}"><img class="product_photo" src="common/images/{$i}" alt="商品画像"></a></p>
        <a  href="detail-{$category}.php?id={$id}"><p class="ranking_text">{$n}</p></a>
        <div class="inner_flex">
        <a  href="detail-{$category}.php?id={$id}"><p class="ranking_text price">{$p}</p></a>
        <p><a  href="detail-{$category}.php?id={$id}"><img src="common/images/heart.svg" alt="heart"></a></p>
        </div>
        <form action="cart-input.php">
        <input type="hidden" name="id" value="{$id}">
        <input type="hidden" name="count" value=1>
        <input class="btn_cart" type="submit" value="カートに入れる ">
        </form>
        </div>
      </div>


END;
        // var_dump($key);
      }

      ?>
    </div>

  </section>
  <?php require 'includes/footer.php'; ?>
  <script src="common/js/common.js"> </script>

</body>

</html>