<?php require 'includes/header.php'; ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/product.css">
  <title>商品一覧</title>
</head>

<body>
  <h1>商品一覧</h1>
  <div class="flex_content">



    <?php
    $img1 = ['goodslist_cont1_no1_pc.png', 'goodslist_cont1_no2_pc.png', 'goodslist_cont1_no3_pc.png', 'goodslist_cont1_no4_pc.png', 'goodslist_cont1_no5_pc.png', 'goodslist_cont1_no6_pc.png'];

    $img2 = ['goodslist_cont2_no1_pc.png', 'goodslist_cont2_no2_pc.png', 'goodslist_cont2_no3_pc.png', 'goodslist_cont2_no4_pc.png', 'goodslist_cont2_no5_pc.png', 'goodslist_cont2_no6_pc.png'];

    $name1 = ['CCドーナツ 当店オリジナル（5個入り）', 'チョコレートデライト（5個入り）', 'キャラメルクリーム（5個入り）', 'プレーンクラシック
  （5個入り）', '【新作】サマーシトラス（5個入り）', 'ストロベリークラッ
  シュ（5個入り）'];

    $name2 = ['フルーツドーナツセット（12個入り）', 'フルーツドーナツセット（14個入り）', 'ベストセレクションボックス（4個入り）', 'チョコクラッシュボックス（7個入り）', 'クリームボックス（4
  個入り）', 'クリームボックス（9
  個入り）'];

    $price1 = ['税込  ￥1,500', '税込  ￥1,600',  '税込  ￥1,600', '税込  ￥1,500', '税込  ￥1,600', '税込  ￥1,800'];

    $price2 = ['税込  ￥3,500', '税込 ￥4,000', '税込 ￥1,200', '税込  ￥2,400', '税込  ￥1,400', '税込  ￥2,800'];

    // 商品一覧の１つ
    foreach (array_map(null, $img1, $name1, $price1) as $key => [$col1, $n, $p]) {
      $id = $key + 1;
      echo <<<END
      <div class="flex_item">
  <p><img src="common/images/{$col1}" alt="商品画像"></p>
<p>{$n}</p>
<div class="inner_flex">
<p>{$p}</p>
<p><img src="common/images/heart.svg" alt="heart"></p>
</div>
<button class="btn_cart"><a href="#">カートに入れる</a></button>
</div>
END;
    }
    ?>

  </div>


  <h1>バラエティセット</h1>
  <div class="flex_content2">

    <?php
    // 商品一覧の２つ目
    foreach (array_map(null, $img2, $name2, $price2) as $key => [$col3, $n2, $p2]) {
      $id = $key + 7;
      echo <<<END


    <div class="flex_item">
      <p><img src="common/images/{$col3}" alt="商品画像"></p>
      <p>{$n2}</p>  
      <p>{$p2}</p>
      <p><img src="common/images/heart.svg" alt="heart"></p>
      <button class="btn_cart"><a href="#">カートに入れる</a></button>
    </div>
END;
    }
    // var_dump($key);
    ?>
  </div>

</body>

</html>








<?php require 'includes/footer.php'; ?>