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
<html lang="en-US">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Manage Researchers</title>
	<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
	<!-- Displays the navbar -->
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
					<a class="btn btn-outline-light" href="">Log Out</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="container bg-white px-4 py-2">

		<!-- Displays message after action has been done. -->
		<?php
		if (isset($_SESSION['message'])) {

			echo '<div class="alert alert-success alert-dismissible fade show">';
			echo $_SESSION['message'];
			echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
			echo '</div>';

			unset($_SESSION['message']); // Removes message from session storage.
		}
		?>

		<!-- Table which displays the researchers -->
		<table class="table table-hover mt-3">
			<thead>
				<tr>
					<th scope="col">Researcher ID</th>
					<th scope="col">Username</th>
					<th scope="col">Password</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Fetches all the researchers from the database.
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
			</tbody>
		</table>

		<form method="post" action="assets/php/manage_login_process.php">

			<!-- Stores the login id to be send. Hidden from the user. -->
			<input type="hidden" name="Login_ID" value="<?php echo $id; ?>">

			<label>Username</label>
			<input type="text" name="Username" value="<?php echo $name; ?>" required>

			<label>Password</label>
			<input type="text" name="Password" value="<?php echo $Pass; ?>" required>

			<?php

			// If user is updating record then make readonly the research id field.
			// Displays relevant button based on action.
			if ($update == true) {
				echo '<label>Researcher ID (readonly)</label>';
				echo '<input type="number" name="Researcher_ID" value="' . $Reid . '" readonly>';
				echo '<button class="btn btn-primary" type="submit" name="update">Update</button>';
			} else {
				echo '<label>Researcher ID</label>';
				echo '<input type="number" name="Researcher_ID" value="' . $Reid . '">';
				echo '<button class="btn btn-primary" type="submit" name="save">Save</button>';
			}
			?>

	</div>
	</form>

	<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>

</html>