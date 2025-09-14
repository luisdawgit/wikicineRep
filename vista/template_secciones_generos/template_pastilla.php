<?php
//template_genero.php
  
  echo '
    <div class="pastilla col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <div class="poster_pelicula_pastilla">
        <a href="../controlador/controller_Pelicula.php? id_pelicula_pastilla='.$id.'">
          <img src="../img/'.$nombrePoster.'" href="../vista/template_secciones_generos/template_pelicula.php"/>
        </a>
      </div>

      <div class="datos_pastilla">
        <p><span>Titulo: </span>' . $fila['titulo'] . '</p>

        <p><span>Director: </span>' . $nombreDelDirector[0] . '</p>
        <div class="puntuacion">
          <p>
            <span>Puntuacion: </span>' . $fila['puntuacion_media'].'
          </p>
        </div>
      </div>
    </div>';

?>
