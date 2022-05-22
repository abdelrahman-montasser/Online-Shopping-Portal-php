<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script src="font-awesome/fontawesome-all.min.js"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<div class="container">
	
	
	<div class="row justify-content-center">
	
		<div class="col-md-5">
		<h1 class="text-center" style="margin-top:100px;">Register</h1>
		
			<?php
				if(isset($_SESSION['error'])){
					echo "
						<div class='alert alert-danger text-center'>
							<i class='fas fa-exclamation-triangle'></i> ".$_SESSION['error']."
						</div>
					";
 
					//unset error
					unset($_SESSION['error']);
				}
 
				if(isset($_SESSION['success'])){
					echo "
						<div class='alert alert-success text-center'>
							<i class='fas fa-check-circle'></i> ".$_SESSION['success']."
						</div>
					";
 
					//unset success
					unset($_SESSION['success']);
				}
			?>
			<div class="card">
				<div class="card-body">
				    <h5 class="card-title text-center">Register a new account</h5>
				    <hr>
				    <form method="POST" action="register.php">
					<div class="form-group row">
						  	<label for="username" class="col-3 col-form-label">Username</label>
						  	<div class="col-9">
						    	<input class="form-control" type="text" id="username" name="username" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; unset($_SESSION['username']) ?>" placeholder="Username" required>
						  	</div>
						</div>
				    	<div class="form-group row">
						  	<label for="email" class="col-3 col-form-label">Email</label>
						  	<div class="col-9">
						    	<input class="form-control" type="email" id="email" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?>" placeholder="Email" required>
						  	</div>
						</div>
						<div class="form-group row">
						  	<label for="password" class="col-3 col-form-label">Password</label>
						  	<div class="col-9">
						    	<input class="form-control" type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : ''; unset($_SESSION['password']) ?>" placeholder="Password" required>
						  	</div>
						</div>
						<div class="form-group row">
						  	<label for="confirm" class="col-3 col-form-label">Confirm</label>
						  	<div class="col-9">
						    	<input class="form-control" type="password" id="confirm" name="confirm" value="<?php echo (isset($_SESSION['confirm'])) ? $_SESSION['confirm'] : ''; unset($_SESSION['confirm']) ?>" placeholder="re-type password">
						  	</div>
						</div>
						<div class="form-group row">
						  	<label for="phoneNo" class="col-3 col-form-label">Phone_No</label>
						  	<div class="col-9">
						    	<input class="form-control" type="Phone" id="phoneNo" name="phoneNo" value="<?php echo (isset($_SESSION['phoneNo'])) ? $_SESSION['phoneNo'] : ''; unset($_SESSION['phoneNo']) ?>" placeholder="Phone Number">
						  	</div>
						</div>
						<div class="form-group row">
						  	<label for="phoneNo" class="col-3 col-form-label">Address</label>
						  	<div class="col-9">
						    	<input class="form-control" type="text" id="address" name="address" value="<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : ''; unset($_SESSION['address']) ?>" placeholder="Address">
						  	</div>
						</div>	
				    <hr>
				    <div>
				    	<button type="submit" class="btn btn-success" name="register"><i class="far fa-user"></i> Signup</button>
				    	<a href="login.php">Back to login</a>
				    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>