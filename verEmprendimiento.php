<?php
$pageTitle = "Ver Emprendimiento";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
?>

<!DOCTYPE html>
<html>
<Body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/300" class="profile-pic-large" alt="Emprendimiento">
            </div>
            <div class="col-md-8">
                <h2>Nombre del Emprendimiento</h2>
                <p>Descripción detallada del emprendimiento. Aquí puedes agregar más información sobre el emprendimiento, su misión, visión, servicios, y cualquier otro detalle relevante.</p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Publicaciones del Emprendimiento</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 1">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 2">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 3">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 4">
                </div>
                <!-- Agrega más publicaciones según sea necesario -->
            </div>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>
