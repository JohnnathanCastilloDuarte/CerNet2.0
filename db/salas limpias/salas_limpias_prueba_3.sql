-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:45:28
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
-- Estructura de tabla para la tabla `salas_limpias_prueba_3`
--

CREATE TABLE `salas_limpias_prueba_3` (
  `id_prueba` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `medicion_1` varchar(25) NOT NULL DEFAULT 'NA',
  `medicion_2` varchar(25) NOT NULL DEFAULT 'NA',
  `medicion_3` varchar(25) NOT NULL DEFAULT 'NA',
  `medicion_4` varchar(25) NOT NULL DEFAULT 'NA',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_prueba_3`
--

INSERT INTO `salas_limpias_prueba_3` (`id_prueba`, `id_asignado`, `medicion_1`, `medicion_2`, `medicion_3`, `medicion_4`, `fecha_registro`) VALUES
(1, 7, 'd', 'd', 'd', 'dd', '2022-01-11 14:53:40'),
(2, 7, 'd', 'd', 'd', 'd', '2022-01-11 14:53:40'),
(3, 7, 'd', 'd', 'd', 'd', '2022-01-11 14:53:40'),
(4, 7, 'd', 'd', 'dd', 'd', '2022-01-11 14:53:40'),
(5, 7, 'd', 'd', 'd', 'd', '2022-01-11 14:53:40'),
(6, 7, 'd', 'd', 'd', 'd', '2022-01-11 14:53:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_prueba_3`
--
ALTER TABLE `salas_limpias_prueba_3`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_prueba_3`
--
ALTER TABLE `salas_limpias_prueba_3`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
