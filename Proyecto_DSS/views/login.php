
<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #2e2e2e, #666666);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
            width: 340px;
            box-shadow: 0 0 30px rgba(0,0,0,0.4);
            text-align: center;
        }

        .login-box img {
            width: 70px;
            margin-bottom: 1.5rem;
            border-radius: 50%;
            border: 2px solid white;
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 2.5rem 0.75rem 2.5rem;
            border: none;
            border-radius: 12px;
            background-color: rgba(255,255,255,0.8);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            background-color: white;
            box-shadow: 0 0 0 2px #ff8c28;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #333;
            font-size: 1.2rem;
        }

        .btn {
            background: #ff8c28;
            color: white;
            border: none;
            padding: 0.9rem;
            width: 100%;
            font-size: 1.1rem;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background: #ff6a00;
            transform: scale(1.03);
        }

        .error {
            color: #ff4d4d;
            font-size: 0.9rem;
            margin-top: -1rem;
            margin-bottom: 1rem;
            text-align: left;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 1rem;
            color: #555;
        }
    </style>
</head>
<body>

<div class="login-box">
    <img src="/img/logoferre.png" alt="Logo">
    <form method="POST" action="/auth/login"> <!-- Aquí la ruta que maneja el controlador -->
        <div class="input-group">
            <span class="input-icon">📧</span>
            <input type="text" name="email" placeholder="Correo electrónico" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>">
        </div>
        <?php if (isset($_SESSION['emailError'])): ?>
            <div class="error"><?= $_SESSION['emailError'] ?></div>
        <?php endif; ?>

        <div class="input-group">
            <span class="input-icon">🔒</span>
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <?php if (isset($_SESSION['passwordError'])): ?>
            <div class="error"><?= $_SESSION['passwordError'] ?></div>
        <?php endif; ?>

        <button class="btn" type="submit">Iniciar Sesión</button>
    </form>
</div>

</body>
</html>
