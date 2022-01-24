-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2022 a las 21:11:08
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
-- Estructura de tabla para la tabla `certificado_equipo`
--

CREATE TABLE `certificado_equipo` (
  `id_certificado` int(11) NOT NULL COMMENT 'Id principal de esta tabla',
  `numero_certificado` varchar(250) NOT NULL COMMENT 'Certificado',
  `id_equipo_cercal` int(11) NOT NULL COMMENT 'id de la tabla equipo cercal',
  `fecha_emision` date NOT NULL COMMENT 'Fecha de emisión del certificado',
  `fecha_vencimiento` date NOT NULL COMMENT 'Fecha de vencimiento del certificado',
  `pais` varchar(250) NOT NULL COMMENT 'Pais donde se realiza la certificacion del equipo',
  `estado` varchar(250) NOT NULL COMMENT 'Estado del equipo, puede ser vigente o  vencido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `certificado_equipo`
--

INSERT INTO `certificado_equipo` (`id_certificado`, `numero_certificado`, `id_equipo_cercal`, `fecha_emision`, `fecha_vencimiento`, `pais`, `estado`) VALUES
(1, 'aaa11111a11a1a1a', 1, '2021-05-05', '2022-05-05', 'Colombia', 'Vigente'),
(2, 'as54f65as4f68asdasd', 2, '2021-11-03', '2022-11-03', 'Colombia', 'Vigente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificado_equipo`
--
ALTER TABLE `certificado_equipo`
  ADD PRIMARY KEY (`id_certificado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificado_equipo`
--
ALTER TABLE `certificado_equipo`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id principal de esta tabla', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
