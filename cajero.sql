-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2016 a las 10:05:22
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cajero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
`movimiento_ID` int(9) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(20) NOT NULL,
  `cantidad` decimal(9,3) NOT NULL,
  `saldo` decimal(9,3) NOT NULL DEFAULT '0.000',
  `usu_ID` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`movimiento_ID`, `fecha`, `tipo`, `cantidad`, `saldo`, `usu_ID`) VALUES
(24, '2016-08-19 10:37:02', 'Ingreso', '500.000', '500.000', 12),
(25, '2016-08-19 10:37:15', 'Transferencia', '100.000', '400.000', 12),
(26, '2016-08-19 10:44:06', 'Transferencia', '20.000', '-20.000', 13),
(27, '2016-08-19 10:45:43', 'Transferencia', '10.000', '-30.000', 13),
(33, '2016-08-24 07:36:34', 'Ingreso', '1.000', '401.000', 12),
(34, '2016-08-24 07:36:41', 'Transferencia', '1.000', '400.000', 12),
(35, '2016-08-24 07:36:57', 'Ingreso', '1.000', '401.000', 12),
(36, '2016-08-24 07:37:33', 'Ingreso', '1.000', '1.000', 11),
(37, '2016-08-24 07:43:18', 'Ingreso', '1.000', '2.000', 11),
(38, '2016-08-24 07:44:20', 'Transferencia', '1.000', '1.000', 11),
(39, '2016-08-24 08:29:17', 'Ingreso', '5.000', '6.000', 11),
(40, '2016-08-24 08:29:32', 'Transferencia', '3.000', '3.000', 11),
(41, '2016-08-24 08:37:00', 'Transferencia', '1.000', '400.000', 12),
(42, '2016-08-25 07:55:13', 'Ingreso', '100.000', '70.000', 13),
(43, '2016-08-26 07:24:33', 'Ingreso', '0.000', '3.000', 11),
(44, '2016-08-29 08:58:48', 'Ingreso', '9994.000', '9997.000', 11),
(45, '2016-08-29 08:59:51', 'Transferencia', '9998.000', '-1.000', 11),
(46, '2016-08-29 09:00:00', 'Ingreso', '50.000', '49.000', 11),
(48, '2016-08-30 10:49:00', 'Ingreso', '500.000', '500.000', 19),
(49, '2016-08-30 10:49:10', 'Ingreso', '100.000', '600.000', 19),
(50, '2016-08-30 10:49:20', 'Transferencia', '20.000', '580.000', 19),
(51, '2016-08-30 11:31:43', 'Ingreso', '1000.000', '1000.000', 20),
(52, '2016-08-30 11:31:50', 'Transferencia', '55.000', '945.000', 20),
(53, '2016-08-31 07:50:50', 'ingreso', '10.000', '935.000', 20),
(54, '2016-08-31 07:51:17', 'ingreso', '10.000', '925.000', 20),
(55, '2016-08-31 07:51:27', 'ingreso', '10.000', '915.000', 20),
(56, '2016-08-31 07:51:31', 'transferencia', '10.000', '905.000', 20),
(57, '2016-08-31 07:52:05', 'ingreso', '10.000', '895.000', 20),
(58, '2016-08-31 07:52:14', 'Ingreso', '10.000', '905.000', 20),
(59, '2016-08-31 07:52:19', 'Ingreso', '10.000', '915.000', 20),
(60, '2016-08-31 07:52:23', 'Ingreso', '10.000', '925.000', 20),
(61, '2016-08-31 07:52:27', 'transferencia', '10.000', '915.000', 20),
(62, '2016-08-31 07:54:32', 'Ingreso', '10.000', '925.000', 20),
(63, '2016-08-31 07:54:50', 'Ingreso', '10.000', '59.000', 11),
(64, '2016-08-31 07:54:56', 'transferencia', '10.000', '49.000', 11),
(65, '2016-08-31 10:16:11', 'Ingreso', '10.000', '10.000', 22),
(66, '2016-08-31 10:16:32', 'Ingreso', '200.000', '210.000', 22),
(67, '2016-08-31 10:50:00', 'Ingreso', '500.000', '500.000', 17),
(68, '2016-08-31 10:50:02', 'Ingreso', '10.000', '510.000', 17),
(69, '2016-08-31 10:50:05', 'Ingreso', '10.000', '520.000', 17),
(72, '2016-09-02 11:06:15', 'Ingreso', '10.000', '59.000', 11),
(73, '2016-09-02 11:09:48', 'Transferencia', '50.000', '350.000', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_ID` int(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usu_name` varchar(11) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `super_usu` int(1) NOT NULL DEFAULT '0',
  `saldo` decimal(9,3) NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_ID`, `nombre`, `apellidos`, `usu_name`, `clave`, `super_usu`, `saldo`) VALUES
(11, 'Loli', 'Villegas Quesada', 'Kiti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '59.000'),
(12, 'Pepe', 'Gomez Lopez', 'pego', '3da541559918a808c2402bba5012f6c60b27661c', 0, '350.000'),
(13, '   Martin ', '    Roma   ', '    maro   ', '1161e6ffd3637b302a5cd74076283a7bd1fc20d3', 0, '70.000'),
(17, '   Maria   ', '   Murciana Palancana  ', 'mamu   ', 'f56d6351aa71cff0debea014d13525e42036187a', 0, '520.000'),
(19, 'fdfffffff', 'ddddfefefef', 'kkkk', '011c945f30ce2cbafc452f39840f025693339c42', 0, '580.000'),
(20, 'kilomito', 'arganino mico', 'kiar', '011c945f30ce2cbafc452f39840f025693339c42', 0, '925.000'),
(22, 'carla', 'monagui risto', 'camo', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', 0, '210.000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
 ADD PRIMARY KEY (`movimiento_ID`), ADD KEY `saldo` (`saldo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_ID`), ADD UNIQUE KEY `usu_name` (`usu_name`), ADD KEY `saldo` (`saldo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
MODIFY `movimiento_ID` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
