<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sepet</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>


<?php include "lib/ustMenu.php";?>


<!--------Anaicerik------->
<div class="container">
<?php
if($total_count>0){?>
    <h2 class="text-center">Sepetinizde <strong class="color-danger"><?php echo $total_count?></strong> Adet Ürün Var </h2>

    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <th class="text-center">Ürün Resmi </th>
                <th class="text-center">Ürün Adı </th>
                <th class="text-center">Fiyatı </th>
                <th class="text-center">Adedi </th>
                <th class="text-center">Toplam </th>
                <th class="text-center">Sepetten Çıkar </th>
                </thead>

                <tbody>
                <?php   foreach ($shopping_products as $product){ ?>
                    <tr>
                        <td class="text-center" width="120">
                            <img src="assets/images/<?php echo $product->yemekResim; ?>" width="50">
                        </td>
                        <td class="text-center"><?php echo $product->yemekAdi; ?></td>
                        <td class="text-center"><strong><?php echo $product->yemekFiyat; ?> ₺</strong></td>
                        <td class="text-center">

                            <a href="lib/cart_db.php?p=incCount&product_id=<?php echo $product->yemekID; ?>" class="btn btn-xs btn-success">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>

                            <input type="text" class="item-count-input" value="<?php echo $product->count; ?>">

                            <a href="lib/cart_db.php?p=decCount&product_id=<?php echo $product->yemekID; ?>" class="btn btn-xs btn-danger">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>

                        </td>
                        <td class="text-center"><?php echo $product->total_price; ?> ₺</td>
                        <td class="text-center">
                            <button product-id="<?php echo $product->yemekID;?>" class="btn btn-danger btn-sm removeFromCartBtn" width="120">
                                <span class="glyphicon glyphicon-remove"></span> Sepetten Çıkar
                            </button>

                        </td>
                    </tr>

                <?php } ?>
                </tbody>
                <tfoot>
                <th colspan="6" class="text-center">
                    <a href="index.php"> <button class="btn btn-success btn-lg" >
                        <span class="glyphicon glyphicon-save"></span> Siparişi Tamamla
                    </button></a>
                </th>

                </tfoot>                <tfoot>
                <th colspan="2" class="text-right">
                    Toplam Ürün: <span class="color-danger"><?php echo $total_count?> Adet</span>
                </th>

                <th colspan="4" class="text-right">
                    Toplam Tutar: <strong class="color-danger"><?php echo $total_price?> ₺</strong>
                </th>



                </tfoot>

            </table>
        </div>
    </div>
    <?php } else { ?>

    <div class="alert alert-info">
        <strong>Sepetiniz Boş! Eklemek için<a href="index.php">Tıklayın</a> </strong>
    </div>
    <?php }?>


</div>

<!--------#Anaicerik------->


<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>