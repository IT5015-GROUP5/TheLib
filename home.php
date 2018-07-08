<?php
	session_start();
	require("db_connect.php");

	if(!isset($_SESSION['logged_in'])) {
		header('Location:index.php');
	}

	$query = "SELECT book_name, author.firstName, author.lastName, year_pub, isbn, bookID, description, page_number
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
	<?php
		if(isset($_SESSION['editmsg']) && $_SESSION['editmsg'] == 'SUCCESS') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('CONGRATULATIONS!!!');
						$('.modal-body #body').text('You have successfully updated the book.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['editmsg']) && $_SESSION['editmsg'] == 'FAILED') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Failed updating book information.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['editmsg']) && $_SESSION['editmsg'] == 'FAILEDLOG') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Book was updated but not recorded in the logs.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['deletemsg']) && $_SESSION['deletemsg'] == 'SUCCESS') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('CONGRATULATIONS!!!');
						$('.modal-body #body').text('You have successfully deleted the book.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['deletemsg']) && $_SESSION['deletemsg'] == 'FAILED') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Failed deleting book.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['deletemsg']) && $_SESSION['deletemsg'] == 'FAILEDLOG') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Book was deleted but not recorded in the logs.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['addmsg']) && $_SESSION['addmsg'] == 'SUCCESS') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('CONGRATULATIONS!!!');
						$('.modal-body #body').text('You have successfully added a book.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['addmsg']) && $_SESSION['addmsg'] == 'FAILED') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Failed adding book.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}else if(isset($_SESSION['addmsg']) && $_SESSION['addmsg'] == 'FAILEDLOG') {
			echo "<script>
					$(window).on('load',function(){
						$('.modal-header #head').text('ERROR!!!');
						$('.modal-body #body').text('Book was added but not recorded in the logs.');
					    $('#myModal').modal('show');
				    });
				</script>";
		}

		unset($_SESSION['editmsg']);
		unset($_SESSION['deletemsg']);
		unset($_SESSION['addmsg']);
	?>
	<div class="wrapper">
		<nav>
			<div class="logo">
				<img src="images/logo-navbar.png">
			</div>
			<ul>
				<li><a href="home.php" class="active">Home</a></li>
				<li><a href="add_books.php">Add Books</a></li>
				<li><a href="logs.php">Logs</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
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
											echo "<td id='title'><a type='button' onclick=\"bookInfo('".$row['book_name']."','".$row['description']."')\" data-toggle='modal' data-target='#bookModal'>" .$row['book_name']. "</a></td>";
											echo "<td id='author'><center>" .$row['firstName']." ".$row['lastName']."</center></td>";
											echo "<td id='year'><center>" .$row['year_pub']. "</center></td>";
											echo "<td id='isbn'><center>" .$row['isbn']. "</center></td>";
											echo "<td>
													<center>
														<button class='btn btn-warning btn-xs' onclick=\"bookDetails('".$row['bookID']."','".$row['book_name']."','".$row['firstName']."','".$row['lastName']."','".$row['year_pub']."','".$row['isbn']."','".$row['description']."','".$row['page_number']."')\" data-toggle='modal' data-target='#editModal'><span class='glyphicon glyphicon-pencil'></span></button>
														<input type='hidden'  name='bookID' value='".$row['bookID']."'>
														<input type='hidden' name='bookTitle' value='".$row['book_name']."'>
														<button class='btn btn-danger btn-xs' onclick=\"deleteDetails('".$row['bookID']."','".$row['book_name']."','".$row['description']."')\" data-toggle='modal' data-target='#deleteModal'><span class='glyphicon glyphicon-trash'></span></button>
													</center>
												</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- MODAL FOR THE EDIT BOOK-->
					<div class="modal fade" id="editModal" role="dialog">
					    <div class="modal-dialog">
						    <form action="edit_book.php" method="POST">
						    	<input type = "hidden" name = "user" value = "<?php echo $_SESSION['username']; ?>">
						      	<!-- Modal content-->
						      	<div class="modal-content">
						        	<div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <p class="modal-title register-modal-page-label">Edit Book Record</p>
						        	</div>
							        <div class="modal-body">
								        <div class="form-group">
										    <label for="book-title-form">Book Title</label>
										    <input type="hidden" name='bookId' class="form-control" id="book-id-form">
										    <input type="text" name="title" class="form-control" id="book-title-form" required>
										</div>
										<div class="form-group">
										    <label for="book-authorfname-form">Author</label>
										    <input type="text" name="authorfname" class="form-control" id="book-authorfname-form" required>
										</div>
										<div class="form-group">
										    <label for="book-authorlname-form">Author</label>
										    <input type="text" name="authorlname" class="form-control" id="book-authorlname-form" required>
										</div>
									  	<div class="form-group" style="display:inline-block; width:52%">
										    <label for="book-year-form">Year</label>
										    <input type="text" name="year" class="form-control" id="book-year-form" required>
									  	</div>
									  	<div class="form-group" style="display:inline-block; width:40%; margin-left:7%">
										    <label for="book-pageno-form">Page Number</label>
										    <input type="text" name="pageno" class="form-control" id="book-pageno-form" required>
									  	</div>
									  	<div class="form-group">
										    <label for="book-isbn-form">ISBN</label>
										    <input type="text" name="isbn" class="form-control" id="book-isbn-form" required>
									  	</div>
									  	<div class="form-group">
										    <label for="book-desc-form">Description</label>
										    <textArea type="text" name="desc" class="form-control" id="book-desc-form" required></textarea>
									  	</div>
							        </div>
							        <div class="modal-footer">
							        	<button type="submit" class="btn btn-success edit-modal-btn">Save Changes</button>
							          	<button type="button" class="btn btn-default edit-modal-close" data-dismiss="modal">Cancel</button>
							        </div>
						      	</div>
						    </form>
					    </div>
					</div>
				<div class="col col-md-2"></div>
			</div>
		</section>
	</div>


	<!-- MODAL FOR THE DELETE BOOK INFORMATION -->
	<div class="modal fade" id="deleteModal" role="dialog">
	    <div class="modal-dialog">
	    	<form action="delete_book.php" method="POST">
	    		<input type = "hidden" name = "user" value = "<?php echo $_SESSION['username']; ?>">
		      	<!-- Modal content-->
		      	<div class="modal-content">
			        <div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<p class="modal-title bookInfo-modal-page-label">Delete Book Record?</p>
			        </div>
				    <!-- Place book information inside this div using Php -->
				    <div class="modal-body">
					    <div class="book-name-modal">
	    					<input type = "hidden" name = "id" id="deleteId">
	    					<input type = "hidden" name = "BookTitle" id="deleteBook">
					    	<center><h4 id="delete-title" style="font-weight:bold"></h4></center>
					    	<p id="delete-info"></p>
					    </div>
				    </div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger edit-modal-btn">OK</button>
						<button type="button" class="btn btn-default edit-modal-close" data-dismiss="modal">Cancel</button>
					</div>
		      	</div>
		    </form>
	    </div>
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
				    	<center><h4 id="book-title" style="font-weight:bold"></h4></center>
				    	<p id="book-info"></p>
				    </div>
			    </div>
		    </div>
	    </div>
	</div>

	<!-- MODAL FOR SUCCESS/FAILED UPDATING/DELETING BOOK -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
			    <div class="modal-header">
			       	<button type="button" class="close" data-dismiss="modal">&times;</button>
				    <center><h3 id="head"></h3></center>
			    </div>
			    <!-- Place book information inside this div using Php -->
			    <div class="modal-body">
				  	<center><p id="body"></p></center>
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

	$(document).ready(function() {
		$("#bookTable").DataTable({
			"pagingType": "simple"
		});
	});

	function bookInfo(title, info) {
		$(".modal-body #book-title").text(title);
		$(".modal-body #book-info").text(info);
	}

	function bookDetails(id, title, authorfname, authorlname, year, isbn, desc, pageno) {
		$(".modal-body #book-id-form").val(id);
		$(".modal-body #book-title-form").val(title);
		$(".modal-body #book-authorfname-form").val(authorfname);
		$(".modal-body #book-authorlname-form").val(authorlname);
		$(".modal-body #book-year-form").val(year);
		$(".modal-body #book-pageno-form").val(pageno);
		$(".modal-body #book-isbn-form").val(isbn);
		$(".modal-body #book-desc-form").val(desc);
	}

	function deleteDetails(id, title, desc) {
		$(".modal-body #deleteId").val(id);
		$(".modal-body #deleteBook").val(title);
		$(".modal-body #delete-title").text(title);
		$(".modal-body #delete-info").text(desc);
	}
</script>