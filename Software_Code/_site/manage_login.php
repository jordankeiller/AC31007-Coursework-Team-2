<?php 
	include('assets/php/manage_login_process.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;

		$stmtRecord = $MYSQL_CONNECTION->prepare("SELECT * FROM login WHERE Login_ID=$id");
		$stmtRecord->execute();
		$record = $stmtRecord->fetchAll();

		if (count($record) == 1 ) {

			foreach ($record as $key) {
				$name = $key['Username'];
				$Pass = $key['Password'];
				$Reid= $key['Researcher_ID'];
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Manager</title>
</head>
<body>

<?php if (isset($_SESSION['message'])) {
	echo $_SESSION['message']; 
	unset($_SESSION['message']);
}
?>

<table>
	<thead>
		<tr>
			<th>Researcher ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Actions</th>
		</tr>
	</thead>

	<?php
		$stmtResults = $MYSQL_CONNECTION->prepare("SELECT * FROM login");
		$stmtResults->execute();
		$record = $stmtResults->fetchAll();

		foreach ($record as $row) {
			echo "<tr>";
			echo "<th scope='row'>" . $row['Researcher_ID'] . "</th>";
			echo "<td>" . $row['Username'] . "</td>";
			echo "<td>" . $row['Password'] . "</td>";
			echo '<td>
				<a class="btn btn-primary btn-sm" href="manage_login.php?edit=' . $row['Login_ID'] . '">Change</a>
				<a class="btn btn-danger btn-sm" href="assets/php/manage_login_process.php?del=' . $row['Login_ID'] . '">Delete</a>
				</td>';
			echo "</tr>";
		}
	?>
	
</table>

	<form method="post" action="assets/php/manage_login_process.php" >

		<input type="hidden" name="Login_ID" value="<?php echo $id; ?>">
        
		<label>Name</label>
		<input type="text" name="Username" value="<?php echo $name; ?>" required>

		<label>Password</label>
		<input type="text" name="Password" value="<?php echo $Pass; ?>" required>

		<?php
			
			// If user is updating record then make readonly the research id field.
			// Displays relevant button based on action.
			if ($update == true) {
				echo '<label>Researcher ID (readonly)</label>';
				echo'<input type="number" name="Researcher_ID" value="' .$Reid . '" readonly>';
				echo '<button class="btn btn-primary" type="submit" name="update">Update</button>';
			} else {
				echo '<label>Researcher ID</label>';
				echo'<input type="number" name="Researcher_ID" value="' .$Reid . '">';
				echo '<button class="btn btn-primary" type="submit" name="save">Save</button>';
			}
		?>

		</div>
	</form>
</body>
</html>
