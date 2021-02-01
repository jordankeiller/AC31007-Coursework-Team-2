<?php

    $SQL_QUERY_QUESTIONS = "SELECT * FROM `questionnaire_questions` WHERE `Questionnaire_ID` = ".$_GET['quiz_id']."";
    $STMT = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();


?>