let questionnaireJson = {}; // Will store question, tpye and options.
// Shows or hides specified element. Takes in the element id and boolean value. True to show the element and false to hide it.
function toggleElement(id, bool) {
  if (bool) {
    document.getElementById(id).style.display = "block";
  } else {
    document.getElementById(id).style.display = "none";
  }
}

// Shows/hides options based on dropdown selection.
function dropdownTypeChanged() {

  if (document.getElementById("question_type").value == "Tick all that apply") {
    toggleElement('type_options', true);
  }
  else if (document.getElementById("question_type").value == "Pick one option") {
    toggleElement('type_options', true);
  }
  else {
    toggleElement('type_options', false);
  }
function createQuestion() {
 
  let questionName = document.getElementById('question_input').value; // Gets the question input.
  
  // If question is empty, alert and don't do anything.
  if (questionName == '') {
    alert('Please enter a question.')
    return;
  }
  if (dropdownValue == "Text") {

    // Creates attributes relevant to text input and displays in preview.
    response.innerHTML = '<textarea class="form-control"></textarea>';

  }
  else if (dropdownValue == "Whole Number") {

    response.innerHTML = '<input type="number" class="form-control" value="0">';

  }
  else if (dropdownValue == "Tick all that apply") {

    let optionsArray = []; // To store user options.
    var lines = document.getElementById('options_input').value.split('\n'); 
    for(var i = 0;i < lines.length;i++){
      if (lines[i] != '') {

        response.innerHTML += '<div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">' + lines[i] + '</label></div>';
      }
    }
  }
  // Creates attributes relevant to text input and displays in preview.
  else if (dropdownValue == "Pick one option") {
    let optionsArray = []; // To store user options.
    var lines = document.getElementById('options_input').value.split('\n');
    for(var i = 0;i < lines.length;i++){
      
      // If line isn't empty.
      if (lines[i] != '') {

        response.innerHTML += '<div class="form-check"><input class="form-check-input" type="radio" disabled><label class="form-check-label">' + lines[i] + '</label></div>';
      }
    }

  }
  else {
    alert('Invalid question input type.');
    return;
  }
  // Previews question and response by creating html elements.
  let previewQuestion = document.createElement('div');
  previewQuestion.className = "my-4";
  let question = document.createElement('h4');
  question.innerText = questionName;

  previewQuestion.appendChild(question);
  previewQuestion.appendChild(response);
  document.getElementById('question_stack').appendChild(previewQuestion);
  document.getElementById('question_input').value = '';
  document.getElementById('options_input').value = '';
}

dropdownTypeChanged();function submitQuestionnaire() {
function submitQuestionnaire() {

  // Cancel submit if quesitonnaire title is missing.
  if (document.getElementById('questionnaire_title').value == '') {
    alert('Questionnaire title cannot be empty.')
    return;
  }

  // Cancel submit if there are no questions.
  if (Object.keys(questionnaireJson).length <= 0) {
    alert('You cannot submit an empty questionnaire.')
    return;
  }
  
  questionnaireJson.Title = document.getElementById('questionnaire_title').value; // Saves title

