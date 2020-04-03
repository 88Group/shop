<?php 
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
session_start();
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	elseif(isset($_POST['submit']) && !isset($_SESSION["uid"]))
	{
		$id = mysqli_real_escape_string($con,$_POST['userID']);
		$pass = mysqli_real_escape_string($con,$_POST['password']);
		$sql = "SELECT * FROM users WHERE userID = '$id' AND password = '$pass' LIMIT 1";
		$res = mysqli_query($con,$sql);
	if (!$res) 
	{
	die('Error: ' . mysqli_error($con));
	 } 
	 else
	 {
	 	if(mysqli_num_rows($res)==0)
	 	{
	 		echo "UserID or Password is/are incorrect";
	 	}
	 	else
	 	{
	 	
				$_SESSION["uid"] = $id;
				if(isset($_SESSION["pid"]) && isset($_SESSION["quan"]))
				{
					echo "<script> window.location.href = 'recover.php';</script>";
				}
				else
				{
					echo "<script> window.location.href = 'index.php';</script>";
				}
	 	}
	 }
	}
	elseif (isset($_SESSION["uid"])) {
		echo "<script> alert('You are already logged in');</script>";
		echo "<script> window.location.href = 'index.php';</script>";
	}

mysqli_close($con);
 ?>