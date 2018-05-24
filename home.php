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
	$id= $_SESSION['u_username'];
	$sql = mysqli_query($con, "select * from users where u_id = '$id'") or die (mysqli_error());
	$data = mysqli_fetch_assoc($sql);
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.css" />
</head>
<body>
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="navigation">
		<ul class="nav">
  			<li><a href="home.php" class="ui red button">Dashboard</a></li>
  			<li><a href="inventory.php" class="ui orange button">My Inventory</a></li>
  			<li><a href="shops.php" class="ui yellow button">Buy From Farming Gods</a></li>
  			<li><a href="market.php" class="ui olive button">Market</a></li>
  			<li><a href="action_logout.php" class="ui green button">Logout</a></li>
  		</ul>
  	</div>
</div>
<div class="col-md-2"></div>
<div class="col-md-12 text-center" style="background-color: rgba(255,255,255, 0.92); width: 80%; left: 50%; transform: translateX(-50%); margin-top: 10%;">
	<img src="img/logo.png" style="width: 35%;">
	<h1> Welcome to Your Ultimate Farming Game, <?php echo "$data[u_name]"; ?> !</h1>
	<hr>
	<div class="col-md-4" style="margin-bottom: 2%;">
		<h2 style="text-align: left;">Your information:</h2>
		<table style="width:100% ">
  			<tr>
		  		<th>Username:</th>
		  		<td><?php echo "$data[u_username]"; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Level:</th>
		  		<td><?php echo "$data[u_level]"; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Experience:</th>
		  		<td>555 77 855</td>
		  	</tr>
		  	<tr>
		  		<th>Money:</th>
		  		<td>555 77 855</td>
		  	</tr>
		</table>
	</div>
	<div class="col-md-8" style="text-align: right;">
		<div class="home1">
			<h2>Build your own farm and become the greatest farmer in Farmee Land!</h2>
			<p>Finding out how to play?</p>
			<a class="ui teal button" data-toggle="modal" data-target="#exampleModalCenter">How to Play</a>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
	<div class="modal-dialog modal-dialog-centered" role="document"  style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center; margin-bottom: 0%; padding-bottom: 0;">How to Play</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			 Masukin video aja disini...
			</div>
			<div class="modal-footer">
			 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
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
