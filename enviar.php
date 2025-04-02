<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['phone']);
    $asunto = htmlspecialchars($_POST['subject']);
    $mensaje = htmlspecialchars($_POST['message']);
    
    // Destinatario (tu correo empresarial)
    $para = "contacto@globalmarket.com";
    
    // Asunto del correo
    $asunto_correo = "Nuevo mensaje de contacto: $asunto";
    
    // Cuerpo del mensaje
    $cuerpo = "
    <html>
    <head>
        <title>Nuevo mensaje de contacto</title>
    </head>
    <body>
        <h2>Has recibido un nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Teléfono:</strong> +58 $telefono</p>
        <p><strong>Asunto:</strong> $asunto</p>
        <p><strong>Mensaje:</strong><br>".nl2br($mensaje)."</p>
    </body>
    </html>
    ";
    
    // Cabeceras para correo HTML
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $nombre <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar el correo
    $enviado = mail($para, $asunto_correo, $cuerpo, $headers);
    
    // Respuesta JSON para AJAX
    if ($enviado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al enviar el mensaje']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>