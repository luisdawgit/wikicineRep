<?php
//controller_CerrarSesionUsuario.php

include '../controlador/conexionCredenciales.php';
//-----------------------------------------------------------------------------
// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    session_start();

    // Destruir la cookie
    setcookie('cookieUsuario', '', time() - 3600, '/');
    
    // Limpiar sesión
    session_unset();
    session_destroy();

    header('Location: ../vista/principal_page.php');
    exit();
}
?>