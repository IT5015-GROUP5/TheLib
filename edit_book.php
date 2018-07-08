<?php
	session_start();
	require('db_connect.php');

	//FOR BOOK DETAILS
	$bookId = $_POST['bookId'];
	$title = $_POST['title'];
	$fname = $_POST['authorfname'];
	$lname = $_POST['authorlname'];
	$pub = $_POST['year'];
	$page = $_POST['pageno'];
	$isbn = $_POST['isbn'];
	$desc = $_POST['desc'];

	//ACTION
	$actionQuery = "SELECT * FROM actions WHERE action_name='Edited Book'";
	$actionResult = mysqli_query($conn, $actionQuery);
	$actionRow = mysqli_fetch_assoc($actionResult);
	$actionIDGot = $actionRow["actionID"];

	//FOR LOG DETAILS
	$user = $_POST['user'];
	$userQuery = "SELECT userId FROM user WHERE username = '".$user."'";
	$userResult = mysqli_query($conn,$userQuery);
	$userRow = mysqli_fetch_assoc($userResult);
	$description = "Edited ".$title;
	$dateTime = date("Y-m-d H:i:s");

	if($userRow != NULL){
		$userId = $userRow['userId'];
	}

	//FOR BOOK DETAILS CHECKS IF AUTHOR EXISTS IN DB
	$authorQuery1 = "SELECT authorID FROM author WHERE firstName = '".$fname."' AND lastName = '".$lname."'";
	$authorResult = mysqli_query($conn,$authorQuery1);

	//IF AUTHOR DOES NOT EXIST, AUTHOR IS ADDED TO THE DB
	if(mysqli_num_rows($authorResult)==0){
		$authorQuery2 = "INSERT INTO author (firstName,lastName) VALUES ('".$fname."','".$lname."')";
		//GETS THE ID OF NEWLY ADDED AUTHOR
		if(mysqli_query($conn,$authorQuery2)){
			$authorId = mysqli_insert_id($conn);
		}

	//IF AUTHOR DOES EXIST
	}else{
		$row = mysqli_fetch_assoc($authorResult);
		if($row != NULL){
			$authorId = $row['authorID'];
		}
	}

	//EDIT BOOK QUERY
	$query2 = "UPDATE books
				SET book_name = '".$title."', year_pub = ".$pub.", isbn = '".$isbn."', description = '".$desc."', page_number = ".$page.", book_author = ".$authorId."
					WHERE bookID = '".$bookId."'";

	//AFTER EDITING BOOK QUERY
	if(mysqli_query($conn,$query2)){
		//INSERT LOG QUERY
		$logQuery = "INSERT INTO logs (accountID, bookID, actionID, action, time_of_action) 
						VALUES (".$userId.",".$bookId.",".$actionIDGot.",'".$description."','".$dateTime."')";
		if(mysqli_query($conn,$logQuery)){
			$_SESSION['editmsg'] = 'SUCCESS';
			header('Location:home.php');
		}else{
			$_SESSION['editmsg'] = 'FAILEDLOG';
			header('Location:home.php');
		}
	}else{
		$_SESSION['editmsg'] = 'FAILED';
		header('Location:home.php');
	}
?>