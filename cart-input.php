<?php require 'includes/header.php' ?>

<?php session_start(); ?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/cart.css">

    <title>Cart-Product list page</title>

</head>

<body>
    

<?php


$id=$_REQUEST['id'];


// セッションにproductがセットされているか判定
if(!isset($_SESSION['product'])){
// セットされていない場合

$_REQUEST['product']=[];

}

// 初期個数設定
$count=0;

// データベースとidが同じ商品がセッションのproductに入っているか確認
if(isset($_SESSION['product'][$id])){
// 同じidの商品が入っている場合

// セッションのproduct内　idとリンクする個数のデータを$countに登録
$count=$_SESSION['product'][$id]['count'];

}

// セッションのproductにカートにつかする情報を登録
$_SESSION['product'][$id]=['name'=>$_REQUEST['name'],'price'=>$_REQUEST['price'],'count'=>$count+$_REQUEST['count']];


echo '<p>カートに追加しました。</p>';

// echo '<p>',$_SESSION['product'][$id],'</p>';

echo '<main>';
require 'cart.php';
echo '<main>';
?>



</body>
</html>
<?php require 'includes/footer.php'; ?>

