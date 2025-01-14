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
            return "Error al agregar producto:" . $e->getMessage();
        }
    }


    public function updateProduct(Product $product): bool
    {

        try {
            $query = $this->db->prepare('UPDATE product SET product_name = :nameProduct, product_description = :descriptionProduct, allergies = :allergies, servings = :servings WHERE id_product = :id');

            $query->bindValue(':nameProduct', $product->getName_product(), PDO::PARAM_STR);
            $query->bindValue(':descriptionProduct', $product->getDescription_product(), PDO::PARAM_STR);
            $query->bindValue(':allergies', $product->getAllergies(), PDO::PARAM_STR);
            $query->bindValue(':servings', $product->getServings(), PDO::PARAM_STR);
            $query->bindValue(':id', $product->getId_product(), PDO::PARAM_INT);
            return $query->execute();
        } catch (PDOException $e) {
            error_log('Error al actualizar el producto: ' . $e->getMessage());
            return false;
        }


    }
}
