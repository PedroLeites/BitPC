-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-08-2021 a las 13:51:04
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
-- Base de datos: `basebitv02`
--

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
(4, 3, 'partalantes', 'Genius', 1300, 4)
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
