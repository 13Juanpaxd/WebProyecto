<?php
$pageTitle = "Productos del Emprendimiento";
include './plantillas/header.php';
require 'db.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Obtener el ID del negocio desde la URL
$id_negocio = intval($_GET['id']);

// Obtener detalles del negocio
$sql_negocio = "SELECT * FROM negocios WHERE id_Negocio = $id_negocio";
$result_negocio = $conn->query($sql_negocio);
$negocio = $result_negocio->fetch_assoc();

// Obtener productos asociados al negocio
$sql_productos = "SELECT p.*, IFNULL(COUNT(mg.id_Me_Gusta), 0) AS cant_me_gusta
                  FROM productos p
                  LEFT JOIN me_gusta mg ON p.id_Producto = mg.cod_Producto
                  WHERE p.cod_Negocio = $id_negocio
                  GROUP BY p.id_Producto";
$result_productos = $conn->query($sql_productos);

// Obtener los "Me Gusta" del usuario
$cod_usuario = $_SESSION['username'];
$sql_likes = "SELECT cod_Producto FROM me_gusta WHERE cod_Usuario = '$cod_usuario'";
$result_likes = $conn->query($sql_likes);
$liked_products = [];
while ($like = $result_likes->fetch_assoc()) {
    $liked_products[] = $like['cod_Producto'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
        .btn-like.liked {
            background-color: #e64a19;
        }
        .btn-like:hover {
            background-color: #e64a19;
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ddd;
        }
        .like-count {
            font-size: 1rem;
            color: #666;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Botón para volver al negocio -->
        <a href="verEmprendimiento.php?id=<?php echo $id_negocio; ?>" class="btn btn-secondary mb-3">Volver al Negocio</a>

        <!-- Tarjeta principal de productos -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Productos del Negocio: <?php echo htmlspecialchars($negocio['nombre']); ?></h2>
            </div>
            <div class="card-body">
                <!-- Mostrar productos -->
                <div class="row">
                    <?php if ($result_productos->num_rows > 0) { ?>
                        <?php while ($producto = $result_productos->fetch_assoc()) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="<?php echo $producto['foto']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                        <p class="card-text">Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <form method="POST" action="like_producto.php?id=<?php echo $id_negocio; ?>">
                                            <input type="hidden" name="cod_Producto" value="<?php echo $producto['id_Producto']; ?>">
                                            <input type="hidden" name="cod_Usuario" value="<?php echo $cod_usuario; ?>">
                                            <button type="submit" class="btn-like <?php echo in_array($producto['id_Producto'], $liked_products) ? 'liked' : ''; ?>">
                                                <i class="fas fa-thumbs-up"></i> Me Gusta
                                            </button>
                                            <span class="like-count"><?php echo $producto['cant_me_gusta']; ?> Me Gusta</span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12">
                            <p>No hay productos disponibles para este emprendimiento.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_GET['liked'])) { ?>
                Swal.fire({
                    icon: 'success',
                    title: '¡Producto marcado como "Me Gusta"!',
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php } elseif (isset($_GET['already_liked'])) { ?>
                Swal.fire({
                    icon: 'info',
                    title: '¡Ya has marcado este producto como "Me Gusta"!',
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php } ?>
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>