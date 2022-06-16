<?php
include_once 'sys/class/User.php';
$user = new User(); // Checking for user logged in or not

$error ='';
	if(isset($_SESSION['login'])){
		header("location:home.php");
	}

	else if (isset($_REQUEST['submit'])){

		if(!empty($_REQUEST['username']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
			extract($_REQUEST);
			$register = $user->registerUser($username,$email,$password);
		
			if ($register) {
			// Registration Success
			$_SESSION['success'] = '<div style="color:green; text-align:center;">Registration successful</div>';
			header("location:login.php");
			} else {
			// Registration Failed
			$error =  'Registration failed. Email already exits please try again';
	
			}
		}else{
			$error = "kindly fill out all the forms!";
		}
	
 }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chat Box | Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="public/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/css/util.css">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">
<!--===============================================================================================-->

<style>
	body{
		background-color: black;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/images/background1.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="POST" action="">

					<span class="login100-form-title p-t-20 p-b-45">
						<a href="index.php">Chat Box</a>
					</span>

					<p style="color:red; margin: 0 auto; text-align:center;"><?= $error ?></p>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "username is required">
						<input class="input100" type="text" name="username" placeholder="username " required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					

					<div class="wrap-input100 validate-input m-b-10" data-validate = "email is required">
						<input class="input100" type="email" name="email" placeholder="email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="submit">
 							Register
						</button>
					</div>


					<div class="text-center w-full m-t-10">
						<a class="txt1" href="login.php">
							Aready Registerd? Login
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	
	
	
	
<!--===============================================================================================-->	
<script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public/vendor/bootstrap/js/popper.js"></script>
	<script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="public/js/main.js"></script>

</body>
</html>