<?php
$pageTitle = "Emprendimientos";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
require 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Obtener todos los negocios
$sql_negocios = "SELECT * FROM negocios";
$result_negocios = $conn->query($sql_negocios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Red Social Emprendedores</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: .25rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: #fff;
            text-align: center;
            display: block;
            margin: 0 auto;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2 class="text-center">Emprendimientos</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    if ($result_negocios->num_rows > 0) {
                        while ($negocio = $result_negocios->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $negocio['ruta_Foto']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($negocio['nombre']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($negocio['nombre']); ?></h5>
                                <p class="card-text"><strong> Dueño:</strong> <?php echo htmlspecialchars($negocio['usuario_Dueno']); ?></p>
                                <p class="card-text"><strong>Fecha de Fundación:</strong> <?php echo htmlspecialchars($negocio['fecha_Fundacion']); ?></p>
                                <a href="verEmprendimiento.php?id=<?php echo $negocio['id_Negocio']; ?>" class="btn btn-info">Ver Emprendimiento</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p class='text-center'>No hay emprendimientos disponibles.</p>";
                    }
                    ?>
                </div>
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
