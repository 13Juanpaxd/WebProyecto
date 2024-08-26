<?php
$pageTitle = "Notificaciones";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-5">
        <h1>Notificaciones</h1>
        <div class="row">
        
            <div class="col-md-12 notification-card">
                <div class="card">
                    <div class="card-body">
                        <div class="notification-content">
                            <h5 class="card-title"><i class="fas fa-bell"></i> Notificación 1</h5>
                            <p class="card-text">Tienes una nueva solicitud de amistad.</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
           
            <div class="col-md-12 notification-card">
                <div class="card">
                    <div class="card-body">
                        <div class="notification-content">
                            <h5 class="card-title"><i class="fas fa-bell"></i> Notificación 2</h5>
                            <p class="card-text">Tu publicación fue comentada.</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-12 notification-card">
                <div class="card">
                    <div class="card-body">
                        <div class="notification-content">
                            <h5 class="card-title"><i class="fas fa-bell"></i> Notificación 3</h5>
                            <p class="card-text">Alguien mencionó tu nombre en una discusión.</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver</a>
                    </div>
                </div>
            </div>
            <!-- Añadir más notificaciones aquí -->
        </div>
    </div>

    <?php
    include './plantillas/footer.php';
    ?>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>

</body>
</html>
