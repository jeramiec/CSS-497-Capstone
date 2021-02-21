<?php
	$con = mysqli_connect('localhost','jeramiec','1234');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_select_db($con,'tallyup');
	$query = "SELECT * FROM tallyup.show_all_inventory_product WHERE category != 
		'Personal assets' AND account_id = {$_SESSION['id']}";
	$result = mysqli_query($con, $query);

	if($result == FALSE){
		die(mysql_erorr());
	}

	echo "<table>
			<thead>
				<tr>
					<th>Type</th>
					<th>Name</th>
					<th>Purchase total</th>
					<th>Purchase date</th>
					<th>Purchase location</th>
				</tr>
			</thead>";

	echo "<tbody>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['status'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['size'] . "</td>";
		echo "<td>" . $row['sku'] . "</td>";
		echo "<td>" . $row['condition'] . "</td>";
		echo "<td>" . $row['purchase_date'] . "</td>";
		echo "<td>" . $row['cost'] . "</td>";
		echo "<td>" . $row['listed_price'] . "</td>";
		echo "<td>" . $row['sold_price'] . "</td>";
		echo "<td>" . $row['sold_date'] . "</td>";
		echo "</tr>";
	}

	echo "</tbody></table>";

	mysqli_close($con);
?>