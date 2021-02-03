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

        <div class="mt-3">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="question_input" placeholder="">
            <label for="question_input">Enter your question here.</label>
          </div>

          <div class="mb-3">
            <label for="createQuiz">Choose a question input type:</label>
            <select name="question_type" id="question_type" form="createQuiz" onchange="dropdownTypeChanged();"><?php include "assets/php/show_question_type.php"?></select>
          </div>

          <div class="card mt-3" id="type_options" style="display: none;">
            <div class="card-body">
              <div class="form-floating">
                <textarea class="form-control" id="multi_select_input" placeholder="" rows="5" style="height: 100px"></textarea>
                <label for="option_text_field">Enter each option on a new line.</label>
              </div>
            </div>
          </div>

          <button class="btn btn-primary" onclick="createQuestion();">Add Question</button>
        </div>

        <form class="mt-3" id="createQuiz" action="assets/php/check_question_type.php" method="post">

          <!-- Created questions will be stored here -->
          <div class="col" id="question_stack">
            <h2 class="mb-2">Questionnaire Preview</h2>
          </div>

          <input id="submit" name="submit" class="btn btn-primary my-4" type="submit" value="Submit">
        </form>

      </div>
    </div>
  </div>

  <script type="text/template" id="template_text">
    <div class="form-floating">
      <textarea class="form-control" placeholder="text here" style="height: 100px"></textarea>
      <label for="option_text_field">Text</label>
    </div>
  </script>

  <script type="text/template" id="template_number">
    <div class="form-floating">
      <input type="number" class="form-control" value="0">
      <label for="option_number_field">Number</label>
    </div>
  </script>

  <script type="text/javascript">
    function createQuestion() {

      if (document.getElementById('question_input').value == '') {
        alert('Please enter a question.')
        return;
      }

      let dropdownValue = document.getElementById("question_type").value;
      var response = document.createElement('div');
      
      if (dropdownValue == "Text") {

        response.innerHTML = document.getElementById('template_text').innerHTML;
      }
      else if (dropdownValue == "Whole Number") {

        response.innerHTML = document.getElementById('template_number').innerHTML;
      }
      else if (dropdownValue == "Tick all that apply") {

        var lines = document.getElementById('multi_select_input').value.split('\n');
        
        for(var i = 0;i < lines.length;i++){
          
          if (lines[i] != '') {
            response.innerHTML += '<div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">' + lines[i] + '</label></div>';
          }
        }

      }
      else if (dropdownValue == "Pick one option") {
        
        var lines = document.getElementById('multi_select_input').value.split('\n');
        
        for(var i = 0;i < lines.length;i++){
          
          if (lines[i] != '') {
            response.innerHTML += '<div class="form-check"><input class="form-check-input" type="radio" disabled><label class="form-check-label">' + lines[i] + '</label></div>';
          }
        }

      }
      else {
        alert('Invalid question option type.');
        return;
      }

      var element = document.createElement('div');
      element.className = "my-4";
      var question = document.createElement('h3');
      question.innerText = document.getElementById('question_input').value;

      element.appendChild(question);
      element.appendChild(response);
      document.getElementById('question_stack').appendChild(element);

      document.getElementById('question_input').value = '';
      document.getElementById('multi_select_input').value = '';

      
    }

    var test = 
      {
        "Question Name":
        {
          "type":1,
          "options":null
        },
        "Question Name 2":
        {
          "type":3,
          "options":["Option 1", "Option 2"]
        }
      };

      let stringified = JSON.stringify(test);

      let testDiv = document.createElement('div');
      testDiv.style = "display: none";
      let testString = document.createElement('p');
      testString.innerText = stringified;
      testString.setAttribute("name", "testJson");

      testDiv.appendChild(testString);
      document.getElementById('question_stack').appendChild(testDiv);

  </script>

  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/createQuestionnaire.js"></script>
</body>

</html>