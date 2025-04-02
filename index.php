<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? $_SESSION['username'] : '';

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
    <title>GlobalMarket</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="mask-icon" href="img/logo.png" color="#color-hex">
    <link rel="apple-touch-icon" href="img/logo.png">
   
</head>

<body>
<?php include 'navbar.php'; ?>
    
<a href=""></a>
    <section class="hero">
        <div class="hero-content">
            <h2>¡Regístrate ahora y recibe un regalo sorpresa GRATIS!</h2>
            <p>Ofertas exclusivas por tiempo limitado. ¡Aprovecha!</p>
          
            <div class="img-cuerpo">
                <img src="img/header1.png" alt="">  
            </div>
        </div>
    </section>

    <section class="products">
        <h2>Nuevos Productos</h2>
        <div class="product-grid">
            <!-- Producto 1 -->
            <div class="product">
                <img src="img/Imagen1.png" class="img" alt="Producto 1">
                <h3>PERCUSSION MASSAGER</h3>
                <p>$45.50</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="1">
                    <input type="hidden" name="producto_nombre" value="PERCUSSION MASSAGER">
                    <input type="hidden" name="producto_precio" value="45.50">
                    <input type="hidden" name="producto_imagen" value="img/Imagen1.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
            
            <!-- Producto 2 -->
            <div class="product">
                <img src="img/Imagen2.png" class="img" alt="Producto 2">
                <h3>AFNAN 9PM MEN</h3>
                <p>$26.68</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="2">
                    <input type="hidden" name="producto_nombre" value="AFNAN 9PM MEN">
                    <input type="hidden" name="producto_precio" value="26.68">
                    <input type="hidden" name="producto_imagen" value="img/Imagen2.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
            
            <!-- Producto 3 -->
            <div class="product">
                <img src="img/Imagen3.png" class="img" alt="Producto 3">
                <h3>PRINGLES 450 GRAMOS</h3>
                <p>$2.00</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="3">
                    <input type="hidden" name="producto_nombre" value="PRINGLES 450 GRAMOS">
                    <input type="hidden" name="producto_precio" value="2.00">
                    <input type="hidden" name="producto_imagen" value="img/Imagen3.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
            
            <!-- Producto 4 -->
            <div class="product">
                <img src="img/Imagen4.png" class="img" alt="Producto 4">
                <h3>VASO ACERO TERMICO CONTIGO</h3>
                <p>$17.99</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="4">
                    <input type="hidden" name="producto_nombre" value="VASO ACERO TERMICO CONTIGO">
                    <input type="hidden" name="producto_precio" value="17.99">
                    <input type="hidden" name="producto_imagen" value="img/Imagen4.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
            
            <!-- Producto 5 -->
            <div class="product">
                <img src="img/Imagen5.png" class="img" alt="Producto 5">
                <h3>HUMIFICADOR DE ESCENCIAS</h3>
                <p>$10.99</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="5">
                    <input type="hidden" name="producto_nombre" value="HUMIFICADOR DE ESCENCIAS">
                    <input type="hidden" name="producto_precio" value="10.99">
                    <input type="hidden" name="producto_imagen" value="img/Imagen5.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
            
            <!-- Producto 6 -->
            <div class="product">
                <img src="img/Imagen6.png" class="img" alt="Producto 6">
                <h3>GLADE AROMATIZANTE AUTOMATICO</h3>
                <p>$36.01</p>
                <form method="post" class="add-to-cart-form">
                    <input type="hidden" name="producto_id" value="6">
                    <input type="hidden" name="producto_nombre" value="GLADE AROMATIZANTE AUTOMATICO">
                    <input type="hidden" name="producto_precio" value="36.01">
                    <input type="hidden" name="producto_imagen" value="img/Imagen6.png">
                    <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
                </form>
            </div>
        </div>
    </section>

    <section class="offers">
        <div class="titulo"><h2>Ofertas de la semana</h2></div>
        
        <div class="offer1">
            <img src="img/Imagen7.png" class="imagen8" alt="Oferta 1">
            <h3>AL HARAMAIN AMBER OUD ULTRA VIOLET EAU DE PARFUM 60ML</h3>
            <p>$85.99</p>
            <form method="post" class="add-to-cart-form">
                <input type="hidden" name="producto_id" value="7">
                <input type="hidden" name="producto_nombre" value="AL HARAMAIN AMBER OUD ULTRA VIOLET EAU DE PARFUM 60ML">
                <input type="hidden" name="producto_precio" value="85.99">
                <input type="hidden" name="producto_imagen" value="img/Imagen7.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>

        <div class="offer2">
            <img src="img/Imagen8.png" class="imagen9" alt="Oferta 1">
            <h3>Combo de Nutella 2x1</h3>
            <p>$15.95</p>
            <form method="post" class="add-to-cart-form">
                <input type="hidden" name="producto_id" value="8">
                <input type="hidden" name="producto_nombre" value="Combo de Nutella 2x1">
                <input type="hidden" name="producto_precio" value="15.95">
                <input type="hidden" name="producto_imagen" value="img/Imagen8.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>

        <div class="offer3">
            <img src="img/Imagen9.png" class="imagen8" alt="Oferta 1">
            <h3>Splenda Zero Calories</h3>
            <p>$18.00</p>
            <form method="post" class="add-to-cart-form">
                <input type="hidden" name="producto_id" value="9">
                <input type="hidden" name="producto_nombre" value="Splenda Zero Calories">
                <input type="hidden" name="producto_precio" value="18.00">
                <input type="hidden" name="producto_imagen" value="img/Imagen9.png">
                <button type="submit" name="agregar_al_carrito">Añadir al carrito</button>
            </form>
        </div>
    </section>

    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="modal" style="display: <?php echo isset($_POST['agregar_carrito']) ? 'block' : 'none'; ?>;">
        <div class="modal-content">
            <h3>¡Producto añadido al carrito!</h3>
            <p>El producto se ha añadido correctamente a tu carrito de compras.</p>
            <button class="close-btn" onclick="document.getElementById('confirmationModal').style.display='none'">Aceptar</button>
        </div>
    </div>

    <div id="contacto"></div>
    <?php include 'footer.php'; ?>
        
    <div class="preloader">
        <div class="loader"></div>
    </div>
  
    <script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.body.classList.add('loaded');
        }, 1000); 
    });

    // Cerrar el modal si se hace clic fuera del contenido
    window.onclick = function(event) {
        const modal = document.getElementById('confirmationModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    </script>
</body>
</html>