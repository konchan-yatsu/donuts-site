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
  <title>Logout | donuts-site</title>
</head>

<body>
  <main>
    <p class="user_name">ようこそ&emsp;〇〇様</p>
    <h1>ログアウト</h1>
    <div class="content">
      <div class="content_inner">
        <div class="textalign_center">
          <p class="message">ログアウトしますか？</p>
        </div>
        <form action="logout-complete.php" method="post">
          <div class="textalign_center">
            <input class="login_btn" type="submit" value="ログアウトする">
          </div>
        </form>
      </div><!-- /content_inner -->
    </div><!-- /content -->

  </main>
</body>

</html>