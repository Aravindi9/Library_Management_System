<?php
	include "connection.php";
	include "navbar.php";
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

			<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style>
			section
			{
				margin-top: -20px;
			}
		</style>

</head>
<body>
	
	<section>
		<div class=" log_img">
			<br><br><br>
			<div class="box1">
					<h1 style="text-align:center;font-size: 35px;font-family: lucida Console;">Library Management System</h1>
					<h1 style="text-align:center; font-size: 25px;">User Login Form</h1><br>

				<form name="login" action="" method="post">
				
					<div class="login">
						<input class="form-control" type="text" name="username" placeholder="usename" required=""><br>
						<input  class="form-control" type="password" name="password" placeholder="password" required=""><br>

						<input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 80px; height: 30px;">
					</div>
				
					<p style="color:white; padding-left: 15px ;">
						<br><br>
						<a style="color:white;" href="">Forget Password?</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						New to this?<a  style="color:white;" href="registration.html">Sign Up</a>
					</p>
				</form>
				
			</div>
		</div>
	</section>

		<?php

			if(isset($_POST['submit']))
			{
				$count=0;
				$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
				$count=mysqli_num_rows($res);

				if($count==0)
				{
					?>
						<!--
							<script type="text/javascript">
								alert("The username and password doesn't match")
							</script>
						-->
					<div class="alert alert-danger" style="width:700px; margin-left:400px; margin-top:80px; background-color:#de1313; color:white;">
						<strong>
							The username and password doesn't match
						</strong>
					</div>
					<?php
				}
				else
				{
					$_SESSION['login_user']=$_POST['username'];

					?>
						<script type="text/javascript">
							window.location="index.php"
						</script>
					<?php
				}

			}
		?>

</body>
</html>