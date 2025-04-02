<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Usuario y contraseña son obligatorios";
    } else {
        // Buscar el usuario en la base de datos
        $stmt = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                // Redirigir al index
                header("Location: index.php");
                exit();
            } else {
                $error = "Credenciales incorrectas";
            }
        } else {
            $error = "Credenciales incorrectas";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Mantén todo el head como en tu HTML original -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="mask-icon" href="img/logo.png" color="#color-hex">
    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="stylesheet" href="login.css">
    <title>Login - GlobalMarket</title>
</head>
<body>
<?php include 'navbar.php'; ?>
    
    <main class="main-content">
        <div class="login-container">
            <div class="logo-container">
                <div logo-animated>
                    <a href="index.php"><img src="img/logo.png" alt="GlobalMarket Logo" class="footer-logo"></a>
                </div>
            </div>
            
            <div class="login-form">
                <h2>Iniciar Sesión</h2>
                
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <form action="login.php" method="POST">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" required placeholder="Ingresa tu usuario" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
                            <span class="toggle-password" onclick="togglePassword()">👁️</span>
                        </div>
                    </div>
                    
                    <div class="options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Recordarme</label>
                        </div>
                        
                    </div>
                    
                    <button type="submit" class="login-button">Iniciar Sesión</button>
                    
                    <div class="register-link">
                        ¿No tienes una cuenta? <a href="registrate.php">Regístrate aquí</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
    
    <!-- Mantén los scripts como en tu HTML original -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '👁️';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>