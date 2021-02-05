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
-- Table structure for table `questionnaire_responses`
--

DROP TABLE IF EXISTS `questionnaire_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionnaire_responses` (
  `Response_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Question_ID` int(10) NOT NULL,
  `Question_Option_ID` int(10) DEFAULT NULL,
  `Participant_ID` int(10) NOT NULL,
  `Response` varchar(5000) DEFAULT NULL COMMENT 'Big varchar size used for Response is for php sanitized input.',
  PRIMARY KEY (`Response_ID`),
  UNIQUE KEY `Response_ID_UNIQUE` (`Response_ID`),
  KEY `Question_ID` (`Question_ID`),
  KEY `questionnaire_responses_ibfk_2` (`Question_Option_ID`),
  KEY `questionnaire_responses_ibfk_3` (`Participant_ID`),
  CONSTRAINT `questionnaire_responses_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `questionnaire_questions` (`Question_ID`),
  CONSTRAINT `questionnaire_responses_ibfk_2` FOREIGN KEY (`Question_Option_ID`) REFERENCES `questionnaire_questions_options` (`Question_Option_ID`),
  CONSTRAINT `questionnaire_responses_ibfk_3` FOREIGN KEY (`Participant_ID`) REFERENCES `participant` (`Participant_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire_responses`
--

LOCK TABLES `questionnaire_responses` WRITE;
/*!40000 ALTER TABLE `questionnaire_responses` DISABLE KEYS */;
INSERT INTO `questionnaire_responses` VALUES (1,1,NULL,1,'27'),(2,2,NULL,1,'Male'),(3,3,45,1,NULL),(4,4,51,1,NULL),(5,5,55,1,NULL),(6,6,NULL,1,'A few months'),(7,7,57,1,NULL),(8,8,2,1,NULL),(9,8,3,1,NULL),(10,9,9,1,NULL),(11,9,7,1,NULL),(12,10,10,1,NULL),(13,10,11,1,NULL),(14,10,16,1,NULL),(15,11,61,1,NULL),(16,12,69,1,NULL),(17,13,20,1,NULL),(18,13,22,1,NULL),(19,13,23,1,NULL),(20,13,27,1,NULL),(21,14,30,1,NULL),(22,14,29,1,NULL),(23,15,70,1,NULL),(24,16,37,1,NULL),(25,16,34,1,NULL),(26,16,39,1,NULL),(27,16,41,1,NULL),(28,16,40,1,NULL),(29,17,76,1,NULL),(30,18,82,1,NULL),(31,19,85,1,NULL),(32,20,NULL,1,''),(33,21,86,1,NULL),(34,22,NULL,1,'Sometimes I need to turn on subtitles because I can&#39;t understand what is being said'),(35,23,89,1,NULL),(36,24,NULL,1,'I have trouble understanding Scottish accent&#39;s'),(37,1,NULL,2,'20'),(38,2,NULL,2,'Female'),(39,3,47,2,NULL),(40,4,50,2,NULL),(41,5,55,2,NULL),(42,6,NULL,2,'Only moderate hearing loss.'),(43,7,56,2,NULL),(44,8,2,2,NULL),(45,10,13,2,NULL),(46,10,10,2,NULL),(47,11,60,2,NULL),(48,12,66,2,NULL),(49,13,20,2,NULL),(50,13,28,2,NULL),(51,13,27,2,NULL),(52,13,19,2,NULL),(53,14,30,2,NULL),(54,14,32,2,NULL),(55,15,70,2,NULL),(56,16,33,2,NULL),(57,16,37,2,NULL),(58,16,39,2,NULL),(59,17,74,2,NULL),(60,18,83,2,NULL),(61,19,84,2,NULL),(62,20,NULL,2,'Not usually.'),(63,21,86,2,NULL),(64,22,NULL,2,'I sometimes need to stop watching the screen/'),(65,23,90,2,NULL),(66,24,NULL,2,''),(67,1,NULL,3,'21'),(68,1,NULL,4,'21'),(69,2,NULL,3,'Male'),(70,2,NULL,4,'Male'),(71,3,45,4,NULL),(72,3,47,3,NULL),(73,4,49,4,NULL),(74,4,50,3,NULL),(75,5,53,4,NULL),(76,5,55,3,NULL),(77,6,NULL,4,'Two year'),(78,7,56,4,NULL),(79,6,NULL,3,'2 or 3 years.'),(80,8,2,4,NULL),(81,7,56,3,NULL),(82,10,10,4,NULL),(83,8,6,3,NULL),(84,10,13,4,NULL),(85,10,10,3,NULL),(86,10,12,4,NULL),(87,10,16,3,NULL),(88,10,14,4,NULL),(89,10,14,3,NULL),(90,11,60,4,NULL),(91,11,60,3,NULL),(92,12,67,4,NULL),(93,12,66,3,NULL),(94,13,27,4,NULL),(95,13,27,3,NULL),(96,13,26,4,NULL),(97,14,32,3,NULL),(98,15,70,4,NULL),(99,15,70,3,NULL),(100,16,38,4,NULL),(101,16,33,3,NULL),(102,16,35,4,NULL),(103,17,72,3,NULL),(104,17,72,4,NULL),(105,18,79,3,NULL),(106,18,78,4,NULL),(107,19,85,3,NULL),(108,19,85,4,NULL),(109,20,NULL,3,''),(110,20,NULL,4,''),(111,21,86,3,NULL),(112,21,88,4,NULL),(113,22,NULL,3,'Sometimes I don&#39;t quite catch what the actors are saying.'),(114,22,NULL,4,''),(115,23,89,3,NULL),(116,23,89,4,NULL),(117,24,NULL,3,'Some accents are really just too different and I have trouble understanding.'),(118,24,NULL,4,'My English is not good.'),(129,25,NULL,5,'Pepper'),(130,26,92,5,NULL),(131,27,94,5,NULL),(132,28,98,5,NULL),(133,29,NULL,5,'i'),(134,30,NULL,5,'1000000000'),(135,31,NULL,5,'100'),(136,32,NULL,5,'Africa'),(137,33,104,5,NULL);
/*!40000 ALTER TABLE `questionnaire_responses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-05 13:09:18
