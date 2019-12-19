<?php 
$con=mysqli_connect("localhost","root","","shop");

// Check connection 
if (mysqli_connect_errno()) 
	{ 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } 
	else
	{
	if(isset($_POST['sub']) && isset($_POST['pro']) && isset($_POST['br']))
		{
		$type = mysqli_real_escape_string($con,$_POST['pro']);
		$sDate = mysqli_real_escape_string($con,$_POST['sDate']);
		$eDate = mysqli_real_escape_string($con,$_POST['eDate']);
		if(isset($_POST['per']))
			{
			$per = mysqli_real_escape_string($con,$_POST['per']);
			$pri = 0;	
			}
		else if(isset($_POST['pri']))
			{
			$per = 0;
			$pri = mysqli_real_escape_string($con,$_POST['pri']);
			}
		else
			{
				$per = 0;
				$pri = 0;
			}
		$brandCleaned = [];
		foreach( $_POST['br'] as $val )
	    $brandCleaned[] = mysqli_real_escape_string( $con, $val );
		for ($i=0; $i < count($brandCleaned); $i++) 
			{ 
			$brnd = $brandCleaned[$i];
			$sql = "INSERT INTO promotion (proID,percent,value,sDate,eDate,brand) VALUES ('$type','$per','$pri','$sDate','$eDate','$brnd')";
			$res = mysqli_query($con,$sql);
		if (!$res) 
			{
			die('Error: ' . mysqli_error($con));
	 		} 
			}
		}
	else
	{
		?><script> 
			alert("Please complete the form");
			history.go(-1);
		</script>" 
		<?php
	}


	}

mysqli_close($con);
 ?>