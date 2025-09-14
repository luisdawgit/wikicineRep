<!-- formulario_añadir_pelicula.php -->
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario_añadir_pelicula</title>

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
    <!-- FontAwesome (para iconos) end -->

    <!-- Es imporante que TUS hojas de estilo esten aqui abajo -->
    <link rel="stylesheet" href="../css/formulario_añadir_pelicula.css" />
    <link rel="stylesheet" href="../css/subir_poster_dragable.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/comunesFormularios.css" />
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

        session_start();

        include_once 'header.php';
        $formularioPelicula = new Modelo_DatosPeliculas($host, $dbname, $username, $password);
        ?>
    </header>

    <!-- MAIN -->
    <main class="preformulario">
        <h1>Añadir una nueva pelicula</h1>
        <div>
            <form id="formulario" name="formulario" action="../controlador/controller_formularioAñadirPelicula.php"
                method="POST" enctype="multipart/form-data">
    <!-- 
            <span id="error-mostrar" style="color: red; display: none;"></span>
    -->

                <div class="container">

                    <div class="row">

                        <div id="izquierda" class="col-12 col-lg-6 col-md-6 col-sm-12 col-s-12 col-sx-12">
                            <button id="enviarBoton" type="submit" name="Enviar">Enviar</button>
                            <div class="espaciadoSecciones">
                                <label>Titulo</label>
                                <input type="text" name="titulo" id="titulo" />

                            </div>

<div class="espaciadoSecciones">
    <label>Género</label>
    <div id="generoTodosCheckbox">
        <?php
        $generosNombresArr = $formularioPelicula->sacarNombreGeneros();
        foreach($generosNombresArr as $nombreGenero) {
            echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' name='generos[]' value='".$nombreGenero."' id='genero_".$nombreGenero."'>";
                echo "<label class='subTexto form-check-label' for='genero_".$nombreGenero."'>".$nombreGenero."</label>";
            echo "</div>";
        }
        ?>
    </div>
</div>


                            <div class="espaciadoSecciones">
                                <label>Director</label>
                                <input type="text" name="directorNombre" id="directorNombre" />

                            </div>

                            <div class="espaciadoSecciones">
                                <label>Trailer Url</label>
                                <input type="text" name="trailer" id="trailer" />

                            </div>



                            <div id="actoresTodo">
                                <div id="actoresDiv">
                                    <label>Actor 1 </label>
                                    <!-- Hace como con director -->
                                    <input type="text" name="actoresNombres[]" id="actoresNombres" />
                                </div>
                                <!-- boton para añadir mas actores -->
                                <button class="btn btn-primary ml-3" id="nuevoActorBoton" type="button">+ actor</button>
                                <button class="btn btn-primary ml-3" id="quitarActorBoton" type="button">-
                                    actor</button>
                                <br>
                            </div>

                            <div id="guionistasTodo">
                                <div id="guionistasDiv">
                                    <label>Guionista 1 </label>
                                    <input type="text" name="guionistasNombres[]" id="guionistasNombres" />
                                </div>
                                <!-- boton para añadir mas guionistas -->
                                <button class="btn btn-primary ml-3" id="nuevoGuionistaBoton" type="button">+
                                    guionista</button>
                                <button class="btn btn-primary ml-3" id="quitarGuionistaBoton" type="button">-
                                    guionista</button>
                                <br>

                            </div>

                        </div>

                        <div id="derecha" class="col-12 col-lg-6 col-md-6 col-sm-12 col-s-12 col-sx-12">
                            <div class="espaciadoSecciones">
                                <label>Sinopsis</label>
                                <textarea name="sinopsis" id="sinopsis" rows="10" cols="50">
                        </textarea>
                                <br />
                                <br />
                            </div>
                            <div class="espaciadoSecciones">
                                <label>
                                    Poster
                                <p class="subTexto">*Sube un imagen en formato 70x100</p>
                                </label>
                                <div id="dropZone" class="drop-zone">
                                    <p class="subTexto">Arrastra y suelta tus archivos aquí, o haz clic para seleccionarlos.</p>
                                    <p id="nombreArchivo"></p>
                                    <input type="file" id="poster" name="poster" class="file-input"
                                        accept="image/png, image/jpeg" value="../img" />
                                    <img id="previewImage" src="" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- script subir archivo dragable -->
    <script src="subir_archivo_dragable.js"></script>
    <!-- script subir archivo dragable end -->

    <!-- script fetch validar antes de enviar fetch -->
    <script src="validar_antes_de_fetch.js"></script>
    <!-- script fetch validar antes de enviar fetch end -->

    <!-- FOOTER -->
    <?php
            require_once("footer.php");
        ?>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>



</html>