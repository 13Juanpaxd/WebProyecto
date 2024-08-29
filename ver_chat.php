<?php
include './plantillas/header.php';

require 'db.php';


$current_user = $_SESSION['username'];
$usuario_destino = $_GET['usuario'];

// Actualizar el estado de los mensajes no leídos de esta conversación a "Si"
$sql_update_leido = "UPDATE mensajes 
                     SET leido = 'Si' 
                     WHERE id_Usuario_recibe = '$current_user' 
                     AND id_Usuario_envia = '$usuario_destino' 
                     AND leido = 'No'";

if ($conn->query($sql_update_leido) === FALSE) {
    echo "Error al actualizar el estado de los mensajes: " . $conn->error;
}

// Obtener mensajes entre el usuario actual y el destinatario en orden de creación
$sql_mensajes = "SELECT * FROM mensajes 
                 WHERE (id_Usuario_envia = '$current_user' AND id_Usuario_recibe = '$usuario_destino') 
                 OR (id_Usuario_envia = '$usuario_destino' AND id_Usuario_recibe = '$current_user') 
                 ORDER BY hora_Fecha ASC";

$result_mensajes = $conn->query($sql_mensajes);
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-5">
        <h1>Conversación con <?php echo $usuario_destino; ?></h1>

        <div class="row">
            <?php
            if ($result_mensajes->num_rows > 0) {
                while ($row = $result_mensajes->fetch_assoc()) {
                    $mensaje = $row['mensaje'];
                    $fecha = $row['hora_Fecha'];
                    $enviado_por = $row['id_Usuario_envia'];
            ?>
            <div class="col-md-12">
                <div class="alert alert-<?php echo $enviado_por == $current_user ? 'primary' : 'secondary'; ?>" role="alert">
                    <strong><?php echo $enviado_por == $current_user ? 'Tú' : $usuario_destino; ?>:</strong> <?php echo $mensaje; ?><br>
                    <small class="text-muted"><?php echo $fecha; ?></small>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No hay mensajes en esta conversación.</p>";
            }
            ?>
        </div>

        <!-- Formulario para responder al mensaje -->
        <div class="row">
            <form method="POST" action="enviar_respuesta.php">
                <input type="hidden" name="id_Usuario_recibe" value="<?php echo $usuario_destino; ?>">
                <div class="form-group">
                    <label for="mensaje">Responder:</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
            </form>
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