<?php
	@include 'dbconnect.php';
	$sql = "call sp_buyanimals('20', '1', '2')";
	
	if(mysqli_multi_query($con,$sql))
	{
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);    
    	$row2=mysqli_fetch_all($result);
    	print_r($row2); 
	}
	else
	{
		echo "njing";
	}

?>