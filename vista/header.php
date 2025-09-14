<!-- header.php -->
<!-- HEADER -->

<!-- <header> -->
<nav class="navbar navbar-expand-sm navbar-light bg-light basicosheader">
    
    <a href="../vista/principal_page.php">
        <img id="logoWikicine" src="../img/material/logo_fondo_negro.png" />
    </a>

    <a class="navbar-brand" href="../vista/principal_page.php">Wikicine</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links de navegación -->
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../vista/principal_page.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../vista/sobre_nosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../vista/contacto.php">Contacto</a>
            </li>
        </ul>

        <!-- Botón de Login -->
        <?php
            if (isset($_SESSION['cookieUsuario']['autenticado']) && isset($_SESSION['cookieUsuario']) && $_SESSION['cookieUsuario']['autenticado']) {
                
                    $rutaActual = $_SERVER['REQUEST_URI'];
                    $rutaAñadirPelicula = "Ruta Añadir Pelicula";
    
                    if (stristr($rutaActual, 'principal_page.php')) {
                        $rutaAñadirPelicula = 'formulario_añadir_pelicula.php';
                    }else
                    if (stristr($rutaActual, 'controller_pelicula.php')) {
                        $rutaAñadirPelicula = '../vista/formulario_añadir_pelicula.php';
                    }
                    // Solo añadir boton cuando no estes en formulario_añadir_pelicula.php
                    if (!stristr((urldecode($rutaActual)), 'formulario_añadir_pelicula.php')) {
                        echo '
                        <a class="nav-link pl-0" href="'.$rutaAñadirPelicula.'">
                            <button type="button"  class="btn btn-primary ml-3">
                                    Añadir pelicula
                            </button>
                        </a>';
                    }
                echo '
                <form method="POST" action="../controlador/controller_CerrarSesionUsuario.php" class="form-inline my-2 my-lg-0">
                    <button type="submit" class="btn btn-primary ml-3">
                        Cerrar sesion de '.$_SESSION['cookieUsuario']['nombre'].'
                    </button>
                </form>';

            }else {
                // Solo añadir boton cuando no estes en formulario_añadir_pelicula.php end
                $rutaActual = $_SERVER['REQUEST_URI'];
                $rutaAñadirPelicula = "Ruta Añadir Pelicula";

                if (!stristr((urldecode($rutaActual)), 'nuevo_usuario_registrar.php')) {
                echo '
                <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#loginModal">
                    Login
                </button>';
                }
                // Solo añadir boton cuando no estes en nuevo_usuario_registrar.php end
            }
        ?>

    </div>

</nav>
<!-- </header> -->


<!-- Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <?php 
                    // <!-- condicional modal login aqui -->
                        
                        $rutaActual = $_SERVER['REQUEST_URI'];
                        $rutaModalLogin = "Ruta Añadir Pelicula";
                        $rutaNuevoUser = "Ruta para nuevo usuario";
                        
                        if (stristr($rutaActual, 'principal_page.php')) {
                            $rutaModalLogin  = "../controlador/controller_LoginUsuario.php";
                            $rutaNuevoUser = "nuevo_usuario_registrar.php";
                        }
                        if (stristr($rutaActual, 'controller_Pelicula.php')) {
                            $rutaModalLogin  = "controller_LoginUsuario.php";
                            $rutaNuevoUser = "../vista/nuevo_usuario_registrar.php";
                        }
                        if (stristr($rutaActual, 'controller_formularioAñadirPelicula.php')) {
                            $rutaModalLogin  = "../controlador/controller_LoginUsuario.php";
                        }
//----------------------------------contacto ----------------------
                        if (stristr($rutaActual, 'contacto.php')) {
                            $rutaModalLogin  = "../controlador/controller_LoginUsuario.php";
                            $rutaNuevoUser = "nuevo_usuario_registrar.php";
                        }
//----------------------------------contacto end ----------------------

//----------------------------------Sobre nosotros ----------------------
                        if (stristr($rutaActual, 'sobre_nosotros.php')) {
                            $rutaModalLogin  = "../controlador/controller_LoginUsuario.php";
                            $rutaNuevoUser = "nuevo_usuario_registrar.php";
                        }
//----------------------------------Sobre nosotros end ----------------------


                        include_once $rutaModalLogin;
            
                        // <!-- condicional modal login aqui end-->
                        echo '<form id="loginForm" method="POST">';
                    ?>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" name="nombre" id="username"
                            placeholder="Ingresa tu usuario" />
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="contraseña" id="password"
                            placeholder="Ingresa tu contraseña" />
                    </div>
    
                    <!-- Botón de Login -->
                    <button id="botonEnviar" type="submit" class="btn btn-primary">Login</button>
                </form>

                <!-- Login campos metodos-->
                <script src="../vista/loginCamposVacios.js"></script>

                <!-- Botón para crear un nuevo usuario -->
                <div class="mt-3">
                <?php 
                  echo '
                    <a href='.$rutaNuevoUser.' class="btn btn-secondary">
                        Crear nuevo usuario
                    </a>
                    ';
                ?>
                </div>
            </div>
        </div>
    </div>
</div>