-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2016 a las 01:45:06
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consultorio_dental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE IF NOT EXISTS `abono` (
  `pk_abono` smallint(6) NOT NULL,
  `fk_paciente` smallint(6) NOT NULL,
  `abono` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`pk_abono`, `fk_paciente`, `abono`, `fecha`) VALUES
(1, 1, 20, '2016-02-05 20:47:27'),
(2, 1, 0, '2016-02-14 00:41:50'),
(3, 1, 100, '2016-03-04 21:03:20'),
(4, 1, 10, '2016-03-04 21:09:50'),
(5, 1, 100, '2016-03-09 15:08:02'),
(6, 1, 100, '2016-03-09 15:08:19'),
(7, 1, 100, '2016-03-09 15:08:37'),
(8, 1, 100, '2016-03-09 15:08:40'),
(9, 1, 100, '2016-03-09 15:10:13'),
(10, 1, 100, '2016-03-09 15:10:25'),
(11, 1, 1, '2016-03-09 15:10:50'),
(12, 1, 10, '2016-03-09 15:12:42'),
(13, 1, 10, '2016-03-09 15:13:54'),
(14, 1, 10, '2016-03-09 15:14:33'),
(15, 1, 10, '2016-03-09 15:14:44'),
(16, 1, 10, '2016-03-09 15:15:01'),
(17, 1, 10, '2016-03-09 15:18:12'),
(18, 1, 1, '2016-03-09 15:19:25'),
(19, 1, 11, '2016-03-09 15:20:00'),
(20, 1, 11, '2016-03-09 15:23:41'),
(21, 1, 11, '2016-03-09 15:24:03'),
(22, 1, 11, '2016-03-09 15:24:26'),
(23, 1, 11, '2016-03-09 15:24:54'),
(24, 1, 1, '2016-03-09 15:25:01'),
(25, 1, 1, '2016-03-09 15:25:07'),
(26, 1, 1, '2016-03-09 15:28:10'),
(27, 1, 1, '2016-03-09 15:31:35'),
(28, 1, 1, '2016-03-09 16:20:53'),
(29, 1, 1, '2016-03-09 16:24:40'),
(30, 1, 1, '2016-03-09 16:24:57'),
(31, 1, 1, '2016-03-09 16:25:18'),
(32, 1, 1, '2016-03-09 16:26:06'),
(33, 1, 1, '2016-03-09 16:26:36'),
(34, 1, 10, '2016-03-09 16:47:00'),
(35, 1, 10, '2016-03-09 16:48:01'),
(36, 1, 10, '2016-03-09 16:48:03'),
(37, 1, 10, '2016-03-09 16:48:58'),
(38, 1, 10, '2016-03-09 16:49:40'),
(39, 1, 10, '2016-03-09 16:57:04'),
(40, 1, 9, '2016-03-10 04:30:30'),
(41, 1, 9, '2016-03-10 04:38:31'),
(42, 1, 9, '2016-03-10 04:38:54'),
(43, 1, 9, '2016-03-10 04:40:59'),
(44, 1, 9, '2016-03-10 04:41:10'),
(45, 1, 9, '2016-03-10 04:41:26'),
(46, 1, 1, '2016-03-10 15:12:33'),
(47, 1, 800, '2016-04-11 18:14:22'),
(48, 1, 800, '2016-04-11 18:14:51'),
(49, 1, 9999, '2016-04-11 18:15:00'),
(50, 2, 1000, '2016-04-06 06:00:00'),
(51, 1, 190, '2016-04-15 14:50:48'),
(52, 1, 90, '2016-04-26 16:00:22'),
(53, 1, 120, '2016-09-26 19:04:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adeudos`
--

CREATE TABLE IF NOT EXISTS `adeudos` (
  `pk_adeudos` smallint(6) NOT NULL,
  `fk_paciente` smallint(6) NOT NULL,
  `adeudo` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `t_pagar` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `adeudos`
--

INSERT INTO `adeudos` (`pk_adeudos`, `fk_paciente`, `adeudo`, `importe`, `t_pagar`) VALUES
(1, 1, 1300, 600, 7860),
(2, 3, 1000, 90, 1510),
(3, 2, 3650, 3000, 650),
(6, 6, 1000, 30, 3880),
(7, 11, 1300, 900, 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agandacitas`
--

CREATE TABLE IF NOT EXISTS `agandacitas` (
  `pkagendacita` smallint(6) NOT NULL,
  `fk_paciente` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `fk_cita` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `pk_agenda` smallint(6) NOT NULL,
  `fk_paciente` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `ampm` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `h_entrada` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `min_entrada` int(11) NOT NULL,
  `h_salida` int(11) NOT NULL,
  `min_salida` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`pk_agenda`, `fk_paciente`, `fecha`, `ampm`, `h_entrada`, `min_entrada`, `h_salida`, `min_salida`) VALUES
(2, 1, '2016-02-06', 'am', '1', 30, 2, 0),
(3, 3, '2016-02-16', 'am', '10', 0, 11, 0),
(4, 2, '2016-03-09', 'pm', '1', 0, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `pk_cita` smallint(6) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `h_entrada` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`pk_cita`, `nombre`, `h_entrada`) VALUES
(91, 'Cita 1', 8),
(92, 'Cita 2', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_paciente`
--

CREATE TABLE IF NOT EXISTS `historial_paciente` (
  `pk_historial` smallint(6) NOT NULL,
  `fecha_consulta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_paciente` smallint(6) NOT NULL,
  `sintomas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `receta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto_diagnostico` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial_paciente`
--

INSERT INTO `historial_paciente` (`pk_historial`, `fecha_consulta`, `fk_paciente`, `sintomas`, `receta`, `foto_diagnostico`) VALUES
(1, '2016-02-09 15:19:38', 1, 'dysghd', 'Dolor de muelas', 'Foto pendiente'),
(2, '2016-02-09 15:18:16', 2, 'Dolor de muelas', 'medicamento 1', 'Foto pendiente'),
(4, '2016-02-09 15:57:18', 3, 'sintoma1', 'medicamneto3', 'Foto pendiente'),
(5, '2016-02-09 15:57:31', 3, 'sintoma1', 'medicamneto 4', 'Foto pendiente'),
(7, '2016-02-09 15:59:48', 3, 'caries', 'medicamento', 'Foto pendiente'),
(8, '2016-02-09 16:00:01', 3, 'caries', 'medicamento 1', 'Foto pendiente'),
(9, '2016-02-09 16:00:12', 3, 'caries', 'medicamento 5', 'Foto pendiente'),
(10, '2016-02-09 16:00:42', 3, 'caries', 'medicamento 6', 'Foto pendiente'),
(11, '2016-02-25 18:08:55', 7, 'asmna', ',ajmnsEscriba lo que le recetara.', 'Foto pendiente'),
(12, '2016-02-25 18:10:11', 7, '8jwsni|', 'oiqhwjkenEscriba lo que le recetara.', 'Foto pendiente'),
(13, '2016-03-09 16:06:54', 1, 'caries', 'lavar los dientes <-<', 'Foto pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `imagen_id` int(11) NOT NULL,
  `imagen` mediumblob,
  `tipo_imagen` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_paciente` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_material`
--

CREATE TABLE IF NOT EXISTS `img_material` (
  `imagen_id` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `img_material`
--

INSERT INTO `img_material` (`imagen_id`, `imagen`, `texto`) VALUES
(1, '12417839_999369820120589_524349114078608638_n.jpg', ''),
(2, '12670330_1138202356192213_4398315738473658645_n.jpg', ''),
(3, 'agenda.png', 'tgi0'),
(4, 'dog60.png', '12'),
(5, 'dog66.png', '1111'),
(6, 'baby146.png', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `pk_material` smallint(6) NOT NULL,
  `codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nom_material` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `unidades` int(11) NOT NULL,
  `costo_caja` float NOT NULL,
  `costo_unitario` float NOT NULL,
  `tope` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`pk_material`, `codigo`, `nom_material`, `descripcion`, `unidades`, `costo_caja`, `costo_unitario`, `tope`, `imagen`) VALUES
(1, '1088723', 'Material 1', 'caja con 2', 100, 400, 10, 30, 'imagenes/apple63.png'),
(2, '98765432', 'Material 2', 'Caja con jeringas ', 100, 250, 50, 255, 'imagenes/break1.png'),
(3, '8765ad', 'Material 3', 'caja con enjuague bucal  ', 90, 400, 40, 100, 'imagenes/weightlifter2.png'),
(4, '765345edq', 'Material 4', 'Caja con hidratarelina', 400, 350, 100, 300, 'imagenes/carrot8.png'),
(5, 'yhij3456', 'Material 5', 'caja con capsulas de hidramentelerina.', 600, 1500, 90, 1500, 'imagenes/cross85.png'),
(6, '9875638293492837424', 'M1', 'DEsc12', 18892, 1000, 89, 190, 'imagenes/bicycle14.png'),
(56, '19199', '1991', '1992', 129, 12891, 1992, 192, 'imagenes/runer.png'),
(58, '5663q', 'Material 298', 'desc', 193, 290, 2991, 21, 'imagenes/healthy7.png'),
(59, '10899', '92929', '29u3', 289, 2399, 299, 10, 'imagenes/33915-NZCXHW.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `pk_paciente` smallint(6) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedades_cronicas` text COLLATE utf8_spanish_ci NOT NULL,
  `alergias` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `localidad_origen` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`pk_paciente`, `nombre`, `apellidos`, `curp`, `edad`, `fecha_nac`, `sexo`, `enfermedades_cronicas`, `alergias`, `localidad_origen`, `direccion`, `telefono`, `imagen`) VALUES
(1, 'Alma Delia', 'Delgadillo carrillo', 'qaws123456', 20, '1995-09-19', 'femenino', 'ninguna', 'a las personas metiches', 'Tuxpan Nay', 'Manuel Uribe', 3191001075, 'imagenes/bandaid.png'),
(2, 'Francisca', 'Carrillo Gameros', '1234rftg', 39, '1973-12-03', 'femenino', 'nada', 'nada', 'Tuxpan Nay', 'Manuel Uribe #477', 987654321, 'imagenes/two328.png'),
(3, 'Ruben', 'Cervantes Anaya', 'CDwq123018', 20, '1995-12-12', 'masculino', 'nada', 'nada', 'Tuxpan Nay', 'ksdgfhja', 2147483647, 'imagenes/yin6.png'),
(4, 'Juan', 'MarquÃ©s Rodrigues ', 'JMRT345123bdsd', 20, '1995-04-12', 'masculino', 'ninguna', 'polvo', 'Santiago Ixc.', 'san Rafael #309', 2147483647, 'imagenes/moon154.png'),
(5, 'Cecilio', 'Martines Santiago', 'CMSr31ims8me', 22, '1993-02-09', 'masculino', 'Ninguna', 'Hibramentirilina', 'Villa hidalgo', 'col centro #42', 2147483647, 'imagenes/volleyball9.png'),
(6, 'Alfredo', 'Gonzalez crespo', 'ASGC424hnt72', 21, '1994-03-04', 'masculino', 'nada', 'aire', 'Tuxpan Nay', 'Hidalgo #1245', 2147483647, 'imagenes/drop28.png'),
(7, 'Jose', 'Carrillo Gameros', '987qyjqkwsh1', 15, '2000-10-29', 'femenino', 'nada', 'nada', 'Tuxpan Nay', 'Manuel Uribe #477', 987654567, 'imagenes/babies.png'),
(8, 'User1', 'ap', 'hsg58 sh|', 19, '1994-12-12', 'femenino', 'kalhsd', 'kdjs', 'dkjas72ins', 'majis', 2147483647, 'imagenes/burger10.png'),
(9, 'ujwewd', 'lksdnk', 'kjdnd', 19, '2000-12-12', 'masculino', 'ad', 'ad', 'sds', 'sd', 234567890, 'imagenes/paciente.png'),
(10, 'ujuju', 'strcgh', 'fyyhfgh437', 15, '2000-12-12', 'femenino', '09876543', 'tgfd', '765tygfdrf', 'htgf', 987654376, 'imagenes/anchor36.png'),
(11, 'pepe', 'Gameros Cardona', '3326783hjshwn', 20, '1995-01-03', 'masculino', 'nada', 'sdhjkak', 'Tuxpan Nay', 'Lazaro cardenas #23', 2147483647, 'imagenes/dog-vector-icons-pack.jpg'),
(12, 'carmen', 'gameros', 'CAGN1783ua', 50, '0000-00-00', 'femenino', '12', 'as', 'asfsd2', 'idhwjek', 986543467, 'imagenes/paciente.png'),
(13, 'Oscar', 'Medina carmona', 'OMC8268MNT937', 21, '1995-03-12', 'masculino', 'ninguna', 'nada', 'Tuxpan Nay', 'calle#4', 3101001010, 'imagenes/paciente.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocostosservicios`
--

CREATE TABLE IF NOT EXISTS `registrocostosservicios` (
  `pk_costoservicio` smallint(6) NOT NULL,
  `fk_paciente` smallint(6) NOT NULL,
  `total_calculado` float NOT NULL,
  `importe` float NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `pk_servicio` smallint(6) NOT NULL,
  `nom_servicio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `costo` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`pk_servicio`, `nom_servicio`, `costo`) VALUES
(7, 'limpieza dental', 1000),
(16, 'Servicio', 300),
(23, 'ejemplo 32', 350),
(29, 'S1', 2000),
(30, 'Servicio 4', 300),
(31, 'Servicio 144', 899);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`pk_abono`), ADD KEY `paciente-abono` (`fk_paciente`);

--
-- Indices de la tabla `adeudos`
--
ALTER TABLE `adeudos`
  ADD PRIMARY KEY (`pk_adeudos`), ADD KEY `paciente-adeudos` (`fk_paciente`);

--
-- Indices de la tabla `agandacitas`
--
ALTER TABLE `agandacitas`
  ADD PRIMARY KEY (`pkagendacita`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`pk_agenda`), ADD KEY `agenda_paciente` (`fk_paciente`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`pk_cita`);

--
-- Indices de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD PRIMARY KEY (`pk_historial`), ADD KEY `paciente-historial` (`fk_paciente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`imagen_id`), ADD KEY `fk_paciente` (`fk_paciente`);

--
-- Indices de la tabla `img_material`
--
ALTER TABLE `img_material`
  ADD PRIMARY KEY (`imagen_id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`pk_material`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pk_paciente`);

--
-- Indices de la tabla `registrocostosservicios`
--
ALTER TABLE `registrocostosservicios`
  ADD PRIMARY KEY (`pk_costoservicio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`pk_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `pk_abono` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `adeudos`
--
ALTER TABLE `adeudos`
  MODIFY `pk_adeudos` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `agandacitas`
--
ALTER TABLE `agandacitas`
  MODIFY `pkagendacita` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `pk_agenda` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `pk_cita` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  MODIFY `pk_historial` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `imagen_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `img_material`
--
ALTER TABLE `img_material`
  MODIFY `imagen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `pk_material` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `pk_paciente` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `registrocostosservicios`
--
ALTER TABLE `registrocostosservicios`
  MODIFY `pk_costoservicio` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `pk_servicio` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
ADD CONSTRAINT `paciente-abono` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`pk_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `adeudos`
--
ALTER TABLE `adeudos`
ADD CONSTRAINT `paciente-adeudos` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`pk_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
ADD CONSTRAINT `agenda_paciente` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`pk_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
ADD CONSTRAINT `paciente-historial` FOREIGN KEY (`fk_paciente`) REFERENCES `paciente` (`pk_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
