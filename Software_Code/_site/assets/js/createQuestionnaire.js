let questionnaireJson = {}; // Will store question, tpye and options.

// Sets the dropdown value to text as default.
document.getElementById("question_type").value = "Text";
dropdownTypeChanged();

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
    toggleElement("type_options", true);
  } else if (
    document.getElementById("question_type").value == "Pick one option"
  ) {
    toggleElement("type_options", true);
  } else {
    toggleElement("type_options", false);
  }
}

// Displays the question and its attributes and input type. Also stores it in 'questionnareJson'.
function createQuestion() {
  // Gets the trims question input.
  let questionName = document.getElementById("question_input").value.trim();

  // If question is empty, send alert and don't do anything else.
  if (questionName == "") {
    alert("Please enter a question.");
    return;
  }

  let responseJson = {}; // Creates object for response attributes.
  const dropdownValue = document.getElementById("question_type").value; // Gets dropdown value.

  let response = document.createElement("div"); // Allows to display input.

  if (dropdownValue == "Text") {
    // Creates attributes relevant to text input and displays in preview.
    responseJson.type = "1";
    responseJson.options = null;
    response.innerHTML = '<textarea class="form-control"></textarea>';
  } else if (dropdownValue == "Whole Number") {
    // Creates attributes relevant to number input and displays in preview.
    responseJson.type = "2";
    responseJson.options = null;
    response.innerHTML = '<input type="number" class="form-control" value="0">';
  }
  // Creates attributes relevant to multi select input and displays in preview.
  else if (dropdownValue == "Tick all that apply") {
    responseJson.type = "3";
    let optionsArray = []; // To store user options.

    // Get input from options text box, sanitizes it and loops through each line.
    var lines = sanitiseOptionsInput(
      document.getElementById("options_input").value.split("\n")
    );
    if (lines.length <= 0) {
      alert(
        "You have either left the options field empty or they contain duplicates."
      );
      return;
    }

    for (var i = 0; i < lines.length; i++) {
      // Adds line to array and displays option.
      optionsArray.push(lines[i]);
      response.innerHTML +=
        '<div class="form-check"><input class="form-check-input" type="checkbox" disabled><label class="form-check-label">' +
        lines[i] +
        "</label></div>";
    }

    responseJson.options = optionsArray; // Stores options.
  }
  // Creates attributes relevant to text input and displays in preview.
  else if (dropdownValue == "Pick one option") {
    responseJson.type = "4";
    let optionsArray = []; // To store user options.

    // Get input from options text box, sanitizes it and loops through each line.
    var lines = sanitiseOptionsInput(
      document.getElementById("options_input").value.split("\n")
    );
    if (lines.length <= 0) {
      alert(
        "You have either left the options field empty or they contain duplicates."
      );
      return;
    }

    for (var i = 0; i < lines.length; i++) {
      // Adds line to array and displays option.
      optionsArray.push(lines[i]);
      response.innerHTML +=
        '<div class="form-check"><input class="form-check-input" type="radio" disabled><label class="form-check-label">' +
        lines[i] +
        "</label></div>";
    }

    responseJson.options = optionsArray; // Stores options.
  } else {
    alert("Invalid question input type.");
    return;
  }

  // Saves question and response atributes.
  questionnaireJson[questionName] = responseJson;

  // Previews question and response by creating html elements.
  let previewQuestion = document.createElement("div");
  previewQuestion.className = "my-4";
  let question = document.createElement("h4");
  question.innerText = questionName;

  previewQuestion.appendChild(question);
  previewQuestion.appendChild(response);
  document.getElementById("question_stack").appendChild(previewQuestion);

  // Clears the textbox inputs.
  document.getElementById("question_input").value = "";
  document.getElementById("options_input").value = "";
}

// Sanitizes the array used for options. Takes in the array to be sanitized and returns the sanitized array.
function sanitiseOptionsInput(array) {
  let newArray = [];

  // Checks if input is an array.
  if (Array.isArray(array) == false) {
    return newArray;
  }

  // Trims lines in the array.
  for (let i = 0; i < array.length; i++) {
    array[i] = array[i].trim();
  }

  // Removes leading and following whitespaces.
  for (let i = 0; i < array.length; i++) {
    // If the line isn't empty.
    if (array[i] != "") {
      newArray.push(array[i]);
    }
  }

  newArray = [...new Set(newArray)]; // Removes duplicates
  console.log(newArray);
  return newArray;
}

// Called when the user attempts to submit the questionnaire.
function submitQuestionnaire() {
  // Gets and trims title.
  let title = document.getElementById("questionnaire_title").value.trim();

  // Cancel submit if quesitonnaire title is empty.
  if (document.getElementById("questionnaire_title").value == "") {
    alert("Questionnaire title cannot be empty.");
    return;
  }

  // Cancel submit if there are no questions.
  if (Object.keys(questionnaireJson).length <= 0) {
    alert("You cannot submit an empty questionnaire.");
    return;
  }

  questionnaireJson.Title = title; // Saves title

  // Creates a hidden text box input to store value of 'questionnareJson' so that php receives it.
  let submitElement = document.createElement("input");
  submitElement.value = JSON.stringify(questionnaireJson);
  submitElement.type = "text";
  submitElement.setAttribute("name", "question_json");
  submitElement.style = "display: none";
  document.getElementById("createQuiz").appendChild(submitElement);

  console.log(questionnaireJson);
}
