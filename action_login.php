<?php
	include "dbconnect.php";
	$username = @$_POST['username'];
	$password = @$_POST[ 'password'];
	$submit = @$_POST[ 'submit'];

	if($submit)
	{
		$sql = mysqli_query($con, "select * from users where u_username = '$username' and u_password = md5('$password')") or die (mysqli_error());
 		$login = mysqli_fetch_assoc($sql);
		$cek = mysqli_num_rows($sql);		
		if ($cek > 0)
		{		
			session_start();
            $_SESSION['u_username'] = $login['u_id'];; header('location: home.php'); die();
		}
		else
		{
			?>
				<script type="text/javascript">
				 alert("Sorry, you are not registered yet. Please register!");
				 window.location.href="index.php";
				</script> 
			<?php	
		}
	}
	mysqli_close($con);
?>
 