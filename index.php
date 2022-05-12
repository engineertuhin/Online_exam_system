<?php
session_start();
if(isset($_SESSION['name']) or isset($_SESSION['email']) or isset($_SESSION['roll'])){
	header('location:instruction.php');
	
}

spl_autoload_register(function($classname){

	include_once "admin/lib/".$classname.'.php';
	
	});
	new admin;
if(isset($_REQUEST['submit'])){
 	$email=$_REQUEST['email'];
	$roll=$_REQUEST['roll'];
	$getemail=admin::logingstudentemail($email);
	$getroll=admin::logingstudentroll($roll);
	if(empty($email) or empty($roll)){

		$mass="<p class='alert alert-danger'>From must Not be empty<button class='close' data-dismiss='alert'>&times</button></p>";
	}elseif(($getemail['email']==$email)==false){

		$mass="<p class='alert alert-danger'>Email is not Currect<button class='close' data-dismiss='alert'>&times</button></p>";
	}else if(($getroll==$roll)==false){

		$mass="<p class='alert alert-danger'>Roll number is not Currect<button class='close' data-dismiss='alert'>&times</button></p>";
	}

	else{
		$_SESSION['name']=$getemail['name'];
		$_SESSION['roll']=$getemail['roll'];
		$_SESSION['email']=$getemail['email'];
		$_SESSION['id']=$getemail['id'];
		header('location:instruction.php');
		
		

	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
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
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
<?php echo $mass?>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="Email" name="email" placeholder="Enter your Email">
						<span class="focus-input100"></span>
						
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Roll is required">
						<span class="label-input100">Roll</span>
						<input class="input100" type="text" name="roll" placeholder="Enter your Roll">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							
						</div>
						<div class="">
						
								<label class="" for="ckb1" style="font-size: 11px;margin-left: 90px; margin-top: 3px;     color: #808080;">
									You need to registation:
								</label>
							</div>

						<div>
							<a href="registation.php" class="txt1">
								Registation
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type='submit' name='submit' value="Login" class="login100-form-btn">
							
						</input>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>