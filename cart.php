
<!-- サーバーの登録商品データを読み取る -->

<?php

// データベースのカート内を確認
if(isset($_SESSION['product'])){

// 商品データがある場合

// 合計金額計算用の変数設定
$total=0;

// データベースのカート内情報を呼び出し
// productテーブル内の各商品データの変数$idを変数$productに変更(他のデータと重複しないため)
foreach ($_SESSION['product'] as $id => $product) {

    // 各商品データごとに　価格×個数を変数に保管
    $subtotal=$product['price']*$product['count'];
    
//合計金額
$total+=$subtotal;

echo <<< END
<div id="merchandise">
        <img src="common/images/goodslist_cont1_no1_sp.png" alt="商品画像">
    
        <p id="name">ＣＣドーナッツ{$product['name']}</p>
        <p id="price">税込　￥{$product['price']}</p>
        <p  id="count">個数　　 {$product['count']}個</p>
    
        <a href="cart-delete.php">削除する</a>
</div>
END;


}




echo <<< END


<div id="total">
        <ul>
            <li> ご注文合計：</li>
            <li>税込み</li>
            <li>{$total}</li>
        </ul>
    
        <input type="submit" value="ご購入確認へ進む">
</div>
   

    <input type="submit" value="買い物を続ける">

END;

}else{

    // 商品データがない場合
echo 'カートに商品がありません。';

}

?>
