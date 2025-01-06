<?php

class Database {
    private static ?PDO $connection = null;

    // Método para obtener la instancia de la conexión
    public static function connect(): PDO {
        if (self::$connection === null) {
            // Datos de la conexión
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];

            try {
                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username,
                    $password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    // Método para cerrar la conexión
    public static function disconnect(): void {
        self::$connection = null;
    }
}























// class ManagerUsers extends Users{
//     public function readUserByMail(){

//         $dbb = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", "{$_ENV['DB_USER']}", "{$_ENV['DB_PASSWORD']}",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//         var_dump($dbb);

//         // $email = $this->getLogin();

//         try{
//             $req = $dbb->prepare('SELECT * FROM users');

//             // $req = $dbb->prepare('SELECT id_users, login, pwd FROM users WHERE login = ?');

//             // $req->bindParam(1, $email, PDO::PARAM_STR); 
//             $req->execute();

//             $data = $req->fetch(PDO::FETCH_ASSOC);

//             var_dump($data);
//             return $data;
//         }catch(Exception $e){
//             return $e->getMessage();
//         }
//     }


// }
