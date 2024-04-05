<?php require 'includes/header.php'; ?>

<link rel="stylesheet" href="common/css/login.css">
<title>Login | donuts-site</title>
<main>

  <?php
  if (isset($_SESSION['customer'])) {
    echo '<p class="user_name">ようこそ&emsp;', $_SESSION['customer']['name'], '様</p>';
    echo '<hr>';
    echo '<div class="content">';
    echo '<h1>ログイン中</h1>';
    echo '<div class="content_inner complete_content_inner textalign_center">';
    echo '<p class="message">すでにログインしています。</p>';
    // echo '<div class="textalign_center">';
    echo '<a class="flamein_memo textalign_center" href="logout-input.php">ログアウト画面へ進む</a>';
    // echo '</div>';
    echo '</div><!-- /content_inner -->';
    echo '<div class="textalign_right">';
    echo '<a href="index.php" class="memo">TOPページへ戻る</a>';
    echo '</div>';
    echo '</div><!-- /content -->';
  } else {
    echo '<p class="user_name">ようこそ&emsp;ゲスト様</p>';
    echo '<hr>';
    echo '<div class="content">';
    echo '<h1>ログイン</h1>';
    echo '<div class="content_inner">';
    echo '<form action="login-complete.php" method="post">';
    echo '<h2>メールアドレス</h2>';
    echo '<input class="" input type="mail" name="mail"><br>';
    echo '<h2>パスワード</h2>';
    echo '<input class="" input type="password" name="password"><br>';
    echo '<div class="textalign_center">';
    echo '<input class="login_btn" type="submit" value="ログインする">';
    echo '</div>';
    echo '</form>';
    echo '</div><!-- /content_inner -->';
    echo '<div class="textalign_right">';
    echo '<a href="customer-input.php">';
    echo '<p class="memo">会員登録がお済みでない方はこちら</p>';
    echo '</a>';
    echo '</div>';
    echo '</div><!-- /content -->';
  }
  ?>

</main>


<?php require 'includes/footer.php'; ?>