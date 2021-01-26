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
-- Table structure for table `questionnaire_questions`
--

DROP TABLE IF EXISTS `questionnaire_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questionnaire_questions` (
  `Question_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Questionnaire_ID` int(10) NOT NULL,
  `Question_Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Question_ID`),
  UNIQUE KEY `Question_ID_UNIQUE` (`Question_ID`),
  KEY `questionnaire_questions_ibfk_1` (`Questionnaire_ID`),
  CONSTRAINT `questionnaire_questions_ibfk_1` FOREIGN KEY (`Questionnaire_ID`) REFERENCES `questionnaire` (`Questionnaire_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire_questions`
--

LOCK TABLES `questionnaire_questions` WRITE;
/*!40000 ALTER TABLE `questionnaire_questions` DISABLE KEYS */;
INSERT INTO `questionnaire_questions` VALUES (1,1,'Age'),(2,1,'Gender'),(3,1,'Highest Level of Education'),(4,1,'Please rate your level of computer literacy'),(5,1,'Do you have a hearing loss?'),(6,1,'How long have you had a hearing loss?'),(7,1,'How would you describe your hearing loss?'),(8,1,'Cause, if known'),(9,1,'Do you use'),(10,1,'What devices do you watch scripted entertainment (e.g., tv shows, movies, documentaries) on? (Tick all that apply)'),(11,1,'How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries)?'),(12,1,'How many hours per day do you watch scripted entertainment (e.g., tv shows, movies, documentaries)?'),(13,1,'What services do you use to watch scripted entertainment (e.g., tv shows, movies, documentaries)?'),(14,1,'Alongside terrestrial TV and online streaming do you use any of the following to watch scripted entertainment (e.g., tv shows, movies, documentaries)'),(15,1,'Do you regularly watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned on?'),(16,1,'What are the reasons you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned on?'),(17,1,'How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned ON?'),(18,1,'How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned OFF?'),(19,1,'Have you ever turned subtitles on for a specific show or type of content?'),(20,1,'If yes - What type of content do you turn subtitles on for?'),(21,1,'Have you ever needed to pause or stop watching a show because you couldn\'t hear what was being said on screen?'),(22,1,'If Yes, please explain:'),(23,1,'Have you ever had a trouble understanding an accent on a programme?'),(24,1,'If Yes, please explain:');
/*!40000 ALTER TABLE `questionnaire_questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-26 10:02:20
