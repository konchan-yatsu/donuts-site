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
  <link rel="stylesheet" href="common/css/customer.css">
  <title>Customer-input | donuts-site</title>
</head>
<?php
$name = $kana = $post_code = $address = $mail = $password = '';
if (isset($_SESSION['customer'])) {
  $name = $_SESSION['customer']['name'];
  $kana = $_SESSION['customer']['kana'];
  $post_code = $_SESSION['customer']['post_code'];
  $address = $_SESSION['customer']['address'];
  $mail = $_SESSION['customer']['mail'];
  $password = $_SESSION['customer']['password'];
}
?>

<body>
  <main>
    <img src="common/images/logo_sp.png" alt="ロゴ">
    <h1>会員登録</h1>
    <div class="content">
      <?php
      // フォームの出力
      echo <<<END
<form action="customer-confirm.php" method="post">
<h2>お名前<span class="must">（必須）</span></h2>
<input type="text" name="name" value="{$name}" required><br>
<h2>お名前(フリガナ)<span class="must">（必須）</span></h2>
<input type="text" name="kana" value="{$kana}" required><br>
<h2>郵便番号<span class="must">（必須）</span></h2>
<input type="text" name="post_code"  value="{$post_code}" required><br>
<h2>住所<span class="must">（必須）</span></h2>
<input type="text" name="address"  value="{$address}" required><br>
<h2>メールアドレス<span class="must">（必須）</span></h2>
<input type="mail" name="mail"  value="{$mail}" required><br>
<h2>パスワード<span class="must" required>（必須）</span></h2>
<p class="caution">A-Z、a-z、0-9を少なくとも各1つは含めて8文字以上で入力してください。</p>
<input type="password" name="password"  value="{$password}" required><br>
<div class="textalign_center">
<input class="login_btn" type="submit" value="ご入力内容を確認する">
</div>
</form>
END;
      ?>

    </div><!-- /content -->
  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>