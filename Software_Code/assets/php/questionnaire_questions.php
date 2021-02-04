<?php

    // SQL Statement to find all questions for a given questionnaire
    $SQL_QUERY_QUESTIONS = "SELECT * FROM `questionnaire_questions` WHERE `Questionnaire_ID` = ".$_GET['quiz_id']."";
    $STMT = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();

    // $QUESTION_NUMBER = 1;

    // Loop that will run for each question that the database can find for this questionnaire
    foreach ($RESULT as $QUESTION) {

        // Displays the question
        echo "<h3 class='text-primary mt-3 mb-1'>" . $QUESTION['Question_Description'] . "</h3>";
        // $QUESTION_NUMBER++;
        // If the question has multipile options, fetch those options
        $SQL_QUERY_QUESTIONS_OPTIONS = "CALL 20agileteam2db.options_for_question(".$QUESTION['Question_ID'].")";
        $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS_OPTIONS);
        $STMT_OPTIONS->execute();
        $RESULT_OPTIONS = $STMT_OPTIONS->fetchAll();

        // If the question requires a text answer
        if($QUESTION['Question_Type_ID'] == "1"){ 

            // In HTML, "name=" would be the same Question ID as it is in the database
            echo "
                <div class='form-group'>
                    <textarea class='form-control' name='".$QUESTION['Question_ID']."' rows='2'></textarea>
                </div>   
            ";
        }

        // If the question requires a number answer
        elseif($QUESTION['Question_Type_ID'] == "2"){ 

            // In HTML, "name=" would be the same Question ID as it is in the database
            echo "
                <div class='form-group'>
                    <input type='number' name='".$QUESTION['Question_ID']."'>
                </div>   
            "; 
        }
        
        // If the question requires a "check all that apply" answer (multi-select)
        elseif($QUESTION['Question_Type_ID'] == "3"){ 
            
            // For each "check all that apply" option, loop through the following code until the database can't find anymore for that question
            foreach($RESULT_OPTIONS as $QUESTION_OPTIONS){
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' name='".$QUESTION['Question_ID']."[]' id='".$QUESTION_OPTIONS['Option_ID']."' value='".$QUESTION_OPTIONS['Options']."'>
                    <label class='form-check-label' for='".$QUESTION_OPTIONS['Option_ID']."'>
                        ". $QUESTION_OPTIONS['Options']."
                    </label>
                </div>
                ";
            }
        }

        // If the question requires one answer from a list of possible answers (tick one that applies)
        elseif($QUESTION['Question_Type_ID'] == "4"){ 
            foreach($RESULT_OPTIONS as $QUESTION_OPTIONS){
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='".$QUESTION['Question_ID']."' id='".$QUESTION_OPTIONS['Option_ID']."' value='".$QUESTION_OPTIONS['Options']."'>
                    <label class='form-check-label' for='".$QUESTION_OPTIONS['Option_ID']."'>
                        ". $QUESTION_OPTIONS['Options']."
                    </label>
                </div>
                ";
            }
        }
        else{
            echo "Question_Type_ID not found in the database.";
        }
    }       
?>