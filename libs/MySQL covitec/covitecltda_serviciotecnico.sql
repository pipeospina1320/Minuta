-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: covitecltda
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `serviciotecnico`
--

DROP TABLE IF EXISTS `serviciotecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviciotecnico` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `ser_direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ser_telefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ser_fechareporte` date NOT NULL,
  `ser_abonado` int(11) NOT NULL,
  `ser_personareporta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ser_sintomareporta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dispo_id` int(11) NOT NULL,
  `ser_fechaejecu` date NOT NULL,
  `ser_horaentrada` time NOT NULL,
  `ser_horasalida` time NOT NULL,
  `ser_tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ser_descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `ser_terminado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ser_danofalla` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ser_seguimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ser_facturar` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `usua_id` int(11) NOT NULL,
  `usua_modifica` int(11) NOT NULL,
  PRIMARY KEY (`ser_id`),
  KEY `serviciotecnico_ibfk_1` (`usua_id`),
  CONSTRAINT `serviciotecnico_ibfk_1` FOREIGN KEY (`usua_id`) REFERENCES `usuario` (`usua_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviciotecnico`
--

LOCK TABLES `serviciotecnico` WRITE;
/*!40000 ALTER TABLE `serviciotecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviciotecnico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-27 13:17:10
