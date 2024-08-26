<?php
session_start();
include 'db.php'; // Conexión a la base de datos
include 'funciones.php'; // Incluir el archivo con la función generarToken
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir el archivo del autoloader de PHPMailer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $_SESSION['error'] = "Por favor, ingresa tu correo electrónico.";
        header("Location: olvidoContraseña.php");
        exit();
    }

    // Preparar la consulta para buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $token = generarToken();
            $fecha_expiracion = date('Y-m-d H:i:s', strtotime('+1 hour')); // El token expira en 1 hora

            // Guardar el token en la base de datos
            $sql = "INSERT INTO recuperacion_password (email, token, fecha_expiracion) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $email, $token, $fecha_expiracion);
                $stmt->execute();


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
                    $mail->addAddress($email); // Agregar destinatario

                    // Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperacion de Contrasena';
                    $mail->Body    = 'Para restablecer tu contrasena, haz clic en el siguiente enlace: <a href="http://localhost/WebProyecto/restablecerContrasena.php?token=' . $token . '">Restablecer Contraseña</a>';
                    $mail->AltBody = 'Para restablecer tu contrasena, haz clic en el siguiente enlace: http://localhost/WebProyecto/restablecerContrasena.php?token=' . $token;

                    $mail->send();
                    $_SESSION['message'] = "Instrucciones para recuperar tu contraseña han sido enviadas a tu correo.";
                    header("Location: olvidoContraseña.php");
                    exit();
                } catch (Exception $e) {
                    $_SESSION['error'] = "Hubo un problema al enviar el correo. Error: {$mail->ErrorInfo}";
                    header("Location: olvidoContraseña.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Hubo un problema al guardar el token.";
                header("Location: olvidoContraseña.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "No se encontró ninguna cuenta con ese correo electrónico.";
            header("Location: olvidoContraseña.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error en la preparación de la consulta.";
        header("Location: olvidoContraseña.php");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>