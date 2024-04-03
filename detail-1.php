<?php session_start(); ?>
<link rel="stylesheet" href="common/css/detail.css">
<title>Customer-input | donuts-site</title>

<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>
<?php
// $id = $_REQUEST['id'];

$sql = $pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {
  echo '<p class="breadcrumb">&nbsp;TOP&nbsp;&gt;&nbsp;商品一覧&nbsp;&gt;&nbsp;', $row['name'], '</p>';
  echo '<hr>';
  echo '<main>';
  if (isset($_SESSION['customer'])) {
    // ログインしてる
    echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['name'], '様</p>';
    echo '<hr>';
  } else {
    // ログインしてない
    echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
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
  echo '<p class="price">税込&emsp;&yen;', number_format($row['price']), '&emsp;<button><img class="favorite_icon" src="common/images/heart.svg" alt="お気に入りボタン"></button></p>';
  echo '<form action="cart-input.php?id=" ', $row['id'], ' " method="post">';
  echo '<input class="product_count" type="number" min="0" max="99" name="count"  required>';
  echo '<span class="bottom_align">個</span>';
  echo '<input class="cartin_btn" type="submit" value="カートに入れる ">';
  echo '</form>';
  echo '</div>';
  echo '</div><!-- /content -->';
  echo '</main>';
}
?>
<?php require 'includes/footer.php'; ?>