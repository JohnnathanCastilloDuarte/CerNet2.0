-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:29:24
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `god_cercal_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estufaeincubadora_sensor`
--

CREATE TABLE `estufaeincubadora_sensor` (
  `id_estufaeincubadora_sensor` int(11) NOT NULL COMMENT 'Id principal',
  `id_asignado` int(11) NOT NULL COMMENT 'id asignado',
  `id_bandeja` int(11) NOT NULL,
  `posicion` int(11) DEFAULT NULL COMMENT 'Posicion del sensor en la bandeja',
  `id_sensor` int(11) NOT NULL,
  `id_mapeo` int(11) NOT NULL,
  `datos_crudos` varchar(400) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estufaeincubadora_sensor`
--
ALTER TABLE `estufaeincubadora_sensor`
  ADD PRIMARY KEY (`id_estufaeincubadora_sensor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estufaeincubadora_sensor`
--
ALTER TABLE `estufaeincubadora_sensor`
  MODIFY `id_estufaeincubadora_sensor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
