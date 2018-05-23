<?php
	@include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Helo!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.css">
</head>
<body>

<div class="loginBox">
	<div class="col-md-12 text-center">
		<img src="img/logo.png" style="width: 90%;">
	</div>
	<div class="col-md-6 text-center" style="margin-top: 3%; margin-bottom: 3%;"> 
		<h1 style="margin-bottom: 10%;font-size: 23px;">Login</h1>
		<form class="ui form" action="action_login.php" method="POST">
			<div class="field">
				<label style="font-size: 15px; text-align: left;">Username</label>
				<input type="text" name="username" placeholder="Username" required>
			</div>
			<div class="field">
				<label style="font-size: 15px; text-align: left;">Password</label>
				<input type="password" name="password" placeholder="Password" required>
			</div>
			<a>
	        	<input type="submit" value="Sign In" name="submit" class="ui inverted orange button">
	        </a>
		</form>		
	</div>
	<div class="col-md-6 text-center" style="margin-top: 5%; margin-bottom: 5%; border-left: 1px solid black;">
		<img src="img/sapi.png" style="width: 50%; ">
		<h1 style="font-size: 20px;">Haven't register yet?</h1>
		<a class="ui inverted green button" data-toggle="modal" data-target="#exampleModal">Register</a>
	</div>
	<div class="col-md-12 text-center" style="margin-bottom: 3%;">
		<p style="margin-bottom: 0;">Copyright:</p>
		<p>5116100002-5116100004</p>		
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  	<div class="modal-content">
	  	  	<div class="modal-header">
	  	  	  	<h5 class="modal-title" id="exampleModalLabel">Register</h5>
	  	  	  	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  	  	  	  <span aria-hidden="true">&times;</span>
	  	  	  	</button>
	  	  	</div>
	  	  	<div class="modal-body">
	  	  		<form class="ui form" method="POST" action="action_register.php" id="myForm" onsubmit="return validateForm()">
					<div class="field">
						<label style="font-size: 15px; text-align: left;">Username</label>
						<input type="text" name="r_username" placeholder="Username" required>
					</div>
					<div class="field">
						<label style="font-size: 15px; text-align: left;">Full Name</label>
						<input type="text" name="r_name" placeholder="Full Name" required>
					</div>
					<div class="field">
						<label style="font-size: 15px; text-align: left;">Password</label>
						<input type="password" name="r_password" placeholder="Min. 6 Characters" required>
					</div>
					<div class="field">
						<label style="font-size: 15px; text-align: left;">Retype Password</label>
						<input type="password" name="r_password1" placeholder="Min. 6 Characters" required>
					</div>
					<div class="col-md-12 text-right">
						<a>
	        				<input type="submit" value="Register" name="submit" class="ui inverted green button">
	        			</a>
					</div>
				</form>		
	  	  	</div>
	  	  	<div class="modal-footer" style="margin-top: 30px;">

	  	  	</div>
	  	</div>
	</div>
</div>
<div class="ui left demo vertical inverted sidebar labeled icon menu" style="display: block;">
		<a class="item">
		 	<i class="home icon"></i>
		 	Home
		</a>
		<a class="item">
			<i class="block layout icon"></i>
			Topics
		</a>
		<a class="item">
		 	<i class="smile icon"></i>
		 	Friends
		</a>
	</div>
</body>
<!--semantic ui-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<!-- bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/modal.js"></script>
<script type="text/javascript">
	function validateForm() {
    var x = document.forms["myForm"]["r_password"].value;
    var y = document.forms["myForm"]["r_password1"].value;
    var sx = x.length;
    if (sx< 6) {
        alert("Password minimum has 6 characters!");
        return false;
    }
    if (x!=y) {
        alert("Password does not match!");
        return false;
    }
}
</script>
</html>
