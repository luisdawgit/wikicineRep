<?php
//validar_loginUsuario.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


header('Content-Type: application/json');

require_once 'conexionCredenciales.php';
require_once '../modelo/Conexion.php';
require_once '../modelo/Usuario.php';


    // Inicia la sesión si es necesario
    session_start();

try {
    $nuevoUsuario = new Usuario($host, $dbname, $username, $password);

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $nombre = trim($data['nombre'] ?? '');
    $contraseña = $data['contraseña'] ?? '';

    if (empty($nombre) || empty($contraseña)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // Validar usuario Y contraseña juntos
    if (!$nuevoUsuario->verificarNombre($nombre)) {
        throw new Exception("Usuario o contraseña incorrectos.");
    }
    if (!$nuevoUsuario->verificarContraseña($nombre, $contraseña)) {
        throw new Exception("Usuario o contraseña incorrectos 1.");
    }

    $idUsuario = $nuevoUsuario->obtenerIdUsuarioPorNombre($nombre);
    $_SESSION['cookieUsuario'] = [
        'nombre' => $nombre,
        'id' => $idUsuario,
        'autenticado' => true
    ];


    echo json_encode(['exito' => true]);

} catch (Exception $e) {
    http_response_code(200);
    echo json_encode([
        'exito' => false,
        'mensaje' => $e->getMessage()
    ]);
}
