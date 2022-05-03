-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2022 a las 00:52:26
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
-- Estructura de tabla para la tabla `datos_de_prueba_3`
--

CREATE TABLE `datos_de_prueba_3` (
  `id` int(11) NOT NULL COMMENT 'id primaria',
  `campo_1` varchar(100) DEFAULT NULL COMMENT 'El campo que se registrara',
  `campo_2` varchar(100) DEFAULT NULL COMMENT 'Medición Realizada en',
  `campo_3` varchar(100) DEFAULT NULL COMMENT 'Resultado (Pa) ',
  `campo_4` varchar(100) DEFAULT NULL COMMENT 'Presión especificada (Pa)',
  `campo_5` varchar(100) DEFAULT NULL COMMENT 'Tipo de Presión',
  `campo_6` varchar(100) DEFAULT NULL COMMENT 'Cumple Especificación',
  `id_prueba_3` int(11) DEFAULT NULL COMMENT 'id de la prueba que viene del campo de la tabla de pruebas 3',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'fecha del registro '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_de_prueba_3`
--

INSERT INTO `datos_de_prueba_3` (`id`, `campo_1`, `campo_2`, `campo_3`, `campo_4`, `campo_5`, `campo_6`, `id_prueba_3`, `fecha_registro`) VALUES
(1, 'uno', 'dos', 'tres', 'cuantro', 'cinco', 'seis', 1, '2022-05-03 12:10:41'),
(2, 'uno_1', 'dos_2', 'tres_3', 'cuatro_4', 'cinco_5', 'seis_6', 2, '2022-05-03 13:36:59'),
(5, '11', '22', '33', '44', '55', '66', 5, '2022-05-03 16:55:06'),
(6, '123', '123', '123', '123', '123', '123', 6, '2022-05-03 17:39:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_de_prueba_3`
--
ALTER TABLE `datos_de_prueba_3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_de_prueba_3`
--
ALTER TABLE `datos_de_prueba_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id primaria', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
