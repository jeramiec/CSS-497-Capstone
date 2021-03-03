<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	$query = "SELECT * FROM tallyup.show_all_expense_product WHERE category != 
		'Personal assets' AND account_id = {$_SESSION['account_id']}";
	$result = mysqli_query($con, $query) or die(mysqli_error());

	echo "<table>
			<thead>
				<tr>
					<th>Type</th>
					<th>Name</th>
					<th>Purchase price</th>
					<th>Purchase date</th>
					<th>Purchase location</th>
					<th></th>
				</tr>
			</thead>";

	echo "<tbody>";
	while($row = mysqli_fetch_array($result)){
		
		$id = $row['product_id'];
		$type = "expense";
		
		echo "<tr>";
		echo "<td></td>";
		//echo "<td>" . $row['status'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['purchase_price'] . "</td>";
		echo "<td>" . $row['purchase_date'] . "</td>";
		echo "<td>" . $row['purchase_location'] . "</td>";
		echo "<td><a href=expense_edit.php?id=$id id=edit-$id class=edit-$id><img src='icons/action/edit_item.svg' alt='edit_btn'/></a>
				<a href=php/queries/delete.php?id=$id&type=$type id=delete-$id class=delete-$id><img src='icons/action/delete_item.svg' alt='del_btn'/></a></td>";
		echo "</tr>";
	}

	echo "</tbody></table>";

	mysqli_close($con);
?>