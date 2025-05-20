<?php
namespace App\Helpers;

class Validator {
    public static function validate($data) {
        $errors = [];

        if (!preg_match('/^[0-9]{8}-[0-9]$/', $data['dui']))
            $errors[] = "DUI inválido";

        if (!preg_match('/^[0-9]{16}$/', $data['card']))
            $errors[] = "Tarjeta inválida";

        if (!preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $data['expiry']))
            $errors[] = "Fecha inválida";

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
            $errors[] = "Correo inválido";

        return $errors;
    }
}
