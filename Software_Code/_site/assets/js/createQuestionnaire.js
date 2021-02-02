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
  }
  document.getElementById('question_input').value = '';
  document.getElementById('options_input').value = '';
}

dropdownTypeChanged();