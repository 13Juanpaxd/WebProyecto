<?php
$pageTitle = "Políticas de Privacidad";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');

// Conectar a la base de datos
include 'db.php';

// Consulta para obtener la política de privacidad
$sql = "SELECT contenido FROM recursos WHERE tipo_recurso = 'Privacidad' LIMIT 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h1>Políticas de Privacidad</h1>
        <p>En Red Social Emprendedores, nos comprometemos a proteger tu privacidad. Esta política de privacidad explica cómo recopilamos, usamos y protegemos la información personal que nos proporcionas al usar nuestro sitio web.</p>

        <?php
        if ($result->num_rows > 0) {
            // Obtener el contenido de la política de privacidad
            $row = $result->fetch_assoc();
            echo $row['contenido']; // Mostrar el contenido HTML directamente
        } else {
            echo '<p>No hay información sobre la política de privacidad disponible en este momento.</p>';
        }
        ?>

    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="./js/script.js"></script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>