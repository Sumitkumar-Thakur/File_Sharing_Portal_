<?php 
	include_once 'includes/dbh.inc.php';
	$path = $_GET['path'];
	$query = "SELECT * FROM files WHERE path = '$path'";
	$result = mysqli_query($connect, $query);
	$count = mysqli_num_rows($result);
	if ($count !== 0) {
		$query = "DELETE FROM files WHERE path='$path'";
		if(mysqli_query($connect, $query)) {
			if(file_exists($path) && is_readable($path)) {
				if(unlink($path)) {
					header("Location: notes.php?cat=".$_GET['cat']);
				} else {
					echo "Error in deleting the file";
				}
			} else {
				echo "File doesn't exits!!";
			}
		} else {
			echo "Error in deleting the file";
		}
	} else {
		die("The file does not exists");
	}
