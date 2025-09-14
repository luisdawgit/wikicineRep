<?php
//Modelo_DatosPeliculas.php
require_once 'Conexion.php';
    
class Modelo_DatosPeliculas {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        // Usar la conexión desde Conexion.php
        $this->pdo = Conexion::obtenerConexion($host, $dbname, $username, $password);
    }

    /**
     * Mandar puntuacion de pelicula 
     * a base de datos.
     * 
     */
    public function mandarPuntuacionAtabla($pelicula_id, $usuario_id, $puntuacion) {
        $consulta = "
            INSERT INTO peliculas_puntuacion_usuarios 
            (pelicula_id, id_usuario, puntuacion) 
            VALUES (:pelicula_id, :id_usuario, :puntuacion)
            ON DUPLICATE KEY UPDATE puntuacion = :puntuacion";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute(
            [
                'pelicula_id' => $pelicula_id,
                'id_usuario' => $usuario_id,
                'puntuacion' => $puntuacion
            ]
        );   
    }

    /**
     * Saca el nombre y extension del poster en la base de datos
     * que corresponde al id aportado por parametro.
     * 
     * @param string $titulo El título de la película a buscar.
     * @return bool Retorna true si el título existe, de lo contrario false.
     */
    public function sacarNombrePoster($idPoster) {

        $consulta = "SELECT ruta_poster FROM posters WHERE id_poster = :idPoster";
        $stmt = $this->pdo->prepare($consulta);

        // Vincula el parámetro de forma segura
        $stmt->execute(['idPoster'=>$idPoster]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Retorna true si existe, false si no
        return $resultado[0];
    }

    /**
     * Comprueba si el titulo de pelicula existe en la base de datos.
     * @param string $titulo El título de la película a buscar.
     * @return bool Retorna true si el título existe, de lo contrario false.
     */
    public function sacarIdPelicula($titulo) {

        $consulta = "SELECT pelicula_id FROM peliculas WHERE titulo = :titulo";
        $stmt = $this->pdo->prepare($consulta);

        // Vincula el parámetro de forma segura
        $stmt->execute(['titulo'=>$titulo]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna true si existe, false si no
        return $resultado['pelicula_id'];
    }

    /**
     * Comprueba si el titulo de pelicula existe en la base de datos.
     * @param string $titulo El título de la película a buscar.
     * @return bool Retorna true si el título existe, de lo contrario false.
     */
    public function comprobarTituloEnTabla($titulo) {
        
        $consulta = "SELECT titulo FROM peliculas WHERE titulo = :titulo";
        $stmt = $this->pdo->prepare($consulta);

        // Vincula el parámetro de forma segura
        $stmt->execute(['titulo'=>$titulo]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);



        // Retorna true si existe, false si no
        return $resultado !== false;
    }

    /**
     * Comprueba si el trailer de una pelicula existe en la base de datos.
     * @param string $idTrailer El id del trailer de la película a buscar.
     * @return bool Retorna true si el trailer existe, de lo contrario false.
     */
    public function comprobarTrailerEnTabla($idTrailer) {
        
        $consulta = "SELECT trailer FROM peliculas WHERE trailer = :trailer";
        $stmt = $this->pdo->prepare($consulta);

        // Vincula el parámetro de forma segura
        $stmt->execute(['trailer'=>$idTrailer]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna true si existe, false si no
        return $resultado !== false;
    }

    /**
     * Comprueba si el guionista existe en la base de datos.
     * @param string $nombreGuionista El nombre del guionista a buscar.
     * @return bool Retorna true si el guionista existe, de lo contrario false.
     */
    public function comprobarGuionistaEnTabla($nombreGuionista) {

        $consulta = "SELECT nombre_completo FROM guionistas WHERE nombre_completo = :nombreGuionista";
        $stmt = $this->pdo->prepare($consulta);
        
        // Vincula el parámetro de forma segura
        $stmt->execute(['nombreGuionista'=>$nombreGuionista]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Retorna true si existe, false si no
        return $resultado !== false;
    }

    /**
     * Comprueba si el actor existe en la base de datos.
     * @param string $nombreActor El nombre del actor a buscar.
     * @return bool Retorna true si el actor existe, de lo contrario false.
     */
    public function comprobarActorEnTabla($nombreActor) {
        
        $consulta = "SELECT nombre_completo FROM actores WHERE nombre_completo = :nombreActor";
        $stmt = $this->pdo->prepare($consulta);
        
        // Vincula el parámetro de forma segura
        $stmt->execute(['nombreActor'=>$nombreActor]);
        
        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Retorna true si existe, false si no
        return $resultado !== false;
    }

    /**
     * Comprueba si el director de pelicula existe en la base de datos.
     * @param string $nombreDirector El nombre del director a buscar.
     * @return bool Retorna true si el actor existe, de lo contrario false.
     */
    public function comprobarDirectorEnTabla($nombreDirector) {

        $consulta = "SELECT nombre_completo FROM directores WHERE nombre_completo = :nombreDirector";
        $stmt = $this->pdo->prepare($consulta);

        // Vincula el parámetro de forma segura
        $stmt->execute(['nombreDirector'=>$nombreDirector]);

        // Comprueba si hay algún resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna true si existe, false si no
        return $resultado !== false;
    }


    //--- Metodos trailer ------------

    /**
     * Diferencia el tipo de url que le aportas.
     * Existen 2 tipos de url que podria llegar:
     * Desde la barra de navegacion
     * Desde de 'clic derecho->copiar Url'
     */
    public function sacarIdTrailerDeUrl($urlUsuario){
    
        $urlBarraNavegacion = "https://www.youtube.com/watch?v=";
        $urlClickDerecho = "https://youtu.be/";

        if (strpos($urlUsuario, $urlBarraNavegacion) !== false) {
            $tipoEntrada = 1;
        //----Trailer--------
            $url = $urlUsuario;
            $parsed_url= parse_url($url);
            $query_params = "v";
            parse_str($parsed_url['query'], $query_params);
            $idTrailer = $query_params['v'];
        //----Trailer end--------
        }
        if (strpos($urlUsuario, $urlClickDerecho) !== false) {
            $tipoEntrada = 2;
        //----Trailer --------
            $idTrailer = substr($urlUsuario, strlen($urlClickDerecho));
        //----Trailer end--------
        }
        return $idTrailer;
        }

    public function crearNuevoUrlTrailer($urlTrailer){
        $consulta =
            "INSERT INTO peliculas (trailer) VALUES (:urlTrailer)";
            
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'urlTrailer' => $urlTrailer
            ]);
    }

    //--- Metodos trailer end --------
    
    /**
     * Inserta una nueva entrada en la tabla actores
     * con el nombre que se pasa por parametro.
     * 
     **/
    public function crearNuevoPoster($posterNombre) {
        $consulta = 
        "INSERT INTO posters (ruta_poster) VALUES (:posterNombre)";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'posterNombre' => $posterNombre
            ]);
    }

    /**
     * Inserta una nueva entrada en la tabla actores
     * con el nombre que se pasa por parametro.
     * 
     **/
    public function crearNuevoActor($actorNombre) {
        $consulta = 
        "INSERT INTO actores (nombre_completo) VALUES (:actorNombre)";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'actorNombre' => $actorNombre
            ]);
    }

    /**
     * Inserta una nueva entrada en la tabla guionistas
     * con el nombre que se pasa por parametro.
     * 
     **/
    public function crearNuevoGuionista($guionistaNombre) {
        $consulta = 
        "INSERT INTO guionistas (nombre_completo) VALUES (:guionistaNombre)";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'guionistaNombre' => $guionistaNombre
            ]);
    }

    /**
     * Inserta una nueva entrada en la tabla directores
     * con el nombre que se pasa por parametro.
     * 
     **/
    public function crearNuevoDirector($directorNombre) {
        $consulta = 
        " INSERT INTO directores (nombre_completo)
            VALUES (:directorNombre)
        ";
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'directorNombre' => $directorNombre
            ]);
    }

    /**
     * Inserta una nueva entrada en la tabla pelicula_genero
     * con el id de genero y el id de pelicula que se pasa por parametro.
     * 
     **/
    public function crearNuevaPeliculaGenero($peliculaId, $generoId) {
        $consulta = 
        "INSERT INTO pelicula_genero (pelicula_id, genero_id) VALUES (:pelicula_id, :genero_id)";
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'pelicula_id' => $peliculaId ,
            'genero_id' => $generoId
            ]);
    }
    
    /**
     * Inserta una nueva entrada en la tabla pelicula_actor
     * con el id de actor y el id de pelicula que se pasa por parametro.
     * 
     **/
    public function crearNuevaPeliculaActor($peliculaId, $actorId) {
        $consulta = 
        "INSERT INTO pelicula_actor (pelicula_id, actor_id) VALUES (:pelicula_id, :actor_id)";
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'pelicula_id' => $peliculaId ,
            'actor_id' => $actorId
            ]);
    }

    /**
     * Inserta una nueva entrada en la tabla pelicula_guionista
     * con el id de actor y el id de pelicula que se pasa por parametro.
     * 
     **/
    public function crearNuevaPeliculaGuionista($peliculaId, $guionistaId) {
        $consulta = 
        "INSERT INTO pelicula_guionista (pelicula_id, guionista_id) VALUES (:pelicula_id, :guionista_id)";
        
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'pelicula_id' => $peliculaId ,
            'guionista_id' => $guionistaId
            ]);
    }


    /**
     * Mandar datos de la nueva pelicula 
     * a la tabla peliculas en la base de datos
     * 
     * @param $titulo 
     * @param $directorNombre 
     * @param $posterNombre 
     * @param $puntuacion_media 
     * @param $sinopsis 
     * @param $trailer 
     */
    public function crearNuevaPelicula($titulo,$directorNombre,$posterNombre,$puntuacion_media,$sinopsis,$trailer) {
        $consulta = "
            INSERT INTO peliculas (titulo, director_id, id_poster, puntuacion_media, sinopsis, trailer)
            VALUES (
            :titulo,
            (SELECT director_id FROM directores WHERE nombre_completo = :directorNombre),
            (SELECT id_poster FROM posters WHERE ruta_poster = :posterNombre),
            :puntuacion_media,
            :sinopsis,
            :trailer
            )";

        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([
            'titulo' => $titulo,
            'directorNombre' => $directorNombre,
            'posterNombre' => $posterNombre,
            'puntuacion_media' => $puntuacion_media,
            'sinopsis' => $sinopsis,
            'trailer' => $trailer
            ]);
    }

    
    //Metodos que sacan info de la base de datos.

    /**
     * Sacar el nombre director si le das el id director
     * en la tabla directores.
     * 
     * @param $directorId el id del director 
     * @return array con el nombre del director en la primera posicion
     **/
    public function sacarNombreDirectorPorIdDirector($directorId): array {
        $sql = "SELECT nombre_completo
                FROM directores
                WHERE director_id = '$directorId'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }


