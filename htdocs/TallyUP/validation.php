<?php

session_start();

$con = mysqli_connect('localhost','jeramiec','jeramie98');

mysqli_select_db($con,'tallyup');

$username = $_POST['username'];
$pass = $_POST['password'];

$select = "SELECT * FROM account WHERE username = '$username' && password = '$pass'";
$result = mysqli_query($con, $select);
$num = mysqli_num_rows($result);

if($num == 1) {
	$_SESSION['username'] = $username;
	header('location:homepage.php');
}
else {
	header('location:login.php');
}

?>