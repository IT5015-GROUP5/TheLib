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
				<li><a href="home.php" class="active">Home</a></li>
				<li><a href="add_books.php">Add Books</a></li>
				<li><a href="logs.php">Logs</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
			</ul>
		</nav>
		<section class="sec1"></section>
		<section class="content">
			<p class="title">Add Book</p>
			<form class="bookInformation-form">
				<div class="form-group bookInput">
					<label for="bookTitle">BOOK TITLE</label>
    				<input type="text" class="form-control" id="bookTitle" placeholder="Eleanor and Park">
				</div>
				<div class="form-group bookInput">
					<label for="bookAuthor">AUTHOR</label>
    				<div class="row">
    					<div class="col col-md-6">
    						<div class="input-group">
							  <input type="text" class="form-control" placeholder="Rainbow" aria-describedby="basic-addon2">
							  <span class="input-group-addon" id="basic-addon2">First Name</span>
							</div>
    					</div>
    					<div class="col col-md-6">
    						<div class="input-group">
							  <input type="text" class="form-control" placeholder="Rowell" aria-describedby="basic-addon2">
							  <span class="input-group-addon" id="basic-addon2">Last Name</span>
							</div>
    					</div>
    				</div>
				</div>
				<div class="form-group bookInput">
			    	<label for="bookDescription">BOOK DESCRIPTION</label>
			    	<textarea class="form-control" id="bookDescription" rows="3"></textarea>
			  	</div>
			  	<div class="row">
			  		<div class="col col-md-6">
			  			<div class="form-group bookInput">
							<label for="bookISBN">ISBN</label>
		    				<input type="text" class="form-control" id="bookISBN" placeholder="0-1234-1563-645-6">
						</div>
						<div class="form-group bookInput">
							<label for="bookPageCount">PAGE COUNT</label>
		    				<input type="text" class="form-control" id="bookPageCount" placeholder="333">
						</div>
			  		</div>
			  		<div class="col col-md-6">
			  			<div class="form-group bookInput">
							<label for="bookYearPub">YEAR PUBLISHED</label>
		    				<input type="text" class="form-control" id="bookYearPub" placeholder="2012">
						</div>
						<button class="btn addBook-btn">SUBMIT</button>
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