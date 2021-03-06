<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	
	if($total_sales) {
		$query = "SELECT * FROM tallyup.net_sales WHERE account_id = {$_SESSION['account_id']}";
		$result = mysqli_query($con, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$sales = $row['net_sales'];
		echo $sales;
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
		echo ($purchases - $sales);
		$profit = false;
	}

	mysqli_close($con);
?>