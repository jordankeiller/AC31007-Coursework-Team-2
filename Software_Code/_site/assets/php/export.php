<?php
    // including the config file
    include('GLOBAL_CONFIG.php');

    // set headers to force download on csv format
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=questionnaire_responses.csv');

    // we initialize the output with the headers
    $output = "Question_ID;Question_Option_ID;Response;Participant_ID\n";
    
    // select all responses
    $sql = 'SELECT * FROM questionnaire_responses GROUP BY Response_ID ORDER BY Participant_ID, Question_ID;';
    $query = $MYSQL_CONNECTION->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();

    // Loops through each row.
    foreach ($list as $rs) {

        if(isset($rs['Question_Option_ID'])){
            $sql1 = "SELECT * FROM questionnaire_questions_options WHERE Question_Option_ID =".$rs['Question_Option_ID'].";";
            $query1 = $MYSQL_CONNECTION->prepare($sql1);
            $query1->execute();
            $question_text = $query1->fetch();

            $REG_EXPRESSION_QUESTION_OPTION = filter_var($question_text['Question_Option_Description'], FILTER_SANITIZE_STRING);

            $output .= $rs["Question_ID"] .";" .$REG_EXPRESSION_QUESTION_OPTION ."; NULL;".$rs['Participant_ID'] ."\n";
        } else{
            $REG_EXPRESSION_QUESTION_OPTION = filter_var($rs["Response"], FILTER_SANITIZE_STRING);

            $output .= $rs["Question_ID"] ."; NULL;" .$REG_EXPRESSION_QUESTION_OPTION.";".$rs['Participant_ID'] ."\n";
        }
    }
    // export the output
    echo $output;
    exit;
?>
