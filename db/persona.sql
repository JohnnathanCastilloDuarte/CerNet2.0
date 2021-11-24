-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 22:03:51
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
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL COMMENT 'id de la persona',
  `id_usuario` int(10) NOT NULL COMMENT 'id de usuario creado',
  `nombre` varchar(50) DEFAULT NULL COMMENT 'nombre de la persona',
  `apellido` varchar(50) DEFAULT NULL COMMENT 'apellido de la persona',
  `email` varchar(250) DEFAULT NULL COMMENT 'correo electronico',
  `telefono` varchar(20) DEFAULT NULL COMMENT 'telefono',
  `id_cargo` int(10) DEFAULT NULL COMMENT 'cargo al que pertenece la persona',
  `pais` varchar(25) DEFAULT NULL COMMENT 'pais',
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() COMMENT 'fecha en que se crea la persona',
  `estado` varchar(15) DEFAULT NULL COMMENT 'estado actual en la compañia (activo, desvinculado, con licencia)',
  `numero_identificacion` varchar(15) DEFAULT NULL COMMENT 'numero de registro nacional del empleado',
  `id_empresa` int(10) DEFAULT NULL COMMENT 'id que relaciona la persona con la empresa',
  `imagen_usuario` varchar(500) DEFAULT NULL COMMENT 'campo que almacena la ruta de la imagen del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `id_usuario`, `nombre`, `apellido`, `email`, `telefono`, `id_cargo`, `pais`, `fecha_registro`, `estado`, `numero_identificacion`, `id_empresa`, `imagen_usuario`) VALUES
(1, 1, 'Miguel Angel', 'Ortiz Pineda', 'mortiz@cercal.cl', NULL, 13, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(2, 40, 'Claudia', 'Velasco', 'cvelasco@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(3, 43, 'Evangelina', 'Valdez', 'evaldez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(4, 46, 'Antonio', 'Chirinos', 'achirinos@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(5, 47, 'Jonathan', 'Ferrer', 'jferrer@cercal.cl', NULL, 29, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(6, 55, 'Maria Camila', 'Montoya', 'mmontoya@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(8, 57, 'Paula', 'Calderon', 'pcalderon@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(9, 58, 'Raul', 'Quevedo', 'rquevedo@cercal.cl', NULL, 27, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(10, 59, 'Daniela', 'GonzalezDelCarpio', 'dgonzalez@cercal.cl', '', 0, '', '2021-02-16 19:01:31', 'Desvinculado', '', 73, 'templates/usuario/images/images_profile/profile_image59.jpg'),
(11, 60, 'Angie', 'Cruz', 'acruz@cercal.cl', NULL, 21, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(12, 2, 'Johnathan', 'Castillo', 'jcastillo@cercal.cl', '', 13, '', '2021-02-16 19:01:31', 'Activo', '', 73, 'templates/usuario/images/images_profile/profile_image2.jpg'),
(13, 61, 'Leiny', 'Perez', 'lperez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(14, 62, 'Linda', 'ParedesAbreu', 'lparedes@cercal.cl', NULL, 24, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(15, 65, 'Jesús', 'Casas', 'jcasas@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(16, 67, 'Liliana', 'Jimenez Fernandez', 'ljimenez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(17, 68, 'Doria', 'Davalillo', 'ddvalillo@cercal.cl', NULL, 23, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(18, 69, 'Harold', 'Moronta', 'hmoronta@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(19, 19, 'Carolina', 'Diaz', 'cdiaz@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(20, 36, 'Luis ', 'Gonzalez ', 'lgonzalez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(21, 21, 'Jose luis', 'Rodriguez', 'jrodriguez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(22, 22, 'Sebastian ', 'Ramirez', 'sramirez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(23, 23, 'Victor ', 'Padilla', 'vpadilla@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(24, 24, 'Felipe', 'Lobos', 'flobos@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(25, 25, 'Diego ', 'Jabre', 'djabre@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(26, 26, 'Cesar', 'Velasquez', 'cvelasquez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(27, 27, 'kerly', 'Padilla', 'cobranza@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(28, 28, 'Brian', 'Fiszman', 'bfiszman@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(29, 29, 'Victor', 'Garcia', 'vgarcia@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(30, 30, 'Fernanda', 'Chavez', 'fchavez@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(31, 31, 'Evelyn', 'Barrios', 'ebarrios@cercal.cl', NULL, 0, NULL, '2021-02-16 19:01:31', 'Activo', NULL, 73, NULL),
(32, 32, 'Ignacio', 'Schacht', 'ischacht@cercal.cl', '+56992040863', 0, 'Chile', '2021-02-16 19:01:31', NULL, '', 73, 'templates/usuario/images/images_profile/profile_imageIgnacio.jpg'),
(33, 70, 'Maria', 'Quiñones', 'mvirginia@cercal.cl', NULL, 0, NULL, '2021-02-17 18:52:12', 'Activa', NULL, 73, NULL),
(37, 79, 'Maribel', 'Castillo', 'maribelcastillo@pharmaisa.cl', NULL, 0, NULL, '2021-03-05 13:52:22', NULL, NULL, 73, NULL),
(38, 100, 'lucelly', 'perilla', 'lperilla@cercal.cl', NULL, 0, 'Chile', '2021-04-09 15:50:15', NULL, NULL, 73, NULL),
(39, 101, 'Cindy ', 'Torres', 'ctorres@saval.cl', NULL, 0, NULL, '2021-04-14 10:27:26', NULL, NULL, 73, NULL),
(40, 99, 'Iolanda', 'Da Corte', 'idacorte@cercal.cl', '', 0, '', '2021-05-18 22:16:39', NULL, '', 73, 'templates/usuario/images/images_profile/profile_imageIolanda.jpg'),
(42, 103, 'Juan Diego', 'Gonzalez', 'jgonzalez@cercal.cl', '123456789', 0, 'Chile', '2021-08-05 23:49:01', 'Activo', '123456789', 73, NULL),
(43, 104, 'Diana', 'Penaranda', 'johnnathanalexanderc@gmail.com', '123456789', 25, 'Chile', '2021-08-27 19:41:09', 'Activo', '123456789', 73, NULL),
(44, 105, 'fabiana', 'Sanchez', 'fcastillo@cercal.cl', '3022670851', 0, 'Colombia', '2021-10-07 03:01:37', 'Activo', '1072713669', 73, 'templates/usuario/images/images_profile/profile_image105.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id de la persona', AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
