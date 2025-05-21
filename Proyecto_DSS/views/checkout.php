<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Tarjeta de Crédito</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f5f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        .card-form {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(211, 14, 14, 0.08);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            position: relative;
        }
        
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            font-size: 16px;
            color: #3498db;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        .back-button:hover {
            text-decoration: underline;
        }
        
        .card-header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .card-header h2 {
            color: #2c3e50;
            margin: 0;
            font-size: 24px;
        }
        
        .card-logo {
            width: 60px;
            margin-bottom: 15px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
            font-size: 14px;
        }
        
        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
            box-sizing: border-box;
        }
        
        input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .card-row {
            display: flex;
            gap: 15px;
        }
        
        .card-row .form-group {
            flex: 1;
        }
        
        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        
        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        button {
            flex: 1;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .submit-btn {
            background: #ff7f27;
            color: white;
            border: none;
        }
        
        .submit-btn:hover {
            background: #1a252f;
        }
        
        .back-btn {
            background: white;
            color: #2c3e50;
            border: 1px solid #e0e0e0;
        }
        
        .back-btn:hover {
            background: #f5f5f5;
        }
            
        
        .card-preview {
            background: linear-gradient(135deg, #2c3e50, #ff7f27);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            position: relative;
            height: 180px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .card-number-display {
            font-size: 20px;
            letter-spacing: 1px;
            margin: 30px 0 20px;
            font-family: 'Courier New', monospace;
        }
        
        .card-bottom {
            display: flex;
            justify-content: space-between;
        }
        
        .card-cvv {
            position: absolute;
            right: 20px;
            top: 20px;
            background: white;
            color: #2c3e50;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="card-form">
        <button class="back-button" id="backButton">
        </button>
        
        <div class="card-header">
            <h2>Pago con Tarjeta</h2>
        </div>
        
        <div class="card-preview">
            <div class="card-cvv">CVV</div>
            <div class="card-number-display" id="cardNumberDisplay">•••• •••• •••• ••••</div>
            <div class="card-bottom">
                <div>
                    <div style="font-size: 10px; opacity: 0.8;">Titular de la tarjeta</div>
                    <div id="cardNameDisplay">NOMBRE APELLIDO</div>
                </div>
                <div>
                    <div style="font-size: 10px; opacity: 0.8;">Válido hasta</div>
                    <div id="cardExpiryDisplay">MM/AA</div>
                </div>
            </div>
        </div>
        
        <form id="paymentForm">
            <div class="form-group">
                <label for="cardNumber">Número de tarjeta</label>
                <input type="text" id="cardNumber" placeholder="Como aparece en la tarjeta" maxlength="19">
                <div class="error" id="cardNumberError">Número de tarjeta inválido</div>
            </div>
            
            <div class="form-group">
                <label for="cardName">Nombre del titular</label>
                <input type="text" id="cardName" placeholder="Como aparece en la tarjeta">
                <div class="error" id="cardNameError">Ingrese el nombre completo</div>
            </div>
            
            <div class="card-row">
                <div class="form-group">
                    <label for="cardExpiry">Fecha de expiración</label>
                    <input type="text" id="cardExpiry" placeholder="MM/AA" maxlength="5">
                    <div class="error" id="cardExpiryError">Formato MM/AA</div>
                </div>
                
                <div class="form-group">
                    <label for="cardCvv">CVV</label>
                    <input type="password" id="cardCvv" placeholder="•••" maxlength="4">
                    <div class="error" id="cardCvvError">Código inválido</div>
                </div>
            </div>
            
            <div class="button-container">
                <button type="button" class="back-btn" id="cancelButton">Cancelar</button>
                <button type="submit" class="submit-btn" id="pagarButton">Pagar ahora</button>
            </div>
        </form>
    </div>

    <script>
        // Formateo automático del número de tarjeta
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/g, '');
            let formatted = value.replace(/(\d{4})(?=\d)/g, '$1 ');
            e.target.value = formatted.trim();
            document.getElementById('cardNumberDisplay').textContent = formatted || '•••• •••• •••• ••••';
        });
        
        // Formateo automático de fecha de expiración
        document.getElementById('cardExpiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^0-9]/g, '');
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
            document.getElementById('cardExpiryDisplay').textContent = value || 'MM/AA';
        });
        
        // Mostrar nombre en tarjeta
        document.getElementById('cardName').addEventListener('input', function(e) {
            document.getElementById('cardNameDisplay').textContent = e.target.value.toUpperCase() || 'NOMBRE APELLIDO';
        });
        
        // Mostrar CVV al enfocar
        document.getElementById('cardCvv').addEventListener('focus', function() {
            document.querySelector('.card-cvv').style.display = 'block';
        });
        
        document.getElementById('cardCvv').addEventListener('blur', function() {
            document.querySelector('.card-cvv').style.display = 'none';
        });
        
        // Validación del formulario
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;
            
            // Validar número de tarjeta
            const cardNumber = document.getElementById('cardNumber').value.replace(/\s+/g, '');
            if (cardNumber.length < 16 || !/^\d+$/.test(cardNumber)) {
                document.getElementById('cardNumberError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('cardNumberError').style.display = 'none';
            }
            
            // Validar nombre
            const cardName = document.getElementById('cardName').value;
            if (cardName.trim().length < 5) {
                document.getElementById('cardNameError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('cardNameError').style.display = 'none';
            }
            
            // Validar fecha
            const cardExpiry = document.getElementById('cardExpiry').value;
            if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(cardExpiry)) {
                document.getElementById('cardExpiryError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('cardExpiryError').style.display = 'none';
            }
            
            // Validar CVV
            const cardCvv = document.getElementById('cardCvv').value;
            if (cardCvv.length < 3 || !/^\d+$/.test(cardCvv)) {
                document.getElementById('cardCvvError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('cardCvvError').style.display = 'none';
            }
            
        });
        
       // Botón Cancelar
document.getElementById('cancelButton').addEventListener('click', function() {
    if (confirm('¿Estás seguro que deseas cancelar el pago?')) {
        window.location.href = './'; // ajusta si la ruta es diferente
    }
});

   // Botón pagar
document.getElementById('pagarButton').addEventListener('click', function() {
    if (confirm('Pago procesado con éxito (simulación)')) {
        window.location.href = './';
    }
});

    </script>
</body>
</html>