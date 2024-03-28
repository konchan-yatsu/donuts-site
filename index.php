<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/index.css">
  <title>index|donuts-site</title>
</head>


<body>

  <?php require 'includes/header.php'; ?>



  <section>
    <img src="common/images/top_hero_sp.png" alt="top" class="hero_img
    ">
  </section>
  <section>
    <div class="dounts_content">
      <div class="dounts_line">
        <p class="dount_img01">
          <img src="common/images/top_cont1_summercitrus_sp.png" alt="サマーシストラス">
        </p>
        <p>サマーシトラス</p>
      </div>
      <div class="dounts_line_2">
        <p class="dounts_img02">
          <img src="common/images/top_cont1_donutslife_sp.png" alt="ドーナッツのある生活">
        </p>
        <p>ドーナッツのある生活</p>
      </div>

    </div>
    <p class="product_img">
      <img src="common/images/top_cont1_donutslist_sp.png" href="" alt="商品一覧">
    </p>
  </section>

  <section>
    <div class="philosophy_content">
      <p class="philosophy_img">
        <img src="common/images/top_cont2_background_sp.png" alt="ドーナッツ">
      </p>
      <div class="philosophy_text">
        <p>Philosophy</p>
        <p>私たちの信念</p>
        <p>"Creating Connections"</p>
        <p>ドーナツでつながる</p>
      </div>
    </div>
  </section>
  <section>
    <h1 class="underline">人気ランキング</h1>
    <!-- <div class="ranking">
      <div class="ranking_item">
        <h5></h5>
        <p><img src="common/images/top_cont3_No1_sp.png" alt="商品画像"></p>
        <p>CCドーナツ 当店オリジナル(5個入り)</p>
        <p>税込 ￥1,500</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
      <div class="ranking_item">
        <h5></h5>
        <img src="common/images/top_cont3_No2_sp.png" alt="商品画像">
        <p>フルーツドーナツセット(12個入り)</p>
        <p>税込 ￥3,500</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
      <div class="ranking_item">
        <h5></h5>
        <img src="common/images/top_cont3_No3_sp.png" alt="商品画像">
        <p>フルーツドーナツセット(14個入り)</p>
        <p>税込 ￥4,000</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
      <div class="ranking_item">
        <h5></h5>
        <img src="common/images/top_cont3_No4_sp.png" alt="商品画像">
        <p>チョコレートデライト(5個入り)</p>
        <p>税込 ￥1,600</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
      <div class="ranking_item">
        <h5></h5>
        <img src="common/images/top_cont3_No5_sp.png" alt="商品画像">
        <p>ベストセレクションボックス(4個入り)</p>
        <p>税込 ￥1,200</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
      <div class="ranking_item">
        <h5></h5>
        <img src="common/images/top_cont3_No6_sp.png" alt="商品画像">
        <p>ストロベ リークラッ
          シュ（5個入り）</p>
        <p>税込 ￥1,800</p>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>
    </div> -->
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

      foreach (array_map(null, $img, $name, $price) as $key => [$i, $n, $p]) {
        $num = 1;
        $num += $key;
        echo <<< END
      <div class="ranking_item">
        <div class="ranking_h5">
        <h5>{$num}</h5>
        </div>
        <p><img src="common/images/{$i}" alt="商品画像"></p>
        <p class="ranking_text">{$n}</p> 
        <div class="inner_flex">
        <p class="ranking_text">{$p}</p>
        <p><img src="common/images/heart.svg" alt="heart"></p>
        </div>
        <button class="btn_cart"><a href="#">カートに入れる</a></button>
      </div>


END;
        // var_dump($key);
      }

      ?>
    </div>

  </section>
  <?php require 'includes/footer.php'; ?>
</body>

</html>