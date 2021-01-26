<?php
    $SQL_QUERY_QUESTIONS = "SELECT * FROM `questionnaire_questions`";
    $STMT = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();
    foreach ($RESULT as $QUESTION) {

        // Displays the question
        echo "<h3>" . $QUESTION['Question_Description'] . "</h3>";

        // If the question has multipile options, fetch those options
        $SQL_QUERY_QUESTIONS_OPTIONS = "CALL 20agileteam2db.options_for_question(".$QUESTION['Question_ID'].")";
        $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS_OPTIONS);
        $STMT_OPTIONS->execute();
        $RESULT_OPTIONS = $STMT_OPTIONS->fetchAll();

        // If the question requires a text answer
        if($QUESTION['Question_Type_ID'] == "1"){ 
            echo "
                <div class='form-group'>
                    <textarea class='form-control' id='exampleFormControlTextarea1' rows='2'></textarea>
                </div>   
            ";
        }

        // If the question requires a number answer
        if($QUESTION['Question_Type_ID'] == "2"){ 
            echo "
                <div class='form-group'>
                    <input type='number'>
                </div>   
            "; 
        }
        
        // If the question requires a "check all that apply" answer (multi-select)
        if($QUESTION['Question_Type_ID'] == "3"){ 
            $OPTION_COUNTER = 1;
            
            foreach($RESULT_OPTIONS as $QUESTION_OPTIONS){
                $OPTION = "option" . $OPTION_COUNTER;
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' name='radio".$QUESTION['Question_ID']."' id='".$QUESTION_OPTIONS['Option_ID']."' value='".$OPTION."'>
                    <label class='form-check-label' for='".$QUESTION_OPTIONS['Option_ID']."'>
                        ". $QUESTION_OPTIONS['Options']."
                    </label>
                </div>
                ";
                $OPTION_COUNTER++;

            }
        }

        // If the question requires one answer from a list of possible answers
        if($QUESTION['Question_Type_ID'] == "4"){ 
            $OPTION_COUNTER = 1;
            foreach($RESULT_OPTIONS as $QUESTION_OPTIONS){
                $OPTION = "option" . $OPTION_COUNTER;
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='radio".$QUESTION['Question_ID']."' id='".$QUESTION_OPTIONS['Option_ID']."' value='".$OPTION."'>
                    <label class='form-check-label' for='".$QUESTION_OPTIONS['Option_ID']."'>
                        ". $QUESTION_OPTIONS['Options']."
                    </label>
                </div>
                ";
                $OPTION_COUNTER++;
            }
        }
    }       
?>