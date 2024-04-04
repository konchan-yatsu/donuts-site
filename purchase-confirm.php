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
    <img src="common/images/logo_sp.png" alt="ロゴ">
    <h1>ご購入確認</h1>
    <div class="content">

      <?php
      if (!isset($_SESSION['customer'])) {
        echo '購入手続きを行うにはログインしてください。';
      } else 
          if (empty($_SESSION['product'])) {
        echo 'カートに商品がありません。';
      } else {
        echo '<h2>ご購入商品</h2>';
        echo '<hr>';
        // $\SESSION['product']の情報から引用する、CSS装飾も必要なため、要素設定も考える必要あり
        $total = 0;
        foreach ($_SESSION['product'] as $id => $product) {
          $subtotal = $product['count'] * $product['price'];
          echo <<<END
            <table>
<tr><td>商品名</td><td>{$product['name']}</td></tr>
<tr><td>数量</td><td>{$product['count']}</td></tr>
<tr><td>小計</td><td>{$subtotal}</td></tr>
</table>
END;
          $total += $product['count'] * $product['price'];
        }

        echo <<<END
<tr><td>合計</td><td>$total</td></tr>


END;
        echo '<hr>';



        echo '<h2>お届け先</h2>';
        echo '<hr>';
        // $\SESSION['customer']の情報から引用する、CSS装飾も必要なため、要素設定も考える必要あり
        echo <<<END
          <table>
        <tr><td>お名前</td><td>{$_SESSION['customer']['name']}<td></tr>
        <tr><td>住所</td><td>{$_SESSION['customer']['address']}<td></tr>
        </table>
   END;
        echo '<hr>';
      }
      ?>

      <!-- クレジットカード有無判定、empty(fetchallで判定　P284参照 -->
      <?php
      // ログインしていて、カートにデータがある場合にクレジットカードを判定する
      require 'includes/database.php';
      if (isset($_SESSION['customer']) && !empty($_SESSION['product'])) {
        // if (isset($_SESSION['customer'])) {


        $id = $_SESSION['customer']['id'];
        $sql = $pdo->prepare('select * from card where id=?');
        $sql->execute([$id]);

        if (empty($sql->fetchAll())) {
          echo <<<END
          <h2>お支払方法</h2>
          <p>お支払方法が登録されていません<br>
          クレジットカード情報を登録してください</p>

            <form action="card-input.php" method="post">
            <input class="login_btn" type="submit" value="カード情報を登録する">
            </form>

      END;
        } else {
          echo <<<END
          <h2>お支払方法</h2>
          <table>
          <tr><td>お支払い</td><td>クレジットカード</td></tr>
    END;
          $sql = $pdo->prepare('select * from card where id=?');
          $sql->execute([$id]);
          foreach ($sql as $row) {
            echo <<<END
                <tr><td>カード種類</td><td>{$row['card_type']}</td></tr>
                <tr><td>カード番号</td><td>{$row['card_no']}</td></tr>
                </table>
          END;
          }

          echo <<<END
            <form action="purchase-complete.php" method="post">
            <input class="login_btn" type="submit" value="ご購入を確定する">
            </form>
         END;
        }
      } else {
      }


      ?>
    </div>



  </main>
</body>

</html>

<?php require 'includes/footer.php'; ?>