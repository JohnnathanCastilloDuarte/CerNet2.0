-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2022 a las 00:41:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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
-- Estructura de tabla para la tabla `item_sala_limpia`
--

CREATE TABLE `item_sala_limpia` (
  `id` int(11) NOT NULL COMMENT 'id primaria',
  `id_item` int(11) DEFAULT NULL COMMENT 'id del item al que se asigna',
  `clasificacion_oms` varchar(100) DEFAULT NULL COMMENT 'clasificacion_oms',
  `clasificacion_iso` varchar(100) DEFAULT NULL COMMENT 'clasificacion_iso\r\n',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'dirección del ítem',
  `ubicacion_interna` varchar(100) DEFAULT NULL COMMENT 'ubicación interna del ítem',
  `area_interna` varchar(100) DEFAULT NULL COMMENT 'Área interna del ítem',
  `Area_m2` varchar(100) DEFAULT NULL COMMENT 'Area de la sala en metros cuadrados',
  `volumen_m3` varchar(100) DEFAULT NULL COMMENT 'Volumen de la sala en metros cubicos',
  `claudal_m3h` varchar(100) DEFAULT NULL COMMENT 'claudal_m3h',
  `ren_hr` varchar(100) DEFAULT NULL COMMENT 'ren_hr',
  `temp_max` varchar(50) DEFAULT NULL COMMENT 'temperatura °c',
  `temp_min` varchar(50) DEFAULT NULL COMMENT 'Est la temperatura minima',
  `hr_min` varchar(100) DEFAULT NULL COMMENT 'hum_relativa',
  `hr_max` varchar(50) DEFAULT NULL,
  `lux` varchar(100) DEFAULT NULL COMMENT 'lux/luz',
  `ruido_dba` varchar(100) DEFAULT NULL COMMENT 'ruido_dba',
  `presion_sala` varchar(100) DEFAULT NULL COMMENT 'presion_sala',
  `presion_versus` varchar(100) DEFAULT NULL COMMENT 'presion_versus',
  `tipo_presion` varchar(100) DEFAULT NULL COMMENT 'tipo_presion',
  `puntos_muestreo` varchar(100) DEFAULT NULL COMMENT 'puntos_muestreo',
  `codigo` varchar(100) DEFAULT NULL,
  `estado_sala` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_sala_limpia`
--
ALTER TABLE `item_sala_limpia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_sala_limpia`
--
ALTER TABLE `item_sala_limpia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id primaria';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
