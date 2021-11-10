-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-08-2021 a las 16:49:33
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
-- Base de datos: `basebit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `Personas`;
CREATE TABLE IF NOT EXISTS `Personas`(
ID int auto_increment primary key, 
Correo Varchar (64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci not null unique,
Contrasena varchar (16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci not null,
Nombre varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci not null,
Apellido varchar (10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci not null,
Edad int,
FechaNac date,
Calle varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci not null,
NPuerta int (3) not null
)DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
*/
--
-- Volcado de datos para la tabla `usuarios`
--

insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("axelmendez@gmail.com", "Axel", "Mendez","2002-04-19","1234","vas",12);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("pedro@gmail.com", "Pedro", "Leites","2000-05-18","5456","veni",32);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("franco@gmail.com", "Franco", "Dos Santos","2005-02-12","4421","artigas",12);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("heber@gmail.com", "Heber", "Martinez","2001-05-31","5313","la paz",41);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("alverto@gmail.com", "Alverto", "Rodrigez","1976-04-12","5435","alla",23);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("cristina@gmail.com", "Cristina","Sanchez","1960-06-11","6465","alegria",10);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("javier@gmail.com", "Javier", "Milei","1985-09-7","5765","espeanza",8);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("danan@gmail.com", "Danan", "Pereira","1990-01-1","3121","marconi",3);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("Roberto@gmail.com", "Roberto", "Muzo","1970-08-8","4212","por ahi",5);
insert into Personas(Correo, Nombre, apellido, FechaNac, Contrasena, Calle, NPuerta) values ("jorge@gmail.com", "Jorge", "Cardozo","1990-02-13","1233","desde alla",1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
