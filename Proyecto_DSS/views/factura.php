<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        .logo {
            width: 100px;
            margin-bottom: 10px;
        }
        .invoice-title {
            color: #333;
            margin: 0;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .payment-method {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        .btn-print {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 10px;
            background: #ff7f27;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-print:hover {
            background: #e67322;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <img src="/img/logoferre.png" class="logo" alt="Logo">
            <h1 class="invoice-title">FACTURA DE COMPRA</h1>
            <p>Fecha: <?= date('d/m/Y H:i:s') ?></p>
        </div>
        
        <div class="invoice-info">
            <div>
                <h3>Datos del Cliente</h3>
                <p><?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : 'Cliente no registrado' ?></p>
            </div>
            <div>
                <h3>N° Factura</h3>
                <p>#<?= str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT) ?></p>
                <h3>Método de Pago</h3>
                <p><?= isset($_POST['payment_method']) ? ucfirst(htmlspecialchars($_POST['payment_method'])) : 'No especificado' ?></p>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                if (isset($_POST['products']) && is_array($_POST['products'])) {
                    foreach ($_POST['products'] as $product) {
                        $name = htmlspecialchars($product['name']);
                        $price = floatval($product['price']);
                        $quantity = intval($product['quantity']);
                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                ?>
                <tr>
                    <td><?= $name ?></td>
                    <td>$<?= number_format($price, 2) ?></td>
                    <td><?= $quantity ?></td>
                    <td>$<?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php 
                    }
                } else {
                    echo '<tr><td colspan="4" style="text-align: center;">No hay productos en esta factura</td></tr>';
                }
                ?>
            </tbody>
        </table>
        
        <div class="total">
            <p>TOTAL: $<?= number_format($total, 2) ?></p>
        </div>
        
        <div class="payment-method">
            <h3>Método de Pago: <?= isset($_POST['payment_method']) ? ucfirst(htmlspecialchars($_POST['payment_method'])) : 'No especificado' ?></h3>
            <?php if (isset($_POST['payment_method']) && $_POST['payment_method'] === 'efectivo'): ?>
                <p>Por favor, pague al recibir su pedido.</p>
            <?php elseif (isset($_GET['payment_method']) && $_GET['payment_method'] === 'tarjeta'): ?>
                <p>El pago con tarjeta ha sido procesado.</p>
            <?php endif; ?>
        </div>
        
        <button class="btn-print" onclick="window.print()">Imprimir Factura</button>
        
        <div class="footer">
            <p>Gracias por su compra - Ferretería Cerna</p>
            <p>Para reclamos o devoluciones, contacte a servicio@ferreteriacerna.com</p>
        </div>
    </div>
    
    <script>
        // Limpiar el carrito después de generar la factura
        if (typeof localStorage !== 'undefined') {
            localStorage.removeItem('cart');
        }
    </script>
</body>
</html>