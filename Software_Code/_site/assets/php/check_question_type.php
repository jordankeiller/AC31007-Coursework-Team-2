<?php

    // Includes the global configuration file
    include "GLOBAL_CONFIG.php";
 
    // Initialises the JSON to a blank variable
    $QUESTION_JSON;
 
    foreach($_POST as $key => $value){

        // If the JSON has been detected from the form
        if ($key == 'question_json') {
            $QUESTION_JSON = json_decode($value, true);
            foreach ($QUESTION_JSON as $IDENTIFIER => $VARIABLE) {

                // If the element in the JSON is the title of the Questionnaire
                if ($IDENTIFIER == 'Title') {
                    // Inserts questionnaire title into the table
                    $CREATE_GET_QUESTIONNAIRE = "INSERT INTO `questionnaire` () VALUES (DEFAULT, '".$VARIABLE."', DEFAULT);";
                    $STMT_QUESTIONNAIRE = $MYSQL_CONNECTION->prepare($CREATE_GET_QUESTIONNAIRE);
                    $STMT_QUESTIONNAIRE->execute();

                    // Retrieves the ID of the inserted quesitonnaire
                    $GET_QUESTIONNAIRE_ID = "SELECT LAST_INSERT_ID() as `id`;";
                    $STMT_QUESTIONNAIRE = $MYSQL_CONNECTION->prepare($GET_QUESTIONNAIRE_ID);
                    $STMT_QUESTIONNAIRE->execute();
                    $QUESTIONNAIRE = $STMT_QUESTIONNAIRE->fetchAll();
                    $STMT_QUESTIONNAIRE->closeCursor(); 

                    $QUESTIONNAIRE_ID = -1;
                    foreach ($QUESTIONNAIRE as $val) {
                        $QUESTIONNAIRE_ID = $val['id'];
                        // If failed to get QUESTIONNAIRE_ID id. Then don't submit.
                        if ($QUESTIONNAIRE_ID == -1) {
                            echo "<br><br><h1>Submission Attempt Failed.</h1><br><br><p>Error: Failed to get QUESTIONNAIRE_ID.</p>";
                            die();
                        }
                    }
                }
                
                // If the element in the JSON is not the title of Questionnaire (i.e. is a question or an option)
                else {

                    // Inserts the question into the database
                    $INSERT_QUESTION = "CALL `20agileteam2db`.`create_question`(".$QUESTIONNAIRE_ID.", '".$IDENTIFIER."', ".$VARIABLE['type'].")";
                    $STMT_ENTRY = $MYSQL_CONNECTION->prepare($INSERT_QUESTION);
                    $STMT_ENTRY->execute();

                    // If the question requires a single answer (i.e. no options/multi-selects, then go to the else) - no options
                    if ($VARIABLE['options'] == null) {
                        echo "";
                    }else{
                        foreach ($VARIABLE['options'] as $key) {
                            echo "<br>Option Name: " .$key;
                        }
                    }
                }
            }
        }else{
            echo "";
        }
    }
 
    // After the form has been processed, return the user back to the page they came from
    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
