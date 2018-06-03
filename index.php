<?php
//SET Session

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<!--Head Starts HERE -->
<head>
	<title>URL SHORTENER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--INCLUDING ALL THE CSS FILES-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<!--Head ENDS HERE -->

        <?php
			if(isset($_SESSION['user']))        
			{
				echo "<p>{$_SESSION['user']}</p>";  
				unset($_SESSION['user']);
			}
		?>


<!--BODY Starts HERE -->
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						URL SHORTENER
					</span>
				</div>

		   <!-- Form Open -->
				<form class="login100-form validate-form" action="shorten.php" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Enter URL</span>
						<input class="input100" type="url" name="submitted_url" placeholder="Enter URL" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="SUBMIT" />
					</div>
				</form>
				
		   <!-- Form Close -->
			</div>
		</div>
	</div>
	
<!--INCLUDING ALL THE JS FILES-->

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

</body>
<!--Head ENDS HERE -->

</html>