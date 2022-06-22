-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2021 a las 14:52:39
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
-- Estructura de tabla para la tabla `automovil_mapeo`
--

CREATE TABLE `automovil_mapeo` (
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
-- Volcado de datos para la tabla `automovil_mapeo`
--

INSERT INTO `automovil_mapeo` (`id_mapeo`, `id_asignado`, `nombre`, `comentario`, `fecha_inicio`, `hora_inicio`, `fecha_final`, `hora_final`, `ubicacion`, `intervalo`, `temperatura_minima`, `temperatura_maxima`, `valor_seteado_temperatura`, `id_usuario`, `fecha_registro`) VALUES
(4, 8, 'MAPEO A 96 HORA(s) PRUEBA DE APERTURA CON CARGA', NULL, '2020-12-24', '17:00:00', '2020-12-24', '19:00:00', 0, 60, '25', '30', 25, 2, '2021-04-22 19:43:38'),
(16, 8, 'MAPEO A 49.92 HORA(s) CON CARGA', NULL, '2021-05-04', '01:00:00', '2021-05-06', '03:00:00', 0, 60, '45', '32', 25, 2, '2021-05-12 02:38:22'),
(17, 10, 'MAPEO A -72.96 HORA(s) MAPEO DE PRUEBA', NULL, '2021-05-04', '01:00:00', '2021-05-01', '00:00:00', 0, 60, '40', '40', 40, 2, '2021-05-26 17:13:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `automovil_mapeo`
--
ALTER TABLE `automovil_mapeo`
  ADD PRIMARY KEY (`id_mapeo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `automovil_mapeo`
--
ALTER TABLE `automovil_mapeo`
  MODIFY `id_mapeo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
