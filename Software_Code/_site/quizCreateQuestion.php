<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Home - Questionnaire Extraordinare</title>
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
        <div>
          <button class="btn btn-primary" onclick="createQuestion()">Add Text Question</button>
          <form id="newForm" action="">
            <input id="submit" name="submit" class="btn btn-lg btn-primary my-4" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function createQuestion() {
      var newDiv = document.createElement("DIV");
      newDiv.className = "text-primary";
      var newQuestion = document.createElement("INPUT");
      newQuestion.className = "form-control";
      newQuestion.setAttribute("type", "text");
      newQuestion.setAttribute("placeholder", "Question Title");
      var newAnswer = document.createElement("INPUT");
      newAnswer.className = "form-control";
      newAnswer.setAttribute("type", "text");
      newAnswer.setAttribute("placeholder", "Question Answer Will Go Here");
      newDiv.appendChild(newQuestion);
      newDiv.appendChild(newAnswer);
      document.getElementById("newForm").appendChild(newDiv);
    }
  </script>
  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>