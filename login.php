<?php
	session_start();
	require("db_connect.php");

	//////////////////SQL Query/////////////////
	echo "<pre>";
	var_dump($_POST);
	echo "<pre>";
	//query is subject to change depending on the database
	$query = "SELECT * FROM account where username = '".$_POST['username']."'";
	$result = mysqli_query($conn,$query);
	var_dump($query);
	if (!$result) {
		die("Error from query".$result->connect_error);
	}
	///////////////////////////////////////////

	//////////////Data Handling////////////////
	$row = mysqli_fetch_assoc($result);
	if ($_POST['username'] != $row['username'] && $_POST['pass'] != $row['password']) {
		header("Location:index.php");
		echo "<script>alert('Wrong username and/or password');</script>";
	}

	$_SESSION["username"] = $row['username'];
	$_SESSION["password"] = $row['password'];
	///////////////////////////////////////////

	header("Location:home.php");
?>