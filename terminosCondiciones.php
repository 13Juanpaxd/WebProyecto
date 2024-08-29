<?php
$pageTitle = "Términos y Condiciones";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 

// Conectar a la base de datos
include 'db.php';

// Consulta para obtener todos los términos y condiciones
$sql = "SELECT titulo, contenido FROM recursos WHERE tipo_recurso = 'Terminos'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h1>Términos y Condiciones</h1>
        <p>Bienvenido a Red Social Emprendedores. Al acceder o usar nuestro sitio web, aceptas cumplir y estar sujeto a los siguientes términos y condiciones de uso. Si no estás de acuerdo con alguna parte de estos términos, no debes usar nuestro sitio web.</p>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="mb-4">
                    <h3 class="font-weight-bold"><?php echo htmlspecialchars($row['titulo']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['contenido'])); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay términos y condiciones disponibles en este momento.</p>
        <?php endif; ?>
    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="./js/script.js"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>