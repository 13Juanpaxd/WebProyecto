<?php
session_start(); // Iniciar sesión al principio del archivo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Red Social Emprendedores</title>
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
        </div>
    </nav>

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white text-center">
                            <h3>Iniciar Sesión</h3>                            
                        </div>
                        <div>
                            <div class="text-center">
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['error']) . '</div>';
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>
                        </div>                            
                        <div class="card-body">                            
                            <form action="procesarLogin.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="olvidoContraseña.php">¿Olvidé mi contraseña?</a> | 
                            <a href="registro.php">¿No tienes una cuenta? Regístrate</a>
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