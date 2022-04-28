<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "notes";

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if ($connect->connect_error) {
	// unsuccessful connection!!!
	die("connection failed: " . $conc->connect_error);
}
?>

<!-- CREATE TABLE users ( user INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, firstname CHAR(225) NOT NULL, lastname CHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, privilage VARCHAR(255) NOT NULL )
 -->

<!-- CREATE TABLE files ( file_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, path VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, branch INT(5) NOT NULL, sem INT(5) NOT NULL, subject INT(5) NOT NULL, uploader_id INT(11), FOREIGN KEY (uploader_id) REFERENCES users(user) ) -->