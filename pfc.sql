-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2022 a las 09:42:03
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pfc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CLIENTE_COD` int(6) UNSIGNED NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `DIREC` varchar(40) NOT NULL,
  `CIUDAD` varchar(30) NOT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  `COD_POSTAL` varchar(9) NOT NULL,
  `AREA` smallint(3) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `REPR_COD` smallint(4) UNSIGNED DEFAULT NULL,
  `LIMITE_CREDITO` decimal(9,2) UNSIGNED DEFAULT NULL,
  `OBSERVACIONES` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CLIENTE_COD`, `NOMBRE`, `DIREC`, `CIUDAD`, `ESTADO`, `COD_POSTAL`, `AREA`, `TELEFONO`, `REPR_COD`, `LIMITE_CREDITO`, `OBSERVACIONES`) VALUES
(100, 'JOCKSPORTS', '345 VIEWRIDGE', 'BELMONT', 'CA', '96711', 415, '598-6609', 7844, '5000.00', 'Very friendly people to work with -- sales rep likes to be called Mike.'),
(101, 'TKB SPORT SHOP', '490 BOLI RD.', 'REDWOOD CIUDAD', 'CA', '94061', 415, '368-1223', 7521, '10000.00', 'Rep called 5/8 about change in order - contact shipping.'),
(102, 'VOLLYRITE', '9722 HAMILTON', 'BURLINGAME', 'CA', '95133', 415, '644-3341', 7654, '7000.00', 'Company doing heavy promotion beginning 10/89. Prepare for large orders during winter.'),
(103, 'JUST TENNIS', 'HILLVIEW MALL', 'BURLINGAME', 'CA', '97544', 415, '677-9312', 7521, '3000.00', 'Contact rep about new line of tennis rackets.'),
(104, 'EVERY MOUNTAIN', '574 SURRY RD.', 'CUPERTINO', 'CA', '93301', 408, '996-2323', 7499, '10000.00', 'CLIENTE with high market share (23%) due to aggressive advertising.'),
(105, 'K + T SPORTS', '3476 EL PASEO', 'SANTA CLARA', 'CA', '91003', 408, '376-9966', 7844, '5000.00', 'Tends to order large amounts of merchandise at once. Accounting is considering raising their credit limit. Usually pays on time.'),
(106, 'SHAPE UP', '908 SEQUOIA', 'PALO ALTO', 'CA', '94301', 415, '364-9777', 7521, '6000.00', 'Support intensive. Orders small amounts (< 800) of merchandise at a time.'),
(107, 'WOMEN SPORTS', 'VALCO VILLAGE', 'SUNNYVALE', 'CA', '93301', 408, '967-4398', 7499, '10000.00', 'First sporting goods store geared exclusively towards women. Unusual promotion al style and very willing to take chances towards new PRODUCTOs!'),
(108, 'NORTH WOODS HEALTH AND FITNESS SUPPLY CENTER', '98 LONE PINE WAY', 'HIBBING', 'MN', '55649', 612, '566-9123', 7844, '8000.00', ''),
(109, 'SPRINGFIELD NUCLEAR POWER PLANT', '13 PERCEBE STR.', 'SPRINGFIELD', 'NT', '0000', 636, '999-6666', NULL, '10000.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dept`
--

CREATE TABLE `dept` (
  `DEPT_NO` tinyint(2) UNSIGNED NOT NULL,
  `DNOMBRE` varchar(14) NOT NULL,
  `LOC` varchar(14) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dept`
--

INSERT INTO `dept` (`DEPT_NO`, `DNOMBRE`, `LOC`, `color`) VALUES
(10, 'CONTABILIDAD', 'SEVILLA', 'red'),
(20, 'INVESTIGACI?N', 'MADRID', 'blue'),
(30, 'VENTAS', 'BARCELONA', 'orange'),
(40, 'PRODUCCI?N', 'BILBAO', 'green');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `PEDIDO_NUM` smallint(4) UNSIGNED NOT NULL,
  `DETALLE_NUM` smallint(4) UNSIGNED NOT NULL,
  `PROD_NUM` int(6) UNSIGNED NOT NULL,
  `PRECIO_VENTA` decimal(8,2) UNSIGNED DEFAULT NULL,
  `CANTIDAD` int(8) DEFAULT NULL,
  `IMPORTE` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`PEDIDO_NUM`, `DETALLE_NUM`, `PROD_NUM`, `PRECIO_VENTA`, `CANTIDAD`, `IMPORTE`) VALUES
(601, 1, 200376, '2.40', 1, '2.40'),
(602, 1, 100870, '2.80', 20, '56.00'),
(603, 2, 100860, '56.00', 4, '224.00'),
(604, 1, 100890, '58.00', 3, '174.00'),
(604, 2, 100861, '42.00', 2, '84.00'),
(604, 3, 100860, '44.00', 10, '440.00'),
(605, 1, 100861, '45.00', 100, '4500.00'),
(605, 2, 100870, '2.80', 500, '1400.00'),
(605, 3, 100890, '58.00', 5, '290.00'),
(605, 4, 101860, '24.00', 50, '1200.00'),
(605, 5, 101863, '9.00', 100, '900.00'),
(605, 6, 102130, '3.40', 10, '34.00'),
(606, 1, 102130, '3.40', 1, '3.40'),
(607, 1, 100871, '5.60', 1, '5.60'),
(608, 1, 101860, '24.00', 1, '24.00'),
(608, 2, 100871, '5.60', 2, '11.20'),
(609, 1, 100861, '35.00', 1, '35.00'),
(609, 2, 100870, '2.50', 5, '12.50'),
(609, 3, 100890, '50.00', 1, '50.00'),
(610, 1, 100860, '35.00', 1, '35.00'),
(610, 2, 100870, '2.80', 3, '8.40'),
(610, 3, 100890, '58.00', 1, '58.00'),
(611, 1, 100861, '45.00', 1, '45.00'),
(612, 1, 100860, '30.00', 100, '3000.00'),
(612, 2, 100861, '40.50', 20, '810.00'),
(612, 3, 101863, '10.00', 150, '1500.00'),
(612, 4, 100871, '5.50', 100, '550.00'),
(613, 1, 100871, '5.60', 100, '560.00'),
(613, 2, 101860, '24.00', 200, '4800.00'),
(613, 3, 200380, '4.00', 150, '600.00'),
(613, 4, 200376, '2.20', 200, '440.00'),
(614, 1, 100860, '35.00', 444, '15540.00'),
(614, 2, 100870, '2.80', 1000, '2800.00'),
(614, 3, 100871, '5.60', 1000, '5600.00'),
(615, 1, 100861, '45.00', 4, '180.00'),
(615, 2, 100870, '2.80', 100, '280.00'),
(615, 3, 100871, '5.00', 50, '250.00'),
(616, 1, 100861, '45.00', 10, '450.00'),
(616, 2, 100870, '2.80', 50, '140.00'),
(616, 3, 100890, '58.00', 2, '116.00'),
(616, 4, 102130, '3.40', 10, '34.00'),
(616, 5, 200376, '2.40', 10, '24.00'),
(617, 1, 100860, '35.00', 50, '1750.00'),
(617, 2, 100861, '45.00', 100, '4500.00'),
(617, 3, 100870, '2.80', 500, '1400.00'),
(617, 4, 100871, '5.60', 500, '2800.00'),
(617, 5, 100890, '58.00', 500, '29000.00'),
(617, 6, 101860, '24.00', 100, '2400.00'),
(617, 7, 101863, '12.50', 200, '2500.00'),
(617, 8, 102130, '3.40', 100, '340.00'),
(617, 9, 200376, '2.40', 200, '480.00'),
(617, 10, 200380, '4.00', 300, '1200.00'),
(618, 1, 100860, '35.00', 23, '805.00'),
(618, 2, 100861, '45.11', 50, '2255.50'),
(618, 3, 100870, '45.00', 10, '450.00'),
(619, 1, 200380, '4.00', 100, '400.00'),
(619, 2, 200376, '2.40', 100, '240.00'),
(619, 3, 102130, '3.40', 100, '340.00'),
(619, 4, 100871, '5.60', 50, '280.00'),
(620, 1, 100860, '35.00', 10, '350.00'),
(620, 2, 200376, '2.40', 1000, '2400.00'),
(620, 3, 102130, '3.40', 500, '1700.00'),
(621, 1, 100861, '45.00', 10, '450.00'),
(621, 2, 100870, '2.80', 100, '280.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp`
--

CREATE TABLE `emp` (
  `EMP_NO` smallint(4) UNSIGNED NOT NULL,
  `APELLIDOS` varchar(10) NOT NULL,
  `OFICIO` varchar(10) DEFAULT NULL,
  `JEFE` smallint(4) UNSIGNED DEFAULT NULL,
  `FECHA_ALTA` date DEFAULT NULL,
  `SALARIO` int(10) UNSIGNED DEFAULT NULL,
  `COMISION` int(10) UNSIGNED DEFAULT NULL,
  `DEPT_NO` tinyint(2) UNSIGNED NOT NULL,
  `Nombre` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emp`
--

INSERT INTO `emp` (`EMP_NO`, `APELLIDOS`, `OFICIO`, `JEFE`, `FECHA_ALTA`, `SALARIO`, `COMISION`, `DEPT_NO`, `Nombre`) VALUES
(7369, 'Coviza', 'Empleado', 7902, '1980-12-17', 104000, NULL, 20, 'Pablo'),
(7499, 'Hernandez', 'Vendedor', 7698, '1980-02-20', 208000, 39000, 30, 'Eustaquio'),
(7521, 'Sala', 'Vendedor', 7698, '1981-02-22', 162500, 65000, 30, 'Pepe'),
(7566, 'Jimenez', 'Directora', 7839, '1981-04-02', 386750, NULL, 20, 'Maria'),
(7654, 'Domenech', 'Vendedora', 7698, '1981-09-29', 162500, 182000, 30, 'Susana'),
(7698, 'Casero', 'Director', 7839, '1981-05-01', 370500, NULL, 30, 'Enrique'),
(7782, 'Anaya', 'Director', 7839, '1981-06-09', 318500, NULL, 10, 'David'),
(7788, 'Navarro', 'Analista', 7566, '1981-11-09', 390000, NULL, 20, 'Nacho'),
(7839, 'Reina', 'Presidente', NULL, '1981-11-17', 650000, NULL, 10, 'Fernando'),
(7844, 'Tobia', 'Vendedor', 7698, '1981-09-08', 195000, 0, 30, 'Francisco'),
(7876, 'Pellicer', 'Empleado', 7788, '1981-09-23', 143000, NULL, 20, 'Matias'),
(7900, 'Heredia', 'Empleado', 7698, '1981-12-03', 123500, NULL, 30, 'Kevin'),
(7902, 'Hacinas', 'Analista', 7566, '1981-12-03', 390000, NULL, 20, 'Jorge'),
(7934, 'Mengo', 'Empleado', 7782, '1982-01-23', 169000, NULL, 10, 'Noel'),
(9999, 'Fitipaldi', 'Empleado', 7566, '1989-03-01', 189500, 12, 20, 'Rafael');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `PEDIDO_NUM` smallint(4) UNSIGNED NOT NULL,
  `PEDIDO_FECHA` date DEFAULT NULL,
  `PEDIDO_TIPO` char(1) DEFAULT NULL CHECK (`PEDIDO_TIPO` in ('A','B','C')),
  `CLIENTE_COD` int(6) UNSIGNED NOT NULL,
  `FECHA_ENVIO` date DEFAULT NULL,
  `TOTAL` decimal(8,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`PEDIDO_NUM`, `PEDIDO_FECHA`, `PEDIDO_TIPO`, `CLIENTE_COD`, `FECHA_ENVIO`, `TOTAL`) VALUES
(601, '1986-05-01', 'A', 106, '1986-05-30', '2.40'),
(602, '1986-06-05', 'A', 102, '1986-06-20', '56.00'),
(603, '1986-06-05', NULL, 102, '1986-06-05', '224.00'),
(604, '1986-06-15', 'A', 106, '1986-06-30', '698.00'),
(605, '1986-07-14', 'A', 106, '1986-07-30', '8324.00'),
(606, '1986-07-14', 'A', 100, '1986-07-30', '3.40'),
(607, '1986-07-18', 'A', 104, '1986-07-18', '78.00'),
(608, '1986-07-25', 'C', 104, '1986-07-25', '24.00'),
(609, '1986-08-01', 'B', 100, '1986-08-15', '8625.00'),
(610, '1987-01-07', 'A', 101, '1987-01-08', '35.00'),
(611, '1987-01-11', 'B', 102, '1987-01-11', '45.00'),
(612, '1987-01-15', 'B', 104, '1987-01-20', '2500.00'),
(613, '1987-02-01', NULL, 108, '1987-02-01', '6400.00'),
(614, '1987-02-01', 'B', 102, '1987-02-05', '23940.00'),
(615, '1987-02-01', NULL, 107, '1987-02-06', '710.00'),
(616, '1987-02-03', NULL, 103, '1987-02-10', '764.00'),
(617, '1987-02-05', 'A', 104, '1987-03-03', '9628.00'),
(618, '1987-02-15', 'A', 102, '1987-03-06', '572.00'),
(619, '1987-02-22', 'A', 104, '1987-02-04', '400.00'),
(620, '1987-03-12', 'B', 100, '1987-03-12', '350.00'),
(621, '1987-03-15', 'B', 100, '1987-01-01', '276.00'),
(622, '2022-02-11', 'C', 101, '2022-02-11', '10783.00'),
(624, '2022-04-27', 'A', 101, '2022-04-27', '4.00'),
(625, '2022-04-27', 'B', 101, '2022-04-27', '1782.00'),
(626, '2022-04-27', 'B', 101, '2022-04-27', '845.00'),
(627, '2022-04-27', 'B', 101, '2022-04-27', '845.00'),
(628, '2022-04-27', 'B', 109, '2022-04-27', '163.00'),
(629, '2022-04-27', 'A', 109, '2022-04-27', '5.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PROD_NUM` int(6) UNSIGNED NOT NULL,
  `DESCRIPCION` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`PROD_NUM`, `DESCRIPCION`) VALUES
(100870, 'ACE TENNIS BALLS-3 PACK'),
(100871, 'ACE TENNIS BALLS-6 PACK'),
(100890, 'ACE TENNIS NET'),
(100860, 'ACE TENNIS RACKET I'),
(100861, 'ACE TENNIS RACKET II'),
(102130, 'RH: \"GUIDE TO TENNIS\"'),
(200376, 'SB ENERGY BAR-6 PACK'),
(200380, 'SB VITA SNACK-6 PACK'),
(101863, 'SP JUNIOR RACKET'),
(101860, 'SP TENNIS RACKET');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIENTE_COD`),
  ADD KEY `IDX_CLIENTE_REPR_COD` (`REPR_COD`),
  ADD KEY `CLIENTE_NOMBRE` (`NOMBRE`),
  ADD KEY `CLIENTE_REPR_CLI` (`REPR_COD`,`CLIENTE_COD`);

--
-- Indices de la tabla `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`DEPT_NO`),
  ADD UNIQUE KEY `DNOMBRE` (`DNOMBRE`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`PEDIDO_NUM`,`DETALLE_NUM`),
  ADD KEY `IDX_DETAL_PEDIDO_NUM` (`PEDIDO_NUM`),
  ADD KEY `IDX_PROD_NUM` (`PROD_NUM`),
  ADD KEY `DETALLE_PROD_COM_DET` (`PROD_NUM`,`PEDIDO_NUM`,`DETALLE_NUM`);

--
-- Indices de la tabla `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMP_NO`),
  ADD KEY `IDX_EMP_JEFE` (`JEFE`),
  ADD KEY `IDX_EMP_DEPT_NO` (`DEPT_NO`),
  ADD KEY `EMP_APELLIDOS` (`APELLIDOS`),
  ADD KEY `EMP_DEPT_NO_EMP` (`DEPT_NO`,`EMP_NO`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`PEDIDO_NUM`),
  ADD KEY `IDX_PEDIDO_CLIENTE_COD` (`CLIENTE_COD`),
  ADD KEY `PEDIDO_FECHA_NUM` (`PEDIDO_FECHA`,`PEDIDO_NUM`),
  ADD KEY `PEDIDO_ENVIO_NUM` (`FECHA_ENVIO`,`PEDIDO_NUM`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PROD_NUM`),
  ADD UNIQUE KEY `DESCRIPCION` (`DESCRIPCION`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `CLIENTE_ibfk_1` FOREIGN KEY (`REPR_COD`) REFERENCES `emp` (`EMP_NO`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `DETALLE_ibfk_1` FOREIGN KEY (`PEDIDO_NUM`) REFERENCES `pedido` (`PEDIDO_NUM`),
  ADD CONSTRAINT `DETALLE_ibfk_2` FOREIGN KEY (`PROD_NUM`) REFERENCES `producto` (`PROD_NUM`);

--
-- Filtros para la tabla `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `EMP_ibfk_1` FOREIGN KEY (`DEPT_NO`) REFERENCES `dept` (`DEPT_NO`),
  ADD CONSTRAINT `EMP_ibfk_2` FOREIGN KEY (`JEFE`) REFERENCES `emp` (`EMP_NO`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `PEDIDO_ibfk_1` FOREIGN KEY (`CLIENTE_COD`) REFERENCES `cliente` (`CLIENTE_COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
