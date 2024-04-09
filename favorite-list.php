<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>

<link rel="stylesheet" href="common/css/reset.css">
<link rel="stylesheet" href="common/css/favorite.css">
<title>favorite | donuts-site</title>
<html>

<body>
  <main>

    <?php
    if (isset($_SESSION['customer'])) {
      echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['name'], '様</p>';
      echo '<hr>';
      echo '<h1>お気に入り商品一覧</h1>';

      $favorite = $pdo->prepare(
        'SELECT * FROM `favorite` 
        JOIN `product` ON favorite.product_id = product.id
        WHERE customer_id=?'
      );
      $favorite->execute([$_SESSION['customer']['id']]);

      echo 'セッションカスタマーIDは', $_SESSION['customer']['id'];
      $sqla = $pdo->query('SELECT * FROM favorite JOIN product ON favorite.product_id = product.id WHERE customer_id=13');
      var_dump($sqla);
      $sql = $pdo->prepare('SELECT * FROM favorite JOIN product ON favorite.product_id = product.id WHERE customer_id=?');
      $sql->execute([$_SESSION['customer']['id']]);
      if (empty($sql->fetchAll())) {
        echo '結果データなし';
      } else {
        echo '結果データあり';
      }

      if (!empty($favorite->fetchAll())) {
        foreach ($favorite as $row) {
          var_dump($favorite);
          echo $row['id'];
          $id = $row['id'];
          $price = number_format($row['price']);

          echo '<div class="content">';
          echo '<div class="content_inner content_flex">';
          echo '<div class="content_1">';
          echo '<a  href="detail-', $row['category'], '.php?id=', $id, '" class=img_link><img class="product_photo sp_only" src="common/images/', $id, '_sp.png" alt="商品画像"></a>';
          echo '<a  href="detail-', $row['category'], '.php?id=', $id, '" class=img_link><img class="product_photo pc_only" src="common/images/', $id, '_pc.png" alt="商品画像"></a>';
          echo '</div><!-- /content_1 -->';
          echo '<div class="content_2">';
          echo '<p class="product_name">', $row['name'], '</p>';
          echo '<div class="content_2_inner">';
          echo '<p class="product_price">税込&emsp;&yen;', $price, '</p>';
          echo '<input class="btn_cart" type="submit" value="カートに入れる ">';
          echo '<i class="fa-thin fa-trash"></i>';
          echo '<p class="favorite_delete"><a href="favorite-delete.php?id=', $id, ' ">お気に入りから削除する</a></p>';
          echo '</div><!-- /content_2_inner -->';
          echo '</div><!-- /content_2 -->';
          echo '</div><!-- /content_inner -->';
          echo '</div><!-- /content -->';
        }
        echo 'テストです';
      } else {
        echo '<div class="content">';
        echo '<div class="content_inner">';
        echo '<p>お気に入り登録されている商品はありません。</p><br>';
        echo '<a href="product.php">商品一覧へ</a>';
        echo '</div><!-- /content_2_inner -->';
        echo '</div><!-- /content -->';
      }
    } else {
      echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
      echo '<hr>';
      echo '<h1>お気に入り商品一覧</h1>';
      echo '<p>お気に入りに商品を追加するには、ログインしてください。</p>';
      echo '<a href="login-input.php">ログインページへ</a>';
    }
    ?>

  </main>
  <?php require 'includes/footer.php'; ?>