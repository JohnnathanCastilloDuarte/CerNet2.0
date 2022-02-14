-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 17:14:53
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
-- Estructura de tabla para la tabla `normativa_pb_campanas`
--

CREATE TABLE `normativa_pb_campanas` (
  `id` int(11) NOT NULL COMMENT 'PK de esta tabla',
  `medicion` varchar(100) NOT NULL COMMENT 'medicion de normativa ',
  `requisito` varchar(100) NOT NULL COMMENT 'requisito de normativa',
  `valor_obtenido` varchar(100) NOT NULL COMMENT 'valor obtenido en normativa',
  `veredicto` varchar(100) NOT NULL COMMENT 'Veredicto de la normativa',
  `id_informe` int(11) NOT NULL COMMENT 'FK de la tabla informe_pb_campana'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `normativa_pb_campanas`
--
ALTER TABLE `normativa_pb_campanas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `normativa_pb_campanas`
--
ALTER TABLE `normativa_pb_campanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK de esta tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
