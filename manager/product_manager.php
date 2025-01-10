<?php

class ProductManager
{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function readAllProducts(): array
    {
        try {
            $query = $this->db->prepare('SELECT id_product, product_name, product_description, allergies, servings, photo_principal_path FROM product');
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
            return $products ?: [];
        } catch (PDOException $e) {
            error_log('Eror en la consulta:' . $e->getMessage());
            return [];
        }
    }



    public function readProductById(int $id): ?array
    {
        try {
            $query = $this->db->prepare('SELECT id_product, product_name, product_description, allergies, servings, photo_principal_path, photo1_path, photo2_path, photo3_path FROM product WHERE id_product = :id');
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $product = $query->fetch(PDO::FETCH_ASSOC);
            return $product ?: null;
        } catch (PDOException $e) {
            error_log('Error en la consulta: ' . $e->getMessage());
            return null;
        }
    }
    public function addProduct(Product $product)
    {
        $name = $product->getName_product();
        $description = $product->getDescription_product();
        $allergies = $product->getAllergies();
        $servings = $product->getServings();
        $photoPrincipal = $product->getPhotoPrincipal();

        // var_dump($name, $description, $allergies, $servings);
        // $photo1 = $product->getPhoto1();
        // $photo2 = $product->getPhoto2();
        // $photo3 = $product->getPhoto3();

        try {
            $query = $this->db->prepare('INSERT INTO product (product_name, product_description, allergies, servings,photo_principal_path) VALUES (?, ?, ?, ?,?)');

            $query->bindParam(1, $name, PDO::PARAM_STR);
            $query->bindParam(2, $description, PDO::PARAM_STR);
            $query->bindParam(3, $allergies, PDO::PARAM_STR);
            $query->bindParam(4, $servings, PDO::PARAM_STR); 
            $query->bindParam(5, $photoPrincipal, PDO::PARAM_STR);
            // $query->bindParam(6, $photo1, PDO::PARAM_STR);
            // $query->bindParam(7, $photo2, PDO::PARAM_STR);
            // $query->bindParam(8, $photo3, PDO::PARAM_STR);
            $query->execute();
            return "Producto agregado con éxito";
        } catch (PDOException $e) {
            error_log('Error al agregar producto: ' . $e->getMessage());
            return "Error al agregar producto:". $e->getMessage();
        }
    }

}

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
//}
