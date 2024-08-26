<?php
$pageTitle = "Feed";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Perfil" class="profile-pic">
                <h2>Nombre del Usuario</h2>
            </div>
            <p class="description">Descripción de la foto</p>
            <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 1" class="card-img single-img">
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Perfil" class="profile-pic">
                <h2>Nombre del Usuario</h2>
            </div>
            <p class="description">Descripción de las fotos</p>
            <div class="card-images grid-3">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 1" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 2" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 3" class="card-img">
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Perfil" class="profile-pic">
                <h2>Nombre del Usuario</h2>
            </div>
            <p class="description">Descripción de las fotos</p>
            <div class="card-images grid-2x2">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 1" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 2" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 3" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 4" class="card-img">
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Perfil" class="profile-pic">
                <h2>Nombre del Usuario</h2>
            </div>
            <p class="description">Descripción de las fotos</p>
            <div class="card-images grid-2x2">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 1" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 2" class="card-img">
                <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 3" class="card-img">
                <div class="more">
                    <img src="https://cdn.vectorstock.com/i/500p/35/52/placeholder-rgb-color-icon-vector-32173552.jpg" alt="Imagen 4" class="card-img">
                    <div class="overlay">+1</div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>