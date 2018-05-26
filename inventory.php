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
	<title>Inventory</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/inventory.css">
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
	<img src="img/farmhouse.png" style="width: 15%; margin-top: 2%;">
	<h1 style="margin-top: 1%;"><?php echo "$data[u_name]"; ?>'s Inventory</h1>
	<ul class="nav">
		<li><a href="#" class="ui violet button">Guide for Producing</a></li>
  		<li><a href="#" class="ui purple button">My Products In The Market</a></li>
  	</ul>
	<hr>
	<div class="col-md-6" style="margin-bottom: 2%;">
		<h2 style="text-align: left; margin-top: 2%;">Your Information</h2>
		<table style="width:100% ">
  			<tr>
		  		<th>Username:</th>
		  		<td><?php echo "$data[u_username]"; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Level:</th>
		  		<td><?php echo "$data[l_level]"; ?></td>
		  	</tr>
		  	<tr>
		  		<th>Experience:</th>
		  		<td><?php echo "$data[u_exp]";?></td>
		  	</tr>
		  	<tr>
		  		<th>Money:</th>
		  		<td>$ <?php echo "$data[u_money]";?></td>
		  	</tr>
		</table>
	</div>
	<div class="col-md-6" style="text-align: right;">
		<div class="home1">
			<h2>Your Animal Foods</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price to Sell</th>
					<th>Sell</th>
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
	<div class="col-md-6">
		<div class="home2">
			<h2 style="text-align: left;">Your Animals</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Ini buat status
					</td>
					<td>Feed/no</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Ini buat status
					</td>
					<td>Feed/no</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="home3">
			<h2 style="text-align: right;">Your Machines</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Buat tombol nanti</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Buat tombol nanti</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Buat tombol nanti</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Buat tombol nanti</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Buat tombol nanti</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="home4">
			<h2 style="text-align: left;">Your Animal Products</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price to Sell</th>
					<th>Sell</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Harga</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Harga</td>
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
	<div class="col-md-6">
		<div class="home5">
			<h2 style="text-align: right;">Your Manufactured Products</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price to Sell</th>
					<th>Sell</th>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Harga</td>
					<td><form class="ui form">
							<div class= "field">
								<label>Quantity:</label>
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<button class="ui button" type="submit" style="margin-left: 0;">Sell</button>
							</div>							
						</form>
					</td>
				</tr>
				<tr>
					<td>Bill Gates</td>
					<td>555 77 854</td>
					<td>Harga</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<!-- bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/sidebar.min.js"></script>
