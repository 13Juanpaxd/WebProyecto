<?php
$pageTitle = "Notificaciones";
include './plantillas/header.php';
require 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Obtener el ID del usuario (debe estar en la sesión)
$cod_Usuario = $_SESSION['username'];

// Obtener las IDs de negocios y productos que el usuario posee
$sql_negocios = "SELECT id_Negocio FROM negocios WHERE usuario_Dueno = '$cod_Usuario'";
$result_negocios = $conn->query($sql_negocios);
$negocios_ids = [];
while ($row = $result_negocios->fetch_assoc()) {
    $negocios_ids[] = $row['id_Negocio'];
}

// Si no hay negocios, no hay notificaciones
if (empty($negocios_ids)) {
    $notificaciones = [];
} else {
    $negocios_ids_list = implode(',', $negocios_ids);

    // Obtener notificaciones de likes (tanto vistas como no vistas)
    $sql_notificaciones = "SELECT p.nombre AS producto_nombre, p.foto AS producto_foto, m.fecha_Hora, m.visto, u.username AS usuario_like
                           FROM me_gusta m
                           JOIN productos p ON m.cod_Producto = p.id_Producto
                           JOIN usuarios u ON m.cod_Usuario = u.username
                           JOIN negocios n ON p.cod_Negocio = n.id_Negocio
                           WHERE n.id_Negocio IN ($negocios_ids_list)
                           ORDER BY m.fecha_Hora DESC";
    $result_notificaciones = $conn->query($sql_notificaciones);

    // Marcar todas las notificaciones como vistas (opcional)
    $update_sql = "UPDATE me_gusta m
                   JOIN productos p ON m.cod_Producto = p.id_Producto
                   SET m.visto = 1
                   WHERE p.cod_Negocio IN ($negocios_ids_list) AND m.visto = 0";
    $conn->query($update_sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Red Social Emprendedores</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $pageTitle; ?></h1>
        <div class="row">
            <?php if (!empty($result_notificaciones) && $result_notificaciones->num_rows > 0): ?>
                <?php while ($notificacion = $result_notificaciones->fetch_assoc()): ?>
                    <div class="col-md-12 mb-3">
                        <div class="card <?php echo $notificacion['visto'] ? 'bg-light' : 'bg-warning'; ?>">
                            <div class="card-body d-flex align-items-center">
                                <img src="<?php echo $notificacion['producto_foto']; ?>" class="img-thumbnail mr-3" style="width: 100px; height: 100px; object-fit: cover;" alt="<?php echo htmlspecialchars($notificacion['producto_nombre']); ?>">
                                <div>
                                    <h5 class="card-title"><?php echo htmlspecialchars($notificacion['usuario_like']); ?> te dio un like en <?php echo htmlspecialchars($notificacion['producto_nombre']); ?></h5>
                                    <p class="card-text">Recibiste un nuevo like el <?php echo htmlspecialchars($notificacion['fecha_Hora']); ?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No tienes notificaciones nuevas.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
