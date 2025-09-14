<?php
//controller_RegistroUsuario.php
include '../controlador/conexionCredenciales.php';
//-----------------------------------------------------------------------------
// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Guardar el nuevo usuario
    $usuarioId = $usuarioModel->guardarUsuario($nombre, $email, $password);
    if ($usuarioId) {
        header('Location: ../vista/registros/registro_exitoso.html');
        exit();
    } else {
        header('Location: ../vista/registros/registro_fallido.html');
        exit();
    }
}

?>