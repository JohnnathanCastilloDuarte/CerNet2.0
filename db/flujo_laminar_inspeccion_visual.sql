-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 17:00:13
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
-- Estructura de tabla para la tabla `flujo_laminar_inspeccion_visual`
--

CREATE TABLE `flujo_laminar_inspeccion_visual` (
  `id_inspeccion` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item asignado',
  `insp_1` varchar(5) NOT NULL DEFAULT 'No',
  `insp_2` varchar(5) DEFAULT 'No',
  `insp_3` varchar(5) NOT NULL DEFAULT 'No',
  `insp_4` varchar(5) NOT NULL DEFAULT 'No',
  `insp_5` varchar(5) NOT NULL DEFAULT 'No',
  `insp_6` varchar(5) NOT NULL DEFAULT 'No',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujo_laminar_inspeccion_visual`
--
ALTER TABLE `flujo_laminar_inspeccion_visual`
  ADD PRIMARY KEY (`id_inspeccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `flujo_laminar_inspeccion_visual`
--
ALTER TABLE `flujo_laminar_inspeccion_visual`
  MODIFY `id_inspeccion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
