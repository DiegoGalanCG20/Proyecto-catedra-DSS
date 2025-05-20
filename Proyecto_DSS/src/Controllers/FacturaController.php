<?php

namespace App\Controllers;

class FacturaController
{
     public function mostrarFactura()
    {
       include __DIR__ . '/../../views/factura.php';
    }
}