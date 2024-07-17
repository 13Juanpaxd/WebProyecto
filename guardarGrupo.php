<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreGrupo = $_POST['nombreGrupo'];
    $descripcionGrupo = $_POST['descripcionGrupo'];
    $privacidadGrupo = $_POST['privacidadGrupo'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagenGrupo"]["name"]);
    move_uploaded_file($_FILES["imagenGrupo"]["tmp_name"], $target_file);

    
    // $conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');
    // $sql = "INSERT INTO grupos (nombre, descripcion, imagen, privacidad) VALUES ('$nombreGrupo', '$descripcionGrupo', '$target_file', '$privacidadGrupo')";
    // $conn->query($sql);
    // $conn->close();

    echo "Grupo creado con éxito";
}
?>
