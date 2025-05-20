<?php
namespace App\Controllers;

use App\Helpers\Validator;

class CheckoutController {
    public function form() {
        // Datos que podrían ser necesarios para la vista
        $data = [
            'pageTitle' => 'Datos de Tarjeta de Crédito',
            'actionUrl' => '/checkout/process',
            'backUrl' => '/landing'
        ];
        
        $this->renderView('checkout', $data);
    }

    public function process() {
        // Validar los datos del formulario
        $errors = $this->validatePaymentData($_POST);

        if (!empty($errors)) {
            // Si hay errores, mostramos el formulario nuevamente con los errores
            $data = [
                'pageTitle' => 'Error en el pago',
                'errors' => $errors,
                'formData' => $_POST, // Para mantener los datos ingresados
                'actionUrl' => '/checkout/process',
                'backUrl' => '/landing'
            ];
            $this->renderView('checkout', $data);
            return;
        }

        // Procesar el pago (aquí iría la lógica real de pago)
        $paymentResult = $this->processPayment($_POST);
        
        if ($paymentResult['success']) {
            // Pago exitoso
            $this->renderView('checkout_success', [
                'pageTitle' => 'Pago exitoso',
                'transactionId' => $paymentResult['transactionId'],
                'amount' => $_POST['amount'] ?? 0
            ]);
            $_SESSION['cart'] = []; // Limpiar el carrito
        } else {
            // Error en el pago
            $data = [
                'pageTitle' => 'Error en el pago',
                'errorMessage' => $paymentResult['message'],
                'formData' => $_POST,
                'actionUrl' => '/checkout/process',
                'backUrl' => '/landing'
            ];
            $this->renderView('checkout', $data);
        }
    }

    /**
     * Valida los datos del pago
     */
 protected function validatePaymentData($data) {
    $errors = [];
    
    // Validar número de tarjeta (versión corregida)
    if (empty($data['card_number'])) {
        $errors['card_number'] = 'El número de tarjeta es requerido';
    } elseif (!preg_match('/^\d{16}$/', str_replace(' ', '', $data['card_number']))) {
        $errors['card_number'] = 'Número de tarjeta inválido';
    }
    
        // Validar nombre del titular
        if (empty($data['card_name'])) {
            $errors['card_name'] = 'El nombre del titular es requerido';
        } elseif (strlen(trim($data['card_name'])) < 5) {
            $errors['card_name'] = 'Nombre demasiado corto';
        }
        
        // Validar fecha de expiración
        if (empty($data['card_expiry'])) {
            $errors['card_expiry'] = 'La fecha de expiración es requerida';
        } elseif (!preg_match('/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', $data['card_expiry'])) {
            $errors['card_expiry'] = 'Formato inválido (MM/AA)';
        }
        
        // Validar CVV
        if (empty($data['card_cvv'])) {
            $errors['card_cvv'] = 'El CVV es requerido';
        } elseif (!preg_match('/^\d{3,4}$/', $data['card_cvv'])) {
            $errors['card_cvv'] = 'CVV inválido';
        }
        
        return $errors;
    }

    /**
     * Simula el procesamiento del pago
     */
    protected function processPayment($data) {
        // En una aplicación real, aquí iría la integración con la pasarela de pago
        // Esta es una simulación
        
        $success = rand(0, 1); // 50% de éxito para prueba
        
        if ($success) {
            return [
                'success' => true,
                'transactionId' => 'TXN' . uniqid(),
                'message' => 'Pago procesado con éxito'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'El pago fue rechazado por el banco emisor'
            ];
        }
    }

    /**
     * Renderiza una vista
     */
    protected function renderView($viewName, $data = []) {
        extract($data);
        include __DIR__ . '/../../views/' . $viewName . '.php';
    }
}