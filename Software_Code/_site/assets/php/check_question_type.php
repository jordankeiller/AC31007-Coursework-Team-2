<?php
    include "GLOBAL_CONFIG.php";
 
    $QUESTION_JSON;
 
    foreach($_POST as $key => $value){
 
        // echo $key . ": ". $value ."<br>";
        // if($key == 1){
        //     $insertText = "CALL `20agileteam2db`.`create_question`(".$_SESSION['QuestionnaireID'].", '".$value."', 1)";
        //     $STMT_ENTRY = $MYSQL_CONNECTION->prepare($insertText);
        //     $STMT_ENTRY->execute();
        // }
 
        if ($key == 'question_json') {
            $QUESTION_JSON = json_decode($value, true);
            foreach ($QUESTION_JSON as $IDENTIFIER => $VARIABLE) {
                if ($IDENTIFIER == 'Title') {
                    echo "<br>Title: " . $VARIABLE;

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

                }else {
                    echo "<br>Question: " . $IDENTIFIER;
                    echo "<br>Type: " . $VARIABLE['type'];
                    if ($VARIABLE['options'] == null) {
                        echo "<br>No options";
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
 
    header('Location: ' . $_SERVER['HTTP_REFERER']);
