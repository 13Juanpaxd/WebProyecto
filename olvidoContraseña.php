<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña - Red Social Emprendedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b028410953.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="Logo" class="logo">
                Red Social Emprendedores
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registrarse</a>
                    </li>       
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white text-center">
                            <h3>Recuperación de Contraseña</h3>                            
                        </div>
                        <div class="text-center">
                            <p>Ingresa el correo electrónico con el que te registraste 
                                y te enviaremos instrucciones para recuperar tu contraseña</p>
                        </div>
                        <div>
                            <?php
                            session_start();
                            if (isset($_SESSION['error'])) {
                                echo '<div class="alert alert-danger" 
                                role="alert">' . $_SESSION['error'] . '</div>';
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['message'])) {
                                echo '<div class="alert alert-success" 
                                role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>
                        <div class="card-body">                            
                            <form action="procesarRecuperacion.php" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Enviar Instrucciones</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="login.php">Regresar al inicio de sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer fixed-bottom bg-dark text-white">
        <div class="container text-center">
            <p>© <?php echo date('Y'); ?> Red Social Emprendedores. Todos los derechos reservados</p>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>
</html>