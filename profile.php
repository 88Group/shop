<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
	<style>
		.box {
			width: 28%;
  			border: 4px solid #fd8585e3;
  			height: auto;
  			padding: 40px;
  			margin-left: auto;
  			margin-right: auto;
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
		echo '<button class="btn" onclick="history.go(-1)">Back</button>';
		echo '<div class="pro"> Profile </div>';
		echo '<br><div class="box">';
		while($row = mysqli_fetch_array($res))
		{
			echo '<div class="txt">';
			echo 'UserID: '.$row['userID'].'<br>';
			echo 'Firstname: '.$row['fName'].'<br>';
			echo 'Lastname: '.$row['lName'].'<br>';
			echo 'Date of birth: '.$row['DOB'].'<br>';
			echo 'Email: '.$row['email'];
			echo '</div>';
		}
		echo "</div>";
	}

}

mysqli_close($con);
 ?>
</body>
</html>