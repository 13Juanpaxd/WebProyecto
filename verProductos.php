<?php
$pageTitle = "Productos del Negocio";
include './plantillas/header.php'; 
 
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

// Consulta para obtener los productos del negocio
$query = "SELECT * FROM productos WHERE cod_Negocio = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idNegocio);
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}
?>

<!DOCTYPE html>
<html>
<style>
    .preview-img {
        max-height: 100px;
        display: none; /* Ocultar por defecto */
        margin-top: 10px;
    }
</style>
<body>    
    <div class="container mt-4">
        <h2>Productos del Negocio</h2>
        <button class="btn btn-success mb-4" data-bs-toggle="modal" 
        data-bs-target="#agregarProductoModal">Agregar Producto</button>
        <a href="misNegocios.php" class="btn btn-info mb-4">Volver a Mis Negocios</a>
        
        <?php if (empty($productos)): ?>
            <p>No hay productos registrados para este negocio.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $producto['foto'] ? 
                            $producto['foto'] : 'https://via.placeholder.com/150'; 
                            ?>" alt="Foto del Producto" class="card-img-top product-img">

                            <div class="card-body">
                                <h5 class="card-title"><?php 
                                echo htmlspecialchars($producto['nombre']); ?></h5>
                                <p class="card-text"><?php 
                                echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="card-text"><strong>Precio:
                                     ¢ </strong><?php echo htmlspecialchars
                                     ($producto['precio']); ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-primary" data-bs-toggle=
                                "modal" data-bs-target="#editarProductoModal" 
                                data-id="<?php echo $producto['id_Producto']; 
                                ?>">Editar</button>
                                <button class="btn btn-danger" onclick=
                                "eliminarProducto(<?php echo $producto['id_Producto']; 
                                ?>, <?php echo $idNegocio; ?>)">Eliminar</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal para Agregar Producto -->
    <div class="modal fade" id="agregarProductoModal" tabindex="-1" 
    aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="guardarProducto.php" method="POST" 
                enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarProductoModalLabel">
                            Agregar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" 
                        aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="cod_Negocio" 
                        value="<?php echo $idNegocio; ?>">
                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">
                                Nombre del Producto:</label>
                            <input type="text" id="nombreProducto" name=
                            "nombreProducto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcionProducto" class=
                            "form-label">Descripción:</label>
                            <textarea id="descripcionProducto" name=
                            "descripcionProducto" class="form-control" 
                            rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="precioProducto" class="form-label">
                                Precio:</label>
                            <input type="number" step="0.01" id="precioProducto" 
                            name="precioProducto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fotoProducto" class="form-label">Foto del Producto:</label>
                            <input type="file" id="fotoProducto" name="fotoProducto" class="form-control">
                            <img id="previewFoto" src="" alt="Previsualización de la foto" class="mt-2" style="max-height: 100px; display: none;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" 
                        data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Producto -->
    <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="guardarProducto.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="cod_Negocio" 
                        value="<?php echo $idNegocio; ?>">
                        <input type="hidden" name="id_Producto">
                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">Nombre del Producto:</label>
                            <input type="text" id="nombreProducto" name="nombreProducto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcionProducto" class="form-label">Descripción:</label>
                            <textarea id="descripcionProducto" name="descripcionProducto" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="precioProducto" class="form-label">Precio:</label>
                            <input type="number" step="0.01" id="precioProducto" name="precioProducto" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fotoProducto" class="form-label">Foto del Producto:</label>
                            <img id="fotoActualProducto" src="" alt="Foto actual del producto" class="img-fluid mb-2" style="max-height: 200px;">
                            <input type="file" id="fotoProducto" name="fotoProducto" class="form-control">
                            <input type="hidden" name="fotoActual"> <!-- Campo oculto para mantener la ruta de la foto actual -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
    <script>
        function eliminarProducto(idProducto, idNegocio) {
            if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                window.location.href = 'eliminarProducto.php?id=' + idProducto + '&id_negocio=' + idNegocio;
            }
        }

        document.querySelectorAll('[data-bs-target="#editarProductoModal"]').forEach(button => {
            button.addEventListener('click', () => {
                const productoId = button.getAttribute('data-id');
                // Hace una petición AJAX para obtener los detalles del producto
                fetch(`obtenerProducto.php?id=${productoId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error('Error:', data.error);
                        } else {
                            // Rellena el modal con los datos del producto
                            document.querySelector('#editarProductoModal input[name="id_Producto"]').value = data.id_Producto;
                            document.querySelector('#editarProductoModal input[name="nombreProducto"]').value = data.nombre;
                            document.querySelector('#editarProductoModal textarea[name="descripcionProducto"]').value = data.descripcion;
                            document.querySelector('#editarProductoModal input[name="precioProducto"]').value = data.precio;

                            // Muestra la foto actual
                            const fotoPath = data.foto ? data.foto : 'https://via.placeholder.com/150'; // Ruta de la foto actual o un placeholder si no existe
                            document.querySelector('#fotoActualProducto').src = fotoPath;
                            document.querySelector('#editarProductoModal input[name="fotoActual"]').value = data.foto; // Guardar la ruta de la foto actual en un campo oculto
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // JavaScript para manejar la previsualización de la imagen
        document.getElementById('fotoProducto').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImg = document.getElementById('previewFoto');
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block'; // Muestra la imagen de previsualización
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>