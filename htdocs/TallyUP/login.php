<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/64d58efce2.js"	crossorigin="anonymous"></script>
	<title>Login & Register</title>
	<link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
			
				<form action="validation.php" class="sign-in-form" method="POST">
					<h2 class="title">Sign in<h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Username" class="user" required>
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" name="password" placeholder="Password" class="pass" required>
					</div>
					<div class="submitbtn">
						<button type="submit" class="btn solid"> Login </button>
					</div>
				</form>

				<form action="#" class="sign-up-form" method="POST">
					<h2 class="title">Register<h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Username" class="user" required>
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" name="email" placeholder="Email" class="pass" required>
					</div>
					<div class="submitbtn">
						<button type="submit" class="btn solid"> Register </button>
					</div>
				</form>
			</div>
		</div>
		
		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>New user?</h3>
					<button class="btn transparent" id="sign-up-btn">Sign up</button>
				</div>
				<img src="icons/loginregister/login.svg" class="image" alt="login_icon">
			</div>
			
			<div class="panel right-panel">
				<div class="content">
					<h3>Already have an account?</h3>
					<button class="btn transparent" id="sign-in-btn">Sign in</button>
				</div>
				<img src="icons/loginregister/register.svg" class="image" alt="register_icon">
			</div>
		</div>
	</div>
	
	<script src="js/login.js"></script>
</body>
</html>