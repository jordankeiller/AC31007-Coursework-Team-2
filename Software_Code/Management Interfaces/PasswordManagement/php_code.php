<?php 
//include "GLOBAL_CONFIG.php";
	session_start();
	$db = mysqli_connect('silva.computing.dundee.ac.uk', '20agileteam2','7343.at2.3437' , '20agileteam2db');

	// initialize variables
	$name = "";
    $Pass = "";
    $Reid = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$id = $_POST['Login_ID'];
		$name = $_POST['Username'];
        $Pass = $_POST['Password'];
        $Reid = $_POST['Researcher_ID'];
		$query1="INSERT INTO login ( Username, Password, Researcher_ID) VALUES ('$name', '$Pass','$Reid')";
		$querystatement=$MYSQL_CONNECTION->prepare($query1);
		$queryresult=$querystatement->execute();
	//	mysqli_query($db, "INSERT INTO login ( Username, Password, Researcher_ID) VALUES ('$name', '$Pass','$Reid')");
		$_SESSION['message'] = "Password saved"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['Login_ID'];
		$name = $_POST['Username'];
        $Pass = $_POST['Password'];
        $Reid = $_POST['Researcher_ID'];
    
        $query2="UPDATE login SET Username='$name', Password='$Pass', Researcher_ID='$Reid' WHERE Login_ID=$id";
        $querystatement2=$MYSQL_CONNECTION->prepare($query2);
		$queryresult2=$querystatement2->execute();    
	//	mysqli_query($db, "UPDATE login SET Username='$name', Password='$Pass', Researcher_ID='$Reid' WHERE Login_ID=$id");
		$_SESSION['message'] = "User updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query3="DELETE FROM login WHERE Login_ID=$id";
        $querystatement3=$MYSQL_CONNECTION->prepare($query3);
		$queryresult3=$querystatement3->execute();
		//mysqli_query($db, "DELETE FROM login WHERE Login_ID=$id");
		$_SESSION['message'] = "Username deleted!"; 
		header('location: index.php');
	}

// ...