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
  <title>Customer-confirm | donuts-site</title>
</head>

<body>
  <main>

    <?php
    $pdo = new PDO(
      'mysql:host=localhost;dbname=donuts;charset=utf8',
      'donuts',
      'password'
    );

    echo '<img src="common/images/logo_sp.png" alt="ロゴ">';
    echo '<h1>ご入力内容の確認</h1>';

    // もしセッションcustomerがセットされていたら
    if (isset($_SESSION['customer'])) {
      // true セットされている=ログイン中だったら
      echo 'セッションあり';
      $id = $_SESSION['customer']['id'];

      // 条件：メールアドレスとパスワードが一致するデータを取得するSQL
      $sql = $pdo->prepare('SELECT * FROM customer WHERE id!=? AND mail=? AND password=?');
      $sql->execute([$id, $_REQUEST['mail'], $_REQUEST['password']]);
    } else {
      // false セットされていない＝ログインしてない
      echo 'セッションなし';
      // 条件：メールアドレスが一致するデータを取得するSQL
      $sql = $pdo->prepare('SELECT * FROM customer WHERE mail=?');
      $sql->execute([$_REQUEST['mail']]);
    }

    // SQLの結果が空だったら、（ログインしてない時はメールアドレスが一致するデータがなかったら）
    if (empty($sql->fetchAll())) {
      // SQLの結果が空で⇒ログイン中だったら    
      if (isset($_SESSION['customer'])) {
        $sql = $pdo->prepare('UPDATE customer SET name=?, kana=?, post_code=?, address=?, mail=?, password=? WHERE id=?');
        $sql->execute([$_REQUEST['name'], $_REQUEST['kana'], $_REQUEST['post_code'], $_REQUEST['address'], $_REQUEST['mail'], $_REQUEST['password'], $id]);
        $_SESSION['customer'] = [
          'id' => $id,
          'name' => $_REQUEST['name'],
          'kana' => $_REQUEST['kana'],
          'post_code' => $_REQUEST['post_code'],
          'address' => $_REQUEST['address'],
          'mail' => $_REQUEST['mail'],
          'password' => $_REQUEST['password']
        ];
        echo '<div class="content">';
        echo '<form action="customer-complete.php" method="post">';
        echo '<h2>お名前</h2>';
        echo '<p class="input_result">', $_REQUEST['name'], '</p>';
        echo '<h2>お名前(フリガナ)</h2>';
        echo '<p class="input_result">', $_REQUEST['kana'], '</p>';

        echo '<h2>郵便番号</h2>';
        $postcode = $_REQUEST['post_code'];
        if (!preg_match('/^[0-9]{7}$/', $postcode)) {
          echo '郵便番号ダメ';
        }
        echo '<p class="input_result">', $_REQUEST['post_code'], '</p>';
        echo '<h2>住所</h2>';
        echo '<p class="input_result">', $_REQUEST['address'], '</p>';
        echo '<h2>メールアドレス</h2>';
        echo '<p class="input_result">', $_REQUEST['mail'], '</p>';
        echo '<h2>パスワード</h2>';
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/', $_REQUEST['password'])) {
          echo '<p class="input_result">', $_REQUEST['password'], '</p>';
        } else {
          echo 'パスワードが適切ではありません。';
        }

        echo '<div class="textalign_center">';
        echo '<div class="textalign_center">';
        echo '<input class="login_btn" type="submit" value="こちらの内容で更新する">';
        echo '</div>';
        echo '<input type="hidden" name="name" value="', $_REQUEST['name'], '"</p>';
        echo '<input type="hidden" name="kana" value="', $_REQUEST['kana'], '"</p>';
        echo '<input type="hidden" name="post_code" value="', $_REQUEST['post_code'], '"</p>';
        echo '<input type="hidden" name="address" value="', $_REQUEST['address'], '"</p>';
        echo '<input type="hidden" name="mail" value="', $_REQUEST['mail'], '"</p>';
        echo '<input type="hidden" name="password" value="', $_REQUEST['password'], '"</p>';
        echo '</form>';
        echo '</div><!-- /content -->';
      } else {
        echo '<div class="content">';
        echo '<form action="customer-complete.php" method="post">';
        echo '<h2>お名前</h2>';
        echo '<p class="input_result">', $_REQUEST['name'], '</p>';
        echo '<h2>お名前(フリガナ)</h2>';
        echo '<p class="input_result">', $_REQUEST['kana'], '</p>';

        echo '<h2>郵便番号</h2>';
        // $postcode=$_REQUEST['post_code'];
        // if (!preg_match('/^[0-9]{7}$/', $postcode)) {
        //   echo '郵便番号ダメ';
        // }
        echo '<p class="input_result">', $_REQUEST['post_code'], '</p>';

        echo '<h2>住所</h2>';
        echo '<p class="input_result">', $_REQUEST['address'], '</p>';
        echo '<h2>メールアドレス</h2>';
        echo '<p class="input_result">', $_REQUEST['mail'], '</p>';
        echo '<h2>パスワード</h2>';
        echo '<p class="input_result">', $_REQUEST['password'], '</p>';
        echo '<div class="textalign_center">';
        echo '<input class="login_btn" type="submit" value="こちらの内容で登録する">';
        echo '</div>';
        echo '<input type="hidden" name="name" value="', $_REQUEST['name'], '"</p>';
        echo '<input type="hidden" name="kana" value="', $_REQUEST['kana'], '"</p>';
        echo '<input type="hidden" name="post_code" value="', $_REQUEST['post_code'], '"</p>';
        echo '<input type="hidden" name="address" value="', $_REQUEST['address'], '"</p>';
        echo '<input type="hidden" name="mail" value="', $_REQUEST['mail'], '"</p>';
        echo '<input type="hidden" name="password" value="', $_REQUEST['password'], '"</p>';
        echo '</form>';
        echo '</div><!-- /content -->';
      }

      // メールアドレス被りなし：新規登録用ここから
      $sql = $pdo->prepare('SELECT * FROM customer WHERE id!=? and name!=? and kana!=? and post_code!=? and address!=? and mail!=? and password!=?');
      $sql->execute([$id, $_REQUEST['name'], $_REQUEST['kana'], $_REQUEST['post_code'], $_REQUEST['address'], $_REQUEST['mail'], $_REQUEST['password']]);
      echo '<div class="content">';
      echo '<form action="customer-complete.php" method="post">';
      // 1.お名前
      echo '<h2>お名前</h2>';
      if (empty($_REQUEST['name'])) {
        echo '<p class="input_result error">正しく入力してください。</p>';
      } else {
        echo '<p class="input_result">', $_REQUEST['name'], '</p>';
      }
      // 2.お名前(フリガナ)
      if (isset($_REQUEST['kana'])) {
        echo '<h2>お名前(フリガナ)</h2>';
        echo '<p class="input_result error">正しく入力してください。</p>';
      } else {
        echo '<p class="input_result">', $_REQUEST['kana'], '</p>';
      }

      echo '<h2>郵便番号</h2>';
      echo '<p class="input_result">', $_REQUEST['post_code'], '</p>';
      echo '<h2>住所</h2>';
      echo '<p class="input_result">', $_REQUEST['address'], '</p>';
      echo '<h2>メールアドレス</h2>';
      echo '<p class="input_result">', $_REQUEST['mail'], '</p>';
      echo '<h2>パスワード</h2>';
      echo '<p class="input_result">', $_REQUEST['password'], '</p>';
      echo '<div class="textalign_center">';
      echo '<input class="login_btn" type="submit" value="こちらの内容で登録する">';
      echo '</div>';
      echo '<input type="hidden" name="name" value="', $_REQUEST['name'], '"</p>';
      echo '<input type="hidden" name="kana" value="', $_REQUEST['kana'], '"</p>';
      echo '<input type="hidden" name="post_code" value="', $_REQUEST['post_code'], '"</p>';
      echo '<input type="hidden" name="address" value="', $_REQUEST['address'], '"</p>';
      echo '<input type="hidden" name="mail" value="', $_REQUEST['mail'], '"</p>';
      echo '<input type="hidden" name="password" value="', $_REQUEST['password'], '"</p>';
      echo '</form>';
      echo '</div><!-- /content -->';
      // メールアドレス被りなし：新規登録用ここまで

    } else {
      echo '<div class="content_inner">';
      echo '<p class="message">このメールアドレスは既に使用されていますので、変更してください。</p>';
      echo '</div>';
    }

    if (isset($_REQUEST['kana'])) {
      echo '<p class="input_result error">空：正しく入力してください。</p>';
    } else {
      echo '<p class="input_result">空じゃない', $_REQUEST['name'], '</p>';
    }



    ?>

  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>