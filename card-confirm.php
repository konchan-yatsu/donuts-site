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
    //変数に受け取った値を代入する

    $name = htmlspecialchars($_REQUEST['card_name']);
    $type = htmlspecialchars($_REQUEST['card_type']);
    $cardno = (int)htmlspecialchars($_REQUEST['card_no']);
    $month = (int)htmlspecialchars($_REQUEST['card_month']);
    $year = (int)htmlspecialchars($_REQUEST['card_year']);
    $security = (int)htmlspecialchars($_REQUEST['card_security_code']);

    // 入力情報を出力する
    echo <<< END
<img src="common/images/logo_sp.png" alt="ロゴ">
<h1>ご入力内容の確認</h1>
<div class="content">
<p>お名前</p>
<p class="input_result">{$name}</p>
<p>カード会社</p>
<p class="input_result">{$type}</p>
END;

    echo '<p>カード番号</p>';
    echo '<p class="input_result">', $cardno, '</p>';

    //日付の判別
    echo '<p>有効期限</p>';
    echo '<span class="input_result">', $month, '/', $year, '</span>';

    echo '<p>セキュリティコード</p>';
    echo '<p class="input_result">', $security, '</p>';

    var_dump($cardno);
    echo '<br>';
    var_dump($month);
    echo '<br>';
    var_dump($year);
    echo '<br>';
    var_dump($security);
    echo '<br>';



    ?>

    <!-- echo <<< END
      <form action="card-input.php" method="post">
      <label>クレジットカード登録できません。やり直して下さい。</label>
            <input type="submit" value="戻る" >
      </form>
    END;
    echo <<<END
      <form action="card-complete.php" method="post">
      <input type="hidden" name="card_name" value="{$card_name}">
      <input type="hidden" name="card_type" value="{$card_type}">
      <input type="hidden" name="card_no" value="{$card_no}">
      <input type="hidden" name="card_month" value="{$card_month}">
      <input type="hidden" name="card_year" value="{$card_year}">
      <input type="hidden" name="card_security_code" value="{$card_security_code}">
      <input class="login_btn" type="submit" value="この内容で登録する">
      </form>
      </div>
      END; -->
  </main>
</body>

</html>
<?php require 'includes/footer.php'; ?>