<?php
//Usuario.php

    include_once 'Conexion.php';

class Usuario {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        // Usar el metodo obtenerConexion desde Conexion.php
        $this->pdo = Conexion::obtenerConexion($host, $dbname, $username, $password);
    }

    /**
     * Verifica si el email ya existe comprobando 
     * si esta guardado en la tabla correspondiente en la base de datos.
     * 
     * @param string $email El email a verificar
     * @return bool  False si es no existe o True si es existe
    */
    public function verificarEmail($email) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Verifica si el email ya existe comprobando 
     * si esta guardado en la tabla correspondiente en la base de datos.
     * 
     * @param string $email El email a verificar
     * @return bool False si es no existe o True si es existe.
    */
    public function verificarNombre($nombre) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
        $stmt->execute(['nombre' => $nombre]);
        if($stmt->fetchColumn() == $nombre){
            $resultado = false;
        }else{
            $resultado = true;
        }

        return $resultado; 
    }


    /**
     * Verifica si una contraseña introducida en el login es correcta.
     * Comprueba que esta asociada a un nombre de usuario dado.
     * 
     * @param string $nombre el nombre del usuario cuya contraseña quieres verificar
     * @param string $contraseña La contraseña a verificar 
     * @return bool False si es incorrecta o True si es correcta.
    */
    public function verificarContraseña($nombre, $contraseña) {
        $hash= $this->sacarContraseñaPorNombre($nombre);
        $result = password_verify( $contraseña, $hash);
        return $result;
    }

    /**
     * Obtiene la contraseña encriptada de un usuario dado su nombre.
     *
     * @param string $nombre Nombre del usuario.
     * @return string|null La contraseña encriptada o null si no se encuentra.
     */
    public function sacarContraseñaPorNombre($nombre) {
        $sql = "SELECT password FROM usuarios WHERE nombre = :nombre";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre]);
        
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
    
        if ($result === false) {
            //return false; // null tambien valdria
            return null; // false tambien valdria //pobrable error
        }
    
        return $result;
    }

    /**
     * Si le das un nombre te devuelve el id del usuario asociado.
     * 
     * @param string $nombre el nombre del usuario
     * @return int|null ID del usuario si existe, o null si no se encuentra
    */
    public function obtenerIdUsuarioPorNombre($nombre) {
        $sql = "SELECT id_usuario
                FROM usuarios
                WHERE nombre = '$nombre'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN)[0];
    }

    /**
     * Guardar un nuevo usuario si le das nombre, email y contraseña.
     * 
     * @param string $nombre el nombre del nuevo usuario
     * @param string $email el correo del nuevo usuario
     * @param string $password La contraseña del nuevo usuario
     * @return int El ID del usuario recién creado
    */
    public function guardarUsuario($nombre, $email, $password) {
        // Encriptar la contraseña antes de almacenarla
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
        $stmt->execute([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $hashedPassword
        ]);
        return $this->pdo->lastInsertId();
    }
}
?>