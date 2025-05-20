<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function landing() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $products = Product::all();
        $grouped = [];

        foreach ($products as $p) {
            $category = $p['category'] ?? 'Sin categoría';
            $grouped[$category][] = $p;
        }

        include __DIR__ . '/../../views/landing.php';

    }
}
