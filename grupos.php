<?php
$pageTitle = "Grupos";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Grupos</h2>
            </div>
            <div class="card-body">
                <div class="card-deck">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Grupo 1">
                        <div class="card-body">
                            <h5 class="card-title">Grupo 1</h5>
                            <p class="card-text"><br><br>Descripción del grupo 1.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Grupo 2">
                        <div class="card-body">
                            <h5 class="card-title">Grupo 2</h5>
                            <p class="card-text"><br><br>Descripción del grupo 2</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Grupo 3">
                        <div class="card-body">
                            <h5 class="card-title">Grupo 3</h5><br>
                            <p class="card-text"><br><br>Descripción del grupo 3.</p>
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
