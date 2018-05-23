<?php
	session_start();
	unset($_SESSION['u_username']);
	session_destroy();	
	header("Location: index.php");
	die();
?>