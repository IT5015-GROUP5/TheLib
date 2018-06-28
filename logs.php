<!DOCTYPE html>
<html>
<head>
	<title>Logs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/logs.css">
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
<script src='datatable_files/jquery.min.js'></script>
<script src='datatable_files/datatables.min.js'></script>
<script>
	$(document).ready(function(){
		$("#logsList").DataTable({
			"pagingType": "simple"
		});
	});
</script>