-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 14:32:34
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
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id` int(11) NOT NULL COMMENT 'id_principal',
  `nombre` varchar(250) DEFAULT NULL COMMENT 'Nombre del proceso',
  `estructura` int(11) NOT NULL COMMENT '1-Flujo con link\r\n2-flujo normal',
  `id_flujo` int(11) NOT NULL COMMENT 'id de la tabla flujo',
  `tipo` int(11) DEFAULT NULL COMMENT '1 Hoja x Hoja  2 PDF completo',
  `estado` int(11) DEFAULT 0 COMMENT '0-creado || 1-Aprobado documental || 2-Aprobado Head || 3-Aprobado Calidad  || 4-Aprobado por gerencia ||5-Rechazado por Documental || 6-Rechazado por Head || 7-Rechazado por Calidad||  8-Rechazado  por Gerencia',
  `url` varchar(800) DEFAULT NULL COMMENT 'Url donde se almacena la información del inspector',
  `id_numot` int(11) DEFAULT NULL COMMENT 'id de la tabla numot',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'id de la tabla usuarios',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creacion '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id_principal';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
