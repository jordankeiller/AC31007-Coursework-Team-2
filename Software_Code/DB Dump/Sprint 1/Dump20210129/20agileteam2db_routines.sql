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
-- Temporary view structure for view `principle_researcher_questionnaires`
--

DROP TABLE IF EXISTS `principle_researcher_questionnaires`;
/*!50001 DROP VIEW IF EXISTS `principle_researcher_questionnaires`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `principle_researcher_questionnaires` AS SELECT 
 1 AS `Questionnaire Name`,
 1 AS `Researcher Name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `all_question_types`
--

DROP TABLE IF EXISTS `all_question_types`;
/*!50001 DROP VIEW IF EXISTS `all_question_types`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_question_types` AS SELECT 
 1 AS `Question_ID`,
 1 AS `Type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `question_options`
--

DROP TABLE IF EXISTS `question_options`;
/*!50001 DROP VIEW IF EXISTS `question_options`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `question_options` AS SELECT 
 1 AS `Option_ID`,
 1 AS `Question`,
 1 AS `Options`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `principle_researcher_questionnaires`
--

/*!50001 DROP VIEW IF EXISTS `principle_researcher_questionnaires`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`20agileteam2`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `principle_researcher_questionnaires` AS select `questionnaire`.`Questionnaire_Name` AS `Questionnaire Name`,`researcher`.`Name` AS `Researcher Name` from (`questionnaire` join `researcher`) where (`researcher`.`Researcher_ID` = `questionnaire`.`Researcher_ID`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `all_question_types`
--

/*!50001 DROP VIEW IF EXISTS `all_question_types`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`20agileteam2`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `all_question_types` AS select `questionnaire_questions`.`Question_ID` AS `Question_ID`,`question_types`.`Type` AS `Type` from (`question_types` join `questionnaire_questions`) where (`questionnaire_questions`.`Question_Type_ID` = `question_types`.`Question_Type_ID`) order by `questionnaire_questions`.`Question_ID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `question_options`
--

/*!50001 DROP VIEW IF EXISTS `question_options`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`20agileteam2`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `question_options` AS select `questionnaire_questions_options`.`Question_Option_ID` AS `Option_ID`,`questionnaire_questions_options`.`Question_ID` AS `Question`,`questionnaire_questions_options`.`Question_Option_Description` AS `Options` from (`questionnaire_questions_options` join `questionnaire_questions`) where (`questionnaire_questions_options`.`Question_Option_ID` = `questionnaire_questions_options`.`Question_Option_ID`) group by `questionnaire_questions_options`.`Question_Option_ID` order by `questionnaire_questions_options`.`Question_Option_ID` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database '20agileteam2db'
--
/*!50003 DROP PROCEDURE IF EXISTS `add_response` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`20agileteam2`@`%` PROCEDURE `add_response`(question_id int(5), option_id int(5), participant_id int(10), response varchar(500))
BEGIN
    start transaction;
    insert into `20agileteam2db`.`questionnaire_responses` (`Question_ID`, `Question_Option_ID`, `Participant_ID`, `Response`)
    values (question_id, option_id, participant_id, response);
    commit;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_question_option` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`20agileteam2`@`%` PROCEDURE `get_question_option`(question_id int(5), q_option_description varchar(100))
BEGIN
	SELECT `Question_Option_ID` FROM `questionnaire_questions_options`
    WHERE q_option_description = `questionnaire_questions_options`.`Question_Option_Description`
    AND question_id = `questionnaire_questions_options`.`Question_ID`;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_question_type` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`20agileteam2`@`%` PROCEDURE `get_question_type`(question_id int(5))
BEGIN
	SELECT `question_types`.`Type`
    FROM `question_types`, `questionnaire_questions`
    WHERE question_id = `questionnaire_questions`.`Question_ID` and `questionnaire_questions`.`Question_Type_ID` = `question_types`.`Question_Type_ID`;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `options_for_question` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`20agileteam2`@`%` PROCEDURE `options_for_question`(question_id int)
BEGIN
	SELECT * FROM `question_options`
    WHERE question_id = `Question`;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `researcher_questionnaires` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`20agileteam2`@`%` PROCEDURE `researcher_questionnaires`(researcher_id int)
BEGIN
	SELECT 
        `q`.`Questionnaire_Name` AS `Questionnaire Name`,
        `r`.`name` AS `Researcher Name`
    FROM
        (`20agileteam2db`.`questionnaire` `q`
        JOIN `20agileteam2db`.`researcher` `r`)
    WHERE
        (`r`.`Researcher_ID` = `q`.`Researcher_ID`) and `r`.`Researcher_ID` = researcher_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-29 10:14:15
