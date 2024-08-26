<?php
// Incluir archivo de conexión a la base de datos
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $contenido = $_POST['contenido'];
    $fecha_Publicacion = $_POST['fecha_Publicacion'];
    $tipo_recurso = $_POST['tipo_recurso'];

    // Preparar la consulta para insertar el nuevo recurso
    $query = "INSERT INTO recursos (titulo, autor, contenido, fecha_Publicacion, tipo_recurso) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $titulo, $autor, $contenido, $fecha_Publicacion, $tipo_recurso);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página de gestionar recursos con un mensaje de éxito
        header("Location: gestionarRecursos.php?success=add");
    } else {
        // Redirigir con un mensaje de error
        header("Location: gestionarRecursos.php?error=add");
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>