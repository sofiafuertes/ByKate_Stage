<?php
//* J'active la session
session_start();
//* Inlclure ressources communes a chaque route

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);

//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

/*--------------------------ROUTER -----------------------------*/

//test de la valeur $path dans l'URL et import de la ressource
switch ($path) {

    case $path === "/ByKate_Stage/":
        include './view/header_view.php';
        include './view/home_view.php';
        include './view/footer_view.php';
        break;

    case $path === "/ByKate_Stage/quienessomos":
        include './view/header_view.php';
        include './view/aboutUs_view.php';
        include './view/footer_view.php';
        break;

    case $path === "/ByKate_Stage/nuestromenu":
        include './view/header_view.php';
        include './view/menu_view.php';
        include './view/footer_view.php';
        break;

    case $path === "/ByKate_Stage/recetas":
        include './view/header_view.php';
        include './view/recipes_view.php';
        include './view/footer_view.php';
        break;

    case $path === "/ByKate_Stage/contacto":
        include './view/header_view.php';
        include './view/contact_view.php';
        include './view/footer_view.php';
        break;

    case $path === "/ByKate_Stage/gestion":
        include './view/header_view.php';
        include './view/adminhome_view.php';
        include './view/footer_view.php';
        break;

}