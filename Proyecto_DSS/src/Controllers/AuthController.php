<?php

namespace App\Controllers;

use App\Core\Database;
use PDO;

class AuthController {
    public function login() {
        $emailError = $passwordError = "";
        $email = $password = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $valid = true;

            if (empty($_POST["email"])) {
                $emailError = "Por favor ingresa tu correo.";
                $valid = false;
            } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailError = "El correo no tiene un formato válido.";
                $valid = false;
            } else {
                $email = htmlspecialchars($_POST["email"]);
            }

            if (empty($_POST["password"])) {
                $passwordError = "Por favor ingresa tu contraseña.";
                $valid = false;
            } else {
                $password = htmlspecialchars($_POST["password"]);
            }

            if ($valid) {
                $pdo = Database::connection();
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
                $stmt->bindParam(':correo', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && $user['password'] === $password) {
                    $_SESSION['usuario'] = $user['nombre'];
                    header("Location: /landing"); // ← Redirige correctamente a la landing
                    exit;
                } else {
                    $passwordError = "Credenciales incorrectas.";
                }
            }
        }

        include __DIR__ . '/../../views/login.php';
    }
}
