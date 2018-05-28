<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$harga = @$_POST['price'];
	$user2 = @$_POST['userdibeli'];
	$item = @$_POST['id_makanan'];
	$quantity = @$_POST[ 's_jumlah'];
	$submit = @$_POST[ 'submit'];



	if($submit)
	{	
		$sql = "call sp_beliprodukmesin('$user', '$item', '$user2', '$quantity',  '$harga')";
		if(mysqli_multi_query($con,$sql))
		{	
			$qry = "call sp_selectusername('$user2')";
 			$result = mysqli_query($con,$qry);
 			$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
 			mysqli_next_result($con);
			$qry="SELECT * FROM level";
 			$result = mysqli_query($con,$qry);
 			$row3 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 			for ($i=0;$i<sizeof($row3);$i++)
 			{
 				
 				if($row3[$i]['l_exp']<=$row[0]['u_exp'])
 				{
 					$level = $row3[$i]['l_level'];
 					$qry="update users set l_level = '$level' where u_id = '$user2'";
 					$result = mysqli_query($con,$qry);
 				}
 				else
 				{
 					break;
 				}
 			}
			mysqli_next_result($con);
			?>
				<script type="text/javascript">
				 alert("Berhasil membeli!");
				 window.location.href="market.php";
				</script> 
			<?php
		}
    	
		else{
		 		?>
					<script type="text/javascript">
					 alert("Gagal");
					 window.location.href="market.php";
					</script> 
				<?php
		 	}
		mysqli_close($con); 
	}
	
?>
 