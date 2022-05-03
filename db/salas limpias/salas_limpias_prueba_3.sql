-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2022 a las 00:56:15
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
-- Estructura de tabla para la tabla `salas_limpias_prueba_3`
--

CREATE TABLE `salas_limpias_prueba_3` (
  `id_prueba` int(11) NOT NULL,
  `id_asignado` int(11) NOT NULL,
  `prueba` int(11) DEFAULT NULL COMMENT 'Es la prueba que se esta realizando en la sala limpia (Lugar de Medición,Medición Realizada en,Resultado (Pa),Presión especificada (Pa),Tipo de Presión,Cumple Especificación)',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas_limpias_prueba_3`
--

INSERT INTO `salas_limpias_prueba_3` (`id_prueba`, `id_asignado`, `prueba`, `fecha_registro`) VALUES
(1, 2, NULL, '2022-05-03 17:10:41'),
(2, 2, NULL, '2022-05-03 18:36:59'),
(3, 2, NULL, '2022-05-03 18:42:19'),
(4, 2, NULL, '2022-05-03 21:52:55'),
(5, 2, NULL, '2022-05-03 21:55:06'),
(6, 2, NULL, '2022-05-03 22:39:55');

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
