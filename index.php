<?php
	session_start();

	if(isset($_SESSION['logged_in'])) {
		header('Location: home.php');
	}

	include('links.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div class="row">
		<div class="col col-md-8">
			<img src="images/background.jpg">
		</div>
		<div class="col col-md-4 login-form-div">
			<div>
				<img src="images/logo.png" class='login-img'>
			</div>
			<p class="text-center login-page-label">Sign in to The Library</p>
			<?php
				if(isset($_SESSION['registermsg'])){
					echo "<p class='text-center' style='color:red; font-weight:bold;'>REGISTRATION FAILED!</p>";
					echo "<p class='text-center' style='color:red; font-weight:bold;'>USERNAME ALREADY EXISTS!</p>";
					unset($_SESSION['registermsg']);
				}else if(isset($_SESSION['loginmsg'])){
					echo "<p class='text-center' style='color:red; font-weight:bold;'>INVALID USERNAME/PASSWORD!</p>";
					unset($_SESSION['loginmsg']);
				}
			?>
			<form action="login.php" method="POST">
				<div class="login-form-inputs">
					<input type="text" name="username" class="form-control" placeholder="Username" required>
					<br>
					<input type="password" name="pass" class="form-control" placeholder="Password" required>
					<br>
					<button class="btn login-form-btn" type="submit">LOGIN</button>
				</div>
			</form>
			<div class="text-center register-div">
				<p class="register-page-label">Register here</p>
				<button class="btn register-btn" data-toggle="modal" data-target="#myModal">REGISTER</button>
			</div>
		</div>

		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
			    <form action="register.php" method="POST">
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title register-modal-page-label">Register new user</p>
			        </div>

			        <div class="modal-body">
			          <p>Kindly fill out the fields below.</p>
			          <div class="form-group">
					    <label for="register-name-form">Name</label>
					    <input type="text" name="name" class="form-control" id="register-name-form" placeholder="Enter name" required>
					  </div>
					  <div class="form-group">
					    <label for="register-username-form">Username</label>
					    <input type="text" name="username" class="form-control" id="register-username-form" placeholder="Enter username" required>
					  </div>
					  <div class="form-group">
					    <label for="register-password-form">Password</label>
					    <input type="password" name="pass" class="form-control" id="register-password-form" placeholder="Password" required>
					  </div>
			        </div>
			        <div class="modal-footer">
			        	<button type="submit" class="btn btn-success register-modal-btn">Register</button>
			          <button type="button" class="btn btn-default register-modal-close" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			    </form>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>