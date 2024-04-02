<?php session_start(); ?>
<link rel="stylesheet" href="common/css/detail.css">
<title>Customer-input | donuts-site</title>

<?php require 'includes/header.php'; ?>
<?php require 'includes/database.php'; ?>
<?php
$sql = $pdo->prepare('SELECT * FROM product WHERE id=?');
// $sql->execute($_GET['id']);
$sql->execute('1');
echo $_GET['id'];

foreach ($sql as $row) {
  [
    'id' => $row['id'],
    'name' => $row['name'],
    'price' => $row['price'],
    'description' => $row['description'],
    'category' => $row['category']
  ];
}

echo '<p class="breadcrumb"> TOP>商品一覧＞CCドーナツ 当店オリジナル（5個入り）</p>';
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
echo '<img class="" src="common/images/goodslist_cont1_no1_pc.png" alt="">';
echo '</div>';
echo '<div class="group_right">';
echo '<p class="product_name">CCドーナツ 当店オリジナル（5個入り）</p>';
echo '<p class="product_info">当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。</p>';
echo '<p class="price">税込&emsp;|1,500&emsp;<img class="favorite_icon" src="common/images/heart.svg" alt=""></p>';
echo '<input class="product_count" input type="text" name="count">';
echo '<span class="bottom_align">個</span>';
echo '<input class="cartin_btn" type="submit" href="cart-input.php" value="カートに入れる">';
echo '</div>';
echo '</div><!-- /content -->';
echo '</main>';
?>














<?php require 'includes/footer.php'; ?>