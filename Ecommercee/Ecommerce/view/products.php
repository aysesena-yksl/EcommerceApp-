<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width", initial-scale="5.0">
    <title>BASKET</title>
    

    <head>
        <body class="bg-light">
<div class="col p-3 text-left">
    <a href="Basket.php"><button type="submit" class="btn btn-danger ml-1 text-center"</a>
</div>

<h2 class="text center text danger shadow p-2"><i class="">ÜRÜNLER</i> </h2>

<?php
session_start();
?>

<div class="product_container">
<div class="coloumn">

<?php

foreach($products as $product){
    ?>
    <div class="col-sm-d p-3 text-center mb-4 shadow bg-light">
            <div class="card" style="color:#116062; width: 360px; height: 360px;">
                <div class="card-body">

    <form action="addBasket.php" method="post" class="product">
        <h4><?php echo $product->getName($product->getProductId());?></h4>
        <hr />
        <span><?php echo $product->getPrice(). ' '. $product->getCurrency(); ?></span>
        <button type="submit">Sepete Ekle</button>
    </form>




</div>

