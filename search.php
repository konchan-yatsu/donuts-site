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
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/product.css">
  
    <title>Search page</title>
<body>

<main>
<div class="flex_content">

<?php

require 'includes/database.php';

$sql=$pdo->prepare('select * from product where name like ?');

$sql->execute(['%'.$_REQUEST['keyword'].'%']);


foreach($sql as $row){

echo <<<END

    <div class="flex_item">

        <p>
            <a href="detail-1.php?id={$row['id']}"><img src="common/images/{$row['id']}_sp.png" alt="商品画像"></a>
        </p>

        <p class="flex_name">
            <a href="detail-1.php?id={$row['id']}">{$row['name']}</a>
        </p>

        <div class="inner_flex">
            <p>
                <a href="detail-1.php?id={$row['id']}">税込&nbsp;￥{$row['price']}</a>
            </p>

            <p class="inner_heart">
                <img src="common/images/heart.svg" alt="heart">
            </p>
        </div>

        <form action="cart-input.php" method="post" class="btn_cart" >
            <input type="hidden" name="id" value ="{$row['id']}">
            <input type="hidden" name="count" value=1>
            <input type="submit" value="カートに入れる">
        </form>
    </div>
END;

}

?>
</div>
</main>
    
</body>
</html>

<?php require 'includes/footer.php'; ?>
