<?php
	session_start();
	require("db_connect.php");

	//FOR BOOK DETAILS
	$title = $_POST['bookTitle'];
	$fname = $_POST['fName'];
	$lname = $_POST['lName'];
	$desc = $_POST['bookDesc'];
	$isbn = $_POST['ISBN'];
	$page = $_POST['pageCount'];
	$pub = $_POST['pubYear'];

	//ACTION
	$actionQuery = "SELECT * FROM actions WHERE action_name='Added Book'";
	$actionResult = mysqli_query($conn, $actionQuery);
	$actionRow = mysqli_fetch_assoc($actionResult);
	$actionIDGot = $actionRow["actionID"];

	//FOR LOG DETAILS
	$user = $_POST['user'];
	$userQuery = "SELECT userId FROM user WHERE username = '".$user."'";
	$userResult = mysqli_query($conn,$userQuery);
	$userRow = mysqli_fetch_assoc($userResult);
	$description = "Added ".$title;
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

	//INSERT BOOK QUERY
	$query2 = "INSERT INTO books (book_name, year_pub, isbn, description, page_number, book_author) 
						VALUES ('".$title."',".$pub.",'".$isbn."','".$desc."',".$page.",".$authorId.")";
		//GET ID OF BOOK RECENTLY INSERTED
	$bookIDQuery = "SELECT * FROM books WHERE book_name='".$title."'";
	$bookIDResult = mysqli_query($conn, $bookIDQuery);
	$bookIDRow = mysqli_fetch_assoc($bookIDResult);
	$bookIDInserted = $bookIDRow["bookID"];

	//AFTER INSERTING BOOK QUERY
	if(mysqli_query($conn,$query2)){
		//INSERT LOG QUERY
		$logQuery = "INSERT INTO logs (accountID, bookID, actionID, action, time_of_action) 
						VALUES (".$userId.",".$bookIDInserted.",".$actionIDGot.",'".$description."','".$dateTime."')";
		if(mysqli_query($conn,$logQuery)){
			echo "<script> 
				alert('Successfully Added to the Library');
				window.location.href='add_books.php';
			</script>";
		}else{
			echo "<script> 
				alert('Error: Failed inserting log query!');
				window.location.href='add_books.php';
			</script>";
		}
	}else{
		echo "<script> 
				alert('Error: Failed adding new book!');
				window.location.href='add_books.php';
			</script>";
	}
?>