<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-image: url('images/bg1.png');">
	<?php
	session_start();
	$user='admin';
	$password_definit=2019;

	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		if ($username&&$password) {
			if ($username==$user&&$password==$password_definit) {
				$_SESSION['username']=$username;
				header('location:admin.php');
			
	?>
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN D'ADMIN
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Entrer username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entrer password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input   class="login100-form-btn" type="submit" name="submit">
							
					</div>

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<?php
	}else{
				echo "<h5 align=center ><font color='#d11010' >Ressayez !</font></h5>";
			}
		}else{
	echo"<h5 align=center ><font color='#d11010' >Veuillez remplir tous les champs !</font></h5>";
		}
     }
	?>
	
<!--===============================================================================================
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script>-->

</body>
</html>