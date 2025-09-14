<?php
//Conexion.php

class Conexion {
    private static $pdo = null;

    // Método estático para obtener la instancia de la conexión
    public static function obtenerConexion($host, $dbname, $username, $password) {
        if (self::$pdo === null) {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";//charset=utf8mb4
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            self::$pdo = new PDO(dsn: $dsn, username: $username, password: $password, options: $options);
        }
        return self::$pdo;
    }
}