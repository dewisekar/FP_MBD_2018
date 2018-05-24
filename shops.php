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
	<title>Buy From the Farming Gods</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/shops.css">
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
<div class="col-md-12 text-center" style="background-color: rgba(255,255,255, 0.92); width: 80%; left: 50%; transform: translateX(-50%); margin-top: 10%; margin-bottom: 5%; padding-bottom: 5%;">
	<img src="img/troli.png" style="width: 15%; margin-top: 2%;">
	<h1 style="margin-top: 1%;">Buy From the Farming Gods</h1>
	<div class="col-md-12" style="margin-bottom: 2%;">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 style="text-align: center; margin-top: 2%;">Your Information</h2>
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
		<div class="col-md-2"></div>	
	</div>
	<div class="col-md-12">
		<hr>
	</div>
	
	<div class="col-md-12" style="text-align: right;">
		<div class="home1">
			<h2>Buy Animal Foods</h2>
			<table style="width:100%" id="example">
				<tr>
					<th>Name</th>
					<th>Level</th>
					<th>Price</th>
					<th>Buy</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>555 77 854</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Level" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>555 77 854</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-12">
		<div class="home2">
			<h2 style="text-align: left;">Buy Animals</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Level</th>
					<th>Price</th>
					<th>Buy</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>555 77 854</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-12">
		<div class="home3">
			<h2 style="text-align: right;">Buy Machines</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Level</th>
					<th>Price</th>
					<th>Buy</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>555 77 854</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<!-- bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>