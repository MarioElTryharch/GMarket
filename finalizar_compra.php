<?php
session_start();

// Verificar si hay productos en el carrito
if (empty($_SESSION['carrito'])) {
    header('Location: productos.php');
    exit();
}

// Procesar el pago si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí iría la lógica para procesar el pago
    // Guardar la orden en la base de datos, etc.
    
    // Limpiar el carrito
    $_SESSION['carrito'] = [];
    
    // Redirigir a confirmación
    header('Location: confirmacion.php');
    exit();
}

// Calcular total
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
    <title>Finalizar Compra - GlobalMarket</title>
    <link rel="stylesheet" href="finalizar_compra.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
        /* Estilos básicos para la página de pago */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .checkout-title {
            text-align: center;
            margin: 30px 0;
        }
        
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .order-summary, .payment-methods {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .order-summary h3, .payment-methods h3 {
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .order-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .order-item img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-right: 15px;
        }
        
        .item-info h4 {
            margin: 0 0 5px 0;
        }
        
        .order-total {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            text-align: right;
            font-size: 1.2em;
        }
        
        .order-total span {
            font-weight: bold;
            color: #e63946;
        }
        
        .payment-option {
            margin-bottom: 15px;
        }
        
        .payment-option input {
            margin-right: 10px;
        }
        
        .payment-details {
            margin-left: 25px;
            margin-top: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 4px;
            display: none;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .confirm-payment {
            width: 100%;
            padding: 15px;
            background-color: #e63946;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
        }
        
        .confirm-payment:hover {
            background-color: #c1121f;
        }
    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="container">
        <h1 class="checkout-title">Finalizar Compra</h1>
        
        <div class="checkout-grid">
            <div class="order-summary">
                <h3>Resumen de tu pedido</h3>
                <div class="order-items">
                    <?php foreach ($_SESSION['carrito'] as $producto): ?>
                        <div class="order-item">
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                            <div class="item-info">
                                <h4><?php echo $producto['nombre']; ?></h4>
                                <p>Cantidad: <?php echo $producto['cantidad']; ?></p>
                                <p>$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="order-total">
                    <h4>Total: <span>$<?php echo number_format($total, 2); ?></span></h4>
                </div>
            </div>
            
            <div class="payment-methods">
                <h3>Método de Pago</h3>
                <form method="post" action="finalizar_compra.php">
                    <div class="payment-option">
                        <input type="radio" id="zelle" name="metodo_pago" value="zelle" checked>
                        <label for="zelle">Zelle</label>
                        <div class="payment-details" id="zelle-details">
                            <p>Banco: Bank of America</p>
                            <p>Correo: pagos@globalmarket.com</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="paypal" name="metodo_pago" value="paypal">
                        <label for="paypal">PayPal</label>
                        <div class="payment-details" id="paypal-details">
                            <p>Correo: pagos@globalmarket.com</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="transferencia" name="metodo_pago" value="transferencia">
                        <label for="transferencia">Transferencia Bancaria (Venezuela)</label>
                        <div class="payment-details" id="transferencia-details">
                            <p>Banco: Banco de Venezuela</p>
                            <p>Cuenta: 0102-0555-5555555555</p>
                            <p>Cédula: V-12345678</p>
                            <p>Titular: GlobalMarket C.A.</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="pago-movil" name="metodo_pago" value="pago_movil">
                        <label for="pago-movil">Pago Móvil</label>
                        <div class="payment-details" id="pago-movil-details">
                            <p>Teléfono: 0412-1234567</p>
                            <p>Cédula: 12345678</p>
                            <p>Banco: Banco de Venezuela</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notas">Notas adicionales (opcional)</label>
                        <textarea id="notas" name="notas" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="confirm-payment">Confirmar Pago</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <script>
        // Mostrar detalles del método de pago seleccionado
        document.querySelectorAll('input[name="metodo_pago"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Ocultar todos los detalles
                document.querySelectorAll('.payment-details').forEach(details => {
                    details.style.display = 'none';
                });
                
                // Mostrar los detalles del método seleccionado
                document.getElementById(this.id + '-details').style.display = 'block';
            });
        });
        
        // Mostrar detalles del método seleccionado por defecto
        document.getElementById('zelle-details').style.display = 'block';
    </script>
</body>
</html>