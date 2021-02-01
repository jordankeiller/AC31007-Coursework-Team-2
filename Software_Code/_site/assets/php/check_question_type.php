<?php
    include "GLOBAL_CONFIG.php";

    if(isset($_POST['response1'])){
        echo "<strong>SUBMITTED RESPONSE:</strong><br>" . $_POST['response1'];
    }

    $FETCH_QUESTION_TYPE = "SELECT * FROM 20agileteam2db.question_types";
    $STMT = $MYSQL_CONNECTION->prepare($FETCH_QUESTION_TYPE);
    $STMT->execute();
    $RESULT = $STMT->fetchAll();

    echo "<br>";
    foreach($RESULT as $row){
        echo "<br>".$row['Name'];
    }

    printf("<br>uniqid(): %s\r\n", uniqid());


?>