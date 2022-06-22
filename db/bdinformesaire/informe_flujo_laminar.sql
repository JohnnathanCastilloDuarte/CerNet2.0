-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 16:17:39
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
-- Estructura de tabla para la tabla `informe_flujo_laminar`
--

CREATE TABLE `informe_flujo_laminar` (
  `id_informe` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `conclusion` text NOT NULL,
  `solicitante` varchar(100) DEFAULT NULL,
  `nombre_informe` varchar(100) NOT NULL,
  `usuario_responsable` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informe_flujo_laminar`
--

INSERT INTO `informe_flujo_laminar` (`id_informe`, `id_asignado`, `conclusion`, `solicitante`, `nombre_informe`, `usuario_responsable`, `fecha_registro`) VALUES
(1, 3, 'De acuerdo a los resultados obtenidos a la muestra inspeccionada, el Equipo indicado en la ubicación del encabezado,\nCUMPLE con los parámetros establecidos en la normativa vigente.', 'Jorge', 'CO-0000-CL-2022-TEMP-01', 0, '2022-02-10 16:47:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informe_flujo_laminar`
--
ALTER TABLE `informe_flujo_laminar`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informe_flujo_laminar`
--
ALTER TABLE `informe_flujo_laminar`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
