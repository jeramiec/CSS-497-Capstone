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
					<div class="sidebar">
						<div class="logo">
							<h2>TallyUP</h2>
						</div>
						<ul>
							<li><a href="homepage.php"><img class="btn home" src="icons/dashboard.svg" alt="home_btn"/>homepage</a></li>
							<li><a href="notifications.php"><img class="btn notification" src="icons/notifications.svg" alt="notif_btn"/>notifications</a></li>
							<li><a href="inventory.php"><img class="btn inventory" src="icons/inventory.svg" alt="inv_btn"/>inventory</a></li>
							<li class="current"><a href="sales.php"><img class="btn sales" src="icons/sales.svg" alt="sale_btn"/>sales</a></li>
							<li><a href="expenses.php"><img class="btn expenses" src="icons/expenses.svg" alt="exp_btn"/>expenses</a></li>
							<li><a href="invoices.php"><img class="btn invoices" src="icons/invoices.svg" alt="invoi_btn"/>invoices</a></li>
							<li><a href="shopping.php"><img class="btn shopping" src="icons/cart.svg" alt="shop_btn"/>shopping</a></li>
							<li><a href="settings.php"><img class="btn settings" src="icons/settings.svg" alt="set_btn"/>settings</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		
		<main>
			<div class="main-container">
				<div class="main-title">
					<h1>Sales</h1>
					<h4>View sold items</h4>
				</div>
				
				<div class="large-widgets">
					<div class="widget company">
						<div class="widget-inner">
							<h3 class="widget-title">All sales</h3>
							<div>
								<a href="#" id="ins-btn-company" class="ins-btn"><img src="icons/action/add_newitem.svg" alt="add_btn"/></a>
							</div>
						</div>
						<div class="sales">
							<?php require 'php/get_sales.php' ?>
						</div>
					</div>
				</div>
				
				<div class="small-widgets">
					<div class="widget insight">
						<div class="widget-inner">
							<select name="insight" id="insight">
								<option value="overall">Overall</option>
								<option value="company">Company</option>
								<option value="personal">Personal</option>
							</select>
							
						</div>
						
					</div>
				</div>
				
			</div>
			
			<script src="js/main.js"></script>
		</main>
	</body>
</html>