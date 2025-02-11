<?php

class Recipe_difficulty {
    private ?PDO $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todas las dificultades desde la base de datos
    public function getAllDifficulties() {
        $query = $this->db->prepare('SELECT id_difficulty_recipe, difficulty FROM difficulty_recipe');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
