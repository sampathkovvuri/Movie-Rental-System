<?php
  $db=mysqli_connect("localhost","root","","movierental");
  if(!$db)
  {
  	die("Connection failed: ". mysqli_connect_error());
  }
?>