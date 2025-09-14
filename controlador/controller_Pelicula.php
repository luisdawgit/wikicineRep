<?php

//controller_Pelicula.php
session_start();

$id_pelicula_pastilla = $_GET['id_pelicula_pastilla'];

require_once  'conexionCredenciales.php';
require_once  '../modelo/Modelo_DatosPeliculas.php';

    $mp = new Modelo_DatosPeliculas($host, $dbname, $username, $password);

    //Saca en un arr toda la info de una pelicula de un genero.
    $arrInfoPeliculaPorId = $mp->sacarInfoDePeliculaPorId($id_pelicula_pastilla);
    
    $arrInfoPeliculaPorId[0]['pelicula_id'];
    $arrInfoPeliculaPorId[0]['titulo'];
    $arrInfoPeliculaPorId[0]['director_id'];
    $arrInfoPeliculaPorId[0]['id_poster'];
    $arrInfoPeliculaPorId[0]['puntuacion_media'];//CONSERVAR
    $arrInfoPeliculaPorId[0]['sinopsis'];
    $arrInfoPeliculaPorId[0]['trailer'];

    $idDelDirector = $arrInfoPeliculaPorId[0]['director_id'];
    $arrIdGeneros = $mp->sacarIdGeneroDePelicula($arrInfoPeliculaPorId[0]['pelicula_id']);
    $idTrailer = $arrInfoPeliculaPorId[0]['trailer'];
    $nombreDelDirector = $mp->sacarNombreDirectorPorIdDirector($idDelDirector);

    // Recorre los géneros y obtiene sus nombres
    $generosPelicula = [];
    foreach ($arrIdGeneros as $idGenero) {
        $generosPelicula[] = $mp->sacarNombreGeneroPorIdGenero($idGenero);//prueba
    }
    
    $arrReparto = $mp->sacarRepartoPelicula($arrInfoPeliculaPorId[0]['pelicula_id']);
    $arrGuionistas = $mp->sacarGuionistasPelicula($arrInfoPeliculaPorId[0]['pelicula_id']);
    $_SESSION['cookieUsuario']['pelicula_id'] = $arrInfoPeliculaPorId[0]['pelicula_id'];
    $nombrePoster = $mp->sacarNombrePoster($arrInfoPeliculaPorId[0]['id_poster']);

    require_once  '../vista/template_secciones_generos/template_pelicula_seleccionada.php';
