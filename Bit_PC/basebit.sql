-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-11-2021 a las 19:51:03
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
-- Estructura de tabla para la tabla `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `articulo_id` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `pedido_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articulo` (`articulo_id`),
  KEY `fk_pedido` (`pedido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `articulo_id`, `cantidad`, `precio`, `pedido_id`) VALUES
(1, 6, 1, '300.00', 1),
(2, 9, 2, '2500.00', 2),
(3, 6, 1, '300.00', 2),
(4, 5, 1, '1325.00', 2),
(5, 12, 1, '20000.00', 3),
(6, 5, 1, '1325.00', 3),
(7, 6, 1, '300.00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` enum('pendiente','entregado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `total` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `usuario_id`, `fecha`, `estado`, `total`) VALUES
(1, 1, '2021-11-27 23:53:58', 'pendiente', 300.00),
(2, 2, '2021-11-27 23:54:30', 'pendiente', 6625.00),
(3, 3, '2021-11-28 23:35:02', 'entregado', 21625.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `categoria` enum('Computadora','Accesorio','Componente') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `estado`, `stock`, `categoria`, `url_foto`) VALUES
(1, 'PC Ryzen 5 5600G + 16GB + SSD 256GB', 'Computadora de Escritorio \"Gamer\"\r\n- CPU: AMD Ryzen 5 5600G\r\n- RAM: 16GB DDR4 \r\n Placa madre: Asrock A520M-HDV (Garantía 1 año)\r\n- Memoria Ram: 16GB 2x82666mhz ddr4 (Garantía 1 año)\r\n- Gráficos: Radeon vega 7 2GB\r\n- Almacenamiento: SSD 256GB  \r\n- Fuente Xigmatek 400W 80 Plus \r\n- Gabinete: Xigmatek Gaming X. Vidrio templado. 4 Ventiladores RGB incluidos.', '30000.00', 'activo', 10, 'Computadora', 'public/img/articulos/1.'),
(2, 'PC Intel I3 10100f + GTX 1050ti + 16GB + SSD ', '- Procesador: Intel i3 10100F\r\n- Placa madre: Asrock H410M\r\n- RAM: 16GB DDR4\r\n- GPU: GeForce GTX 1050ti 4GB \r\n- Almacenamiento: SSD M.2 256GB\r\n- PSU: Xigmatek 400W 80 Plus \r\n- Gabinete: Xtreme PC. Vidrio templado + Ventilador', '30000.00', 'activo', 10, 'Computadora', 'public/img/articulos/2.jpg'),
(3, 'PC Oficina Amd A10 4gb 1TB 500w', '-CPU: AMD A10 Quad Core\r\n-RAM: 4GB DDR4\r\n-Almacenamiento: Disco Duro HDD 1TB\r\n-PSU: 500w Genérica', '15000.00', 'activo', 15, 'Computadora', 'public/img/articulos/3.jpg'),
(4, 'Teclado RedDragon Kumara', 'Teclado RedDragon Kumara K552 Mecánico con luces RGB.', '3100.00', 'activo', 100, 'Accesorio', 'public/img/articulos/4.jpg'),
(5, 'Mouse RedDragon Cobra', 'Mouse gamer Redragon Cobra Chroma M711 negro.', '1325.00', 'activo', 100, 'Accesorio', 'public/img/articulos/5.jpg'),
(6, 'Auriculares JBL in-ear', 'Auriculares in-ear JBL C50HI negro\r\n-Con micrófono incorporado.\r\n-Tipo de conector: Jack 3.5 mm.\r\n-El largo del cable es de 1.2m.', '300.00', 'activo', 500, 'Accesorio', 'public/img/articulos/6.jpg'),
(7, 'GPU GTX 1660 Super', 'MSI Gaming GeForce GTX 1660 Super 192-bit HDMI\r\n-reloj de aumento: 1830 mhz\r\n-interfaz de memoria: 192 bits\r\n-VRAM: 6gb gddr6\r\n', '5600.00', 'activo', 80, 'Componente', 'public/img/articulos/7.jpg'),
(8, 'GPU RX 580', '- AMD Radeon RX580 GPU\r\n- 8GB GDDR5\r\n- 256-bit memory bus\r\n- Base/Boost Clock: 1257/1340 MHz\r\n- Memory Clock: 8000MHz\r\n- PCI-Express 3.0', '6000.00', 'activo', 80, 'Componente', 'public/img/articulos/8.jpg'),
(9, 'Memoria RAM HyperX 8GB', 'Memoria RAM Fury Gamer color Negro 8GB HyperX 2400 MHz', '2500.00', 'activo', 100, 'Componente', 'public/img/articulos/9.jpg'),
(10, 'Laptop Asus ROG Strix Scar II', 'Laptop Gamer 15,6\" 144Hz IPS Tipo Full HD, NVIDIA GeForce RTX 2070, Intel Core i7-8750H, 16GB DDR4, 512GB PCIe Nvme SSD, RGB KB, Windows 10.', '19805.00', 'activo', 50, 'Computadora', 'public/img/articulos/10.jpg'),
(11, 'Monitor Samsung Led 24\"', 'Monitor Gamer Samsung F24T35 24 pulgadas Full HD 144Hz', '8000.00', 'activo', 80, 'Accesorio', 'public/img/articulos/11.jpg'),
(12, 'Laptop Lenovo IdeaPad 320', 'Laptop Lenovo IdeaPad 320-15IAP.\r\n-CPU: Intel® Core™ i7 hasta de 6ª generación\r\n-GPU: Tarjeta gráfica integrada Intel / NVIDIA® GeForce® 920MX\r\n-RAM: 8GB DDR4\r\n-Almacenamiento: Disco Solido (SSD) 512GB\r\n-Windows 10\r\n-Batería hasta 5 horas\r\n-Cámara frontal con micrófono', '20000.00', 'activo', 50, 'Computadora', 'public/img/articulos/12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechanac` date NOT NULL,
  `direccion` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `fechanac`, `direccion`, `telefono`, `pwd`, `rol`) VALUES
(1, 'bitpc2021@gmail.com', 'BIT', 'PC', '2000-04-01', 'Escuela Técnica Superior Las Piedras', 23691032, '$2y$10$nT1Q7h6yNu2FVaQ9t56ixuKs58EqJ1X2ZjJ7uacfTe4lbM6iiSYgK', 'admin'),
(2, 'leitespsinsajo@gmail.com', 'Pedro', 'Leites', '2004-04-01', 'Serafín J. García M1 S12', 93343923, '$2y$10$Mogq7JqNnao2wLSKMH53DOfs4DnwhW8FqHb0noDrdgZx.IHSA1MAS', 'cliente'),
(3, 'icosaedrita1205@gmail.com', 'Héber', 'Martínez', '2003-04-24', 'La Paz', 96663973, '$2y$10$m66q2qEihDib/WJtJqLcgumFBSdjfDaBd1XRsgPcIHrOiubWPhHW6', 'cliente');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_articulo` FOREIGN KEY (`articulo_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
