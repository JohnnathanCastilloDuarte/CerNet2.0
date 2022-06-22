-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2022 a las 16:49:11
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
-- Estructura de tabla para la tabla `informes_general`
--

CREATE TABLE `informes_general` (
  `id_informe` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `nombre` varchar(250) NOT NULL COMMENT 'nombre del informe',
  `temp_hum` int(11) NOT NULL COMMENT 'TEMP04',
  `tipo` varchar(10) NOT NULL COMMENT 'TEMP - Temperatura HUM - Humedad',
  `comentario` varchar(500) NOT NULL DEFAULT 'Comentario',
  `observacion` varchar(500) NOT NULL DEFAULT 'Observación',
  `corresponde_a` varchar(800) NOT NULL DEFAULT 'concepto' COMMENT 'Concepto del informe',
  `id_mapeo` int(11) NOT NULL COMMENT 'id de la tabla mapeo_general',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item_asignado',
  `id_usuario` int(11) NOT NULL COMMENT 'id de la tabla usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informes_general`
--
ALTER TABLE `informes_general`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informes_general`
--
ALTER TABLE `informes_general`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
