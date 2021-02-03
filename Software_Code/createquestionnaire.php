---
layout: createQuestionnaire
title: Questionnaire Creator
---
<!-- Questionniare Creator -->
<div class="container bg-white py-3 px-4">
  <div class="row">
    <div class="col">

      <h2 class="mb-4 text-primary fw-bold">Questionnaire Creator</h2>

      <!-- Textbox to store questionnaire name -->
      <div class="form-floating mb-3">
        <input type="text" id="questionnaire_title" class="form-control" placeholder="">
        <label>Enter the questionnaire name</label>
      </div>

      <div class="card">

        <!-- Header, button adds question to preview -->
        <div class="card-header pb-2">
          <h4 class="d-inline text-primary">Create a Question</h4>
          <button class="btn btn-primary float-end d-inline" onclick="createQuestion()">Add</button>
        </div>

        <div class="card-body">

          <!-- Textbox to store question name -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="question_input" placeholder="">
            <label for="question_input">Enter your question here</label>
          </div>

          <!-- Dropdown to choose input type -->
          <div class="form-floating">
            <select class="form-select" name="question_type" id="question_type" form="createQuiz"
              onchange="dropdownTypeChanged();">
              <?php include "assets/php/show_question_type.php"?>
            </select>
            <label for="floatingSelect">Choose input type</label>
          </div>

          <!-- Hidden div only shown when user selects multi select or option in dropdown -->
          <div class="mt-3" id="type_options" style="display: none;">
            <p>For "Tick all that apply" or "Pick one option" please enter the options below.</p>

            <!-- Textbox to enter options -->
            <div class="form-floating">
              <textarea class="form-control" id="options_input" placeholder=""
                style="height: 150px; min-height: 100px;"></textarea>
              <label for="option_text_field">Enter each option onto a new line.</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Created questions will be stored here -->
      <div class="mt-3" id="question_stack">
        <h2 class="mb-2 text-primary fw-bold">Questionnaire Preview</h2>
      </div>
    </div>

    <!-- Hidden Json input element will be stored in form before submission -->
    <form id="createQuiz" action="assets/php/check_question_type.php" method="post">
      <input id="submit" name="submit" class="btn btn-primary my-4" type="submit" value="Submit"
        onclick="return submitQuestionnaire()">
    </form>

  </div>
</div>
</div>