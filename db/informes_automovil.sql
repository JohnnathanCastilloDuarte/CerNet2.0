-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2021 a las 14:53:27
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
-- Estructura de tabla para la tabla `informes_automovil`
--

CREATE TABLE `informes_automovil` (
  `id_informe_automovil` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `nombre` varchar(250) NOT NULL COMMENT 'Nombre del informe',
  `n_increment` varchar(10) NOT NULL COMMENT 'TEMP del informe',
  `id_mapeo` int(11) NOT NULL COMMENT 'id de la tabla mapeo',
  `id_asignado` int(11) NOT NULL COMMENT 'id del tabla item asignado',
  `estado` varchar(30) DEFAULT NULL COMMENT 'Estado del informe ',
  `observacion` varchar(700) DEFAULT 'Observaciones' COMMENT 'Observaciones del informe',
  `comentario` varchar(700) DEFAULT 'Comentarios' COMMENT 'Comentarios del informe',
  `id_firmante` int(11) DEFAULT NULL COMMENT 'id el usuario que firma del informe',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de creación de informe'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informes_automovil`
--

INSERT INTO `informes_automovil` (`id_informe_automovil`, `nombre`, `n_increment`, `id_mapeo`, `id_asignado`, `estado`, `observacion`, `comentario`, `id_firmante`, `fecha_registro`) VALUES
(1, 'CHL-123-CG-2021-TEMP-', '01', 17, 10, NULL, 'Observaciones', 'Comentarios', NULL, '2021-05-26 17:39:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informes_automovil`
--
ALTER TABLE `informes_automovil`
  ADD PRIMARY KEY (`id_informe_automovil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informes_automovil`
--
ALTER TABLE `informes_automovil`
  MODIFY `id_informe_automovil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
