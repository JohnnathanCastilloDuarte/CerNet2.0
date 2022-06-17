-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 18:28:28
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
-- Estructura de tabla para la tabla `equipos_cercal`
--

CREATE TABLE `equipos_cercal` (
  `id_equipo_cercal` int(11) NOT NULL COMMENT 'Id principal de esta tabla',
  `nombre_equipo` varchar(250) NOT NULL COMMENT 'Nombre del equipo',
  `marca_equipo` varchar(250) NOT NULL COMMENT 'Marca del equipo',
  `n_serie_equipo` varchar(250) NOT NULL COMMENT 'Numero de serie del equipo',
  `modelo_equipo` varchar(250) NOT NULL COMMENT 'Modelo del equipo',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos_cercal`
--

INSERT INTO `equipos_cercal` (`id_equipo_cercal`, `nombre_equipo`, `marca_equipo`, `n_serie_equipo`, `modelo_equipo`, `fecha_registro`) VALUES
(1, 'pbequipo', 'cercalino', 'NS200', '2020', '2022-01-24 20:13:29'),
(2, '2DOEQUIPO', 'CERCALINO', 'NS150', 'MODEL2020', '2022-01-24 20:14:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos_cercal`
--
ALTER TABLE `equipos_cercal`
  ADD PRIMARY KEY (`id_equipo_cercal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_cercal`
--
ALTER TABLE `equipos_cercal`
  MODIFY `id_equipo_cercal` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
