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
    if (preg_match('/^[0-9]{14}$|^[0-9]{16}$/', $cardno)) {
      echo '<p>正しいカード番号です</p>';
    } else {
      echo '<p>誤ったカード番号です</p>';
    }

    //日付の判別
    echo '<p>有効期限</p>';
    echo '<span class="input_result">', $month, '/', $year, '</span>';
    if (preg_match('/^[1-9]{1}$|^[1-9]{1}[0-2]{1}$/', $month) && preg_match('/^[0-9]{2}$/', $year)) {
      date_default_timezone_set('Asia/Tokyo');
      $currenttime = mktime(0, 0, 0, date('m'), 1, date('Y'));
      $inputdate = mktime(0, 0, 0, $month, 28, $year);
      $y = date('Y', $inputdate);
      $m = date('m', $inputdate);

      if (checkdate($m, 1, $y)) {
        if ($inputdate > $currenttime) {
          echo '正しい日付です';
        } else {
          echo '古い日付です';
        }
        echo $m, '/', $y;
      } else {
        echo $month, '月', $year, '年', 'は正しい日付ではありません';
      }
    } else {
      echo '2桁の正しい年月をご入力ください';
    }



    echo '<p>セキュリティコード</p>';
    echo '<p class="input_result">', $security, '</p>';
    if (preg_match('/^[0-9]{3}$/', $security)) {
      echo '正しいセキュリティコードです';
    } else {
      echo '正しくありません。';
    }


    if (preg_match('/^[0-9]{14}$|^[0-9]{16}$/', $cardno) && preg_match('/^[1-9]{1}$|^[1-9]{1}[0-2]{1}$/', $month) && preg_match('/^[0-9]{2}$/', $year) && preg_match('/^[0-9]{3}$/', $security) && checkdate($m, 1, $y) && $inputdate > $currenttime) {
      echo <<<END
      <form action="card-complete.php" method="post">
      <input type="hidden" name="card_name" value="{$name}">
      <input type="hidden" name="card_type" value="{$type}">
      <input type="hidden" name="card_no" value="{$cardno}">
      <input type="hidden" name="card_month" value="{$month}">
      <input type="hidden" name="card_year" value="{$year}">
      <input type="hidden" name="card_security_code" value="{$security}">
      <input class="login_btn" type="submit" value="この内容で登録する">
      </form>
      </div>
      END;
    } else {
      echo <<< END
  <form action="card-input.php" method="post">
  <label>クレジットカード登録できません。やり直して下さい。</label>
        <input type="submit" value="戻る" >
  </form>
END;
    }

    ?>
  </main>
</body>

</html>
<?php require 'includes/footer.php'; ?>