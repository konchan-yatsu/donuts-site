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
  <link rel="stylesheet" href="common/css/common.css">

  <!-- <title>header確認</title> -->

</head>



<body>

  <header>


    <div class="header_content1">
      <div id="header_top">

        <a class="logo" href="index.php"><img src="common/images/logo_sp.png" alt="ハンバーガーストア-ロゴ"></a>

        <div id=header_max>
          <nav>

            <!-- メニューボタン -->
            <div class="nav">
              <div class="nav_icon_bg">
              </div>
              <input type="checkbox" class="menu_botan" id="menu_botan">
              <label for="menu_botan" class="menu_icon">

                <span class="nav_icon"></span>
              </label>

              <ul class="nav_menu">

                <li><img src="common/images/logo_sp.png" alt="C.C.Donuts画像"></li>

                <!-- メニュー一覧 -->

                <li><a href="index.php">top</a></li>


                <li><a href="product.php">商品一覧</a></li>


                <li><a href="#">よくある質問</a></li>


                <li><a href="#">問い合わせ</a></li>


                <li><a href="#">当サイトのポリシー</a></li>


              </ul>
            </div>

          </nav>
        </div>


        <!-- <ul> -->
        <!-- <li><a class="login" href="../index.html"><img src="common/images/icon_login_sp.svg" alt="ログインアイコン"></a></li> -->
        <!-- <li><a class="cart" href="../index.html"><img src="common/images/icon_cart_sp.svg" alt="カートアイコン"></a></li> -->
        <!-- </ul> -->


        <?php
        if (isset($_SESSION['customer'])) {
          // ログインしてる
          echo '<a class="login" href="login-inout.php"><img src="common/images/icon_logout_sp.svg" alt="ログインアイコン"></a>';
        } else {
          // ログインしてない
          echo '<a class="login" href="login-input.php"><img src="common/images/icon_login_sp.svg" alt="ログインアイコン"></a>';
        }
        ?>

        <a class="cart" href="cart-show.php"><img src="common/images/icon_cart_sp.svg" alt="カートアイコン"></a>

      </div>
    </div><!--header_content1  -->
    
    <div class="header_content2">
      <div id="header_search">


        <ul>
          <li>
            <button type="submit"><img src="common/images/icon_search_sp.svg" alt="🔍"></button>
          </li>
          <li id=text>
            <input type="text">
          </li>

        </ul>

      </div>


    </div><!--header_content2  -->


  </header>

</body>

</html>