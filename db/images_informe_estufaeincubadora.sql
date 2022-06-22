-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:29:08
-- Versión del servidor: 5.7.36
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
-- Estructura de tabla para la tabla `images_informe_estufaeincubadora`
--

CREATE TABLE `images_informe_estufaeincubadora` (
  `id_imagen` int(11) NOT NULL COMMENT 'id principal de la tabla',
  `id_informe` int(11) DEFAULT NULL COMMENT 'id del informe con relacion',
  `tipo_imagen` int(1) DEFAULT NULL COMMENT '1 Posición sensor 2 Grafico TEMP 3 Grafico HUM  4 equipo',
  `ubicacion` varchar(100) DEFAULT NULL COMMENT 'Directorio de la imagen',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de la creación de productos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `images_informe_estufaeincubadora`
--
ALTER TABLE `images_informe_estufaeincubadora`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `images_informe_estufaeincubadora`
--
ALTER TABLE `images_informe_estufaeincubadora`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id principal de la tabla';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
