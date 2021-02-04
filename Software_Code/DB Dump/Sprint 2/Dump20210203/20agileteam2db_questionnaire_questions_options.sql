-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: silva.computing.dundee.ac.uk    Database: 20agileteam2db
-- ------------------------------------------------------
-- Server version	5.6.20-log

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
-- Table structure for table `questionnaire_questions_options`
--

DROP TABLE IF EXISTS `questionnaire_questions_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionnaire_questions_options` (
  `Question_Option_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Question_ID` int(10) NOT NULL,
  `Question_Option_Description` varchar(5000) NOT NULL DEFAULT 'Sample_Option' COMMENT 'Big varchar size used for Option Description is for php sanitized input.',
  PRIMARY KEY (`Question_Option_ID`),
  UNIQUE KEY `Question_Option_ID_UNIQUE` (`Question_Option_ID`),
  KEY `Question_ID` (`Question_ID`),
  CONSTRAINT `questionnaire_questions_options_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `questionnaire_questions` (`Question_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire_questions_options`
--

LOCK TABLES `questionnaire_questions_options` WRITE;
/*!40000 ALTER TABLE `questionnaire_questions_options` DISABLE KEYS */;
INSERT INTO `questionnaire_questions_options` VALUES (1,8,'Hearing loss present at birth (congenital)'),(2,8,'Exposure to loud noise'),(3,8,'Head trauma'),(4,8,'Virus/Disease'),(5,8,'Aging'),(6,8,'Other'),(7,9,'Cochlear Implant(s)'),(8,9,'Hearing Aid(s)'),(9,9,'Personal Listening Device'),(10,10,'TV'),(11,10,'Smart TV'),(12,10,'Laptop'),(13,10,'Smartphone'),(14,10,'Desktop PC/Computer'),(15,10,'Tablet'),(16,10,'iPad'),(17,10,'Overhead Projector'),(18,10,'Other'),(19,13,'Terrestrial TV'),(20,13,'Sky'),(21,13,'Virgin'),(22,13,'Freeview'),(23,13,'Sky Go'),(24,13,'NowTV'),(25,13,'AppleTV'),(26,13,'Amazon Instant Video / Amazon Prime Video'),(27,13,'Netflix'),(28,13,'Other'),(29,14,'On the go Live TV'),(30,14,'On Demand TV (BBC iPlayer, ITV Player, Roku, YoutubeTV etc)'),(31,14,'Recorded Programmes'),(32,14,'Other'),(33,16,'Helps me understand context'),(34,16,'I have a hearing loss (situational, temporary, permanent)'),(35,16,'Use subtitles to translate speech to native language'),(36,16,'Use subtitles to reinforce language'),(37,16,'Trouble understanding regional accents'),(38,16,'Trouble understanding national accents'),(39,16,'Trouble understanding international accents'),(40,16,'Busy using another device'),(41,16,'Noisy viewing conditions'),(42,16,'Quiet viewing conditions'),(43,16,'Media content has low sound quality (e.g., hard to extract voices from background noise)'),(44,16,'Other'),(45,3,'High School'),(46,3,'College'),(47,3,'University'),(48,3,'Other'),(49,4,'Excellent'),(50,4,'Good'),(51,4,'Fair'),(52,4,'Poor'),(53,5,'Yes'),(54,5,'No'),(55,5,'Maybe'),(56,7,'Mild'),(57,7,'Moderate'),(58,7,'Severe'),(59,7,'Profound'),(60,11,'Every day'),(61,11,'Every other day'),(62,11,'Once a week'),(63,11,'Once every 2 weeks'),(64,11,'Seldom'),(65,11,'Never'),(66,12,'Less than an hour'),(67,12,'1-2 hours'),(68,12,'3-4 hours'),(69,12,'5 or more hours'),(70,15,'Yes'),(71,15,'No'),(72,17,'Daily'),(73,17,'2-3 times a week'),(74,17,'Once a week'),(75,17,'1-2 times per month'),(76,17,'1-2 times per year'),(77,17,'Never'),(78,18,'Daily'),(79,18,'2-3 times a week'),(80,18,'Once a week'),(81,18,'1-2 times per month'),(82,18,'1-2 times per year'),(83,18,'Never'),(84,19,'Yes'),(85,19,'No'),(86,21,'Yes'),(87,21,'No'),(88,21,'Maybe'),(89,23,'Yes'),(90,23,'No');
/*!40000 ALTER TABLE `questionnaire_questions_options` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-03 11:29:31
