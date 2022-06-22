-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2022 a las 19:16:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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
-- Estructura de tabla para la tabla `flujo_laminar_prueba_7`
--

CREATE TABLE `flujo_laminar_prueba_7` (
  `id` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `tipo_um` varchar(100) DEFAULT NULL COMMENT 'tamaño >= 0,5 es 1\r\n>= 5,0 es 2',
  `media_promedios` varchar(100) DEFAULT '0',
  `desviacion_estandar` varchar(100) DEFAULT '0',
  `maximo` varchar(100) DEFAULT '0',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujo_laminar_prueba_7`
--

INSERT INTO `flujo_laminar_prueba_7` (`id`, `id_asignado`, `tipo_um`, `media_promedios`, `desviacion_estandar`, `maximo`, `fecha_registro`) VALUES
(1, 3, '1', '3', '3', '3', '2022-05-24 12:10:22'),
(2, 3, '2', '4', '4', '4', '2022-05-24 12:10:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujo_laminar_prueba_7`
--
ALTER TABLE `flujo_laminar_prueba_7`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `flujo_laminar_prueba_7`
--
ALTER TABLE `flujo_laminar_prueba_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
