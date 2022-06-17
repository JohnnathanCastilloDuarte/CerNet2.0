-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 17:13:07
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
-- Estructura de tabla para la tabla `filtro_mediciones_2`
--

CREATE TABLE `filtro_mediciones_2` (
  `id_medicion_2` int(11) NOT NULL COMMENT 'id principal de esta tabla',
  `id_informe` int(11) NOT NULL COMMENT 'Id de la tabla informe',
  `nombre_filtro` varchar(250) NOT NULL COMMENT 'Nombre del filtro de la prueba',
  `zonaA` varchar(10) NOT NULL COMMENT 'Zona A de la primera medición',
  `zonaAA` varchar(10) NOT NULL COMMENT 'Zona AA de la primera medición',
  `zonaB` varchar(10) NOT NULL COMMENT 'Zona B de la primera medición',
  `zonaBB` varchar(10) NOT NULL COMMENT 'Zona BB de la primera medición',
  `zonaC` varchar(10) NOT NULL COMMENT 'Zona C de la primera medición',
  `zonaCC` varchar(10) NOT NULL COMMENT 'Zona CC de la primera medición',
  `zonaD` varchar(10) NOT NULL COMMENT 'Zona D de la primera medición',
  `zonaDD` varchar(10) NOT NULL COMMENT 'Zona DD de la primera medición',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `filtro_mediciones_2`
--

INSERT INTO `filtro_mediciones_2` (`id_medicion_2`, `id_informe`, `nombre_filtro`, `zonaA`, `zonaAA`, `zonaB`, `zonaBB`, `zonaC`, `zonaCC`, `zonaD`, `zonaDD`, `fecha_registro`) VALUES
(1, 1, 'Filtro #1', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '2022-01-24 13:46:31'),
(2, 1, 'Filtro #2', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '2022-01-24 13:46:31'),
(3, 2, 'Filtro #1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-02-01 20:13:09'),
(4, 2, 'Filtro #2', '0', '0', '0', '0', '0', '0', '0', '0', '2022-02-01 20:13:09'),
(5, 2, 'Filtro #3', '0', '0', '0', '0', '0', '0', '0', '0', '2022-02-01 20:13:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `filtro_mediciones_2`
--
ALTER TABLE `filtro_mediciones_2`
  ADD PRIMARY KEY (`id_medicion_2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `filtro_mediciones_2`
--
ALTER TABLE `filtro_mediciones_2`
  MODIFY `id_medicion_2` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de esta tabla', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
