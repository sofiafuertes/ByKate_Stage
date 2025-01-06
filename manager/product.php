<?php

class ProductManager{
    private ?PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function readAllProducts(): array{
        $query = $this->db->prepare('SELECT product_name, product_description, allergies, servings, photo_principal_path FROM product');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    // public function readProductById(int $id): array{
    //     $pdo = $this->db->connect();
    //     $query = $pdo->prepare('SELECT * FROM products WHERE id_product = :id');
    //     $query->execute(['id' => $id]);
    //     $product = $query->fetch(PDO::FETCH_ASSOC);
    //     return $product;
    // }

    // public function createProduct(Product $product): void{
    //     $pdo = $this->db->connect();
    //     $query = $pdo->prepare('INSERT INTO products (product_name, product_description, allergies, servings, photo_principal, photo1, photo2, photo3) VALUES (:product_name, :product_description, :allergies, :servings, :photo_principal, :photo1, :photo2, :photo3)');
    //     $query->execute([
    //         'product_name' => $product->getName_product(),
    //         'product_description' => $product->getDescription_product(),
    //         'allergies' => $product->getAllergies(),
    //         'servings' => $product->getServings(),
    //         'photo_principal' => $product->getPhotoPrincipal(),
    //         'photo1' => $product->getPhoto1(),
    //         'photo2' => $product->getPhoto2(),
    //         'photo3' => $product->getPhoto3()
    //     ]);
    // }

    // public function updateProduct(Product $product): void{
    //     $pdo = $this->db->connect();
    //     $query = $pdo->prepare('UPDATE products SET product_name = :product_name, product_description = :product_description, allergies = :allergies, servings = :servings, photo_principal = :photo_principal, photo1 = :photo1, photo2 = :photo2, photo3 = :photo3 WHERE id_product = :id');
    //     $query->execute([
    //         'product_name' => $product->getName_product(),
    //         'product_description' => $product->getDescription_product(),
    //         'allergies' => $product->getAll
}
