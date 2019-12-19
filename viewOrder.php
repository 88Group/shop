<!DOCTYPE html>
<html>
<head>
	<title>View orders</title>
	<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
  font-family: Arial, Helvetica, sans-serif;

}
.tot
{
	  font-family: Arial, Helvetica, sans-serif;
	  font-size: 20px;
	  font-weight: 10px;
}
.btn{
			  background-color: lightpink;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
			  text-decoration: none;
			}
.btnn
{
	background-color: #f75757;
			  color: white;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  cursor: pointer;
			  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
<?php 
$con=mysqli_connect("localhost","root","","shop");
session_start();
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
elseif(isset($_SESSION["uid"]))
	{?>
		<a href="index.php" class="btn">Home</a><br><br><br>
		<?php
		$uid = mysqli_escape_string($con,$_SESSION["uid"]);
		$sql1 = "SELECT * FROM orders WHERE userID = '$uid' AND paid = 'N'";
		$res1 = mysqli_query($con,$sql1);
	if (!$res1) 
	{
	die('Error: ' . mysqli_error($con));
	 } 
	 else
	 {
	 	$subTotal = 0;
	 	echo "<div class='tot'>Not paid orders of userID: ".$uid."</div><br>";
	 	echo '<table>';
	 	echo '<tr><th> OrderID  </th><th> ProductID </th><th> Product Name</th><th> Price </th><th> Quantity </th><th> Free </th><th>Total </th><th> EDIT</th></tr>';
	 	while($row1 = mysqli_fetch_array($res1))
	 	{
	 		echo '<tr><td>'.$row1["orderID"] .'</td><td>'.$row1["productID"].'</td>';
	 		$pid = $row1['productID'];
	 		$sql2 = "SELECT name,price,brand FROM product WHERE productID = '$pid' LIMIT 1";
			$res2 = mysqli_query($con,$sql2);
			if (!$res2) 
				{
				die('Error: ' . mysqli_error($con));
				} 
			else
			{
				$total = 0;
				$totPro = 0;
				$free = 0;
				$row2 = mysqli_fetch_array($res2);
				echo '<td>'.$row2["name"]. '</td><td>'.$row2["price"].'</td>';
				$today = date("Y-m-d");
				$brnd = $row2['brand'];
				$brnd = addslashes($brnd);
				$sql3 = "SELECT proID, percent,value,brand FROM promotion WHERE brand LIKE '$brnd' && '$today' BETWEEN sDAte AND eDate LIMIT 1";
				$res3 = mysqli_query($con,$sql3);
				if (!$res3) 
					{
					die('Error: ' . mysqli_error($con));
					 }
				else
				{
					if(mysqli_num_rows($res3)>0)
					{
				$quan = $row1["quantity"];
				while($row3 = mysqli_fetch_array($res3))
					{						
						if($row3['proID']==1) 
						{
							$total = (ceil($quan/2))*$row2["price"];
							if($quan%2==1)
							{
								$free = 1; 
							}
							else
							{
								$free = 0;
							}
							
						}
						else if($row3['proID']==2)
						{
							if($quan%3==0)
							{
								$total = $row2["price"]*(2/3);
								$free = 0;
							}
							else if($quan%3==1)
							{
								$total = ((2*ceil($quan/3))-1)*$row2["price"];
								$free = (ceil($quan/3))-1;
							}
							else
							{
								$total = (2*ceil($quan/3))*$row2["price"];
								if(ceil($quan/3)==1)
								{
									$free = 1;
								}
								else
								{
									$free = (ceil($quan/3))-1;
								}
							}
						}
						else if ($row3['proID']==3) 
						{
							$total = ($quan*$row2["price"])*(1-($row3['percent']/100));
							$free = 0;
						}
						else if($row3['proID']==4)
						{
							$total =($quan*$row2["price"])-$row3['value'];
							$free = 0;
						}
						$totPro = $totPro + $total;
						$subTotal = $subTotal + $totPro;
					}
					}				
				echo '<td>'.$row1["quantity"].'</td>';
				if($free == 0)
				{
					echo '<td> - </td>';
				}
				else
				{
					echo '<td>'.$free.'</td>';
				}
				if($totPro>0)
				{
					echo '<td>'.$totPro.'</td>';				}
				else
				{
					$total = $row1["quantity"]*$row2["price"];
					echo '<td>'.$total.'</td>';
					$subTotal = $subTotal + $total;
				}
				echo '<td><form action = "del.php" method="post"><input type="hidden" name="oid" value="'.$row1["orderID"].'">';
				echo '<input class = "btnn" type="submit" name="sub" value="Delete"></form></td></tr>';
				}

			}
	 	}
	 	echo '</table><br>';
	 	echo "<div class='tot'>Total amount:   ".$subTotal." Baht</div>";
	 }
	} 

mysqli_close($con);
?>
</body>
</html>