-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2021 a las 18:27:53
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
-- Estructura de tabla para la tabla `estufaeincubadora_datos_crudos`
--

CREATE TABLE `estufaeincubadora_datos_crudos` (
  `id_dato_crudo` int(11) NOT NULL,
  `id_estufaeincubadora_sensor` int(11) NOT NULL,
  `columna` int(11) NOT NULL COMMENT '# de la columna en la cual se asigna el sensor',
  `time` datetime NOT NULL,
  `temperatura` varchar(10) NOT NULL,
  `aprobacion` int(11) NOT NULL DEFAULT '0' COMMENT '1 El usuario aprobo los datos crudos 0 no se aprueban los datos crudos',
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estufaeincubadora_datos_crudos`
--
ALTER TABLE `estufaeincubadora_datos_crudos`
  ADD PRIMARY KEY (`id_dato_crudo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estufaeincubadora_datos_crudos`
--
ALTER TABLE `estufaeincubadora_datos_crudos`
  MODIFY `id_dato_crudo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
