<?php
// Incluir archivo de conexión a la base de datos
require 'db.php';

// Verificar si el parámetro id está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta para eliminar el recurso
    $query = "DELETE FROM recursos WHERE id_Recurso = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página de gestionar recursos con un mensaje de éxito
        header("Location: gestionarRecursos.php?success=delete");
    } else {
        // Redirigir con un mensaje de error
        header("Location: gestionarRecursos.php?error=delete");
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Redirigir a la página de gestionar recursos con un mensaje de error si no se encuentra el id
    header("Location: gestionarRecursos.php?error=no_id");
}
?>