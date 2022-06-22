-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 17:07:09
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
-- Estructura de tabla para la tabla `urs_requerimientos_tecnicos`
--

CREATE TABLE `urs_requerimientos_tecnicos` (
  `id` int(11) NOT NULL COMMENT 'Id principal de la tabla',
  `parametro` int(100) DEFAULT NULL COMMENT 'Parametro de los requerimientos tecnicos',
  `especificaciones` text DEFAULT NULL COMMENT 'especificaciones de los requerimientos tecnicos ',
  `categoria` int(11) DEFAULT NULL COMMENT 'Categoria',
  `categoria_requerimiento` int(11) DEFAULT NULL COMMENT 'Categoria del requerimiento ',
  `id_asignado` int(11) DEFAULT NULL COMMENT 'id asignado al item',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha del registro de los requerimientos tecnicos '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `urs_requerimientos_tecnicos`
--
ALTER TABLE `urs_requerimientos_tecnicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `urs_requerimientos_tecnicos`
--
ALTER TABLE `urs_requerimientos_tecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
