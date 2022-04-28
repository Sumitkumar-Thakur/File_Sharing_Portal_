<?php 
	if (isset($_POST['submit'])) {
		session_start();
		session_unset();
		session_destroy();
		header('Location: ../dropdown.php');
	} else {
		header('Location: ../dropdown.php');	
	}
?>