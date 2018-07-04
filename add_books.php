<?php
	session_start();

	if(!isset($_SESSION['logged_in'])) {
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Books</title>
	<link rel="stylesheet" type="text/css" href="css/add_books.css">
	<?php
		include('links.php');
	?>
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
			<p class="title">Add Book</p>
			<form class="bookInformation-form" action="insert_book.php" method="POST">
				<input type = "hidden" name = "user" value = "<?php echo $_SESSION['username']; ?>">
				<div class="form-group bookInput">
					<label for="bookTitle">BOOK TITLE</label>
    				<input type="text" class="form-control" name="bookTitle" id="bookTitle" placeholder="Eleanor and Park">
				</div>
				<div class="form-group bookInput">
					<label for="bookAuthor">AUTHOR</label>
    				<div class="row">
    					<div class="col col-md-6">
    						<div class="input-group">
							  <input type="text" class="form-control" name="fName" placeholder="Rainbow" aria-describedby="basic-addon2">
							  <span class="input-group-addon" id="basic-addon2">First Name</span>
							</div>
    					</div>
    					<div class="col col-md-6">
    						<div class="input-group">
							  <input type="text" class="form-control" name="lName" placeholder="Rowell" aria-describedby="basic-addon2">
							  <span class="input-group-addon" id="basic-addon2">Last Name</span>
							</div>
    					</div>
    				</div>
				</div>
				<div class="form-group bookInput">
			    	<label for="bookDescription">BOOK DESCRIPTION</label>
			    	<textarea class="form-control" name="bookDesc" id="bookDescription" rows="3"></textarea>
			  	</div>
			  	<div class="row">
			  		<div class="col col-md-6">
			  			<div class="form-group bookInput">
							<label for="bookISBN">ISBN</label>
		    				<input type="text" class="form-control" name="ISBN" id="bookISBN" placeholder="0-1234-1563-645-6">
						</div>
						<div class="form-group bookInput">
							<label for="bookPageCount">PAGE COUNT</label>
		    				<input type="text" class="form-control" name="pageCount" id="bookPageCount" placeholder="333">
						</div>
			  		</div>
			  		<div class="col col-md-6">
			  			<div class="form-group bookInput">
							<label for="bookYearPub">YEAR PUBLISHED</label>
		    				<input type="text" class="form-control" name="pubYear" id="bookYearPub" placeholder="2012">
						</div>
						<button class="btn addBook-btn" type="submit">SUBMIT</button>
			  		</div>
			  	</div>
			</form>
		</section>
	</div>
</body>
</html>
<script type="text/javascript">
	$(window).on('scroll', function() {
		if($(window).scrollTop()) {
			$('nav').addClass('black');
		}
		else {
			$('nav').removeClass('black');
		}
	});
</script>