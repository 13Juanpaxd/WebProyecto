<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Red Social Emprendedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b028410953.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <script>
        function validateForm() {
            var valid = true;

            var nombre = document.getElementById('nombre').value;
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
            var pais = document.getElementById('pais').value;

            // Mensajes de error
            var nombreError = document.getElementById('nombreError');
            var emailError = document.getElementById('emailError');
            var usernameError = document.getElementById('usernameError');
            var passwordError = document.getElementById('passwordError');
            var confirmPasswordError = document.getElementById('confirmPasswordError');
            var fechaNacimientoError = document.getElementById('fechaNacimientoError');
            var paisError = document.getElementById('paisError');

            // Limpiar errores anteriores
            nombreError.textContent = '';
            emailError.textContent = '';
            usernameError.textContent = '';
            passwordError.textContent = '';
            confirmPasswordError.textContent = '';
            fechaNacimientoError.textContent = '';
            paisError.textContent = '';

            // Validar campos vacíos
            if (!nombre) {
                nombreError.textContent = 'El nombre es obligatorio.';
                valid = false;
            }
            if (!email) {
                emailError.textContent = 'El email es obligatorio.';
                valid = false;
            }
            if (!username) {
                usernameError.textContent = 'El nombre de usuario es obligatorio.';
                valid = false;
            }
            if (!password) {
                passwordError.textContent = 'Este campo es obligatorio.';
                valid = false;
            }
            if (!confirm_password) {
                confirmPasswordError.textContent = 'Este campo es obligatorio.';
                valid = false;
            }
            if (!fecha_nacimiento) {
                fechaNacimientoError.textContent = 'Este campo es obligatorio.';
                valid = false;
            }
            if (!pais) {
                paisError.textContent = 'Este campo es obligatorio.';
                valid = false;
            }

            // Validar formato de email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email && !emailPattern.test(email)) {
                emailError.textContent = 'Por favor, ingrese un correo electrónico válido.';
                valid = false;
            }

            // Validar contraseñas coincidentes
            if (password && confirm_password && password !== confirm_password) {
                confirmPasswordError.textContent = 'Las contraseñas no coinciden.';
                valid = false;
            }

            return valid; // El formulario es válido
        }

        // Validación al momento
        function realTimeValidation() {
            var nombre = document.getElementById('nombre');
            var email = document.getElementById('email');
            var username = document.getElementById('username');
            var password = document.getElementById('password');
            var confirm_password = document.getElementById('confirm_password');
            var fecha_nacimiento = document.getElementById('fecha_nacimiento');
            var pais = document.getElementById('pais');

            nombre.addEventListener('input', validateForm);
            email.addEventListener('input', validateForm);
            username.addEventListener('input', validateForm);
            password.addEventListener('input', validateForm);
            confirm_password.addEventListener('input', validateForm);
            fecha_nacimiento.addEventListener('input', validateForm);
            pais.addEventListener('change', validateForm);
        }

        window.onload = function() {
            realTimeValidation();
        };
    </script>
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
                        <a class="nav-link active" href="registro.php">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5 main-content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>Registro de Nuevos Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <form action="procesarRegistro.php" method="POST" onsubmit="return validateForm()">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                                <div id="nombreError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email">
                                <div id="emailError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username">
                                <div id="usernameError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                <div id="fechaNacimientoError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="pais" class="form-label">País</label>
                                <select class="form-select" id="pais" name="pais">
                                    <option value="" disabled selected>Seleccione un país</option>
                                    <!-- Lista de países -->
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
                                    <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
                                    <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                                    <option value="Santa Lucía">Santa Lucía</option>
                                    <option value="Surinam">Surinam</option>
                                    <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                                <div id="paisError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div id="passwordError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                <div id="confirmPasswordError" class="text-danger"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                            <div class="card-footer text-center">
                                <a href="login.php">Tienes una contraseña. Inicia Sesión</a>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Red Social Emprendedores. Todos los derechos reservados.</p>
    </footer>
</body>
</html>