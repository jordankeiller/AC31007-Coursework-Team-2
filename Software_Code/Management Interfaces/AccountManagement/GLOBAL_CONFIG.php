<?php
    // MYSQL Database Connection Details
    $DATABASE_HOST = "silva.computing.dundee.ac.uk";
    $DATABASE_NAME = "20agileteam2db";
    $DATABASE_USERNAME = "20agileteam2";
    $DATABASE_PASSWORD = "7343.at2.3437";

    try {
        // Attempts the MYSQL Connection
        $MYSQL_CONNECTION = new PDO("mysql:host=".$DATABASE_HOST.";dbname=".$DATABASE_NAME, $DATABASE_USERNAME, $DATABASE_PASSWORD);

        // Sets the PDO error mode to exception
        $MYSQL_CONNECTION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {

        // Error message if MYSQL Connection failed
        echo "Error:" . $e->getMessage();
      }
?>