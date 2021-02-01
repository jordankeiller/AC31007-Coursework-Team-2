<?php


if (isset($_POST['questionnaire_title'])) {

    $CREATE_GET_PARTICIPANT = "INSERT INTO `participant` () VALUES ();";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();

    // Gets the newly created participant id used to submit responses.
    // This line has to be called separately or else there'll be a PDO problems.
    $CREATE_GET_PARTICIPANT = "SELECT LAST_INSERT_ID() as `id`;";
    $STMT_PARTICIPANT = $MYSQL_CONNECTION->prepare($CREATE_GET_PARTICIPANT);
    $STMT_PARTICIPANT->execute();
    $PARTICIPANT = $STMT_PARTICIPANT->fetchAll();
    $STMT_PARTICIPANT->closeCursor(); // Important so that PDO doesn't throw PDO bufferd query error.
    // Without this line the next query cannot run until all the results from the previous query have been fetched.
    // This line tells the server to stop sending and discard results.

    // Used to extract the participant id from the participant query output.
    $participant = -1;
    foreach ($PARTICIPANT as $val) {
        $participant = $val['id'];

        // If failed to get participant id. Then don't submit.
        if ($participant == -1) {
            echo "<br><br><h1>Submission Attempt Failed.</h1><br><br><p>Error: Failed to get participant id.</p>";
            die();
        }
    }





    echo $_POST['questionnaire_title'];
}
