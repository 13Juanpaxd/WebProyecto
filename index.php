<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Red Social Emprendedores</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://www.w3.org/html/logo/downloads/HTML5_1Color_White.png" alt="Logo" class="logo">
                Red Social Emprendedores
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
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

    <div class="container mt-5 d-flex">
        <div id="carouselImages" class="carousel slide" data-bs-ride="carousel" style="width: 50%;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg" class="d-block w-100" alt="Empresaria">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/618613/pexels-photo-618613.jpeg" class="d-block w-100" alt="Empresario">
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/1652295/pexels-photo-1652295.jpeg" class="d-block w-100" alt="Cafetería">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <div class="text-center" style="width: 50%; margin-left: 20px;">
            <h1>Bienvenido a Red Social Emprendedores</h1>
            <h2>Somos la red social que conecta negocios con clientes</h2>
            <p>Conéctate con emprendedores y usuarios, comparte tus ideas y crece juntos.</p>
            <div class="mt-4">
                <a href="login.php" class="btn btn-primary btn-lg">Iniciar Sesión</a>
                <a href="registro.php" class="btn btn-secondary btn-lg">Registrarse</a>
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
