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
  <title>Card-complete | donuts-site</title>
</head>

<body>
  <main>
    <p class="img_logo">
      <img src="common/images/logo_sp.png" alt="ロゴ">
    </p>
    <h1>カード情報登録完了</h1>
    <div class="content">
      <div class="content_inner complete_content_inner textalign_center">
        <p class="message">クレジットカード情報を登録しました。</p>
        <div class="textalign_center">
          <a class="memo" href="">購入手続きを続ける</a>
        </div>
      </div><!-- /content_inner -->
    </div><!-- /content -->
    <?php

    // ログインの確認
    if (isset($_SESSION['cusutomer'])) {
      require 'includes/database.php';
      $sql = $pdo->prepare('insert into card values(?,?,?,?,?,?,?)');
      $sql->execute([$_SESSION['customer']['id'], $_REQUEST['card_name'], $_REQUEST['card_type'], $_REQUEST['card_no'], $_REQUEST['card_month'], $_REQUEST['card_year'], $_REQUEST['card_security_code']]);
      echo '追加成功しました。';
    }
    echo <<< END
    {$_SESSION['customer']['id']},{$_REQUEST['card_name']},{$_REQUEST['card_type']}, {$_REQUEST['card_no']},{$_REQUEST['card_month']},{$_REQUEST['card_year']},{$_REQUEST['card_security_code']}
END;
    ?>

  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>