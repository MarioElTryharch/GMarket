<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Función para añadir productos al carrito
if (isset($_POST['agregar_al_carrito'])) {
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $producto_imagen = $_POST['producto_imagen'];
    
    // Verificar si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $producto_id) {
            $item['cantidad'] += 1;
            $encontrado = true;
            break;
        }
    }
    
    // Si no está en el carrito, añadirlo
    if (!$encontrado) {
        $_SESSION['carrito'][] = [
            'id' => $producto_id,
            'nombre' => $producto_nombre,
            'precio' => $producto_precio,
            'imagen' => $producto_imagen,
            'cantidad' => 1
        ];
    }
    
    // Redirigir para evitar reenvío del formulario
    header('Location: '.$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - GlobalMarket</title>
    <link rel="stylesheet" href="productos.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <style>
        /* Estilos básicos para el carrito */
        .cart-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }
        
        .btn-mis-compras {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #e63946;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 999;
        }
        
        .btn-mis-compras:hover {
            background: #c1121f;
        }
        
        .cart-count {
            background: white;
            color: #e63946;
            border-radius: 50%;
            padding: 3px 8px;
            margin-left: 5px;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <?php include 'navbar2.php'; ?>

    <div class="titulo">
        <h2>Nuevos Productos</h2>
    </div>
    
    <div class="product-grid">
        <!-- Producto 1 -->
        <div class="product">
            <img src="img/img1.png" class="img" alt="Power Bank">
            <h3>Power Bank 10,000 mAh</h3>
            <p>$20.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="1">
                <input type="hidden" name="producto_nombre" value="Power Bank 10,000 mAh">
                <input type="hidden" name="producto_precio" value="20.00">
                <input type="hidden" name="producto_imagen" value="img/img1.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 2 -->
        <div class="product">
            <img src="img/img2.png" class="img" alt="Auriculares">
            <h3>Auriculares Inalámbricos</h3>
            <p>$25.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="2">
                <input type="hidden" name="producto_nombre" value="Auriculares Inalámbricos">
                <input type="hidden" name="producto_precio" value="25.00">
                <input type="hidden" name="producto_imagen" value="img/img2.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 3 -->
        <div class="product">
            <img src="img/img3.png" class="img" alt="Reloj Inteligente">
            <h3>Reloj Inteligente</h3>
            <p>$49.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="3">
                <input type="hidden" name="producto_nombre" value="Reloj Inteligente">
                <input type="hidden" name="producto_precio" value="49.00">
                <input type="hidden" name="producto_imagen" value="img/img3.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 4 -->
        <div class="product">
            <img src="img/img4.png" class="img" alt="Lentes de Sol">
            <h3>Lentes De Sol</h3>
            <p>$11.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="4">
                <input type="hidden" name="producto_nombre" value="Lentes De Sol">
                <input type="hidden" name="producto_precio" value="11.00">
                <input type="hidden" name="producto_imagen" value="img/img4.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 5 -->
        <div class="product">
            <img src="img/img5.png" class="img" alt="Máquina de Afeitar">
            <h3>Maquina De Afeitar</h3>
            <p>$20.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="5">
                <input type="hidden" name="producto_nombre" value="Maquina De Afeitar">
                <input type="hidden" name="producto_precio" value="20.00">
                <input type="hidden" name="producto_imagen" value="img/img5.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 6 -->
        <div class="product">
            <img src="img/img6.png" class="img" alt="Termo Vaso">
            <h3>Termo Vaso Stanley</h3>
            <p>$9.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="6">
                <input type="hidden" name="producto_nombre" value="Termo Vaso Stanley">
                <input type="hidden" name="producto_precio" value="9.00">
                <input type="hidden" name="producto_imagen" value="img/img6.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 7 -->
        <div class="product">
            <img src="img/img7.png" class="img" alt="Forros Transparentes">
            <h3>Forro Transparentes</h3>
            <p>$8.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="7">
                <input type="hidden" name="producto_nombre" value="Forro Transparentes">
                <input type="hidden" name="producto_precio" value="8.00">
                <input type="hidden" name="producto_imagen" value="img/img7.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 8 -->
        <div class="product">
            <img src="img/img8.png" class="img" alt="Caja de Herramientas">
            <h3>Caja De Herramientas</h3>
            <p>$60.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="8">
                <input type="hidden" name="producto_nombre" value="Caja De Herramientas">
                <input type="hidden" name="producto_precio" value="60.00">
                <input type="hidden" name="producto_imagen" value="img/img8.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 9 -->
        <div class="product">
            <img src="img/img9.png" class="img" alt="Morral Bandolero">
            <h3>Morral Bandolero</h3>
            <p>$9.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="9">
                <input type="hidden" name="producto_nombre" value="Morral Bandolero">
                <input type="hidden" name="producto_precio" value="9.00">
                <input type="hidden" name="producto_imagen" value="img/img9.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 10 -->
        <div class="product">
            <img src="img/img10.png" class="img" alt="Cinta Led">
            <h3>Cinta Led</h3>
            <p>$5.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="10">
                <input type="hidden" name="producto_nombre" value="Cinta Led">
                <input type="hidden" name="producto_precio" value="5.00">
                <input type="hidden" name="producto_imagen" value="img/img10.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 11 -->
        <div class="product">
            <img src="img/img11.png" class="img" alt="Mini Oreo">
            <h3>Mini Oreo Paquete</h3>
            <p>$62.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="11">
                <input type="hidden" name="producto_nombre" value="Mini Oreo Paquete">
                <input type="hidden" name="producto_precio" value="62.00">
                <input type="hidden" name="producto_imagen" value="img/img11.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
        
        <!-- Producto 12 -->
        <div class="product">
            <img src="img/img12.png" class="img" alt="Parlante Moonki">
            <h3>Parlante Moonki</h3>
            <p>$76.00</p>
            <form method="post">
                <input type="hidden" name="producto_id" value="12">
                <input type="hidden" name="producto_nombre" value="Parlante Moonki">
                <input type="hidden" name="producto_precio" value="76.00">
                <input type="hidden" name="producto_imagen" value="img/img12.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
    </div>
    
    <!-- Notificación de producto añadido -->
    <div class="cart-notification" id="cartNotification">
        Producto añadido al carrito
    </div>
    
    <!-- Botón flotante para ir a Mis Compras -->
    <a href="mis_compras.php" class="btn-mis-compras">
        Mis Compras <span class="cart-count"><?php echo count($_SESSION['carrito']); ?></span>
    </a>
    
    <?php include 'footer.php'; ?>
    
    <script>
        // Mostrar notificación cuando se añade un producto al carrito
        <?php if (isset($_POST['agregar_al_carrito'])): ?>
            document.addEventListener('DOMContentLoaded', function() {
                const notification = document.getElementById('cartNotification');
                notification.style.display = 'block';
                
                // Ocultar después de 3 segundos
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            });
        <?php endif; ?>
    </script>
</body>
</html>