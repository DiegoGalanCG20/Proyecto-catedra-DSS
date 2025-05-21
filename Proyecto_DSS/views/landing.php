<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda - Landing</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
             margin: 0;
             padding: 0;
             overflow-x: hidden;
        }

        .topbar {
            background-color: #ff7f27;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .logo {
            width: 50px;
            height: 50px;
        }

        .search-bar {
            flex: 1;
            max-width: 400px;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            outline: none;
        }

        .icons {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .layout {
            display: flex;
        }

        .sidebar {
        
            width: 250px;
            background-color:rgb(255, 255, 255);
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: fixed;
            top: 70px;
            left: 0;
            height: calc(100vh - 70px);
            overflow-y: auto;
            z-index: 100;
        }

        

        .sidebar h3 {
            margin-bottom: 10px;
            color: #333;
            font-size: 20px;
        }

        .sidebar hr {
            border: none;
            border-top: 2px solid #ccc;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
    text-decoration: none;
    color: #333;
    padding: 10px 15px;
    display: block;
    border-radius: 6px;
    transition: all 0.3s ease;
}

        .sidebar ul li a:hover {
    background-color: #ff7f27;
    color: white;
}

        .products {
            margin-left: 250px;
            padding: 30px;
            flex: 3;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .product {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 130px;
            object-fit: contain;
            border-radius: 10px;
        }

        .product strong {
            display: block;
            margin: 10px 0 5px;
            color: #2c3e50;
        }

        .product p {
            color: #555;
            margin-bottom: 8px;
        }

        .add-to-cart {
            background: #27ae60;
            color: white;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .add-to-cart:hover {
            background: #2ecc71;
        }

        /* Overlay oscuro */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 900;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* Panel lateral del carrito */
        .cart-panel {
            position: fixed;
            top: 0;
            right: -400px;
            width: 300px;
            height: 100%;
            background-color: #eee;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            transition: right 0.3s ease;
            z-index: 1000;
        }

        .cart-panel.active {
            right: 0;
        }

        .cart-panel h3 {
            margin-bottom: 10px;
        }

        .cart-items {
            max-height: 70%;
            overflow-y: auto;
        }

        .cart-item {
            background: #fff;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
        }

        .close-btn {
            text-align: right;
            font-weight: bold;
            cursor: pointer;
            font-size: 18px;
        }

        .checkout-btn {
            background-color: #ff7f27;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

          <style>
        /* Estilos del carrito */
        .cart-panel {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 999;
        }
        .close-btn {
            cursor: pointer;
            font-size: 20px;
            text-align: right;
        }
        .checkout-btn {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .checkout-btn:hover {
            background: #45a049;
        }

        /* Estilos del modal de pago */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 300px;
            text-align: center;
        }
        .close-modal {
            float: right;
            cursor: pointer;
            font-size: 20px;
        }
        .payment-option {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: #ff7f27;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .payment-option:hover {
            background: #ff7f27;
        }

        html {
        scroll-behavior: smooth;
        }

    </style>
    </style>
</head>
<body>

   <div class="topbar">
    <img src="/img/logoferre.png" class="logo" alt="Logo">
    <div class="search-bar">
        <input type="text" placeholder="Buscar productos...">
    </div>
    <div class="icons">


    

       <?php if (isset($_SESSION['usuario'])): ?>
    <div style="display: flex; align-items: center; gap: 10px;">
        <span>👤 <?= htmlspecialchars($_SESSION['usuario']) ?></span>
        <form action="/" method="post" style="margin: 0;">
            <button type="submit" style="background: none; border: none; color: white; cursor: pointer; font-size: 1rem;">Cerrar sesión</button>
        </form>
    </div>
<?php else: ?>
    <a href="/login"><span>👤</span></a>
<?php endif; ?>


        <span id="cart-icon">🛒</span>
    </div>
</div>


    <div class="layout">
        <div class="sidebar">
    <h3>Categorías</h3>
    <hr>
    <ul>
        <li><a href="#herramientas">Herramientas</a></li>
        <li><a href="#jardinería">Jardinería</a></li>
        <li><a href="#construcción">Construcción</a></li>
        <li><a href="#pinturas">Pinturas</a></li>
        <li><a href="#electricidad">Electricidad</a></li>
        <li><a href="#plomería">Plomería</a></li>
    </ul>
        </div>



        <div class="products">
    <?php foreach ($grouped as $category => $products): ?>
        <div style="grid-column: 1 / -1;">
            <h2 id="<?= strtolower(str_replace(' ', '-', $category)) ?>" style="margin: 20px 0 10px; color: #2c3e50; border-bottom: 2px solid #ccc; padding-bottom: 5px;">
                <?= htmlspecialchars($category) ?>
            </h2>

        </div>
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="/img/<?= htmlspecialchars($product['imagen']) ?>" alt="<?= htmlspecialchars($product['nombre']) ?>">
                <strong><?= htmlspecialchars($product['nombre']) ?></strong>
                <p>$<?= number_format($product['precio'], 2) ?></p>
                <button class="add-to-cart"
                        data-id="<?= $product['id'] ?>"
                        data-name="<?= htmlspecialchars($product['nombre']) ?>"
                        data-price="<?= $product['precio'] ?>">
                    Añadir
                </button>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>

    </div>

    <!-- Fondo oscuro -->
    <div class="overlay" id="overlay" onclick="toggleCart()"></div>

    <!-- Panel del carrito -->
    <div class="cart-panel" id="cart-panel">
    <div class="close-btn" onclick="toggleCart()">✖</div>
    <h3>Carrito de compras</h3>
    <div class="cart-items" id="cart-items">
        <!-- Productos añadidos se mostrarán aquí -->
    </div>
    <button class="checkout-btn" id="checkout-btn">Finalizar compra</button>
</div>

    <!-- Modal de selección de pago (oculto inicialmente) -->
<div id="payment-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closePaymentModal()">&times;</span>
        <h3>Selecciona tu método de pago</h3>
        <button class="payment-option" onclick="proceedToCheckout('efectivo')">Pago en efectivo</button>
        <button class="payment-option" onclick="proceedToCheckout('tarjeta')">Pago con tarjeta</button>
    </div>
</div>


<script>
    // Carrito como array
    let cart = [];

    // Elementos del DOM
    const cartPanel = document.getElementById('cart-panel');
    const cartIcon = document.getElementById('cart-icon');
    const cartItemsContainer = document.getElementById('cart-items');
    const overlay = document.getElementById('overlay');
    const checkoutBtn = document.getElementById('checkout-btn');

    // Función para mostrar/ocultar carrito
    function toggleCart() {
        cartPanel.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    // Evento para el ícono del carrito
    cartIcon.addEventListener('click', toggleCart);

    // Función para actualizar el carrito visualmente
    function updateCartDisplay() {
        cartItemsContainer.innerHTML = '';
        let total = 0;
        
        cart.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <strong>${item.name}</strong>
                <p>Precio: $${item.price.toFixed(2)}</p>
                <p>Cantidad: 
                    <button onclick="updateQuantity(${index}, -1)">-</button>
                    ${item.quantity}
                    <button onclick="updateQuantity(${index}, 1)">+</button>
                </p>
                <p>Subtotal: $${(item.price * item.quantity).toFixed(2)}</p>
                <button onclick="removeFromCart(${index})">Eliminar</button>
            `;
            cartItemsContainer.appendChild(itemElement);
            total += item.price * item.quantity;
        });

        // Mostrar total
        if (cart.length > 0) {
            const totalElement = document.createElement('div');
            totalElement.innerHTML = `<h4>Total: $${total.toFixed(2)}</h4>`;
            cartItemsContainer.appendChild(totalElement);
        } else {
            cartItemsContainer.innerHTML = '<p>Tu carrito está vacío</p>';
        }
    }

    // Función para añadir al carrito
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const price = parseFloat(button.getAttribute('data-price'));
            
            // Verificar si el producto ya está en el carrito
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1
                });
            }
            
            updateCartDisplay();
            // Guardar en localStorage
            localStorage.setItem('cart', JSON.stringify(cart));
        });
    });

    // Función para actualizar cantidad
    function updateQuantity(index, change) {
        cart[index].quantity += change;
        
        // Si la cantidad es 0 o menos, eliminar el producto
        if (cart[index].quantity <= 0) {
            cart.splice(index, 1);
        }
        
        updateCartDisplay();
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Función para eliminar producto
    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCartDisplay();
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Manejo del checkout
    checkoutBtn.addEventListener('click', function() {
        if (cart.length > 0) {
            // Guardar carrito en sessionStorage para la factura
            sessionStorage.setItem('checkoutCart', JSON.stringify(cart));
            document.getElementById('payment-modal').style.display = "flex";
        } else {
            alert("⚠️ Tu carrito está vacío. Agrega productos antes de finalizar la compra.");
        }
    });

    // Cierra el modal
    function closePaymentModal() {
        document.getElementById('payment-modal').style.display = "none";
    }

    // Redirige según el método de pago seleccionado
    function proceedToCheckout(paymentMethod) {
        if (paymentMethod === 'efectivo') {
            // Crear formulario dinámico para enviar los datos
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'factura'; // Ruta para pago en efectivo
            
            // Añadir campo de método de pago
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = 'payment_method';
            methodInput.value = paymentMethod;
            form.appendChild(methodInput);
            
            // Añadir cada producto al formulario
            cart.forEach((item, index) => {
                const nameInput = document.createElement('input');
                nameInput.type = 'hidden';
                nameInput.name = `products[${index}][name]`;
                nameInput.value = item.name;
                form.appendChild(nameInput);
                
                const priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = `products[${index}][price]`;
                priceInput.value = item.price;
                form.appendChild(priceInput);
                
                const qtyInput = document.createElement('input');
                qtyInput.type = 'hidden';
                qtyInput.name = `products[${index}][quantity]`;
                qtyInput.value = item.quantity;
                form.appendChild(qtyInput);
            });
            
            // Enviar formulario
            document.body.appendChild(form);
            form.submit();
        } else if (paymentMethod === 'tarjeta') {
            // Guardar datos para pago con tarjeta y redirigir
            sessionStorage.setItem('checkoutCart', JSON.stringify(cart));
            window.location.href = 'checkout'; // Página para pago con tarjeta
        }
    }
</script>

</body>
</html>
