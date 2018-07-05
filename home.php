<?php
	session_start();
	require("db_connect.php");

	$query = "SELECT book_name, author.author_name, year_pub, isbn FROM `books` JOIN author ON author.authorID = book_author";
	$result = mysqli_query($conn, $query);

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
								<?php
									while($row = mysqli_fetch_array($result))
									{
										echo "<tr>";
											echo "<td><a type='button' data-toggle='modal' data-target='#bookModal'>" .$row['book_name']. "</a></td>";
											echo "<td><center>" .$row['author_name']. "</center></td>";
											echo "<td><center>" .$row['year_pub']. "</center></td>";
											echo "<td><center>" .$row['isbn']. "</center></td>";
											echo "<td>
													<center>
														<button class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-pencil'></span></button>
														<button class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button>
													</center>
												</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col col-md-2"></div>
			</div>
		</section>
	</div>

	<!-- MODAL FOR THE BOOK INFORMATION -->
	<div class="modal fade" id="bookModal" role="dialog">
	    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <p class="modal-title bookInfo-modal-page-label">Book Information</p>
		        </div>
		        <!-- Place book information inside this div using Php -->
		        <div class="modal-body">
			    	<div class="book-name-modal">
			    		<p><strong>Book Name</strong></p>
			    		<?php

			    		?>
			    	</div>
		        </div>
		        <div class="modal-footer">
		        	<button type="submit" class="btn btn-success register-modal-btn">Register</button>
		          <button type="button" class="btn btn-default register-modal-close" data-dismiss="modal">Close</button>
		        </div>
		      </div>
	    </div>
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