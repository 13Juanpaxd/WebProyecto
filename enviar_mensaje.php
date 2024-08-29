<?php
include('session.php'); // Incluir archivo de sesión
require 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Usuario_recibe = $_POST['id_Usuario_recibe'];
    $mensaje = $_POST['mensaje'];
    $current_user = $_SESSION['username']; // Usuario que envía el mensaje
    
    // Insertar el mensaje en la base de datos
    $sql = "INSERT INTO mensajes (id_Usuario_envia, id_Usuario_recibe, mensaje, leido) 
            VALUES ('$current_user', '$id_Usuario_recibe', '$mensaje', 'No')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Mensaje enviado correctamente.');</script>";
        echo "<script>window.location.href = 'messages.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>