<?php

namespace App\Controllers;

class AuthController {

public function logout() {
    session_unset();
    session_destroy();
    header("Location: /");
    exit;
}





    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $emailError = $passwordError = "";
        $email = $password = "";

        // Usuarios definidos directamente
        $usuarios = [
            'admin1@ferreteria.com' => [
                'nombre' => 'Admin Uno',
                'password' => 'admin123'
            ],
            'cliente@ferreteria.com' => [
                'nombre' => 'Cliente Demo',
                'password' => 'demo456'
            ]
        ];

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
                if (isset($usuarios[$email]) && $usuarios[$email]['password'] === $password) {
                    $_SESSION['usuario'] = $usuarios[$email]['nombre'];
                    header("Location: ./"); // Redirige a landing
                    exit;
                } else {
                    $passwordError = "Credenciales incorrectas.";
                }
            }
        }

        include __DIR__ . '/../../views/login.php';
    }
}
