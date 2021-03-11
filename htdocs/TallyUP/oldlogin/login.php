<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<!--<link rel="stylesheet" href="loginstyle.css">-->
</head>

<body>
	<div class="wrapper">
		<h2>TallyUP</h2>
		<div class="formwrappper">
			<div class="loginregister">
				<form action="validation.php" class="loginform" method="POST">
					<h2>Sign in<h2>
					<div class="inputfield">
						<!--<label>Username</label>-->
						<input type="text" name="username" placeholder="Username" class="user" required>
					</div>
					<div>
						<!--<label>Password</label>-->
						<input type="password" name="password" placeholder="Password" class="pass" required>
					</div>
						<button type="submit" class="btn solid"> Login </button>
					<div>
						<a class="passwordforgot" href="login_forgotpassword.php">Forgot your password?</a>
					</div>
				</form>
			
				New user? <a href="registration.php">Sign up here</a>
			</div>
		</div>
		
		<!--
		<div class="panelswrapper">
			<div class="panel leftpanel">
				<div class="content">
					<h3>New user?</h3>
					<button class="btn transparent" id="registerbtn"> Sign up </button>
				</div>
				<img src="icons/loginregister/login.svg" class="img" alt="TallyUP-image" />
			</div>
		</div>
		-->
	</div>
</body>
</html>