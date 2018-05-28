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
	$qry = "call sp_selectusername('$id')";
 	$result = mysqli_query($con,$qry);
 	$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con); 
	$qry1 = "call sp_viewkataloghewan()";
	$result1 = mysqli_query($con,$qry1);
	$row1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
	mysqli_next_result($con); 
	$qry2 = "call sp_showmesin()";
	$result2 = mysqli_query($con,$qry2);
	$row2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
	mysqli_next_result($con);
	$qry2 = "call sp_showmakanternak()";
	$result2 = mysqli_query($con,$qry2);
	$row3 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
	mysqli_next_result($con); 
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
		  			<td><?php echo $row[0]['u_username']; ?></td>
		  		</tr>
		  		<tr>
		  			<th>Level:</th>
		  			<td><?php echo $row[0]['l_level']; ?></td>
		  		</tr>
		  		<tr>
		  			<th>Experience:</th>
		  			<td><?php echo $row[0]['u_exp'];?></td>
		  		</tr>
		  		<tr>
		  			<th>Money:</th>
		  			<td>$ <?php echo $row[0]['u_money'];?></td>
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
				<?php for ($i=0;$i<sizeof($row3);$i++) { ?>
                <tr>
                	<td><?php echo $row3[$i]['mt_nama']; ?></td>
					<td><?php echo $row3[$i]['mt_level']; ?></td>
					<td> $<?php echo $row3[$i]['mt_harga']; ?></td>
					<td><?php if ($row[0]['l_level'] >= $row3[$i]['mt_level']): ?>
						<form class="ui form" method="POST" action="action_buyfoods.php">
							<div class= "field">
								<input type="hidden" name="id_makanan" value="<?php echo $row3[$i]['mt_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;" min="1" max="10">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Buy"></input>
								</a>
							</div>							
						</form>
						<?php else: ?>
						<form class="ui form">
							<div class= "field">
								<div class="ui disabled input" style="width: 40%;">
									<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								</div>
								<button class="ui red button" type="submit" style="margin-left: 0;" disabled>Buy</button>
							</div>							
						</form>
						<?php endif ?>
					</td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row1);$i++) { ?>
                <tr>
                	<td><?php echo $row1[$i]['kh_hewan']; ?></td>
					<td><?php echo $row1[$i]['kh_level']; ?></td>
					<td> $<?php echo $row1[$i]['kh_harga']; ?></td>
					<td><?php if ($row[0]['l_level'] >= $row1[$i]['kh_level']): ?>
						<form class="ui form" method="POST" action="action_buyanimals.php">
							<div class= "field">
								<input type="hidden" name="id_hewan" value="<?php echo $row1[$i]['kh_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;" min="1" max="10">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Buy"></input>
								</a>
							</div>							
						</form>
						<?php else: ?>
						<form class="ui form">
							<div class= "field">
								<div class="ui disabled input" style="width: 40%;">
									<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								</div>
								<button class="ui red button" type="submit" style="margin-left: 0;" disabled>Buy</button>
							</div>							
						</form>
						<?php endif ?>
					</td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row2);$i++) { ?>
				<tr>
					<td><?php echo $row2[$i]['m_nama']; ?></td>
					<td><?php echo $row2[$i]['m_level']; ?></td>
					<td>$ <?php echo $row2[$i]['m_harga']; ?></td>
					<td><?php if ($row2[$i]['m_level']<=$row[0]['l_level']): ?>
						<form class="ui form" method="POST" action="action_buymesin.php">
							<div class= "field">
								<input type="hidden" name="id_mesin" value="<?php echo $row2[$i]['m_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>"> 
								<a><input class="ui green button" type="submit" name="submit" value="Buy"style="margin-left: 0;"></a>
							</div>
						</form>
						<?php else: ?>
						<form class="ui form" method="POST" action="">
							<div class= "field">
								<a><input class="ui red button" type="submit" style="margin-left: 0;" value="Buy"disabled></a>
							</div>
						</form>
						<?php endif ?>
					</td>
				</tr>
				<?php } ?>
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