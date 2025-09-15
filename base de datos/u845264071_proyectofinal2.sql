-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-09-2025 a las 11:42:37
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
(71, 'Alfred Molina'),
(74, 'Amrish Puri'),
(98, 'Amy Poehler'),
(82, 'Amy Yasbeck'),
(58, 'Anne Hathaway'),
(1, 'Arnold Schwarzenegger'),
(54, 'ASSAMITA'),
(55, 'ASSAMITA EXTRA'),
(118, 'Ben Burtt'),
(77, 'Ben Stein'),
(101, 'Bill Hader'),
(60, 'Bill Irwin'),
(19, 'Bill Skarsgård'),
(91, 'Bolaji Badejo'),
(39, 'Bradley Cooper'),
(49, 'BRUJAH'),
(117, 'Bunta Sugawara'),
(7, 'Cameron Diaz'),
(30, 'Dean Norris'),
(69, 'Denholm Elliott'),
(105, 'Diane Lane'),
(109, 'Donal Logue'),
(41, 'Ed Helms'),
(119, 'Elissa Knight'),
(63, 'Ellen Burstyn'),
(121, 'Fred Willard'),
(46, 'GANGREL'),
(18, 'Georgina Campbell'),
(95, 'Gina Rodriguez'),
(4, 'Harrison Ford'),
(87, 'Harry Dean Stanton'),
(89, 'Ian Holm'),
(8, 'Jack Nicholson'),
(120, 'Jeff Garlin'),
(94, 'Jennifer Jason Leigh'),
(59, 'Jessica Chastain'),
(6, 'Jim Carrey'),
(80, 'Jim Doughan'),
(88, 'John Hurt'),
(62, 'John Lithgow'),
(122, 'John Ratzenberger'),
(68, 'John Rhys-Davies'),
(73, 'Jonathan Ke Quan'),
(40, 'Justin Bartha'),
(12, 'Justin Long'),
(104, 'Kaitlyn Dias'),
(5, 'Karen Allen'),
(72, 'Kate Capshaw'),
(123, 'Kathy Najimy'),
(35, 'Kris Kristofferson'),
(106, 'Kyle MacLachlan'),
(48, 'lasombra'),
(33, 'Leonor Varela'),
(102, 'Lewis Black'),
(2, 'Linda Hamilton'),
(124, 'MacInTalk'),
(61, 'Mackenzie Foy'),
(44, 'MALKAVIAN'),
(112, 'Mari Natsuki'),
(65, 'Matt Damon'),
(57, 'Matthew McConaughey'),
(3, 'Michael Biehn'),
(64, 'Michael Caine'),
(22, 'Michael Ironside'),
(103, 'Mindy Kaling'),
(111, 'Miyu Irino'),
(108, 'N\'Bushe Wright'),
(92, 'Natalie Portman'),
(32, 'Norman Reedus'),
(45, 'NOSFERATU'),
(78, 'Orestes Matacena'),
(93, 'Oscar Isaac'),
(66, 'Paul Freeman'),
(83, 'Peter Greene'),
(81, 'Peter Riegert'),
(76, 'Philip Stone'),
(99, 'Phyllis Smith'),
(23, 'Rachel Ticotin'),
(79, 'Richard Jeni'),
(100, 'Richard Kind'),
(34, 'Ron Perlman'),
(67, 'Ronald Lacey'),
(75, 'Roshan Seth'),
(110, 'Rumi Hiiragi'),
(10, 'Ryan Gosling'),
(21, 'Sharon Stone'),
(9, 'Shelley Duvall'),
(85, 'Sigourney Weaver'),
(107, 'Stephen Dorff'),
(116, 'Takehiko Ono'),
(113, 'Takeshi Naito'),
(96, 'Tessa Thompson'),
(84, 'Tom Skerritt'),
(47, 'TOREADOR'),
(50, 'TREMERE'),
(51, 'TREMERE EXTRA'),
(115, 'Tsunehiko Kamijō'),
(97, 'Tuva Novotny'),
(56, 'VAMPIRO_V5'),
(42, 'VENTRUE'),
(86, 'Veronica Cartwright'),
(13, 'Wesley Snipes'),
(70, 'Wolf Kahler'),
(90, 'Yaphet Kotto'),
(114, 'Yasuko Sawaguchi'),
(38, 'Zach Galifianakis');

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
(34, 'Alex Garland'),
(37, 'Andrew Stanton'),
(31, 'ASSAMITA'),
(28, 'BRUJAH'),
(33, 'Christopher Nolan'),
(3, 'Chuck Russell'),
(5, 'Denis Villeneuve'),
(7, 'Federico Álvarez'),
(25, 'GANGREL'),
(18, 'Guillermo del Toro'),
(36, 'Hayao Miyazaki'),
(1, 'James Cameron'),
(27, 'lasombra'),
(23, 'MALKAVIAN'),
(24, 'NOSFERATU'),
(16, 'Paul Verhoeven'),
(35, 'Pete Docter'),
(6, 'Ridley Scott'),
(4, 'Stanley Kubrick'),
(9, 'Stephen Norrington'),
(2, 'Steven Spielberg'),
(20, 'Todd Phillips'),
(26, 'TOREADOR'),
(29, 'TREMERE'),
(32, 'VAMPIRO_V5'),
(21, 'VENTRUE'),
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
(38, 'Alex Garland'),
(29, 'ASSAMITA'),
(24, 'BRUJAH'),
(3, 'Dan O\'Bannon'),
(11, 'David S. Goyer'),
(21, 'GANGREL'),
(9, 'Gary Goldman'),
(12, 'Gene Colan'),
(35, 'Gloria Katz'),
(42, 'Hayao Miyazaki'),
(43, 'Jim Reardon'),
(15, 'Jon Lucas'),
(31, 'Jonathan Nolan'),
(41, 'Josh Cooley'),
(23, 'lasombra'),
(33, 'Lawrence Kasdan'),
(19, 'MALKAVIAN'),
(37, 'Mark Verheiden'),
(13, 'Marv Wolfman'),
(40, 'Meg LeFauve'),
(36, 'Michael Fallon'),
(20, 'NOSFERATU'),
(39, 'Pete Docter'),
(2, 'Ronald Shusett'),
(16, 'Scott Moore'),
(32, 'Steven Spielberg'),
(22, 'TOREADOR'),
(25, 'TREMERE'),
(26, 'TREMERE EXTRA'),
(30, 'VAMPIRO_V5'),
(17, 'VENTRUE'),
(34, 'Willard Huyck'),
(1, 'Zach Cregger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `director_id` int(11) DEFAULT NULL,
  `id_poster` int(11) DEFAULT NULL,
  `puntuacion_media` decimal(2,1) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `titulo`, `director_id`, `id_poster`, `puntuacion_media`, `sinopsis`, `trailer`) VALUES
