<?php
	include "dbconnect.php";
	$user = @$_POST['id_user'];
	$mesin = @$_POST['id_mesin'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{	
		$sql = "call sp_buymesin('$user', '$mesin')";
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
    	if ($row2[0][0]=='0'){
    		?>
				<script type="text/javascript">
				 alert("`Berhasil membeli mesin!");
				 window.location.href="shops.php";
				</script> 
			<?php
		}
		elseif ($row2[0][0]=='-2'){
			?>
				<script type="text/javascript">
				 alert("Anda sudah mempunyai mesin tersebut!");
				 window.location.href="shops.php";
				</script> 
			<?php
		}
		elseif ($row2[0][0]=='-1') {
		 		?>
					<script type="text/javascript">
					 alert("Maaf uang anda tidak mencukupi!");
					 window.location.href="shops.php";
					</script> 
				<?php
		 	}
		
	}
	mysqli_close($con); 
	
?>
 