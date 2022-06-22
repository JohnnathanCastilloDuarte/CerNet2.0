-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:45:50
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
-- Estructura de tabla para la tabla `salas_limpias_prueba_4`
--

CREATE TABLE `salas_limpias_prueba_4` (
  `id_prueba` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `n1` varchar(25) NOT NULL DEFAULT 'NA',
  `n2` varchar(25) NOT NULL DEFAULT 'NA',
  `n3` varchar(25) NOT NULL DEFAULT 'NA',
  `n4` varchar(25) NOT NULL DEFAULT 'NA',
  `n5` varchar(25) NOT NULL DEFAULT 'NA',
  `promedio` varchar(25) NOT NULL DEFAULT 'NA',
  `cumple` varchar(25) NOT NULL DEFAULT 'NA',
  `categoria` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_prueba_4`
--

INSERT INTO `salas_limpias_prueba_4` (`id_prueba`, `id_asignado`, `n1`, `n2`, `n3`, `n4`, `n5`, `promedio`, `cumple`, `categoria`, `fecha_registro`) VALUES
(1, 7, '2', '2', '2', '2', '2', '2', '2', 1, '2022-01-11 15:38:14'),
(2, 7, '1', '1', '1', '1', '1', '1', '1', 2, '2022-01-11 15:38:14'),
(3, 7, '4', '4', '4', '4', '4', '4', '4', 3, '2022-01-11 15:38:14'),
(4, 7, '5', '5', '5', '5', '5', '5', '5', 4, '2022-01-11 15:38:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_prueba_4`
--
ALTER TABLE `salas_limpias_prueba_4`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_prueba_4`
--
ALTER TABLE `salas_limpias_prueba_4`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
