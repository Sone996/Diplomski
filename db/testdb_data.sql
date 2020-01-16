-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: testdb
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` varchar(45) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` VALUES (248,'user','jjjjjj','jpojpo','2003-10-19 09:22:43'),(252,'Sone','uu','yy','2009-10-19 12:13:01'),(253,'Sone','r5r','r65r','2009-10-19 12:13:05'),(258,'Sone','fty','ftyfy','2009-10-19 12:45:03'),(259,'Sone','dfdgff','dfgdgfgfd','2009-10-19 12:49:11'),(260,'Sone','rtrttr','uyuyyu','2009-10-19 12:49:43'),(261,'Sone','rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr','rrrrrrrrrrrrrrrrrrrrrr','2009-10-19 12:49:49'),(262,'Sone','sss','dddd','2009-10-19 02:15:14'),(264,'Sone','yguygyu','yguyguygu','2009-10-19 02:43:35'),(266,'Sone','iiiiiiiiii','iiiiiiiiiiiiiiiiiijoiojoji','2009-10-19 03:04:19'),(267,'Sone','uuoooo','yy','2009-10-19 03:04:31'),(268,'Sone','testooooo','test','2009-10-19 03:04:43'),(270,'Sone','testooooo','test','2009-10-19 03:28:32'),(271,'Sone','ddtrdu','ddddddddddddtrd','2010-10-19 04:17:52'),(272,'Sone','dturdtrudtu','ddturdrtudrtudtrudtu','2010-10-19 04:17:57'),(273,'Sone','tuytuytuiy','tuytuytuityuiti','2010-10-19 04:18:19'),(274,'Sone','title','text','2011-10-19 10:53:23'),(275,'Sone','yyyyy','yyyyyyy','2011-10-19 10:53:39'),(276,'Sone','qqq','qqq','2011-10-19 11:07:30'),(277,'Sone','title1','text1','2011-10-19 11:17:34'),(287,'User','ueser title','dsdfshioohfidhfaesoi dfshidfshidfsohi dfhidfsohdfsi','2019-10-11 01:54:20'),(288,'Sone',' hiohoi','hoihoih','2019-10-21 03:02:31');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-22 11:55:29
