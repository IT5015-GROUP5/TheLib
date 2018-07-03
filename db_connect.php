<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "library";   //Input the DB_Name here

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>