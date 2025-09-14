<?php
//controller_Pastilla.php
include '../controlador/conexionCredenciales.php';

//-----------------------------------------------------------------------------

include('../modelo/Modelo_DatosPeliculas.php');

$mp = new Modelo_DatosPeliculas($host, $dbname, $username, $password);
$generosNombresArr = $mp->sacarNombreGeneros();

foreach($generosNombresArr as $nombreGenero) {
    echo '
    <div class="container mb-1">
       <div class="row">
            <p class="tituloSeccion col-12">
                '.$nombreGenero.'
            </p>
        ';

        //Saca en un arr la info de todas las peliculas de un genero
        $arrInfoPeli =   $mp->sacarInfoDePeliculasDeGenero($nombreGenero);
        
        //Saca info de cada peli y crea filas de 3 pastillas
        foreach($arrInfoPeli as $fila) {
            $idPoster = $fila['id_poster'];
            $tituloNombre = $fila['titulo'];
            $idDelDirector = $fila['director_id'];
            $id  = $fila['pelicula_id'];
            
            $nombrePoster = $mp->sacarNombrePoster($idPoster);//$idPoster
            $nombreDelDirector = $mp->sacarNombreDirectorPorIdDirector($idDelDirector);
 
            //Crea una pastilla y la rellena con la info de una pelicula
            include('template_secciones_generos/template_pastilla.php');
       }
echo
        '</div>
    </div>';
}