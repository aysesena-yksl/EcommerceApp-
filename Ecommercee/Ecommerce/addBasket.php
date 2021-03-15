<?php
session_start();

class addBasket{
    private $id;
    private $count;

    public function __construct(){
        $this->id = $id = $_POST['id'];
        $this->count = $_SESSION['data'][$_POST['id']]['product_count'];
    }
    public function add(){
        if($_POST){
            if($_SESSION['data'][$_POST['id']]['product_id']===$this->id){
                $this->count++;

                $produtarray =array('product_id' =>$_POST['id'],'product_name'=>$_POST['name'],'product_price'=>$_POST['price'],
                'product_count'=>$this->count,'product_currency'=>$_POST['currency']);
            }
            else if(($_SESSION['data'][$_POST['id']]['product_id']!==$this->id)){
                $produtarray=array('product_id'=>$_POST['id'],'product_name'=>$_POST['name'],'product_price'=>$_POST['price'],
                'product_count'=>$this->count+1,'product_currency'=>$_POST['currency']);
            }
        }

        $_SESSION['data'][$_POST['id']]=$produtarray;
        header('location/index.php');

    }
}
$app = new addBasket();
$app->add();