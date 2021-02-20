<!DOCTYPE html>
<html>
<head>
	<title>Welcome to TallyUP</title>
	<link rel="stylesheet" href="loginstyle.css">
</head>

<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<h2>Welcome to TallyUP</h2>
		<center><h4>Let's get started.<h1></center>
		<form action="account_info.php" method="POST">
			<div>
				<label>First name</label>
				<input type="text" name="firstname" required>
			</div><br>
			
			<div>
				<label>Last name</label>
				<input type="text" name="lastname" required>
			</div><br>
			
			<div>
				<label>Phone number</label>
				<input type="text" name="phonenumber">
			</div><br>
			
			<div>
				<br><label>Account type</label><br>
				<input type="radio" id="Retailer" name="accounttype" value="Retailer" required>
				<label for="Retailer">Retailer: sell made-goods</label><br>
				<input type="radio" id="Reseller" name="accounttype" value="Reseller" required>
				<label for="Reseller">Reseller: resell products</label><br>
				<input type="radio" id="Dropship" name="accounttype" value="Dropship" required>
				<label for="Dropshop">Dropship: (coming soon)</label>
			</div><br>
			
			<div>
				<label>Company name</label>
				<input type="text" name="company">
			</div><br>
			
			<div>
				<label>Are you an owner?</label><br>
				<input type="radio" id="Yes" name="role" value="Yes">
				<label for="Yes">Yes</label><br>
				<input type="radio" id="No" name="role" value="No">
				<label for="No">No</label>
			</div><br>
			
			<button type="submit"> Complete registration </button>
			
		</form>
		
	</div>
</body>
</html>


<?php

include 'registration_validation.php';

session_start();

$con = mysqli_connect('localhost','jeramiec','1234');

mysqli_select_db($con,'tallyup');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenum = $_POST['phonenumber'];
$acctype = $_POST['accounttype'];
$company = $_POST['company'];
$role = $_POST['role'];

$reg = "INSERT INTO account(account_type_id, first_name,last_name,phone_number,) VALUES ('$email','$name','$pass')";
mysqli_query($con,$reg);
echo "Account registered!";

?>