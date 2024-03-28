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
  <link rel="stylesheet" href="common/css/login.css">
  <title>Login | donuts-site</title>
</head>

<body>
  <main>
    <p class="user_name">ようこそ&emsp;ゲスト様</p>
    <h1>ログイン</h1>
    <div class="content">
      <div class="content_inner">
        <form action="login-complete.php" method="post">
          <h2>メールアドレス</h2>
          <input class=""input type="mail" name="mail"><br>
          <h2>パスワード</h2>
          <input class=""input type="password" name="password"><br>
          <div class="textalign_center">
            <input class="login_btn" type="submit" value="ログインする">
          </div>
        </form>
      </div><!-- /content_inner -->
      <div class="textalign_right">
        <p class="memo">会員登録がお済みでない方はこちら</p>
      </div>
    </div><!-- /content -->

  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>