<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
	<style>
			.box {
			width: 28%;
  			border: 4px solid #fd8585e3;
			}
		p{
			font-family: Arial, Helvetica, sans-serif;
			margin: 8px 0;
			text-indent: 30px;
			font-size: 18px;
		}
				input[type=submit]{
			margin-left: 30px;
			background-color: #fb6e6ee3;
			color: #ffffff;
		}
		/*.box {
			width: 30%;
  			border: 5px solid lightpink;
			}
		input[type=text], input[type=password], input[type=date],input[type=email]{
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
		.reg{
			color: black;
			text-decoration: none;
			float: right;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
		}*/
	</style>
</head>
<body>
	<div class="box">
	<form action="register.php" method="post">
		<br><p>UserID:<p>
		<input type="text" name="userID" placeholder="Enter userID" required><br>
		<p>Password:<p>
		<input type="password" name="password" placeholder="Enter password" required><br>
		<p>Firstname:<p>
		<input type="text" name="fName" placeholder="Enter first name" required><br>
		<p>Lastname:<p>
		<input type="text" name="lName" placeholder="Enter last name" required><br>
		<p>Date of birth:<p>
		<input id="date" type="date" name="DOB"><br>
		<p>E-mail:<p>
		<input type="email" name="email" placeholder="Enter email" required><br><br>
		<input type="submit" name="submit" value="Sign up">
	</form>
	<a href="login.php" class="reg"> already registered?&nbsp;</a> <br><br>
</div>
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
document.getElementById("date").setAttribute("max", today);
</script>
</body>
</html>