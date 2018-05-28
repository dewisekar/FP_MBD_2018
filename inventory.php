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
 	$qry1 = "call sp_viewpunyahewan('$id')";
	$result1 = mysqli_query($con,$qry1);
	$row1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
	mysqli_next_result($con);
	$qry = "call sp_viewpunyamesin('$id')";
 	$result = mysqli_query($con,$qry);
 	$row2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con);
 	$qry = "call sp_viewpunyamakanan('$id')";
 	$result = mysqli_query($con,$qry);
 	$row3 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con);
 	$qry = "call sp_viewpunyaprodukhewan('$id')";
 	$result = mysqli_query($con,$qry);
 	$row4 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con);
 	$qry = "call sp_viewpunyaprodukmesin('$id')";
 	$result = mysqli_query($con,$qry);
 	$row5 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con);
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
	<h1 style="margin-top: 1%;"><?php echo $row[0]['u_name']; ?>'s Inventory</h1>
	<ul class="nav">
		<li><a href="#" class="ui violet button">Guide for Producing</a></li>
  		<li><a href="#" class="ui purple button"  data-toggle="modal" data-target="#exampleModal">My Products In The Market</a></li>
  	</ul>
	<hr>
	<div class="col-md-6" style="margin-bottom: 2%;">
		<h2 style="text-align: left; margin-top: 2%;">Your Information</h2>
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
	<div class="col-md-6" style="text-align: right;">
		<div class="home1">
			<h2>Your Animal Foods</h2>
			<table style="width:100%">
				<tr>
					<th>Name</th>
					<th>Quantity</th>
				</tr>
				<?php for ($i=0;$i<sizeof($row3);$i++) { ?>
                <tr>
                	<td><?php echo $row3[$i]['mt_nama']; ?></td>
					<td><?php echo $row3[$i]['pmk_jumlah']; ?></td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row1);$i++) { ?>
                <tr>
                	<td><?php echo $row1[$i]['kh_hewan']; ?></td>
					<td><?php echo $row1[$i]['ph_jumlahewan']; ?></td>
					<td><?php echo $row1[$i]['ph_status']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_kasihmakan.php" name="myForm" onsubmit="return validateForm()">
							<div class= "field">
								<input type="hidden" name="max" value="<?php echo $row1[$i]['ph_jumlahewan']; ?>">
								<input type="hidden" name="id_hewan" value="<?php echo $row1[$i]['kh_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Feed"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row2);$i++) { ?>
                <tr>
                	<td><?php echo $row2[$i]['m_nama']; ?></td>
					<td><?php echo $row2[$i]['m_status']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_produksiprodukmesin.php" name="myForm1" onsubmit="return validateForm()">
							<div class= "field">
								<input type="hidden" name="id_hewan" value="<?php echo $row2[$i]['m_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Feed"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row4);$i++) { ?>
                <tr>
                	<td><?php echo $row4[$i]['ph_produk']; ?></td>
					<td><?php echo $row4[$i]['pph_jumlah']; ?></td>
					<td>$ <?php echo $row4[$i]['ph_harga']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_sellprodukhewan.php" name="myForm" onsubmit="return validateForm()">
							<div class= "field">
								<input type="hidden" name="max" value="<?php echo $row4[$i]['pph_jumlah']; ?>">
								<input type="hidden" name="id_makanan" value="<?php echo $row4[$i]['ph_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Sell"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
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
				<?php for ($i=0;$i<sizeof($row5);$i++) { ?>
                <tr>
                	<td><?php echo $row5[$i]['pm_produk']; ?></td>
					<td><?php echo $row5[$i]['ppm_jumlah']; ?></td>
					<td>$ <?php echo $row5[$i]['pm_harga']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_sellprodukmesin.php" name="myForm1" onsubmit="return validateForm1()">
							<div class= "field">
								<input type="hidden" name="max" value="<?php echo $row5[$i]['ppm_jumlah']; ?>">
								<input type="hidden" name="id_makanan" value="<?php echo $row5[$i]['pm_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Sell"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>				
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  	<div class="modal-content">
	  	  	<div class="modal-header">
	  	  	  	<h5 class="modal-title" id="exampleModalLabel">Your Products in The Market</h5>
	  	  	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  	  	  	  <span aria-hidden="true">&times;</span>
	  	  	  	</button>
	  	  	</div>
	  	  	<div class="modal-body">
	  	  		<div class="home4">
					<h2 style="text-align: left;">Your Animal Products</h2>
					<table style="width:100%">
						<tr>
							<th>Name</th>
							<th>Quantity</th>
							<th>Price to Sell</th>
						</tr>
						<?php for ($i=0;$i<sizeof($row4);$i++) { ?>
        		        <tr>
        		        	<td><?php echo $row4[$i]['ph_produk']; ?></td>
							<td><?php echo $row4[$i]['pph_ygdijual']; ?></td>
							<td>$ <?php echo $row4[$i]['ph_harga']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="home5">
					<h2 style="text-align: right;">Your Manufactured Products</h2>
					<table style="width:100%">
						<tr>
							<th>Name</th>
							<th>Quantity</th>
							<th>Price to Sell</th>
						</tr>
						<?php for ($i=0;$i<sizeof($row5);$i++) { ?>
        		        <tr>
        		        	<td><?php echo $row5[$i]['pm_produk']; ?></td>
							<td><?php echo $row5[$i]['ppm_ygdijual']; ?></td>
							<td>$ <?php echo $row5[$i]['pm_harga']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
	  	  	</div>
	  	  	<div class="modal-footer" style="margin-top: 30px;">

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
<script>
function validateForm() {
    var x = document.forms["myForm"]["s_jumlah"].value;
    var y = document.forms["myForm"]["max"].value;
    if (x < 0 || x>y) {
        alert("Maaf jumlah yang anda masukkan salah");
        return false;
    }
}
</script>
<script>
function validateForm1() {
    var x = document.forms["myForm1"]["s_jumlah"].value;
    var y = document.forms["myForm1"]["max"].value;
    if (x < 0 || x>y) {
        alert("Maaf jumlah yang anda masukkan salah");
        return false;
    }
}
</script>

