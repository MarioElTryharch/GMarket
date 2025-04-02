<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    // Validaciones básicas
    if (empty($username) || empty($email) || empty($password) || empty($phone)) {
        $error = "Todos los campos son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El email no es válido";
    } elseif (strlen($password) < 8) {
        $error = "La contraseña debe tener al menos 8 caracteres";
    } else {
        // Verificar si el usuario o email ya existen
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "El nombre de usuario o email ya están en uso";
        } else {
            // Hash de la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertar nuevo usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password, phone) VALUES (:username, :email, :password, :phone)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':phone', $phone);

            if ($stmt->execute()) {
                // Iniciar sesión automáticamente después del registro
                session_start();
                $_SESSION['user_id'] = $conn->lastInsertId();
                $_SESSION['username'] = $username;
                
                // Redirigir al index
                header("Location: index.php");
                exit();
            } else {
                $error = "Error al registrar el usuario";
            }
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
    <link rel="stylesheet" href="registrate.css">
    <title>Registro - GlobalMarket</title>
</head>
<body>
<?php include 'navbar.php'; ?>
    
    <div class="main-content">
        <div class="register-container">
            <div class="logo-container">
                <div logo-animated>
                    <a href="index.php"><img src="img/logo.png" alt="GlobalMarket Logo" class="footer-logo"></a> 
                </div>
            </div>
            
            <div class="register-form">
                <h2>Registro</h2>
                
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                
                <form action="registrate.php" method="POST">
                    <!-- Mantén todos los campos del formulario como en tu HTML original -->
                    <div class="input-group">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" id="username" name="username" required placeholder="Crea tu nombre de usuario" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>
                    
                    <div class="input-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" required placeholder="Crea una contraseña segura" minlength="8">
                            <span class="toggle-password" onclick="togglePassword()">👁️</span>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label for="phone">Número de Teléfono</label>
                        <div class="phone-container">
                            <span class="phone-prefix">+58</span>
                            <input type="tel" id="phone" name="phone" required placeholder="Ej 4126834089" class="phone-input" pattern="[0-9]{10}" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="terms">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">Acepto los <a href="terms.html">Términos de Servicio</a> y <a href="privacy.html">Política de Privacidad</a></label>
                    </div>
                    
                    <button type="submit" class="register-button">Registrarse</button>
                    
                    <div class="login-link">
                        ¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        
        document.getElementById('phone').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>