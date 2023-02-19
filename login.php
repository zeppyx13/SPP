<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/login.css">
	<title>Login</title>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<form method="POST" action="./config/php/proseslogin.php">
				<h1 style="margin-bottom: 30px;">Sign in</h1>
				<input required autocomplete="off" type="number" name="id" placeholder="NIS/NIP" />
				<input required autocomplete="off" type="password" name="pw" placeholder="Password" />
				<button type="submit" name="login">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button name="login" type="submit" class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<img style="max-width: 100%; max-height: 100%;" src="assets/img/ti.png" alt="logo Ti">
				</div>
			</div>
		</div>
	</div>
	<script src="./config/js/login.js"></script>
</body>

</html>