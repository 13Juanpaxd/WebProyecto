<?php
session_start();
include 'db.php'; // Conexión a la base de datos
include 'funciones.php'; // Incluir el archivo con la función generarToken

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = trim($_POST['token']);
    $password = trim($_POST['password']);

    if (empty($token) || empty($password)) {
        $_SESSION['error'] = "Por favor, complete todos los campos.";
        header("Location: restablecerContrasena.php?token=" . urlencode($token));
        exit();
    }

    // Verificar el token en la base de datos
    $sql = "SELECT * FROM recuperacion_password WHERE token = ? AND fecha_expiracion > NOW()";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Actualizar la contraseña
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET password = ? WHERE email = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ss", $password_hash, $email);
                $stmt->execute();

                // Eliminar el token de recuperación
                $sql = "DELETE FROM recuperacion_password WHERE token = ?";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("s", $token);
                    $stmt->execute();

                    $_SESSION['message'] = "Tu contraseña ha sido restablecida con éxito.";
                    header("Location: login.php");
                    exit();
                }
            }
        } else {
            $_SESSION['error'] = "El token de recuperación es inválido o ha expirado.";
            header("Location: login.php");
            exit();
        }
    }
    $stmt->close();
    $conn->close();
}
?>