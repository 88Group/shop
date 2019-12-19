<?php 
session_start();
$con=mysqli_connect("localhost","root","","shop");
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
	elseif(isset($_SESSION["uid"]))
	{
		echo "<script> window.location.href = 'login.php';</script>";

	}
session_destroy();
mysqli_close($con);
 ?>