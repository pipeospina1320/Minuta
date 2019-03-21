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
-- Table structure for table `consignaparticular`
--

DROP TABLE IF EXISTS `consignaparticular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consignaparticular` (
  `consigp_id` int(11) NOT NULL AUTO_INCREMENT,
  `consigp_titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `consigp_descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `consigp_file` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `consigp_nomarchivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clien_id` int(11) NOT NULL,
  `sed_id` int(11) NOT NULL,
  `usua_id` int(11) NOT NULL,
  PRIMARY KEY (`consigp_id`),
  KEY `consignaparticular_ibfk_2` (`usua_id`),
  CONSTRAINT `consignaparticular_ibfk_2` FOREIGN KEY (`usua_id`) REFERENCES `usuario` (`usua_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consignaparticular`
--

LOCK TABLES `consignaparticular` WRITE;
/*!40000 ALTER TABLE `consignaparticular` DISABLE KEYS */;
INSERT INTO `consignaparticular` VALUES (1,'RONDA','MANUAL DE FUNCIONES','views/assets/images/consignas_particular/06072018105556BOLETIN MAYO.pdf','06072018105556BOLETIN MAYO.pdf',1044,3,37),(2,'MONITOREO','MANUAL DE FUNCIONES','views/assets/images/consignas_particular/0707201820930RVF 15 Cimca.pdf','0707201820930RVF 15 Cimca.pdf',1044,17,37),(3,'MONITOREO','Manual de Funciones','views/assets/images/consignas_particular/2607201824850RVF 15 Cimca.pdf','2607201824850RVF 15 Cimca.pdf',1044,17,37);
/*!40000 ALTER TABLE `consignaparticular` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-27 13:17:12
