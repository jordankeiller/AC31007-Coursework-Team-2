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
  `Question_Description` varchar(250) DEFAULT 'Sample_Question',
  `Question_Type_ID` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Question_ID`),
  UNIQUE KEY `Question_ID_UNIQUE` (`Question_ID`),
  KEY `questionnaire_questions_ibfk_1` (`Questionnaire_ID`),
  KEY `question_type_id_fk_idx` (`Question_Type_ID`),
  CONSTRAINT `question_type_id_fk` FOREIGN KEY (`Question_Type_ID`) REFERENCES `question_types` (`Question_Type_ID`) ON UPDATE CASCADE,
  CONSTRAINT `questionnaire_questions_ibfk_1` FOREIGN KEY (`Questionnaire_ID`) REFERENCES `questionnaire` (`Questionnaire_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire_questions`
--

LOCK TABLES `questionnaire_questions` WRITE;
/*!40000 ALTER TABLE `questionnaire_questions` DISABLE KEYS */;
INSERT INTO `questionnaire_questions` VALUES (1,1,'1. Age',2),(2,1,'2. Gender',1),(3,1,'3. Highest Level of Education',4),(4,1,'4. Please rate your level of computer literacy',4),(5,1,'5. Do you have a hearing loss?',4),(6,1,'6. How long have you had a hearing loss?',1),(7,1,'7. How would you describe your hearing loss?',4),(8,1,'8. Cause, if known',3),(9,1,'9. Do you use',3),(10,1,'10. What devices do you watch scripted entertainment (e.g., tv shows, movies, documentaries) on? (Tick all that apply)',3),(11,1,'11. How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries)?',4),(12,1,'12. How many hours per day do you watch scripted entertainment (e.g., tv shows, movies, documentaries)?',4),(13,1,'13. What services do you use to watch scripted entertainment (e.g., tv shows, movies, documentaries)?',3),(14,1,'14. Alongside terrestrial TV and online streaming do you use any of the following to watch scripted entertainment (e.g., tv shows, movies, documentaries)',3),(15,1,'15. Do you regularly watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned on?',4),(16,1,'16. What are the reasons you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned on?',3),(17,1,'17. How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned ON?',4),(18,1,'18. How often do you watch scripted entertainment (e.g., tv shows, movies, documentaries) with subtitles turned OFF?',4),(19,1,'19. Have you ever turned subtitles on for a specific show or type of content?',4),(20,1,'20. If yes - What type of content do you turn subtitles on for?',1),(21,1,'21. Have you ever needed to pause or stop watching a show because you couldn\'t hear what was being said on screen?',4),(22,1,'22. If Yes, please explain:',1),(23,1,'23. Have you ever had a trouble understanding an accent on a programme?',4),(24,1,'24. If Yes, please explain:',1);
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

-- Dump completed on 2021-01-29 10:13:50
