<!DOCTYPE html>
<!-- nuevo_usuario_registrar.php -->
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar Nuevo Usuario</title>

    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 CSS end-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- Bootstrap CSS end-->

    <link rel="stylesheet" href="../css/nuevo_usuario_registrar.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/comunesFormularios.css" />
</head>

<body>

    <header>
    <?php
      //--- IMPORTANTE
      session_start();
      include_once 'header.php';
    ?>

    </header>

    <main class="container mt-5 text-center">
        <h1 class="text-center">Registrar Nuevo Usuario</h1>

        <!-- Formulario de registro -->
        <form id="registerForm" action="../controlador/controller_RegistroUsuario.php" method="POST"
            class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 m-auto text-center">

            <!-- Nombre de usuario -->
            <div class="form-group">
                <label for="usernameNew">Usuario</label>
                <input type="text" class="form-control" name="nombre" id="usernameNew" placeholder="Usuario" />
            </div>

            <!-- Correo electrónico -->
            <div class="form-group">
                <label for="emailNew">Email</label>
                <input type="email" class="form-control" name="email" id="emailNew" placeholder="Email" />
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="passwordNew">Contraseña</label>
                <input type="password" class="form-control" name="password" id="passwordNew" placeholder="Contraseña" />
            </div>

            <!-- Botón de registro -->
            <button type="submit" class="btn btn-primary btn-inline">
                Crear Cuenta
            </button>
        </form>

    </main>

    <!-- script fetch validar nuevo_usuario_registrar antes de enviar fetch -->
    <script src="validar_antes_de_fetch_nuevo_usuario_registrar.js"></script>

    <!-- script fetch validar nuevo_usuario_registrar antes de enviar fetch end -->

        <?php
            require_once("footer.php");
        ?>

    <!-- Bootstrap JS, Popper.js, y jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</body>

</html>