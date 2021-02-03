<?php 
	session_start();
	$db = mysqli_connect('silva.computing.dundee.ac.uk', '20agileteam2','7343.at2.3437' , '20agileteam2db');

	// initialize variables
	$name = "";
	$Type = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type'];

		mysqli_query($db, "INSERT INTO researcher (Name, Researcher_Type) VALUES ('$name', '$Type')"); 
		$_SESSION['message'] = "researcher saved"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['Researcher_ID'];
		$name = $_POST['Name'];
		$Type = $_POST['Researcher_Type'];
	
		mysqli_query($db, "UPDATE researcher SET Name='$name', Researcher_Type='$Type' WHERE Researcher_ID=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM researcher WHERE Researcher_ID=$id");
		$_SESSION['message'] = "Researcher deleted!"; 
		header('location: index.php');
	}

// ...