<?php
	session_start();

	if(!isset($_SESSION['logged_in'])) {
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logs</title>	
	<link rel="stylesheet" type="text/css" href="css/logs.css">	
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
				<li><a href="add_books.php">Add Books</a></li>
				<li><a href="logs.php" class="active">Logs</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
			</ul>
		</nav>
		<section class="sec1"></section>
		<section class="content">
			<p class="title">Logs</p>
			<div class="row">
				<div class="col col-md-2"></div>
				<div class="col col-md-8">
					<div class="logs-list">
						<table class="table table-condensed" id="logsList">
							<thead>
								<tr>
									<th>Username</th>
									<th><center>Action</th>
									<th><center>Description</th>
									<th><center>Date and Time</center></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>princeharry</td>
									<td><center>Added book</center></td>
									<td><center>Added Harry Potter and The Deathly Hollows book</center></td>
									<td><center>June 27, 2018 11:07:35AM</center></td>
								</tr>
								<tr>
									<td>duchessofcambridge</td>
									<td><center>Deleted book</center></td>
									<td><center>Deleted The Frog Prince book</center></td>
									<td><center>June 27, 2018 11:07:35AM</center></td>
								</tr>
								<tr>
									<td>thequeenofficial</td>
									<td><center>Edited book</center></td>
									<td><center>Edited Princess Diana book</center></td>
									<td><center>June 27, 2018 11:07:35AM</center></td>
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
<script>
	$(document).ready(function(){
		$("#logsList").DataTable({
			"pagingType": "simple"
		});
	});
</script>