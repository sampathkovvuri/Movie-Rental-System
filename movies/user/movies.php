<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>MOVIES</title>
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
				<input type="text" name="search" placeholder="search movies..">
				<button style="background-color:#6db6e9e6 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			
		</form>
	</div>
	<h2>List of Movies</h2>
	<?php

		$res=mysqli_query($db,"SELECT * FROM MOVIES,hero,heroine,director where movies.hid = hero.id and movies.herid = heroine.id and movies.did = director.id");
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM MOVIES INNER JOIN hero ON movies.hid = hero.id INNER JOIN director ON movies.did = director.id INNER JOIN heroine ON movies.herid = heroine.id where name like '%$_POST[search]%' OR first_dir like '%$_POST[search]%' 
				OR first_h like '%$_POST[search]%' OR first_her like '%$_POST[search]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No movie found with that name. Try searching again.";
			}
			else
			{

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Movie";  echo "</th>";
				echo "<th>"; echo "Director";  echo "</th>";
				echo "<th>"; echo "Hero";  echo "</th>";
				echo "<th>"; echo "Heroine";  echo "</th>";
				echo "<th>"; echo "Genre";  echo "</th>";
				echo "<th>"; echo "Cost(Rs)";  echo "</th>";
				echo "<th>"; echo "";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				
				echo "<tr>";
				echo "<td>"; echo $row['mid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['first_dir'];echo str_repeat('&nbsp;', 2);echo $row['last_dir']; echo "</td>";
				echo "<td>"; echo $row['first_h']; echo str_repeat('&nbsp;', 2);echo $row['last_h']; echo "</td>";
				echo "<td>"; echo $row['first_her']; echo str_repeat('&nbsp;', 2);echo $row['last_her']; echo "</td>";
				echo "<td>"; echo $row['genre']; echo "</td>";
				echo "<td>"; echo $row['cost']; echo "</td>";
				echo "<td>"; ?> <p>
        <form class="navbar-form" method="post" name="form1">
			<div>
				<input type="hidden" name="hidden_name" value="<?php echo $row['mid']; ?>" />
				<button type="submit" name="submit1" class="btn btn-default btn-sm">
          			<span class="glyphicon glyphicon-shopping-cart"></span> ADD
        		</button>
			</div>
			
		</form>
		 <?php "</td>";

				echo "</tr>";
				echo "</tr>";
			}
		echo "</table>";
		}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM MOVIES,hero,heroine,director where movies.hid = hero.id and movies.herid = heroine.id and movies.did = director.id;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6e9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Movie";  echo "</th>";
				echo "<th>"; echo "Director";  echo "</th>";
				echo "<th>"; echo "Hero";  echo "</th>";
				echo "<th>"; echo "Heroine";  echo "</th>";
				echo "<th>"; echo "Genre";  echo "</th>";
				echo "<th>"; echo "Cost(Rs)";  echo "</th>";
				echo "<th>"; echo "";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<tr>";
				echo "<td>"; echo $row['mid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['first_dir'];echo str_repeat('&nbsp;', 2);echo $row['last_dir']; echo "</td>";
				echo "<td>"; echo $row['first_h']; echo str_repeat('&nbsp;', 2);echo $row['last_h']; echo "</td>";
				echo "<td>"; echo $row['first_her']; echo str_repeat('&nbsp;', 2);echo $row['last_her']; echo "</td>";
				echo "<td>"; echo $row['genre']; echo "</td>";
				echo "<td>"; echo $row['cost']; echo "</td>";
				echo "<td>"; ?> <p>
        <form class="navbar-form" method="post" name="form1">
			<div>
				<input type="hidden" name="hidden_name" value="<?php echo $row['mid']; ?>" />
				<button type="submit" name="submit1" class="btn btn-default btn-sm">
          			<span class="glyphicon glyphicon-shopping-cart"></span> ADD
        		</button>
			</div>
			
		</form>
		 <?php "</td>";

				echo "</tr>";
				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO cart VALUES('', '$_SESSION[login_user]', '$_POST[hidden_name]'); ");
				?>
					<script type="text/javascript">
						alert("Successfuly added to the cart.");
					</script>
				<?php
			}
			else
			{
							?>
					<script type="text/javascript">
						alert("Please Login First.");
					</script>
				<?php
			}
		}

	?>
</body>
</html>