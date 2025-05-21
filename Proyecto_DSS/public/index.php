<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\AuthController;
use App\Controllers\FacturaController;

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();

$product = new ProductController();
$cart = new CartController();
$checkout = new CheckoutController();
$auth = new AuthController(); // ← Esta línea faltaba
$factura = new FacturaController();

// Rutas principales
$router->get('/', [$product, 'landing']);
$router->post('/cart', [$cart, 'add']);
$router->get('/cart', [$cart, 'view']);
$router->post('/cart/delete', [$cart, 'remove']);
$router->get('/checkout', [$checkout, 'form']);
$router->post('/checkout', [$checkout, 'process']);
$router->get('/login', [$auth, 'login']);
$router->post('/login', [$auth, 'login']);
$router->get( '/factura', [$factura, 'mostrarFactura']);
$router->post( '/factura',  [$factura, 'mostrarFactura']);

$router->run();
