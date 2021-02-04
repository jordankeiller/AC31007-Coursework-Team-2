<?php 
	// Links to db connection details
	include "GLOBAL_CONFIG.php";

	// Starts session if not started.
	if (session_status() == 1) {
		session_start();
	}

	// initialize variables
	$name = "";
    $Pass = "";
    $Reid = "";
	$id = 0;
	$update = false;

	// If user wants to save details.
	if (isset($_POST['save'])) {
		$id = $_POST['Login_ID'];
		$name = $_POST['Username'];
        $Pass = $_POST['Password'];
		$Reid = $_POST['Researcher_ID'];
		
		// Sends new login details to the database.
		$MYSQL_CONNECTION->prepare("INSERT INTO login ( Username, Password, Researcher_ID) VALUES ('$name', '$Pass','$Reid')")->execute();

		$_SESSION['message'] = "<strong>Success!</strong> Details have been saved."; 
		header('location: ../../manage_login.php');
	}
	// If user wants to update details.
	else if (isset($_POST['update'])) {
		
		$id = $_POST['Login_ID'];
		$name = $_POST['Username'];
        $Pass = $_POST['Password'];
        $Reid = $_POST['Researcher_ID'];
    
        $MYSQL_CONNECTION->prepare("UPDATE login SET Username='$name', Password='$Pass', Researcher_ID='$Reid' WHERE Login_ID=$id")->execute();

		$_SESSION['message'] = "<strong>Success!</strong> Details have been updated."; 
		header('location: ../../manage_login.php');
	}
	// If the user wants to delete details
	else if (isset($_GET['del'])) {
        $id = $_GET['del'];
		
		$MYSQL_CONNECTION->prepare("DELETE FROM login WHERE Login_ID=$id")->execute();

		$_SESSION['message'] = "<strong>Success!</strong> Details have been deleted."; 
		header('location: ../../manage_login.php');
	}
