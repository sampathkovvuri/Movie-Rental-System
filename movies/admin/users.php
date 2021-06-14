<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>USERS INFORMATION</title>
</head>
<body>
	<style type="text/css">
		.srch{
    margin-left: 1100px;
}
		body {
  background-color: #caddec;
  font-family: "Lato", sans-serif;
}
</style>
	<!------------search bar-------->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div>
				<input type="text" name="search" placeholder="search users..">
				<button style="background-color:#6db6e9e6 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			
		</form>
	</div>
	<h2>List Of Users</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,phone,email FROM `users` where first like '%$_POST[search]%' OR username like '%$_POST[search]%' OR last like '%$_POST[search]%' OR email like '%$_POST[search]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No user found with that username. Try searching again.";
			}
			else
			{

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Phone";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,username,phone,email FROM `users`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Phone";  echo "</th>";
				echo "<th>"; echo "Email";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</body>
</html>