<?php
$pageTitle = "Detalles del Emprendimiento";
include './plantillas/header.php';
require 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Obtener el ID del negocio desde la URL
$id_negocio = intval($_GET['id']);

// Obtener detalles del negocio
$sql_negocio = "SELECT * FROM negocios WHERE id_Negocio = $id_negocio";
$result_negocio = $conn->query($sql_negocio);
$negocio = $result_negocio->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Red Social Emprendedores</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .btn-like {
            background-color: #ff5722;
            color: #fff;
            border: none;
            padding: .375rem .75rem;
            border-radius: .25rem;
            cursor: pointer;
        }
        .btn-like:hover {
            background-color: #e64a19;
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2><?php echo htmlspecialchars($negocio['nombre']); ?></h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="<?php echo $negocio['ruta_Foto']; ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($negocio['nombre']); ?>">
                    </div>
                    <div class="col-md-8 mb-4">
                        <h3>Información del Negocio</h3>
                        <p><strong>Usuario Dueño:</strong> <?php echo htmlspecialchars($negocio['usuario_Dueno']); ?></p>
                        <p><strong>Fecha de Fundación:</strong> <?php echo htmlspecialchars($negocio['fecha_Fundacion']); ?></p>
                        <p><strong>Actividad:</strong> <?php echo htmlspecialchars($negocio['actividad']); ?></p>
                        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($negocio['telefono']); ?></p>
                        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($negocio['direccion']); ?></p>
                        <p><strong>Página Web:</strong> <a href="<?php echo htmlspecialchars($negocio['pagina_Web']); ?>" target="_blank"><?php echo htmlspecialchars($negocio['pagina_Web']); ?></a></p>
                        <p><strong>Redes Sociales:</strong></p>
                        <p><a href="<?php echo htmlspecialchars($negocio['facebook']); ?>" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></p>
                        <p><a href="<?php echo htmlspecialchars($negocio['instagram']); ?>" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></p>
                        <p><a href="<?php echo htmlspecialchars($negocio['youtube']); ?>" target="_blank"><i class="fab fa-youtube"></i> YouTube</a></p>
                        <p><a href="<?php echo htmlspecialchars($negocio['google_Maps']); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i> Ver en Google Maps</a></p>
                    </div>
                </div>
                <hr class="separator">
                <a href="productos.php?id=<?php echo $id_negocio; ?>" class="btn btn-primary">Ver Productos</a>
            </div>
        </div>
    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>