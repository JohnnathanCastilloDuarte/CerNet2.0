-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 22:12:32
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
-- Estructura de tabla para la tabla `registro_dc`
--

CREATE TABLE `registro_dc` (
  `id_registro` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_mapeo` int(11) NOT NULL COMMENT 'id relacion con la tabla mapeo',
  `id_asignado` int(11) NOT NULL COMMENT 'id de la taba item_asignado',
  `url_archivo` varchar(500) NOT NULL COMMENT 'Ubicación del EXCEL',
  `url_error` varchar(500) NOT NULL COMMENT 'Ubicación del TXT del error',
  `estado` int(11) NOT NULL COMMENT '0-Error 1-Sin errores',
  `id_usuario` int(11) NOT NULL COMMENT 'id del usuario que realiza el registro',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de registro del archivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_dc`
--
ALTER TABLE `registro_dc`
  ADD PRIMARY KEY (`id_registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_dc`
--
ALTER TABLE `registro_dc`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
