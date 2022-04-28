<?php
	session_start();

	if (isset($_POST['submit'])) {
	
		include_once 'dbh.inc.php';

		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);

		//check the inputs
		if (empty($username || empty($password))) {
			header("Location: ../login.php?login=empty");
			exit();
		} else {
			$query = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($connect, $query);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../login.php?login=error1");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					//Dehashing the password
					$hashedPwdCheck = password_verify($password, $row['password']);
					if ($hashedPwdCheck == false) {
						header("Location: ../login.php?login=error2");
						exit();
					} elseif ($hashedPwdCheck == true) {
						//Log in User
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['firstname'] = $row['firstname'];
						$_SESSION['lastname'] = $row['lastname'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['privilage'] = $row['privilage'];
						header("Location: ../dropdown.php");
						exit();
					}
				}
			}
		}
	} else {
		header("Location: ../login.php?login=error3");
		exit();
	}
?>