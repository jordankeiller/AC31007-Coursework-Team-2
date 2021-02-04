<?php
// Includes processing file.
include "assets/php/manage_researchers_process.php";

// Used to update a researcher's details. Stores id for use it to update database.
// Displays current details in the update form textboxes. 
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;

	// Fetches the researchers details to update.
	$stmtRecord = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher WHERE Researcher_ID=$id");
	$stmtRecord->execute();
	$record = $stmtRecord->fetchAll();
	if (count($record) == 1) {

		foreach ($record as $key) {
			$name = $key['Name'];
			$Type = $key['Researcher_Type'];
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Manage Researchers</title>
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container px-4">
			<a class="navbar-brand" href="index.html">Questionnaire Extraordinare</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="quiz.php">Quiz</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="createquestionnaire.php">Quiz Creator</a>
					</li>
				</ul>
				<div class="d-flex">
					<a class="btn btn-outline-light" href="login.php">Log In</a>
				</div>
			</div>
		</div>
	</nav>

	<!-- Displays message after action has been done. -->
	<?php
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	?>

	<!-- Displays the researchers -->
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Role</th>
				<th>Edit Entry</th>
				<th>Action</th>
			</tr>
		</thead>

		<?php
		// Fetches all the researchers from the database.
		$stmtResults = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher");
		$stmtResults->execute();
		$results = $stmtResults->fetchAll();

		// Displays all the researchers in a table format.
		foreach ($results as $row) {
			echo "<tr>";
			echo "<td>" . $row['Researcher_ID'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Researcher_Type'] . "</td>";
			echo '<td><a href="index.php?edit=' . $row['Researcher_ID'] . '">Edit</a></td>';
			echo '<td><a href="php_code.php?del=' . $row['Researcher_ID'] . '">Delete</a></td>';
			echo "</tr>";
		}
		?>
	</table>

	<!-- Displays the form to update or save details. -->
	<form method="post" action="assets/php/manage_researchers_process.php">

		<div class="input-group">
			<input type="hidden" name="Researcher_ID" value="<?php echo $id; ?>">
			<label>Name</label>
			<input type="text" name="Name" value="<?php echo $name; ?>">
		</div>

		<div class="input-group">
			<label>Role</label>
			<input type="text" name="Researcher_Type" value="<?php echo $Type; ?>">
		</div>

		<!-- Displays either update or save button depending on action -->
		<div class="input-group">

			<?php
			if ($update == true) {
				echo '<button class="btn" type="submit" name="update">Update</button>';
			} else {
				echo '<button class="btn" type="submit" name="save">Save</button>';
			}
			?>
		</div>
	</form>

	<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>

</html>