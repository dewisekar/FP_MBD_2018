<?php
	include "dbconnect.php";
	$username = @$_POST['r_username'];
	$name = @$_POST['r_name'];
	$password = @$_POST[ 'r_password'];
	$pass= md5($password);
	$submit = @$_POST[ 'submit'];

	if($submit)
	{
		$sql = mysqli_query($con, "select * from users where u_username = '$username'") or die (mysqli_error());
 		$login = mysqli_fetch_assoc($sql);
		$cek = mysqli_num_rows($sql);
		
		if ($cek > 0)
		{		
			?>
				<script type="text/javascript">
					alert("Sorry, username has been taken!");
					window.location.href="index.php";
				</script> 
			<?php	
		}
		else
		{
			$masuk = "insert into users (u_username, u_name, u_password) values ('$username', '$name', '$pass')";
			$masuk2 = mysqli_query($con, $masuk) or die (mysqli_error());;
			?>
				<script type="text/javascript">
					alert("Your are successfully registered. Please log in to start your journey!");
					window.location.href="index.php";
				</script> 
			<?php
		}
		mysqli_close($con);		
	}
	
?>
 