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

    public function updatePassword($login, $newPassword){
        try{
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = $this->db->prepare('UPDATE users SET pwd_user = ? WHERE login_user = ?');
            $query->bindParam(1, $hashedPassword, PDO::PARAM_STR);
            $query->bindParam(2, $login, PDO::PARAM_STR);
            return $query->execute();
        }catch(PDOException $e){
            error_log('Error en la consulta:'. $e->getMessage());
            return false;
        }
    }


}