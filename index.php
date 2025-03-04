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

// //test de la valeur $path dans l'URL et import de la ressource
// if (preg_match('/^\/ByKate_Stage\/producto\/(\d+)$/', $path, $matches)) {
//     // If the path corresponds to /ByKate_Stage/product/{id}
//     $id_product = $matches[1]; // Capture the product ID from the URL
//     include './model/product_model.php'; // Include the product model
//     include './manager/product_manager.php'; // Include the product manager
//     include './controller/products_controller.php'; // Include the products controller
//     $controller = new ProductsControler(); // Create a new instance of the controller
//     $controller->displayProduct($id_product); // Call the method to display the product details
//     include './view/footer_view.php';
//     exit; // Stop further script execution, as the product page is already loaded
// }


switch ($path) {

    case $path === "/ByKate_Stage/":
        include './model/product_model.php';
        include './model/textesWeb_model.php';
        include './manager/product_manager.php';
        include './manager/textesWeb_manager.php';
        include './controller/products_controller.php';
        include './controller/textesWeb_controller.php';
        $controller = new ProductsControler();
        $controller = new TextesWeb_controller();

        include './model/gallery_model.php';
        include './manager/gallery_manager.php';
        include './controller/gallery_controller.php';
        $galleryController = new Gallery_controller();
        $limit = 4;
        $images = $galleryController->displayImages($limit);

        include './view/home_view.php';
        break;

    case $path === "/ByKate_Stage/quienessomos":
        include './model/textesWeb_model.php';
        include './manager/textesWeb_manager.php';
        include './controller/textesWeb_controller.php';
        $controller = new TextesWeb_controller();
        include './view/aboutUs_view.php';
        break;

    case $path === "/ByKate_Stage/nuestrosproductos":
        // include './model/product_model.php';
        // include './manager/product_manager.php';
        // include './controller/products_controller.php';
        // $controller = new ProductsControler();
        // $products = $controller->displayProducts();
        // include './view/menu_view.php';

        include './model/textesWeb_model.php';
        include './manager/textesWeb_manager.php';
        include './controller/textesWeb_controller.php';
        $textController = new TextesWeb_controller();

        include './model/gallery_model.php';
        include './manager/gallery_manager.php';
        include './controller/gallery_controller.php';
        $galleryController = new Gallery_controller();

        $images = $galleryController->displayImages();
        

        include './view/galleryproducts_view.php';
        break;


    case $path === "/ByKate_Stage/contacto":
        include './config/send_email.php';
        include './model/textesWeb_model.php';
        include './manager/textesWeb_manager.php';
        include './controller/textesWeb_controller.php';
        $controller = new TextesWeb_controller();
        include './view/contact_view.php';
        break;

    case "/ByKate_Stage/recetas":
        include './manager/recipe_manager.php';
        include './controller/recipe_controller.php';

        $recipeController = new RecipeController();
        $recipeController->showAllRecipes();

        break;

    case (strpos($path, "/ByKate_Stage/receta") === 0):
        include './manager/recipe_manager.php';
        include './controller/recipe_controller.php';

        $recipeController = new RecipeController();
        $recipeController->showRecipeDetails();

        break;



    case $path === "/ByKate_Stage/gestion":
        include './utils/functions.php';
        include './model/product_model.php';
        include './manager/product_manager.php';
        include './controller/products_controller.php';
        include './model/textesWeb_model.php';
        include './model/recipe_model.php';
        include './manager/recipe_manager.php';
        include './model/users_model.php';
        include './manager/users_manager.php';
        include './manager/textesWeb_manager.php';
        include './manager/recipe_difficulty_manager.php';
        include './controller/textesWeb_controller.php';
        include './controller/login_controler.php';
        include './controller/recipe_controller.php';

        $difficultyManager = new Recipe_difficulty();
        $difficulties = $difficultyManager->getAllDifficulties();

        // $addingProduct = new ProductsControler();
        // $addingProduct->addProduct();

        $controller = new ProductsControler();
        $products = $controller->displayProducts();

        $loginController = new Login_controler();
        $loginController->changePassword();

        $recipeController = new RecipeController();
        $recipeController->addRecipe();

        $textController = new TextesWeb_controller();
        $texts = $textController->getAllTextes();

        include './model/gallery_model.php';
        include './manager/gallery_manager.php';
        include './controller/gallery_controller.php';
        $galleryController = new Gallery_controller();
        $images = $galleryController->displayImagesTable();

        include './view/adminhome_view.php';
        break;

        case $path === "/ByKate_Stage/gestion/delete_photo":
            include './manager/gallery_manager.php';
            include './controller/gallery_controller.php';
        
            if (isset($_GET['photo_path'])) {  // Verificar si el parámetro está presente
                $photoPath = $_GET['photo_path'];
                $galleryController = new Gallery_controller();
                $galleryController->deleteImage($photoPath);  // Llamar a la función de eliminación
        
                // Redirigir después de la eliminación para evitar eliminar la misma imagen al recargar
                header('Location: /ByKate_Stage/gestion');
                exit;
            } else {
                echo "Ruta de la imagen no proporcionada.";
            }
            break;
        
        

    // case $path === "/ByKate_Stage/gestion/update":
    //     include './utils/functions.php';
    //     include './model/product_model.php';
    //     include './manager/product_manager.php';
    //     include './controller/products_controller.php';

    //     $controller = new ProductsControler();
    //     $controller->updateProduct();
    //     break;

    case $path === "/ByKate_Stage/gestion/updateText":
        include './utils/functions.php';
        include './model/textesWeb_model.php';
        include './manager/textesWeb_manager.php';
        include './controller/textesWeb_controller.php';

        $textController = new TextesWeb_controller();
        $success = $textController->updateText($_POST['page_path'], $_POST['section'], $_POST['new_content']);

        $texts = $textController->getAllTextes();

        include './view/adminhome_view.php';
        break;

        case $path === "/ByKate_Stage/gestion/upload_photo":
            include './manager/gallery_manager.php';
            include './controller/gallery_controller.php';
        
            $galleryController = new Gallery_controller();
            $galleryController->uploadImage();
            break;
        

    // case $path === "/ByKate_Stage/gestion/delete":
    //     include './utils/functions.php';
    //     include './model/product_model.php';
    //     include './manager/product_manager.php';
    //     include './controller/products_controller.php';

    //     $controller = new ProductsControler();
    //     $controller->deleteProduct();
    //     break;




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

    case $path === "/ByKate_Stage/acercaproductos":
        include './view/aboutProducts_view.php';
        break;

    case $path === "/ByKate_Stage/terminosycondiciones":
        include './view/conditions_view.php';
        break;


    case $path === "/ByKate_Stage/logout":
        include './controller/logout.php';
        $logout = new Logout;
        $logout->logoutSession();
        break;


}

include './view/footer_view.php';
