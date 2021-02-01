<?php
    $SQL_QUERY_QUESTIONS = "SELECT * FROM `questionnaire` WHERE `Questionnaire_ID` = ".$_GET['quiz_id']."";
    $STMT = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS);
    $STMT->execute();
    $RESULT = $STMT->fetch();
    echo "<h1 class='text-primary fw-bold mt-3 mb-0'>".$RESULT['Questionnaire_Name']."</h1>";
?>