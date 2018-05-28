<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$makanan = @$_POST['id_hewan'];
	$quantity = @$_POST[ 'max'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_produksiprodukhewan('$user', '$makanan', '$quantity')";
		mysqli_multi_query($con,$sql);
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);
    	$row2=mysqli_fetch_all($result);    
    	if($row2[0][0]== '1'){
    	?>
			<script type="text/javascript">
			 alert("Berhasil memberi makanan!");
			 window.location.href="inventory.php";
			</script> 
		<?php
		}
		elseif ($row2[0][0]=='-1') {
		 		?>
					<script type="text/javascript">
					 alert("Maaf makanan anda tidak cukup!");
					 window.location.href="inventory.php";
					</script> 
				<?php
		 	}
		 	elseif ($row2[0][0]=='0') {
		 		?>
					<script type="text/javascript">
					 alert("Gagal, anda belum mempunyai makanannya!");
					 window.location.href="inventory.php";
					</script> 
				<?php
		 	}
    	
		mysqli_close($con); 
	}
	
?>
 