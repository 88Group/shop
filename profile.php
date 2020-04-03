<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>
		.box {
			width: 30%;
  			border: 5px solid lightpink;
			}
		.txt{
			color: black;
			text-decoration: none;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 18px;
			margin-left:50px;
			margin-right:50px;
			line-height: 2.0;
			text-indent: 50px;
		}
		.pro
		{
			color: grey;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 40px;
			margin-left:50px;
			margin-right:50px;
			line-height: 1.8;
			text-indent: 50px;
		}
	</style>
</head>
<body>
<?php 

$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
session_start();
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
elseif(isset($_SESSION["uid"]))
{
	$uid = $_SESSION["uid"];
	$sql="SELECT * FROM users WHERE userID = '$uid' LIMIT 1";
	$res = mysqli_query($con,$sql);
	if(!$res)
	{
		die('Error: ' . mysqli_error($con));
	}
	else
	{
		echo '<br><br><div class="pro"> Profile </div>';
		echo '<br><div class="box">';
		while($row = mysqli_fetch_array($res))
		{
			echo '<div class="txt">';
			echo '<br>UserID: '.$row['userID'].'<br>';
			echo 'Firstname: '.$row['fName'].'<br>';
			echo 'Lastname: '.$row['lName'].'<br>';
			echo 'Date of birth: '.$row['DOB'].'<br>';
			echo 'Email: '.$row['email'];
			echo '</div><br>';
		}
		echo "</div>";
	}

}

mysqli_close($con);
 ?>
</body>
</html>