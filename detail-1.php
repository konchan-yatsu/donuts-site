<link rel="stylesheet" href="common/css/detail.css">
<title>商品詳細 | c.c.donuts オンラインショップ</title>

<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>

<?php
$sql = $pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {
  echo '<main>';
  echo '<p class="breadcrumb">&nbsp;<a href="index.php">TOP</a>&nbsp;&gt;&nbsp;<a href="product.php">商品一覧</a>&nbsp;&gt;&nbsp;', $row['name'], '</p>';
  echo '<hr>';

  if (isset($_SESSION['customer'])) {
    // ログインしてる
    echo '<p class="user_name">ようこそ&nbsp;', $_SESSION['customer']['name'], '様</p>';
    echo '<hr>';
  } else {
    // ログインしてない
    echo '<p class="user_name">ようこそ&nbsp;ゲスト様</p>';
    echo '<hr>';
  }
  echo '<div class="content">';
  echo '<div class="product_photo group_left">';
  if ($row['category'] == 2) {
    $id = $row['id'] - 6;
    echo '<img class="sp_only" src="common/images/goodslist_cont', $row['category'], '_no', $id, '_sp.png" alt="', $row['name'], 'の写真">';
    echo '<img class="pc_only" src="common/images/goodslist_cont', $row['category'], '_no', $id, '_pc.png" alt="', $row['name'], 'の写真">';
  } else {
    echo '<img class="sp_only" src="common/images/goodslist_cont', $row['category'], '_no', $row['id'], '_sp.png" alt="', $row['name'], 'の写真">';
    echo '<img class="pc_only" src="common/images/goodslist_cont', $row['category'], '_no', $row['id'], '_pc.png" alt="', $row['name'], 'の写真">';
  }
  echo '</div>';
  echo '<div class="group_right">';
  echo '<p class="product_name">', $row['name'], '</p>';
  echo '<p class="product_info">', $row['description'], '</p>';

  if (isset($_SESSION['customer'])) {
    $favorite = $pdo->prepare('SELECT * FROM favorite WHERE customer_id=? AND product_id=?');
    $favorite->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
    if (empty($favorite->fetchAll())) {
      echo '<p class="price">税込&nbsp;&yen;', number_format($row['price']), '&nbsp;<button><a href="favorite-insert.php?id=', $_REQUEST['id'], '"><img class="favorite_icon" src="common/images/heart.svg" alt="お気に入りボタン"></a></button></p>';
    } else {
      echo '<p class="price">税込&nbsp;&yen;', number_format($row['price']), '&nbsp;<button><a href="favorite-insert.php?id=', $_REQUEST['id'], '"><img class="favorite_icon" src="common/images/heart.png" alt="お気に入りボタン"></a></button></p>';
    }
  } else {
    echo '<p class="price">税込&nbsp;&yen;', number_format($row['price']), '&nbsp;<button><a href="favorite-insert.php?id=', $_REQUEST['id'], '"><img class="favorite_icon" src="common/images/heart.svg" alt="お気に入りボタン"></a></button></p>';
  }

  echo '<form action="cart-input.php"  method="post">';
  echo '<input type="hidden" name="id" value ="', $row['id'], '" >';
  echo '<p><input class="product_count" type="number" min="0" max="99" name="count"  required>個';
  // echo '<span class="bottom_align">個</span>';
  echo '<input class="cartin_btn" type="submit" value="カートに入れる "></p>';
  echo '</form>';
  echo '</div>';
  echo '</div><!-- /content -->';
  echo '</main>';
}

?>
</main>
<?php require 'includes/footer.php'; ?>