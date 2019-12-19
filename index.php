<!DOCTYPE html>
<html> 
<head>
	<title> Home </title>
	<link rel="stylesheet" href="style.css">
	<style>
		.btn{
			  display: inline-block;
			  background-color: lightgrey;
			  text-decoration: none;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
			}
			.usr{
				display: inline-block;
				background-color: lightpink;
			  text-decoration: none;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  font-family: Arial, Helvetica, sans-serif;
			}
			.err{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
			}
			a{
				text-decoration: none;
				color: black;
			}
			
	</style>
</head>
<body>
	<div class="rg" style="float: right;">
		<form action="searched.php" method="post">
			<input type="text" name="target" placeholder="Serach a Product">
				<button class="button">Search</button>
		</form>
	</div>
	<div class="dropdown">
  <button class="dropbtn">Category</button>
  <div class="dropdown-content" style="left:0;">
  <a href="skinCare.php">Skin care</a>
  <a href="makeUp.php">Make up</a>
  </div>
</div>
<?php session_start();
if(isset($_SESSION["uid"]))
	{
	echo '<a href="logout.php" class="btn">Log out</a>';
	echo '<div class="usr">';
	echo '<a href="profile.php">User ID: ' .$_SESSION["uid"].'</a></div>';
	echo '<a href="viewOrder.php" class="btn">View orders</a>';
	}
else
{
	echo '&nbsp;<a href="login.php" class="usr">&nbsp;Login&nbsp;</a>';
}
$con=mysqli_connect("localhost","root","","shop");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	else
	{
	$sql = "SELECT * FROM product";
	$res = mysqli_query($con,$sql);
	if (!$res) 
	{ 
	die('Error: ' . mysqli_error($con)); } 
	else
	{
		echo '<br><br><br><div class="row">';
		while($row = mysqli_fetch_array($res))
		{
				echo '<div class="column">';
				echo '<div class = "box">';
				echo '<a href="proInfo.php/?pName='.$row['name'].'">';
				echo '<img src= "data:image/jpeg;base64,' .base64_encode($row['image']).'">';
				echo '</a>';
				echo '<a href="proInfo.php/?pName='.$row["name"].'" style ="text-decoration: none;">';
				echo '<div class = "content"  style = "color:black;"><p>'.$row['name']. '</p></div></a></div></div>';
		}
		echo '</div>';
	}
	}
mysqli_close($con);

 ?>
</body>
</html>