<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
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
			<p class="title">List of Books</p>
			<div class="row">
				<div class="col col-md-2"></div>
				<div class="col col-md-8">
					<div class="list-of-books">
						<table class="table table-condensed" id="bookTable">
							<thead>
								<tr>
									<th>Book Title</th>
									<th><center>Author</th>
									<th><center>Year</th>
									<th><center>ISBN</center></th>
									<th><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Harry Potter and The Sorcerer's Stone</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>1997</center></td>
									<td><center>0-7475-3269-9</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Chamber of Secrets</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>1998</center></td>
									<td><center>9-7804-3906-486-6</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Prisoner of Azkaban</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>1999</center></td>
									<td><center>9-7814-0885-567-6</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Goblet of Fire</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>2000</center></td>
									<td><center>9-7807-4755-099-0</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Order of Phoenix</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>2003</center></td>
									<td><center>9-7817-8110-053-0</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Half Blood Prince</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>2005</center></td>
									<td><center>9-7814-0885-594-2</center></td>
									<td>Add Edit and delete button</td>
								</tr>
								<tr>
									<td>Harry Potter and The Deathly Hallows</td>
									<td><center>J.K. Rowling</center></td>
									<td><center>2007</center></td>
									<td><center>9-7805-4501-022-1</center></td>
									<td>Add Edit and delete button</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col col-md-2"></div>
			</div>
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
<script src='datatable_files/jquery.min.js'></script>
<script src='datatable_files/datatables.min.js'></script>
<script>
	$(document).ready(function(){
		$("#bookTable").DataTable({
			"pagingType": "simple"
		});
	});
</script>