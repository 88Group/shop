<?php 
	session_start();
	$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
	if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	elseif(isset($_POST["submit2"]) || isset($_POST["submit1"]) )
	{
	$quantity = mysqli_real_escape_string($con,$_POST['quantity']);
	$id = mysqli_real_escape_string($con,$_POST['pID']);
	if(!isset($_SESSION["uid"]))
	{
		$_SESSION["pid"] = $id;
		$_SESSION["quan"] = $quantity;
		echo "<script> window.location.href = 'login.php';</script>";
	}
	else
	{
	$uid =  mysqli_real_escape_string($con,$_SESSION["uid"]);
	$sql = "INSERT INTO orders (userID,productID,quantity) VALUES('$uid','$id','$quantity')";
	$sql2 = "UPDATE product SET stock = stock - '$quantity' WHERE productID = '$id' ";
 	$res = mysqli_query($con,$sql);
 	$res2 = mysqli_query($con,$sql2);
 	if(!$res || !$res2)
 	{
 		die('Error: ' . mysqli_error($con));
 	}
 	else
 	{
 		echo "<script> window.location.href = 'index.php';</script>";
 	}
	}
}



mysqli_close($con);
 ?>
