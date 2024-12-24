<?php
//* J'active la session
session_start();
//* Inlclure ressources communes a chaque route
include './view/header_view.php';


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

}

include './view/footer_view.php';
