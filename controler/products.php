<?php
class ProductsControler{
    private $products;

    public function __construct(){
        $this->products = new ProductManager();
    }
    public function displayProducts(){
        $display = $this->products->readAllProducts();
        print_r($display);
        foreach($display as $product){
            echo $product['product_name'];
        }

    }
}