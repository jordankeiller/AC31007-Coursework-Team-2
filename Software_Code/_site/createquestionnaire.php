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

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <h1 class="text-primary fw-bold mt-3 mb-0">Create Questionnaire</h1>
      </div>
      <div class="row">
        <div class="col">
<<<<<<< HEAD
            <h1 class="text-primary fw-bold mt-3 mb-0">Create Questionnaire</h1>
        </div>
        <div class="row">
            <div class="col">
                
                <label for="createQuiz">Choose a Question Type:</label>
                <select name="question_type" id="question_type" form="createQuiz"><?php include "assets/php/show_question_type.php" ?></select>

                <form id="createQuiz" action="assets/php/check_question_type.php" method="post">
                    <input type="submit" name="submit">
                </form>

                <div class="card mt-3" id="type_text" style="display: none;">
                  <div class="card-body">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="text here" id="type_text_field" style="height: 100px"></textarea>
                      <label for="option_text_field">Text</label>
                    </div>
                  </div>
                </div>

                <div class="card mt-3" id="type_number" style="display: none;">
                  <div class="card-body">
                    <div class="mb-3">
                      <div class="form-floating">
                        <input type="number" class="form-control" id="type_number_field" placeholder="Password">
                        <label for="option_number_field">Number</label>
                      </div>
                    </div>
                  </div>
=======

          <label for="createQuiz">Choose a Question Type:</label>
          <select name="question_type" id="question_type" form="createQuiz"><?php include "assets/php/show_question_types.php" ?></select>

          <form id="createQuiz" action="assets/php/check_question_type.php" method="post">
            <input type="submit" name="submit">
          </form>

          <div class="card mt-3" id="type_text" style="display: none;">
            <div class="card-body">
              <div class="form-floating">
                <textarea class="form-control" placeholder="text here" id="type_text_field" style="height: 100px"></textarea>
                <label for="option_text_field">Text</label>
              </div>
            </div>
          </div>

          <div class="card mt-3" id="type_number" style="display: none;">
            <div class="card-body">
              <div class="mb-3">
                <div class="form-floating">
                  <input type="number" class="form-control" id="type_number_field" placeholder="Password">
                  <label for="option_number_field">Number</label>
>>>>>>> e881b46898b989451483f9d747434208a1b362c6
                </div>
              </div>
            </div>
          </div>

          <div class="card mt-3" id="type_multi_select" style="display: none;">
            <div class="card-body">
              <div class="mb-3">
                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <input class="form-check-input" type="checkbox">
                  </div>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="card mt-3" id="type_option" style="display: none;">
            <div class="card-body">
              <div class="mb-3">
                <div class="input-group">
                  <div class="input-group-text">
                    <input class="form-check-input" type="radio" value="">
                  </div>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/createQuestionnaire.js"></script>
</body>

</html>