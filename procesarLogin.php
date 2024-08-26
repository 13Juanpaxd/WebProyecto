<?php
session_start(); // Iniciar sesión al principio del archivo
include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar datos del formulario
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validar que los campos no estén vacíos
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Por favor, complete todos los campos.";
        header("Location: login.php");
        exit();
    }

    // Preparar la consulta para buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar los parámetros
        $stmt->bind_param("s", $username);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // Obtener la fila del usuario
            $user = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // La contraseña es correcta, iniciar sesión
                $_SESSION['username'] = $user['username'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['pais'] = $user['pais'];
                $_SESSION['fecha_Nacimiento'] = $user['fecha_Nacimiento'];
                $_SESSION['telefono'] = $user['telefono'];
                $_SESSION['sexo'] = $user['sexo'];
                $_SESSION['foto_perfil'] = $user['foto_perfil'];
                header("Location: feed.php"); // Dirigir a la página de feed
                exit();
            } else {
                // Contraseña incorrecta
                $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
                header("Location: login.php"); // Redirigir a la página de login
                exit();
            }
        } else {
            // Usuario no encontrado
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
            header("Location: login.php"); // Redirigir a la página de login
            exit();
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error en la preparación de la consulta.";
        header("Location: login.php"); // Redirigir a la página de login
        exit();
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>