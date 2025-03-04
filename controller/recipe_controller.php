<?php

class RecipeController
{
    public function addRecipe()
    {
        if (isset($_POST['submitRecipe'])) {
            if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['id_difficulty']) || empty($_POST['cooking_time'])) {
                echo "Por favor, complete todos los campos requeridos";
                return;
            }
            $title = sanitize($_POST['title']);
            $cagegory = sanitize($_POST['category']);
            $difficulty = (int) $_POST['id_difficulty'];
            $cookingTime = (int) $_POST['cooking_time'];
            $tips = $_POST['tips'] ?? [];
            $steps = $_POST['step_description'] ?? [];
            $ingredients = array_map(null, $_POST['ingredient_name'], $_POST['ingredient_quantity']);

            $mainPhoto = null;
            if (isset($_FILES['main_photo'])) {
                $mainPhoto = $this->uploadPhoto($_FILES['main_photo']);
            }

            $recipeManager = new RecipeManager();
            $recipeId = $recipeManager->createRecipe($title, $cagegory, $difficulty, $cookingTime, $mainPhoto);

            foreach ($ingredients as $ingredient) {
                $ingredientName = sanitize($ingredient[0]);
                $ingredientQuantity = sanitize($ingredient[1]);
                $recipeManager->addRecipeIngredient($recipeId, $ingredientName, $ingredientQuantity);
            }
            foreach ($steps as $index => $stepDescription) {
                $recipeManager->addRecipeStep($recipeId, $index + 1, $stepDescription);
            }
            foreach ($tips as $tipContent) {
                $recipeManager->addRecipeTip($recipeId, sanitize($tipContent));
            }
            echo "Receta creada con éxito";
        }
    }

    private function uploadPhoto($file)
    {
        $targetDir = "photos/recipes/";
        $targetFile = $targetDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $targetFile;
        } else {
            return null;
        }

    }


    //Method to show recipes
    public function showAllRecipes()
    {
        $recipeManager = new RecipeManager();
        $recipes = $recipeManager->getAllRecipes();
        include './view/recipes_view.php';
    }

    //Method to show all details of the recipe
    public function showRecipeDetails()
    {
        // var_dump($_GET);
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Receta no encontrada";
            return;
        }

        $recipeId = (int) $_GET['id'];
        $recipeManager = new RecipeManager();
        $recipe = $recipeManager->getRecipeById($recipeId);

        if (!$recipe) {
            echo "Receta no encontrada";
            return;
        }

        include './view/recipe_detail_view.php';
    }

}