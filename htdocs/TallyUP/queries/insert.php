<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

if(isset($_POST['submit'])){
	
	if(!empty($_POST['name'])){
		$id = $_SESSION['id'];
		$name = $_POST['name'];
		$sku = $_POST['sku'];
		$color = $_POST['color'];
		$size = $_POST['size'];
		$condition_id = $_POST['condition'];
		$status_id = $_POST['status'];
		$category_id = $_POST['category'];
		$p_date = $_POST['p_date'];
		$list_price = $_POST['list_price'];
		$sold_price = $_POST['sold_price'];
		$s_date = $_POST['s_date'];
		$notes = $_POST['notes'];
		
		$query = "INSERT INTO product(name, color, status_id, product_type_id, category_id, size, sku, condition_id, weight, notes)
			VALUES('$name', '$color', '$status_id', NULL, '$category_id', '$size', '$sku', '$condition_id', NULL, '$notes')";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		$query = "INSERT INTO inventory(account_id, product_id, description, listed_price, sold_price, sold_date)
			VALUES('$id', (SELECT max(product_id) FROM product), NULL, '$list_price', '$sold_price', '$s_date')";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		if($run) {
			echo "Successful insert";
			header('location:../inventory.php');
		}
		else {
			echo "Failed insert";
		}
		
	}
	else {
		echo "Error: Missing field required";
	}
}

?>