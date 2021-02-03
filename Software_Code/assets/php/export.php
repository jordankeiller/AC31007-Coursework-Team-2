<?php
    // including the config file
    include('GLOBAL_CONFIG.php');

    // set headers to force download on csv format
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=users.csv');

    // we initialize the output with the headers
    $output = "Researcher_ID,Name,Researcher_Type\n";
    
    // select all members
    $sql = 'SELECT * FROM researcher ORDER BY Researcher_ID ASC';
    $query = $MYSQL_CONNECTION->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();

    // Loops through each row.
    foreach ($list as $rs) {
        // add new row
        $row = array();

        $row[] = stripslashes($rs["Researcher_ID"]);
        $row[] = stripslashes($rs["Name"]);
        $row[] = stripslashes($rs["Researcher_Type"]);

        // Appends the row data into the output file.
        $output .= $rs["Researcher_ID"] ."," .$rs["Name"] ."," .$rs["Researcher_Type"] ."\n";
    }
    // export the output
    echo $output;
    exit;
?>
