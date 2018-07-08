<?php
	session_start();
	require("db_connect.php");

	////////////////////////////////////////////
	//	   This requires bookID and Title     //
	////////////////////////////////////////////

	$actionQuery = "SELECT * FROM actions WHERE action_name='Deleted Book'";
	$actionResult = mysqli_query($conn, $actionQuery);
	$actionRow = mysqli_fetch_assoc($actionResult);
	$actionIDGot = $actionRow["actionID"];

	//FOR LOG DETAILS
	$user = $_POST['user'];
	$userQuery = "SELECT userId FROM user WHERE username = '".$user."'";
	$userResult = mysqli_query($conn,$userQuery);
	$userRow = mysqli_fetch_assoc($userResult);
	$title = $_POST['BookTitle'];
	$description = "Deleted ".$title;
	$dateTime = date("Y-m-d H:i:s");

	if($userRow != NULL){
		$userId = $userRow['userId'];
	}

	$bookID = $_POST['id'];

	//DELETE BOOK QUERY
	$deletequery = "DELETE FROM books WHERE bookID = '".$bookID."'";

	//DELETE BOOK QUERY AND RECORD LOG
	if(mysqli_query($conn,$deletequery)){
		//INSERT LOG QUERY
		$logQuery = "INSERT INTO logs (accountID, bookID, actionID, action, time_of_action) 
						VALUES ('".$userId."','".$bookID."','".$actionIDGot."','".$description."','".$dateTime."')";
		if(mysqli_query($conn,$logQuery)){
			$_SESSION['deletemsg'] = 'SUCCESS';
			header('Location:home.php');
		}else{
			$_SESSION['deletemsg'] = 'FAILEDLOG';
			header('Location:home.php');;
		}
	}else{
		$_SESSION['deletemsg'] = 'FAILED';
		header('Location:home.php');
	}
?>