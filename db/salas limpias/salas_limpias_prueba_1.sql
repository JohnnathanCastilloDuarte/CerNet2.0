-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 14:45:04
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
-- Estructura de tabla para la tabla `salas_limpias_prueba_1`
--

CREATE TABLE `salas_limpias_prueba_1` (
  `id_prueba` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `medida_promedio` varchar(50) NOT NULL DEFAULT 'NA',
  `desviacion_estandar` varchar(50) NOT NULL DEFAULT 'NA',
  `maximo` varchar(50) NOT NULL DEFAULT 'NA',
  `promedios` varchar(50) NOT NULL DEFAULT 'NA',
  `cumple` varchar(50) NOT NULL DEFAULT 'NA',
  `categoria` varchar(50) NOT NULL DEFAULT 'NA',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_prueba_1`
--

INSERT INTO `salas_limpias_prueba_1` (`id_prueba`, `id_asignado`, `medida_promedio`, `desviacion_estandar`, `maximo`, `promedios`, `cumple`, `categoria`, `fecha_registro`) VALUES
(1, 7, '1', '1', '1', '1', '1', '1', '2022-01-11 17:11:35'),
(2, 7, '1', '1', '1', '1', '1', '1', '2022-01-11 17:11:35'),
(3, 7, '', '', '', '2', '1', '2', '2022-01-11 17:11:35'),
(4, 7, '', '', '', '2', '1', '2', '2022-01-11 17:11:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `salas_limpias_prueba_1`
--
ALTER TABLE `salas_limpias_prueba_1`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `salas_limpias_prueba_1`
--
ALTER TABLE `salas_limpias_prueba_1`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
