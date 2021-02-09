<html>
<head>
	<title>TallyUP</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<h2>Welcome to TallyUP</h2>
		<center><h4>Sign up for an account<h1></center>
		<form action="registration_validation.php" method="post">
			<div>
				<label>Email</label>
				<input type="email" name="email" required>
			</div>
			<div>
				<label>Username</label>
				<input type="text" name="username" required>
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<button type="submit"> Create account </button>
		</form>
		
		Already have an account? <a href="login.php">Login here</a>
	</div>
</body>
</html>