-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 17:04:22
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
-- Estructura de tabla para la tabla `campana_extraccion_prueba_2`
--

CREATE TABLE `campana_extraccion_prueba_2` (
  `id_prueba` int(11) NOT NULL COMMENT 'id primario de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item_asignado',
  `medicion_1` varchar(15) DEFAULT 'valor',
  `medicion_2` varchar(15) NOT NULL DEFAULT 'valor',
  `medicion_3` varchar(15) NOT NULL DEFAULT 'valor',
  `medicion_4` varchar(15) NOT NULL DEFAULT 'valor',
  `medicion_5` varchar(15) NOT NULL DEFAULT 'valor',
  `medicion_6` varchar(15) NOT NULL DEFAULT 'valor',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha_registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campana_extraccion_prueba_2`
--
ALTER TABLE `campana_extraccion_prueba_2`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campana_extraccion_prueba_2`
--
ALTER TABLE `campana_extraccion_prueba_2`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id primario de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
