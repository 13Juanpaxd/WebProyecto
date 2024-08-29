<?php
$pageTitle = "Ver Negocio";
include './plantillas/header.php'; // Incluyendo el archivo de sesión para proteger la página
 
include('db.php'); 

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtiene el ID del negocio desde la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idNegocio = intval($_GET['id']);
} else {
    header("Location: misNegocios.php");
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
$descripcion = htmlspecialchars($negocio['actividad']);
$fechaFundacion = htmlspecialchars($negocio['fecha_Fundacion']);
$telefono = htmlspecialchars($negocio['telefono']);
$direccion = htmlspecialchars($negocio['direccion']);
$paginaWeb = htmlspecialchars($negocio['pagina_Web']);
$envios = htmlspecialchars($negocio['envios']);
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
        <h2>Detalles del Negocio</h2>
        <div class="card mb-4">
            <img src="<?php echo $rutaFoto ? $rutaFoto : 'https://via.placeholder.com/400x200'; ?>" height="600px" alt="Foto del Negocio" class="card-img-top">
            <div class="p-5">
                <h5 class="card-title"><?php echo $nombre; ?></h5>
                <div class="mb-2"><strong>Descripción:</strong> <?php echo $descripcion; ?></div>
                <div class="mb-2"><strong>A qué se dedica:</strong> <?php echo $descripcion; ?></div>
                <div class="mb-2"><strong>Fecha de Fundación:</strong> <?php echo $fechaFundacion; ?></div>
                <div class="mb-2"><strong>Teléfono:</strong> <?php echo $telefono; ?></div>
                <div class="mb-2"><strong>Dirección:</strong> <?php echo $direccion; ?></div>
                <div class="mb-2"><strong>Página Web:</strong> <a href="<?php echo $paginaWeb; ?>" target="_blank"><?php echo $paginaWeb; ?></a></div>
                <div class="mb-2"><strong>Envíos a Domicilio:</strong> <?php echo $envios === 'si' ? 'Sí' : 'No'; ?></div>
                <div class="mb-2"><strong>Redes Sociales:</strong></div>
                <ul>
                    <?php if (!empty($facebook)): ?>
                        <li><a href="<?php echo $facebook; ?>" target="_blank">Facebook</a></li>
                    <?php endif; ?>
                    <?php if (!empty($instagram)): ?>
                        <li><a href="<?php echo $instagram; ?>" target="_blank">Instagram</a></li>
                    <?php endif; ?>
                    <?php if (!empty($youtube)): ?>
                        <li><a href="<?php echo $youtube; ?>" target="_blank">YouTube</a></li>
                    <?php endif; ?>
                    <?php if (!empty($googleMaps)): ?>
                        <li><a href="<?php echo $googleMaps; ?>" target="_blank">Google Maps</a></li>
                    <?php endif; ?>
                </ul>
                <div class="text-center">
                    <a href="editarNegocio.php?id=<?php echo $idNegocio; ?>" class="btn btn-primary">Editar Negocio</a>                    
                    <a href="verProductos.php?id=<?php echo $idNegocio; ?>" class="btn btn-secondary">Productos</a>
                    <a href="misNegocios.php" class="btn btn-warning">Volver a Mis Negocios</a>                
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