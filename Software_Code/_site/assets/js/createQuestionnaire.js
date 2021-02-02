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

  if (document.getElementById("question_type").value == "Text") {
    toggleElement('type_text', true);
    toggleElement('type_number', false);
    toggleElement('type_multi_select', false);
    toggleElement('type_option', false);
  }
  else if (document.getElementById("question_type").value == "Whole Number") {
    toggleElement('type_text', false);
    toggleElement('type_number', true);
    toggleElement('type_multi_select', false);
    toggleElement('type_option', false);
  }
  else if (document.getElementById("question_type").value == "Tick all that apply") {
    toggleElement('type_text', false);
    toggleElement('type_number', false);
    toggleElement('type_multi_select', true);
    toggleElement('type_option', false);
  }
  else if (document.getElementById("question_type").value == "Pick one option") {
    toggleElement('type_text', false);
    toggleElement('type_number', false);
    toggleElement('type_multi_select', false);
    toggleElement('type_option', true);
  }
}

dropdownTypeChanged();