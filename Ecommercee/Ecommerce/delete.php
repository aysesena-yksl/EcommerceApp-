<?php

class  delete
{
    public function unset($deleteid)
    {
        unset($_SESSION['data'][$deleteid]);
        header('location:Basket.php');
    }
}
