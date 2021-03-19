<?php

session_start();
$con = mysqli_connect('localhost','jeramiec','1234');
mysqli_select_db($con,'tallyup');

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$address = $_POST['address'];
$phonenum = $_POST['phone_number'];
$company = $_POST['company_name'];

$select = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($con, $select);
$num1 = mysqli_num_rows($result);

$select = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($con, $select);
$num2 = mysqli_num_rows($result);

if ($num1 == 1) {
	echo "<h2>Email address already in use</h2>";
}
else if($num2 == 1) {
	echo "<h2>Username already taken</h2>";
}
else if($num1 == 1 && $num2 == 1) {
	echo "<h2>Email address already in use</h2>";
	echo "<h2>Username already taken</h2>";
}
else {
	$reg = "INSERT INTO account(first_name, last_name, phone_number, address, email, username, password, company) 
		VALUES ('$fname', '$lname', '$phonenum', '$address', '$email', '$username', '$pass', '$company')";
	mysqli_query($con, $reg);
	
	$query = "SELECT * FROM account WHERE username = '$username' && password = '$pass'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	
	$_SESSION['username'] = $username;
	$_SESSION['account_id'] = $row['account_id'];
	$_SESSION['first_name'] = $row['first_name'];
	
	header('location:homepage.php');
	echo "<h2>Account registered!</h2>";
}

?>