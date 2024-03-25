<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログインページ | </title>
  <style>
    body {
      color: #7F5539;
    }

    form {
      border: 1px solid #E8C2CA;
      width: 295px;
      padding: 20px 12px;
    }

    h1 {
      font-size: 20px;
      margin-top: 32px;
      margin-bottom: 60px;
    }

    h2 {
      font-size: 12px;
    }

    input {
      height: 20px;
    }

    .loginBtn {
      font-size: 16px;
      height: 48px;
      color: #ffffff;
      background-color: #7F5539;
    }

    .non-member {
      display: inline-block;
      border-bottom: 1px solid #7F5539;
    }
  </style>
</head>

<body>

  <p>ようこそ ゲスト様</p>
  <h1>ログイン</h1>
  <form action="" method="post" class="loginflame">
    <h2>メールアドレス<input type="text" name=""><br></h2>
    <h2>パスワード<input type="text" name=""><br></h2>
    <input class="loginBtn" type="submit" value="ログインする">
  </form>
  <p class="non-member">会員登録がお済みでない方はこちら</p>

</body>

</html>