<?php
class GalleryManager{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllImages(): array {
        try {
            $query = $this->db->prepare('SELECT photo_path FROM photos_web');
            $query->execute();
            $images = $query->fetchAll(PDO::FETCH_ASSOC);
            return $images ?: [];
        } catch (PDOException $e) {
            // Manejar el error (podrías registrar el error en un log o devolver un mensaje de error)
            error_log("Error en la consulta de imágenes: " . $e->getMessage());
            return [];
        }
    }

    public function saveImage(string $photoPath, string $section) {
        try {
            $query = $this->db->prepare("INSERT INTO photos_web (photo_path, section) VALUES (:photo_path, :section)");
            $query->bindParam(':photo_path', $photoPath);
            $query->bindParam(':section', $section);
            $query->execute();
        } catch (PDOException $e) {
            error_log("Error al guardar la imagen: " . $e->getMessage());
        }
    }

    public function deleteImageByPath(string $photoPath) {
        try {
            // Eliminar el archivo físicamente
            if (file_exists($photoPath)) {
                unlink($photoPath);  // Borra el archivo
            }
    
            // Eliminar la entrada de la base de datos
            $query = $this->db->prepare("DELETE FROM photos_web WHERE photo_path = :photo_path");
            $query->bindParam(':photo_path', $photoPath);
            $query->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar la imagen: " . $e->getMessage());
        }
    }
    
    
}