(52, 'Total Recall', 16, 52, 9.9, 'La Tierra, año 2084. Doug Quaid, un hombre que lleva una vida aparentemente tranquila, vive atormentado por una pesadilla que todas las noches lo transporta a Marte. Decide entonces recurrir al laboratorio de Recall, una empresa de vacaciones virtuales que le ofrece la oportunidad de materializar su sueño gracias a un fuerte alucinógeno, pero la droga hace aflorar a su memoria una estancia verdadera en Marte cuando era el más temido agente.', '684nkWhd658'),
(53, 'BLADE 2', 18, 322, 6.0, 'Los Reapers, una nueva raza de vampiros, aparece para atacar tanto a humanos como a los de su propia raza. El Consejo de la Sombra, temiendo por su supervivencia, propone a Blade que olviden su rivalidad y trabajen juntos en esta ocasión.', 'vAUB7dcUn8o'),
(61, 'Resacon en Las Vegas', 20, 331, 9.0, 'Tres amigos se despiertan de una despedida de soltero en Las Vegas sin recordar nada de la noche anterior y con el soltero desaparecido. Deben recorrer la ciudad para encontrar a su amigo a tiempo para su boda.', '_esKPsFVjsg'),
(99, 'Interestelar', 33, 369, 0.0, 'Ambientada en un futuro distópico donde la humanidad está luchando por sobrevivir, ya que la Tierra se está volviendo inhabitable por el polvo que está arrasando con todo, cuenta la historia de un grupo de astronautas que viajan a través de un agujero de gusano cerca de Saturno en busca de un nuevo hogar para la humanidad.', 'UoSSbmD9vqc'),
(100, 'Indiana Jones en busca del arca perdida', 2, 370, 0.0, 'Después de una infructuosa misión en Sudamérica, el Gobierno estadounidense encarga al arqueólogo Indiana Jones la búsqueda del Arca de la Alianza, una reliquia bíblica que contiene los diez mandamientos y que convierte en invencible a su portador.', 'ekD0PzSUVDI'),
(101, 'indiana jones y el templo maldito', 2, 371, 2.0, 'En Shanghái, Indiana Jones se mete en un lío con unos gánsters que compiten por una joya. Finalmente consigue escapar del lugar con una bella cantante y su joven acompañante. Los tres escapan en una avioneta que, tras un accidentado vuelo, aterriza en el corazón de la India. Allí intentarán ayudar a los habitantes de un pequeño poblado que ha quedado devastado después del robo de una joya sagrada con poderes.', 'WBdyLyijZhU'),
(102, 'La Máscara', 3, 372, 0.0, 'Un desafortunado empleado de banca encuentra una antigua máscara mágica que representa a Loki (el dios nórdico de la malicia y la travesura) que lo convierte en un superhéroe bromista y chiflado que actúa según sus deseos más profundos.', 'Ic7rUX6pcmA'),
(103, 'Barbarian', 8, 373, 0.0, 'Una joven que viaja a Detroit para una entrevista de trabajo alquila una casa para pernoctar. Pero cuando llega a altas horas de la noche, descubre que la casa está doblemente reservada y que un extraño hombre ya se está quedando allí.', 'Dr89pmKrqkI'),
(104, 'Alien: el octavo pasajero', 6, 374, 0.0, 'De regreso a la Tierra, la nave de carga Nostromo interrumpe su viaje y despierta a sus siete tripulantes. El ordenador central, MADRE, ha detectado la misteriosa señal de socorro, procedente de un planeta cercano aparentemente deshabitado.\r\nLa nave se dirige entonces al extraño planeta para investigar el origen de la comunicación\r\nSin saberlo, sube a bordo una letal forma de vida extraterrestre.', 'Eu9ZFTXXEiw'),
(105, 'Aniquilacion', 34, 375, 0.0, 'Lena, bióloga y antigua soldado, se une a la misión que busca a su esposo, desaparecido en una región de acceso restringido. Mientras recorren el área, comprueban que está poblada por criaturas terroríficas, tan hermosas como mortíferas.', '89OP78l9oF0'),
(106, 'Inside Out', 35, 376, 0.0, 'Riley acaba de nacer y en el centro de control de su pequeña mente sólo hay sitio para Alegría. Poco después aparece Tristeza y, más tarde, Ira, Miedo y Asco. Las cinco emociones tendrán que ayudar a la niña cuando, ya con 11 años, su familia se mude desde su idílico pueblo del Medio Oeste estadounidense a la enorme e intimidante ciudad de San Francisco. Tras una serie de acontecimientos, Alegría y Tristeza tendrán que trabajar juntas para salvar a Riley.', 'yRUAzGQ3nSY'),
(107, 'Blade', 9, 377, 0.0, 'Un hombre medio mortal, medio vampiro, capaz de andar bajo la luz solar, trata de vengar la muerte de su madre e impedir que los vampiros dominen el mundo. Estos han desarrollado una novedosa tecnología y están tratando de dar con un tipo sanguíneo concreto para así poder invocar a una deidad maligna que tendría un papel fundamental en sus planes para aniquilar a la raza humana.', 'kaU2A7KyOu4'),
(108, 'El viaje de Chihiro', 36, 378, 0.0, 'Chihiro es una niña de diez años caprichosa y testaruda que cree que el universo entero debe someterse a sus deseos. Camino de su nuevo hogar junto a sus padres, una idea que la enfurece, la familia se equivoca de camino y aparece al final de un misterioso callejón sin salida, donde topan con un extraño edificio con un largo pasaje que los conduce a un pueblo fantasmal donde los espera un magnífico banquete.', '5Fgq4Osh6XQ'),
(109, 'Wall-e', 37, 379, 0.0, 'Tras cientos de años haciendo aquello para lo que fue construido: limpiar el planeta de basura, el pequeño robot Wall-e tiene una nueva misión cuando conoce a Eva.', 'CZ1CATNbXg0');

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
(52, 3, 10),
(53, 1, 10),
(53, 3, 1),
(53, 15, 7),
(61, 3, 10),
(101, 3, 2);

