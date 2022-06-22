-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 17:04:36
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

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
-- Estructura de tabla para la tabla `informes_general`
--

CREATE TABLE `informes_general` (
  `id_informe` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `nombre` varchar(250) NOT NULL COMMENT 'nombre del informe',
  `temp_hum` int(11) NOT NULL COMMENT 'TEMP04',
  `tipo` varchar(10) NOT NULL COMMENT 'TEMP - Temperatura HUM - Humedad',
  `comentario` varchar(500) NOT NULL DEFAULT 'Comentario',
  `observacion` varchar(500) NOT NULL DEFAULT 'Observación',
  `id_mapeo` int(11) NOT NULL COMMENT 'id de la tabla mapeo_general',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item_asignado',
  `id_usuario` int(11) NOT NULL COMMENT 'id de la tabla usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informes_general`
--

INSERT INTO `informes_general` (`id_informe`, `nombre`, `temp_hum`, `tipo`, `comentario`, `observacion`, `id_mapeo`, `id_asignado`, `id_usuario`, `fecha_registro`) VALUES
(2, 'CCL-1234--TEM-01', 1, 'TEMP', 'Comentario', 'Observación', 1, 6, 2, '2021-12-17 19:10:07'),
(4, 'CCL-1234--HUM-01', 1, 'HUM', 'Comentario', 'Observación', 1, 6, 2, '2021-12-17 19:10:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informes_general`
--
ALTER TABLE `informes_general`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informes_general`
--
ALTER TABLE `informes_general`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
