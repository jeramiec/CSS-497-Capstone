<!DOCTYPE html>
<html>
<head>
	<title>TallyUP</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="wrapper">
		<h2>Welcome to TallyUP</h2>
		<div class="loginform">
			<center><h4>Sign in<h1></center>
			<form action="validation.php" method="post">
				<div>
					<!--<label>Username</label>-->
					<input type="text" name="username" placeholder="Username" required>
				</div>
				<div>
					<!--<label>Password</label>-->
					<input type="password" name="password" placeholder="Password" required>
				</div>
				<button type="submit"> Login </button>
				<div><a href="login_forgotpassword.php">Forgot your password?</a></div>
			</form>
		
			New user? <a href="registration.php">Sign up here</a>
		</div>
	</div>
</body>
</html>