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
	$title = $_POST['bookTitle'];
	$description = "Deleted ".$title;
	$dateTime = date("Y-m-d H:i:s");

	if($userRow != NULL){
		$userId = $userRow['userId'];
	}

	$bookID = $_POST['bookID'];

	//DELETE BOOK QUERY
	$deletequery = "DELETE FROM books WHERE bookID = '".$bookID."'";


	//DELETE BOOK QUERY AND RECORD LOG
	if(mysqli_query($conn,$deletequery)){
		//INSERT LOG QUERY
		$logQuery = "INSERT INTO logs (accountID, bookID, actionID, action, time_of_action) 
						VALUES ('".$userId."','".$bookID."','".$actionIDGot."','".$description."','".$dateTime."')";
		if(mysqli_query($conn,$logQuery)){
			echo "<script> 
				alert('Successfully Deleted from the Library');
				window.location.href='home.php';
			</script>";
		}else{
			echo "<script> 
				alert('Error');
				window.location.href='home.php';
			</script>";
		}
	}else{
		echo "<script> 
				alert('Error');
				window.location.href='home.php';
			</script>";
	}
?>