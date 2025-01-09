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
        include './view/home_view.php';
        break;

    case $path === "/ByKate_Stage/quienessomos":
        include './view/aboutUs_view.php';
        break;

    case $path === "/ByKate_Stage/nuestromenu":
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';
        $controller = new ProductsControler();
        $controller->displayProducts();
        break;

    case $path === "/ByKate_Stage/recetas":
        include './view/recipes_view.php';
        break;

    case $path === "/ByKate_Stage/contacto":
        include './view/contact_view.php';
        include './config/send_email.php';
        break;

    case $path === "/ByKate_Stage/gestion":
        include './utils/functions.php';
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';
        $addingProduct = new ProductsControler();
        $addingProduct->addProduct();
        include './view/adminhome_view.php';
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

    case $path === "/ByKate_Stage/logout":
        include './controller/logout.php';
        $logout = new Logout;
        $logout->logoutSession();
        break;


}

include './view/footer_view.php';
