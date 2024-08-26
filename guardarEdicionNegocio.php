<?php
include('db.php'); // Incluye la conexión a la base de datos

// Verifica que el usuario esté autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Maneja la eliminación del negocio si se recibe un ID a través de GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idNegocio = intval($_GET['id']);
    $query = "DELETE FROM negocios WHERE id_Negocio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idNegocio);
    $stmt->execute();
    header("Location: misNegocios.php");
    exit();
}

// Si no se recibió un ID de eliminación, maneja la actualización
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $idNegocio = intval($_POST['id']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $actividad = htmlspecialchars($_POST['actividad']);
    $fechaFundacion = htmlspecialchars($_POST['fecha_fundacion']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $paginaWeb = htmlspecialchars($_POST['pagina_web']);
    $envio = htmlspecialchars($_POST['envio']);
    $facebook = htmlspecialchars($_POST['facebook']);
    $instagram = htmlspecialchars($_POST['instagram']);
    $youtube = htmlspecialchars($_POST['youtube']);
    $googleMaps = htmlspecialchars($_POST['google_maps']);

    // Maneja la foto del negocio
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES['foto']['tmp_name'];
        $fotoName = basename($_FILES['foto']['name']);
        $fotoPath = 'uploads/' . $fotoName;
        move_uploaded_file($fotoTmpName, $fotoPath);
    } else {
        $fotoPath = $_POST['foto_actual']; // Usa la foto actual si no se ha subido una nueva
    }

    // Actualiza el negocio en la base de datos
    $query = "UPDATE negocios SET nombre = ?, actividad = ?, fecha_Fundacion = ?, telefono = ?, direccion = ?, pagina_Web = ?, envios = ?, facebook = ?, instagram = ?, youtube = ?, google_Maps = ?, ruta_Foto = ? WHERE id_Negocio = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssssi", $nombre, $actividad, $fechaFundacion, $telefono, $direccion, $paginaWeb, $envio, $facebook, $instagram, $youtube, $googleMaps, $fotoPath, $idNegocio);
    $stmt->execute();

    header("Location: misNegocios.php");
    exit();
} else {
    // Redirige a la página de negocios si no se recibió un ID válido
    header("Location: misNegocios.php");
    exit();
}
?>