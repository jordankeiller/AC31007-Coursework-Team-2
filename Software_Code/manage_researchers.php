---
layout: manageResearchers
title: Manage Researchers
---
<div class="container bg-white px-4 py-2">
	<!-- Links to other lab manager pages -->
	<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
	<a href="manage_login.php" class="btn btn-primary">Manage Logins</a>
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

	<h1 class="text-primary fw-bold mt-3 mb-0">Manage Researchers</h1>

	<!-- Table which displays the researchers -->
	<table class="table table-hover mt-3">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Role</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Fetches all the researchers from the database.
				$stmtResults = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher");
				$stmtResults->execute();
				$results = $stmtResults->fetchAll();

				// Displays all the researchers in a table format.
				foreach ($results as $row) {
					echo "<tr>";
					echo "<th scope='row'>" . $row['Researcher_ID'] . "</th>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Researcher_Type'] . "</td>";
					echo '<td>
						<a class="btn btn-primary btn-sm" href="manage_researchers.php?edit=' . $row['Researcher_ID'] . '">Edit</a>
						<a class="btn btn-danger btn-sm" href="assets/php/manage_researchers_process.php?del=' . $row['Researcher_ID'] . '">Delete</a>
						</td>';
					echo "</tr>";
				}
			?>
		</tbody>
	</table>

	<!-- Displays the form to update or save details. -->
	<form method="post" action="assets/php/manage_researchers_process.php">

		<input type="hidden" name="Researcher_ID" value="<?php echo $id; ?>">

		<label>Name</label>
		<input type="text" name="Name" value="<?php echo $name; ?>" required>


		<label>Role</label>
		<input type="text" name="Researcher_Type" value="<?php echo $Type; ?>" required>

		<!-- Displays either update or save button depending on action -->
		<?php
			if ($update == true) {
				echo '<button class="btn btn-primary" type="submit" name="update">Update</button>';
			} else {
				echo '<button class="btn btn-primary" type="submit" name="save">Save</button>';
			}
		?>
	</form>
</div>