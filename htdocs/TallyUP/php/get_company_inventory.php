<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	$query = "SELECT * FROM tallyup.show_all_inventory_product WHERE category != 
		'Personal assets' AND account_id = {$_SESSION['account_id']}";
	$result = mysqli_query($con, $query) or die(mysqli_error());

	echo "<table>
			<thead>
				<tr>
					<th>Status</th>
					<th>Name</th>
					<th>Size</th>
					<th>SKU</th>
					<th>Condition</th>
					<th>Purchase date</th>
					<th>Purchase total</th>
					<th>Listed price</th>
					<th>Sold price</th>
					<th>Sold date</th>
					<th> </th>
				</tr>
			</thead>";

	echo "<tbody>";
	while($row = mysqli_fetch_array($result)){
		
		$id = $row['product_id'];
		$type = "inventory";
		
		echo "<tr>";
		
		if ($row['status'] == 'Unlisted') {
			echo "<td><img src='icons/status/unlisted.svg' alt='status_unlisited'/></td>";
		}
		else if ($row['status'] == 'Listed') {
			echo "<td><img src='icons/status/listed.svg' alt='status_lisited'/></td>";
		}
		else if ($row['status'] == 'Listed; pending') {
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
		echo "<td>" . $row['sku'] . "</td>";
		echo "<td>" . $row['condition'] . "</td>";
		echo "<td>" . $row['purchase_date'] . "</td>";
		echo "<td>" . $row['purchase_price'] . "</td>";
		echo "<td>" . $row['listed_price'] . "</td>";
		echo "<td>" . $row['sold_price'] . "</td>";
		echo "<td>" . $row['sold_date'] . "</td>";
		echo "<td><a href=inventory_edit.php?id=$id id=edit-$id class=edit-$id><img src='icons/action/edit_item.svg' alt='edit_btn'/></a>
				<a href=php/queries/delete.php?id=$id&type=$type id=delete-$id class=delete-$id><img src='icons/action/delete_item.svg' alt='del_btn'/></a></td>";
		echo "</tr>";
	}

	echo "</tbody></table>";

	mysqli_close($con);
?>