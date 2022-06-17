-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 17:12:50
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
(1, '123', 'No cumple', 'Filtro #1', 1, '2022-01-24 13:46:31'),
(2, '123', 'No cumple', 'Filtro #2', 1, '2022-01-24 13:46:31'),
(3, '123', 'No cumple', 'Filtro #1', 2, '2022-02-01 20:13:09'),
(4, '123', 'No cumple', 'Filtro #2', 2, '2022-02-01 20:13:09'),
(5, '123', 'No cumple', 'Filtro #3', 2, '2022-02-01 20:13:09');

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
  MODIFY `id_medicion_1` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
