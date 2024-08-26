<?php
include('db.php');
include('session.php');

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$usuarioDueno = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $actividad = $_POST['actividad'];
    $fechaFundacion = $_POST['fecha_fundacion'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $paginaWeb = $_POST['pagina_web'];
    $envios = $_POST['envios'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];
    $googleMaps = $_POST['google_maps'];

    // Manejo de la foto del negocio
    $fotoNegocio = null; // Valor por defecto, si no se carga nueva foto

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
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
                $fotoNegocio = $destPath;
            } else {
                echo "Error al mover el archivo.";
                exit();
            }
        } else {
            echo "Archivo no válido o demasiado grande.";
            exit();
        }
    }

    // Inserción de datos en la base de datos
    $query = "INSERT INTO negocios (usuario_Dueno, ruta_Foto, nombre, actividad, fecha_Fundacion, telefono, direccion, pagina_Web, envios, facebook, instagram, youtube, google_Maps) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conn->error);
    }

    $stmt->bind_param("sssssssssssss", $usuarioDueno, $fotoNegocio, $nombre, $actividad, $fechaFundacion, $telefono, $direccion, $paginaWeb, $envios, $facebook, $instagram, $youtube, $googleMaps);

    if ($stmt->execute()) {
        header("Location: misNegocios.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>