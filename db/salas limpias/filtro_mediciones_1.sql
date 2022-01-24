-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 14:42:39
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
-- Estructura de tabla para la tabla `filtro_mediciones_1`
--

CREATE TABLE `filtro_mediciones_1` (
  `id_medicion_1` int(11) NOT NULL COMMENT 'Id principal de esta tabla',
  `valor_obtenido` varchar(250) NOT NULL COMMENT 'valor obtenido de la medición',
  `veredicto` varchar(250) NOT NULL COMMENT 'Veredicto Cumple / no cumple',
  `nombre_filtro` varchar(250) NOT NULL COMMENT 'Nombre del filtro de la prueba',
  `id_informe` int(11) NOT NULL COMMENT 'id del informe',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `filtro_mediciones_1`
--

INSERT INTO `filtro_mediciones_1` (`id_medicion_1`, `valor_obtenido`, `veredicto`, `nombre_filtro`, `id_informe`, `fecha_registro`) VALUES
(1, '0.001', 'Cumple', 'Filtro #1', 1, '2021-11-08 15:14:54'),
(2, '0.002', 'No cumple', 'Filtro #2', 1, '2021-11-08 15:14:54'),
(3, '0', 'Cumple', 'Filtro #1', 2, '2022-01-03 20:13:39'),
(4, '0', 'Cumple', 'Filtro #2', 2, '2022-01-03 20:13:39'),
(5, '0', 'Cumple', 'Filtro #3', 2, '2022-01-03 20:13:39'),
(6, '0', 'Cumple', 'Filtro #1', 3, '2022-01-03 20:13:51'),
(7, '0', 'Cumple', 'Filtro #2', 3, '2022-01-03 20:13:51'),
(8, '0', 'Cumple', 'Filtro #3', 3, '2022-01-03 20:13:51'),
(9, '12', 'Cumple', 'Filtro #1', 4, '2022-01-03 20:14:00'),
(10, '12', 'Cumple', 'Filtro #2', 4, '2022-01-03 20:14:00'),
(11, '12', 'Cumple', 'Filtro #3', 4, '2022-01-03 20:14:00'),
(12, '25', 'Cumple', 'Filtro #1', 5, '2022-01-04 14:17:20'),
(13, '25', 'Cumple', 'Filtro #2', 5, '2022-01-04 14:17:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `filtro_mediciones_1`
--
ALTER TABLE `filtro_mediciones_1`
  ADD PRIMARY KEY (`id_medicion_1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `filtro_mediciones_1`
--
ALTER TABLE `filtro_mediciones_1`
  MODIFY `id_medicion_1` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
