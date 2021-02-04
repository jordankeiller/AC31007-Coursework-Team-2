<?php 
	include('assets/php/manage_login_process.php');

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM login WHERE Login_ID=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['Username'];
			$Pass = $n['Password'];
			$Reid= $n['Researcher_ID'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Manager</title>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM login"); ?>

<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Edit Entry</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Username']; ?></td>
			<td><?php echo $row['Password']; ?></td>
			<td><?php echo $row['Researcher_ID']; ?></td>
   
			<td>
				<a href="index.php?edit=<?php echo $row['Login_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['Login_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>



	<form method="post" action="php_code.php" >
		<div class="input-group">
		<input type="hidden" name="Login_ID" value="<?php echo $id; ?>">
        
			<label>Name</label>
			
			<input type="text" name="Username" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="Password" value="<?php echo $Pass; ?>">
		</div>
		<div class="input-group">
			<label>Researcher_ID</label>
			<input type="number" name="Researcher_ID" value="<?php echo $Reid; ?>">
		</div>
       
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
