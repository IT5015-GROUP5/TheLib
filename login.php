<?php
	session_start();
	require('db_connect.php');

	//SQL Query
	//query is subject to change depending on the database
	$query = "SELECT * FROM user where username = '".$_POST['username']."' AND password = '".$_POST['pass']."'";
	$result = mysqli_query($conn,$query);
	var_dump($query);
	if (!$result) {
		die("Error from query".$result->connect_error);
	}

	//Data Handling
	$row = mysqli_fetch_assoc($result);
	if ($row != NULL) {
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
		header('Location:home.php');
	}else {
		$_SESSION['loginmsg'] = "FAILED";
		header('Location:index.php');
	}
?>