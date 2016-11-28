-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2016 a las 05:20:45
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE IF NOT EXISTS `autos` (
  `id` int(11) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `ingreso` varchar(50) NOT NULL COMMENT 'yyyy--mm-dd hh:mm:ss'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id`, `patente`, `ingreso`) VALUES
(7, 'ñlk987', '2016-11-20-22-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int(11) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `ingreso` varchar(50) NOT NULL COMMENT 'yyyy-mm-dd hh:mm:ss',
  `egreso` varchar(50) NOT NULL COMMENT 'yyyy-mm-dd hh:mm:ss',
  `monto` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `patente`, `ingreso`, `egreso`, `monto`) VALUES
(5, 'qwe123', '2016-11-20-22-14', '2016-11-20-22-14', 5),
(6, 'qwe123', '2016-11-20-22-23', '2016-11-20-22-23', 5),
(7, 'asd123', '2016-11-20-22-14', '2016-11-20-22-29', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moviminetos`
--

CREATE TABLE IF NOT EXISTS `moviminetos` (
  `id` int(11) NOT NULL,
  `patente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingreso` datetime NOT NULL,
  `egreso` datetime DEFAULT NULL,
  `pago` float DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'i: ingreso e: egreso'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `mail`, `clave`) VALUES
(1, 'admin@admin', 'admin'),
(2, 'user@user', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL COMMENT 'usuario, admin, comun'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='permite el logeo';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `clave`, `tipo`) VALUES
(1, 'usuario@yahoo.com.ar', '1234', 'usuario'),
(2, 'admin@yahoo.com.ar', '1234', 'admin'),
(3, 'sony@yahoo.com.ar', '1234', 'usuario'),
(4, 'genius@yahoo,com.ar', '1234', 'usuario'),
(5, 'verbatim@yahoo.com', '1234', 'usuario'),
(6, 'orson@yahoo.com', '1234', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moviminetos`
--
ALTER TABLE `moviminetos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `moviminetos`
--
ALTER TABLE `moviminetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
