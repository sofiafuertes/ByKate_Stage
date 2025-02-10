<?php

class TextesWeb_manager
{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function readTextesByPathSection(?string $page_path, ?string $section)
    {
        try{
            $query = $this->db->prepare('SELECT page_path, section, content FROM textes_web WHERE page_path = ? AND section = ?');
            $query->bindValue(1,$page_path,PDO::PARAM_STR);
            $query->bindValue(2,$section,PDO::PARAM_STR);
            $query->execute();
            $text = $query->fetch(PDO::FETCH_ASSOC);
            return $text ?: null;
        }catch(PDOException $e){
            error_log('Error en la consulta: ' . $e->getMessage());
            return null;
        }
    }
    
    public function updateTextByPathSection(?string $page_path, ?string $section, ?string $newContent):bool{
        try{
            $query = $this->db->prepare('UPDATE textes_web SET content = ? WHERE page_path = ? AND section = ?');
            $query->bindValue(1,$newContent,PDO::PARAM_STR);
            $query->bindValue(2,$page_path,PDO::PARAM_STR);
            $query->bindValue(3,$section,PDO::PARAM_STR);

            $success = $query->execute();
            
            
            if (!$success) {
                error_log("Error al ejecutar la consulta SQL: " . implode(", ", $query->errorInfo()));
            }

            return $success;
            
        } catch (PDOException $e){
            error_log('Error en la actualización: ' . $e->getMessage());
            return false;
        }
    }

    public function readAllTextes()
    {
        try {
            $query = $this->db->prepare('SELECT page_path, section, content FROM textes_web');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en la consulta: ' . $e->getMessage());
            return [];
        }
    }
    


}
