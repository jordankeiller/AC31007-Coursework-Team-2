---
layout: default
title: Quiz
---
<?php
include "assets/php/GLOBAL_CONFIG.php";
?>
<div class="container bg-white px-4">
    <div class="row">
        <div class="col">
            <h1 class="text-primary fw-bold mt-3 mb-0">Understanding Subtitle Usage</h1>
            <form class="px-1" action="assets/php/questionnaire_processing.php" method="post">
                <?php include "assets/php/questionnaire_questions.php" ?>
                <input id="submit" name="submit" class="btn btn-lg btn-primary my-4" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>