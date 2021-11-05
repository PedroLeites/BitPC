-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bit_pc
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administran`
--

DROP TABLE IF EXISTS `administran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administran` (
  `IDD` int NOT NULL,
  `CI` int NOT NULL,
  `IDProd` int NOT NULL,
  PRIMARY KEY (`IDD`,`CI`,`IDProd`),
  KEY `IDProd` (`IDProd`),
  KEY `CI` (`CI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administran`
--

LOCK TABLES `administran` WRITE;
/*!40000 ALTER TABLE `administran` DISABLE KEYS */;
INSERT INTO `administran` VALUES (1,54762032,1),(1,57962020,2),(2,54796213,3),(3,54879002,4);
/*!40000 ALTER TABLE `administran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `IDA` int NOT NULL,
  `CI` int NOT NULL,
  PRIMARY KEY (`CI`,`IDA`),
  KEY `IDA` (`IDA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,54762032),(4,54796213),(2,54879002),(3,57962020);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `IDProd` int NOT NULL AUTO_INCREMENT,
  `IDD` int NOT NULL,
  `NomProd` varchar(30) NOT NULL,
  `Descripcion` varchar(60) NOT NULL,
  `Precio` int NOT NULL,
  `Stock` int NOT NULL,
  `Estado` enum('activo','desactivado') DEFAULT NULL,
  `Categoria` enum('Computadoras','Perifericos','Componentes') DEFAULT NULL,
  PRIMARY KEY (`IDProd`,`IDD`),
  KEY `IDD` (`IDD`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,1,'placa','gigabyte',2000,10,NULL,NULL),(2,1,'mouse','dell',1500,7,NULL,NULL),(3,2,'monitor','ViewSonic',3000,5,NULL,NULL),(4,3,'partalantes','Genius',1300,4,NULL,NULL);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribuidoras`
--

DROP TABLE IF EXISTS `distribuidoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distribuidoras` (
  `IDD` int NOT NULL AUTO_INCREMENT,
  `NombreDis` varchar(30) NOT NULL,
  `CalleDis` varchar(30) NOT NULL,
  `NPuertaDis` int NOT NULL,
  PRIMARY KEY (`IDD`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribuidoras`
--

LOCK TABLES `distribuidoras` WRITE;
/*!40000 ALTER TABLE `distribuidoras` DISABLE KEYS */;
INSERT INTO `distribuidoras` VALUES (1,'RosaTeC','doctor Puey',12),(2,'infoTec','garibaldi',1),(3,'Mercadito','republica argentina',55);
/*!40000 ALTER TABLE `distribuidoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genera`
--

DROP TABLE IF EXISTS `genera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genera` (
  `IDPedidos` int NOT NULL,
  `ID` int NOT NULL,
  `IDProd` int NOT NULL,
  `IDseleccion` int NOT NULL,
  PRIMARY KEY (`IDPedidos`,`ID`,`IDProd`,`IDseleccion`),
  KEY `ID` (`ID`),
  KEY `IDProd` (`IDProd`),
  KEY `IDseleccion` (`IDseleccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genera`
--

LOCK TABLES `genera` WRITE;
/*!40000 ALTER TABLE `genera` DISABLE KEYS */;
INSERT INTO `genera` VALUES (1,5,2,1),(2,7,4,2),(3,9,3,3);
/*!40000 ALTER TABLE `genera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `IDPedidos` int NOT NULL AUTO_INCREMENT,
  `FechaCom` date DEFAULT NULL,
  PRIMARY KEY (`IDPedidos`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,'2021-03-01'),(2,'2021-05-06'),(3,'2021-07-21');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Correo` varchar(64) NOT NULL,
  `Contrasena` varchar(16) NOT NULL,
  `Nombre` varchar(10) NOT NULL,
  `Apellido` varchar(10) NOT NULL,
  `FechaNac` date NOT NULL,
  `Calle` varchar(30) NOT NULL,
  `NPuerta` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'axelmendez@gmail.com','1234','Axel','Mendez','2002-04-19','vas',12),(2,'pedro@gmail.com','5456','Pedro','Leites','2000-05-18','veni',32),(3,'franco@gmail.com','4421','Franco','Dos Santos','2005-02-12','artigas',12),(4,'heber@gmail.com','5313','Heber','Martinez','2001-05-31','la paz',41),(5,'alverto@gmail.com','5435','Alverto','Rodrigez','1976-04-12','alla',23),(6,'cristina@gmail.com','6465','Cristina','Sanchez','1960-06-11','alegria',10),(7,'javier@gmail.com','5765','Javier','Milei','1985-09-07','espeanza',8),(8,'danan@gmail.com','3121','Danan','Pereira','1990-01-01','marconi',3),(9,'Roberto@gmail.com','4212','Roberto','Muzo','1970-08-08','por ahi',5),(10,'jorge@gmail.com','1233','Jorge','Cardozo','1990-02-13','desde alla',1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selecciona`
--

DROP TABLE IF EXISTS `selecciona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selecciona` (
  `IDSeleccion` int NOT NULL AUTO_INCREMENT,
  `ID` int NOT NULL,
  `IDProd` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`ID`,`IDProd`,`IDSeleccion`),
  KEY `IDProd` (`IDProd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selecciona`
--

LOCK TABLES `selecciona` WRITE;
/*!40000 ALTER TABLE `selecciona` DISABLE KEYS */;
INSERT INTO `selecciona` VALUES (1,5,2,5),(1,7,4,1),(1,9,3,3);
/*!40000 ALTER TABLE `selecciona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonoadmins`
--

DROP TABLE IF EXISTS `telefonoadmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonoadmins` (
  `CI` int NOT NULL,
  `Telefono` int NOT NULL,
  PRIMARY KEY (`CI`,`Telefono`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonoadmins`
--

LOCK TABLES `telefonoadmins` WRITE;
/*!40000 ALTER TABLE `telefonoadmins` DISABLE KEYS */;
INSERT INTO `telefonoadmins` VALUES (54762032,93897669),(54796213,94876213),(54879002,94799523),(57962020,93154675);
/*!40000 ALTER TABLE `telefonoadmins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonodistribuidoras`
--

DROP TABLE IF EXISTS `telefonodistribuidoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefonodistribuidoras` (
  `IDD` int NOT NULL,
  `TeleDist` int NOT NULL,
  PRIMARY KEY (`IDD`,`TeleDist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonodistribuidoras`
--

LOCK TABLES `telefonodistribuidoras` WRITE;
/*!40000 ALTER TABLE `telefonodistribuidoras` DISABLE KEYS */;
INSERT INTO `telefonodistribuidoras` VALUES (1,23647812),(2,23657810),(3,2364321);
/*!40000 ALTER TABLE `telefonodistribuidoras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-05 18:46:31
