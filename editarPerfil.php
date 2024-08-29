<?php
$pageTitle = "Editar Perfil";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
 
include('db.php'); // Archivo de conexión a la base de datos

// Obtener el nombre de usuario desde la sesión
$username = $_SESSION['username'];

// Obtener datos del usuario
$query = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Editar Perfil</h2>
            </div>
            <div class="card-body">
                <form action="updatePerfil.php" method="POST" enctype=
                "multipart/form-data">
                    <input type="hidden" name="username" value="<?php 
                    echo htmlspecialchars($user['username']); ?>">
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" 
                        class="form-control" value="<?php echo 
                        htmlspecialchars($user['nombre']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" 
                        class="form-control" value="<?php echo 
                        htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pais" class="form-label">País:</label>
                        <select class="form-select" id="pais" name="pais" required>
                            <option value="" disabled>Seleccione un país</option>
                            <?php
                            $paises = [
                                "Argentina", "Barbados", "Belice", "Bolivia", 
                                "Brasil", "Canadá", "Chile", "Colombia", "Costa Rica", 
                                "Cuba", "Dominica", "Ecuador", "El Salvador",
                                "Estados Unidos", "Guatemala", "Guyana", 
                                "Haití", "Honduras", "Jamaica", "México", "Nicaragua", 
                                "Panamá", "Paraguay", "Perú", "República Dominicana",
                                "Surinam", "Trinidad y Tobago", "Uruguay", "Venezuela"
                            ];

                            foreach ($paises as $pais) {
                                $selected = $user['pais'] == $pais ? 'selected' : '';
                                echo "<option value=\"$pais\" $selected>$pais</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control" value="<?php echo htmlspecialchars($user['fecha_Nacimiento']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($user['telefono']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select id="sexo" name="sexo" class="form-select" required>
                            <option value="" disabled>Selecciona...</option>
                            <option value="Masculino" <?php echo $user['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                            <option value="Femenino" <?php echo $user['sexo'] == 'Femenino' ? 'selected' : ''; ?>>Femenino</option>
                            <option value="Otro" <?php echo $user['sexo'] == 'Otro' ? 'selected' : ''; ?>>Otro</option>
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

    <?php
    include './plantillas/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>
</html>