<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Negocio - Red Social Emprendedores</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link" href="perfil.php">Mi Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="emprendedores.php">Emprendedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="grupos.php">Grupos</a></li>
                    <li class="nav-item"><a class="nav-link" href="notificaciones.php">Notificaciones</a></li>
                </ul>
            </div>
            <form class="d-flex search-container">
                <input class="form-control me-2 search-bar" type="search" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-outline-success" type="submit">
                    <img src="https://cdn1.iconfinder.com/data/icons/search-43/512/20_lense_search_tool_scan-512.png" alt="Buscar" class="search-icon">
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Detalles del Negocio</h2>
        <div class="card mb-4">
            <img src="https://via.placeholder.com/400x200" height="400px" alt="Foto del Negocio" class="card-img-top">
            <div class="p-5">
                <h5 class="card-title">Nombre del Negocio</h5>
                <div class="mb-2"><strong>Descripción:</strong> Descripción completa del negocio.</div>
                <div class="mb-2"><strong>A qué se dedica:</strong> Detalles sobre los servicios o productos ofrecidos.</div>
                <div class="mb-2"><strong>Fecha de Fundación:</strong> 01/01/2020</div>
                <div class="mb-2"><strong>Teléfono:</strong> (506) 8888-8888</div>
                <div class="mb-2"><strong>Dirección:</strong> Calle 123, Ciudad, País</div>
                <div class="mb-2"><strong>Página Web:</strong> <a href="http://www.ejemplo.com" target="_blank">www.ejemplo.com</a></div>
                <div class="mb-2"><strong>Envíos a Domicilio:</strong> Sí/No</div>
                <div class="mb-2"><strong>Redes Sociales:</strong></div>
                <ul>
                    <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
                    <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                    <li><a href="https://youtube.com" target="_blank">YouTube</a></li>
                    <li><a href="https://maps.google.com" target="_blank">Google Maps</a></li>
                </ul>
                <div class="text-center">
                    <a href="editarNegocio.php?id=1" class="btn btn-primary">Editar Negocio</a>
                    <a href="misNegocios.php" class="btn btn-secondary">Volver a Mis Negocios</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Recursos y Herramientas</h5>
                    <ul class="list-unstyled">
                        <li class="mb-8"><a class="footer-link" href="noticias.php">Noticias</a></li>
                        <li class="mb-8"><a class="footer-link" href="articulos.php">Artículos</a></li>
                        <li class="mb-8"><a class="footer-link" href="videos.php">Videos</a></li>
                        <li class="mb-8"><a class="footer-link" href="plantillas.php">Plantillas</a></li>
                        <li class="mb-8"><a class="footer-link" href="eventos.php">Eventos</a></li>
                        <li class="mb-8"><a class="footer-link" href="mentorias.php">Mentorías</a></li>
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
            <p class="text-center mt-8">© <?php echo date('Y'); ?> Red Social Emprendedores. Todos los derechos reservados</p>
        </div>
    </footer>

    <script src="./js/script.js"></script>
</body>
</html>