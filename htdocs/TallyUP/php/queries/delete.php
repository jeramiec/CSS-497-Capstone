<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

$id = $_GET['id'];
$query = "DELETE FROM product WHERE product_id=$id";

$run = mysqli_query($con, $query) or die(mysqli_error());
	
if($run) {
	echo "Successful deletion";
	header('location:../../inventory.php');
}
else {
	echo "Failed delete";
}

?>