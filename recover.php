<?php 

session_start();
$con=mysqli_connect("localhost","root","","shop");
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
elseif(isset($_SESSION["pid"]) && isset($_SESSION["quan"]))
{
	$pid = mysqli_real_escape_string($con,$_SESSION["pid"]);
	$uid = mysqli_real_escape_string($con,$_SESSION["uid"]);
	$quan = mysqli_real_escape_string($con,$_SESSION["quan"]);
 	$sql = "INSERT INTO orders (userID,productID,quantity) VALUES('$uid','$pid','$quan')";
 	$res = mysqli_query($con,$sql);
 	if(!$res)
 	{
 		die('Error: ' . mysqli_error($con));
 	}
 	else
 	{
 		unset($_SESSION["pid"]);
 		unset($_SESSION["quan"]);
 		echo "<script> window.location.href = 'index.php';</script>";
 	}
 } 

 ?>