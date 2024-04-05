<!-- サーバーの登録商品データを読み取る -->

<?php

// データベースのカート内を確認
if (!empty($_SESSION['product'])) {

    // 商品データがある場合

    // 合計金額計算用の変数設定
    $total = 0;

    // データベースのカート内情報を呼び出し
    // productテーブル内の各商品データの変数$idを変数$productに変更(他のデータと重複しないため)
    foreach ($_SESSION['product'] as $id => $product) {

        // 各商品データごとに　価格×個数を変数に保管
        $subtotal = $product['price'] * $product['count'];

        //合計金額
        $total += $subtotal;

        // var_dump($id);

        $id_number=intval($id);
        // var_dump($id_number);

        // $id_kana=mb_convert_kana($id_number,'A');

        echo <<< END
<div id="merchandise">
        <img src="common/images/{$id_number}_sp.png" alt="商品画像">
    
        <div id="detail">
            <p id="name">{$product['name']}</p>

            <div id="price">
                <p id="price">税込　￥{$product['price']}</p>
                <p  id="count">個数　　 {$product['count']}個</p>
            </div>
            <div id="delete">
                <a href="cart-delete.php?id={$id_number}">削除する</a>
            </div>
        </div>
</div>
END;

// var_dump($id);
// var_dump($id_number);
    }

    echo <<< END

<div id="total">
        <ul>
            <li> ご注文合計：</li>
            <li>税込み￥{$total}</li>
        </ul>
    
    
       <p> <a href="purchase-confirm.php">ご購入確認へ進む</a></p>
</div>
   
    <p id="continue"> <a  href="product.php">買い物を続ける</a></p>
END;
} else {

    // 商品データがない場合
    echo '<p class="id_name_no_cart">カートに商品がありません。</p>';
}
// var_dump($_SESSION['product']);

?>