<?php
//contacto.php

require_once  '../controlador/conexionCredenciales.php';
?>

<!DOCTYPE html>
<html lang="es">

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
    <!-- FontAwesome (para iconos) end -->

    <!-- Es imporante que TUS hojas de estilo esten aqui abajo -->
    <link rel="stylesheet" href="../css/principal_page.css" />
    <link rel="stylesheet" href="../css/template_pastilla.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/comunesFormularios.css" />

    <style>
        span{
            color: gold;
            font-weight: bold;
            
        };
    </style>

</head>

<body>
    <!-- HEADER -->
    <header>
        <?php
        //--- IMPORTANTE
            session_start();
            include_once 'header.php';
        ?>
    </header>
    <!-- MAIN -->
    <main>
        <div class="container mb-1 presentacion">
            <h1>Sobre nosotros</h1>
            <!-- ------------------------ Datos de contacto ------------------------ -->
            <P>
                Bienvenido a wikicine.
            </P>
            <P>
                Este este es un proyecto colaborativo donde recopilamos informacion sobre todo tipo de cine.
                <br>
                ¡Registrate ahora y pasa a formar parte de <span>Wikicine</span>!
                <br>
                Podras puntuar y subir informarcion sobre tus peliculas favoritas.
            </P>

            <!-- ------------------------ Datos de contacto end ------------------------ -->
        </div>
    </main>
    
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