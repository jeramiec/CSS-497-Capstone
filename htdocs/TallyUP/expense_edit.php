<?php
	session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Edit page</title>
		<link rel="stylesheet" href="css/mainstyle.css" />
	</head>
	
	
	<body>
	
		<!-- NAV BAR -->
		
		<div>
			<div class="wrapper">
				<nav>
					<div class="sidebar">
						<div class="logo">
							<h2>TallyUP</h2>
							<h5>Welcome back, <?php echo $_SESSION['first_name']?> #<?php echo $_SESSION['account_id']?></h5>
						</div>
						<ul>
							<li><a href="homepage.php"><img class="btn home" src="icons/dashboard.svg" alt="home_btn"/>homepage</a></li>
							<li><a href="notifications.php"><img class="btn notification" src="icons/notifications.svg" alt="notif_btn"/>notifications</a></li>
							<li><a href="inventory.php"><img class="btn inventory" src="icons/inventory.svg" alt="inv_btn"/>inventory</a></li>
							<li><a href="sales.php"><img class="btn sales" src="icons/sales.svg" alt="sale_btn"/>sales</a></li>
							<li class="current"><a href="expenses.php"><img class="btn expenses" src="icons/expenses.svg" alt="exp_btn"/>expenses</a></li>
							<li><a href="invoices.php"><img class="btn invoices" src="icons/invoices.svg" alt="invoi_btn"/>invoices</a></li>
							<li><a href="shopping.php"><img class="btn shopping" src="icons/cart.svg" alt="shop_btn"/>shopping</a></li>
							<li><a href="settings.php"><img class="btn settings" src="icons/settings.svg" alt="set_btn"/>settings</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		
		<?php
			$con = mysqli_connect('localhost','jeramiec','1234');
			
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			mysqli_select_db($con,'tallyup');
			$query = "SELECT * FROM tallyup.show_all_expense_product WHERE product_id = {$_GET['id']} AND account_id = {$_SESSION['account_id']}";
			$result = mysqli_query($con, $query) or die(mysqli_error());
			$row = mysqli_fetch_array($result)
		?>

		<main>
			<div class="main-container">
				<div class="main-title">
					<h1>Edit item</h1>
				</div>
				<div class="large-widgets">
					<div class="widget edit">
					<h4 class="go-back"><a href="expenses.php"><img src="icons/action/go_back.svg" width="12">Expenses</a></h4>
						<div class="widget-inner">
							<h3 class="widget-title"><?php echo $row['name'] ?></h3>
						</div>
						<div class="insert-form">
							<form action="php/queries/update.php?id=<?php echo $_GET['id'] ?>" method="post">
								<div class="row1">
									<div>
										<label>Item name</label>
										<input type="text" name="name" value="<?php echo $row['name']?>" required>
									</div>
									<div>
										<label>Purchase date</label>
										<input type="date" name="p_date" value="<?php echo $row['purchase_date']?>">
									</div>
									<div>
										<label>Purchase price</label>
										<input type="text" name="purchase_price" value="<?php echo $row['purchase_price']?>">
									</div>
								</div>
								<?php 
									$query = "SELECT * FROM inventory WHERE account_id = {$_SESSION['account_id']} AND product_id = {$_GET['id']};";
									$result = mysqli_query($con, $query) or die(mysqli_error());
									$num = mysqli_num_rows($result);
									$inInventory = false;
									
									if($num == 1){
										$inInventory = true;
									}
									else {
										echo "<button class='addtoinventory' type='submit' name='addtoinventory'>Add to inventory</button>";
									}
								?>
								<div class="row2"
								<?php if(!$inInventory) { ?>
									style="display:none"
								<?php } ?>>
									<?php
										$query = "SELECT * FROM tallyup.show_all_inventory_product WHERE product_id = {$_GET['id']} AND account_id = {$_SESSION['account_id']}";
										$result = mysqli_query($con, $query) or die(mysqli_error());
										$row = mysqli_fetch_array($result);
									?>
									<div class="column">
										<div>
											<label>SKU</label>
											<input type="text" name="sku" value="<?php echo $row['sku'];?>">
										</div>
										<div>
											<label>Color</label>
											<input type="text" name="color" value="<?php echo $row['color'];?>">
										</div>
										<div>
											<label>Size</label>
											<input type="text" name="size" value="<?php echo $row['size'];?>">
										</div>
									</div>
									<div class="column">
										<div>
											<label>Condition</label>
											<select id="condition" name="condition">
												<option value=0 <?php if($row['condition'] == 'Brand new') { echo 'selected=selected'; }?>>Brand new</option>
												<option value=1 <?php if($row['condition'] == 'Like new') { echo 'selected=selected'; }?>>Like new</option>
												<option value=2 <?php if($row['condition'] == 'Used') { echo 'selected=selected'; }?>>Used</option>
												<option value=3 <?php if($row['condition'] == 'Very used') { echo 'selected=selected'; }?>>Very used</option>
												<option value=4 <?php if($row['condition'] == 'Damaged; issues') { echo 'selected=selected'; }?>>Damaged; issues</option>
											</select>
										</div>
										<div>
											<label>Status</label>
											<select id="status" name="status">
												<option value=0 <?php if($row['status'] == 'Unlisted') { echo 'selected=selected'; }?>>Unlisted</option>
												<option value=1 <?php if($row['status'] == 'Listed') { echo 'selected=selected'; }?>>Listed</option>
												<option value=2 <?php if($row['status'] == 'Listed; pending') { echo 'selected=selected'; }?>>Pending</option>
												<option value=3 <?php if($row['status'] == 'Sold') { echo 'selected=selected'; }?>>Sold</option>
											</select>
										</div>
										<div>
											<label>Listed price</label>
											<input type="text" name="list_price" value="<?php echo $row['listed_price'];?>">
										</div>
									</div>
									<div class="column">
										<div>
											<label>Sold price</label>
											<input type="text" name="sold_price" value="<?php echo $row['sold_price'];?>">
										</div>
										<div>
											<label>Sold date</label>
											<input type="date" name="s_date" value="<?php echo $row['sold_date'];?>">
										</div>
										<div>
											<label>Weight</label>
											<input type="text" name="weight" value="<?php echo $row['weight'];?>">
										</div>
									</div>
								</div>
								<div class="row3">
								<?php
									$query = "SELECT * FROM tallyup.show_all_expense_product WHERE product_id = {$_GET['id']} AND account_id = {$_SESSION['account_id']}";
									$result = mysqli_query($con, $query) or die(mysqli_error());
									$row = mysqli_fetch_array($result)
								?>
									<div>
										<label>Category</label>
										<select id="category" name="category">
											<option value=0 <?php if($row['category'] == 'Merchandise') { echo 'selected=selected'; }?>>Merchandise</option>
											<option value=1 <?php if($row['category'] == 'Operational expenses') { echo 'selected=selected'; }?>>Company item/tool</option>
											<option value=2 <?php if($row['category'] == 'Personal assets') { echo 'selected=selected'; }?>>Personal item/tool</option>
										</select>
									</div>
									<div>
										<label>Purchase location</label>
										<input type="text" name="purchase_location" value="<?php echo $row['purchase_location'];?>">
									</div>
								</div>
								<div class="row4">
									<p>[Upload reciept]</p>
								</div>
								<div class="row5">
									<div>
										<label>Notes</label>
										<textarea name="notes"><?php echo $row['notes']; ?></textarea>
									</div>
								</div>
								<button type="submit" name="expenseupdate"><img src="icons/action/save_item.svg"></button>
								<button type="reset" name="reset"><img src="icons/action/clear_item.svg"></button>
								<button type="delete" name="delete"><img src='icons/action/delete_item2.svg' alt='del_btn'/></button>
							</form>
						</div>
					</div>
				</div>
		</main>
		
		
	</body>
</html>

<?php
	mysqli_close($con);
?>