<?php
include('db.php');

// Verifica que el usuario esté autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtiene los datos del formulario
$idProducto = isset($_POST['id_Producto']) ? intval($_POST['id_Producto']) : 0;
$nombre = htmlspecialchars($_POST['nombreProducto']);
$descripcion = htmlspecialchars($_POST['descripcionProducto']);
$precio = floatval($_POST['precioProducto']);
$fotoActual = isset($_POST['fotoActual']) ? $_POST['fotoActual'] : ''; // Ruta de la foto actual

// Manejo de la foto del producto
$fotoPath = $fotoActual; // Default a la foto actual
if (isset($_FILES['fotoProducto']) && $_FILES['fotoProducto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmpName = $_FILES['fotoProducto']['tmp_name'];
    $fotoName = basename($_FILES['fotoProducto']['name']);
    $fotoPath = 'uploads/' . $fotoName;
    move_uploaded_file($fotoTmpName, $fotoPath);
}

// Asegura que el cod_Negocio esté disponible
$codNegocio = isset($_POST['cod_Negocio']) ? intval($_POST['cod_Negocio']) : 0;

if ($idProducto > 0) {
    // Actualiza el producto existente
    $query = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, foto = ? WHERE id_Producto = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $fotoPath, $idProducto);
} else {
    // Inserta un nuevo producto
    $query = "INSERT INTO productos (nombre, descripcion, precio, foto, cod_Negocio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $fotoPath, $codNegocio);
}

$stmt->execute();

// Redirige a la página de productos del negocio usando el ID de negocio
header("Location: verProductos.php?id=" . $codNegocio);
exit();
?>