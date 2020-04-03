<!DOCTYPE html>
<html>
<head>
	<title>Product information </title>
		<style>
		img{
			max-width:300px;
  			max-height: 400px;
  			float:  left;


		}
		.box{
			background-color: lightpink;
			max-width: 750px;
  			max-height: 400px;
  			margin-top: 25px;
  			margin-left:300px;

		}
		.txt{
			margin-left:50px;
			margin-right:50px;
			line-height: 1.8;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 20px;
		}
		.btn{
			  background-color: lightpink;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
			}
		a{
			text-decoration: none;
		}
		input[type=submit]{
			background-color: white;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
			  float: right;
		}
		.orderbtn{
			float: right;
		}
		</style>
</head>
<body>
<button class="btn" onclick="history.go(-1)">Back</button><br>
<?php 
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	elseif(isset($_POST['target']))
	{
		$pName = mysqli_real_escape_string($con,$_POST['target']);
		$sql = "SELECT * FROM product WHERE name LIKE '%$pName%'";
		$res = mysqli_query($con,$sql);
	if (!$res) 
	{
	die('Error: ' . mysqli_error($con));
	 } 
	else
		{
			if(mysqli_num_rows($res)>0)
			{
			while($row = mysqli_fetch_array($res))
			{
				echo '<div class = "f">';
				echo '<img src= "data:image/jpeg;base64,' .base64_encode($row['image']).'">';
				echo '<div class = "box"><div class = "txt">';
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
				echo '<div class = "orderbtn"><form method="post" action = "../order.php"> <input type="hidden" name="pID" value='.$row['productID'].'>';
				echo 'quantity:<input type = "number" name="quantity" min="1" max ='.$row['stock'].'>';
				echo '&nbsp&nbsp<input type="submit" name="submit1" value="Order"></form></div><br>';
				echo '<br><br></div></div></div>';

			}
		}
	}
		else
		{
			echo 'Product not found';
		}
		}
	}
mysqli_close($con);
 ?>
</body>
</html>