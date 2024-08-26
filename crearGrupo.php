<?php
$pageTitle = "Crear Grupo";
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
                <h2>Crear Grupo</h2>
            </div>
            <div class="card-body">
                <form action="guardarGrupo.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombreGrupo" class="form-label">Nombre del Grupo</label>
                        <input type="text" class="form-control" id="nombreGrupo" name="nombreGrupo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionGrupo" class="form-label">Descripción del Grupo</label>
                        <textarea class="form-control" id="descripcionGrupo" name="descripcionGrupo" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagenGrupo" class="form-label">Imagen de Portada</label>
                        <input type="file" class="form-control" id="imagenGrupo" name="imagenGrupo" required>
                    </div>
                    <div class="mb-3">
                        <label for="privacidadGrupo" class="form-label">Privacidad del Grupo</label>
                        <select class="form-control" id="privacidadGrupo" name="privacidadGrupo" required>
                            <option value="publico">Público</option>
                            <option value="privado">Privado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Grupo</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>
