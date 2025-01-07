<?php
class ProductsControler
{
    private $products;

    public function __construct()
    {
        $this->products = new ProductManager();
    }
    public function displayProducts()
    {
        $products = $this->products->readAllProducts();
        // echo '<pre>';
        // var_dump($products);
        // echo '</pre>';
        include 'view/menu_view.php';
    }
}