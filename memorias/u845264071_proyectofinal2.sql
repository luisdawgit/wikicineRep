-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-03-2025 a las 11:54:24
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u845264071_proyectofinal2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `actor_id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`actor_id`, `nombre_completo`) VALUES
(1, 'Arnold Schwarzenegger'),
(19, 'Bill Skarsgård'),
(7, 'Cameron Diaz'),
(30, 'Dean Norris'),
(18, 'Georgina Campbell'),
(4, 'Harrison Ford'),
(8, 'Jack Nicholson'),
(6, 'Jim Carrey'),
(12, 'Justin Long'),
(5, 'Karen Allen'),
(35, 'Kris Kristofferson'),
(33, 'Leonor Varela'),
(2, 'Linda Hamilton'),
(3, 'Michael Biehn'),
(22, 'Michael Ironside'),
(32, 'Norman Reedus'),
(23, 'Rachel Ticotin'),
(34, 'Ron Perlman'),
(10, 'Ryan Gosling'),
(21, 'Sharon Stone'),
(9, 'Shelley Duvall'),
(13, 'Wesley Snipes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `director_id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`director_id`, `nombre_completo`) VALUES
(3, 'Chuck Russell'),
(5, 'Denis Villeneuve'),
(7, 'Federico Álvarez'),
(18, 'Guillermo del Toro'),
(1, 'James Cameron'),
(16, 'Paul Verhoeven'),
(6, 'Ridley Scott'),
(4, 'Stanley Kubrick'),
(9, 'Stephen Norrington'),
(2, 'Steven Spielberg'),
(8, 'Zach Cregger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `genero_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`genero_id`, `nombre`) VALUES
(1, 'Acción'),
(8, 'Animación'),
(7, 'Aventura'),
(5, 'Ciencia Ficción'),
(2, 'Comedia'),
(9, 'Documental'),
(3, 'Drama'),
(6, 'Romance'),
(4, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guionistas`
--

CREATE TABLE `guionistas` (
  `guionista_id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `guionistas`
--

INSERT INTO `guionistas` (`guionista_id`, `nombre_completo`) VALUES
(3, 'Dan O\'Bannon'),
(11, 'David S. Goyer'),
(9, 'Gary Goldman'),
(12, 'Gene Colan'),
(13, 'Marv Wolfman'),
(2, 'Ronald Shusett'),
(1, 'Zach Cregger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `director_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `id_poster` int(11) DEFAULT NULL,
  `puntuacion_media` decimal(2,1) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `titulo`, `director_id`, `genero_id`, `id_poster`, `puntuacion_media`, `sinopsis`, `trailer`) VALUES
(11, 'Terminator', 1, 1, 11, 5.5, 'Un cyborg asesino del futuro llega al pasado para eliminar a la madre del futuro líder de la resistencia humana.', 'nGrW-OR2uDk'),
(12, 'Indiana Jones en busca del arca perdida', 2, 7, 12, 3.0, 'Indiana Jones busca el Arca Perdida mientras se enfrenta a nazis y otros enemigos en su aventura.', '0xQSIdSRlAk'),
(13, 'La Máscara', 3, 2, 13, 0.0, 'Un hombre común encuentra una antigua máscara que le otorga poderes y lo transforma en un superhéroe excéntrico.', 'LZl69yk5lEY'),
(14, 'El Resplandor', 4, 4, 14, 0.0, 'Un hombre es poseído por fuerzas demoníacas en un hotel aislado durante el invierno, mientras su familia lucha por sobrevivir.', 'A-tgsURVNrI'),
(15, 'Blade Runner 2049', 5, 5, 15, 0.0, 'Un blade runner encuentra un secreto enterrado que podría alterar el futuro de la humanidad.', 'dtmEJE3LnYI'),
(16, 'Alien', 6, 4, 16, 0.0, 'Una nave espacial aterriza en un planeta desconocido, donde una amenaza extraterrestre empieza a acechar a los tripulantes.', 'jQ5lPt9edzQ'),
(17, 'Aliens', 1, 4, 17, 0.0, 'Ripley regresa al planeta donde enfrentó al Xenomorfo, ahora acompañada por un grupo de marines espaciales.', 'oSeQQlaCZgU'),
(18, 'Alien Covenant', 6, 4, 18, 0.0, 'Una tripulación en misión para colonizar un planeta descubre algo inesperado y aterrador.', 'zM_8SvQXBso'),
(21, 'Alien Romulus', 7, 4, 21, 0.0, 'La humanidad enfrenta un nuevo capítulo en su lucha contra los Xenomorfos.', 'ozlGL6qsB_I'),
(52, 'Total Recall', 16, 5, 52, 0.0, '', '684nkWhd658'),
(53, 'BLADE 2', 18, 1, 322, 9.9, '', 'vAUB7dcUn8o');

--
-- Disparadores `peliculas`
--
DELIMITER $$
CREATE TRIGGER `after_insert_peliculas` AFTER INSERT ON `peliculas` FOR EACH ROW BEGIN
    -- Inserta una relación por defecto en pelicula_genero para la nueva película
    INSERT INTO pelicula_genero (pelicula_id, genero_id)
    VALUES (NEW.pelicula_id, NEW.genero_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_puntuacion_usuarios`
--

CREATE TABLE `peliculas_puntuacion_usuarios` (
  `pelicula_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `puntuacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `peliculas_puntuacion_usuarios`
--

INSERT INTO `peliculas_puntuacion_usuarios` (`pelicula_id`, `id_usuario`, `puntuacion`) VALUES
(11, 1, 1),
(11, 3, 10),
(12, 1, 5),
(12, 3, 1),
(53, 3, 10);

--
-- Disparadores `peliculas_puntuacion_usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_insert_peliculas_puntuacion_usuarios` AFTER INSERT ON `peliculas_puntuacion_usuarios` FOR EACH ROW BEGIN
    -- Recalcular la puntuación media de la película
    UPDATE peliculas
    SET puntuacion_media = (
        SELECT AVG(puntuacion)
        FROM peliculas_puntuacion_usuarios
        WHERE pelicula_id = NEW.pelicula_id
    )
    WHERE pelicula_id = NEW.pelicula_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_peliculas_puntuacion_usuarios` AFTER UPDATE ON `peliculas_puntuacion_usuarios` FOR EACH ROW BEGIN
    -- Recalcular la puntuación media de la película
    UPDATE peliculas
    SET puntuacion_media = (
        SELECT AVG(puntuacion)
        FROM peliculas_puntuacion_usuarios
        WHERE pelicula_id = NEW.pelicula_id
    )
    WHERE pelicula_id = NEW.pelicula_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_actor`
--

CREATE TABLE `pelicula_actor` (
  `pelicula_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `pelicula_actor`
--

INSERT INTO `pelicula_actor` (`pelicula_id`, `actor_id`) VALUES
(11, 1),
(11, 2),
(11, 3),
(12, 4),
(12, 5),
(13, 6),
(13, 7),
(14, 8),
(14, 9),
(15, 4),
(15, 10),
(52, 1),
(52, 21),
(52, 22),
(52, 23),
(52, 30),
(53, 13),
(53, 32),
(53, 33),
(53, 34),
(53, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_genero`
--

CREATE TABLE `pelicula_genero` (
  `pelicula_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `pelicula_genero`
--

INSERT INTO `pelicula_genero` (`pelicula_id`, `genero_id`) VALUES
(11, 1),
(12, 7),
(13, 2),
(14, 4),
(15, 5),
(16, 4),
(17, 4),
(18, 4),
(21, 4),
(52, 5),
(53, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_guionista`
--

CREATE TABLE `pelicula_guionista` (
  `pelicula_id` int(11) NOT NULL,
  `guionista_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `pelicula_guionista`
--

INSERT INTO `pelicula_guionista` (`pelicula_id`, `guionista_id`) VALUES
(52, 2),
(52, 3),
(52, 9),
(53, 11),
(53, 12),
(53, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posters`
--

CREATE TABLE `posters` (
  `id_poster` int(11) NOT NULL,
  `ruta_poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `posters`
--

INSERT INTO `posters` (`id_poster`, `ruta_poster`) VALUES
(18, 'alien covenant.jpg'),
(21, 'alien romulus.jpg'),
(16, 'alien.jpg'),
(17, 'aliens.jpg'),
(0, 'Barbarian.jpg'),
(15, 'Blade Runner 2049.jpg'),
(14, 'El resplandor.jpg'),
(12, 'Indiana Jones en busca del arca perdida.jpg'),
(13, 'La Máscara.jpg'),
(52, 'poster_6790f43d0d8cd-91tNhh4yb1L._AC_UF894,1000_QL80_.jpg'),
(322, 'poster_6790ff7f9e93d-blade 2.jpg'),
(327, 'poster_67927b5612588-Hardcore_Henry-large.jpg'),
(1, 'terminator'),
(11, 'terminator.jpg'),
(26, 'the cabin in the woods.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`) VALUES
(1, 'james', 'james@gmail.com', '$2y$10$M0qbk/mSUmMVlDLK8tS6Bu1FgBD5zKkYI6I0lidvR9rn4bQIvPc7q'),
(2, 'paco', 'paco@gmail.com', '$2y$10$caAr5GkSwI7JFAr0ACPUTe40dU4BrWn91W5IEXw11PvFq.M3prj6q'),
(3, 'jack', 'jack@gmail.com', '$2y$10$/BCvqAZevGsECN.3B77c7enPz583GSW00cSov0ri6ub2sOrL2YjY6'),
(4, 'marco', 'marco@gmail.com', '$2y$10$T97FjcvQeq6dNgg3MW8SjOl0peNre041yqQGJzJdlyri/xR8R1Otu'),
(6, 'rodri', 'rodri@gmail.com', '$2y$10$OP5ZLSgIuwiP4unVDyf65OPCzBWbJtzpL/KYRI7RfK0GjR5yrpbnu'),
(7, 'ventrue', 'ventrue@gmail.com', '$2y$10$AHeNduImytiYQa2PnNlDlOeWuNkQtbHuXFmkmZLQJBSZp713U3uJ.'),
(8, 'nosferatu', 'nosferatu@gmail.com', '$2y$10$zll5vkkuJtHvxfdZCZiBA.uXyb4yYznUNKNleaue/GYlSMS0BajAm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`actor_id`),
  ADD UNIQUE KEY `nombre_completo` (`nombre_completo`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`director_id`),
  ADD UNIQUE KEY `nombre_completo` (`nombre_completo`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  ADD PRIMARY KEY (`guionista_id`),
  ADD UNIQUE KEY `nombre_completo` (`nombre_completo`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD UNIQUE KEY `trailer` (`trailer`),
  ADD KEY `director_id` (`director_id`),
  ADD KEY `id_poster` (`id_poster`);

--
-- Indices de la tabla `peliculas_puntuacion_usuarios`
--
ALTER TABLE `peliculas_puntuacion_usuarios`
  ADD PRIMARY KEY (`pelicula_id`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pelicula_actor`
--
ALTER TABLE `pelicula_actor`
  ADD PRIMARY KEY (`pelicula_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indices de la tabla `pelicula_genero`
--
ALTER TABLE `pelicula_genero`
  ADD PRIMARY KEY (`pelicula_id`,`genero_id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- Indices de la tabla `pelicula_guionista`
--
ALTER TABLE `pelicula_guionista`
  ADD PRIMARY KEY (`pelicula_id`,`guionista_id`),
  ADD KEY `guionista_id` (`guionista_id`);

--
-- Indices de la tabla `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id_poster`),
  ADD UNIQUE KEY `ruta_poster` (`ruta_poster`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  MODIFY `guionista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `pelicula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `posters`
--
ALTER TABLE `posters`
  MODIFY `id_poster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directores` (`director_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_poster`) REFERENCES `posters` (`id_poster`) ON DELETE SET NULL;

--
-- Filtros para la tabla `peliculas_puntuacion_usuarios`
--
ALTER TABLE `peliculas_puntuacion_usuarios`
  ADD CONSTRAINT `peliculas_puntuacion_usuarios_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peliculas_puntuacion_usuarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_actor`
--
ALTER TABLE `pelicula_actor`
  ADD CONSTRAINT `pelicula_actor_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`actor_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_genero`
--
ALTER TABLE `pelicula_genero`
  ADD CONSTRAINT `pelicula_genero_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_genero_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`genero_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_guionista`
--
ALTER TABLE `pelicula_guionista`
  ADD CONSTRAINT `pelicula_guionista_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`pelicula_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_guionista_ibfk_2` FOREIGN KEY (`guionista_id`) REFERENCES `guionistas` (`guionista_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
