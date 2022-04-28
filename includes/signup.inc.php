<?php 
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == $_POST['password2']) {
			
			include_once 'dbh.inc.php';
			
			$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
			$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
			$username = mysqli_real_escape_string($connect, $_POST['username']);
			$password = mysqli_real_escape_string($connect, $_POST['password']);
			$privilage = mysqli_real_escape_string($connect, $_POST['privilage']);

			// check the inputs
			// check for empty fields
			if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($privilage)) {
				header("Location: ../signup.php?signup=password");
				exit();
			} else {
				// check if username is taken
				$query = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($connect, $query);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=user");
					exit();
				} else {
					// Hashing the password
					$passwordHash = password_hash($password, PASSWORD_DEFAULT);
					// insert the user into database
					$query = "INSERT INTO users (firstname, lastname, username, password, privilage) VALUES ('$firstname', '$lastname', '$username', '$passwordHash', '$privilage')";
					if(mysqli_query($connect, $query)) {
						header("Location: ../");
						exit();
					} else {
						header("Location: ../signup.php?success=0");
						exit();
					}
				}				
			}

		} else {
			header("Location: ../signup.php?signup=password");
			exit();
		}
	} else {
		header("Location: ../signup.php?signup=0");
		exit();
	}
?>