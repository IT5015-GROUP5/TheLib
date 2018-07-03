<?php
	session_start();
	require("db_connect.php");

	//////////////////SQL Query/////////////////
	var_dump($_POST);
	//query is subject to change depending on the database
	$query = "SELECT * FROM user where username = '".$_POST['username']."' AND password = '".$_POST['pass']."'";
	$result = mysqli_query($conn,$query);
	var_dump($query);
	if (!$result) {
		die("Error from query".$result->connect_error);
	}
	///////////////////////////////////////////

	//////////////Data Handling////////////////
	$row = mysqli_fetch_assoc($result);
	var_dump($row, $result);
	if ($row != NULL) {
		$_SESSION['logged_in'] = true;
		$_SESSION["username"] = $row['username'];
		$_SESSION["password"] = $row['password'];
		echo "<script>alert('login success');</script>";
		header("Location:home.php");
	}else{
		echo "<script>alert('Wrong username and/or password');</script>";
		header("Location:index.php");
	}
	///////////////////////////////////////////
?>