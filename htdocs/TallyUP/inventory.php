<?php
	session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Notifications page</title>
		<link rel="stylesheet" href="css/mainstyle.css" />
	</head>
	
	
	<body>
	
		<!-- NAV BAR -->
		
		<div>
			<div class="wrapper">
				<nav>
					<span class="open-slide">
					<div class="sidebar">
						<div class="logo">
							<h2>TallyUP</h2>
							<h5>Welcome back, <?php echo $_SESSION['username']?> #<?php echo $_SESSION['id']?></h5>
						</div>
						<ul>
							<li><a href="homepage.php"><img class="btn home" src="icons/dashboard.svg" alt="home_btn"/>homepage</a></li>
							<li><a href="notifications.php"><img class="btn notification" src="icons/notifications.svg" alt="notif_btn"/>notifications</a></li>
							<li><a class="current" href="inventory.php"><img class="btn inventory" src="icons/inventory.svg" alt="inv_btn"/>inventory</a></li>
							<li><a href="sales.php"><img class="btn sales" src="icons/sales.svg" alt="sale_btn"/>sales</a></li>
							<li><a href="expenses.php"><img class="btn expenses" src="icons/expenses.svg" alt="exp_btn"/>expenses</a></li>
							<li><a href="invoices.php"><img class="btn invoices" src="icons/invoices.svg" alt="invoi_btn"/>invoices</a></li>
							<li><a href="shopping.php"><img class="btn shopping" src="icons/cart.svg" alt="shop_btn"/>shopping</a></li>
							<li><a href="settings.php"><img class="btn settings" src="icons/settings.svg" alt="set_btn"/>settings</a></li>
						</ul>
					</div>
					</span>
				</nav>
			</div>
		</div>
		
		<!-- END OF NAV BAR -->
		
		<main>
			<div class="main-container">
				<div class="main-title">
					<h1>Inventory</h1>
					<h4>Manage your current inventory of products</h4>
				</div>
				
				<div class="large-widgets">
					<div class="widget company">
						<div class="widget-inner">
							<h3 class="widget-title">Company</h3>
							<div>
								<a href="#" id="ins-btn" class="ins-btn"><img src="icons/action/add.svg" alt="add_btn"/></a>
							</div>
						</div>
						<div class="datatable inventory">
							<?php
							
							$con = mysqli_connect('localhost','jeramiec','1234');

							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							mysqli_select_db($con,'tallyup');
							$query = "SELECT p.*, i.inventory_id, i.account_id, i.description, i.listed_price, i.sold_price, i.sold_date, e.cost, e.purchase_date FROM product p INNER JOIN inventory i ON (p.product_id = i.product_id) LEFT JOIN expense e ON (e.product_id = i.product_id) WHERE category_id != 2 AND i.account_id = {$_SESSION['id']}"; // Query for returning user-unique inventory
							$result = mysqli_query($con, $query);
							
							if($result == FALSE){
								die(mysql_erorr());
							}

							echo "<table>
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
								<th>Notes</th>
							</tr>";

							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>" . $row['status_id'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['size'] . "</td>";
								echo "<td>" . $row['sku'] . "</td>";
								echo "<td>" . $row['condition_id'] . "</td>";
								echo "<td>" . $row['purchase_date'] . "</td>";
								echo "<td>" . $row['cost'] . "</td>";
								echo "<td>" . $row['listed_price'] . "</td>";
								echo "<td>" . $row['sold_price'] . "</td>";
								echo "<td>" . $row['sold_date'] . "</td>";
								echo "<td>" . $row['description'] . "</td>";
								echo "</tr>";
							}

							echo "</table>";

							mysqli_close($con);
							?>
						</div>
					</div>
				</div>
				
				<div class="large-widgets">
					<div class="widget personal">
						<div class="widget-inner">
							<h3 class="widget-title">Personal</h3>
							
							<a href="add_inventory.php"><div class="insert-inventory"><img class="btn insert" src="icons/action/add.svg" alt="add_btn"/></div></a>
							
						</div>
						<div class="table inventory">
							<?php
							$con = mysqli_connect('localhost','jeramiec','1234');

							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							mysqli_select_db($con,'tallyup');
							$query = "SELECT p.*, i.inventory_id, i.account_id, i.description, i.listed_price, i.sold_price, i.sold_date, e.cost, e.purchase_date FROM product p INNER JOIN inventory i ON (p.product_id = i.product_id) LEFT JOIN expense e ON (e.product_id = i.product_id) WHERE category_id = 2 AND i.account_id = {$_SESSION['id']}"; // Query for returning user-unique inventory
							$result = mysqli_query($con, $query);
							
							if($result == FALSE){
								die(mysql_erorr());
							}

							echo "<table>
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
								<th>Notes</th>
							</tr>";

							while($row = mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>" . $row['status_id'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['size'] . "</td>";
								echo "<td>" . $row['sku'] . "</td>";
								echo "<td>" . $row['condition_id'] . "</td>";
								echo "<td>" . $row['purchase_date'] . "</td>";
								echo "<td>" . $row['cost'] . "</td>";
								echo "<td>" . $row['listed_price'] . "</td>";
								echo "<td>" . $row['sold_price'] . "</td>";
								echo "<td>" . $row['sold_date'] . "</td>";
								echo "<td>" . $row['description'] . "</td>";
								echo "</tr>";
							}

							echo "</table>";

							mysqli_close($con);
							?>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="bg-modal">
				<div class="modal-content">
					<div class="modal-head">
						<h3>Insert new item to inventory</h3>
					</div>
					<div class="close">
						<a href="" id="close-btn" class="close-btn"><img src="icons/action/close.svg" alt="close_btn"/></a>
					</div>
					<div class="modal-form">
						<form action="queries/insert.php" method="post">
							<div class="row1">
								<div>
									<label>Item name</label>
									<input type="text" name="name" required>
								</div>
								<div>
									<label>SKU</label>
									<input type="text" name="sku">
								</div>
								<div>
									<label>Color</label>
									<input type="text" name="color">
								</div>
							</div>
							<div class="row2">
								<div>
									<label>Size</label>
									<input type="text" name="size">
								</div>
								<div>
									<label>Condition</label>
									<select id="category" name="category">
										<option value=0>Brand new</option>
										<option value=1>Like new</option>
										<option value=2>Used</option>
										<option value=3>Very used</option>
										<option value=4>Damaged; issues</option>
									</select>
								</div>
								<div>
									<label>Status</label>
									<input type="text" name="status">
								</div>
							</div>
							<div class="row3">
								<div>
									<label>Purchase date</label>
									<input type="date" name="p_date">
								</div>
								<div>
									<label>Listed price</label>
									<input type="text" name="list_price">
								</div>
							</div>
							<div class="row4">
								<div>
									<label>Sold price</label>
									<input type="text" name="sold_price">
								</div>
								<div>
									<label>Sold date</label>
									<input type="date" name="s_date">
								</div>
							</div>
							<div class="row5">
								<div>
									<label>Category</label>
									<select id="category" name="category">
										<option value=0>Merchendise</option>
										<option value=1>Company item/tool</option>
										<option value=2>Personal item/tool</option>
									</select>
								</div>
								<div>
									<label>Notes</label>
									<textarea name="notes"></textarea>
								</div>
							</div>
							
							<button type="submit" name="submit">Save</button>
							<button type="reset" name="reset">Clear</button>
						</form>
					</div> 
				</div>
			</div>
			
			<script src="js/main.js"></script>
	</body>
</html>