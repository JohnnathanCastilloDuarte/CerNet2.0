-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 16:20:38
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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `departamento` varchar(100) NOT NULL COMMENT 'nombre del departamento',
  `usuario_head` int(11) DEFAULT NULL COMMENT 'usuario head del area',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha creacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `departamento`, `usuario_head`, `fecha_registro`) VALUES
(1, 'GEP', NULL, '2021-08-17 16:03:01'),
(2, 'SPOT', NULL, '2021-08-17 16:03:01'),
(3, 'TI', NULL, '2021-08-17 16:03:18'),
(4, 'CSV', NULL, '2021-08-17 16:03:18'),
(5, 'Calidad', NULL, '2021-08-17 16:03:29'),
(6, 'Documentación', NULL, '2021-10-12 06:38:54'),
(7, 'Gerencia operaciones', NULL, '2021-10-12 06:39:27'),
(8, 'Gerencia general', NULL, '2021-11-11 23:07:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
