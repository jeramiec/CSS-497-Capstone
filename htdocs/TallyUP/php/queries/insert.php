<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

if(isset($_POST['inventoryinsert'])){
	
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
		$weight = $_POST['weight'];
		$notes = $_POST['notes'];
		
		if($condition_id == null) { $condition_id = "NULL"; }
		if($purchase_price == null) { $purchase_price = "NULL"; }
		if($p_date == null) { $p_date = "NULL"; }
		if($list_price == null) { $list_price = "NULL"; $status_id = 0; }
		else { $status_id = 1; }
		if($sold_price == null) { $sold_price = "NULL"; }
		else { $status_id = 2; $s_date = date("Ymd"); }
		if($s_date == null) { $s_date = "NULL"; }
		if($weight == null) { $weight = "NULL"; }
	
		$query = "INSERT INTO product(name, color, status_id, product_type_id, category_id, size, sku, condition_id, weight, notes)
			VALUES('$name', '$color', '$status_id', NULL, '$category_id', '$size', '$sku', $condition_id, $weight, '$notes')";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		$query = "INSERT INTO inventory(account_id, product_id, listed_price, sold_price, sold_date)
			VALUES('$account_id', (SELECT max(product_id) FROM product), $list_price, $sold_price, $s_date)";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		
		// Create an expense row if "purchase date" and/or "purchase price" is not NULL
		if($purchase_price != NULL || $p_date != NULL) {
			$query = "INSERT INTO expense(account_id, product_id, purchase_price, purchase_date, purchase_location, notes)
			VALUES('$account_id', (SELECT max(product_id) FROM product), $purchase_price, $p_date, NULL, '$notes')";
			$run = mysqli_query($con, $query) or die(mysqli_error());
		}
		
		if($run) {
			echo "Successful insert";
			header('location:../../inventory.php');
		}
		else {
			echo "Error: Failed insert";
		}
		
	}
	else {
		echo "Error: Missing field required";
	}
}

else if(isset($_POST['expenseinsert'])){
	
	if(!empty($_POST['name'])){
		$account_id = $_SESSION['account_id'];
		
		$name = $_POST['name'];
		$p_date = $_POST['p_date'];
		$purchase_price = $_POST['purchase_price'];
		$category_id = $_POST['category'];
		$p_location = $_POST['purchase_location'];
		$notes = $_POST['notes'];
		$sku = $_POST['sku'];
		$color = $_POST['color'];
		$size = $_POST['size'];
		$condition_id = $_POST['condition'];
		$status_id = $_POST['status'];
		$category_id = $_POST['category'];
		$list_price = $_POST['list_price'];
		$sold_price = $_POST['sold_price'];
		$s_date = $_POST['s_date'];
		$weight = $_POST['weight'];
		
		if($condition_id == null) { $condition_id = "NULL"; }
		if($purchase_price == null) { $purchase_price = "NULL"; }
		if($p_date == null) { $p_date = "NULL"; }
		if($list_price == null) { $list_price = "NULL"; $status_id = 0; }
		else { $status_id = 1; }
		if($sold_price == null) { $sold_price = "NULL"; }
		else { $status_id = 2; $s_date = date("Ymd"); }
		if($s_date == null) { $s_date = "NULL"; }
		if($weight == null) { $weight = "NULL"; }
		
		$query = "INSERT INTO product(name, color, status_id, product_type_id, category_id, size, sku, condition_id, weight, notes)
				VALUES('$name', '$color', '$status_id', NULL, '$category_id', '$size', '$sku', $condition_id, $weight, '$notes')";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		if(isset($_POST['include-inventory'])){
			$query = "INSERT INTO inventory(account_id, product_id, listed_price, sold_price, sold_date, expense_id)
				VALUES('$account_id', (SELECT max(product_id) FROM product), $list_price, $sold_price, $s_date, (SELECT max(expense_id) FROM expense))";
			$run = mysqli_query($con, $query) or die(mysqli_error());
		}
		
		$query = "INSERT INTO expense(account_id, product_id, purchase_price, purchase_date, purchase_location, notes)
			VALUES('$account_id', (SELECT max(product_id) FROM product), $purchase_price, '$p_date', '$p_location', '$notes')";
		$run = mysqli_query($con, $query) or die(mysqli_error());

		header('location:../../expenses.php');
		
	}
	else {
		echo "Error: Missing field required";
	}
}

else {
	echo "Error: Failed insert";
}

?>