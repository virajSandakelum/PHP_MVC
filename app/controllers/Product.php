<?php


echo '<pre>';
print_r($_SERVER['PHP_SELF']);
echo '</pre>';


class Product extends Controller{

    public function index(){
        $this->view('product/tables');
    }
}