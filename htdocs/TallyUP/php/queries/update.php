<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234'); //Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con,'tallyup');

if(isset($_POST['inventoryupdate'])){	// Initiates an inventory update
	
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
		else { $status_id = 1;}
		if($sold_price == null) { $sold_price = "NULL"; $s_date = "NULL"; }
		else {$status_id = 3;if($s_date == null) { $s_date = date("Ymd"); } }
		if($s_date == null) { $s_date = "NULL"; }
		if($weight == null) { $weight = "NULL"; }
		
		//$query = "SELECT * FROM tallyup.show_all_inventory_product WHERE product_id = {$_GET['id']}";
		//$run = mysqli_query($con, $query) or die(mysqli_error());
		//$row = mysqli_fetch_array($run);
		
		//if(($_POST['purchase_price'] == $row['purchase_price']) && ($_POST['p_date'] == $row['purchase_date']) && ($_POST['list_price']  == $row['listed_price']) && ($_POST['sold_price'] == $row['sold_price']) && ($_POST['s_date'] == $row['sold_date']) && ($_POST['status'] != row['status_id'])) {
		//	$status_id = $_POST['status'];
		//}
		
		$query = "UPDATE product SET name = '$name', color = '$color', status_id = '$status_id', category_id = '$category_id',
				size = '$size', sku = '$sku', condition_id = $condition_id, weight = $weight, notes = '$notes' WHERE product_id = {$_GET['id']}";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
	
		if($s_date == "NULL") {
			$query = "UPDATE inventory SET listed_price = $list_price, sold_price = $sold_price, sold_date = DEFAULT WHERE product_id = {$_GET['id']}";
		}
		else {
			$query = "UPDATE inventory SET listed_price = $list_price, sold_price = $sold_price, sold_date = '$s_date' WHERE product_id = {$_GET['id']}";
		}
		$run = mysqli_query($con, $query) or die(mysqli_error());

		
		// First check if row exists in expense
		$query = "SELECT * FROM expense WHERE product_id = {$_GET['id']}";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		$num = mysqli_num_rows($run);
		
		if ($num == 1) {
			if($p_date == "NULL") {
				$query = "UPDATE expense SET purchase_price = $purchase_price, purchase_date = DEFAULT WHERE product_id = {$_GET['id']}";
			}
			else {
				$query = "UPDATE expense SET purchase_price = $purchase_price, purchase_date = '$p_date' WHERE product_id = {$_GET['id']}";
			}
			$run = mysqli_query($con, $query) or die(mysqli_error());
		}
		else {
			if($p_date == "NULL") {
				$query = "INSERT INTO expense(account_id, product_id, purchase_price, purchase_date, purchase_location, notes)
				VALUES('$account_id', {$_GET['id']}, $purchase_price, DEFAULT, NULL, '$notes')";
			}
			else {
				$query = "INSERT INTO expense(account_id, product_id, purchase_price, purchase_date, purchase_location, notes)
				VALUES('$account_id', {$_GET['id']}, $purchase_price, '$p_date', NULL, '$notes')";
			}
			$run = mysqli_query($con, $query) or die(mysqli_error());
		}

		header('location:../../inventory.php');
		
	}
	else {
		echo "Error: Missing field required";
	}
}
else if (isset($_POST['expenseupdate'])){	// Initiates an expense update
	
	if(!empty($_POST['name'])){
		
		$account_id = $_SESSION['account_id'];
		
		$query = "SELECT * FROM inventory WHERE account_id = '$account_id' AND product_id = {$_GET['id']};";
		$result = mysqli_query($con, $query);
		$num = mysqli_num_rows($result);
		
		if($num == 1){	// If item is also in inventory
			$sku = $_POST['sku'];
			$color = $_POST['color'];
			$size = $_POST['size'];
			$condition_id = $_POST['condition'];
			$status_id = $_POST['status'];
			$list_price = $_POST['list_price'];
			$sold_price = $_POST['sold_price'];
			$s_date = $_POST['s_date'];
			$weight = $_POST['weight'];
			
			if($condition_id == null) { $condition_id = "NULL"; }
			if($list_price == null) { $list_price = "NULL"; $status_id = 0; }
			else { $status_id = 1; }
			if($sold_price == null) { $sold_price = "NULL"; }
			else { $status_id = 3; if($s_date == null) { $s_date = date("Ymd"); } }
			if($s_date == null) { $s_date = "NULL"; }
			if($weight == null) { $weight = "NULL"; }
			
			$query = "UPDATE product SET color = '$color', status_id = '$status_id', size = '$size', sku = '$sku',
				condition_id = $condition_id, weight = $weight WHERE product_id = {$_GET['id']}";
			$run = mysqli_query($con, $query) or die(mysqli_error());
			
			if($s_date == "NULL") {
				$query = "UPDATE inventory SET listed_price = $list_price, sold_price = $sold_price, sold_date = DEFAULT WHERE product_id = {$_GET['id']}";
			}
			else {
				$query = "UPDATE inventory SET listed_price = $list_price, sold_price = $sold_price, sold_date = '$s_date' WHERE product_id = {$_GET['id']}";
			}
			$run = mysqli_query($con, $query) or die(mysqli_error());
		}
		
		$name = $_POST['name'];
		$p_date = $_POST['p_date'];
		$purchase_price = $_POST['purchase_price'];
		$category_id = $_POST['category'];
		$purchase_location = $_POST['purchase_location'];
		$notes = $_POST['notes'];
		
		if($purchase_price == null) { $purchase_price = "NULL"; }
		if($p_date == null) { $p_date = "NULL"; }
		
		$query = "UPDATE product SET name = '$name', category_id = '$category_id', notes = '$notes' WHERE product_id = {$_GET['id']}";
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		if($p_date == "NULL") {
			$query = "UPDATE expense SET purchase_price = $purchase_price, purchase_date = DEFAULT,
			purchase_location = '$purchase_location', notes = '$notes' WHERE product_id = {$_GET['id']}";
		}
		else {
			$query = "UPDATE expense SET purchase_price = $purchase_price, purchase_date = '$p_date',
			purchase_location = '$purchase_location', notes = '$notes' WHERE product_id = {$_GET['id']}";
		}
		$run = mysqli_query($con, $query) or die(mysqli_error());
		
		header('location:../../expenses.php');

	}
	else {
		echo "Error: Missing field required";
	}
}
else if (isset($_POST['addtoinventory'])){	// Initiates inventory inclusion

	$account_id = $_SESSION['account_id'];
	
	$query = "INSERT INTO inventory(account_id, product_id, listed_price, sold_price, sold_date, expense_id)
			VALUES('$account_id', {$_GET['id']}, NULL, NULL, NULL, NULL)";
	$run = mysqli_query($con, $query) or die(mysqli_error());
	
	$query = "SELECT * FROM tallyup.show_all_inventory_product WHERE product_id = {$_GET['id']} AND account_id = {$_SESSION['account_id']}";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$row = mysqli_fetch_array($result);
	
	header('location:../../expenses.php');
}
else {
	echo "Error: Couldn't initiate update.";
}
?>