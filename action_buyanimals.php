<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$hewan = @$_POST['id_hewan'];
	$quantity = @$_POST[ 's_jumlah'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_buyanimals('$user', '$hewan', '$quantity')";
		mysqli_multi_query($con,$sql);
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);    
    	$row2=mysqli_fetch_all($result);
    	mysqli_next_result($con);
		$qry = "call sp_selectusername('$user')";
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
 				$qry="update users set l_level = '$level' where u_id = '$user'";
 				$result = mysqli_query($con,$qry);
 			}
 			else
 			{
 				break;
 			}
 		}
    	if($row2[0][0]== '1'){
    	?>
			<script type="text/javascript">
			 alert("Berhasil membeli hewan!");
			 window.location.href="shops.php";
			</script> 
		<?php
		}
		elseif ($row2[0][0]=='-1') {
		 		?>
					<script type="text/javascript">
					 alert("Maaf tidak bisa membeli hewan saat ini, tunggu beberapa saat lagi!");
					 window.location.href="shops.php";
					</script> 
				<?php
		 	}
		else{
			?>
				<script type="text/javascript">
				 alert("Maaf, uang anda tidak cukup!");
				 window.location.href="shops.php";
				</script> 
			<?php
		} 	
	}
	mysqli_close($con); 
	
?>
 