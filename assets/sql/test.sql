-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 10:27:09
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetoreservable`
--

CREATE TABLE IF NOT EXISTS `objetoreservable` (
  `nombre` varchar(30) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `num_aula` varchar(10) NOT NULL,
  `capacidad` int(3) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `num_equipos` int(3) DEFAULT NULL,
  `red` varchar(2) NOT NULL,
  `proyector` varchar(2) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objetoreservable`
--

INSERT INTO `objetoreservable` (`nombre`, `tipo`, `num_aula`, `capacidad`, `categoria`, `num_equipos`, `red`, `proyector`, `id`) VALUES
('Salón de actos', 'aula', '101', 150, 'multiusos', 0, 'NO', 'SI', 1),
('aula multimedia', 'aula', '203', 20, 'multimedia', 20, 'SI', 'SI', 2),
('aula multimedia', 'aula', '207', 25, 'multimedia', 1, 'SI', 'NO', 3),
('Pista baloncesto', 'aula', '201', 50, 'patio', 0, 'NO', 'NO', 5),
('Pista fútbol', 'aula', '202', 50, 'patio', 0, 'NO', 'NO', 6),
('Pista voleibol', 'aula', '204', 50, 'patio', 0, 'NO', 'NO', 7),
('aula tic', 'aula', '107', 30, 'tic', 30, 'SI', 'SI', 8),
('aula tic', 'aula', '108', 20, 'tic', 20, 'SI', 'NO', 9),
('aula multimedia', 'aula', '222', 35, 'multimedia', 36, 'SI', 'SI', 10),
('aula tic', 'aula', '233', 40, 'tic', 40, 'SI', 'SI', 11),
('Gimnasio', 'aula', '200', 50, 'gimnasio', 0, 'NO', 'NO', 13),
('Taller 4', 'aula', '301', 20, 'tic', 20, 'SI', 'NO', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuarionombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ornombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_id` int(11) unsigned DEFAULT NULL,
  `or_id` int(11) unsigned DEFAULT NULL,
  `num_aula` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `fecha`, `hora`, `usuarionombre`, `ornombre`, `usuario_id`, `or_id`, `num_aula`) VALUES
(62, '2016-06-09', '9:15-10:10', 'Alberto', 'aula multimedia', 5, 2, 203);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `clave` varchar(6) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `avatar` char(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `clave`, `rol`, `correo`, `nick`, `password`, `avatar`) VALUES
(1, 'Ana', 'Arévalo', NULL, 'admin', 'admin_reyfernando@gmail.com', 'admin', 'adminNebraska659', 'default.jpg'),
(2, 'Susana', 'Rebollo Méndez', 'sraaa2', 'alumno', 'susanarebollo96@gmail.com', 'susie', 'susana22', 'mikasa_ackerman.png'),
(3, 'Irene', 'Lucena Prieto', 'ilaaa2', 'alumno', 'irenelucena@gmail.com', 'irenelucenaprieto', 'jacinto44benavente', 'mikasa.png'),
(4, 'Manuel', 'Velasco Prieto', 'mvaaa2', 'alumno', 'manuiola@gmail.com', 'manuiola', 'manueliola67', 'default.jpg'),
(5, 'Alberto', 'Garay Cañas', 'agaaa1', 'profesor', 'agaray@gmail.com', 'agaray', '888darthvader', 'default.jpg'),
(6, 'Álvaro', 'González Sotillo', 'agsaa1', 'profesor', 'alvarogonzalez@gmail.com', 'alvaro', 'alvaro22', 'default.jpg'),
(7, 'Pilar', 'Velasco', 'pvaaa1', 'profesor', 'pilarvelasco@gmail.com', 'pilar', 'prueba01', 'default.jpg'),
(8, 'Pepito ', 'Grillo', 'pgaaa2', 'alumno', 'pepitogrillo@gmail.com', 'pepitoGrillo', 'programandoPinoccios', 'default.jpg'),
(9, 'Juanfran', 'García Sánchez', 'jgaaa2', 'alumno', 'juanfran93@gmail.com', 'Juanfran93', 'juanfran93', 'default.jpg'),
(10, 'Gato', 'gata gata', 'ggaaa2', 'alumno', 'gatito22@gmail.com', 'Gatito', 'gatito22', 'default.jpg'),
(11, 'Anonimo', 'Vendetta', 'anoaa2', 'alumno', 'anonimo@hotmail.com', 'Anonimo', 'anonimo22', 'default.jpg'),
(12, 'Carlota', 'Lopez García', 'ccaaa2', 'alumno', 'carlotalopezgarcia@gmail.com', 'Carlota2', 'mickeyminniepluto', 'default.jpg'),
(13, 'Alfonso', 'Martínez', 'amaaa1', 'profesor', 'alfonso12@gmail.com', 'alfonso', 'unvasoesunvaso333', 'default.jpg'),
(14, 'Carlos', 'Perez Perez', 'cpaaa2', 'alumno', 'carlos@gmail.com', 'carlitos', 'agua22', 'default.jpg'),
(15, 'Marta', 'Carrasco Gomez', 'mcaaa1', 'profesor', 'marta12@gmail.com', 'Marta12', 'marta12Carrasco', 'default.jpg'),
(16, 'Marcos', 'Gomez Perez', 'mgpaa2', 'alumno', 'marcos@gmail.com', 'marcos', '987marcos', 'default.jpg'),
(17, 'Miguel', 'Perez Perez', 'mppaa1', 'profesor', 'miguelito1@gmail.com', 'miguelito', 'pelomopa889', 'default.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `objetoreservable`
--
ALTER TABLE `objetoreservable`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_reserva_usuario` (`usuario_id`),
  ADD KEY `index_foreignkey_reserva_or` (`or_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `objetoreservable`
--
ALTER TABLE `objetoreservable`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
