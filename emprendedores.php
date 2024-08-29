<?php
$pageTitle = "Emprendimientos";
include './plantillas/header.php';

// Conectar a la base de datos
require 'db.php';

// Inicializar la variable de búsqueda
$searchTerm = "";

// Verificar si se ha enviado una palabra clave de búsqueda
if (isset($_GET['search'])) {
    $searchTerm = $conn->real_escape_string($_GET['search']);
}

// Consulta para obtener negocios filtrados por la palabra clave de búsqueda
$sql_negocios = "SELECT * FROM negocios WHERE nombre LIKE '%$searchTerm%' OR actividad LIKE '%$searchTerm%'";
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
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.75rem;
        }
        .card-text {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: #fff;
            padding: 0.3rem 1rem;
            font-size: 0.9rem;
            display: inline-block;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        /* Ajustes para el formulario de búsqueda */
        .search-form {
            width: 100%;
            max-width: 700px;
            margin: 0 auto 20px;
        }
        .clear-btn {
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 1.5rem;
            line-height: 1;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Formulario de búsqueda -->
        <form class="search-form mb-4" method="GET" action="emprendedores.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar emprendimientos..." name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <?php if ($searchTerm != ""): ?>
                        <button class="clear-btn" onclick="window.location.href='emprendedores.php'" type="button">&times;</button>
                    <?php endif; ?>
                </div>
            </div>
        </form>

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
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <img src="<?php echo $negocio['ruta_Foto']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($negocio['nombre']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($negocio['nombre']); ?></h5>
                                <p class="card-text"><strong>Dueño:</strong> <?php echo htmlspecialchars($negocio['usuario_Dueno']); ?></p>
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