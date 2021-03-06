<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	
	if($companyExpenses) {
		$query = "SELECT * FROM tallyup.show_all_expense_product WHERE category != 
		'Personal assets' AND account_id = {$_SESSION['account_id']} ORDER BY product_id ASC";
		$companyExpenses = false;
	}
	else if ($personalExpenses) {
		$query = "SELECT * FROM tallyup.show_all_expense_product WHERE category = 
		'Personal assets' AND account_id = {$_SESSION['account_id']} ORDER BY product_id ASC";
		$personalExpenses = false;
	}
	else {
		echo "Error: Could not retrieve expenses data";
		$companyExpenses = false;
		$personalExpenses = false;
		mysqli_close($con);
	}
		
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
		
		if ($row['category'] == 'Merchandise') {
			echo "<td><img src='icons/type/merchandise.svg' alt='type_merchandise'/></td>";
		}
		else if ($row['category'] == 'Operational expenses') {
			echo "<td><img src='icons/type/operational.svg' alt='type_operational'/></td>";
		}
		else if ($row['category'] == 'Personal assets') {
			echo "<td><img src='icons/type/personal.svg' alt='type_personal'/></td>";
		}
		else {
			echo "<td>" . $row['category'] . "</td>";
		}
		
		echo "<td><a href=expense_edit.php?id=$id id=edit-$id class=edit-$id>" . $row['name'] . "</a></td>";
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