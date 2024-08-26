<?php
include('db.php');
include('session.php');

// Asegúrate de que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; // Obtén el nombre de usuario de la sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pais = $_POST['pais'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];

    // Obtener la información actual del usuario
    $query = "SELECT foto_perfil FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "Usuario no encontrado.";
        exit();
    }

    // Manejo de la foto de perfil
    $fotoPerfil = $user['foto_perfil']; // Valor por defecto, si no se carga nueva foto

    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fotoPerfil']['tmp_name'];
        $fileName = $_FILES['fotoPerfil']['name'];
        $fileSize = $_FILES['fotoPerfil']['size'];
        $fileType = $_FILES['fotoPerfil']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // Extensiones permitidas
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        // Tamaño máximo de archivo en bytes (5 MB)
        $maxFileSize = 5 * 1024 * 1024;

        if (in_array($fileExtension, $allowedExtensions) && $fileSize <= $maxFileSize) {
            $uploadDir = 'uploads/';
            
            // Crear el directorio si no existe
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $destPath = $uploadDir . basename($fileName);

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $fotoPerfil = $destPath;
            } else {
                echo "Error al mover el archivo.";
                exit();
            }
        } else {
            echo "Archivo no válido o demasiado grande.";
            exit();
        }
    }

    // Actualización de datos en la base de datos
    $query = "UPDATE usuarios SET nombre = ?, email = ?, pais = ?, fecha_Nacimiento = ?, telefono = ?, sexo = ?, foto_perfil = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssss", $nombre, $email, $pais, $fechaNacimiento, $telefono, $sexo, $fotoPerfil, $username);

    if ($stmt->execute()) {
        header("Location: perfil.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>