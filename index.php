<?php
//* J'active la session
session_start();
//* Inlclure ressources communes a chaque route
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
switch ($path) {

    case $path === "/ByKate_Stage/":
        include './view/home_view.php';
        break;

    case $path === "/ByKate_Stage/quienessomos":
        include './view/aboutUs_view.php';
        break;

    case $path === "/ByKate_Stage/nuestromenu":
        include './model/product.php';
        include './manager/product.php';
        include './controler/products.php';
        $products = new ProductsControler();
        include './view/menu_view.php';
        break;

    case $path === "/ByKate_Stage/recetas":
        include './view/recipes_view.php';
        break;

    case $path === "/ByKate_Stage/contacto":
        include './view/contact_view.php';
        break;

    case $path === "/ByKate_Stage/gestion":
        include './view/adminhome_view.php';
        break;

    case $path === "/ByKate_Stage/conexion":
        include 'env.php';
        include './utils/functions.php';
        include './view/connexionAdmin_view.php';
        include './model/users.php';
        include './manager/managerUsers.php';
        include './controler/login_controler.php';
        $connexion = new Login_controler();
        $connexion->connexionUser();
        break;

}

include './view/footer_view.php';
