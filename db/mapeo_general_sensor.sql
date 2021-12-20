-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 17:05:03
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
-- Estructura de tabla para la tabla `mapeo_general_sensor`
--

CREATE TABLE `mapeo_general_sensor` (
  `id_sensor_mapeo` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL COMMENT 'id tabla sensores',
  `id_mapeo` int(11) NOT NULL COMMENT 'id de la tabla mapeo',
  `id_bandeja` int(11) NOT NULL COMMENT 'id de la tabla bandeja',
  `posicion` int(11) DEFAULT 0 COMMENT 'posici+on del sensor en la bandeja',
  `posicion_tem` varchar(10) NOT NULL DEFAULT 'no aplica' COMMENT 'Posición o colum del archivo de DC',
  `posicion_hum` varchar(10) NOT NULL DEFAULT 'no aplica' COMMENT 'Posición o colum del archivo de DC',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mapeo_general_sensor`
--

INSERT INTO `mapeo_general_sensor` (`id_sensor_mapeo`, `id_sensor`, `id_mapeo`, `id_bandeja`, `posicion`, `posicion_tem`, `posicion_hum`, `fecha_registro`) VALUES
(1, 66, 1, 2, 1, '2', '3', '2021-12-17 18:49:40'),
(2, 722, 1, 2, 2, '4', '5', '2021-12-17 19:00:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mapeo_general_sensor`
--
ALTER TABLE `mapeo_general_sensor`
  ADD PRIMARY KEY (`id_sensor_mapeo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mapeo_general_sensor`
--
ALTER TABLE `mapeo_general_sensor`
  MODIFY `id_sensor_mapeo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
