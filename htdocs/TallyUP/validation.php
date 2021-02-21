<?php

session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection

mysqli_select_db($con,'tallyup');

$username = $_POST['username'];
$pass = $_POST['password'];

$query = "SELECT * FROM account WHERE username = '$username' && password = '$pass'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if($num == 1) {
	$_SESSION['username'] = $username;
	
	$row = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $row['account_id'];
	$_SESSION['first_name'] = $row['first_name'];
	
	header('location:homepage.php');
}
else {
	header('location:login.php');
}

?>