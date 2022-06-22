-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-10-2021 a las 13:55:38
-- Versión del servidor: 5.7.35
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
-- Estructura de tabla para la tabla `backtrack`
--

CREATE TABLE `backtrack` (
  `id_backtrack` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha del movimiento',
  `persona` int(11) NOT NULL COMMENT 'id de la persona que realiza el movimiento',
  `movimiento` varchar(500) NOT NULL COMMENT 'Tipo de movimiento que se realiza',
  `modulo` varchar(500) NOT NULL COMMENT 'modulo en el que se realiza la acción'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `backtrack`
--

INSERT INTO `backtrack` (`id_backtrack`, `fecha`, `persona`, `movimiento`, `modulo`) VALUES
(1, '2021-09-22 16:58:18', 2, 'Inició sesión en', 'CerNet 2.0'),
(3, '2021-09-22 17:13:03', 2, 'Cerró Sesión en', 'CerNet 2.0'),
(4, '2021-09-22 17:15:40', 2, 'Inició sesión en', 'CerNet 2.0'),
(5, '2021-09-27 14:57:22', 2, 'Inició sesión en', 'CerNet 2.0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backtrack`
--
ALTER TABLE `backtrack`
  ADD PRIMARY KEY (`id_backtrack`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backtrack`
--
ALTER TABLE `backtrack`
  MODIFY `id_backtrack` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
