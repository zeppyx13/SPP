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
				<h2 style="margin-bottom: 30px;">Hallo, Selamat Datang</h2>
				<input required autocomplete="off" type="number" name="id" placeholder="NIS/NIP" />
				<input required autocomplete="off" type="password" name="pw" placeholder="Password" />
				<button type="submit" name="login">Masuk</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img class="gbr" src="assets/img/ti.png" alt="">
					<p class="tulisan">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius fuga repellat dolores necessitatibus earum architecto veniam libero reiciendis commodi, pariatur voluptatem quasi nostrum consequatur ratione maiores ad aspernatur assumenda! Nulla.</p>
				</div>
			</div>
		</div>
	</div>
	<script src="./config/js/login.js"></script>
</body>

</html>