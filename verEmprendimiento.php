<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Emprendimiento - Red Social Emprendedores</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
        .profile-pic-large {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }
        .grid-item {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .grid-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="perfil.php">Mi Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="emprendedores.php">Emprendedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="grupos.php">Grupos</a></li>
                    <li class="nav-item"><a class="nav-link" href="notificaciones.php">Notificaciones</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/300" class="profile-pic-large" alt="Emprendimiento">
            </div>
            <div class="col-md-8">
                <h2>Nombre del Emprendimiento</h2>
                <p>Descripción detallada del emprendimiento. Aquí puedes agregar más información sobre el emprendimiento, su misión, visión, servicios, y cualquier otro detalle relevante.</p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Publicaciones del Emprendimiento</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 1">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 2">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 3">
                </div>
                <div class="grid-item">
                    <img src="https://via.placeholder.com/100" alt="Publicación 4">
                </div>
                <!-- Agrega más publicaciones según sea necesario -->
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Recursos y Herramientas</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="footer-link" href="noticias.php">Noticias</a></li>
                        <li class="mb-2"><a class="footer-link" href="articulos.php">Artículos</a></li>
                        <li class="mb-2"><a class="footer-link" href="videos.php">Videos</a></li>
                        <li class="mb-2"><a class="footer-link" href="plantillas.php">Plantillas</a></li>
                        <li class="mb-2"><a class="footer-link" href="eventos.php">Eventos</a></li>
                        <li class="mb-2"><a class="footer-link" href="mentorias.php">Mentorías</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Ayuda y Soporte</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="footer-link" href="preguntasFrecuentes.php">Preguntas Frecuentes</a></li>
                        <li class="mb-2"><a class="footer-link" href="contactarSoporte.php">Contactar a Soporte</a></li>
                        <li class="mb-2"><a class="footer-link" href="guiasTutoriales.php">Guías y Tutoriales</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Información Legal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a class="footer-link" href="terminosCondiciones.php">Términos y Condiciones</a></li>
                        <li class="mb-2"><a class="footer-link" href="privacidad.php">Políticas de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <p class="text-center mt-3">© <?php echo date('Y'); ?> Red Social Emprendedores. Todos los derechos reservados</p>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>
</html>
