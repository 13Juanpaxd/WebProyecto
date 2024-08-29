<?php
require 'db.php'; // Incluir el archivo de conexión a la base de datos

// Obtener datos del formulario
$cod_producto = intval($_POST['cod_Producto']);
$cod_usuario = $_POST['cod_Usuario'];

// Verificar si ya le gusta al usuario (para evitar múltiples likes)
$sql_check = "SELECT * FROM me_gusta WHERE cod_Producto = $cod_producto AND cod_Usuario = '$cod_usuario'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows == 0) {
    // Insertar el "Me Gusta"
    $sql_like = "INSERT INTO me_gusta (cod_Usuario, cod_Producto) VALUES ('$cod_usuario', $cod_producto)";
    if ($conn->query($sql_like) === TRUE) {
        // Redirigir con un parámetro de éxito
        header("Location: productos.php?id=" . intval($_GET['id']) . "&liked=true");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Redirigir si ya le gusta
    header("Location: productos.php?id=" . intval($_GET['id']) . "&already_liked=true");
}

$conn->close();
?>
