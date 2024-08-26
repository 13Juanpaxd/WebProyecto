<?php
$pageTitle = "Emprendimientos";
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
                <h2>Emprendimientos</h2>
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Emprendimiento 1">
                        <div class="card-body">
                            <h5 class="card-title">Emprendimiento 1</h5>
                            <p class="card-text">Descripción del emprendimiento 1.</p>
                            <a href="#" class="btn btn-success">Seguir Emprendimiento</a>
                            <a href="verEmprendimiento.php?id=1" class="btn btn-info">Ver Emprendimiento</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Emprendimiento 2">
                        <div class="card-body">
                            <h5 class="card-title">Emprendimiento 2</h5>
                            <p class="card-text">Descripción del emprendimiento 2.</p>
                            <a href="#" class="btn btn-success">Seguir Emprendimiento</a>
                            <a href="verEmprendimiento.php?id=2" class="btn btn-info">Ver Emprendimiento</a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Emprendimiento 3">
                        <div class="card-body">
                            <h5 class="card-title">Emprendimiento 3</h5>
                            <p class="card-text">Descripción del emprendimiento 3.</p>
                            <a href="#" class="btn btn-success">Seguir Emprendimiento</a>
                            <a href="verEmprendimiento.php?id=3" class="btn btn-info">Ver Emprendimiento</a>
                        </div>
                    </div>
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