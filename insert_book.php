<?php
session_start();
require("db_connect.php");

if(isset($_POST['bookTitle']) && isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['bookDesc']) && isset($_POST['ISBN']) && isset($_POST['pageCount']) && isset($_POST['pubYear']))
{
	//FOR BOOK DETAILS
	$title = $_POST['bookTitle'];
	$fname = $_POST['fName'];
	$lname = $_POST['lName'];
	$desc = $_POST['bookDesc'];
	$isbn = $_POST['ISBN'];
	$page = $_POST['pageCount'];
	$pub = $_POST['pubYear'];

	//FOR LOG DETAILS
	$user = $_POST['user'];
	$userQuery = "SELECT userId FROM User WHERE username = '".$user."'";
	$userResult = mysqli_query($conn,$userQuery);
	$userRow = mysqli_fetch_assoc($userResult);
	$action = "Added Book";
	$description = "Added ".$title;

	if($userRow != NULL){
		$userId = $userRow['userId'];
	}

	//FOR BOOK DETAILS CHECKS IF AUTHOR EXISTS IN DB
	$authorQuery1 = "SELECT authorId FROM Author WHERE firstName = '".$fname."' AND lastName = '".$lname."'";
	$authorResult = mysqli_query($conn,$authorQuery1);

	//IF AUTHOR DOES NOT EXIST, AUTHOR IS ADDED TO THE DB
	if(mysqli_num_rows($authorResult)==0){
		$authorQuery2 = "INSERT INTO Author (firstName,lastName) VALUES ('".$fname."','".$lname."')";
		//GETS THE ID OF NEWLY ADDED AUTHOR
		if(mysqli_query($conn,$authorQuery2)){
			$authorId = mysqli_insert_id($conn);
		}

	//IF AUTHOR DOES EXIST
	}else{
		$row = mysqli_fetch_assoc($authorResult);
		if($row != NULL){
			$authorId = $row['authorId'];
		}
	}

	//INSERT BOOK QUERY
	$query2 = "INSERT INTO Book (title,authorId,pubDate,ISBN,description,pageCount) VALUES ('".$title."',".$authorId.",".$pub.",'".$isbn."','".$desc."',".$page.")";
	//AFTER INSERTING BOOK QUERY
	if(mysqli_query($conn,$query2)){
		//INSERT LOG QUERY
		$logQuery = "INSERT INTO Logs (action,description,userId) VALUES ('".$action."','".$description."',".$userId.")";
		mysqli_query($conn,$logQuery);

		echo "<script> 
				alert('Successfully Added to the Library');
				window.location.href='add_books.php';
			</script>";
	}else{
		echo "<script> 
				alert('Error');
				window.location.href='add_books.php';
			</script>";
	}
}
?>