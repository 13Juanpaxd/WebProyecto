<?php
$pageTitle = "Mensajes";
include './plantillas/header.php';

// Database connection
// Incluir archivo de conexión a la base de datos
require 'db.php';

// Obtener conversaciones del usuario actual
$sql = "SELECT DISTINCT IF(id_Usuario_envia = '$current_user', id_Usuario_recibe, id_Usuario_envia) as contacto 
        FROM mensajes 
        WHERE id_Usuario_envia = '$current_user' OR id_Usuario_recibe = '$current_user'";
$contactos_result = $conn->query($sql);

// Crear un array con los contactos existentes
$contactos = [];
if ($contactos_result->num_rows > 0) {
    while ($row = $contactos_result->fetch_assoc()) {
        $contactos[] = $row['contacto'];
    }
}

// Obtener la lista de todos los usuarios menos el actual y los contactos existentes
$sql_usuarios = "SELECT username FROM usuarios WHERE username != '$current_user' AND username NOT IN ('" . implode("','", $contactos) . "')";
$usuarios_result = $conn->query($sql_usuarios);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .message-card {
            position: relative;
        }
        .message-card .btn-info {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Mensajes</h1>
        <!-- Botón para abrir modal de nuevo mensaje -->
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#nuevoMensajeModal" <?php if($usuarios_result->num_rows == 0) { echo 'disabled'; } ?>>
            <i class="fas fa-plus"></i> Nuevo Mensaje
        </button>

        <div class="row">
            <?php
            if (!empty($contactos)) {
                foreach ($contactos as $contacto) {
            ?>
            <div class="col-md-12 message-card">
                <div class="card">
                    <div class="card-body">
                        <div class="message-content">
                            <h5 class="card-title"><i class="fas fa-envelope"></i> <?php echo $contacto; ?></h5>
                        </div>
                        <!-- Botón para ver la conversación -->
                        <a href="ver_chat.php?usuario=<?php echo $contacto; ?>" class="btn btn-info ">
                            <i class="fas fa-envelope-open-text"></i> Ver
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No tienes conversaciones.</p>";
            }
            ?>
        </div>
    </div>

    <?php include './plantillas/footer.php'; ?>
    
    <!-- Modal para enviar nuevo mensaje -->
    <div class="modal fade" id="nuevoMensajeModal" tabindex="-1" role="dialog" aria-labelledby="nuevoMensajeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevoMensajeModalLabel">Enviar Nuevo Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="enviar_mensaje.php">
                        <div class="form-group">
                            <label for="id_Usuario_recibe">Seleccionar Usuario Destinatario:</label>
                            <select class="form-control" id="id_Usuario_recibe" name="id_Usuario_recibe" required>
                                <?php
                                if ($usuarios_result->num_rows > 0) {
                                    while ($row = $usuarios_result->fetch_assoc()) {
                                        echo "<option value='{$row['username']}'>{$row['username']}</option>";
                                    }
                                } else {
                                    echo "<option>No hay usuarios disponibles</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
