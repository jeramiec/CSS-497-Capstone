<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

$product_id = $_GET['id'];

if($_GET['type'] == "expense") { // Delete expense record but not product and inventory records
	$query = "DELETE FROM expense WHERE product_id = {$_GET['id']}";
	$run = mysqli_query($con, $query) or die(mysqli_error());
	echo "Successful deletion";
	header('Location: ../../expenses.php');
}
else if ($_GET['type'] == "inventory") { // Delete inventory, expense, and product
	$query = "SELECT * FROM expense WHERE account_id = {$_SESSION['account_id']} AND product_id = {$_GET['id']}";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$num = mysqli_num_rows($result);
	
	if($num == 1){
		$query = "DELETE FROM inventory WHERE product_id = {$_GET['id']}";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		$query = "UPDATE product SET color = '', status_id = '', product_type_id = '', size = '', sku = '', 
			condition_id = '', weight = '' WHERE product_id = {$_GET['id']}";
	}
	else {
		$query = "DELETE FROM product WHERE product_id = {$_GET['id']}";
	}
		$run = mysqli_query($con, $query) or die(mysqli_error());
		echo "Successful deletion";
		header('Location: ../../inventory.php');
}
else {
	echo "Failed delete";
}

?>