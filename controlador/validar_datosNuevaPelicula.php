<?php
//validar_datosNuevaPelicula.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once 'conexionCredenciales.php';
require_once '../modelo/Conexion.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Modelo_DatosPeliculas.php';

try {
    // Inicia la sesión si es necesario
    session_start();


// Instancia la clase del modelo
$nuevaPelicula = new Modelo_DatosPeliculas($host, $dbname, $username, $password);
    
// Recuperar los datos del cuerpo de la solicitud
$input = file_get_contents('php://input');
$data = json_decode($input, true);
error_log(json_encode($data)); // Para ver lo que recibimos en la solicitud

    if (!isset($data['titulo']) || trim($data['titulo']) === '') {
        echo json_encode(['repetido' => false, 'error' => 'El título es obligatorio.']);
        exit;
    }
    
//---Nueva solucion

    // Capturar los valores del formulario
    $titulo = $data['titulo'] ?? null;
    $trailer = $data['trailer'] ?? null;

    // Verificar si el título está repetido
    $tituloRepetido = $nuevaPelicula->comprobarTituloEnTabla($titulo);

    // Verificar si el trailer está repetido
    $trailerRepetido = false;
    if (!empty($trailer)) {
        $idTrailer = $nuevaPelicula->sacarIdTrailerDeUrl($trailer);
        $trailerRepetido = $nuevaPelicula->comprobarTrailerEnTabla($idTrailer);
    }

    // Log para depuración
    error_log("Título repetido: " . ($tituloRepetido ? "Sí" : "No"));
    error_log("Trailer repetido: " . ($trailerRepetido ? "Sí" : "No"));

    // Enviar la respuesta JSON con ambas verificaciones
    echo json_encode([
        'repetido' => $tituloRepetido,
        'trailer_repetido' => $trailerRepetido
    ]);
    exit;
//---Nueva solucion end

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