<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>movies</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: #286090;
  background-image: url("images/a3.jpg");
  font-family: "Lato", sans-serif;
}
@media screen and (max-height: 450px)
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

.movie
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>


</head>
<body>


<div id="main">
  <div class="container" style="text-align: center;">
    
    <form class="movie" action="" method="post">
        
        <input type="text" name="mid" class="form-control" placeholder="Movie id" required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Title" required=""><br>
        <input type="text" name="did" class="form-control" placeholder="Director ID" required=""><br>
        <input type="text" name="hid" class="form-control" placeholder="Hero ID" required=""><br>
        <input type="text" name="herid" class="form-control" placeholder="Heroine ID" required=""><br>
        <input type="text" name="genre" class="form-control" placeholder="Genre" required=""><br>
        <input type="text" name="cost" class="form-control" placeholder="Cost" required=""><br>

        <button style="text-align: center;" class="btn btn-info" type="submit" name="submit">ADD</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO movies VALUES ('$_POST[mid]', '$_POST[name]', '$_POST[did]', '$_POST[hid]', '$_POST[herid]', '$_POST[genre]', '$_POST[cost]') ;");
        ?>
          <script type="text/javascript">
            alert("movie Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
</div>
</body>
