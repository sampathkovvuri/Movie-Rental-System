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
		body {
  background-color: #caddec;
  font-family: "Lato", sans-serif;
}
</style>
	<!------------search bar-------->
			
		</form>
	</div>
	<h2>Movies in Cart</h2>
	<?php
		$price = 0;
		$res=mysqli_query($db,"SELECT * 
			FROM MOVIES,hero,heroine,director
			WHERE mid IN(
			SELECT mid 
			FROM cart 
			WHERE username='$_SESSION[login_user]'
			) AND movies.hid = hero.id and movies.herid = heroine.id and movies.did = director.id");

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
				$price = $price +$row['cost'];
				echo "<td>"; ?> <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div>
				<input type="hidden" name="hidden_name" value="<?php echo $row["mid"]; ?> "/>
				<button type="submit" name="submit1" class="btn btn-default btn-xs">
          			<span class="glyphicon glyphicon-remove"></span> REMOVE
        		</button>
			</div>
			
		</form><?php "</td>";

				echo "</tr>";
			}
		echo "</table>";
		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"DELETE from cart where mid = '$_POST[hidden_name]'; ");
				?>
					<script type="text/javascript">
						alert("Successfuly removed from the cart.");
						window.location.href = window.location.href.split( '#' )[0];
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
		 echo '<span style="margin-left:650px;color: Black;font-family:Magnificent; font-size: 28px;">Total price = </span>';
		echo '<span style="font-size: 16pt;">' . $price . ' Rupees</span>';
	?>
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div style="text-align: center;">
				<p>
		        <a href="" class="btn btn-info btn-lg">
		          <span class="glyphicon glyphicon-check"></span>     Proceed To Payment
		        </a>
		      </p> 
			</div>
		</form>
	</div>
</body>
</html>