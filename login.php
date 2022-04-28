<?php
include_once 'header.php';
?>
<center><br><br><br>
	<!--<img src="logo.jpg" width="60%">-->
	<div id="lg1"><br><br><br>
		<img src="assets/styles/index1.PNG" class="i1">
		<h1>KCCEMSR Login</h1>
		<form action="includes/login.inc.php" method="post">
			<br>

			<b>Username :</b>
			<input type="text" name="username" placeholder="Username" required><br><br>

			<b>Password :</b>
			<input type="password" name="password" placeholder="password" required><br><br><br><br>
			<button type="submit" name="submit"><b>Log in</b></button>
		</form>


	</div>
</center>

<?php
include_once 'footer.php';
?>