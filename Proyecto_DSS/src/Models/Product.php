<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Product
{
    public static function all()
    {
        try {
            $db = Database::connection();
            $stmt = $db->prepare("
                SELECT productos.*, categorias.nombre as category 
                FROM productos 
                JOIN categorias ON productos.categoria_id = categorias.id 
                ORDER BY categoria_id, precio ASC
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error en Product::all - " . $e->getMessage());
            return [];
        }
    }
}
