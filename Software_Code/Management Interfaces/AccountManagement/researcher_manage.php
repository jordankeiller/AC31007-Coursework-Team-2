<?php 
	include "GLOBAL_CONFIG.php";

	// Starts session if not started.
	if (session_status() == 1) {
		session_start();
	}

	// initialize variables
	$name = "";
	$Type = "";
	$id = 0;
	$update = false;

	// If the user wants to add a researcher.
	if (isset($_POST['save'])) {
		
		// Sets the variables to the input fields.
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type'];

		// Sends query with entered details to the database.
		$MYSQL_CONNECTION->prepare("INSERT INTO researcher (Name, Researcher_Type) VALUES ('$name', '$Type')")->execute();

		$_SESSION['message'] = "researcher saved"; 
		header('location: index.php');
	}
	// If the user wants to update researcher details.
	else if (isset($_POST['update'])) {
		
		// Sets the variables to the input fields.
		$id = $_POST['Researcher_ID'];
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type']; // Specified by button click.
	
		// Sends query to update details
		$MYSQL_CONNECTION->prepare("UPDATE researcher SET Name='$name', Researcher_Type='$Type' WHERE Researcher_ID=$id")->execute();

		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}
	// If the user wants to delete a researcher.
	else if (isset($_GET['del'])) {
		
		// Gets the researcher id to delete.
		$id = $_GET['del'];

		// Execute delete statement.
		$MYSQL_CONNECTION->prepare("DELETE FROM researcher WHERE Researcher_ID=$id")->execute();

		$_SESSION['message'] = "Researcher deleted!"; 
		header('location: index.php');
	}
?>