<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		input{

		}
		.box {
			width: 30%;
  			border: 5px solid lightpink;
			}
		input[type=text], input[type=password] {
		  width: 300px;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}
		p{
			font-family: Arial, Helvetica, sans-serif;
			margin: 8px 0;
			text-indent: 50px;
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
		.reg{
			color: black;
			text-decoration: none;
			float: right;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
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