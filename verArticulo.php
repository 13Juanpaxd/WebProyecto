<?php
// Configuración inicial y archivos de plantilla
$pageTitle = "Ver Artículo";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 

// Verificar si se ha pasado un ID de artículo en la URL
if (isset($_GET['id'])) {
    $idArticulo = intval($_GET['id']); // Obtener el ID y convertirlo a entero para mayor seguridad
    
    // Conectar a la base de datos
    include 'db.php'; 

    // Consulta para obtener los detalles del artículo
    $sql = "SELECT titulo, autor, contenido, fecha_Publicacion FROM recursos WHERE id_Recurso = ? AND tipo_recurso = 'Articulo'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idArticulo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar los detalles del artículo
        $articulo = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <body>
            <div class="container mt-4">
                <h1><?php echo htmlspecialchars($articulo['titulo']); ?></h1>
                <p>
                    <small>
                        <?php echo date('d-m-Y', strtotime($articulo['fecha_Publicacion'])); ?> | Autor: <?php echo htmlspecialchars($articulo['autor']); ?>
                    </small>
                </p>
                <div>
                    <?php echo nl2br(htmlspecialchars($articulo['contenido'])); ?>
                </div>
            </div>

            <?php include './plantillas/footer.php'; ?>
        </body>
        </html>
        <?php
    } else {
        // Mensaje si no se encuentra el artículo
        echo "<p>Artículo no encontrado.</p>";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Mensaje si no se proporciona un ID
    echo "<p>ID de artículo no proporcionado.</p>";
}