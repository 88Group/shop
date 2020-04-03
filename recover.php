<?php 

session_start();
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
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
 	$sql2 = "UPDATE product SET stock = stock - '$quan' WHERE productID = '$pid' ";
 	$res = mysqli_query($con,$sql);
 	$res2 = mysqli_query($con,$sql2);

 	if(!$res || !$res2)
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