<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    // Redirigir al login si el usuario no está autenticado
    header("Location: login.php");
    exit();
}
?>