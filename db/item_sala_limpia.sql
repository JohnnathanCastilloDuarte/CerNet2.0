-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2022 a las 17:37:29
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
-- Estructura de tabla para la tabla `item_sala_limpia`
--

CREATE TABLE `item_sala_limpia` (
  `id` int(11) NOT NULL COMMENT 'id primaria',
  `id_item` int(11) DEFAULT NULL COMMENT 'id del item al que se asigna',
  `Area_sala_limpia` varchar(100) DEFAULT NULL COMMENT 'Area de la sala limpia',
  `Codigo` varchar(100) DEFAULT NULL COMMENT 'Codigo de la sala limpia\r\n',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'dirección del ítem',
  `area_interna` varchar(100) DEFAULT NULL COMMENT 'Área interna del ítem',
  `Area_m2` varchar(100) DEFAULT NULL COMMENT 'Area de la sala en metros cuadrados',
  `volumen_m3` varchar(100) DEFAULT NULL COMMENT 'Volumen de la sala en metros cubicos',
  `Estado_sala` varchar(100) DEFAULT NULL COMMENT 'Estado de la sala ',
  `especificacion_1_temp` varchar(50) DEFAULT NULL COMMENT 'especificación de temperatura 1',
  `especificacion_2_temp` varchar(50) DEFAULT NULL COMMENT 'especificación de temperatura 2',
  `especificacion_1_hum` varchar(50) DEFAULT NULL COMMENT 'especificación de humedad 1',
  `especificacion_2_hum` varchar(50) DEFAULT NULL COMMENT 'especificación de humedad 2',
  `clasificacion_oms` varchar(50) NOT NULL,
  `clasificacion_iso` varchar(50) NOT NULL,
  `ren_hr` varchar(50) NOT NULL,
  `lux` varchar(50) NOT NULL,
  `ruido_dba` varchar(50) NOT NULL,
  `presion_sala` varchar(50) NOT NULL,
  `presion_versus` varchar(50) NOT NULL,
  `tipo_presion` varchar(50) NOT NULL,
  `puntos_muestreo` varchar(50) NOT NULL,
  `temp_informativa` varchar(50) NOT NULL,
  `hum_informativa` varchar(50) NOT NULL,
  `cantidad_extracciones` varchar(50) NOT NULL,
  `cantidad_inyecciones` varchar(50) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item_sala_limpia`
--

INSERT INTO `item_sala_limpia` (`id`, `id_item`, `Area_sala_limpia`, `Codigo`, `direccion`, `area_interna`, `Area_m2`, `volumen_m3`, `Estado_sala`, `especificacion_1_temp`, `especificacion_2_temp`, `especificacion_1_hum`, `especificacion_2_hum`, `clasificacion_oms`, `clasificacion_iso`, `ren_hr`, `lux`, `ruido_dba`, `presion_sala`, `presion_versus`, `tipo_presion`, `puntos_muestreo`, `temp_informativa`, `hum_informativa`, `cantidad_extracciones`, `cantidad_inyecciones`, `fecha_registro`) VALUES
(1, 13, 'asf', 'as', 'as', 'asf', 'as', 'as', 'as', '12', '12', '12', '12', 'D', '2', '12', '12', '12', '12', '12', '12', '12', '12', '12', '', '', '2022-05-05 20:20:42'),
(2, 14, NULL, 'c12', 'Av. los leones, 382', 'area', '12', '12', 'Operacion', '16', '15', '15', '15', 'A', 'A', '12', '12', '12', '12', '12', '12', '12', 'No', 'No', '16', '16', '2022-05-10 15:22:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id primaria', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
