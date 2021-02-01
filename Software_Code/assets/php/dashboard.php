<?php
include "GLOBAL_CONFIG.php";

  //If not logged in
  if(!isset($_SESSION['researcherType'])) {
    header("location: ../../login.php");
  }
  // elseif($_SESSION['researcherType'] == ){
  //
  // }
  //
  // elseif($_SESSION['researcherType'] == ){
  //
  // }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  </head>
  <body>

    <?php if($_SESSION['researcherType'] == 'PR'){ // Shown to Principal Researchers
      $FETCH_RESEARCHER_QUESTIONNAIRES = "CALL `20agileteam2db`.`researcher_questionnaires`(".$_SESSION['userid'].")";
      $STMT = $MYSQL_CONNECTION->prepare($FETCH_RESEARCHER_QUESTIONNAIRES);
      $STMT->execute();
      $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall();
      echo count($RESEARCHER_QUESTIONNAIRES);
      echo "<h1>hello principal</h1>";

        foreach ($RESEARCHER_QUESTIONNAIRES as $ROW) {
          echo "<button type='button'>" . $ROW['Questionnaire Name'] . "</button>";
        }

    } ?>
  </body>
</html>
