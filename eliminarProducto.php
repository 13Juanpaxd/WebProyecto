<?php
include('db.php'); 

// Verifica que el usuario esté autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Verifica que se haya pasado un ID de producto válido y un ID de negocio válido
if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['id_negocio']) && is_numeric($_GET['id_negocio'])) {
    $idProducto = intval($_GET['id']);
    $idNegocio = intval($_GET['id_negocio']); // Obtener id_negocio para la redirección

    // Elimina el producto de la base de datos
    $query = "DELETE FROM productos WHERE id_Producto = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idProducto);
    $stmt->execute();

    // Redirige a la página de productos del negocio
    header("Location: verProductos.php?id=" . $idNegocio);
    exit();
} else {
    // Redirige a la página de productos si no se pasa un ID válido
    if (isset($_GET['id_negocio']) && is_numeric($_GET['id_negocio'])) {
        $idNegocio = intval($_GET['id_negocio']);
        header("Location: verProductos.php?id=" . $idNegocio);
    } else {
        // Si no hay un id_negocio válido, redirige a misNegocios.php como fallback
        header("Location: misNegocios.php");
    }
    exit();
}
?>