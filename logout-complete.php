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
  <link rel="stylesheet" href="common/css/logout.css">
  <title>Logout-complete | donuts-site</title>
</head>

<body>
  <main>

    <?php
    if (isset($_SESSION['customer'])) {
      unset($_SESSION['customer']);
      echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
      echo '<h1>ログアウト完了</h1>';
      echo '<div class="content">';
      echo '<div class="content_inner complete_content_inner textalign_center">';
      echo '<p class="message">ログアウトが完了しました</p>';
      echo '</div><!-- /content_inner -->';
      echo '<div class="textalign_right">';
      echo '<a href="#" class="memo">TOPページへ戻る</a>';
      echo '</div>';
      echo '</div><!-- /content -->';
    } else {
      echo 'すでにログアウトしています。';
    }
    ?>

  </main>
</body>

</html>