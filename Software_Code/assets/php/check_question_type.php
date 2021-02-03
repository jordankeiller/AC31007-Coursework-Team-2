<?php

    // Includes the global configuration file
    include "GLOBAL_CONFIG.php";
 
    // Initialises the JSON to a blank variable
    $QUESTION_JSON;
 
    foreach($_POST as $key => $value){

        // If the JSON has been detected from the form
        if ($key == 'question_json') {
            $QUESTION_JSON = json_decode($value, true);
            print_r($QUESTION_JSON);

            // Loops through the JSON to find the title (usually the end JSON element)
            foreach($QUESTION_JSON as $IDENTIFIER => $VARIABLE){
                if ($IDENTIFIER == 'Title') {

                    // Sanitises the user input
                    $REG_EXPRESSION_TITLE = filter_var($VARIABLE, FILTER_SANITIZE_STRING);

                    // Inserts questionnaire title into the table
                    $CREATE_GET_QUESTIONNAIRE = "INSERT INTO `questionnaire` () VALUES (DEFAULT, '".$REG_EXPRESSION_TITLE."', DEFAULT);";
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
                }else{
                    echo "";
                }
            }

            // Loops through the questions that are in the JSON (not including the title)
            foreach ($QUESTION_JSON as $IDENTIFIER => $VARIABLE) {
                // If the element in the JSON is not the title of Questionnaire (i.e. is a question or an option)
                if($IDENTIFIER != 'Title') {

                    // Sanitises the user input
                    $REG_EXPRESSION_QUESTION = filter_var($IDENTIFIER, FILTER_SANITIZE_STRING);

                    // Inserts the question into the database
                    $INSERT_QUESTION = "CALL `20agileteam2db`.`create_question`(".$QUESTIONNAIRE_ID.", '".$REG_EXPRESSION_QUESTION."', ".$VARIABLE['type'].")";
                    $STMT_ENTRY = $MYSQL_CONNECTION->prepare($INSERT_QUESTION);
                    $STMT_ENTRY->execute();

                    // If the question requires multpile answers then go to the else. This if statement = no options
                    if ($VARIABLE['options'] == null) {
                        echo "";
                    }else{

                        // Retrieve the last question ID that was inserted into the database from the line of code above
                        $GET_QUESTION_ID = "SELECT LAST_INSERT_ID() as `question_id`;";
                        $STMT_QUESTION = $MYSQL_CONNECTION->prepare($GET_QUESTION_ID);
                        $STMT_QUESTION->execute();
                        $QUESTION = $STMT_QUESTION->fetchAll();
                        $STMT_QUESTION->closeCursor(); 

                        // Save the Question ID into a variable
                        foreach($QUESTION as $row){
                            $QUESTION_ID = $row['question_id'];
                        }

                        // For each option that the question has
                        foreach ($VARIABLE['options'] as $key) {

                            // Sanitises the user input
                            $REG_EXPRESSION_OPTION = filter_var($key, FILTER_SANITIZE_STRING);
                            
                            // Insert the question option into the database
                            $INSERT_QUESTION_OPTION = "CALL `20agileteam2db`.`create_question_options`(".$QUESTION_ID.", '".$REG_EXPRESSION_OPTION."')";
                            $STMT_ENTRY_OPTIONS = $MYSQL_CONNECTION->prepare($INSERT_QUESTION_OPTION);
                            $STMT_ENTRY_OPTIONS->execute();
                        }
                    }
                }else{
                    echo "";
                }
            }
        }else{
            echo "";
        }
    }
 
    // After the form has been processed, return the user back to the page they came from
    header('Location: ../../quiz.php?quiz_id=' . $QUESTIONNAIRE_ID);
?>
