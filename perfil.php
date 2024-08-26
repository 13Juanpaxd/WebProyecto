<?php
$pageTitle = "Mi Perfil";
include './plantillas/header.php';
// Incluyendo el archivo de sesión para proteger la página
include('session.php');
include('db.php'); // Archivo de conexión a la base de datos

// Obtener el nombre de usuario desde la sesión
$username = $_SESSION['username'];

// Cargar la consulta
$sql = "SELECT username, nombre, email, pais, fecha_Nacimiento, telefono, sexo, 
fecha_Registro, foto_perfil FROM usuarios WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    } else {
        // Manejar el caso cuando no se encuentra el usuario
        $user = [
            'username' => 'No registrado',
            'nombre' => 'No registrado',
            'email' => 'No registrado',
            'pais' => 'No registrado',
            'fecha_Nacimiento' => 'No registrado',
            'telefono' => 'No registrado',
            'sexo' => 'No registrado',
            'fecha_Registro' => 'No registrado',
            'foto_perfil' => 'https://dthezntil550i.cloudfront.net/f4/latest/f41908
            291942413280009640715/1280_960/1b2d9510-d66d-43a2-971a-cfcbb600e7fe.png'
        ];
    }
    $stmt->close();
} else {
    // Manejar errores en la preparación de la consulta
    $user = [
        'username' => 'Error',
        'nombre' => 'Error',
        'email' => 'Error',
        'pais' => 'Error',
        'fecha_Nacimiento' => 'Error',
        'telefono' => 'Error',
        'sexo' => 'Error',
        'fecha_Registro' => 'Error',
        'foto_perfil' => 'https://dthezntil550i.cloudfront.net/f4/latest/f419082919424
        13280009640715/1280_960/1b2d9510-d66d-43a2-971a-cfcbb600e7fe.png' 
    ];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh
    0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.
    min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7
    N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b028410953.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h2>Perfil de Usuario</h2>
            </div>
            <div class="card-body d-flex">
                <div class="p-5">
                    <img src="<?php echo htmlspecialchars($user['foto_perfil']); ?>" 
                    alt="Foto de Perfil" class="profile-pic-large">
                </div>
                <div class="p-5">
                    <p><strong>Usuario:</strong> <?php echo htmlspecialchars($user[
                        'username']); ?></p>
                    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($user[
                        'nombre']) ?: 'No registrado'; ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user[
                        'email']) ?: 'No registrado'; ?></p>
                    <p><strong>País:</strong> <?php echo htmlspecialchars($user[
                        'pais']) ?: 'No registrado'; ?></p>
                    <p><strong>Fecha de Nacimiento:</strong> <?php echo 
                    htmlspecialchars($user['fecha_Nacimiento']) ?: 'No registrado'; ?></p>
                    <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($user
                    ['telefono']) ?: 'No registrado'; ?></p>
                    <p><strong>Sexo:</strong> <?php echo htmlspecialchars($user
                    ['sexo']) ?: 'No registrado'; ?></p>
                    <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars(
                        $user['fecha_Registro']) ?: 'No registrado'; ?></p>
                    <a href="editarPerfil.php" class="btn btn-primary">Editar Perfil</a>
                    <a href="registrarNegocio.php" class="btn btn-secondary">Registrar un Negocio</a>
                    <a href="misNegocios.php" class="btn btn-info">Ver Mis Negocios</a>
                </div>
            </div>
        </div>
    </div>

    <?php include './plantillas/footer.php'; ?>

    <script src="./js/script.js"></script>
</body>
</html>