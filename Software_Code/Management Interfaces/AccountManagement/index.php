<?php 
	// Includes processing file.
	include('researcher_manage.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;

		// Fetches all researchers from the database.
		$stmtRecord = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher WHERE Researcher_ID=$id")->execute();
		$stmtRecord = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher WHERE Researcher_ID=$id");
		$stmtRecord->execute();
		$record = $stmtRecord->fetchAll(); // Stores data.

		if (count($record) == 1 ) {

			foreach ($record as $key) {
				$name = $key['Name'];
				$Type = $key['Researcher_Type'];
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<title>Account Manager</title>
</head>
<body>

    <?php
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message']; 
		unset($_SESSION['message']);
	}
?>

// Fetches all the results from the database.

?>
		$stmtResults = $MYSQL_CONNECTION->prepare("SELECT * FROM researcher");
		$stmtResults->execute();
		$results = $stmtResults->fetchAll();

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Research Type</th>
			<th>Edit Entry</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php foreach ($results as $row) { ?>
		<tr>
			<td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['Researcher_Type']; ?></td>
	<!--		
   -->
			<td>
				<a href="index.php?edit=<?php echo $row['Researcher_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['Researcher_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>



	<form method="post" action="php_code.php" >
		<div class="input-group">
		<input type="hidden" name="Researcher_ID" value="<?php echo $id; ?>">
        
			<label>Name</label>
			
			<input type="text" name="Name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Research Type</label>
			<input type="text" name="Researcher_Type" value="<?php echo $Type; ?>">
		</div>
	<!--	<div class="input-group">
			<label>Researcher_ID</label>
			<input type="number" name="Researcher_ID" value="<?php echo $Reid; ?>">
		</div>
      --> 
		<div class="input-group">
		<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
		</div>
	</form>
</body>
</html>