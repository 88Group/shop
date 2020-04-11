<!DOCTYPE html>
<html>
<head>
	<title>Promotion</title>
		<link rel="stylesheet" href="style.css">
	<style>
		.box {
			width: 30%;
  			border: 4px solid #fd8585e3;
  			padding-left: 40px;
			}
				p{
			font-family: Arial, Helvetica, sans-serif;
			margin: 8px 0;
			text-indent: 10px;
			font-size: 18px;
		}
		input[type=submit]{
			background-color: #fb6e6ee3;
			color: #ffffff;
		}
	</style>
</head>
<body>
<div class="box">
<form action="pro.php" method="post">
	<br><p>Type:<p>
	<div id="tp">
		<p><input type="radio" name="pro" value="1" class="check">Buy 1 get 1<br><p>
		<p><input type="radio" name="pro" value="2" class="check">Buy 2 get 1<br><p>
		<p><input type="radio" name="pro" value="3" onclick="typeCheck('tp',1)" class="check">Percentage<br><p>
		<p><input type="radio" name="pro" value="4" onclick="typeCheck('tp',2)" class="check">Voucher<br><p>
	</div>
	<br><p>Starting Date:<p>
	<input id="date1" type="date" name="sDate" required="required"><br>
	<br><p>Ending Date:<p>
	<input id="date2" type="date" name="eDate" required="required"><br>
	<br><p>Brand:<p>
<?php 
$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");
session_start();
// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
else
{
	$sql = "SELECT DISTINCT brand FROM product";
	$res = mysqli_query($con,$sql);
	if (!$res) 
	{
	die('Error: ' . mysqli_error($con));
	 }
	 else
	{
	while($row = mysqli_fetch_array($res))
		{
		echo '<p><input type="checkbox" name="br[]" value="'.$row["brand"].'" class="check">'.$row["brand"].'<p>';
	 }
	}
}
mysqli_close($con);
?>
<br><input type="submit" name="sub" value="Submit">
</form>
</div>
<script>
	var counter = 1;
	function typeCheck(divName,num) {
     if (counter == 1)  {
          var newdiv = document.createElement('div');
          if (num==1) {
          	newdiv.innerHTML = " <br><p> Percent:</p>&nbsp&nbsp<input type='text' name='per'><br>";
          	document.getElementById(divName).appendChild(newdiv);
          	}
          else if (num==2) {
          	newdiv.innerHTML = "<br><p> Price:</p>&nbsp&nbsp<input type='text' name='pri'><br>";
          	document.getElementById(divName).appendChild(newdiv);
          }
          counter++;
     }
     else
     {
     	window.location.href = 'promo.php';
     }
	}
</script>
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("date1").setAttribute("min", today);
document.getElementById("date2").setAttribute("min", today);
</script>

</body>
</html>