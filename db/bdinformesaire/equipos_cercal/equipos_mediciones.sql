-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 18:28:51
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_cernet_2_0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_mediciones`
--

CREATE TABLE `equipos_mediciones` (
  `id_equipo_medicion` int(11) NOT NULL COMMENT 'id principal de esta tabla',
  `id_equipo` int(11) NOT NULL COMMENT 'id de la tabla equipos cercal',
  `id_informe` int(11) NOT NULL COMMENT 'id de la tabla informe',
  `id_asignado` int(11) DEFAULT NULL COMMENT 'id de la tabla item asignado',
  `categoria` int(11) DEFAULT NULL,
  `tipo_prueba` varchar(500) DEFAULT 'Prueba' COMMENT 'tipo de prueba para el que se realiza la medición ',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '\r\nfecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos_mediciones`
--

INSERT INTO `equipos_mediciones` (`id_equipo_medicion`, `id_equipo`, `id_informe`, `id_asignado`, `categoria`, `tipo_prueba`, `fecha_registro`) VALUES
(1, 1, 1, 1, 12, 'Prueba Velocidad Aire', '2022-01-31 18:53:59'),
(2, 2, 1, 1, 12, 'Prueba sonora', '2022-01-31 21:47:55'),
(4, 1, 0, 3, 13, 'Prueba integridad filtros', '2022-02-09 14:06:35'),
(5, 2, 0, 3, 13, 'Prueba de velocidad de aire', '2022-02-09 16:30:15'),
(6, 1, 0, 3, 13, 'Prueba de conteo de particulas', '2022-02-09 16:41:23'),
(7, 2, 0, 3, 13, 'Prueba sonora', '2022-02-09 16:56:29'),
(8, 1, 0, 3, 13, 'Prueba nivel de iluminación', '2022-02-09 17:15:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos_mediciones`
--
ALTER TABLE `equipos_mediciones`
  ADD PRIMARY KEY (`id_equipo_medicion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_mediciones`
--
ALTER TABLE `equipos_mediciones`
  MODIFY `id_equipo_medicion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de esta tabla', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
