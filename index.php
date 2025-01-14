<?php
//* J'active la session
session_start();
//* Inlclure ressources communes a chaque route
include './model/header_model.php';
$header = new Header();
$header->displayNav();
include './view/header_view.php';
include 'env.php';
include './config/database.php';
$db = new Database();
$pdo = $db->connect();


//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
if (preg_match('/^\/ByKate_Stage\/producto\/(\d+)$/', $path, $matches)) {
    // If the path corresponds to /ByKate_Stage/product/{id}
    $id_product = $matches[1]; // Capture the product ID from the URL
    include './model/product_model.php'; // Include the product model
    include './manager/product_manager.php'; // Include the product manager
    include './controller/products_controller.php'; // Include the products controller
    $controller = new ProductsControler(); // Create a new instance of the controller
    $controller->displayProduct($id_product); // Call the method to display the product details
    include './view/footer_view.php';
    exit; // Stop further script execution, as the product page is already loaded
}


switch ($path) {

    case $path === "/ByKate_Stage/":
        include './model/product_model.php';
        include './model/textesWeb_model.php';
        include './manager/product_manager.php';
        include './manager/textesWeb_manager.php';
        include './controller/products_controller.php';
        include './controller/textesWeb_controller.php';
        $controller = new ProductsControler();
        $limit = $_GET['limit'] ?? 4;
        $products = $controller->displayProducts($limit);
        $controller = new TextesWeb_controller();

        include './view/home_view.php';
        break;

    case $path === "/ByKate_Stage/quienessomos":
        include './model/textesWeb_model.php';
        include './manager/textesWeb_manager.php';
        include './controller/textesWeb_controller.php';
        $controller = new TextesWeb_controller();
        include './view/aboutUs_view.php';
        break;

    case $path === "/ByKate_Stage/nuestromenu":
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';
        $controller = new ProductsControler();
        $products = $controller->displayProducts();
        include './view/menu_view.php';
        break;

    case $path === "/ByKate_Stage/recetas":
        include './view/recipes_view.php';
        break;

    case $path === "/ByKate_Stage/contacto":
        include './config/send_email.php';
        include './view/contact_view.php';
        break;

    case $path === "/ByKate_Stage/gestion":
        include './utils/functions.php';
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';
        $addingProduct = new ProductsControler();
        $addingProduct->addProduct();
        $controller = new ProductsControler();
        $products = $controller->displayProducts();
        include './view/adminhome_view.php';
        break;

    case $path === "/ByKate_Stage/gestion/update":
        include './utils/functions.php';
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';

        $controller = new ProductsControler();
        $controller->updateProduct(); 
        break;


    case $path === "/ByKate_Stage/conexion":
        include 'env.php';
        include './utils/functions.php';
        include './model/users_model.php';
        include './manager/users_manager.php';
        include './controller/login_controler.php';
        $connexion = new Login_controler();
        $connexion->connexionUser();
        include './view/connexionAdmin_view.php';
        break;

    case $path === "/ByKate_Stage/infodelatienda":
        include './view/shopInfo_view.php';
        break;

    case $path === "/ByKate_Stage/logout":
        include './controller/logout.php';
        $logout = new Logout;
        $logout->logoutSession();
        break;


}

include './view/footer_view.php';
