<?php
namespace App\Controllers;

class CartController {
    public function add() {
        session_start(); // Asegúrate de iniciar sesión si no está

        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'nombre' => $name,
                'precio' => $price,
                'imagen' => $image,
                'cantidad' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['cantidad']++;
        }

        // Redirigir al carrito
        header('Location: /cart');
        exit;
    }

    public function view() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        include __DIR__ . '/../../views/cart.php';
    }

    public function remove() {
        session_start();
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
        header('Location: /cart');
        exit;
    }
}