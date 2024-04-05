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

  <!-- donuts単体グループの表示 -->
  <div class="flex_content">
    <?php require  'includes/database.php';

    $img1 = ['goodslist_cont1_no1_pc.png', 'goodslist_cont1_no2_pc.png', 'goodslist_cont1_no3_pc.png', 'goodslist_cont1_no4_pc.png', 'goodslist_cont1_no5_pc.png', 'goodslist_cont1_no6_pc.png'];

    $img2 = ['goodslist_cont2_no1_pc.png', 'goodslist_cont2_no2_pc.png', 'goodslist_cont2_no3_pc.png', 'goodslist_cont2_no4_pc.png', 'goodslist_cont2_no5_pc.png', 'goodslist_cont2_no6_pc.png'];


    for ($i = 1; $i < 7; $i++) {
      // imgパス用の番号を配列用に調整
      $imgId = $i - 1;

      $sql = $pdo->prepare('select * from product where id=?');
      $sql->execute([$i]);

      foreach ($sql as $row) {
        echo <<<END
<div class="flex_item">
  <p><a href="detail-1.php?id={$row['id']}"><img src="common/images/{$img1[$imgId]}" alt="商品画像"></a></p>
<p class="flex_name"><a href="detail-1.php?id={$row['id']}">{$row['name']}</a></p>
<div class="inner_flex">
<p><a href="detail-1.php?id={$row['id']}">税込&nbsp;￥{$row['price']}</a></p>
<p class="inner_heart"><img src="common/images/heart.svg" alt="heart"></p>
</div>
<form action="cart-input.php" method="post" class="btn_cart" >
<input type="hidden" name="id" value ="{$row['id']}">
<input type="hidden" name="count" value=1>
<input type="submit" value="カートに入れる">
</form>

</div>
END;
      }
    }
    ?>
  </div>

  <h1>バラエティセット</h1>

  <!-- donutsセットグループの表示 -->
  <div class="flex_content2">
    <?php require  'includes/database.php';

    $img1 = ['goodslist_cont1_no1_pc.png', 'goodslist_cont1_no2_pc.png', 'goodslist_cont1_no3_pc.png', 'goodslist_cont1_no4_pc.png', 'goodslist_cont1_no5_pc.png', 'goodslist_cont1_no6_pc.png'];

    $img2 = ['goodslist_cont2_no1_pc.png', 'goodslist_cont2_no2_pc.png', 'goodslist_cont2_no3_pc.png', 'goodslist_cont2_no4_pc.png', 'goodslist_cont2_no5_pc.png', 'goodslist_cont2_no6_pc.png'];


    // 途中からの7番目から出力
    for ($i = 7; $i < 13; $i++) {
      // imgパス用の番号を配列用に調整
      $imgId = $i - 7;

      $sql = $pdo->prepare('select * from product where id=?');
      $sql->execute([$i]);

      foreach ($sql as $row) {
        echo <<<END
<div class="flex_item">
  <p><a href="detail-2.php?id={$row['id']}"><img src="common/images/{$img2[$imgId]}" alt="商品画像"></a></p>
<p class="flex_name"><a href="detail-2.php?id={$row['id']}">{$row['name']}</a></p>
<div class="inner_flex">
<p><a href="detail-2.php?id={$row['id']}">税込&nbsp;￥{$row['price']}</a></p>
<p class="inner_heart"><img src="common/images/heart.svg" alt="heart"></p>
</div>
<form action="cart-input.php" method="post" class="btn_cart" >
<input type="hidden" name="id" value ="{$row['id']}">
<input type="hidden" name="count" value=1>
<input type="submit" value="カートに入れる">
</form>
</div>
END;
      }
    }
    ?>
  </div>


</body>

</html>

<?php require 'includes/footer.php'; ?>