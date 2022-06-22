-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 14:34:17
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
-- Estructura de tabla para la tabla `participante_documentacion`
--

CREATE TABLE `participante_documentacion` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL COMMENT 'Id principal de la tabla',
  `id_documentacion` int(11) NOT NULL COMMENT 'id de la tabla documentacion ',
  `orden` int(11) DEFAULT 1 COMMENT 'Orden de revisión',
  `rol` int(11) DEFAULT NULL COMMENT '1 elaborado por, 2 revisado por, 3 aprobado por',
  `tipo` int(11) DEFAULT 0 COMMENT '0 Prepara 1 revisa 3 aprueba',
  `id_usuario` int(11) DEFAULT NULL COMMENT 'id usuario que registra',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de creación del registro',
  `fecha_firma` datetime DEFAULT NULL COMMENT 'Fecha de la firma del participante',
  `QR` varchar(500) NOT NULL COMMENT 'qr ubicacion'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participante_documentacion`
--
ALTER TABLE `participante_documentacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participante_documentacion`
--
ALTER TABLE `participante_documentacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
