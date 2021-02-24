<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

if(isset($_POST['inventoryupdate'])){
	
	if(!empty($_POST['name'])){
		
		$account_id = $_SESSION['account_id'];
		
		$name = $_POST['name'];
		$sku = $_POST['sku'];
		$color = $_POST['color'];
		$size = $_POST['size'];
		$condition_id = $_POST['condition'];
		$status_id = $_POST['status'];
		$category_id = $_POST['category'];
		$purchase_price = $_POST['purchase_price'];
		$p_date = $_POST['p_date'];
		$list_price = $_POST['list_price'];
		$sold_price = $_POST['sold_price'];
		$s_date = $_POST['s_date'];
		$notes = $_POST['notes'];
		
		$query = "UPDATE product SET name = '$name', color = '$color', status_id = '$status_id', category_id = '$category_id', size = '$size', sku = '$sku', condition_id = '$condition_id', notes = '$notes'
					WHERE product_id = {$_GET['id']}";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		if($run) {
			echo "Successful update";
			header('location:../../inventory.php');
		}
		else {
			echo "Failed insert";
		}
		
	}
	else {
		echo "Error: Missing field required";
	}
}
else {
	echo "Error: Failed update";
}

?>