<?php
function generarToken($longitud = 32) {
    return bin2hex(random_bytes($longitud / 2));
}
?>