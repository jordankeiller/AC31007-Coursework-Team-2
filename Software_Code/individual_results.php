<?php

include "assets/php/GLOBAL_CONFIG.php";

$CURR_QUESTION = NULL; // Used for printing question names
foreach ($_POST as $key => $value) {

  if ($key != "submit")
  {
    $FETCH_QUESTIONNAIRE_RESPONSES = "SELECT * FROM questionnaire_responses WHERE Participant_ID = ".$value." GROUP BY Response_ID ORDER BY Participant_ID, Question_ID";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTIONNAIRE_RESPONSES);
    $STMT->execute();
    $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall();
    // For each answer in questionnaire
    foreach ($RESEARCHER_QUESTIONNAIRES as $row) {
      if ($row['Response'] != NULL) { // Open ended question
        if ($row["Question_ID"] != $CURR_QUESTION){
          $CURR_QUESTION = $row["Question_ID"];
          // echo $row['Description'] . "<br>";
          //echo "<h3 class='text-primary mt-3 mb-1'>" . $row['Description'] . "</h3>";
        }
        echo $row['Response']. "<br>";
      }
      else { // Select one of the following or tick all of the following
        if ($row["Question_ID"] != $CURR_QUESTION) {
          $CURR_QUESTION = $row["Question_ID"];
          //echo "<h3 class='text-primary mt-3 mb-1'>" . $row['Description'] . "</h3>";
        }
        $FETCH_QUESTION_OPTIONS = "CALL `20agileteam2db`.`options_for_question`(". $row['Question_ID'] .")";
        $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_OPTIONS);
        $STMT->execute();
        $QUESTION_OPTIONS = $STMT->fetchall();
        // Check the option corresponding to Option_ID
        foreach ($QUESTION_OPTIONS as $result) {
          if ($result['Option_ID'] == $row['Question_Option_ID']) {
            echo $result['Options'];
          }
        }
        echo "<br>";
      }
    }
  }
  else {
    echo "";
  }
}

?>
