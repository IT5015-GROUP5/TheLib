<?php
	session_start();
	require("db_connect.php");

	//////////////////SQL Query/////////////////
	var_dump($_POST);
	$searchquery = "SELECT username FROM user where username = '".$_POST['username']."'";
	$result = mysqli_query($conn,$searchquery);
	if (!$result) {
		die("Error from query".$result->connect_error);
	}

	//////////////Data Handling////////////////
	$row = mysqli_fetch_assoc($result);
	var_dump($row, $result);
	if ($row == NULL) {
		$query = "INSERT INTO user (username, password, name) 
				  VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".$_POST['name']."')";
		var_dump($query);
		$newresult = mysqli_query($conn,$query);
		header("Location:index.php");
	}else {
		$_SESSION['registermsg'] = "FAILED";
		header("Location:index.php");
	}
	///////////////////////////////////////////
?>