<?php
//controller_LoginUsuario.php
require_once '../controlador/conexionCredenciales.php';
//-----------------------------------------------------------------------------
// Procesar el formulario de login

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    session_start(); // Inicia la sesión al principio del archivo
    $nombre = $_POST['nombre'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    // Validación básica de que los campos no esten vacios
    if (empty($nombre) || empty($contraseña)) {
        exit;
    }

    /*
    Verificar si el nombre y contraseña 
    pertenecen a un usuario registrado
    
    La contraseña se almacena cifrada asi que nunca va a coincidir 
    con el texto literal tal como se mete en el formulario
    */
    if ($usuarioModel->verificarNombre($nombre) == true && 
    $usuarioModel->verificarContraseña($nombre, $contraseña) == true) {

        $idUsuario = $usuarioModel->obtenerIdUsuarioPorNombre($nombre);
        // Guardar información en la sesión
        $_SESSION['cookieUsuario'] = [
            'nombre' => $nombre,
            'id' => $idUsuario,
            'autenticado' => true
        ];
        header('Location: ../vista/principal_page.php');

    }else{
        header('Location: ../vista/principal_page.php');
    }
}


?>