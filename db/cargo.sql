-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 16:20:23
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
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `nombre` varchar(250) NOT NULL COMMENT 'nombre del cargo',
  `id_departamento` int(11) NOT NULL COMMENT 'id de la tabla departamento',
  `estado` int(11) NOT NULL COMMENT '0-No activo  || 1-Activo',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre`, `id_departamento`, `estado`, `fecha_registro`) VALUES
(1, 'Engineer', 1, 1, '2021-11-24 14:28:53'),
(2, 'Consultant', 1, 1, '2021-11-24 14:28:53'),
(3, 'Junior Analyst', 1, 1, '2021-11-24 14:28:53'),
(4, 'Inspector Junior', 1, 1, '2021-11-24 14:28:53'),
(5, 'Senior Consultant', 1, 1, '2021-11-24 14:28:53'),
(6, 'Senior Analyst', 1, 1, '2021-11-24 14:28:53'),
(7, 'Engineer', 2, 1, '2021-11-24 14:36:50'),
(8, 'Consultant', 2, 1, '2021-11-24 14:36:50'),
(9, 'Junior Analyst', 2, 1, '2021-11-24 14:36:50'),
(10, 'Inspector Junior', 2, 1, '2021-11-24 14:36:50'),
(11, 'Senior Consultant', 2, 1, '2021-11-24 14:36:50'),
(12, 'Senior Analyst', 2, 1, '2021-11-24 14:36:50'),
(13, 'IT Strategic Coordinator', 3, 1, '2021-11-24 14:41:36'),
(14, 'Software Developer', 3, 1, '2021-11-24 14:41:36'),
(15, 'Engineer', 4, 1, '2021-11-24 14:43:51'),
(16, 'Consultant', 4, 1, '2021-11-24 14:43:51'),
(17, 'Junior Analyst', 4, 1, '2021-11-24 14:43:51'),
(18, 'Inspector Junior', 4, 1, '2021-11-24 14:43:51'),
(19, 'Senior Consultant', 4, 1, '2021-11-24 14:43:51'),
(20, 'Senior Analyst', 4, 1, '2021-11-24 14:43:51'),
(21, 'Quality Controller', 5, 1, '2021-11-24 14:45:10'),
(22, 'Documentary Analyst', 6, 1, '2021-11-24 14:48:59'),
(23, 'Senior Documentary Analyst', 6, 1, '2021-11-24 14:48:59'),
(24, 'Leading Senior Documentary Analyst', 6, 1, '2021-11-24 14:48:59'),
(25, 'Junior Documentary Analyst', 6, 1, '2021-11-24 14:48:59'),
(26, 'Chief Executive Officer', 8, 1, '2021-11-24 14:49:58'),
(27, 'Chief Operating Officer', 7, 1, '2021-11-24 14:50:27'),
(28, 'Head', 1, 1, '2021-11-24 15:20:06'),
(29, 'Head', 2, 1, '2021-11-24 15:20:06'),
(30, 'Head', 4, 1, '2021-11-24 15:20:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla', AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
