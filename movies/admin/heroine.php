<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>HEROINES</title>
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
				<input type="text" name="search" placeholder="search heroines..">
				<button style="background-color:#6db6e9e6 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			
		</form>
	</div>
	<h2>List of Heroines</h2>
	<?php

		$res=mysqli_query($db,"SELECT * FROM `heroine` ORDER BY `heroine`.`id` ASC;");
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM `heroine` where first_her  like '%$_POST[search]%' OR last_her like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No heroine found with that name. Try searching again.";
			}
			else
			{

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "First Name";  echo "</th>";
				echo "<th>"; echo "DOB";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['last_her']; echo "</td>";
				echo "<td>"; echo $row['first_her']; echo "</td>";
				echo "<td>"; echo $row['dob_her']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `heroine` ORDER BY `heroine`.`id` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "First Name";  echo "</th>";
				echo "<th>"; echo "DOB";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['last_her']; echo "</td>";
				echo "<td>"; echo $row['first_her']; echo "</td>";
				echo "<td>"; echo $row['dob_her']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</body>
</html>