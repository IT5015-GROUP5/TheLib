<?php 
session_start();
require("db_connect.php");

//SQL Query
$query = "SELECT * FROM books order by bookID";
$result = mysqli_query($conn, $query);
if (!$result) {
	die("Error from query".$result->connect_error);
}

//Data Handling
$bookSet = array();

while ($row = mysqli_fetch_assoc($result)) {
	$bookSet[] = array(
		"bookID" => $row['bookID'],
		"bookname" => utf8_encode($row['book_name']),
		"year" => $row['year_pub'],
		"isbn" => $row['isbn'],
		"desc" => $row['description'],
		"pgno" => $row['page_number'],
		"bookname" => $row['book_author']
	);
}
echo "<pre>";
var_dump($bookSet);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/add_books.css">
	<link rel='stylesheet' href='datatable_files/datatables.min.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
	<div class="wrapper">
		<nav>
			<div class="logo">
				<img src="images/logo-navbar.png">
			</div>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="add_books.php" class="active">Add Books</a></li>
				<li><a href="logs.php">Logs</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
			</ul>
		</nav>
		<section class="sec1"></section>
		<section class="content">
			<p class="title">Books</p>
			<div class="list-group">
			    <a href="#" class="list-group-item">
			    	<label id="id"></label>
			    	<label id="bookname"></label>
			    	<label id="year"></label>
			    	<label id="description"></label>
			    	<label id="pageno"></label>
			 	</a>
			</div>
		</section>
	</div>
</body>
</html>
<script type="text/javascript">

	var bookSet = <?php echo json_encode($bookSet)?>;
	var_dump(bookSet);

	function displayBooks(instance){
		var idx;
		console.log("went here");
		for(idx=0;idx<instance.length;idx++){
			$("#id").text(idx);
			$("#bookname").text(instance.bookname);
			$("#year").text(instance.year);
			$("#description").text(instance.desc);
			$("#pageno").text(instance.pgno);
		}
	}

	$(document).ready(function() {
		//displayBooks(bookSet);
	});

	$(window).on('scroll', function() {
		if($(window).scrollTop()) {
			$('nav').addClass('black');
		}
		else {
			$('nav').removeClass('black');
		}
	});
</script>