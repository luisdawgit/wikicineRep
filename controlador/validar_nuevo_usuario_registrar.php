<?php
//validar_datosNuevaPelicula.php
header('Content-Type: application/json');

require_once 'conexionCredenciales.php';
require_once '../modelo/Conexion.php';
require_once '../modelo/Usuario.php';

try {
    // Inicia la sesión si es necesario
    session_start();

// Instancia la clase del modelo
$nuevoUsuario = new Usuario($host, $dbname, $username, $password);
    
// Recuperar los datos del cuerpo de la solicitud
$input = file_get_contents('php://input');
$data = json_decode($input, true);
error_log(json_encode($data)); // Para ver lo que recibimos en la solicitud

    if (!isset($data['email']) || trim($data['email']) === '') {
        echo json_encode(['repetido' => false, 'error' => 'El email es obligatorio.']);
        exit;
    }

    // Captura el email del formulario
    $email = $data['email'] ?? null;

    // Verifica que el email no esté vacío
    if (empty($email)) {
        $_SESSION['error'] = 'El email es obligatorio.';
        header('Location: ../vista/nuevo_usuario_registrar.php');
        exit;
    }

//----------------------------

    // Verifica si el email ya existe
    if ($nuevoUsuario->verificarEmail($email) == true) {
            // Si no existe, continúa con el proceso
            $_SESSION['success'] = 'El email es nuevo y puede añadirse.';
            echo json_encode(['repetido' => true]);
            exit;
    }else {
            echo json_encode(['repetido' => false]);
    }

//----------------------------
    //Si ha llegado hasta aqui entonces todos los datos han sido validados
//----------------------------

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Error en la base de datos']);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}