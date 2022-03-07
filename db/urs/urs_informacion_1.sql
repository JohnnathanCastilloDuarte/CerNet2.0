-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 17:06:45
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
-- Estructura de tabla para la tabla `urs_informacion_1`
--

CREATE TABLE `urs_informacion_1` (
  `id` int(11) NOT NULL COMMENT 'Es la llave principal',
  `explicacion_global` text DEFAULT NULL,
  `condicion_trabajo` text DEFAULT NULL COMMENT 'Son las condiciones de trabajo ',
  `fuente_electrica` varchar(100) DEFAULT NULL COMMENT 'Es la espeficicacion de la fuente electrica (110V a 440V /60HZ)',
  `montaje_equipo1` text DEFAULT NULL COMMENT 'información del montaje 1',
  `montaje_equipo2` text DEFAULT NULL COMMENT 'información del montaje 2',
  `rango_operario` varchar(100) DEFAULT NULL COMMENT 'rango de hora que se ejecutara el equipo(24 horas los 7 dias)',
  `norma_sigue` varchar(100) DEFAULT NULL COMMENT 'Normativa del pais  ',
  `soporte_tecnico_post_marcha` varchar(100) DEFAULT NULL COMMENT 'Si la empresa tiene soporte técnico post marcha se escribe la descripción de esta ',
  `activacion_respaldo` varchar(100) DEFAULT NULL COMMENT 'Activación del respaldo para el equipo (3 minutos despues )',
  `objetivo` text DEFAULT NULL COMMENT 'objetivo ',
  `introduccion_funcion` text DEFAULT NULL COMMENT 'introduccion funcion ',
  `id_asignado` int(11) NOT NULL COMMENT 'id_asignado '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `urs_informacion_1`
--
ALTER TABLE `urs_informacion_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `urs_informacion_1`
--
ALTER TABLE `urs_informacion_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Es la llave principal';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
