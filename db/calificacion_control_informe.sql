-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 16:50:36
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
-- Estructura de tabla para la tabla `calificacion_control_informe`
--

CREATE TABLE `calificacion_control_informe` (
  `id_informe` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la tabla item asignado',
  `nombre_informe` varchar(125) NOT NULL COMMENT 'nombre del informe',
  `tipo_informe` varchar(25) NOT NULL COMMENT 'tipo de informe que se genera',
  `id_usuario` int(11) NOT NULL COMMENT 'usuario que crea el informe',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificacion_control_informe`
--

INSERT INTO `calificacion_control_informe` (`id_informe`, `id_asignado`, `nombre_informe`, `tipo_informe`, `id_usuario`, `fecha_registro`) VALUES
(3, 9, 'CCL-URS-2022-CIS-2022-CC-01', 'URS', 2, '2022-02-28 05:16:31'),
(6, 9, 'CCL-DQ-2022-CIS-2022-CC-01', 'DQ', 2, '2022-02-28 18:39:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion_control_informe`
--
ALTER TABLE `calificacion_control_informe`
  ADD PRIMARY KEY (`id_informe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion_control_informe`
--
ALTER TABLE `calificacion_control_informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
