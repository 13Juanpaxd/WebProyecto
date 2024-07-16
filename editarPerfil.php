<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Red Social Emprendedores</title>
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
                <h2>Editar Perfil</h2>
            </div>
            <div class="card-body">
                <form action="updatePerfil.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pais" class="form-label">País:</label>
                        <select class="form-select" id="pais" name="pais" required>
                            <option value="" disabled selected>Seleccione un país</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belice">Belice</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Canadá">Canadá</option>
                            <option value="Chile">Chile</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haití">Haití</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="México">México</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Panamá">Panamá</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Perú">Perú</option>
                            <option value="República Dominicana">República Dominicana</option>
                            <option value="Surinam">Surinam</option>
                            <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Venezuela">Venezuela</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-select" required>
                            <option value="" disabled selected>Selecciona...</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fotoPerfil" class="form-label">Foto de Perfil:</label>
                        <input type="file" id="fotoPerfil" name="fotoPerfil" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                    <a href="perfil.php" class="btn btn-danger">Cancelar</a>
                </form>
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
