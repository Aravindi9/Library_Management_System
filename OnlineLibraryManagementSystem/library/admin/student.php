<?php
	include "connection.php";
	include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<style type="text/css">
		.srch
		{
			padding-left: 1200px;
		}
	</style>
</head>
<body>
	<!-- ----------------------------search bar-------------- -->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="Search" placeholder="student username.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default" >
					<span class="glyphicon glyphicon-search"></span>
				</button>				
		</form>
	</div>
	<h2>List of Students</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[Search]%' ");

			if(mysqli_num_rows($q)==0) 
			{
				echo "sorry! No student found with that username. Try search again.";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color: #6db6b9e6'>";
			//Table Header
			echo "<th>";  echo "First Name";   echo "</th>";
			echo "<th>";   echo "Last Name";    echo "</th>";
			echo "<th>";   echo "Username";    echo "</th>";
			echo "<th>";   echo "Roll";    echo "</th>";
			echo "<th>";   echo "Email";    echo "</th>";
			echo "<th>";   echo "Contact";    echo "</th>";
		echo "</tr>";
 
 		
		while($row=mysqli_fetch_assoc($q))
		{
			echo "<tr>";
			echo "<td>";  echo $row['first'];  echo "</td>";
					echo "<td>";  echo $row['last'];  echo "</td>";
					echo "<td>";  echo $row['username'];  echo "</td>";
					echo "<td>";  echo $row['roll'];  echo "</td>";
					echo "<td>";  echo $row['email'];  echo "</td>";
					echo "<td>";  echo $row['contact'];  echo "</td>";
					echo "</tr>";
		}
		echo "</table>";
			}
		}

		/* if button is not pressed.*/
		else
		{
		$res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`;");
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color: #6db6b9e6'>";
					//Table Header
					echo "<th>";  echo "First Name";   echo "</th>";
					echo "<th>";   echo "Last Name";    echo "</th>";
					echo "<th>";   echo "Username";    echo "</th>";
					echo "<th>";   echo "Roll";    echo "</th>";
					echo "<th>";   echo "Email";    echo "</th>";
					echo "<th>";   echo "Contact";    echo "</th>";
		 
		 		
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";
					echo "<td>";  echo $row['first'];  echo "</td>";
					echo "<td>";  echo $row['last'];  echo "</td>";
					echo "<td>";  echo $row['username'];  echo "</td>";
					echo "<td>";  echo $row['roll'];  echo "</td>";
					echo "<td>";  echo $row['email'];  echo "</td>";
					echo "<td>";  echo $row['contact'];  echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
		}



		
	?>

</body>
</html>
