-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-09-2021 a las 19:09:04
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bit_pc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administran`
--

DROP TABLE IF EXISTS `administran`;
CREATE TABLE IF NOT EXISTS `administran` (
  `IDD` int NOT NULL,
  `CI` int NOT NULL,
  `IDProd` int NOT NULL,
  PRIMARY KEY (`IDD`,`CI`,`IDProd`),
  KEY `IDProd` (`IDProd`),
  KEY `CI` (`CI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administran`
--

INSERT INTO `administran` (`IDD`, `CI`, `IDProd`) VALUES
(1, 54762032, 1),
(1, 57962020, 2),
(2, 54796213, 3),
(3, 54879002, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `IDA` int NOT NULL,
  `CI` int NOT NULL,
  PRIMARY KEY (`CI`,`IDA`),
  KEY `IDA` (`IDA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`IDA`, `CI`) VALUES
(1, 54762032),
(4, 54796213),
(2, 54879002),
(3, 57962020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `IDProd` int NOT NULL AUTO_INCREMENT,
  `IDD` int NOT NULL,
  `NomProd` varchar(30) NOT NULL,
  `Descripcion` varchar(60) NOT NULL,
  `Precio` int NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`IDProd`,`IDD`),
  KEY `IDD` (`IDD`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IDProd`, `IDD`, `NomProd`, `Descripcion`, `Precio`, `stock`) VALUES
(1, 1, 'placa', 'gigabyte', 2000, 10),
(2, 1, 'mouse', 'dell', 1500, 7),
(3, 2, 'monitor', 'ViewSonic', 3000, 5),
(4, 3, 'partalantes', 'Genius', 1300, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidoras`
--

DROP TABLE IF EXISTS `distribuidoras`;
CREATE TABLE IF NOT EXISTS `distribuidoras` (
  `IDD` int NOT NULL AUTO_INCREMENT,
  `NombreDis` varchar(30) NOT NULL,
  `CalleDis` varchar(30) NOT NULL,
  `NPuertaDis` int NOT NULL,
  PRIMARY KEY (`IDD`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `distribuidoras`
--

INSERT INTO `distribuidoras` (`IDD`, `NombreDis`, `CalleDis`, `NPuertaDis`) VALUES
(1, 'RosaTeC', 'doctor Puey', 12),
(2, 'infoTec', 'garibaldi', 1),
(3, 'Mercadito', 'republica argentina', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genera`
--

DROP TABLE IF EXISTS `genera`;
CREATE TABLE IF NOT EXISTS `genera` (
  `IDPedidos` int NOT NULL,
  `ID` int NOT NULL,
  `IDProd` int NOT NULL,
  `IDseleccion` int NOT NULL,
  PRIMARY KEY (`IDPedidos`,`ID`,`IDProd`,`IDseleccion`),
  KEY `ID` (`ID`),
  KEY `IDProd` (`IDProd`),
  KEY `IDseleccion` (`IDseleccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `genera`
--

INSERT INTO `genera` (`IDPedidos`, `ID`, `IDProd`, `IDseleccion`) VALUES
(1, 5, 2, 1),
(2, 7, 4, 2),
(3, 9, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `IDPedidos` int NOT NULL AUTO_INCREMENT,
  `FechaCom` date DEFAULT NULL,
  PRIMARY KEY (`IDPedidos`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`IDPedidos`, `FechaCom`) VALUES
(1, '2021-03-01'),
(2, '2021-05-06'),
(3, '2021-07-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Correo` varchar(64) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  `Nombre` varchar(10) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `FechaNac` date NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `NPuerta` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`ID`, `Correo`, `Contrasena`, `Nombre`, `apellido`, `FechaNac`, `Calle`, `NPuerta`) VALUES
(1, 'axelmendez@gmail.com', '1234', 'Axel', 'Mendez', '2002-04-19', 'vas', 12),
(2, 'pedro@gmail.com', '5456', 'Pedro', 'Leites', '2000-05-18', 'veni', 32),
(3, 'franco@gmail.com', '4421', 'Franco', 'Dos Santos', '2005-02-12', 'artigas', 12),
(4, 'heber@gmail.com', '5313', 'Heber', 'Martinez', '2001-05-31', 'la paz', 41),
(5, 'alverto@gmail.com', '5435', 'Alverto', 'Rodrigez', '1976-04-12', 'alla', 23),
(6, 'cristina@gmail.com', '6465', 'Cristina', 'Sanchez', '1960-06-11', 'alegria', 10),
(7, 'javier@gmail.com', '5765', 'Javier', 'Milei', '1985-09-07', 'espeanza', 8),
(8, 'danan@gmail.com', '3121', 'Danan', 'Pereira', '1990-01-01', 'marconi', 3),
(9, 'Roberto@gmail.com', '4212', 'Roberto', 'Muzo', '1970-08-08', 'por ahi', 5),
(10, 'jorge@gmail.com', '1233', 'Jorge', 'Cardozo', '1990-02-13', 'desde alla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selecciona`
--

DROP TABLE IF EXISTS `selecciona`;
CREATE TABLE IF NOT EXISTS `selecciona` (
  `idSeleccion` int NOT NULL AUTO_INCREMENT,
  `ID` int NOT NULL,
  `IDProd` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`ID`,`IDProd`,`idSeleccion`),
  KEY `IDProd` (`IDProd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `selecciona`
--

INSERT INTO `selecciona` (`idSeleccion`, `ID`, `IDProd`, `cantidad`) VALUES
(1, 5, 2, 5),
(1, 7, 4, 1),
(1, 9, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoadmins`
--

DROP TABLE IF EXISTS `telefonoadmins`;
CREATE TABLE IF NOT EXISTS `telefonoadmins` (
  `CI` int NOT NULL,
  `Telefono` int NOT NULL,
  PRIMARY KEY (`CI`,`Telefono`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `telefonoadmins`
--

INSERT INTO `telefonoadmins` (`CI`, `Telefono`) VALUES
(54762032, 93897669),
(54796213, 94876213),
(54879002, 94799523),
(57962020, 93154675);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonodistribuidoras`
--

DROP TABLE IF EXISTS `telefonodistribuidoras`;
CREATE TABLE IF NOT EXISTS `telefonodistribuidoras` (
  `IDD` int NOT NULL,
  `TeleDist` int NOT NULL,
  PRIMARY KEY (`IDD`,`TeleDist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `telefonodistribuidoras`
--

INSERT INTO `telefonodistribuidoras` (`IDD`, `TeleDist`) VALUES
(1, 23647812),
(2, 23657810),
(3, 2364321);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
