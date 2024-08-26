<?php
include('db.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idProducto = intval($_GET['id']);
    $query = "SELECT * FROM productos WHERE id_Producto = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idProducto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $producto = $result->fetch_assoc();
        echo json_encode($producto);
    } else {
        echo json_encode(["error" => "Producto no encontrado"]);
    }
} else {
    echo json_encode(["error" => "ID no válido"]);
}
?>