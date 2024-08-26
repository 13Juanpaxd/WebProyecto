<?php
$pageTitle = "Contactar Soporte";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');

// Incluir el autoloader de PHPMailer
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanitizar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Validar el correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Correo electrónico inválido.";
        header("Location: contactarSoporte.php");
        exit();
    }

    // Configuración del servidor SMTP de Mailtrap
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Mailtrap
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io'; // El servidor SMTP de Mailtrap
        $mail->SMTPAuth   = true;
        $mail->Username   = 'f869ae4b25cd36'; // Nombre de usuario de Mailtrap
        $mail->Password   = '36315846e3ebd1'; // Contraseña de Mailtrap
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2525; // Puerto SMTP de Mailtrap

        // Destinatarios
        $mail->setFrom('no-reply@localhost.com', 'Red Social Emprendedores');
        $mail->addAddress('soporte@high-tech.com'); // Agregar destinatario de soporte

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Ticket de Soporte: $asunto";
        $mail->Body    = "Se ha recibido el siguiente tiquete de soporte:<br><br>
                          <strong>Nombre:</strong> $nombre<br>
                          <strong>Correo:</strong> $correo<br>
                          <strong>Mensaje:</strong><br>$mensaje";
        $mail->AltBody = "Nombre: $nombre\nCorreo: $correo\nMensaje:\n$mensaje";

        $mail->send();
        $_SESSION['message'] = "Tu mensaje ha sido enviado exitosamente.";
        header("Location: contactarSoporte.php");
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Hubo un problema al enviar tu mensaje. Error: {$mail->ErrorInfo}";
        header("Location: contactarSoporte.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <div class="container mt-4">
        <div class="contact-container">
            <div class="contact-header">
                <h1>Contactar Soporte</h1>
                <p>Utilice los siguientes medios para contactar a nuestro equipo de soporte</p>
            </div>

            <div class="contact-info">
                <h3>Correo Electrónico</h3>
                <p>soporte@high-tech.com</p>

                <h3>Central Telefónica</h3>
                <p>+506 2222-3333</p>
            </div>

            <h2>Envíanos un Mensaje</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
            ?>
            <form id="contactForm" method="post" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                    <div id="nombreError" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                    <div id="correoError" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" class="form-control" required>
                    <div id="asuntoError" class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required></textarea>
                    <div id="mensajeError" class="text-danger"></div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>        
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            let valid = true;

            // Limpiar mensajes de error
            document.getElementById('nombreError').innerText = '';
            document.getElementById('correoError').innerText = '';
            document.getElementById('asuntoError').innerText = '';
            document.getElementById('mensajeError').innerText = '';

            // Validar Nombre
            const nombre = document.getElementById('nombre').value.trim();
            if (nombre === '') {
                document.getElementById('nombreError').innerText = 'El nombre es obligatorio.';
                valid = false;
            }

            // Validar Correo Electrónico
            const correo = document.getElementById('correo').value.trim();
            const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!correoRegex.test(correo)) {
                document.getElementById('correoError').innerText = 'Correo electrónico inválido.';
                valid = false;
            }

            // Validar Asunto
            const asunto = document.getElementById('asunto').value.trim();
            if (asunto === '') {
                document.getElementById('asuntoError').innerText = 'El asunto es obligatorio.';
                valid = false;
            }

            // Validar Mensaje
            const mensaje = document.getElementById('mensaje').value.trim();
            if (mensaje === '') {
                document.getElementById('mensajeError').innerText = 'El mensaje es obligatorio.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Evitar el envío del formulario si hay errores
            }
        });
    </script>
</body>
</html>