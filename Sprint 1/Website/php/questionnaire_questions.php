<?php
    $SQL_QUERY_QUESTIONS = "SELECT * FROM `questionnaire_questions`";
    $STMT = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();
    foreach ($RESULT as $QUESTION) {
        echo "<tr>";
            if($QUESTION['Questionnaire_Type'] == "option"){

                // Displays the question
                echo "<h3>" . $QUESTION['Question_Description'] . "</h3>";

                // If the question has multipile options, display those options too
                $SQL_QUERY_QUESTIONS_OPTIONS = "CALL 20agileteam2db.options_for_question(".$QUESTION['Question_ID'].")";
                $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS_OPTIONS);
                $STMT_OPTIONS->execute();
                $RESULT_OPTIONS = $STMT_OPTIONS->fetchAll();
                foreach($RESULT_OPTIONS as $QUESTION_OPTIONS){
                    echo $QUESTION_OPTIONS['Options'] . "<br>";
                }
            }
        echo "</tr>";
    }       
?>