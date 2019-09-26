<?php include('reg_data.php') ?>
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
	<div class="container-login100">
		<div class="wrap-login100 p-l-50 p-r-50 p-t-50 p-b-30">
			<form class="login100-form validate-form" action="register.php" method="post">
				<span class="login100-form-title p-b-55">
					Contact Manager Register
				</span>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="email" id="email" placeholder="Email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-envelope"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input100" type="text" name="username" id="username" placeholder="Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-user"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
					<input class="input100" type="password" name="password_1" id="password_1" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
					<input class="input100" type="password" name="password_2" id="password_2" placeholder="Confirm Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
				</div> 
				<?php include('errors.php'); ?>
				<div class="container-login100-form-btn p-t-25">
					<button class="login100-form-btn" type="submit" name="reg_user">
						Sign up
					</button>
				</div>

				<div class="text-center w-full p-t-10">
					<span class="txt1">
						Already a member?
					</span>

					<a class="txt1 bo1 hov1" href="index.php">
						Login now							
					</a>
				</div>
			</form>
		</div>
	</div>

	
</body>
</html>
