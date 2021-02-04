<!DOCTYPE html>
<html>
<head>
	<title>TallyUP</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<h2>Welcome to TallyUP</h2>
		<center><h4>Login to your account<h1></center>
		<form action="validation.php" method="post">
			<div>
				<label>Username</label>
				<input type="text" name="username" required>
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<button type="submit"> Login </button>
			
		</form>
		
	</div>
</body>
</html>