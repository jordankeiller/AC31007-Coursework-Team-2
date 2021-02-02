<?php

include "GLOBAL_CONFIG.php";

if(!isset($_SESSION['researcherType'])) {
  header("Location: ../../login.php");
  exit;
}

else {

  $CURR_QUESTION = NULL;
  foreach ($_POST as $key => $value) {
    $FETCH_QUESTIONNAIRE_RESPONSES = "CALL `20agileteam2db`.`get_questions`(". $value .")";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTIONNAIRE_RESPONSES);
    $STMT->execute();
    $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall();

    foreach ($RESEARCHER_QUESTIONNAIRES as $row) {
      if ($row['Response'] != NULL) {
        echo $row['Description'] . "<br>";
        echo $row['Response']. "<br>";
      }

      else {
        if ($row["Question ID"] != $CURR_QUESTION) {
          $CURR_QUESTION = $row["Question ID"];
          echo $row['Description'] . "<br>";
        }
        $FETCH_QUESTION_OPTIONS = "CALL `20agileteam2db`.`options_for_question`(". $row['Question ID'] .")";
        $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_OPTIONS);
        $STMT->execute();
        $QUESTION_OPTIONS = $STMT->fetchall();

        foreach ($QUESTION_OPTIONS as $result) {
          if ($result['Option_ID'] == $row['Option ID']) {
            echo $result['Options'];
          }
        }
        echo "<br>";
      }

    }
  }

}

// foreach ($_POST as $key => $value) {
//   $FETCH_QUESTIONNAIRE_RESPONSES = "CALL `20agileteam2db`.`get_questions`(". $value .")";
//   $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTIONNAIRE_RESPONSES);
//   $STMT->execute();
//   $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall();
//
//   foreach ($RESEARCHER_QUESTIONNAIRES as $row) {
//     if ($row['Response'] != NULL) {
//       echo $row['Response']. "<br>";
//     }
//     else {
//       $FETCH_QUESTION_OPTIONS = "CALL `20agileteam2db`.`options_for_question`(". $row['Question ID'] .")";
//       $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_OPTIONS);
//       $STMT->execute();
//       $QUESTION_OPTIONS = $STMT->fetchall();
//
//       foreach ($QUESTION_OPTIONS as $result) {
//         if ($result['Option_ID'] == $row['Option ID']) {
//           echo $result['Options']. "<br>";
//         }
//       }
//     }
//   }
// }

?>
