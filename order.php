<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","shop");
	if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	elseif(isset($_POST["submit2"]))
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
 	$res = mysqli_query($con,$sql);
 	if(!$res)
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
