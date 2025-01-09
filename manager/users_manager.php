<?php 

class Users_manager{
    private ?PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function readUserByMail($login){
        try{
            $query = $this->db->prepare('SELECT login_user, pwd_user FROM users WHERE login_user = ?');
            $query->bindParam(1, $login, pdo::PARAM_STR);
            $query->execute();
            $user = $query->fetch(pdo::FETCH_ASSOC);
            return $user ?: null; 
        }catch(PDOException $e){
            error_log('Error en la consulta:'. $e->getMessage());
            return null;
        }
    } 
}