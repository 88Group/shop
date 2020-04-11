<!DOCTYPE html>
<html>
<head>
	<title>Make up product</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<button class="btn" onclick="history.go(-1)">Back</button>
<div class="rg" style="float: right;">
		<form action="searched.php" method="post">
			<input type="text" name="target" placeholder="Serach a product">
			<button class="button">Search</button>
		</form>		
	</div>
<?php 

$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	$sql = "SELECT * FROM product WHERE category = 'Make up'";
	$res = mysqli_query($con,$sql);
	if (!$res) 
	{ 
	die('Error: ' . mysqli_error($con)); } 
	else
	{
		echo '<br><br><br><div class="row">';
		while($row = mysqli_fetch_array($res))
		{
				echo '<div class = "box">';
				echo '<a href="proInfo.php?pName='.$row['name'].'">';
				echo '<img src= "data:image/jpeg;base64,' .base64_encode($row['image']).'">';
				echo '</a>';
				echo '<a href="proInfo.php?pName='.$row["name"].'" style ="text-decoration: none;">';
				echo '<div class = "content"  style = "color:black;"><p>'.$row['name']. '</p></div></a></div>';
		}
		echo '</div>';
	}

mysqli_close($con);
 ?>

</body>
</html>