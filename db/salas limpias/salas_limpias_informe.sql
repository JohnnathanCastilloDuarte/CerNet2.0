-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:43:52
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
-- Estructura de tabla para la tabla `salas_limpias_informe`
--

CREATE TABLE `salas_limpias_informe` (
  `id_informe` int(11) NOT NULL,
  `nombre_informe` varchar(500) NOT NULL DEFAULT 'Nombre informe',
  `id_asignado` int(11) NOT NULL,
  `solicita` varchar(500) NOT NULL DEFAULT 'Usuario solicitante',
  `responsable` varchar(500) DEFAULT NULL,
  `conclusion` text NOT NULL DEFAULT 'Conclusion',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_informe`
--

INSERT INTO `salas_limpias_informe` (`id_informe`, `nombre_informe`, `id_asignado`, `solicita`, `responsable`, `conclusion`, `fecha_registro`) VALUES
(1, 'update', 7, 'update', NULL, 'Nombre informe update', '2022-01-18 17:36:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_informe`
--
ALTER TABLE `salas_limpias_informe`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_informe`
--
ALTER TABLE `salas_limpias_informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
