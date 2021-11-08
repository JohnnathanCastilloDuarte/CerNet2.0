-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:28:56
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
-- Estructura de tabla para la tabla `informe_estufaeincubadora`
--

CREATE TABLE `informe_estufaeincubadora` (
  `id_informe_estufaeincubadora` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'Nombre que llevara el informe',
  `n_increment` varchar(100) DEFAULT NULL COMMENT 'numero incrementable del informe, segun la cantidad de mapeos',
  `tipo` int(2) DEFAULT NULL COMMENT '0 TEM',
  `id_mapeo` int(11) DEFAULT NULL COMMENT 'id  de la tabla refrigerador sensor',
  `id_asignado` int(11) DEFAULT NULL COMMENT 'id de la tabla asignada',
  `estado` int(11) DEFAULT NULL COMMENT '0 no terminado 1 terminado 2 entragado a cliente',
  `observacion` text COMMENT 'Observacion por parte del usuario para el informe',
  `comentarios` text COMMENT 'Comentarios del usuario para el informe ',
  `concepto` varchar(300) NOT NULL DEFAULT 'concepto' COMMENT 'Concepto que se muestra en el iforme',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'Usuario que crea el informe',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en que se registra el informe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informe_estufaeincubadora`
--
ALTER TABLE `informe_estufaeincubadora`
  ADD PRIMARY KEY (`id_informe_estufaeincubadora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informe_estufaeincubadora`
--
ALTER TABLE `informe_estufaeincubadora`
  MODIFY `id_informe_estufaeincubadora` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
