<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	$query = "SELECT * FROM tallyup.show_all_sales WHERE account_id = {$_SESSION['account_id']}";
	$result = mysqli_query($con, $query) or die(mysqli_error());

	echo "<table>
			<thead>
				<tr>
					<th>Status</th>
					<th>Name</th>
					<th>Size</th>
					<th>Color</th>
					<th>Sold date</th>
					<th>Purchase price</th>
					<th>Sold price</th>
					<th>Profit</th>
					<th>Invoice #</th>
					<th></th>
				</tr>
			</thead>";


	echo "<tbody>";
	while($row = mysqli_fetch_array($result)){
		
		$id = $row['product_id'];
		$type = "sales";
		
		echo "<tr>";
		if ($row['status'] == 'Listed; pending') {
			echo "<td><img src='icons/status/pending.svg' alt='status_pending'/></td>";
		}
		else if ($row['status'] == 'Sold') {
			echo "<td><img src='icons/status/sold.svg' alt='status_sold'/></td>";
		}
		else {
			echo "<td>" . $row['status'] . "</td>";
		}
		
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['size'] . "</td>";
		echo "<td>" . $row['color'] . "</td>";
		echo "<td>" . $row['sold_date'] . "</td>";
		echo "<td>" . $row['purchase_price'] . "</td>";
		echo "<td>" . $row['sold_price'] . "</td>";
		echo "<td>" . $row['profit'] . "</td>";
		echo "<td></td>";
		echo "<td><a href=inventory_edit.php?id=$id id=edit-$id class=edit-$id><img src='icons/action/edit_item.svg' alt='edit_btn'/></a>
				<a href=php/queries/delete.php?id=$id&type=$type id=delete-$id class=delete-$id><img src='icons/action/delete_item.svg' alt='del_btn'/></a></td>";
		echo "</tr>";
	}

	echo "</tbody></table>";

	mysqli_close($con);
?>