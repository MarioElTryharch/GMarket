<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="mask-icon" href="img/logo.png" color="#color-hex">
    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="mask-icon" href="img/logo.png" color="#color-hex">
    <link rel="apple-touch-icon" href="img/logo.png">
    <link rel="stylesheet" href="contacto.css">
    <title>Contacto - GlobalMarket</title>
    
</head>
<body>
<div class="contact-container">
        <div logo-animated>
            <a href="index.php" ><img src="img/logo.png" alt="GlobalMarket Logo" class="footer-logo">  </a> 
        </div>
        
        <div class="contact-form">
            <h2>Contáctanos</h2>
            
            <form id="contactForm" action="#" method="POST">
                <div class="input-group">
                    <label for="name">Nombre Completo</label>
                    <input type="text" id="name" name="name" required placeholder="Ingresa tu nombre completo">
                </div>
                
                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
                </div>
                
                <div class="input-group">
                    <label for="phone">Teléfono</label>
                    <div class="phone-container">
                        <span class="phone-prefix">+58</span>
                        <input type="tel" id="phone" name="phone" placeholder="Ej. 4126834089" class="phone-input" pattern="[0-9]{10}">
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="subject">Asunto</label>
                    <select id="subject" name="subject" required>
                        <option value="" disabled selected>Selecciona un asunto</option>
                        <option value="soporte">Soporte Técnico</option>
                        <option value="ventas">Consultas de Ventas</option>
                        <option value="facturacion">Facturación</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label for="message">Mensaje</label>
                    <textarea id="message" name="message" required placeholder="Describe tu consulta en detalle..."></textarea>
                </div>
                
                <button type="submit" class="contact-button">Enviar Mensaje</button>
            </form>
            
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">📧</div>
                    <div>contacto@globalmarket.com</div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📱</div>
                    <div>+58 (412) 683-4089</div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">🏢</div>
                    <div>Fuerzas Armadas, Maracaibo, Venezuela</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3>¡Mensaje enviado correctamente!</h3>
            <p>Nos contactaremos contigo a través del correo electrónico que ingresaste previamente.</p>
            <button class="close-btn" onclick="closeModal()">Aceptar</button>
        </div>
    </div>

    <script>
        // Validación básica del teléfono
        document.getElementById('phone').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        
        // Manejo del envío del formulario
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Previene el envío real para este ejemplo
            
            // Aquí iría tu lógica para enviar el formulario
            // Por ejemplo: fetch, AJAX, etc.
            
            // Mostrar el modal de confirmación
            document.getElementById('confirmationModal').style.display = 'block';
            
            // Opcional: Resetear el formulario después de enviar
            this.reset();
        });
        
        // Función para cerrar el modal
        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }
        
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