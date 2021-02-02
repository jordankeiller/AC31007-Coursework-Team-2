<?php
    session_start();
    include "GLOBAL_CONFIG.php";
 
    $QUESTION_JSON;
 
    foreach($_POST as $key => $value){
 
        // echo $key . ": ". $value ."<br>";
        // if($key == 1){
        //     $insertText = "CALL `20agileteam2db`.`create_question`(".$_SESSION['QuestionnaireID'].", '".$value."', 1)";
        //     $STMT_ENTRY = $MYSQL_CONNECTION->prepare($insertText);
        //     $STMT_ENTRY->execute();
        // }
 
        if ($key == 'question_json') {
            $QUESTION_JSON = json_decode($value, true);
            foreach ($QUESTION_JSON as $IDENTIFIER => $VARIABLE) {
                if ($IDENTIFIER == 'Title') {
                    echo "<br>Title: " . $VARIABLE;
                }else {
                    echo "<br>Question: " . $IDENTIFIER;
                    echo "<br>Type: " . $VARIABLE['type'];
                    if ($VARIABLE['options'] == null) {
                        echo "<br>No options";
                    }else{
                        // echo "<br>Type: " . $VARIABLE['options'];
                        foreach ($VARIABLE['options'] as $key) {
                            echo "<br>Option Name: " .$key;
                        }
                    }
                }
            }
        }else{
            echo "";
        }
    }
 
    if(isset($_POST['question_type'])){
        echo "<strong>SUBMITTED RESPONSE:</strong><br>" . $_POST['question_type'];
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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    include "destroy_session.php";
