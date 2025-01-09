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

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(?string $message): self {
        $this->message = $message;
        return $this;
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
        include $_SERVER['DOCUMENT_ROOT'] . '/ByKate_Stage/view/product_detail_view.php';    
    }


    public function testFormAddProduct():array|string{
        //1) Verification empty champs 
        if(empty($_POST["product_name"]) || empty($_POST["product_description"]) || empty($_POST["product_allergies"]) || empty($_POST['product_servings'])){
            return 'Por favor, compelta todos los campos.';
        }


        //3) Nettoyage des données
        $product_name = sanitize($_POST["product_name"]);
        $product_description = sanitize($_POST["product_description"]);
        $product_allergies = sanitize($_POST["product_allergies"]);
        $product_servings = sanitize($_POST['product_servings']);

        //4)Retour du tableau de données
        return [$product_name,$product_description,$product_allergies,$product_servings];
    }
    
//     private function handleImageUpload($inputName)
// {
//     // Verificamos si el archivo ha sido subido
//     if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
//         // Obtenemos información del archivo
//         $fileTmpPath = $_FILES[$inputName]['tmp_name'];
//         $fileName = $_FILES[$inputName]['name'];
//         $fileSize = $_FILES[$inputName]['size'];
//         $fileType = $_FILES[$inputName]['type'];

//         // Validamos la extensión del archivo (solo imágenes)
//         $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
//         $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

//         if (!in_array($fileExtension, $allowedExtensions)) {
//             $this->setMessage("Solo se permiten imágenes (jpg, jpeg, png, gif).");
//             return false;
//         }

//         // Generamos un nombre único para evitar colisiones
//         $newFileName = uniqid() . '.' . $fileExtension;

//         // Carpeta donde se guardará la imagen
//         $uploadDir = './photos/products/';

//         // Asegurarnos de que la carpeta exista
//         if (!is_dir($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }

//         // Movemos el archivo desde el directorio temporal a la carpeta de destino
//         $destPath = $uploadDir . $newFileName;

//         if (move_uploaded_file($fileTmpPath, $destPath)) {
//             // Devolvemos la ruta de la imagen
//             return $destPath;
//         } else {
//             return false; // Error al mover el archivo
//         }
//     }
//     return false; // No se ha subido archivo o ha ocurrido un error
// }

        public function addProduct(){
            if(isset($_POST['submitProduct'])){
                var_dump($_POST);
                $tab = $this->testFormAddProduct();

                if(is_string($tab)){
                    $this->setMessage($tab);
                }else{

                    // $main_photo_path = $this->handleImageUpload('main_photo');

                    // if($main_photo_path === false){
                    //     $this->setMessage('Huno un problema al subir la imagen.');
                    //     return;
                    // }

                    $newProduct = new Product();
                    $newProduct->setName_product($tab[0]);
                    $newProduct->setDescription_product($tab[1]);
                    $newProduct->setAllergies($tab[2]);
                    $newProduct->setServings($tab[3]);
                    // $newProduct->setPhotoPrincipal($main_photo_path);
                    var_dump($newProduct);

                    $addNewProduct = new ProductManager;
                    $this->setMessage($addNewProduct->addProduct($newProduct));
                }
            }

        }


}

ini_set('display_errors',1);
error_reporting(E_ALL);