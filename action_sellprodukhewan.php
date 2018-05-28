<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$makanan = @$_POST['id_makanan'];
	$quantity = @$_POST[ 's_jumlah'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_sellprodukhewan('$user', '$makanan', '$quantity')";
		if(mysqli_multi_query($con,$sql))
		{
			mysqli_next_result($con);
			?>
				<script type="text/javascript">
				 alert("Berhasil menaruh barang di pasar!");
				 window.location.href="inventory.php";
				</script> 
			<?php
		}
    	
		else{
		 		?>
					<script type="text/javascript">
					 alert("Gagal");
					 window.location.href="shops.php";
					</script> 
				<?php
		 	}
		mysqli_close($con); 
	}
	
?>
 