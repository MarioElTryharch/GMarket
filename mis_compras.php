<?php
session_start();

// Eliminar producto del carrito si se solicita
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] == $id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }
    // Reindexar array
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header('Location: mis_compras.php');
    exit();
}

// Actualizar cantidades si se envía el formulario
if (isset($_POST['actualizar_carrito'])) {
    foreach ($_POST['cantidad'] as $id => $cantidad) {
        foreach ($_SESSION['carrito'] as &$producto) {
            if ($producto['id'] == $id) {
                $producto['cantidad'] = $cantidad;
                break;
            }
        }
    }
    header('Location: mis_compras.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Compras - GlobalMarket</title>
    <link rel="stylesheet" href="mis_compras.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
        /* Estilos básicos para la página de compras */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .cart-title {
            text-align: center;
            margin: 30px 0;
        }
        
        .cart-items {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-right: 20px;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-details h3 {
            margin: 0 0 10px 0;
        }
        
        .item-price {
            font-weight: bold;
            color: #e63946;
        }
        
        .item-quantity {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        
        .item-quantity input {
            width: 50px;
            text-align: center;
            padding: 5px;
            margin: 0 10px;
        }
        
        .remove-item {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 1.2em;
        }
        
        .cart-summary {
            margin-top: 30px;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #e63946;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        
        .checkout-btn:hover {
            background-color: #c1121f;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px;
            font-size: 1.2em;
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .action-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .update-btn {
            background-color: #4CAF50;
            color: white;
        }
        
        .continue-btn {
            background-color: #f0f0f0;
            color: #333;
            text-decoration: none;
        }
        .header {
    background: rgba(255, 255, 0, 0.9);
    padding: 15px 0;
    font-size: 20px;
    font-weight: 900;
    width: 100%;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.main-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
}

.login-container {
    width: 100%;
    max-width: 400px;
    background: rgba(255, 255, 0, 0.9);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    margin: 20px 0;
}

.logo-container {
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-container img {
    height: 50px;
}

.login-form {
    padding: 30px;
}

h2 {
    color: #6a3093;
    margin-bottom: 25px;
    text-align: center;
    font-size: 24px;
}

.input-group {
    margin-bottom: 20px;
    position: relative;
}

.input-group label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: bold;
}

.input-group input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s;
}

.input-group input:focus {
    border-color: #ffc107;
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.2);
}

.password-container {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6a3093;
}

.options {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    font-size: 14px;
}

.remember-me {
    display: flex;
    align-items: center;
}

.remember-me input {
    margin-right: 5px;
}

.forgot-password a {
    color: #6a3093;
    text-decoration: none;
    font-weight: bold;
}

.forgot-password a:hover {
    text-decoration: underline;
}

.login-button {
    width: 100%;
    padding: 14px;
    background: linear-gradient(to right, #ffc107, #ffab00);
    border: none;
    border-radius: 8px;
    color: #6a3093;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s;
    margin-bottom: 20px;
}

.login-button:hover {
    background: linear-gradient(to right, #ffab00, #ff9800);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

.register-link {
    text-align: center;
    color: #555;
}

.register-link a {
    color: #6a3093;
    text-decoration: none;
    font-weight: bold;
}

.register-link a:hover {
    text-decoration: underline;
}
a {
color: #000000;
text-decoration: none;
transition: color 0.3s ease;
}
footer {
    background-color: rgba(255, 255, 0, 0.9);
    color: #000;
    padding: 20px;
    text-align: center;
    width: 100%;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    margin-bottom: 20px;
    max-width: 1200px;
    margin: 0 auto;
    flex-wrap: wrap;
}

.footer-logo {
    max-width: 100px;
    margin-right: 20px;
    border-radius: 100%;
}

.footer-info, .footer-links {
    text-align: left;
    line-height: 2.0;

}

.footer-links a {
    display: block;
    margin-bottom: 5px;
    color: #000;
    text-decoration: none;
}

.footer-bottom {
    border-top: 1px solid #000;
    padding-top: 10px;
    max-width: 1200px;
    margin: 0 auto;
}

[logo-animated] {
    display: inline-block;
    perspective: 1000px;
}

[logo-animated] img.footer-logo {
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

[logo-animated] img.footer-logo:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    filter: brightness(1.05);
}

.titulo {
    text-align: center;
    font-weight: 700;
    font-size: 20px;
    padding: 0;
}

.header .logo {
    font-size: 28px;
    color: #4a148c;
    font-weight: bold;
}

.nav a {
    margin: 0 15px;
    text-decoration: none;
    color: #4a148c;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav a:hover {
    color: #000000;
    transform: translateY(-2px)
}

.nav a {
    display: inline-block;
    transition: transform 0.3s ease;
}

.nav .btn-cart {
    background: #4a148c;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s ease;
    font-size: 20px;
}

.nav .btn-cart:hover {
    background: rgb(0, 0, 0);
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .header .container {
        flex-direction: column;
        text-align: center;
    }
    
    .nav {
        margin-top: 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .nav a {
        margin: 5px 10px;
    }
    
    .footer-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .footer-info, .footer-links {
        text-align: center;
        margin: 15px 0;
    }
}
    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="container">
        <h1 class="cart-title">Mi Carrito de Compras</h1>
        
        <?php if (empty($_SESSION['carrito'])): ?>
            <div class="empty-cart">
                <p>Tu carrito está vacío</p>
                <a href="productos.php" class="continue-btn">Continuar comprando</a>
            </div>
        <?php else: ?>
            <form method="post" action="mis_compras.php">
                <div class="cart-items">
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $producto): 
                        $subtotal = $producto['precio'] * $producto['cantidad'];
                        $total += $subtotal;
                    ?>
                        <div class="cart-item">
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                            <div class="item-details">
                                <h3><?php echo $producto['nombre']; ?></h3>
                                <span class="item-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                                <div class="item-quantity">
                                    <label>Cantidad:</label>
                                    <input type="number" name="cantidad[<?php echo $producto['id']; ?>]" 
                                           value="<?php echo $producto['cantidad']; ?>" min="1">
                                </div>
                            </div>
                            <a href="mis_compras.php?eliminar=<?php echo $producto['id']; ?>" class="remove-item" 
                               onclick="return confirm('¿Eliminar este producto del carrito?')"> 
                                &times;
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="action-buttons">
                    <a href="productos.php" class="action-btn continue-btn">Continuar comprando</a>
                    <button type="submit" name="actualizar_carrito" class="action-btn update-btn">Actualizar carrito</button>
                </div>
                
                <div class="cart-summary">
                    <div class="cart-total">
                        <span>Total:</span>
                        <span>$<?php echo number_format($total, 2); ?></span>
                    </div>
                    <a href="finalizar_compra.php" class="checkout-btn">Finalizar Compra</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>