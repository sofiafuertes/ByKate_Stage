<?php
class ProductsControler
{
    private $products;

    private ?string $message;


    public function __construct()
    {
        $this->products = new ProductManager();
        $this->message = "";
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }
    public function displayProducts()
    {
        $products = $this->products->readAllProducts();
        // echo '<pre>';
        // var_dump($products);
        // echo '</pre>';
        // include 'view/menu_view.php';
        return $products;
    }

    public function displayProduct($id_product)
    {
        // echo "ID del producto: " . $id_product;
        $product = $this->products->readProductById($id_product);
        // var_dump($product);
        if (!$product) {
            header('HTTP/1.0 404 Not found');
            echo 'Producto no encontrado';
            exit;
        }
        // var_dump($product);
        include $_SERVER['DOCUMENT_ROOT'] . '/ByKate_Stage/view/product_detail_view.php';
    }


    public function testFormAddProduct(): array|string
    {
        //1) empty champs verification 
        if (empty($_POST["product_name"]) || empty($_POST["product_description"]) || empty($_POST["product_allergies"]) || empty($_POST['product_servings'])) {
            return 'Por favor, compelta todos los campos.';
        }

        //3) Cleaning data
        $product_name = sanitize($_POST["product_name"]);
        $product_description = sanitize($_POST["product_description"]);
        $product_allergies = sanitize($_POST["product_allergies"]);
        $product_servings = sanitize($_POST['product_servings']);

        //4)Return data array
        return [$product_name, $product_description, $product_allergies, $product_servings];
    }

    private function handleImageUpload($inputName)
    {
        //Verify file
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            // info of the file
            $fileTmpPath = $_FILES[$inputName]['tmp_name'];
            $fileName = $_FILES[$inputName]['name'];
            $fileSize = filesize($fileTmpPath);
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $folder = './photos/products/';

            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $maxSize = 5000000;

            if ($fileSize > $maxSize) {
                $this->setMessage('Archivo muy grande');
                return false;
            }

            if (!in_array($fileExtension, $allowedExtensions)) {
                $this->setMessage("Solo se permiten imágenes (jpg, jpeg, png, gif).");
                return false;
            }


            if (move_uploaded_file($fileTmpPath, $folder . $fileName)) {
                return $folder . $fileName;
            } else {
                $this->setMessage('Error al mover el archivo subido');
                return false;
            }
        } else {
            $this->setMessage('No se pudo subir el archivo');
        }
    }

    public function addProduct()
    {
        if (isset($_POST['submitProduct'])) {
            // var_dump($_POST);
            $tab = $this->testFormAddProduct();

            if (is_string($tab)) {
                $this->setMessage($tab);
                return;
            } else {

                $main_photo_path = $this->handleImageUpload('main_photo');

                if ($main_photo_path === false) {
                    $this->setMessage('Hubo un problema al subir la imagen.');
                    return;
                }

                $newProduct = new Product();
                $newProduct->setName_product($tab[0]);
                $newProduct->setDescription_product($tab[1]);
                $newProduct->setAllergies($tab[2]);
                $newProduct->setServings($tab[3]);
                $newProduct->setPhotoPrincipal($main_photo_path);
                // var_dump($newProduct);

                $productManager = new ProductManager;
                $this->setMessage($productManager->addProduct($newProduct));
            }
        }

    }


}
