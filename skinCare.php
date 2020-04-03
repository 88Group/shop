<!DOCTYPE html>
<html>
<head>
	<title>Skin care product</title>
	<style>
		img {
  max-width:210px;
  max-height: 280px;
  float: left;
}
.imm {
  max-width:210px;
  max-height: 280px;
  float: left;
}
.content{
  width:200px;
  text-align: center;
  display:block;
  font-size: 20px;
  font-family: Arial, Helvetica, sans-serif;
}
.box{
  width: 220px;
  height: 290px;
  padding: 10px;
  background-color: white;

}
.column {
  float: left;
  width: 350px;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
  align-self: center;
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
	</style>
</head>
<body>
	<button class="btn" onclick="history.go(-1)">Back</button>
<div class="right" style="float: right;">
		<form action="searched.php" method="post">
			<input type="text" name="target" placeholder="Serach a product">
			<button type="submit" style="background-color: lightpink;">Search</button>
		</form>		
	</div>
<?php 

$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	$sql = "SELECT * FROM product WHERE category = 'Skin care'";
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

mysqli_close($con);
 ?>

</body>
</html>