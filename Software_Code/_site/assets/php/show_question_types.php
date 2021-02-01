<?php
    include "GLOBAL_CONFIG.php";

    $FETCH_QUESTION_TYPE = "SELECT * FROM 20agileteam2db.question_types";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_TYPE);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();

    foreach ($RESULT as $QUESTION_TYPE) {
        echo "<option id='".$QUESTION_TYPE['Question_Type_ID']."' value='" . $QUESTION_TYPE['Name'] . "'>" . $QUESTION_TYPE['Name'] . "</option>";
    }
?>