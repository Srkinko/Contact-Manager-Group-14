<?php include('authenticate.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Manager</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" action="index.php" method="post">
					<span class="login100-form-title p-b-55">
						Contact Manager Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<?php include('errors.php'); ?>
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit" name="login_user">
							Login
						</button>
					</div>
					
					<div class="text-center w-full p-t-10">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="register.php">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
