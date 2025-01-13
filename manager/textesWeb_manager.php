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

}
