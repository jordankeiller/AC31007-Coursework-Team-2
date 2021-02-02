<?php
include "GLOBAL_CONFIG.php";

echo $_SESSION['researcherType'];

  //If not logged in
  if(!isset($_SESSION['researcherType'])) {
    header("location: ../../login.php");
    exit;
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
      $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall(); } ?>

      <p>Which questionnaire responses would you like to see?</p>

      <form action="pr_show_results.php" method="POST">
        <label for="questionnaires">Questionnaire:</label>
        <select name="questionnaire" id="questionnaire">
           <?php foreach ($RESEARCHER_QUESTIONNAIRES as $ROW) {
            echo "<option name='". $ROW['Questionnaire ID'] . "' value='" . $ROW['Questionnaire ID'] . "'>" . $ROW['Questionnaire Name'] . "</option>";
          } ?>
        </select>
        <br><br>
        <input type="submit" value="Submit">
      </form>


  </body>
</html>
