<?php
// Configuración inicial y archivos de plantilla
$pageTitle = "Ver Video";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');

// Verificar si se ha pasado un ID de video en la URL
if (isset($_GET['id'])) {
    $idVideo = intval($_GET['id']); // Obtener el ID y convertirlo a entero para mayor seguridad
    
    // Conectar a la base de datos
    include 'db.php'; 

    // Consulta para obtener los detalles del video
    $sql = "SELECT titulo, autor, contenido, fecha_Publicacion FROM recursos WHERE id_Recurso = ? AND tipo_recurso = 'Video'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idVideo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar los detalles del video
        $video = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <body>
            <div class="container mt-4">
                <h1><?php echo htmlspecialchars($video['titulo']); ?></h1>
                <p>
                    <small>
                        <?php echo date('d-m-Y', strtotime($video['fecha_Publicacion'])); ?> | Autor: <?php echo htmlspecialchars($video['autor']); ?>
                    </small>
                </p>
                <div class="video-container">
                    <iframe width="560" height="315" 
                    src="<?php echo htmlspecialchars($video['contenido']); ?>" 
                    title="Video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                    </iframe>
                </div>
            </div>

            <?php include './plantillas/footer.php'; ?>
        </body>
        </html>
        <?php
    } else {
        // Mensaje si no se encuentra el video
        echo "<p>Video no encontrado.</p>";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Mensaje si no se proporciona un ID
    echo "<p>ID de video no proporcionado.</p>";
}

?>