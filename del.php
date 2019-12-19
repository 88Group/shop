<?php 
$con = mysqli_connect("localhost","root","","shop");
if (mysqli_connect_errno()) 
{
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}
elseif(isset($_POST["sub"]))
{
	$oid = mysqli_escape_string($con,$_POST["oid"]);
	$sql = "DELETE FROM orders WHERE orderID = '$oid'";
	$res = mysqli_query($con,$sql);
	if(!$res)
	{
		die('Error: ' . mysqli_error($con));
	}
	else
	{
		echo "<script> window.location.href = 'viewOrder.php';</script>";
	}
}

mysqli_close($con);
 ?>