-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2019 a las 19:58:53
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_cat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_cat`) VALUES
(1, 'pegamentos'),
(2, 'lapiceros'),
(4, 'Papelerias'),
(5, 'borradores'),
(6, 'plumones'),
(7, 'cuadernos'),
(14, 'sacapuntas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `nombre_prod` varchar(50) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `costo` double NOT NULL,
  `marca` varchar(50) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `status` smallint(6) NOT NULL,
  `fotoRuta` varchar(250) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `existencia`, `precio`, `costo`, `marca`, `Descripcion`, `status`, `fotoRuta`, `id_proveedor`, `id_categoria`) VALUES
(174, 'Caja 12 bolÃ­grafos', 12, 5, 3, 'FACELA', 'Caja: 61.50*33*26 cms\r\n128 Cajas\r\nPeso: 13.5 kgs\r\nCÃ³digo: PT16620', 1, 'productos/a532649decd3d2c4c4af8f572e42c180.jpg', 9, 2),
(175, 'Acuarela Estuche con 12 colores', 10, 2, 1.2, 'FACELA', 'CÃ³digo: PT14401\r\nEmbalaje: 27*40*22.5 cms\r\nPeso: 7.95 Kgs', 1, 'productos/0fa8bec2480cea2c50552db8bed2f48e.jpg', 2, 2),
(176, 'BOLIGRAFO FACELA CONFORT', 12, 3, 2, 'FACELA', 'Caja: 40.70*22.5*23 cms\r\n144 Blisters\r\nPeso: 5.64 kgs\r\nCÃ³digo: PT12734', 1, 'productos/ff5eb9bca4e2dfe18bec88f284eba6e6.jpg', 2, 2),
(177, 'BORRADOR CON GOMA DE PUNTA', 8, 5, 2, 'FACELA', 'CODIGO: PT01450\r\nCaja: 39*25*16 cms\r\n96 blister\r\n4 inner de 24 unidades\r\nPeso: 15 kgs', 2, 'productos/5872abc35d7dd551c555413efc4e80ef.jpg', 7, 5),
(178, 'cuaderno normal', 34, 2, 1, 'scribe', 'scribe cuaderno normal', 1, 'productos/51effb2ec9d31bf7db98392a83c7052c.png', 6, 7),
(179, 'cuaderno grafitti', 12, 3, 2, 'scribe', 'cuaderno grafitti scribe', 2, 'productos/96ba3563e95f28f2ede470d771edb6e5.jpg', 9, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_prov` varchar(50) DEFAULT NULL,
  `telefono_prov` varchar(8) DEFAULT NULL,
  `direccion_prov` varchar(100) DEFAULT NULL,
  `estatus` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_prov`, `telefono_prov`, `direccion_prov`, `estatus`) VALUES
(2, 'LIBRERIA ROSSY', '20122929', 'calle principal AhuachapÃ¡n ', 1),
(6, 'ACOSA', '9469-591', 'Guamilito, 6 Avenida, 3 Calle NO, San Pedro Sula 21102, Honduras', 1),
(7, 'DIMEGA', 'Av Refor', '2210 4343', 1),
(8, 'GUSCAFE', '2223 029', '3a. Calle Pte No.3865 Ent 75 Y 73 Av Nte.Col. EscalÃ³n San Salvador - San Salvador ', 1),
(9, 'MULTIPLES NEGOCIOS', '2556 095', '5ta. calle poniente #4-7, Santa Tecla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `nombre_completo` varchar(60) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel_usuario` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `nombre_completo`, `telefono`, `email`, `password`, `nivel_usuario`) VALUES
(2, 'JOS394', '', '', 'joseespana94@gmail.com', '*A0FAA5A77030C9368926E86EBE2AC8FD8BAD7B0B', 1),
(4, 'CESARBAR', '', '', 'cesarbarrientos@gmail.com', '*5DE9FE848FF9700BC1170FB3AF5E1E5834EF1600', 2),
(6, 'LATIN', '', '', 'LATIN@ejemplo.com', '*1631718441F08277D82287F7ED11001085838E22', 1),
(43, 'ATEO', 'ateo5', 'ateo5', 'ATEO@gmail.com', '*AD16E1E8C0765B0FA572E828C359B308776EF3B0', 1),
(44, 'MURGAS', 'wilfredo@gmail.com', 'wilfredo po', 'murgas@gmail.com', '*E2428ABE3809693A56810CBD874B72C5239EDC26', 1),
(45, 'NATY', 'wilfredo@gmail.com', 'wilfredo po', 'naty@gmail.com', '*44E3AF946EC4225D5CB220C1CD339E401F6B9039', 1),
(46, 'luis', 'luis2006@gmail.com', 'luis reyes', '24240202', '*B883E0E9D11E9ED46113C5664741C32D6BD12010', 2),
(47, 'wilti', 'wilti@gmail.com', 'wilfredo', '29292929', '*362D86FF5A7E321AE1AC25A5B25C535C5FE1AD63', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `fk_id_categoria` (`id_categoria`),
  ADD KEY `fk_id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
