<?php
	session_start();
	require("db_connect.php");

	//////////////////SQL Query/////////////////
	var_dump($_POST);

	//query is subject to change depending on the database
	$query = "SELECT * FROM account
			  where username = '".$_POST['username']."' AND password = '".$_POST['pass']."'";
	$result = mysqli_query($conn,$query);
	var_dump($query);
	if (!$result) {
		die("Error Inserting To Database:");
	}
	///////////////////////////////////////////

	//////////////Data Handling////////////////
	$row = mysqli_fetch_assoc($result)

	$_SESSION["username"] = $row['username'];
	$_SESSION["password"] = $row['password'];
	///////////////////////////////////////////

	header("Location:home.php");
?>