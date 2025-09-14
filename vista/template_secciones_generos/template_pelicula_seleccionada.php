<!DOCTYPE html>
<html lang="es">
<!-- template_pelicula_seleccionada.php -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>

    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 CSS end-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- Bootstrap CSS end-->

    <!-- FontAwesome (para iconos) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <!-- FontAwesome (para iconos) end-->

    <!-- Es imporante que TUS hojas de estilo esten aqui abajo -->
    <link rel="stylesheet" href="../css/pelicula_seleccionada.css" />
    <link rel="stylesheet" href="../css/ventana_modal_valorar_pelicula.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css" />
</head>

<body>
    <!-- HEADER -->
    <header>
        <?php
        //--- IMPORTANTE
        require_once '../controlador/conexionCredenciales.php';
        require_once '../modelo/Conexion.php';
        require_once '../modelo/Usuario.php';
        require_once '../modelo/Modelo_DatosPeliculas.php';

        include_once '../vista/header.php';

        $formularioPelicula = new Modelo_DatosPeliculas($host, $dbname, $username, $password);
        ?>

    </header>

    <!-- MAIN -->
    <main>
        <?php
        echo '
        <div class = "container">
            <div class = "row">
                <div id = "peliculaBloque" class = "col">
                    <div class = "container">

                        <h1>'.$arrInfoPeliculaPorId[0]['titulo'].'</h1>
                        <div id = "poster_pelicula" class = "row">

                            <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <img  src = "../img/'.$nombrePoster.'" />
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div id = "bloqueSinopsis" class = "nombreDato">
                                    <h1>Sinopsis</h1>
                                    <p>'.$arrInfoPeliculaPorId[0]['sinopsis'].'</p>
                                </div>

                                <div id = "bloqueDatos">
                                        <p><span class = "nombreDato">Direccion:</span> '.$nombreDelDirector[0].'</p>
                                        <p><span class = "nombreDato">Reparto:</span><br>';
                                            foreach($arrReparto as $actor){
                                                echo '<span class = "variosNombres">' . $actor . '</span><br>';
                                            }
                                      echo '
                                        </p>
                                        <p><span class = "nombreDato">Guion:</span><br>';
                                            
                                            foreach($arrGuionistas as $guionista){
                                                echo '<span class = "variosNombres">' . $guionista . '</span><br>';
                                            }
                                            
                                      echo '
                                        </p>
                                        <p><span class = "nombreDato">Genero:</span><br>';
                                            
                                            foreach($generosPelicula as $genero){
                                                    echo '<span class = "variosNombres">' . $genero . '</span><br>';
                                            }
                                            
                                    echo '
                                    <div>
                                        <p>
                                            <span class = "nombreDato">Puntuacion media: </span>
                                            <span id = "puntuacion_media">'.$arrInfoPeliculaPorId[0]['puntuacion_media'].'</span>
                                        </p>
                                    </div>
                                </div>';
                                if (isset($_SESSION['cookieUsuario']['autenticado']) && isset($_SESSION['cookieUsuario']) && $_SESSION['cookieUsuario']['autenticado']) {
                                    
                                    echo '<button id="openRatingModal" class="btn btn-primary">Puntuar</button>';
                                    include_once "controller_Valorar_pelicula.php";
                                }

                      echo '</div>
                        </div>
                    </div>
                    
                    <div id = "bloqueTrailer">
                        <h1>Trailer</h1>
                        <div class="video-container">
                            <iframe   
                                width="560" 
                                height="315"
                                src="https://www.youtube.com/embed/'.$idTrailer.'"
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>';
?>

    </main>

    <!-- FOOTER -->
    <?php
        require_once("../vista/footer.php");
    ?>
    
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>