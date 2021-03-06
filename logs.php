<?php
	session_start();
	require("db_connect.php");

	if(!isset($_SESSION['logged_in'])) {
		header('Location:index.php');
	}

	$query = "SELECT user.username, actions.action_name, action, time_of_action 
				FROM logs 
				JOIN user ON user.userId = accountID 
				JOIN actions ON actions.actionID = logs.actionID";

	$result = mysqli_query($conn, $query);

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
								<?php
									while($row = mysqli_fetch_array($result))
									{
										echo "<tr>";
											echo "<td>" .$row['username']. "</td>";
											echo "<td><center>" .$row['action_name']. "</center></td>";
											echo "<td><center>" .$row['action']. "</center></td>";
											echo "<td><center>" .$row['time_of_action']. "</center></td>";
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
	
	$(document).ready(function(){
		$("#logsList").DataTable({
			"pagingType": "simple"
		});
	});
</script>