<?php require 'includes/header.php'; ?>


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

    <title>Cart-Delete page</title>

</head>

<!-- カートの商品の削除ボタンを押した際に削除される仕組み -->

<html>
<body>
<?php session_start();?>

<?php

// 指定idの勝因をカートから削除
unset($_SESSION['product'][$_REQUEST['id']]);

echo'<main>';
echo '<p id="input_delete">カートから商品を削除しました。</p>';


require 'cart.php';
echo'</main>';

?>

</body>
</html>


<?php require 'includes/footer.php'; ?>