<?php session_start();?>

<!DOCTYPE html>
<html lang="ja">

<?php
UNSET($_SESSION['customer']);
$pdo = new PDO(
  'mysql:host=localhost;dbname=donuts;charset=utf8',
  'donuts',
  'password'
);
$sql=$pdo->prepare('SELECT * FROM customer WHERE mail=? and password=?');
$sql->execute([$_REQUEST['mail'],$_REQUEST['password']]);
foreach($sql as $row){
  $_SESSION['customer']=[
  'id'=>$row['id'],
  'name'=>$row['name'],
  'kana'=>$row['kana'],
  'post_code'=>$row['post_code'],
  'address'=>$row['address'],
  'mail'=>$row['mail'],
  'password'=>$row['password']
  ];
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="stylesheet" href="common/css/login.css">
  <title>Login completed | donuts-site</title>
</head>

<body>
  <main>
    <?php
    echo '<p class="user_name">ようこそ&emsp;',$_SESSION['customer']['name'],'様</p>';
    ?>
    <h1>ログイン完了</h1>
    <div class="content">
      <div class="content_inner complete_content_inner textalign_center">
        <p class="message">ログインが完了しました</p>
      </div><!-- /content_inner -->
      <div class="textalign_right">
        <a href="#" class="memo">TOPページへ戻る</a>
      </div>
    </div><!-- /content -->
  </main>
</body>

</html>