<?php 
$con = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
if (mysqli_connect_errno()) 
{
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
}
elseif(isset($_POST["sub"]))
{
	$oid = mysqli_escape_string($con,$_POST["oid"]);
	$sel = "SELECT productID,quantity FROM orders WHERE orderID = '$oid'"; 
	$result = mysqli_query($con,$sel);
	if(!$result)
	{
		die('Error: ' . mysqli_error($con));
	}
	else
	{
	$row = mysqli_fetch_array($result);
	$quantity = $row["quantity"];
	$pid = $row["productID"];
	$sql = "DELETE FROM orders WHERE orderID = '$oid'";
	$sql2 = "UPDATE product SET stock = stock + '$quantity' WHERE productID = '$pid'";
	$res = mysqli_query($con,$sql);
	$res2 = mysqli_query($con,$sql2);
	if(!$res || !$res2)
	{
		die('Error: ' . mysqli_error($con));
	}
	else
	{
		echo "<script> window.location.href = 'viewOrder.php';</script>";
	}
}
}
mysqli_close($con);
 ?>