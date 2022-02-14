-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2022 a las 18:38:23
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
-- Estructura de tabla para la tabla `campana_extraccion_prueba_4`
--

CREATE TABLE `campana_extraccion_prueba_4` (
  `id_prueba` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item asignado',
  `punto_1` varchar(10) NOT NULL DEFAULT 'valor',
  `punto_2` varchar(10) NOT NULL DEFAULT 'valor',
  `punto_3` varchar(10) NOT NULL DEFAULT 'valor',
  `punto_4` varchar(100) DEFAULT NULL,
  `punto_5` varchar(100) DEFAULT NULL,
  `punto_promedio` varchar(10) NOT NULL DEFAULT 'valor',
  `categoria` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campana_extraccion_prueba_4`
--

INSERT INTO `campana_extraccion_prueba_4` (`id_prueba`, `id_asignado`, `punto_1`, `punto_2`, `punto_3`, `punto_4`, `punto_5`, `punto_promedio`, `categoria`, `fecha_registro`) VALUES
(1, 1, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 1, '2022-01-31 17:16:13'),
(2, 1, 'valor', 'valor', 'valor', NULL, NULL, '', 2, '2022-01-31 17:16:13'),
(3, 1, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 1, '2022-01-31 17:16:13'),
(4, 1, 'valor', 'valor', 'valor', NULL, NULL, '', 2, '2022-01-31 17:16:13'),
(5, 1, '12', '12', '12', '12', '12', '12', 3, '2022-01-31 17:16:13'),
(6, 4, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 1, '2022-02-14 17:13:55'),
(7, 4, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 1, '2022-02-14 17:13:55'),
(8, 4, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 2, '2022-02-14 17:13:55'),
(9, 4, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 3, '2022-02-14 17:13:55'),
(10, 4, 'valor', 'valor', 'valor', NULL, NULL, 'valor', 2, '2022-02-14 17:13:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campana_extraccion_prueba_4`
--
ALTER TABLE `campana_extraccion_prueba_4`
  ADD PRIMARY KEY (`id_prueba`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campana_extraccion_prueba_4`
--
ALTER TABLE `campana_extraccion_prueba_4`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
