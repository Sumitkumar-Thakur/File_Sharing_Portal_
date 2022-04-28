<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>KCCEMSR | FILES</title>
	<link rel="stylesheet" type="text/css" href="assets/styles/styles.css">
</head>

<body>
	<div class="topnav">
		<a href="index.html">Home</a>
		<a href="dropdown.php">Drop Down</a>
		<?php
		if (isset($_SESSION['u_id'])) {
		?>
			<div class='upload-container'>
				<form action='upload.php?cat=<?php echo $_GET['cat']; ?>' method='POST' enctype='multipart/form-data'>
					<input type='file' name='file'>
					<button type='submit' name='submit'>Upload</button>
				</form>
			</div>
			<form action="includes/logout.inc.php" method="POST">
				<button type="submit" name="submit">logout</button>
			</form>
		<?php
			echo "<a href='#'>WELCOME " . strtoupper($_SESSION['firstname']) . " " . strtoupper($_SESSION['lastname']) . "</a>";
		} else {
			echo '<a class="right" href="signup.php">SIGNUP</a>
				<a class="right" href="login.php">LOG IN</a>';
		}
		?>
	</div>