<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Red Social Emprendedores</title>
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
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Perfil de Usuario</h2>
            </div>
            <div class="card-body d-flex">
                <div class="p-5">
                    <img src="https://images.pexels.com/photos/4054069/pexels-photo-4054069.jpeg" alt="Foto de Perfil" class="profile-pic-large">
                </div>
                <div class="p-5">
                    <p><strong>Nombre:</strong> N/D</p>
                    <p><strong>Email:</strong> N/D</p>
                    <p><strong>País:</strong> N/D</p>
                    <p><strong>Fecha de Nacimiento:</strong> N/D</p>
                    <p><strong>Teléfono:</strong> N/D</p>
                    <p><strong>Sexo:</strong> N/D</p>
                    <p><strong>Fecha de Registro:</strong> N/D</p>
                    <a href="editarPerfil.php" class="btn btn-primary">Editar Perfil</a>
                    <a href="registrarNegocio.php" class="btn btn-secondary">Registrar un Negocio</a>
                    <a href="misNegocios.php" class="btn btn-info">Ver Mis Negocios</a> <!-- Botón agregado -->
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
