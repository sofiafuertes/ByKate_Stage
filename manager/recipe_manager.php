<?php

class RecipeManager
{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //Method to create a recipe in db
    public function createRecipe($title, $category, $difficulty, $cookingTime, $mainPhoto)
    {

        $query = $this->db->prepare('INSERT INTO recipe (title, category,id_difficulty_recipe, cooking_time, main_photo_path) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$title, $category, $difficulty, $cookingTime, $mainPhoto]);
        return $this->db->lastInsertId();

    }

    //Method to add an ingredient to a recipe and check if the ingredient already exists in the db
    public function addRecipeIngredient($recipeId, $ingredientName, $ingredientQuantity)
    {
        $ingredientId = $this->getIngredientId($ingredientName);
        $query = $this->db->prepare('INSERT INTO recipe_ingredient (id_recipe, id_ingredient, quantity) VALUES (?, ?, ?)');
        $query->execute([$recipeId, $ingredientId, $ingredientQuantity]);
    }

    //Method to add step to the recipe
    public function addRecipeStep($recipeId, $stepNumber, $stepDescription)
    {
        $query = $this->db->prepare('INSERT INTO steps_recipe (id_recipe, step_number, step_description) VALUES (?, ?, ?)');
        $query->execute([$recipeId, $stepNumber, $stepDescription]);
    }

    //Method to add a tip to the recipe
    public function addRecipeTip($recipeId, $contentTip)
    {
        $query = $this->db->prepare('INSERT INTO tips_recipe(id_recipe, content_tip) VALUES (?,?)');
        $query->execute([$recipeId, $contentTip]);
    }


    //Method to get the id of an ingredient
    private function getIngredientId($ingredientName)
    {
        $query = $this->db->prepare('SELECT id_ingredient FROM ingredient WHERE ingredient_name = ?');
        $query->execute([$ingredientName]);
        $result = $query->fetch();
        if ($result) {
            return $result['id_ingredient'];
        } else {
            $query = $this->db->prepare('INSERT INTO ingredient (ingredient_name) VALUES (?)');
            $query->execute([$ingredientName]);
            return $this->db->lastInsertId();

        }
    }

    //Method to read all recipes
    public function getAllRecipes()
    {
        $query = $this->db->prepare('SELECT id_recipe, title, category, cooking_time, main_photo_path, difficulty FROM recipe r JOIN difficulty_recipe dr ON r.id_difficulty_recipe = dr.id_difficulty_recipe');
        $query->execute();
        $recipes = $query->fetchAll(PDO::FETCH_ASSOC);

        return $recipes ?: [];
    }


    //Method to read a recipe by id
    public function getRecipeById($id)
    {
        // Obtener datos principales de la receta
        $query = $this->db->prepare('
        SELECT 
            r.id_recipe, 
            r.title, 
            r.main_photo_path, 
            r.cooking_time, 
            r.category, 
            r.id_difficulty_recipe, 
            dr.difficulty 
        FROM recipe r 
        JOIN difficulty_recipe dr ON r.id_difficulty_recipe = dr.id_difficulty_recipe
        WHERE r.id_recipe = ?
    ');
        $query->execute([$id]);
        $recipe = $query->fetch(PDO::FETCH_ASSOC);

        if (!$recipe) {
            return null;
        }

        // Obtener ingredientes de la receta
        $query = $this->db->prepare('
        SELECT 
            i.ingredient_name, 
            ri.quantity 
        FROM recipe_ingredient ri 
        JOIN ingredient i ON ri.id_ingredient = i.id_ingredient 
        WHERE ri.id_recipe = ?
    ');
        $query->execute([$id]);
        $recipe['ingredients'] = $query->fetchAll(PDO::FETCH_ASSOC);

        // Obtener pasos de la receta
        $query = $this->db->prepare('
        SELECT 
            step_number, 
            step_description 
        FROM steps_recipe 
        WHERE id_recipe = ? 
        ORDER BY step_number
    ');
        $query->execute([$id]);
        $recipe['steps'] = $query->fetchAll(PDO::FETCH_ASSOC);

        // Obtener consejos/tips de la receta
        $query = $this->db->prepare('
        SELECT 
            content_tip 
        FROM tips_recipe 
        WHERE id_recipe = ?
    ');
        $query->execute([$id]);
        $recipe['tips'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $recipe;
    }


}