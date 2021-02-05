---
layout: manageLogin
title: Manage Login
---
<div class="container bg-white px-4 py-2">

	<!-- Links to other lab manager pages -->
	<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
	<a href="manage_researchers.php" class="btn btn-primary">Manage Researchers</a>

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

	<h1 class="text-primary fw-bold mt-3 mb-0">Manage Logins</h1>

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

		<!-- Username input -->
		<div class="mb-3">
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="username" placeholder="" name="Username"
					value="<?php echo $name; ?>" required>
				<label for="username">Username</label>
			</div>
		</div>

		<!-- Password Input -->
		<div class="mb-3">
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="username" placeholder="" name="Password"
					value="<?php echo $Pass; ?>" required>
				<label for="password">Password</label>
			</div>
		</div>

		<?php
			// If user is updating record then make readonly the research id field.
			// Displays relevant button based on action.
			if ($update == true) {

				// Gets the specifed researcher id to send.
				$stmtResearcher = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher WHERE Researcher_ID=" . $Reid . ";");
				$stmtResearcher->execute();
				$researcher = $stmtResearcher->fetchAll();

				// Displays option selection.
				echo '<div class="mb-3"><div class="form-floating mb-3"><select class="form-select" id="reselect" name="Researcher_ID">';

				// Displays researcher id and name.
				foreach ($researcher as $key) {
					echo '<option value="' . $key['Researcher_ID'] . '" readonly>' . $key['Researcher_ID'] . ': ' . $key['Name']  . '</option>';
				}

				echo '</select><label for="reselect">For Researcher (readonly)</label></div>';

				// Update button.
				echo '<button class="btn btn-primary" type="submit" name="update">Update</button>';
			} else {

				// Fetches all researchers details.
				$stmtResearchers = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher");
				$stmtResearchers->execute();
				$researchers = $stmtResearchers->fetchAll();

				echo '<div class="mb-3"><div class="form-floating mb-3"><select class="form-select" id="reselect" name="Researcher_ID" required>';

				// Displays default option.
				echo '<option selected disabled value="">Choose a Researcher</option>';

				// Displays ass researcher ids and names.
				foreach ($researchers as $key) {
					echo '<option value="' . $key['Researcher_ID'] . '">' . $key['Researcher_ID'] . ': ' . $key['Name']  . '</option>';
				}

				echo '</select><label for="reselect">For Researcher</label></div></div>';

				// Save button.
				echo '<button class="btn btn-primary" type="submit" name="save">Save</button>';
			}
			?>
	</form>
</div>