    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'db.php';

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $pais = $_POST['pais'];

    // Validar que las contraseñas coincidan
    if ($password != $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href = 'registro.php';</script>";
        exit();
    } else {
        // Hash de la contraseña para almacenamiento seguro
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Verificar si el nombre de usuario o email ya existen
        $sql_check = "SELECT * FROM usuarios WHERE username = ? OR email = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "<script>alert('El nombre de usuario ya está en uso.'); window.location.href = 'registro.php';</script>";
        } else {
            // Insertar los datos del usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombre, email, username, password, fecha_nacimiento, pais) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nombre, $email, $username, $hashed_password, $fecha_nacimiento, $pais);

            if ($stmt->execute()) {
                echo "<script>alert('Registro exitoso. ¡Bienvenido!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'registro.php';</script>";
            }

            // Cerrar la declaración de inserción
            $stmt->close();
        }

        // Cerrar la declaración de verificación
        $stmt_check->close();
    }

    // Cerrar la conexión (puedes dejarlo si es necesario o si cierras la conexión en db.php)
    $conn->close();
}
?>