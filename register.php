<!DOCTYPE html>
<html>
<head>
	<title>Registered</title>
	<style>
		a{
			  background-color: lightpink;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
			  text-decoration: none
			}
	</style>
</head>
<body>
<?php 

$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	elseif(isset($_POST['submit']))
	{
		$id = mysqli_real_escape_string($con,$_POST['userID']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$fName = mysqli_real_escape_string($con,$_POST['fName']);
		$lName = mysqli_real_escape_string($con,$_POST['lName']);
		$DOB = mysqli_real_escape_string($con,$_POST['DOB']);
		$newDate = date("d-m-Y", strtotime($DOB));
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$sql = "INSERT INTO users (userID,password,fName,lName,DOB,email) VALUES ('$id','$password','$fName','$lName','$DOB','$email')";
		$res = mysqli_query($con,$sql);
		if (!$res) 
			{
			die('Error: ' . mysqli_error($con));
	 		} 
	 	else
	 	{
	 		echo "<script> window.location.href = 'login.php';</script>";
	 	}

	}


mysqli_close($con);
 ?>

</body>
</html>