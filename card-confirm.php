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
    echo <<< END
<img src="common/images/logo_sp.png" alt="ロゴ">
<h1>ご入力内容の確認</h1>
<div class="content">
<p>お名前</p>
<p class="input_result">{$card_name}</p>
<p>カード会社</p>
<p class="input_result">{$card_type}</p>
END;

    echo '<p>カード番号</p>';
    echo '<p class="input_result">', $card_no, '</p>';

    if (preg_match('/^[0-9]{14,16}$/', $card_no)) {
      echo 'カード番号を確認しました。';
    } else {
      echo '適切なカード番号ではありません。';
    }

    //日付の判別
    echo '<p>有効期限</p>';
    echo '<span class="input_result">', $card_month, '/', $card_year, '</span>';

    if (preg_match('/^[0-9]{2}$/', $card_month)) {
      $month = $card_month;
      $year = $card_year;
      if (checkdate($card_month, 1, $card_year) === true) {
        echo '正しい日付です';
        // echo '登録可能';
        $past = mktime(0, 0, 0, $month, 1, $year);
        $today = mktime(0, 0, 0, date('m'), 1, date('Y'));
        if ($past < $today) {
          echo '過去の日付を使用しています';
        }
        $future = mktime(0, 0, 0, date('m'), 1, date('Y') + 10);
        if ($past >  $future) {
          echo '有効期限外です';
        }else{

        }
      }else{
        
      }
    }echo'登録可能です';

    // var_dump($card_month, $card_year);z
    // && preg_match('/^[0-9]{2}$/', $card_year)
    echo '<p>セキュリティコード</p>';
    echo '<p class="input_result">', $card_security_code, '</p>';
    if (preg_match('/^[0-9]{3,4}$/', $card_security_code)) {
      echo '正しいセキュリティコードです';
    } else {
      echo '誤ったセキュリティコードです';
    }
    // var_dump($card_security_code);


    //出力時の登録可能・不可能時での動作ーーーーーーー↓ーーーーー

    $pattern = '/^[0-9]{14,16}|[0-9]{2}|[0-9]{2}|[0-9]{3,4}$/';
    // $input = [$card_no, $card_month, $card_year, $card_year];



    if (preg_match('/[0-9]{14,16}/', $card_no)) {
      // echo 'AAAAAAAAAAAAAAAAAAAAAAAA';
      if (preg_match('/[0-9]{2}/', $card_month)) {
        // echo 'BBBBBBBBBBBBBBBBBBBBBBBBB';

        if (preg_match('/[0-9]{2}/', $card_year)) {
          // echo 'CCCCCCCCCCCCCCCCCCCCCC';
          if (preg_match('/[0-9]{3,4}/', $card_security_code)) {
            echo '正解だよおおおおおおおおおお';
          } else {
            echo '戻れええええええええええええ';
            //   echo <<< END
            //   <form action="card-input.php" method="post">
            //   <label>クレジットカード登録できません。やり直して下さい。</label>
            //         <input type="submit" value="戻る" >
            //   </form>
            // END;
          }
        } else {
          echo '年が間違っています';
        }
      } else {
        echo '月が間違っています';
      }
    } else {
      echo 'カード番号が間違っています';
    }
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