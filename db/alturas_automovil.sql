-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2021 a las 14:52:21
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
-- Estructura de tabla para la tabla `alturas_automovil`
--

CREATE TABLE `alturas_automovil` (
  `id` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla asignacion',
  `nombre` varchar(250) DEFAULT NULL COMMENT 'Nombre del altura a crear',
  `tipo` varchar(250) DEFAULT NULL COMMENT 'Tipo de altura a crear',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion de la altura'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alturas_automovil`
--

INSERT INTO `alturas_automovil` (`id`, `id_asignado`, `nombre`, `tipo`, `fecha_registro`) VALUES
(4, 8, 'prueba', 'Media', '2021-04-19 18:23:58'),
(5, 8, 'NUEVA', 'Alta', '2021-05-18 23:21:26'),
(6, 10, 'primer altura', 'Alta', '2021-05-26 14:52:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alturas_automovil`
--
ALTER TABLE `alturas_automovil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alturas_automovil`
--
ALTER TABLE `alturas_automovil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
