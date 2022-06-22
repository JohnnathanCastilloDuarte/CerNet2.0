-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2022 a las 21:57:57
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
-- Estructura de tabla para la tabla `rechazos_documentacion`
--

CREATE TABLE `rechazos_documentacion` (
  `id` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_documentacion` int(11) NOT NULL COMMENT 'id de la tabla documetacion',
  `rechazo` text NOT NULL COMMENT 'Motivo del rechazo',
  `id_usuario` int(11) NOT NULL COMMENT 'id usuario de la tabla usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rechazos_documentacion`
--
ALTER TABLE `rechazos_documentacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rechazos_documentacion`
--
ALTER TABLE `rechazos_documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
