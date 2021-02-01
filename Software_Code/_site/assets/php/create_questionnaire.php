<?php
include "GLOBAL_CONFIG.php";

if (isset($_POST['questionnaire_title'])) {

    $CREATE_GET_QUESTIONNAIRE = "INSERT INTO `questionnaire` () VALUES (DEFAULT, '".$_POST['questionnaire_title']."', DEFAULT);";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_QUESTIONNAIRE);
    $STMT_PARTICIPANT->execute();

    // Gets the newly created participant id used to submit responses.
    // This line has to be called separately or else there'll be a PDO problems.
    $CREATE_GET_QUESTIONNAIRE = "SELECT LAST_INSERT_ID() as `id`;";
    $STMT_QUESTIONNAIRE = $MYSQL_CONNECTION->prepare($CREATE_GET_QUESTIONNAIRE);
    $STMT_QUESTIONNAIRE->execute();
    $PARTICIPANT = $STMT_QUESTIONNAIRE->fetchAll();
    $STMT_QUESTIONNAIRE->closeCursor(); 

    
    $participant = -1;
    foreach ($PARTICIPANT as $val) {
        $_SESSION['QuestionnaireID'] = $val['id'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
