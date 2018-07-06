<?php
	session_start();
	require("db_connect.php");

	if(!isset($_SESSION['logged_in'])) {
		header('Location:index.php');
	}

	$query = "SELECT book_name, author.firstName, author.lastName, year_pub, isbn, bookID 
				FROM `books` 
				JOIN author ON author.authorID = book_author";
	$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
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
											echo "<td><center>" .$row['firstName']." ".$row['lastName']."</center></td>";
											echo "<td><center>" .$row['year_pub']. "</center></td>";
											echo "<td><center>" .$row['isbn']. "</center></td>";
											echo "<td>
													<center>
														<form action='delete_book.php' method='POST'>
															<button class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-pencil'></span></button>
														
															<input type='hidden'  name='bookID' value='".$row['bookID']."'>
															<input type='hidden' name='bookTitle' value='".$row['book_name']."'>
															<button type='submit' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button>
														</form>
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
<script>
	$(document).ready(function(){
		$("#bookTable").DataTable({
			"pagingType": "simple"
		});
	});
</script>