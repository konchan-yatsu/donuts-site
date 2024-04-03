<?php session_start(); ?>
<link rel="stylesheet" href="common/css/detail.css">
<title>Customer-input | donuts-site</title>

<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>
<?php
$id = $_GET['id'];

$sql = $pdo->prepare('SELECT * FROM product WHERE id=:id');
$sql->execute(['id' => $id]);
$row = $sql->fetch();
$_SESSION['product'] = $row;

$name = $_SESSION['product']['name'];
$price = $_SESSION['product']['price'];
$description = $_SESSION['product']['description'];
$category = $_SESSION['product']['category'];
if ($category == 2) {
  $id = $id - 6;
}

echo '<p class="breadcrumb">&nbsp;TOP&nbsp;&gt;&nbsp;商品一覧&nbsp;&gt;&nbsp;', $name, '</p>';
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
echo '<img class="sp_only" src="common/images/goodslist_cont', $category, '_no', $id, '_sp.png" alt="', $name, 'の写真">';
echo '<img class="pc_only" src="common/images/goodslist_cont', $category, '_no', $id, '_sp.png" alt="', $name, 'の写真">';
echo '</div>';
echo '<div class="group_right">';
echo '<p class="product_name">', $name, '</p>';
echo '<p class="product_info">', $description, '</p>';
echo '<p class="price">税込&emsp;&yen;', number_format($price), '&emsp;<button><img class="favorite_icon" src="common/images/heart.svg" alt="お気に入りボタン"></button></p>';
echo '<form action="cart-input.php" method="post">';
echo '<input class="product_count" type="number" min="0" max="99" name="count"  required>';
echo '<span class="bottom_align">個</span>';
echo '<input class="cartin_btn" type="submit" value="カートに入れる ">';
echo '</form>';
echo '</div>';
echo '</div><!-- /content -->';
echo '</main>';



echo '越川確認用';
echo $_SESSION['product'];
echo $_SESSION['product']['name'];

?>

<?php require 'includes/footer.php'; ?>