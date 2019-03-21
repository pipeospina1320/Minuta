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
-- Table structure for table `protocolo`
--

DROP TABLE IF EXISTS `protocolo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protocolo` (
  `proto_id` int(11) NOT NULL AUTO_INCREMENT,
  `proto_titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `proto_descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `proto_file` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `proto_nomarchivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `clien_id` int(11) NOT NULL,
  `usua_id` int(11) NOT NULL,
  PRIMARY KEY (`proto_id`),
  KEY `protocolo_ibfk_1` (`usua_id`),
  CONSTRAINT `protocolo_ibfk_1` FOREIGN KEY (`usua_id`) REFERENCES `usuario` (`usua_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protocolo`
--

LOCK TABLES `protocolo` WRITE;
/*!40000 ALTER TABLE `protocolo` DISABLE KEYS */;
INSERT INTO `protocolo` VALUES (1,'A','Relacionamiento con  afiliados, usuarios, empleados, proveeedores y demas publicos de  interes','views/assets/images/protocolo/08052018104526PROTOCOLO A.pdf','08052018104526PROTOCOLO A.pdf',1044,2),(2,'B','Ingreso y salida de afiliados y usuarios','views/assets/images/protocolo/08052018104623PROTOCOLO B.pdf','08052018104623PROTOCOLO B.pdf',1044,2),(3,'C','Ingreso horario no laboral empleados,aprendices y practicantes','views/assets/images/protocolo/08052018104646PROTOCOLO C.pdf','08052018104646PROTOCOLO C.pdf',1044,2),(4,'D','Ingreso de contratistas y proveedores de mantenimiento y obras civiles ','views/assets/images/protocolo/08052018104720PROTOCOLO D.pdf','08052018104720PROTOCOLO D.pdf',1044,2),(5,'E','Registro de empleados y visitantes','views/assets/images/protocolo/08052018104746PROTOCOLO E.pdf','08052018104746PROTOCOLO E.pdf',1044,2),(6,'F','Antena controles de activos ','views/assets/images/protocolo/08052018104839PROTOCOLO F.pdf','08052018104839PROTOCOLO F.pdf',1044,2),(7,'G','Control salida de activos fijos','views/assets/images/protocolo/08052018104859PROTOCOLO G.pdf','08052018104859PROTOCOLO G.pdf',1044,2),(8,'H','Tendencia y control de llaves institucionales','views/assets/images/protocolo/08052018104922PROTOCOLO H.pdf','08052018104922PROTOCOLO H.pdf',1044,2),(9,'I','Manejo sistema de alarma ','views/assets/images/protocolo/08052018105031PROTOCOLO I.pdf','08052018105031PROTOCOLO I.pdf',1044,2),(10,'J','Apertura y cierre de las instalaciones','views/assets/images/protocolo/08052018105107PROTOCOLO J.pdf','08052018105107PROTOCOLO J.pdf',1044,2),(11,'K','Captura de personas','views/assets/images/protocolo/08052018105304PROTOCOLO K.pdf','08052018105304PROTOCOLO K.pdf',1044,2),(12,'L','Cadena custodia','views/assets/images/protocolo/08052018105349PROTOCOLO L.pdf','08052018105349PROTOCOLO L.pdf',1044,2),(13,'M','Uso equipo de comunicación','views/assets/images/protocolo/08052018105417PROTOCOLO M.pdf','08052018105417PROTOCOLO M.pdf',1044,2),(14,'N','Objetos olvidados o perdidos','views/assets/images/protocolo/08052018105531PROTOCOLO N.pdf','08052018105531PROTOCOLO N.pdf',1044,2),(15,'Ñ','Usuarios retadores','views/assets/images/protocolo/08052018105602PROTOCOLO Ñ.pdf','08052018105602PROTOCOLO Ñ.pdf',1044,2),(16,'O','Transporadora de valores','views/assets/images/protocolo/08052018105621PROTOCOLO O.pdf','08052018105621PROTOCOLO O.pdf',1044,2),(17,'P','Manejo y salida de residuos','views/assets/images/protocolo/08052018105652PROTOCOLO P.pdf','08052018105652PROTOCOLO P.pdf',1044,2),(18,'Q','Perdida o fuga de usuarios','views/assets/images/protocolo/08052018105959PROTOCOLO Q.pdf','08052018105959PROTOCOLO Q.pdf',1044,2),(19,'R','Ingreso y salida de vehiculos institucionales','views/assets/images/protocolo/08052018110035PROTOCOLO R.pdf','08052018110035PROTOCOLO R.pdf',1044,2),(20,'S','Responsabilidades del personal de guardas en emergencias','views/assets/images/protocolo/08052018112805PROTOCOLO S.pdf','08052018112805PROTOCOLO S.pdf',1044,2),(21,'T','Confidencilaidad de la informacion','views/assets/images/protocolo/08052018112840PROTOCOLO T.pdf','08052018112840PROTOCOLO T.pdf',1044,2),(22,'U','Salida de menores de las sedes','views/assets/images/protocolo/08052018112900PROTOCOLO U.pdf','08052018112900PROTOCOLO U.pdf',1044,2),(23,'V','Aseo y orden en puestos ','views/assets/images/protocolo/08052018112922PROTOCOLO V.pdf','08052018112922PROTOCOLO V.pdf',1044,2),(24,'W','Control armas, municiones o explosivos','views/assets/images/protocolo/08052018112957PROTOCOLO W.pdf','08052018112957PROTOCOLO W.pdf',1044,2),(26,'X','NUESTRA ATENCIÓN Y SERVICIO UN PRINCIPIO A LA EXCELENCIA','views/assets/images/protocolo/06072018104936PROTOCOLO X.pdf','06072018104936PROTOCOLO X.pdf',1044,37);
/*!40000 ALTER TABLE `protocolo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-27 13:17:08
