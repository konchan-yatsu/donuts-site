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
  <link rel="stylesheet" href="common/css/card.css">
  <title>Card-confirm | donuts-site</title>
</head>

<body>
  <main>

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
    // p要素に定数を代入
    // const pragraph_start='<p>';
    // const pragraph_end='</p>';
    // const span_start='<span>';
    // const spam_end='</span>';

    //変数に受け取った値を代入する
    $card_name = $_REQUEST['card_name'];
    $card_type = $_REQUEST['card_type'];
    $card_no = $_REQUEST['card_no'];
    $card_month = (int)$_REQUEST['card_month'];
    $card_year = (int) $_REQUEST['card_year'];
    $card_security_code = (int)$_REQUEST['card_security_code'];

    //要素の出力をする

    // 入力情報を出力する
    echo <<<END
<img src="common/images/logo_sp.png" alt="ロゴ">
<h1>ご入力内容の確認</h1>
<div class="content">
<p>お名前</p>
<p class="input_result">{$card_name}</p>
<p>カード会社</p>
<p class="input_result">{$card_type}</p>
<p>カード番号</p>
<p class="input_result">{$card_no}</p>
<p>有効期限</p>
<span class="input_result">{$card_month}/{$card_year}</span>
<p>セキュリティコード</p>
<p class="input_result">{$card_security_code}</p>

<form action="card-complete.php" method="post">
<input type="hidden" name="card_name" value="$card_name">
<input type="hidden" name="card_type" value="$card_type">
<input type="hidden" name="card_no" value="$card_no">
<input type="hidden" name="card_month" value="$card_month">
<input type="hidden" name="card_year" value="$card_year">
<input type="hidden" name="card_security_code" value="$card_security_code">
<input class="login_btn" type="submit" value="この内容で登録する">
</form>
</div>
END;

    ?>


  </main>
</body>

</html>
<?php require 'includes/footer.php'; ?>