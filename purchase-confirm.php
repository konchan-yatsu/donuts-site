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
  <link rel="stylesheet" href="common/css/purchase.css">
  <title>Purchase-confirm | donuts-site</title>
</head>

<body>
  <main>
    <!-- <img src="common/images/logo_sp.png" alt="ロゴ">
    <h1>ご購入確認</h1>
    <div class="content">
      <div class="content_inner">
        <form action="" method="post">
          <h2>ご購入商品</h2>
          <p>商品名</p>
          <p>数量</p>
          <p>小計</p>
          <p>合計</p>

          <h2>お届け先</h2>
          <p>お名前</p>
          <p>住所</p>

          <h2>お支払方法</h2>
          <p>お支払方法</p>
          <p>カード種類</p>
          <p>カード番号</p>
          <p>お支払い方法が登録されていません。 クレジットカード情報を登録してください。</p>
          <div class="textalign_center">
            <input class="login_btn" type="submit" value="ご購入を確定する">
            <input class="login_btn" type="submit" value="カード情報を登録する">
          </div>
        </form>
      </div><!-- /content_inner -->
    <!-- <div class="textalign_right">
        <a href="#" class="memo">会員登録がお済みでない方はこちら</a>
      </div>
    </div>/content  -->
    <img src="common/images/logo_sp.png" alt="ロゴ">
    <h1>ご購入確認</h1>
    <div class="content">
      <div class="content_inner">
        <?php
        if (!isset($_SESSION['customer'])) {
          echo '購入手続きを行うにはログインしてください。';
        } else 
          if (empty($_SESSION['product'])) {
          echo 'カートに商品がありません。';
        } else {
          echo '<h2>ご購入商品</h2>';
          echo '<hr>';
          require 'cart.php';
          echo '<hr>';
        }
        ?>
      </div>

      <!-- クレジットカード有無判定、empty(fetchallで判定　P284参照 -->
      <?php
      // 仕掛中
      require 'includes/database.php';

      echo '<div class="textalign_center">';
      echo '<input class="login_btn" type="submit" value="ご購入を確定する">';

      echo '<input class="login_btn" type="submit" value="カード情報を登録する">';
      echo '</div>';
      echo '</form>';

      ?>

    </div>



  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>