-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-08-2021 a las 18:17:12
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
CREATE DATABASE IF NOT EXISTS `basebitv02` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `basebitv02`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(1, 'Laptop UPDATE 2', 'descripcionLaptop UPD 2', 1002);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(2, 'PC 1', 'Computadora de escritorio', 2000);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(3, 'Telcado', 'Tecaldo mecanico RGB', 100);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(4, 'Mouse', 'Mouse Gamer RBG', 50);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(5, 'Laptop Gamer', 'i5,16GB RAM,500GB SSD,GTX 1660', 1500);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(9, 'Computadora update', 'PC Gamer gama media', 500);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(10, 'pc02', 'descripcion', 200);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES(11, 'pc03', 'descripcion', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`) VALUES(2, 'pedro', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
