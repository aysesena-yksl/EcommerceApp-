<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>ECOMMERCE</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkF
    <link rel="stylesheet" href="css/style.css />
</head>
<body>  

<?php

spl_autoload_register(function ($className) {

    $exploded = explode('\\',$className);

    $namespace = $exploded[0];
    if (count($exploded) === 1){
        $class = $exploded[0];
    } else {
        $class = $exploded[1];
    }

    if ($namespace === 'App'){
        include $class.'.php';
    } elseif ($namespace === 'Product' ){
        include 'Product' . DIRECTORY_SEPARATOR .$class.'.php';
    } elseif ($namespace=== 'Payment' ){
        include 'Payment' . DIRECTORY_SEPARATOR . $class.'.php';
    } else {
        include $class . '.php';
    }
});

$conf = new Dbconfig();
$deger = $conf->getDbConfig();
if($deger ==='Dosya var'){

}else if($deger ==='dosya oluştur'){
    echo'dosya oluştur';
    return false;
}

$app = new App\EcommerceApp();

$rawProducts = $app->product->getProductList();

$products = [];

foreach($rawProducts as $product){
    $product = (object)$product;
    switch($product->category){
        case 'cellphone':
            $products[] = new \Product\CellPhone($product);
            break;
        case 'animalFood':
            if ($product->subCategory==='dog'){
                $products[] = new \Product\DogFood($product);
            } elseif ($product->subCategory==='cat'){
                $products[] = new \Product\CatFood($product);
            }
            break;
    }
}

include('view/products.php');

/**
 * TODO: Ürünleri listele
 * TODO : Sepete Ekle
 * TODO : Sepeti Listele & Update & Delete İşlemleri
 * TODO : Ürün Detay Sayfası
 */

?>

<style>
    .product_container {
        display: flex;
        flex-direction: row;
    }
    .product {
        flex:1;
        border:#ccc solid 1px;
        padding:15px;
        margin:15px;
    }
</style>
