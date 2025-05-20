<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    public static function connection() {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];

        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }
}
