-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 17:03:36
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
-- Estructura de tabla para la tabla `campana_extraccion_inspeccion`
--

CREATE TABLE `campana_extraccion_inspeccion` (
  `id_inspeccion` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id del item asignado',
  `insp_1` varchar(10) NOT NULL DEFAULT 'Si',
  `insp_2` varchar(10) NOT NULL DEFAULT 'Si',
  `insp_3` varchar(10) NOT NULL DEFAULT 'Si',
  `insp_4` varchar(10) NOT NULL DEFAULT 'Si',
  `insp_5` varchar(10) NOT NULL DEFAULT 'Si',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campana_extraccion_inspeccion`
--
ALTER TABLE `campana_extraccion_inspeccion`
  ADD PRIMARY KEY (`id_inspeccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campana_extraccion_inspeccion`
--
ALTER TABLE `campana_extraccion_inspeccion`
  MODIFY `id_inspeccion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
