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
 	$qry1 = "call sp_viewpunyaprodukhewanmarket()";
	$result1 = mysqli_query($con,$qry1);
	$row1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
	mysqli_next_result($con);
	$qry = "call sp_viewpunyaprodukmesinmarket()";
 	$result = mysqli_query($con,$qry);
 	$row2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
 	mysqli_next_result($con); 
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Market</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/market.css">
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
	<img src="img/market.png" style="width: 15%; margin-top: 2%;">
	<h1 style="margin-top: 1%;">Buy Products From Other Players at The Market</h1>
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
	
	<div class="col-md-12" style="text-align: left;">
		<div class="home1">
			<h2>Buy Animal Products</h2>
			<table id="employee_datas" style="left: 0; width: 100%;">  
                <thead>  
                    <tr>  
                       <th>Name</th>  
                       <th>User</th>  
                       <th>Quantity</th>  
                       <th>Price/item</th>
                       <th>Buy</th>   
                    </tr>  
                </thead>
                <tbody>
                <?php for ($i=0;$i<sizeof($row1);$i++) { ?>
                <tr>
                	<td><?php echo $row1[$i]['ph_produk']; ?></td>
                	<td><?php echo $row1[$i]['u_name']; ?></td>
					<td><?php echo $row1[$i]['pph_ygdijual']; ?></td>
					<td>$ <?php echo $row1[$i]['ph_harga']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_buyprodukhewan.php" name="myForm" onsubmit="return validateForm()">
							<div class= "field">
								<input type="hidden" name="price" value="<?php echo $row1[$i]['ph_harga']; ?>">
								<input type="hidden" name="userdibeli" value="<?php echo $row1[$i]['u_id']; ?>">
								<input type="hidden" name="max" value="<?php echo $row1[$i]['pph_ygdijual']; ?>">
								<input type="hidden" name="money" value="<?php echo $row[0]['u_money'];?>">
								<input type="hidden" name="id_makanan" value="<?php echo $row1[$i]['ph_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Buy"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
                </tbody>             	   
            </table>  
		</div>
	</div>
	<div class="col-md-12" style="text-align: left;">
		<div class="home2">
			<h2>Buy Manufactured Products</h2>
			<table id="employee_data" style="left: 0; width: 100%;">  
                <thead>  
                    <tr>  
                       <th>Name</th>  
                       <th>User</th>  
                       <th>Quantity</th>  
                       <th>Price/item</th>
                       <th>Buy</th>   
                    </tr>  
                </thead>
                <tbody> 
               <?php for ($i=0;$i<sizeof($row2);$i++) { ?>
                <tr>
                	<td><?php echo $row2[$i]['pm_produk']; ?></td>
                	<td><?php echo $row2[$i]['u_name']; ?></td>
					<td><?php echo $row2[$i]['ppm_ygdijual']; ?></td>
					<td>$ <?php echo $row2[$i]['pm_harga']; ?></td>
					<td>
						<form class="ui form" method="POST" action="action_buyprodukmesin.php" name="myForm" onsubmit="return validateForm1()">
							<div class= "field">
								<input type="hidden" name="price" value="<?php echo $row2[$i]['pm_harga']; ?>">
								<input type="hidden" name="userdibeli" value="<?php echo $row2[$i]['u_id']; ?>">
								<input type="hidden" name="max" value="<?php echo $row2[$i]['ppm_ygdijual']; ?>">
								<input type="hidden" name="money" value="<?php echo $row[0]['u_money'];?>">
								<input type="hidden" name="id_makanan" value="<?php echo $row2[$i]['pm_id']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id ?>">
								<input type="number" name="s_jumlah" placeholder="Quantity" style="width: 40%;">
								<a>
									<input class="ui green button" type="submit" style="margin-left: 0;" name="submit" value="Buy"></input>
								</a>
							</div>							
						</form>
					</td>
				</tr>
				<?php } ?>
                </tbody>             	   
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
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
<script type="text/javascript">
	$(document).ready(function() {
	    $('#employee_data').DataTable();
	} );
</script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#employee_datas').DataTable();
	} );
</script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["s_jumlah"].value;
    var y = document.forms["myForm"]["max"].value;
    var z = document.forms["myForm"]["money"].value;
    var a = document.forms["myForm"]["price"].value;
    if (x < 0 || x>y) {
        alert("Maaf jumlah yang anda masukkan salah");
        return false;
    }
    if (x*a > z){
    	alert("Maaf uang anda tidak cukup");
        return false;
    }

}
function validateForm1() {
    var x = document.forms["myForm1"]["s_jumlah"].value;
    var y = document.forms["myForm1"]["max"].value;
    var z = document.forms["myForm1"]["money"].value;
    var a = document.forms["myForm1"]["price"].value;
    if (x < 0 || x>y) {
        alert("Maaf jumlah yang anda masukkan salah");
        return false;
    }
    if (x*a > z){
    	alert("Maaf uang anda tidak cukup");
        return false;
    }

}
</script>
<script>
function validateForm1() {
    var x = document.forms["myForm"]["s_jumlah"].value;
    var y = document.forms["myForm"]["max"].value;
    if (x < 0 || x>y) {
        alert("Maaf jumlah yang anda masukkan salah");
        return false;
    }
}
</script>