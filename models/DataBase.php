<?php
class Database {
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            $host = 'localhost'; // Modifique conforme necessário
            $dbname = 'restaurante-mvc'; // Modifique conforme necessário
            $user = 'root'; // Modifique conforme necessário
            $pass = ''; // Modifique conforme necessário

            try {
                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname", 
                    $user, 
                    $pass
                );
                self::$connection->setAttribute(
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                echo 'Erro de conexão: ' . $e->getMessage();
            }
        }
        return self::$connection;
    }
}
