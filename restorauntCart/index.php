<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ürün Listesi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">

</head>
<body>

<?php  require_once "lib/db.php";?>


<?php
/* veri çekme işlemleri */

$products=$db->query("select * from yemekler", PDO::FETCH_OBJ)->fetchAll();
?>

<?php include "lib/ustMenu.php";?>

<!--------------ana icerik --------->
<div class="container">
    <h2 class="text-center">Ürünler</h2>
<hr>
<div class="row">
    <?php  foreach ($products as $product ) { ?>
    <div class="col-sm-6 col-md-3" >
        <div class="thumbnail">
            <img class="resim-boyut" src="assets/images/<?php echo $product->yemekResim; ?>"   >
            <div class="caption">
                <h4><?php echo $product->yemekAdi; ?></h4>
                <p><?php echo $product->yemekAciklama; ?></p>
                <p class="text-right price-container"><strong><?php echo $product->yemekFiyat.' ₺'; ?></strong></p>
                <p>
                    <button product-id="<?php echo $product->yemekID; ?>" class="btn btn-primary btn-block addToCartBtn" role="button">
                        <span class="glyphicon glyphicon-shopping-cart"></span>Sepete Ekle
                    </button>
                </p>
            </div>
        </div>
    </div>
   <?php } ?>
</div>

<!--------------#ana icerik --------->

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>