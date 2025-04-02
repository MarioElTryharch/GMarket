
<style>
    /* Estilo para el mensaje de bienvenida */
.welcome-message {
    color: #4a148c;
    font-weight: 500;
    margin-right: 15px;
    font-size: 16px;
}

/* Ajustar el navbar para pantallas pequeñas */
@media (max-width: 768px) {
    .welcome-message {
        display: block;
        width: 100%;
        text-align: center;
        margin: 10px 0;
    }
}
</style>

<header class="header">
    <div class="container">
        <div logo-animated>
            <a href="index.php"><img src="img/logo.png" alt="GlobalMarket Logo" class="footer-logo"></a> 
        </div>
       
        <h1 class="logo">GlobalMarket</h1>
        <nav class="nav">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="contacto.php">Contáctanos</a>
            <a href="nosotros.php">Nosotros</a>
           

            <?php if ( isset($_SESSION['user_id'])): ?>
                    <a href="logout.php">Cerrar Sesión</a>
                    <a href="mis_compras.php"><button class="btn-cart">Mis compras</button></a>
                <?php else: ?>
                    <a href="login.php">Iniciar Sesión</a>
                <?php endif; ?>
               
                
        </nav>
    </div>
</header>