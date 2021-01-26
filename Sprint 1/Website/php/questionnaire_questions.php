<?php
    $query = "SELECT * FROM `questionnaire_questions`";
    $stmt = $MYSQL_CONNECTION->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $row) {
        echo "<tr>";
            if($row['Questionnaire_Type'] == "option"){
                echo "<th scope=\"row\">" . $row['Question_Description'] . "</th><br>";
                $query2 = "CALL 20agileteam2db.options_for_question(".$row['Question_ID'].")";
                $stmt1 = $MYSQL_CONNECTION->prepare($query2);
                $stmt1->execute();
                $result2 = $stmt1->fetchAll();
                foreach($result2 as $row2){
                    echo $row2['Options'] . "<br>";
                }
            }
        echo "</tr>";
    }       
?>