<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
	<style>
		input{

		}
		.box {
			width: 28%;
  			border: 4px solid #fd8585e3;
  			height: 50vh;
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
	</style>
</head>
<body>
	<div class="box">
	<form action="validate.php" method="post"><br>
		<p>UserID:<p>
		<input type="text" placeholder="Enter userID" name="userID" required><br><br>
		<p>Password:<p>
		<input type="password" placeholder="Enter password" name="password" required><br><br>
		<input type="submit" value="Log in" name="submit">
	</form>	
	<a href="signUp.php" class="reg"> Not registered?&nbsp;</a> <br><br>
	</div>

</body>
</html>