//Esto dara PROBLEMAS con el gran cambio en la BASE DE DATOS PROBLEMAS BASE DE DATOS  
    /**
     * Obtener informacion de todas las películas 
     * pertenecientes a un genero por el id de genero.
     *
     * @param int $generoid El id del género de la pelicula a buscar.
     * @return array Lista de películas del género especificado.
     */
    public function sacarInfoPeliculasPorIdGenero($generoid) {

        $sql = "SELECT * FROM peliculas WHERE genero_id = $generoid";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


/**
 * Nuevo
 * Si le das el id de una pelicula 
 * devuelve los id del genero al que pertenece cada pelicula.
 * 
*/
    public function sacarIdGeneroDePelicula($idPelicula) {
        $consulta =  "SELECT genero_id FROM pelicula_genero WHERE pelicula_id = '$idPelicula'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $arrIdActores = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $arrIdActores;
    }

//Alterado ---
    /**
     * Le das un nombre de un genero
     * y te devuelve un array toda la informacion de cada pelicula de ese genero.
     * 
     * @param string $generoNombre
     * @return array $arrPeliculasDeGenero;
     */
public function sacarInfoDePeliculasDeGenero($nombreGenero) {
    $stmt = $this->pdo->prepare(
        "SELECT p.* FROM peliculas p
        INNER JOIN pelicula_genero pg ON p.pelicula_id = pg.pelicula_id
        INNER JOIN generos g ON pg.genero_id = g.genero_id
        WHERE g.nombre = ?"
    );
    $stmt->execute([$nombreGenero]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    // Obtener las películas asociadas a un género
    public function sacarInfoDePeliculasDeGeneroNueva($nombreGenero) {
        $idGenero = $this->sacarIdGeneroPorNombre($nombreGenero);
        if (!$idGenero) return [];

        $stmt = $this->pdo->prepare(
            "SELECT p.* FROM peliculas p
            JOIN pelicula_genero pg ON p.pelicula_id = pg.pelicula_id
            WHERE pg.genero_id = ?"
        );
        $stmt->execute([$idGenero]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener el ID de un género por su nombre
    public function sacarIdGeneroPorNombre($nombreGenero) {
        $sql = "SELECT genero_id FROM generos WHERE nombre = :nombreGenero";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nombreGenero' => $nombreGenero]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado ? $resultado['genero_id'] : null;
    }

//---
    /**
     * Le das un nombre de un genero
     * y te devuelve un array toda la informacion de cada pelicula de ese genero.
     * 
     * @param string $generoNombre
     * @return array $arrPeliculasDeGenero;
     */
    public function sacarInfoDePeliculasDeGenero2($generoNombre){

        $generoIdArr = $this->sacarIdGeneroPorNombreGenero($generoNombre);
        $arrPeliculasDeGenero=[];
    
        foreach($generoIdArr as $id){
            $arrPeliculasDeGenero = $this->sacarInfoPeliculasPorIdGenero($id);
        }
        
        return $arrPeliculasDeGenero;
    }
//Alterado end ---

    /**
     * Obtener lista de nombres de los géneros 
     * de la tabla generos.
     *
     * @return array Lista de nombres de los distintos géneros de la tabla generos.
     */
    public function sacarNombreGeneros() {
        $sql = "SELECT nombre
                FROM generos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }


//--- Metodos para pagina de pelicula seleccionada

//Nuevo ---
    /**
     * Si le das
     * el id de una pelicula
     * te devuelve un array con los id de los guionistas
     * 
     * @param int $idPelicula El id de la pelicula
     * @return array con los id de los guionistas
     */
    public function sacarIdGuionistasDePelicula($idPelicula) {

        $consulta =  "SELECT guionista_id FROM pelicula_guionista WHERE pelicula_id = '$idPelicula'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $arrIdActores = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $arrIdActores;
    }
//Nuevo end ---


    /**
     * Si le das
     * el id de una pelicula
     * te devuelve un array con los id de los actores
     * 
     * @param int $idPelicula El id de la pelicula
     * @return array con los id de los actores
     */
    public function sacarIdActoresDePelicula($idPelicula) {

        $consulta =  "SELECT actor_id FROM pelicula_actor WHERE pelicula_id = '$idPelicula'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $arrIdActores = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $arrIdActores;
    }

    /**
     * Le das el id de un actor y te devuelve su nombre completo.
     * 
     * @param int $idActor 
     * @return string el nombre del actor
     */
    public function sacarNombreActorPorIdActor($idActor){
        
        $consulta =  "SELECT nombre_completo FROM actores WHERE actor_id = '$idActor'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $unicaPos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $unicaPos[0];
    }
    
    /**
     * Le das el nombre de un actor y te devuelve su id.
     * 
     * @param string el nombre del actor
     * @return int $idActor
     */
    public function sacarIdActorPorNombreActor($nombreActor){
        
        $consulta =  "SELECT actor_id FROM actores WHERE nombre_completo = :nombreActor";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute(['nombreActor'=>$nombreActor]);
        $nombreActor = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $nombreActor[0];
        return $nombreActor[0]['actor_id'];
    }
    
    //Nuevo ---
    /**
     * Le das el id de un guionista y te devuelve su nombre completo.
     * 
     * @param int $idGuionista 
     * @return string el nombre del guionista
     */
    public function sacarNombreGuionistaPorIdGuionista($idGuionista){
        
        $consulta =  "SELECT nombre_completo FROM guionistas WHERE guionista_id = '$idGuionista'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $unicaPos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $unicaPos[0];
    }
    //Nuevo end ---
    
    /**
     * Le das el nombre de un guionista y te devuelve su id.
     * 
     * @param string el nombre del guionista
     * @return int $nombreGuionista
     */
    public function sacarIdGuionistaPorNombreGuionista($nombreGuionista){
        
        $consulta =  "SELECT guionista_id FROM guionistas WHERE nombre_completo = :nombreGuionista";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute(['nombreGuionista'=>$nombreGuionista]);
        $nombreGuionista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // return $nombreGuionista[0];
        return $nombreGuionista[0]['guionista_id'];
    }


    /**
    * Si le das un ID de un pelicula
    * te devuelve un array con todos los actores de la pelicula.
    *  
    */
    public function sacarRepartoPelicula($idPelicula){ 
        $arrNombreActores = [];

        $idActoresArray = $this->sacarIdActoresDePelicula( $idPelicula);
    
        foreach($idActoresArray as $idActor){
            $nombreActorArr = $this->sacarNombreActorPorIdActor($idActor);

            foreach($nombreActorArr as $nombre) {
                $arrNombreActores[] = $nombre;
            }
        }

        return $arrNombreActores;
    }

    //Nuevo ---
    /**
    * Si le das un ID de un pelicula
    * te devuelve un array con todos los guionistas de la pelicula.
    *  
    */
    public function sacarGuionistasPelicula($idPelicula){ 
        $arrNombreGuionistas = [];

        $idGuionistasArray = $this->sacarIdGuionistasDePelicula( $idPelicula);
    
        foreach($idGuionistasArray as $idGuionista){
            $nombreGuionistaArr = $this->sacarNombreGuionistaPorIdGuionista($idGuionista);

            foreach($nombreGuionistaArr as $nombre) {
                $arrNombreGuionistas[] = $nombre;
            }
        }

        return $arrNombreGuionistas;
    }
    //Nuevo end ---

    /**
     *
     * Le das un id de un poster
     * y te devuelve el nombre de ese poster.
     * 
     * @param string $nombrePoster El nombre del genero
     * @return array Array con el id del genero
     */
    public function sacarIdPosterPorNombrePoster($nombrePoster) {

        $consulta = "SELECT id_poster FROM posters WHERE ruta_poster = '$nombrePoster'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $result;
    }

//--- Metodos para pastillas de seccion por genero
    /**
     *
     * Le das un nombre de un genero 
     * y te devuelve el id de ese genero en la tabla generos.
     *
     * Tabla generos
     * 
     * @param string $generoNombre El nombre del genero
     * @return array Array con el id del genero
     */
    public function sacarIdGeneroPorNombreGenero($generoNombre) {

        $consulta = "SELECT genero_id FROM generos WHERE nombre = '$generoNombre'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Le das el id de un genero y te devuelve su nombre.
     * @param int $generoId El nombre del genero
     * @return array Array con el nombre del genero
     */
    public function sacarNombreGeneroPorIdGenero($generoId){

        $consulta = "SELECT nombre FROM generos WHERE genero_id = :generoId";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute([':generoId' => $generoId]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado ? $resultado['nombre'] : null;
    }
    
    //Borrar
    public function sacarNombreGeneroPorIdGenero2($generoId){

        $consulta = "SELECT nombre FROM generos WHERE genero_id = '$generoId'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }


//---
    /**
     * Le das el id de una pelicula 
     * y te devuelve info de la tabla peliculas
     * y de las tablas relacionadas a esta.
     * 
     * Invoca varios metodos que devuelven varias listas
     * y las combina en una sola lista.
     * 
     * @param int $idPelicula
     * @return array
     */
    public function sacarInfoDePeliculaPorId($idPelicula){

        $consulta = "SELECT * 
                     FROM peliculas 
                     WHERE pelicula_id = '$idPelicula'";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>