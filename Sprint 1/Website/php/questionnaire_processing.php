<?php
 
include "__GLOBAL_CONFIG__.PHP";
 
if (isset($_POST['submit'])){
 
    $CREATE_GET_PARTICIPANT = "INSERT INTO `participant` () VALUES ();";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();
    
    $CREATE_GET_PARTICIPANT = "SELECT LAST_INSERT_ID() as `id`;";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();
    $PARTICIPANT = $STMT_PARTICIPANT->fetch();
    
    foreach($_POST as $key => $value){
        if($key != "submit"){
            $SQL_QUERY_QUESTIONS_OPTIONS = "CALL 20agileteam2db.get_question_option(".$key.", '".$value."');";
            $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($SQL_QUERY_QUESTIONS_OPTIONS);
            $STMT_OPTIONS->execute();
            $RESULT_OPTIONS = $STMT_OPTIONS->fetchAll();
        
            foreach($RESULT_OPTIONS as $row){
                echo $key."<br>".$row['Question_Option_ID']."<br>".$value."<br><br>";
 
                $insert = "CALL 20agileteam2db.add_response(".$key.",".$row['Question_Option_ID'].", ".$PARTICIPANT[0].", NULL)";
                $STMT_OPTIONS = $MYSQL_CONNECTION->prepare($insert);
                $STMT_OPTIONS->execute();
            }
        }
        else{
            echo "";
        }
        // echo "<li>$key: $value</li>";
    }
}
?>