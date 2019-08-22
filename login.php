<?php
session_start();
if(isset($_SESSION["username"])){
	header("Location: index.php");
exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>User login</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

	<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
					</div>
				</div>

				<div class="d-flex justify-content-center form_container">

					<form id="login">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" id="loginusername" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="loginpassword" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="remember">
								<label class="custom-control-label" for="remember">Remember me</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<button type="button" name="login" class="btn login_btn" id="login_req">Login</button>
						</div>
						<div class="mt-4">
							<div class="d-flex justify-content-center links">
								Don't have an account? <a href="#" id="singup_btn" class="ml-2">Register</a>
							</div>
							<div class="d-flex justify-content-center links">
								<a href="#" id="forget_btn">Forgot your password?</a>
							</div>
						</div>
					</form>

					<form id="signup">

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user-circle"></i></span>
							</div>
							<input type="text" name="name" id="signupname" class="form-control input_pass" value="" placeholder="Your name">
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" id="signupemail" class="form-control input_pass" value="" placeholder="abc@def.com">
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="text" name="phone" id="signupphone" class="form-control input_pass" value="" placeholder="8801111111111">
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user-plus"></i></span>
							</div>
							<select name="designation" id="signupdesignation">
							  <option value="admin">Administration</option>
							  <option value="member">General member</option>
							</select>
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" id="signupusername" class="form-control input_user" value="" placeholder="username">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="signuppassword" class="form-control input_pass" value="" placeholder="password">
						</div>

						<div class="form-group">
							<div class="custom-control" id="signupmessage"></div>
						</div>

						<div class="d-flex justify-content-center mt-3">
							<button type="button" name="register" class="btn login_btn" id="signup_req">Register</button>
						</div>
						<div class="mt-4">
							<div class="d-flex justify-content-center links">
								Already have an account? <a href="#" id="login_btn" class="ml-2">Login</a>
							</div>
							<div class="d-flex justify-content-center links">
								<a href="#" id="forget_btn">Forgot your password?</a>
							</div>
						</div>
					</form>

					<form id="forget">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_pass" value="" id="forgetemail" placeholder="abc@def.com">
						</div>
						<div class="form-group">
							<div class="custom-control">
								Message
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3">
							<button type="button" name="register" class="btn login_btn" id="forget_req">Get password</button>
						</div>
						<div class="mt-4">
							<div class="d-flex justify-content-center links">
								Don't have an account? <a href="#" id="singup_btn" class="ml-2">Register</a>
							</div>
							<div class="d-flex justify-content-center links">
								Already have an account? <a href="#" id="login_btn" class="ml-2">Login</a>
							</div>
						</div>
					</form>

				</div>


			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="assets/js/login.js"></script>


</body>
</html>
