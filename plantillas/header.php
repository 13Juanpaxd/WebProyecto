<?php
require 'db.php';
include('session.php');

$current_user = $_SESSION['username']; // Usuario actual

// Contar mensajes no leídos
$sql_notificaciones = "SELECT COUNT(*) as no_leidos FROM mensajes 
                      WHERE id_Usuario_recibe = '$current_user' AND leido = 'No'";
$result_notificaciones = $conn->query($sql_notificaciones);
$row_notificaciones = $result_notificaciones->fetch_assoc();
$mensajes_no_leidos = $row_notificaciones['no_leidos'];

// Establecer el texto a mostrar (si hay más de 99 mensajes no leídos, mostrar 99+)
$badge_text = $mensajes_no_leidos > 99 ? '99+' : $mensajes_no_leidos;





// Obtener las IDs de negocios que el usuario posee
$sql_negocios = "SELECT id_Negocio FROM negocios WHERE usuario_Dueno = '$current_user'";
$result_negocios = $conn->query($sql_negocios);
$negocios_ids = [];
while ($row = $result_negocios->fetch_assoc()) {
    $negocios_ids[] = $row['id_Negocio'];
}

// Si no hay negocios, no hay notificaciones
if (empty($negocios_ids)) {
    $num_notificaciones = 0;
} else {
    $negocios_ids_list = implode(',', $negocios_ids);

    // Contar notificaciones no vistas
    $sql_count_notificaciones = "SELECT COUNT(*) AS num_notificaciones
                                 FROM me_gusta m
                                 JOIN productos p ON m.cod_Producto = p.id_Producto
                                 JOIN negocios n ON p.cod_Negocio = n.id_Negocio
                                 WHERE n.id_Negocio IN ($negocios_ids_list) AND m.visto = 0";
    $result_count_notificaciones = $conn->query($sql_count_notificaciones);
    $count_row = $result_count_notificaciones->fetch_assoc();
    $num_notificaciones = $count_row['num_notificaciones'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Red Social Emprendedores</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .nav-item .badge-counter {
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 0.75rem;
        }
        .btn-icon {
            font-size: 1.5rem;
            color: #ffffff; /* Ajusta el color del ícono si es necesario */
        }
        .nav-link {
            position: relative;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="emprendedores.php">
                <img src="./images/logo.png" alt="Logo" class="logo">
                Red Social Emprendedores
                
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Mi Perfil - <?php echo $current_user; ?> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emprendedores.php">Emprendedores</a>
                    </li>
                  
                    <li class="nav-item position-relative">
                    <li class="nav-item notification-icon">
                <a class="nav-link" href="notificaciones.php">
                    <i class="fas fa-bell"></i>
                    <?php if ($num_notificaciones > 0): ?>
                        <span class="badge rounded-pill bg-danger badge-counter ms-2""><?php echo $num_notificaciones; ?></span>
                    <?php endif; ?>
                </a>
            </li>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="messages.php">
                            <i class="fas fa-envelope"></i> <!-- Ícono de mensaje -->
                            <?php if ($mensajes_no_leidos > 0): ?>
                                <span class="badge rounded-pill bg-danger badge-counter ms-2"><?php echo $badge_text; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="salir.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>

<?php
$conn->close();
?>
