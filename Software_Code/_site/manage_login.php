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
				$name = $record['Username'];
				$Pass = $record['Password'];
				$Reid= $record['Researcher_ID'];
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

	<form method="post" action="php_code.php" >

		<input type="hidden" name="Login_ID" value="<?php echo $id; ?>">
        
		<label>Name</label>
		<input type="text" name="Username" value="<?php echo $name; ?>" required>

		<label>Password</label>
		<input type="text" name="Password" value="<?php echo $Pass; ?>" required>

		<label>Researcher_ID</label>
		<input type="number" name="Researcher_ID" value="<?php echo $Reid; ?>" required>


		<?php
			if ($update == true) {
				echo '<button class="btn btn-primary" type="submit" name="update">Update</button>';
			} else {
				echo '<button class="btn btn-primary" type="submit" name="save">Save</button>';
			}
		?>

		</div>
	</form>
</body>
</html>
