<?php
$pageTitle = "Mis Negocios";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
include('db.php'); // Incluye la conexión a la base de datos

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtiene el nombre de usuario de la sesión
$usuarioDueno = $_SESSION['username'];

// Prepara y ejecuta la consulta para obtener los negocios del usuario
$query = "SELECT * FROM negocios WHERE usuario_Dueno = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $usuarioDueno);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <h2>Mis Negocios</h2>
        <div class="row">
            <?php
            // Recorre los resultados y muestra cada negocio
            while ($row = $result->fetch_assoc()) {
                $idNegocio = $row['id_Negocio'];
                $nombre = htmlspecialchars($row['nombre']);
                $descripcion = htmlspecialchars($row['actividad']);
                $rutaFoto = htmlspecialchars($row['ruta_Foto']);
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo $rutaFoto ? $rutaFoto : 'https://via.placeholder.com/150'; ?>" alt="Foto del Negocio" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $nombre; ?></h4>
                            <p class="card-text"><?php echo $descripcion; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="editarNegocio.php?id=<?php echo $idNegocio; ?>" class="btn btn-primary">Editar o Eliminar</a>
                            <a href="verNegocio.php?id=<?php echo $idNegocio; ?>" class="btn btn-secondary">Ver Detalles</a>
                            <a href="verProductos.php?id=<?php echo $idNegocio; ?>" class="btn btn-secondary">Productos</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <a href="registrarNegocio.php" class="btn btn-success">Registrar un Nuevo Negocio</a>
        <a href="perfil.php" class="btn btn-info">Volver a Mi Perfil</a>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>