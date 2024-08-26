<?php
$pageTitle = "Mi Perfil";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
?>

<!DOCTYPE html>
<html>
<Body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Registrar un Negocio</h2>
            </div>
            <div class="card-body">
                <form action="procesarRegistroNegocio.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto del Negocio:</label>
                        <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Negocio:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="actividad" class="form-label">Actividad:</label>
                        <input type="text" id="actividad" name="actividad" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fundacion" class="form-label">Fecha de Fundación:</label>
                        <input type="date" id="fecha_fundacion" name="fecha_fundacion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pagina_web" class="form-label">Página Web:</label>
                        <input type="url" id="pagina_web" name="pagina_web" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="envios" class="form-label">¿Hacen envíos a domicilio?</label>
                        <select class="form-select" id="envios" name="envios" required>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <h5>Redes Sociales:</h5>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook:</label>
                        <input type="url" id="facebook" name="facebook" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram:</label>
                        <input type="url" id="instagram" name="instagram" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">YouTube:</label>
                        <input type="url" id="youtube" name="youtube" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="google_maps" class="form-label">Google Maps:</label>
                        <input type="url" id="google_maps" name="google_maps" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar Negocio</button>
                    <a href="misNegocios.php" class="btn btn-danger">Cancelar</a>
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