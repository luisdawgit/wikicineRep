<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// controller_formularioAñadirPelicula.php
require_once 'conexionCredenciales.php';
require_once '../modelo/Conexion.php';
require_once '../modelo/Usuario.php';
require_once '../modelo/Modelo_DatosPeliculas.php';


    // <!-- IMPORTANTE -->
    session_start();

    $nuevaPelicula = new Modelo_DatosPeliculas($host, $dbname, $username, $password);

//................  COMPROBACION DE VARIABLES ................
    $posterNombre = "";
    $puntuacion_media = 0;
    $trailer = "";
    $sinopsis = $_POST['sinopsis'];
    $trailerUrl = $_POST['trailer'];
    $idTrailer = $nuevaPelicula->sacarIdTrailerDeUrl($trailerUrl);

    $titulo = $_POST['titulo'];

    $nombreGeneros = $_POST['generos'];
    
    $nombreDirector = $_POST['directorNombre'];

    $nombresActores = $_POST['actoresNombres'];

    $nombresGuionistas = $_POST['guionistasNombres'];
    
    //--- Poster ---
    //-------------------------------------------------------------
    $poster = $_FILES['poster'];

    $nombreArchivo = $poster['name'];
    $archivoTemporal = $poster['tmp_name'];
    $carpetaDestino = '../img/';

    //-------------------------------------------------------------
    if ($poster['size'] > 2 * 1024 * 1024) {
        die("El archivo es demasiado grande. Tamaño máximo permitido: 2 MB.");
    }
    //-------------------------------------------------------------

    // Validar tipo de archivo
    $tiposPermitidos = ['image/jpeg', 'image/png'];
    if (!in_array($poster['type'], $tiposPermitidos)) {
        die("Tipo de archivo no permitido. Solo se aceptan imágenes JPG y PNG.");
    }

    //-------------------------------------------------------------
    // Crear un nombre único
    /* Crea un nombre para el poster basado en la imagen que subes.
        -Añade poster_-
        -Añade un id unico generado con la funcion uniquid()
        -Añade finalmente el nombre de la imagen subida
    */
    $nombreUnico = uniqid('poster_') . '-' . basename($nombreArchivo);
    $rutaCompleta = $carpetaDestino . $nombreUnico;

    //-------------------------------------------------------------

    //--- Crear archivo en la carpeta.
        // Mover el archivo
        if (!move_uploaded_file($archivoTemporal, $rutaCompleta)) {
            console.log("Error al mover el archivo del poster: $nombreArchivo");
            //exit("Error al guardar el archivo del poster");
            exit;
        }

    //--- Crear archivo en la carpeta end.

    //--- Crear registro en la base de datos en tabla posters
    $nuevaPelicula->crearNuevoPoster($nombreUnico);
    $idPoster = $nuevaPelicula->sacarIdPosterPorNombrePoster($nombreUnico);
    //--- Crear registro en la base de datos en tabla posters --- end.

    //--- Poster --- end

//................  COMPROBACION DE VARIABLES END .................

foreach($nombresActores as $nombreActor){
    // Verifica si el actor ya existe
    if ($nuevaPelicula->comprobarActorEnTabla($nombreActor) == false) {
        // Si no existe, continúa con el proceso
        $nuevaPelicula->crearNuevoActor($nombreActor);
    }
}

foreach($nombresGuionistas as $nombreGuionista){
    // Verifica si el guionista ya existe
    if ($nuevaPelicula->comprobarGuionistaEnTabla($nombreGuionista) == false) {
        // Si no existe, continúa con el proceso
        $nuevaPelicula->crearNuevoGuionista($nombreGuionista);
    }
}

// Verifica si el director ya existe
if ($nuevaPelicula->comprobarDirectorEnTabla($nombreDirector) == false) {
    // Si no existe, continúa con el proceso
    $nuevaPelicula->crearNuevoDirector($nombreDirector);
}
    //Paso ante final, crear la nueva pelicula con todos los datos necesarios    
    //--- poster --- buscar arriba si se inicializa o no la variable
    $nombrePoster= $nombreUnico; //--- nombre unico y rutaCompleta
    //--- poster --- end

    $posterNombre = $titulo;//Borrar luego
    $nuevaPelicula->crearNuevaPelicula($titulo,$nombreDirector,$nombrePoster,$puntuacion_media,$sinopsis,$idTrailer);
    $peliculaId = $nuevaPelicula->sacarIdPelicula($titulo);

    /*-------- sacar Ids Arreglar y hacer pelicula actor y pelicula guionista con todos --------*/ 
    foreach($nombresActores as $nombreActor){
        $actorId = $nuevaPelicula->sacarIdActorPorNombreActor($nombreActor);
        $nuevaPelicula->crearNuevaPeliculaActor($peliculaId, $actorId);
    }
    
    foreach($nombresGuionistas as $nombreGuionista){
        $guionistaId = $nuevaPelicula->sacarIdGuionistaPorNombreGuionista($nombreGuionista);
        $nuevaPelicula->crearNuevaPeliculaGuionista($peliculaId, $guionistaId);
    }
    /*-------- sacar Ids Arreglar y hacer pelicula actor y pelicula guionista con todos end --------*/ 

/* NUEVA PELICULA AÑADIDA CORRECTAMENTE proceso finalizado*/


//Se crean inserciones en pelicula_genero. Una insercion por cada genero
foreach ($nombreGeneros as $nombre){
    $generoId = $nuevaPelicula->sacarIdGeneroPorNombre($nombre);
    $nuevaPelicula->crearNuevaPeliculaGenero($peliculaId, $generoId);
}


/* REDIRECCION a pantalla de exito */
    if ($peliculaId) {
        header('Location: ../vista/registros/registro_exitoso_nueva_pelicula.html');
        exit();
    } else {
        header('Location: ../vista/registros/registro_fallido.html');
        exit();
    }
/* REDIRECCION a pantalla de exito END */


?>


