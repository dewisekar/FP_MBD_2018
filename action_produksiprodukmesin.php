<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$makanan = @$_POST['id_hewan'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_produksiprodukmesin('$user', '$makanan')";
		mysqli_multi_query($con,$sql);
		mysqli_next_result($con);
    	$result=mysqli_store_result($con);
    	$row2=mysqli_fetch_all($result);    
    	if($row2[0][0]== '1'){
    	?>
			<script type="text/javascript">
			 alert("Berhasil membuat produk!");
			 window.location.href="inventory.php";
			</script> 
		<?php
		}
		elseif ($row2[0][0]=='0') {
		 		?>
					<script type="text/javascript">
					 alert("Tidak bisa membuat produk!");
					 window.location.href="inventory.php";
					</script> 
				<?php
		 	}
    	
		mysqli_close($con); 
	}
	
?>
 