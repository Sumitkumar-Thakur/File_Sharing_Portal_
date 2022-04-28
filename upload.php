<?php
////////////UPLOAD FILE TO THE upload FOLDER AND DB////////////////
session_start();
if (isset($_SESSION['u_id'])) {
	$userid = $_SESSION['u_id'];
	if (isset($_POST['submit'])) {
		$cat = str_split($_GET['cat']);
		$branch = (int)$cat[0];
		$sem = (int)$cat[1];
		$subject = (int)$cat[2];
		$date = date("Y-m-d");
		// get every thing about the file with $_FILES
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		// get the extention
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowedExt = array('jpg', 'jpeg', 'tiff', 'bmp', 'doc', 'ppt', 'pptx', 'png', 'pdf', 'txt', 'docx');

		// check for allowed extention
		if (in_array($fileActualExt, $allowedExt)) {
			// check for errors
			if ($fileError === 0) {
				// check for file size
				if ($fileSize < 20000000 || $fileSize == 0) {
					// check if the file is uploaded through POST method
					if (is_uploaded_file($fileTmpName)) {
						// give a unique name to the file based on time of upload
						$fileNameNew = uniqid(' ', true) . "." . $fileActualExt;
						$fileDestination = "uploads/" . $fileNameNew;

						// save the file in upload folder and sqldb
						if (move_uploaded_file($fileTmpName, $fileDestination)) {

							include_once 'includes/dbh.inc.php';

							$sql_insert = "INSERT INTO files (path, name, branch, sem, subject, uploader_id, upload_date) VALUES ('$fileDestination', '$fileName', '$branch', '$sem', '$subject', '$userid', '$date')";
							if (mysqli_query($connect, $sql_insert)) {
								// ADD CAT_ID here to properly link the file
								header("Location: notes.php?cat=" . $_GET['cat']);
							} else {
								echo "Error: " . mysqli_error($connect);
							}
						}
					} else {
						echo "Malicious activity detected, Try again!";
					}
				} else {
					echo "File Too big to upload!";
				}
			} else {
				echo "Something went wrong, Try Again!";
			}
		} else {
			echo "This type of file not allowed";
		}
	}
} else {
	header("Location: dropdown.php");
}
