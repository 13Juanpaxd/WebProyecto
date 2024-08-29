<?php
$pageTitle = "Articulos";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 

// Conectar a la base de datos
include 'db.php';

// Consulta para obtener solo los artículos de la base de datos
$sql = "SELECT id_Recurso, titulo, autor, contenido, fecha_Publicacion FROM recursos WHERE tipo_recurso = 'Articulo'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h1>Artículos de interés</h1>
        <p>Lee acerca del acontecer de los emprendedores, aprende y avanza.</p>  

        <?php if ($result->num_rows > 0): ?>
            <ul class="list-group">
                <?php while($row = $result->fetch_assoc()): ?>
                    <li class="list-group-item">
                        <h5><?php echo htmlspecialchars($row['titulo']); ?></h5>
                        <small>
                            <?php echo date('d-m-Y', strtotime($row['fecha_Publicacion'])); ?> | Autor: <?php echo htmlspecialchars($row['autor']); ?>
                        </small>
                        <p>
                            <?php echo substr(htmlspecialchars($row['contenido']), 0, 100); ?>...
                            <a href="verArticulo.php?id=<?php echo $row['id_Recurso']; ?>">Leer más</a>
                        </p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No hay artículos disponibles en este momento.</p>
        <?php endif; ?>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>