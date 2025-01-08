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

    public function displayProduct($id_product){
        // echo "ID del producto: " . $id_product;
        $product = $this->products->readProductById($id_product);
        // var_dump($product);
        if(!$product){
            header('HTTP/1.0 404 Not found');
            echo 'Producto no encontrado';
            exit;
        }
        // var_dump($product);
        include $_SERVER['DOCUMENT_ROOT'] . '/ByKate_Stage/view/product_detail_view.php';    }
}