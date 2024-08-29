<?php
include('session.php');

require 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Usuario_recibe = $_POST['id_Usuario_recibe'];
    $mensaje = $_POST['mensaje'];
    $current_user = $_SESSION['username']; // Usuario actual (quien responde)

    // Insertar respuesta en la base de datos
    $sql = "INSERT INTO mensajes (id_Usuario_envia, id_Usuario_recibe, mensaje, leido) 
            VALUES ('$current_user', '$id_Usuario_recibe', '$mensaje', 'No')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Respuesta enviada correctamente.');</script>";
        echo "<script>window.location.href = 'ver_chat.php?usuario=" . $id_Usuario_recibe . "';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
