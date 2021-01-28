<?php

include "__GLOBAL_CONFIG__.PHP"; // Required to contact the DB server.

if (isset($_POST['submit'])){

    // Calls the database to create a participant id.
    $CREATE_GET_PARTICIPANT = "INSERT INTO `participant` () VALUES (); SELECT LAST_INSERT_ID() as `id`;";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();
    
    // Gets the newly created participant id used to submit responses.
    // This line has to be called separately or else there'll be a PDO problems.
    $CREATE_GET_PARTICIPANT = "SELECT LAST_INSERT_ID() as `id`;";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();
    $PARTICIPANT = $STMT_PARTICIPANT->fetchAll();
    $STMT_PARTICIPANT->closeCursor(); // Important so that PDO doesn't throw PDO bufferd query error.
    // Without this line the next query cannot run until all the results from the previous query have been fetched.
    // This line tells the server to stop sending and discard results.

    // Used to extract the participant id from the participant query output.
    $participant = -1;
    foreach ($PARTICIPANT as $val) {

        $participant = $val['id'];

        // If failed to get participant id. Then don't submit.
        if ($participant == -1) {
            echo "<h1>Failed Submission Attempt</h1><p>Error: Failed to get participant id.</p>";
            die();
        }
    }
    
    // Loops through each question with a response.
    foreach($_POST as $key => $value) {

        if($key != "submit"){

            echo "<br>Key: " .$key ."     Value: " .$value;

            // Calls procedure that takes in question id and returns the question type.
            $q_type = "CALL `20agileteam2db`.`get_question_type`(".$key.");";
            $STMT_TYPE = $MYSQL_CONNECTION->prepare($q_type);
            $STMT_TYPE->execute();
            $RESULT_TYPE = $STMT_TYPE->fetchAll();
            $STMT_TYPE->closeCursor();
            
            // Extracts question type from query output.
            $type = "";
            foreach ($RESULT_TYPE as $val) {
                $type = $val['Type'];
            }

            // If the question has text or number input.
            if ($type == "text" || $type == "number") {

                // Submits text/number response to db using procedure call that takes in question id, option id (which is null)
                // participant id and the input.
                $insertEntry = "CALL `20agileteam2db`.`add_response`(" .$key. ", NULL, " .$participant .", '" .$value ."');";
                $MYSQL_CONNECTION->prepare($insertEntry)->execute();

            }
            // If the question type is multi select (where the participant chooses options that apply).
            elseif ($type == "multi_select") {



            }
            // If the question type is option (where the participant only chooses one out of many options).
            elseif ($type == "option") {

                // Calls procedure to get the option id using question id and option name as input.
                $SQL_QUERY_QUESTIONS_OPTIONS = "CALL 20agileteam2db.get_question_option(".$key.", '".$value."');";
                $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS_OPTIONS);
                $STMT_OPTIONS->execute();
                $RESULT_OPTIONS = $STMT_OPTIONS->fetchAll();
                $STMT_OPTIONS->closeCursor();
                
                // Submits response to db.
                foreach($RESULT_OPTIONS as $row) {

                    $insertOption = "CALL 20agileteam2db.add_response(".$key.",".$row['Question_Option_ID'].", ".$participant.", NULL)";
                    $STMT_ENTRY = $MYSQL_CONNECTION->prepare($insertOption);
                    $STMT_ENTRY->execute();
                }

            }
            // If the question type returned from the db is not right (indicative of db error).
            else {
                echo "Error: Type not recognised: " .$type;
                die();
            }

        }
        // Assumes that all responses are submitted to the db.
        else {
            echo "<br><br><h1>Submission Attempt Complete.</h1>";
        }
        // echo "<li>$key: $value</li>";
    }
}
?>