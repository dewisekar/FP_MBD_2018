<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$makanan = @$_POST['id_makanan'];
	$quantity = @$_POST[ 's_jumlah'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_buyfoods('$user', '$makanan', '$quantity')";
		mysqli_multi_query($con,$sql);
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);    
    	$row2=mysqli_fetch_all($result);
    	mysqli_next_result($con);
		$qry = "call sp_selectusername('$user')";
 		$result = mysqli_query($con,$qry);
 		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
 		mysqli_next_result($con);
    	if($row2[0][0]== '0'){
    	?>
			<script type="text/javascript">
			 alert("Berhasil membeli makanan!");
			 window.location.href="shops.php";
			</script> 
		<?php
		}
		elseif ($row2[0][0]=='-1') {
		 		?>
					<script type="text/javascript">
					 alert("Maaf uang anda tidak cukup!");
					 window.location.href="shops.php";
					</script> 
				<?php
		 	}
		mysqli_close($con); 
	}
	
?>
 