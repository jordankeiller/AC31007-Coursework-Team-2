<?php  
include "assets/php/GLOBAL_CONFIG.php";
include('php_code.php');
?>
<?php 
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
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Manage Login - Questionnaire Extraordinare</title>
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container px-4">
    <a class="navbar-brand" href="index.html">Questionnaire Extraordinare</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.html">Home</a>
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
			<a href="index.php?edit=<?php echo $row['Login_ID']; ?>" class="edit_btn">Edit</a>
		</td>
		<td>
			<a href="php_code.php?del=<?php echo $row['Login_ID']; ?>" class="del_btn">Delete</a>
		</td>
	</tr>
	<?php } ?>
</table>

<form method="post" action="php_code.php">
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
		<button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
		<?php else: ?>
		<button class="btn" type="submit" name="save">Save</button>
		<?php endif ?>
	</div>
</form>
  
  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>