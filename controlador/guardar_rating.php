<?php

//guardar_rating.php
error_log('El archivo guardar_rating.php fue invocado2.');

ob_start();

header('Content-Type: application/json');

// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'conexionCredenciales.php';
require_once '../modelo/Conexion.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Modelo_DatosPeliculas.php';
    
    try {
        session_start();
    
        // Recuperar los datos del cuerpo de la solicitud
        $data = json_decode(file_get_contents('php://input'), true);
        error_log(json_encode($data)); // Para ver lo que recibimos en la solicitud
    
        if (!isset($data['rating']) || !is_numeric($data['rating'])) {
            throw new Exception('Puntuación no válida');
        }
    
        $rating = $data['rating'];
        $usuario_id = $_SESSION['cookieUsuario']['id'];
        $pelicula_id = $_SESSION['cookieUsuario']['pelicula_id'];
    
        // Conexión a la base de datos
        $modeloPeliculas = new Modelo_DatosPeliculas($host, $dbname, $username, $password);
        $modeloPeliculas->mandarPuntuacionAtabla($pelicula_id, $usuario_id, $rating);
        
        $datosPelicula = $modeloPeliculas->sacarInfoDePeliculaPorId($pelicula_id);
        $nuevaPuntuacionMedia = $datosPelicula[0]['puntuacion_media'];

        //Investigar si borrar o no. Si normalmente se sacas la puntuaicon de la sesion en vez de la base de datos puedes borrarlo
        // Guardamos la puntuación en la sesión (esto es solo un ejemplo, normalmente iría a una base de datos)
            //$_SESSION['cookieUsuario']['rating'] = $rating;
    
        // Respuesta de éxito
        echo json_encode([
            'success' => true, 
            'puntuacion_media' => $nuevaPuntuacionMedia
        ]);
    
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Error en la base de datos']);
        
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

    //Para asegurarse de que no haya salida adicional antes del JSON
    ob_end_flush();

?>