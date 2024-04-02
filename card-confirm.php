<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/card.css">
  <title>Card-confirm | donuts-site</title>
</head>

<body>
  <main>

    <?php session_start();?>
    <?php require 'includes/header.php'; ?>
    
    <?php
    // echo '<img src="common/images/logo_sp.png" alt="ロゴ">';
    // echo '<h1>ご入力内容の確認</h1>';
    // echo '<div class="content">';
    // echo '<h2>お名前</h2>';
    // echo '<p class="input_result"> テスト$_SESSION</p>';
    // echo '<h2>カード会社</h2>';
    // echo '<p class="input_result">  テスト$_SESSION</p>';
    // echo '<h2>カード番号</h2>';
    // echo '<p class="input_result">  テスト$_SESSION</p>';
    // echo '<h2>有効期限</h2>';
    // echo '<p class="input_result">  テスト$_SESSION</p>';
    // echo '<h2>セキュリティコード</h2>';
    // echo '<p class="input_result">  テスト$_SESSION</p>';
    // echo '<div class="textalign_center">';
    // echo '<input class="login_btn" type="submit" value="ご入力内容を確認する">';
    // echo '</div>';
    // echo '</div><!-- /content -->';


// ログインの確認
if(isset($_SESSION['cusutomer'])){
  $pdo=new PDO(
    'mysql:host=localhost;dbname=shop;charest=utf8',
    'staff',
    'password'
  );
  $sql=$pdo->prepare('insert into card valuse(?,?,?,?,?,?,?)');

  $sql->execute([$_SESSION['id'],$_REQUEST['card_name'],$_REQUEST['card_type'],$_REQUEST['']]);
}




    ?> 

  </main>
</body>

</html>
<?php require 'includes/footer.php'; ?>