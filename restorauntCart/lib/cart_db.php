<?php

include "db.php";
session_start();


function addToCart($product_item){

    if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];
        $products=$shoppingCart["products"];
    } else{
        $products=array();
    }


    // Adet kontrolü
    if(array_key_exists($product_item->yemekID,$products)){
        $products[$product_item->yemekID]->count++;
    }
    else{
        $products[$product_item->yemekID]=$product_item;
    }
    //Sepetin Hesaplanması..
    $total_price=0.0;
    $total_count=0;
    foreach ($products as $product){
        $product->total_price= $product->count * $product->yemekFiyat;
        $total_price= $total_price + $product->total_price;
        $total_count +=$product->count;
    }
    $summary["total_price"]=$total_price;
    $summary["total_count"]=$total_count;


    $_SESSION["shoppingCart"]["products"]=$products;
    $_SESSION["shoppingCart"]["summary"]=$summary;


    return $total_count;


}

function removeFromCart($product_id){
    if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];
        $products=$shoppingCart["products"];
        // Ürünü Listeden Çıkar
        if(array_key_exists($product_id, $products)){
            unset($products[$product_id]);

        }
        //Tekrardan sepeti Hesapla
        $total_price=0.0;
        $total_count=0;
        foreach ($products as $product){
            $product->total_price= $product->count * $product->yemekFiyat;
            $total_price= $total_price + $product->total_price;
            $total_count +=$product->count;
        }
        $summary["total_price"]=$total_price;
        $summary["total_count"]=$total_count;


        $_SESSION["shoppingCart"]["products"]=$products;
        $_SESSION["shoppingCart"]["summary"]=$summary;
        return true;

    }




}

function incCount($product_id){
    if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];
        $products=$shoppingCart["products"];
        // Adet kontrolü
        if(array_key_exists($product_id,$products)){
            $products[$product_id]->count++;
        }
        //Sepetin Hesaplanması..
        $total_price=0.0;
        $total_count=0;
        foreach ($products as $product){
            $product->total_price= $product->count * $product->yemekFiyat;
            $total_price= $total_price + $product->total_price;
            $total_count +=$product->count;
        }
        $summary["total_price"]=$total_price;
        $summary["total_count"]=$total_count;


        $_SESSION["shoppingCart"]["products"]=$products;
        $_SESSION["shoppingCart"]["summary"]=$summary;


        return true;

    }





}

function decCount($product_id){
    if(isset($_SESSION["shoppingCart"])){
        $shoppingCart=$_SESSION["shoppingCart"];
        $products=$shoppingCart["products"];
        // Adet kontrolü
        if(array_key_exists($product_id,$products)){
            if($product_id->count==0){
                removeFromCart($product_id);
            }
            $products[$product_id]->count--;

        }
        //Sepetin Hesaplanması..
        $total_price=0.0;
        $total_count=0;
        foreach ($products as $product){
            $product->total_price= $product->count * $product->yemekFiyat;
            $total_price= $total_price + $product->total_price;
            $total_count +=$product->count;
        }
        $summary["total_price"]=$total_price;
        $summary["total_count"]=$total_count;


        $_SESSION["shoppingCart"]["products"]=$products;
        $_SESSION["shoppingCart"]["summary"]=$summary;


        return true;

    }


}

if(isset($_POST["p"])){

    $islem=$_POST["p"];
    if($islem=="addToCart"){
        $id=$_POST["product_id"];
        $product=$db->query("select * from yemekler where yemekID={$id}", PDO::FETCH_OBJ)->fetch();
        $product->count=1;

        echo addToCart($product);
    }elseif ($islem=="removeFromCart"){
        $id =$_POST["product_id"];

      echo  removeFromCart($id);

    }

}


if(isset($_GET["p"])){

    $islem=$_GET["p"];
    if($islem=="incCount"){
        $id=$_GET["product_id"];
      if( incCount($id)){
            header("Location:../shopping-cart.php");
        }


    }elseif ($islem=="decCount"){
        $id =$_GET["product_id"];
        if( decCount($id)){
            header("Location:../shopping-cart.php");
        }

    }

}

