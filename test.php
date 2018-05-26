<?php
	@include 'dbconnect.php';

	$sql = "call sp_buyanimals('18', '1', '10')";
	if(mysqli_multi_query($con,$sql))
	{
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);    
    	$row2=mysqli_fetch_all($result);
    	print_r($row2[0][1]);   
	}
	else
	{
		echo "njing";
	}

?>