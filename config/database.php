<?php

class Database
{
    private static ?PDO $connection = null;

    // Methode for connect to the database
    public static function connect(): PDO
    {
        if (self::$connection === null) {
            // get the env variables
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];


            try {
                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                    $username,
                    $password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$connection->exec("SET NAMES 'utf8mb4'");
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    // Methode for disconnect to the database
    public static function disconnect(): void
    {
        self::$connection = null;
    }
}

