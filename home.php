<?php
	include 'dbconnect.php';
	
	session_start();
	if (!isset($_SESSION['u_username'])) {
		?>
			<script type="text/javascript">
			 alert("Login First!");
			 window.location.href="index.php";
			</script> 
		<?php
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.css" />
</head>
<body>
<div class="welcomeBox">
  	<ul class="nav">
  		<li><a href="#" class="ui red button" id="myBtn" onclick="getModal('myModal')">How to Play</a></li>
  		<li><a href="#" class="ui orange button" id="myBtn1" onclick="getModal('myModal1')">Buy Animals</a></li>
  		<li><a href="action_logout.php" class="ui green button">Logout</a></li>
  	</ul>
	<div class="col-md-12 text-center">
		<img src="img/logo.png" style="width: 50%;">
		<h1> Welcome to Your Ultimate Farming Game, ((insert username here))!</h1>
		<hr>
	</div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<!-- bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.min.js"></script>
<script>
	function openNav() {
	    document.getElementById("myNav").style.width = "30%";
	}
	
	function closeNav() {
	    document.getElementById("myNav").style.width = "0%";
	}
</script>
