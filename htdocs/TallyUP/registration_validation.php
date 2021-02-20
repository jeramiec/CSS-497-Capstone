<?php

session_start();
/*header('location:registration_newuser.php');*/

$con = mysqli_connect('localhost','jeramiec','1234');


mysqli_select_db($con,'tallyup');

$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];

$select = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($con, $select);
$num1 = mysqli_num_rows($result);

$select = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($con, $select);
$num2 = mysqli_num_rows($result);

if ($num1 == 1) {
	echo "Email address already in use\r\n";
}
else if($num2 == 1) {
	echo "Username already taken\r\n";
}
else if($num1 == 1 && $num2 == 1) {
	echo "Email address already in use\r\n";
	echo "Username already taken\r\n";
}
else {
	$reg = "INSERT INTO account(email,username,password) VALUES ('$email','$username','$pass')";
	mysqli_query($con,$reg);
	$_SESSION['username'] = $username;
	header('location:registration_newuser.php');
	echo "Account registered!";
}

?>