-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2021 a las 14:52:50
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_cercal_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automovil_sensor`
--

CREATE TABLE `automovil_sensor` (
  `id_automovil_sensor` int(11) NOT NULL COMMENT 'Id principal',
  `id_asignado` int(11) NOT NULL COMMENT 'id asignado',
  `id_altura` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `id_mapeo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `posicion` int(11) NOT NULL DEFAULT '0' COMMENT 'Posición del sensor en la altura',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `automovil_sensor`
--

INSERT INTO `automovil_sensor` (`id_automovil_sensor`, `id_asignado`, `id_altura`, `id_sensor`, `id_mapeo`, `id_usuario`, `posicion`, `fecha_registro`) VALUES
(3, 8, 4, 1, 4, 2, 6, '2021-04-26 16:57:09'),
(5, 8, 4, 2, 4, 2, 2, '2021-04-28 19:32:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `automovil_sensor`
--
ALTER TABLE `automovil_sensor`
  ADD PRIMARY KEY (`id_automovil_sensor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `automovil_sensor`
--
ALTER TABLE `automovil_sensor`
  MODIFY `id_automovil_sensor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
