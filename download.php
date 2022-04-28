<?php 
	$path = $_GET['path'];
	if(file_exists($path) && is_readable($path)) {
		// get the file size and send the http header
		$filename = explode('/', $path);
		$size = filesize($path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.end($filename));
		header('Content-Transfer-Encoding: binary');
		// open the file in binary read-only mode
		// display the error messages if the file can´t be opened
		$file = @ fopen($path, 'rb');
		if ($file) {
			// stream the file and exit the script when complete
			fpassthru($file);
			exit;
		} else {
			echo "Error in downloading file";
		}
	}
