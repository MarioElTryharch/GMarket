<?php
session_start();

// Verificar si hay productos en el carrito
if (empty($_SESSION['cart']) {
    header('Location: productos.php');
    exit();
}

// Procesar el pago si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí iría la lógica para procesar el pago
    // Guardar la orden en la base de datos, etc.
    
    // Limpiar el carrito
    unset($_SESSION['cart']);
    
    // Redirigir a confirmación
    header('Location: confirmacion.php');
    exit();
}

// Calcular total
$total = array_reduce($_SESSION['cart'], function($sum, $item) {
    return $sum + ($item['price'] * $item['quantity']);
}, 0);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra - GlobalMarket</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="checkout-container">
        <h2>Finalizar Compra</h2>
        
        <div class="checkout-grid">
            <div class="order-summary">
                <h3>Resumen de tu pedido</h3>
                <div class="order-items">
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="order-item">
                            <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>">
                            <div class="item-info">
                                <h4><?= $item['name'] ?></h4>
                                <p>Cantidad: <?= $item['quantity'] ?></p>
                                <p>$<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="order-total">
                    <h4>Total: <span>$<?= number_format($total, 2) ?></span></h4>
                </div>
            </div>
            
            <div class="payment-methods">
                <h3>Método de Pago</h3>
                <form action="checkout.php" method="POST">
                    <div class="payment-option">
                        <input type="radio" id="zelle" name="payment" value="zelle" checked>
                        <label for="zelle">Zelle</label>
                        <div class="payment-details" id="zelle-details">
                            <p>Banco: Bank of America</p>
                            <p>Correo: pagos@globalmarket.com</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="paypal" name="payment" value="paypal">
                        <label for="paypal">PayPal</label>
                        <div class="payment-details" id="paypal-details">
                            <p>Correo: pagos@globalmarket.com</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="transferencia" name="payment" value="transferencia">
                        <label for="transferencia">Transferencia Bancaria (Venezuela)</label>
                        <div class="payment-details" id="transferencia-details">
                            <p>Banco: Banco de Venezuela</p>
                            <p>Cuenta: 0102-0555-5555555555</p>
                            <p>Cédula: V-12345678</p>
                            <p>Titular: GlobalMarket C.A.</p>
                        </div>
                    </div>
                    
                    <div class="payment-option">
                        <input type="radio" id="pago-movil" name="payment" value="pago-movil">
                        <label for="pago-movil">Pago Móvil</label>
                        <div class="payment-details" id="pago-movil-details">
                            <p>Teléfono: 0412-1234567</p>
                            <p>Cédula: 12345678</p>
                            <p>Banco: Banco de Venezuela</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes">Notas adicionales (opcional)</label>
                        <textarea id="notes" name="notes" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="confirm-payment">Confirmar Pago</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Mostrar detalles del método de pago seleccionado
        document.querySelectorAll('input[name="payment"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-details').forEach(details => {
                    details.style.display = 'none';
                });
                
                document.getElementById(this.id + '-details').style.display = 'block';
            });
        });

        // Mostrar el primer método de pago por defecto
        document.getElementById('zelle-details').style.display = 'block';
    </script>
</body>
</html>