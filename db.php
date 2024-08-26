<?php

/*
// Información de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "NegociosDB";
 
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, "3306");
    
// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Connected successfully";
*/

// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "usuario_db"; // Nombre de usuario definido en el script
$password = "segura_contraseña"; // Contraseña definida en el script
$dbname = "NegociosDB"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname,"3306");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>