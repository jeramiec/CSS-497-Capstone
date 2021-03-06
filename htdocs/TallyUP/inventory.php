<?php
	session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Inventory page</title>
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
							<h5>Welcome back, <?php echo $_SESSION['username']?> #<?php echo $_SESSION['account_id'] ?></h5>
						</div>
						<ul>
							<li><a href="homepage.php"><img class="btn home" src="icons/dashboard.svg" alt="home_btn"/>homepage</a></li>
							<li><a href="notifications.php"><img class="btn notification" src="icons/notifications.svg" alt="notif_btn"/>notifications</a></li>
							<li class="current"><a href="inventory.php"><img class="btn inventory" src="icons/inventory.svg" alt="inv_btn"/>inventory</a></li>
							<li><a href="sales.php"><img class="btn sales" src="icons/sales.svg" alt="sale_btn"/>sales</a></li>
							<li><a href="expenses.php"><img class="btn expenses" src="icons/expenses.svg" alt="exp_btn"/>expenses</a></li>
							<li><a href="invoices.php"><img class="btn invoices" src="icons/invoices.svg" alt="invoi_btn"/>invoices</a></li>
							<li><a href="shopping.php"><img class="btn shopping" src="icons/cart.svg" alt="shop_btn"/>shopping</a></li>
							<li><a href="settings.php"><img class="btn settings" src="icons/settings.svg" alt="set_btn"/>settings</a></li>
						</ul>
					</div>
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
								<a href="#" id="ins-btn-company" class="ins-btn"><img src="icons/action/add_newitem.svg" alt="add_btn"/></a>
							</div>
						</div>
						<div class="inventory">
							<?php $companyInventory = true; require 'php/get_inventory.php' ?>
						</div>
					</div>
				</div>
				
				<div class="large-widgets">
					<div class="widget personal">
						<div class="widget-inner">
							<h3 class="widget-title">Personal</h3>
							<div>
								<a href="#" id="ins-btn-personal" class="ins-btn"><img src="icons/action/add_newitem.svg" alt="add_btn"/></a>
							</div>
						</div>
						<div class="inventory">
							<?php $personalInventory = true; require 'php/get_inventory.php' ?>
						</div>
					</div>
				</div>
				
				<div class="large-widgets">
					<div class="widget insight">
						<div class="widget-inner">
							<select name="insight" id="insight">
								<option value="overall">Overall</option>
								<option value="company">Company</option>
								<option value="personal">Personal</option>
							</select>
							
						</div>
						<div class="widget-content">
							<?php $insights = true; require 'php/get_inventory_insights.php'?>
						</div>
					</div>
				</div>
				
			</div>
			
			
			<!-- MODAL -->
			
			<div class="bg-modal">
				<div class="modal-content">
					<div class="modal-head">
						<h3>Insert new item into inventory</h3>
					</div>
					<div class="close">
						<a href="" id="close-btn" class="close-btn"><img src="icons/action/close.svg" alt="close_btn"/></a>
					</div>
					<div class="insert-form">
						<form action="php/queries/insert.php" method="post">
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
									<select id="condition" name="condition">
										<option value=null selected> - Select condition - </option>
										<option value=0>Brand new</option>
										<option value=1>Like new</option>
										<option value=2>Used</option>
										<option value=3>Very used</option>
										<option value=4>Damaged; issues</option>
									</select>
								</div>
								<div>
									<label>Status</label>
									<select id="status" name="status">
										<option value=0 selected> - Select status - </option>
										<option value=0>Unlisted</option>
										<option value=1>Listed</option>
										<option value=2>Pending</option>
										<option value=3>Sold</option>
									</select>
								</div>
							</div>
							<div class="row3">
								<div>
									<label>Purchase price</label>
									<input type="text" name="purchase_price">
								</div>
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
										<option value='' selected> - Select category - </option>
										<option value=0>Merchandise</option>
										<option value=1>Company item/tool</option>
										<option value=2>Personal item/tool</option>
									</select>
								</div>
								<div>
									<label>Weight</label>
									<input type="text" name="weight">
								</div>
								<div>
									<label>Notes</label>
									<textarea name="notes"></textarea>
								</div>
							</div>
							
							<button type="submit" name="inventoryinsert"><img src="icons/action/save_item.svg"></button>
							<button type="reset" name="reset"><img src="icons/action/clear_item.svg"></button>
						</form>
					</div> 
				</div>
			</div>
		</main>
		<script src="js/main.js"></script>
	</body>
</html>