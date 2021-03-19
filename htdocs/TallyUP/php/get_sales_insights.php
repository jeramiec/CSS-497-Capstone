<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	
	if($net_sales) { // Net sales overall
		$query = "SELECT * FROM tallyup.net_sales WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['net_sales'];
		echo $sales;
		$net_sales = false;
	}
	else if($sales_num) { // Number of items sold overall
		$query = "SELECT COUNT(sold_price) AS 'total_sales' FROM tallyup.show_all_inventory_product WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['total_sales'];
		echo $sales . " sold";
		$sales_num = false;
	}
	else if($net_sales_week) { // Net sales of the current week
		$query = "SELECT * FROM tallyup.weekly_sales WHERE account_id = {$_SESSION['account_id']} LIMIT 1";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['s_company'] + $row['s_personal'];
		echo $sales;
		$net_sales_week = false;
	}
	else if($sales_num_week) { // Number of items sold in the current week
		$query = "SELECT * FROM tallyup.weekly_sales WHERE account_id = {$_SESSION['account_id']} LIMIT 1";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['total_products_sold'];
		echo $sales . " sold";
		$sales_num_week = false;
	}
	else if($profit) {
		$query = "SELECT * FROM tallyup.net_purchases WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$purchases = $row['net_purchases'];
		
		$query = "SELECT * FROM tallyup.net_sales WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['net_sales'];
		echo ($purchases - $sales);
		$profit = false;
	}
	mysqli_close($con);
?>