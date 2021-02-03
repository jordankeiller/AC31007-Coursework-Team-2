---
layout: default
title: Dashboard
---
<div class="container bg-white px-4">
  <div class="row">
    <div class="col">
      <?php
      include "assets/php/GLOBAL_CONFIG.php";
      //If not logged in
      if(!isset($_SESSION['researcherType'])) {
        header("location: login.php");
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
      <?php
      if($_SESSION['researcherType'] == 'PR'){ // Shown to Principal Researchers
      // Show all of the given PR's questionnaires
      $FETCH_RESEARCHER_QUESTIONNAIRES = "CALL `20agileteam2db`.`researcher_questionnaires`(".$_SESSION['userid'].")";
      $STMT = $MYSQL_CONNECTION->prepare($FETCH_RESEARCHER_QUESTIONNAIRES);
      $STMT->execute();
      $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall(); }
      ?>

      <h1 class="text-primary">Which questionnaire responses do you want to see?</h1>

      <!-- Dropdown to select questionnaire -->
      <form action="pr_show_results.php" method="POST">
        <label for="questionnaires">Questionnaire:</label>
        <select name="questionnaire" id="questionnaire">
          <?php foreach ($RESEARCHER_QUESTIONNAIRES as $ROW) {
            echo "<option name='". $ROW['Questionnaire ID'] . "' value='" . $ROW['Questionnaire ID'] . "'>" . $ROW['Questionnaire Name'] . "</option>";
          } ?>
        </select>
        <br><br>
        <input id="submit" name="submit" class="btn btn-lg btn-primary mt-0 mb-4" type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>