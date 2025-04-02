<?php
session_start();

// Verificar si el usuario viene del proceso de pago
if (empty($_POST['metodo_pago'])) {
    header('Location: productos.php');
    exit();
}

// Guardar información de la compra para mostrar
$metodo_pago = $_POST['metodo_pago'];
$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa - GlobalMarket</title>
    <link rel="stylesheet" href="confirmacion.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
        /* Estilos para la página de confirmación */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .confirmation-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        
        .confirmation-card {
            background: white;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .checkmark {
            color: #4CAF50;
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        .confirmation-card h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        .confirmation-card p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .order-details {
            margin: 30px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
            text-align: left;
        }
        
        .order-details h3 {
            margin-top: 0;
            color: #333;
        }
        
        .order-details p {
            margin: 10px 0;
        }
        
        .back-to-shop {
            display: inline-block;
            padding: 12px 25px;
            background-color: #e63946;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }
        
        .back-to-shop:hover {
            background-color: #c1121f;
        }
    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="confirmation-container">
        <div class="confirmation-card">
            <div class="checkmark">✓</div>
            <h2>¡Compra realizada con éxito!</h2>
            <p>Gracias por tu compra en GlobalMarket. Hemos recibido tu pedido y lo estamos procesando.</p>
            <p>Te enviaremos un correo electrónico con los detalles de tu compra y el número de seguimiento.</p>
            
            <div class="order-details">
                <h3>Detalles de tu orden:</h3>
                <p>Número de orden: #<?php echo rand(100000, 999999); ?></p>
                <p>Fecha: <?php echo date('d/m/Y'); ?></p>
                <p>Total: $<?php echo number_format($total, 2); ?></p>
                <p>Método de pago: <?php echo ucfirst(str_replace('_', ' ', $metodo_pago)); ?></p>
            </div>
            
            <a href="productos.php" class="back-to-shop">Volver a la tienda</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>