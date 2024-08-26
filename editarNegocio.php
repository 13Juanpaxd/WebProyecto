    <?php
$pageTitle = "Editar Negocio";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
include('db.php'); // Incluye la conexión a la base de datos

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtiene el ID del negocio desde la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idNegocio = intval($_GET['id']);
} else {
    header("Location: misNegocios.php"); // Redirige si el ID no es válido
    exit();
}

// Prepara y ejecuta la consulta para obtener los detalles del negocio
$query = "SELECT * FROM negocios WHERE id_Negocio = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idNegocio);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirige si no se encuentra el negocio
    header("Location: misNegocios.php");
    exit();
}

$negocio = $result->fetch_assoc();
$nombre = htmlspecialchars($negocio['nombre']);
$actividad = htmlspecialchars($negocio['actividad']);
$fechaFundacion = htmlspecialchars($negocio['fecha_Fundacion']);
$telefono = htmlspecialchars($negocio['telefono']);
$direccion = htmlspecialchars($negocio['direccion']);
$paginaWeb = htmlspecialchars($negocio['pagina_Web']);
$envio = htmlspecialchars($negocio['envios']);
$facebook = htmlspecialchars($negocio['facebook']);
$instagram = htmlspecialchars($negocio['instagram']);
$youtube = htmlspecialchars($negocio['youtube']);
$googleMaps = htmlspecialchars($negocio['google_Maps']);
$rutaFoto = htmlspecialchars($negocio['ruta_Foto']);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h2>Editar Negocio</h2>
        <form action="guardarEdicionNegocio.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $idNegocio; ?>">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto del Negocio:</label>
                <input type="file" id="foto" name="foto" class="form-control">
                <small class="form-text text-muted">Imagen actual: <img src="<?php echo $rutaFoto; ?>" alt="Foto Actual" style="width: 150px; height: auto;"></small>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Negocio:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="actividad" class="form-label">A qué se dedica:</label>
                <input type="text" id="actividad" name="actividad" class="form-control" value="<?php echo $actividad; ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fundacion" class="form-label">Fecha de Fundación:</label>
                <input type="date" id="fecha_fundacion" name="fecha_fundacion" class="form-control" value="<?php echo $fechaFundacion; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
            </div>
            <div class="mb-3">
                <label for="pagina_web" class="form-label">Página Web:</label>
                <input type="url" id="pagina_web" name="pagina_web" class="form-control" value="<?php echo $paginaWeb; ?>">
            </div>
            <div class="mb-3">
                <label for="envio" class="form-label">¿Hacen envíos a domicilio?</label>
                <select class="form-select" id="envio" name="envio">
                    <option value="si" <?php echo $envio === 'si' ? 'selected' : ''; ?>>Sí</option>
                    <option value="no" <?php echo $envio === 'no' ? 'selected' : ''; ?>>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Redes Sociales:</label>
                <div class="mb-2">
                    <label for="facebook" class="form-label">Facebook:</label>
                    <input type="url" id="facebook" name="facebook" class="form-control" value="<?php echo $facebook; ?>">
                </div>
                <div class="mb-2">
                    <label for="instagram" class="form-label">Instagram:</label>
                    <input type="url" id="instagram" name="instagram" class="form-control" value="<?php echo $instagram; ?>">
                </div>
                <div class="mb-2">
                    <label for="youtube" class="form-label">YouTube:</label>
                    <input type="url" id="youtube" name="youtube" class="form-control" value="<?php echo $youtube; ?>">
                </div>
                <div class="mb-2">
                    <label for="google_maps" class="form-label">Google Maps:</label>
                    <input type="url" id="google_maps" name="google_maps" class="form-control" value="<?php echo $googleMaps; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="guardarEdicionNegocio.php?id=<?php echo $idNegocio; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este negocio?');">Eliminar Negocio</a>
            <a href="misNegocios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>