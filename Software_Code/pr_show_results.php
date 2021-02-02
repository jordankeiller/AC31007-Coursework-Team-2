<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Quiz - Questionnaire Extraordinare</title>
  <link rel="stylesheet" href="assets/css/main.css">
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
            <a class="nav-link" aria-current="page" href="quiz.php">Quiz</a>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-outline-light" href="login.html">Log In</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container bg-white px-4">
    <div class="row">
      <div class="col">
        <?php
include "assets/php/GLOBAL_CONFIG.php";

// If not logged in (as Principal Researcher)
if(!isset($_SESSION['researcherType']) || $_SESSION['researcherType'] != 'PR') {
  header("Location: login.php");
  exit;
}

// Logged in as PR
else {

  $CURR_QUESTION = NULL; // Used for printing question names
  foreach ($_POST as $key => $value) {
    $FETCH_QUESTIONNAIRE_RESPONSES = "CALL `20agileteam2db`.`get_questions`(". $value .")";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTIONNAIRE_RESPONSES);
    $STMT->execute();
    $RESEARCHER_QUESTIONNAIRES = $STMT->fetchall();

    // For each answer in questionnaire
    foreach ($RESEARCHER_QUESTIONNAIRES as $row) {
      if ($row['Response'] != NULL) { // Open ended question
        echo $row['Description'] . "<br>";
        echo $row['Response']. "<br>";
      }

      else { // Select one of the following or tick all of the following
        if ($row["Question ID"] != $CURR_QUESTION) {
          $CURR_QUESTION = $row["Question ID"];
          echo $row['Description'] . "<br>";
        }
        $FETCH_QUESTION_OPTIONS = "CALL `20agileteam2db`.`options_for_question`(". $row['Question ID'] .")";
        $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_OPTIONS);
        $STMT->execute();
        $QUESTION_OPTIONS = $STMT->fetchall();

        // Check the option corresponding to Option_ID
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
?>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>