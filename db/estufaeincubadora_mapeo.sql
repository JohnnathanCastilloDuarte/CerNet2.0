-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:28:14
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
-- Estructura de tabla para la tabla `estufaeincubadora_mapeo`
--

CREATE TABLE `estufaeincubadora_mapeo` (
  `id_mapeo` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) DEFAULT NULL COMMENT 'id asignado el cual relaciona ot , servicio y item',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre del mapeo',
  `comentario` text COMMENT 'El comentario servira para los informes base',
  `fecha_inicio` date DEFAULT NULL COMMENT 'Fecha de inicio de mapeo',
  `hora_inicio` time DEFAULT NULL COMMENT 'Hora de inicio del mapeo',
  `fecha_final` date DEFAULT NULL COMMENT 'Fecha fin del mapeo',
  `hora_final` time DEFAULT NULL COMMENT 'Hora de fin del mapeo',
  `ubicacion` int(1) DEFAULT '0' COMMENT '0 Sensor interno, 1 Sensor externo',
  `intervalo` int(11) DEFAULT NULL COMMENT 'Intervalo del tiempo del mapeo',
  `temperatura_minima` varchar(7) DEFAULT NULL COMMENT 'Temperatura minima',
  `temperatura_maxima` varchar(7) DEFAULT NULL COMMENT 'Temperatura maxima',
  `valor_seteado_temperatura` int(7) DEFAULT NULL COMMENT 'Valor seteado temperatura',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'id_usuario que registra',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se crea el registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estufaeincubadora_mapeo`
--
ALTER TABLE `estufaeincubadora_mapeo`
  ADD PRIMARY KEY (`id_mapeo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estufaeincubadora_mapeo`
--
ALTER TABLE `estufaeincubadora_mapeo`
  MODIFY `id_mapeo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
