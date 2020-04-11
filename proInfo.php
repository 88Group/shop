<!DOCTYPE html>
<html>
<head>
	<title>Product information </title>
	<link rel="stylesheet" href="style.css">
		<style>
		img{
  			max-width: 300px;
  			max-height: 400px;
  			float: left;
		}
		.f{
			margin-top: 40px;
		}
			input[type=submit]{
			background-color: #fb6e6e;
			color: #ffffff;
			padding: 14px;
			outline: none;
		}
	
		input[type=number]{
			max-width: 80px;
		}
	
		</style>
</head>
<body>
	<button class="btn" onclick="history.go(-1)">Back</button>
<?php 
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
session_start();
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
	else
	{
		if(isset($_GET['pName']))
		{
		$pName = mysqli_real_escape_string($con,$_GET['pName']);
		$sql = "SELECT * FROM product WHERE name = '$pName'";
		$res = mysqli_query($con,$sql);
	if (!$res) 
	{
	die('Error: ' . mysqli_error($con));
	 } 
	else
		{
		while($row = mysqli_fetch_array($res))
			{
				echo '<div class = "f">';
				echo '<img src= "data:image/jpeg;base64,' .base64_encode($row['image']).'">';
				echo '<div class = "probox"><div class = "txt">';
				echo '<br>Product Name:&nbsp&nbsp'.$row['name'];
				echo '<br>Category:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .$row['category'];
				if($row['color']!= NULL)
				{
					echo '<br>Color:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .$row['color'];
				}
				echo '<br>Price:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['price'].' Baht';
				$today = date("Y-m-d");
				$brnd = $row['brand'];
				$brnd = addslashes($brnd);
				$sql2 = "SELECT proID, percent,value,brand FROM promotion WHERE brand LIKE '$brnd' && '$today' BETWEEN sDAte AND eDate LIMIT 1";
				$res2 = mysqli_query($con,$sql2);
				if (!$res2) 
					{
					die('Error: ' . mysqli_error($con));
					 } 
				else
				{
					echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					while($row2 = mysqli_fetch_array($res2))
					{
						
						if($row2['proID']==1) 
						{
						echo '&nbsp&nbsp&nbspBuy 1 Get 1 Free !';

						}
						else if($row2['proID']==2)
						{
						echo '&nbsp&nbsp&nbspBy 2 Get 1 Free !';
						}
						else if ($row2['proID']==3) 
						{
						echo '&nbsp&nbsp&nbspGet&nbsp&nbsp'.$row2['percent'].'&nbsppercent off !';
						}
						else if($row2['proID']==4)
						{
						echo '&nbsp&nbsp&nbspGet&nbsp&nbsp'.$row2['value'].'&nbspBaht off !';
						}
					}
				echo '<br>Stock:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['stock'];
				echo '<br>Brand:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['brand'].'<br>';
				echo '<div class = "orderbtn"><form action = "../order.php" method="post"> <input type="hidden" name="pID" value="'.$row['productID'].'">';
				echo 'quantity:&nbsp<input type = "number" name="quantity" min="1" max = "'.$row['stock'].'">';
				echo '&nbsp<input type="submit" name="submit2" value="Order" class="btn"></form></div><br>';
				echo '</div></div></div>';
				}

			}
		}
	}
	}
mysqli_close($con);
?>
</body>
</html>