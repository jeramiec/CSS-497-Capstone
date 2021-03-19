<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	
	if($total_expenses) {
		$query = "SELECT SUM(purchase_price) AS 'sum' FROM tallyup.show_all_expense_product WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$total = $row['sum'];
		echo "$" . $total;
		$total_expenses = false;
	}
	else if($total_sales) {
		$query = "SELECT SUM(sold_price) AS 'sum' FROM tallyup.show_all_inventory_product WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$total = $row['sum'];
		echo "$" . $total;
		$total_sales = false;
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
		echo "$" . ($purchases - $sales);
		$profit = false;
	}
	else if($unrealized_profit) {
		echo "$";
		$unrealized_profit = false;
	}
	else if($avg_item) {
		$query = "SELECT AVG(sold_price) AS 'avg' FROM tallyup.show_all_inventory_product WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$total = $row['avg'];
		echo "$" . round($total, 2);
		$avg_item = false;
	}
	else if($popular_item) {
		$query = "SELECT name, COUNT(*) AS 'num_sold' FROM tallyup.show_all_inventory_product WHERE account_id = {$_SESSION['account_id']} GROUP BY name ORDER BY num_sold DESC LIMIT 1";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$row['name'];
		echo $row['name'];
		$popular_item = false;
	}
	else if($largest_sale) {
		$query = "SELECT MAX(sold_price) AS 'largest' FROM tallyup.show_all_inventory_product WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$total = $row['largest'];
		echo "$" . $total;
		$largest_sale = false;
	}
	else if($ytd_expenses) {
		echo "$";
		$ytd_expenses = false;
	}
	else if($ytd_networth) {
		echo "$";
		$ytd_networth = false;
	}

	mysqli_close($con);
?>