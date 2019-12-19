<!DOCTYPE html>
<html>
<head>
	<title>Promotion</title>
	<style>
		.box {
			width: 30%;
  			border: 5px solid lightpink;
			}
		input[type=date] {
		  width: 300px;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}
		input[type=submit]{
			margin-left: 50px;
			background-color: lightpink;
			  text-decoration: none;
			  color: black;
			  padding: 16px;
			  font-size: 16px;
			  border: none;
			  font-family: Arial, Helvetica, sans-serif;
		}
		p{
			font-family: Arial, Helvetica, sans-serif;
			margin: 8px 0;
			text-indent: 50px;
		}
	</style>
</head>
<body>
<div class="box">
<form action="pro.php" method="post">
	<br><p>Type:<p>
	<div id="tp">
		<p><input type="radio" name="pro" value="1">Buy 1 get 1<br><p>
		<p><input type="radio" name="pro" value="2">Buy 2 get 1<br><p>
		<p><input type="radio" name="pro" value="3" onclick="typeCheck('tp',1)">Percentage<br><p>
		<p><input type="radio" name="pro" value="4" onclick="typeCheck('tp',2)">Voucher<br><p>
	</div>
	<br><p>Starting Date:<p>
	<input id="date1" type="date" name="sDate" required="required"><br>
	<br><p>Ending Date:<p>
	<input id="date2" type="date" name="eDate" required="required"><br>
	<br><p>Brand:<p>
<?php 
$con=mysqli_connect("localhost","root","","shop");
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
		echo '<p><input type="checkbox" name="br[]" value="'.$row["brand"].'">'.$row["brand"].'<p>';
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
          	newdiv.innerHTML = " Percent:<br><input type='text' name='per'><br>";
          	document.getElementById(divName).appendChild(newdiv);
          	}
          else if (num==2) {
          	newdiv.innerHTML = " Price:<br><input type='text' name='pri'><br>";
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