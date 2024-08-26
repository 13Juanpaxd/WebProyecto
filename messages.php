<?php
$pageTitle = "Mensajes";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-5">
        <h1>Mensajes</h1>
        <div class="row">
            
            <div class="col-md-12 message-card">
                <div class="card">
                    <div class="card-body">
                        <div class="message-content">
                            <h5 class="card-title"><i class="fas fa-envelope"></i>  Usuario1</h5>
                            <p class="card-text">Hola, ¿cómo estás?</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Chat</a>
                    </div>
                </div>
            </div>
           
            <div class="col-md-12 message-card">
                <div class="card">
                    <div class="card-body">
                        <div class="message-content">
                            <h5 class="card-title"><i class="fas fa-envelope"></i>  Usuario2</h5>
                            <p class="card-text">¿Tienes algún plan para hoy?</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Chat</a>
                    </div>
                </div>
            </div>
       
            <div class="col-md-12 message-card">
                <div class="card">
                    <div class="card-body">
                        <div class="message-content">
                            <h5 class="card-title"><i class="fas fa-envelope"></i> Usuario3</h5>
                            <p class="card-text">Necesito ayuda con mi proyecto.</p>
                        </div>
                        <a href="#" class="btn btn-primary">Ver Chat</a>
                    </div>
                </div>
            </div>
      
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
