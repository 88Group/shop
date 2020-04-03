<?php 
session_start();
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
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