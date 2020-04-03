<?php 

$con=mysqli_connect("us-cdbr-iron-east-04.cleardb.net","b966a2a16a969f","01d02abd","heroku_0b7502a16e114a3");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 

// escape variables for security
$file = $_FILES['image']['tmp_name'];
if(!isset($file))
{
	echo "Please select an image";
}
elseif(isset($_POST["submit"]))
{

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	if($image_size == FALSE)
	{
		echo "That is not an image";
	}
	else
	{
	$prodName = mysqli_real_escape_string($con, $_POST['prodName']); 
	$category = mysqli_real_escape_string($con, $_POST['category']); 
	$category = addslashes($category);
	$price = mysqli_real_escape_string($con, $_POST['price']);
	$color = mysqli_real_escape_string($con, $_POST['color']); 
	$stock = mysqli_real_escape_string($con, $_POST['stock']); 
	$company = mysqli_real_escape_string($con, $_POST['company']); 

	$sql="INSERT INTO product (name,category,price,color,stock,image,brand) VALUES ('$prodName', '$category', '$price','$color','$stock','$image','$company')"; 

if (!mysqli_query($con,$sql)) 
	{ 
	die('Error: ' . mysqli_error($con)); } 

echo "1 record added";  
	}
}
mysqli_close($con);
?>