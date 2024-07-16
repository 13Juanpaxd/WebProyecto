<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Negocio - Red Social Emprendedores</title>
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
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Editar Negocio</h2>
        <form action="guardarEdicionNegocio.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto del Negocio:</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Negocio:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="actividad" class="form-label">A qué se dedica:</label>
                <input type="text" id="actividad" name="actividad" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fundacion" class="form-label">Fecha de Fundación:</label>
                <input type="date" id="fecha_fundacion" name="fecha_fundacion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-control">
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pagina_web" class="form-label">Página Web:</label>
                <input type="url" id="pagina_web" name="pagina_web" class="form-control">
            </div>
            <div class="mb-3">
                <label for="envio" class="form-label">¿Hacen envíos a domicilio?</label>
                <select class="form-select" id="envio" name="envio">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Redes Sociales:</label>
                <div class="mb-2">
                    <label for="facebook" class="form-label">Facebook:</label>
                    <input type="url" id="facebook" name="facebook" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="instagram" class="form-label">Instagram:</label>
                    <input type="url" id="instagram" name="instagram" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="youtube" class="form-label">YouTube:</label>
                    <input type="url" id="youtube" name="youtube" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="google_maps" class="form-label">Google Maps:</label>
                    <input type="url" id="google_maps" name="google_maps" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Guardar Cambios</button>
            <a href="misNegocios.php" class="btn btn-danger">Cancelar</a>
        </form>
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
