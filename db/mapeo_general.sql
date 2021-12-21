-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 17:04:49
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
-- Estructura de tabla para la tabla `mapeo_general`
--

CREATE TABLE `mapeo_general` (
  `id_mapeo` int(11) NOT NULL COMMENT 'Id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item asignado',
  `nombre` varchar(250) NOT NULL COMMENT 'Nombre de la prueba',
  `fecha_inicio` datetime NOT NULL COMMENT 'fecha inicio de la prueba',
  `fecha_fin` datetime NOT NULL COMMENT 'fecha  final del mapeo',
  `intervalo` varchar(100) DEFAULT NULL COMMENT 'intervalo del mapeo',
  `id_usuario` int(11) NOT NULL COMMENT 'id del usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha creación del mapeo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mapeo_general`
--

INSERT INTO `mapeo_general` (`id_mapeo`, `id_asignado`, `nombre`, `fecha_inicio`, `fecha_fin`, `intervalo`, `id_usuario`, `fecha_registro`) VALUES
(1, 6, 'Nombre prueba', '2020-04-29 08:00:00', '2020-04-29 09:00:00', '60', 2, '2021-12-17 18:40:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mapeo_general`
--
ALTER TABLE `mapeo_general`
  ADD PRIMARY KEY (`id_mapeo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mapeo_general`
--
ALTER TABLE `mapeo_general`
  MODIFY `id_mapeo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de la tabla', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
