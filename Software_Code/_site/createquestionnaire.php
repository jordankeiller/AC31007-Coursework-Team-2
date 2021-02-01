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
  <?php
    include "assets/php/GLOBAL_CONFIG.php";
?>
<div class="container bg-white px-4">
    <div class="row">
        <div class="col">
            <h1 class="text-primary fw-bold mt-3 mb-0">Understanding Subtitle Usage</h1>
            <select>

              <?php
                include "assets/php/GLOBAL_CONFIG.php";

                $FETCH_QUESTION_TYPE = "SELECT * FROM 20agileteam2db.question_types";
                $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_TYPE);
                $STMT->execute();
                $RESULT = $STMT->fetchAll();

              foreach ($RESULT as $QUESTION_TYPE) {
                echo "<option name='".$QUESTION_TYPE['Question_Type_ID']."' value='" . $QUESTION_TYPE['Name'] . "'>" . $QUESTION_TYPE['Name'] . "</option><br>";
              }
              ?>
            </select>
        </div>
    </div>
</div>
  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>