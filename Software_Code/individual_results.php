<?php

include "assets/php/GLOBAL_CONFIG.php";

if(!isset($_SESSION['researcherType'])) {
  header("location: login.php");
  exit;
}

$CURR_QUESTION = NULL; // Used for printing question names
foreach ($_POST as $key => $value) {

  if ($key != "submit")
  {
    $FETCH_QUESTIONNAIRE_RESPONSE = "CALL `20agileteam2db`.`get_participant_questionnaire_response`(".$_POST['participant'].")";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTIONNAIRE_RESPONSE);
    $STMT->execute();
    $PARTICIPANT_RESPONSE = $STMT->fetchall();
    // For each answer in questionnaire
    foreach ($PARTICIPANT_RESPONSE as $row) {
      if ($row['Response'] != NULL) { // Open ended question
        if ($row["Question_ID"] != $CURR_QUESTION){
          $CURR_QUESTION = $row["Question_ID"];
          echo $row['Question_Description'] . "<br>";
        }
        echo $row['Response']. "<br>";
      }
      else { // Select one of the following or tick all of the following
        if ($row["Question_ID"] != $CURR_QUESTION) {
          echo $row['Question_Description'] . "<br>";
          $CURR_QUESTION = $row["Question_ID"];
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

<!-- Back button, posts required questionnaire value. -->
<form action="pr_show_results.php" method="POST">
<?php echo "<button name='questionnaire' type='submit' value='" .$_SESSION['currQnaire']. "'>Back</button>";
?>
</form>
