<?php 
	include "GLOBAL_CONFIG.php";

	$db = mysqli_connect('silva.computing.dundee.ac.uk', '20agileteam2','7343.at2.3437' , '20agileteam2db');

	// Starts session if not started.
	if (session_status() == 1) {
		session_start();
	}

	// initialize variables
	$name = "";
	$Type = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type'];

		// Sends query with entered details to the database.
		$MYSQL_CONNECTION->prepare("INSERT INTO researcher (Name, Researcher_Type) VALUES ('$name', '$Type')")->execute();

		$_SESSION['message'] = "researcher saved"; 
		header('location: index.php');
	}

	else if (isset($_POST['update'])) {
		
		$id = $_POST['Researcher_ID'];
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type'];
	
		// Sends query to update details
		$MYSQL_CONNECTION->prepare("UPDATE researcher SET Name='$name', Researcher_Type='$Type' WHERE Researcher_ID=$id")->execute();

		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

	else if (isset($_GET['del'])) {
		$id = $_GET['del'];

		// Execute delete statement.
		$MYSQL_CONNECTION->prepare("DELETE FROM researcher WHERE Researcher_ID=$id")->execute();

		$_SESSION['message'] = "Researcher deleted!"; 
		header('location: index.php');
	}

// ...