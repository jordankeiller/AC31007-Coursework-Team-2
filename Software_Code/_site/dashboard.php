<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Dashboard - Questionnaire Extraordinare</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/consentStyleSheet.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container px-4">
    <a class="navbar-brand" href="index.html">Questionnaire Extraordinare</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.html">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" aria-current="page" href="createquestionnaire.php">Quiz Creator</a>
        </li>
      </ul>
      <div class="d-flex">
        <a class="btn btn-outline-light" href="login.php">Log In</a>
      </div>
    </div>
  </div>
</nav>
  <div class="container bg-white px-4 py-2">
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

      elseif($_SESSION['researcherType'] == 'Lab Manager'){ // Shown to Lab Managers

      // Links to other lab manager pages such as manage_login and manage_researchers.
      echo '<a href="manage_researchers.php" class="btn btn-primary me-2">Manage Researchers</a><a href="manage_login.php" class="btn btn-primary">Manage Logins</a>';
      
      // Show all questionnaires
      $FETCH_RESEARCHER_QUESTIONNAIRES = "SELECT * FROM `20agileteam2db`.`all_questionnaires`";
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

      <form action="assets/php/export.php">
        <!-- Export Function -->
        <button class="btn btn-lg btn-primary mt-0 mb-4">Export Data</button>
      </form>
    </div>
  </div>
</div>

  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/hideOverlay.js"></script>
</body>

</html>