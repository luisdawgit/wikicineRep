<?php
//conexionCrendenciales.php

// Incluir el modelo
require_once '../modelo/Usuario.php';

// Configurar los datos de conexión
$host = 'localhost';
$dbname = 'u845264071_proyectofinal2';//proyectofinal--
$username = 'u845264071_root';//tu_usuario
$password = 'BDPassworD123';//tu_contraseña

// Crear una instancia del modelo Usuario
$usuarioModel = new Usuario($host, $dbname, $username, $password);
?>