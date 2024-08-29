<?php
$pageTitle = "Gestionar Recursos";
include './plantillas/header.php';
 

// Conectar a la base de datos
require 'db.php';

// Obtener los recursos de la base de datos
$query = "SELECT * FROM recursos";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4"><?php echo $pageTitle; ?></h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php
                switch ($_GET['success']) {
                    case 'add':
                        echo "Recurso agregado exitosamente.";
                        break;
                    case 'edit':
                        echo "Recurso editado exitosamente.";
                        break;
                    case 'delete':
                        echo "Recurso eliminado exitosamente.";
                        break;
                }
                ?>
            </div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?php
                switch ($_GET['error']) {
                    case 'add':
                        echo "Error al agregar el recurso.";
                        break;
                    case 'edit':
                        echo "Error al editar el recurso.";
                        break;
                    case 'delete':
                        echo "Error al eliminar el recurso.";
                        break;
                    case 'no_id':
                        echo "No se ha proporcionado un ID para eliminar.";
                        break;
                }
                ?>
            </div>
        <?php endif; ?>

        <!-- Filtro por tipo de recurso -->
        <div class="form-group mb-4">
            <label for="filterType">Filtrar por Tipo de Recurso</label>
            <select class="form-control" id="filterType">
                <option value="">Todos</option>
                <option value="Articulo">Artículo</option>
                <option value="Video">Video</option>
                <option value="FAQ">FAQ</option>
                <option value="Privacidad">Privacidad</option>
                <option value="Terminos">Términos</option>
            </select>
        </div>

        <!-- Botón para agregar recurso -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addResourceModal">Agregar Recurso</button>

        <!-- Tabla de recursos -->
        <table class="table table-bordered" id="resourcesTable">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Tipo de Recurso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($row['tipo_recurso']); ?></td>
                        <td>
                            <!-- Botones de editar y eliminar -->
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editResourceModal" data-id="<?php echo $row['id_Recurso']; ?>" data-titulo="<?php echo htmlspecialchars($row['titulo']); ?>" data-autor="<?php echo htmlspecialchars($row['autor']); ?>" data-contenido="<?php echo htmlspecialchars($row['contenido']); ?>" data-fecha="<?php echo htmlspecialchars($row['fecha_Publicacion']); ?>" data-tipo="<?php echo htmlspecialchars($row['tipo_recurso']); ?>">Editar</button>
                            <a href="eliminarRecurso.php?id=<?php echo $row['id_Recurso']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este recurso?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar recurso -->
    <div class="modal fade" id="addResourceModal" tabindex="-1" role="dialog" aria-labelledby="addResourceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addResourceModalLabel">Agregar Recurso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addResourceForm" action="agregarRecurso.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor">
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="fecha_Publicacion">Fecha de Publicación</label>
                            <input type="date" class="form-control" id="fecha_Publicacion" name="fecha_Publicacion" required>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_recurso">Tipo de Recurso</label>
                            <select class="form-control" id="tipo_recurso" name="tipo_recurso" required>
                                <option value="">Selecciona un tipo</option>
                                <option value="Articulo">Artículo</option>
                                <option value="Video">Video</option>
                                <option value="FAQ">FAQ</option>
                                <option value="Privacidad">Privacidad</option>
                                <option value="Terminos">Términos</option>
                            </select>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para editar recurso -->
    <div class="modal fade" id="editResourceModal" tabindex="-1" role="dialog" aria-labelledby="editResourceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editResourceModalLabel">Editar Recurso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editResourceForm" action="editarRecurso.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="editResourceId" name="id">
                        <div class="form-group">
                            <label for="editTitulo">Título</label>
                            <input type="text" class="form-control" id="editTitulo" name="titulo" required>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="editAutor">Autor</label>
                            <input type="text" class="form-control" id="editAutor" name="autor">
                        </div>
                        <div class="form-group">
                            <label for="editContenido">Contenido</label>
                            <textarea class="form-control" id="editContenido" name="contenido" rows="3" required></textarea>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="editFecha_Publicacion">Fecha de Publicación</label>
                            <input type="date" class="form-control" id="editFecha_Publicacion" name="fecha_Publicacion" required>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="editTipoRecurso">Tipo de Recurso</label>
                            <select class="form-control" id="editTipoRecurso" name="tipo_recurso" required>
                                <option value="">Selecciona un tipo</option>
                                <option value="Articulo">Artículo</option>
                                <option value="Video">Video</option>
                                <option value="FAQ">FAQ</option>
                                <option value="Privacidad">Privacidad</option>
                                <option value="Terminos">Términos</option>
                            </select>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap, jQuery, y DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTables
            var table = $('#resourcesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });

            // Filtrar por tipo de recurso
            $('#filterType').on('change', function() {
                var filterValue = $(this).val();
                table.column(1).search(filterValue).draw();
            });

            // Llenar el modal de edición con los datos del recurso seleccionado
            $('#editResourceModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var titulo = button.data('titulo');
                var autor = button.data('autor');
                var contenido = button.data('contenido');
                var fecha = button.data('fecha');
                var tipo = button.data('tipo');

                var modal = $(this);
                modal.find('#editResourceId').val(id);
                modal.find('#editTitulo').val(titulo);
                modal.find('#editAutor').val(autor);
                modal.find('#editContenido').val(contenido);
                modal.find('#editFecha_Publicacion').val(fecha);
                modal.find('#editTipoRecurso').val(tipo);
            });

            // Validar formularios antes de enviarlos
            function validateForm(formId) {
                var form = $(formId)[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(formId).addClass('was-validated');
            }

            $('#addResourceForm').on('submit', function(event) {
                validateForm('#addResourceForm');
            });

            $('#editResourceForm').on('submit', function(event) {
                validateForm('#editResourceForm');
            });
        });
    </script>

    <?php
        include './plantillas/footer.php';
    ?>
</body>
</html>