--
-- Disparadores `peliculas_puntuacion_usuarios`
--
DELIMITER $$
CREATE TRIGGER `after_insert_peliculas_puntuacion_usuarios` AFTER INSERT ON `peliculas_puntuacion_usuarios` FOR EACH ROW BEGIN
    
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
(52, 1),
(52, 21),
(52, 22),
(52, 23),
(52, 30),
(53, 13),
(53, 32),
(53, 33),
(53, 34),
(53, 35),
(61, 38),
(61, 39),
(61, 40),
(61, 41),
(99, 57),
(99, 58),
(99, 59),
(99, 60),
(99, 61),
(99, 62),
(99, 63),
(99, 64),
(99, 65),
(100, 4),
(100, 5),
(100, 66),
(100, 67),
(100, 68),
(100, 69),
(100, 70),
(100, 71),
(101, 4),
(101, 72),
(101, 73),
(101, 74),
(101, 75),
(101, 76),
(102, 6),
(102, 7),
(102, 77),
(102, 78),
(102, 79),
(102, 80),
(102, 81),
(102, 82),
(102, 83),
(103, 12),
(103, 18),
(103, 19),
(104, 84),
(104, 85),
(104, 86),
(104, 87),
(104, 88),
(104, 89),
(104, 90),
(104, 91),
(105, 92),
(105, 93),
(105, 94),
(105, 95),
(105, 96),
(105, 97),
(106, 98),
(106, 99),
(106, 100),
(106, 101),
(106, 102),
(106, 103),
(106, 104),
(106, 105),
(106, 106),
(107, 13),
(107, 35),
(107, 107),
(107, 108),
(107, 109),
(108, 110),
(108, 111),
(108, 112),
(108, 113),
(108, 114),
(108, 115),
(108, 116),
(108, 117),
(109, 85),
(109, 118),
(109, 119),
(109, 120),
(109, 121),
(109, 122),
(109, 123),
(109, 124);

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
(52, 5),
(53, 1),
(53, 4),
(61, 2),
(99, 3),
(99, 5),
(100, 1),
(100, 7),
(101, 1),
(101, 7),
(102, 2),
(103, 4),
(104, 4),
(104, 5),
(105, 3),
(105, 4),
(105, 5),
(106, 2),
(106, 8),
(107, 1),
(107, 4),
(108, 3),
(108, 6),
(108, 8),
(109, 2),
(109, 3),
(109, 5),
(109, 6),
(109, 7),
(109, 8);

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
(53, 13),
(61, 15),
(61, 16),
(99, 31),
(100, 32),
(100, 33),
(101, 34),
(101, 35),
(102, 36),
(102, 37),
(103, 1),
(104, 2),
(104, 3),
(105, 38),
(106, 39),
(106, 40),
(106, 41),
(107, 11),
(108, 42),
(109, 43);

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
(331, 'poster_67e2df8e692ed-resacon en las vegas.png'),
(350, 'poster_67e3de6364188-lasombra.jpg'),
(351, 'poster_67e3de7f19d46-lasombra.jpg'),
(352, 'poster_67e3dea20264e-lasombra.jpg'),
(353, 'poster_67e3e26ca48b5-LASOMBRA.jpg'),
(354, 'poster_67e3e387c728f-LASOMBRA.jpg'),
(355, 'poster_67e93fdf6993e-BRUJAH.jpg'),
(356, 'poster_67ea7d8bab591-TREMERE.jpg'),
(357, 'poster_67ea7f0fac500-TREMERE.jpg'),
(358, 'poster_67ea82d5d4d8c-BRUJAH antitribu.jpg'),
(359, 'poster_67ec1c549780c-TREMERE.jpg'),
(360, 'poster_67f0fe0cab45b-ASSAMITA.jpg'),
(361, 'poster_67f0fe58add59-ASSAMITA.jpg'),
(362, 'poster_67f1011f87afa-ASSAMITA.jpg'),
(363, 'poster_67f1024bb4103-ASSAMITA.jpg'),
(364, 'poster_67f11f54b6c99-ASSAMITA.jpg'),
(365, 'poster_67f11f54c6e54-ASSAMITA.jpg'),
(366, 'poster_67f1207395cc0-ASSAMITA.jpg'),
(367, 'poster_67f12d0f25c86-VAMPIRO_V5.jpg'),
(368, 'poster_680fef9094bfb-poligonos-arte-low-poly_3840x2160_xtrafondos.com.jpg'),
(369, 'poster_681ddf5cc802a-INTERSTELLAR.jpg'),
(370, 'poster_682219cbc73d9-Indiana Jones en busca del arca perdida.jpg'),
(371, 'poster_682222e431e73-indiana jones y el templo maldito.jpg'),
(372, 'poster_682224757d14e-La Máscara.jpg'),
(373, 'poster_68235fb254051-Barbarian.jpg'),
(374, 'poster_682492bfb5813-alien.jpg'),
(375, 'poster_682cc69786aa1-Aniquilaciaon.jpg'),
(376, 'poster_682cc868d3f19-inside out.PNG'),
(377, 'poster_682ccb3f53577-blade.PNG'),
(378, 'poster_682ccf7f08369-Hayao Miyazaki.png'),
(379, 'poster_682cd19ea21b0-wall-e.jpg'),
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
(12, 'rodri', 'rodrigo.mardel.daw@gmail.com', '$2y$10$qEYNYbr1M5exf5WkwE84q.Xz7YTNmkoELgslTU8c5vRQ8lORr7xb6'),
(14, 'ventrue', 'ventrue@gmail.com', '$2y$10$0Wa4OS4I0dqRxYvgC2ko4u/G9hO7j0sysKKWT6NPukgyVa0g/oG2C'),
(15, 'a', 'a@a.a', '$2y$10$Y0opEB0KepXJU3u4mUja4.P7WnucnvzgMJ/XyeKKu1xvun3W1RBNm');

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
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  MODIFY `guionista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `pelicula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `posters`
--
ALTER TABLE `posters`
  MODIFY `id_poster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
