<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Recursos y Herramientas</h5>
                <ul class="list-unstyled">
                    <li class="mb-8"><a class="footer-link" href="./articulos.php">Artículos</a></li>
                    <li class="mb-8"><a class="footer-link" href="./videos.php">Videos</a></li>
                    <?php
                    // Mostrar la opción "Gestionar Contenido" solo si el usuario es admin
                    if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
                        echo '<li class="mb-8"><a class="footer-link" href="./gestionarRecursos.php">Gestionar Recursos</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Ayuda y Soporte</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="footer-link" href="./preguntasFrecuentes.php">Preguntas Frecuentes</a></li>
                    <li class="mb-2"><a class="footer-link" href="./contactarSoporte.php">Contactar a Soporte</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Información Legal</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="footer-link" href="./terminosCondiciones.php">Términos y Condiciones</a></li>
                    <li class="mb-2"><a class="footer-link" href="./privacidad.php">Políticas de Privacidad</a></li>
                </ul>
            </div>
        </div>
        <p class="text-center mt-8">© <?php echo date('Y'); ?> Red Social Emprendedores. Todos los derechos reservados</p>
    </div>
</footer>

<script src="./js/script.js"></script>
</body>
</html>