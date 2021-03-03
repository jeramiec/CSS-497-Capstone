<?php
session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Homepage dashboard</title>
		<link rel="stylesheet" href="css/mainstyle.css" />
	</head>
	
	
	<body>
	
		<!-- NAV BAR -->
		
		<div class="nav-container">
			<div class="wrapper">
				<nav>
					<div class="sidebar">
						<div class="logo">
							<h2>TallyUP</h2>
							<h5>Welcome back, <?php echo $_SESSION['first_name']?> #<?php echo $_SESSION['account_id']?></h5>
						</div>
						<ul>
							<li class="current"><a href="homepage.php"><img class="btn home" src="icons/dashboard.svg" alt="home_btn"/>homepage</a></li>
							<li><a href="notifications.php"><img class="btn notification" src="icons/notifications.svg" alt="notif_btn"/>notifications</a></li>
							<li><a href="inventory.php"><img class="btn inventory" src="icons/inventory.svg" alt="inv_btn"/>inventory</a></li>
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
				<div class="wrapper">
					<header>
						<div class="main-title">
							<h1>Dashboard</h1>
								<p class="datetime">date/time</p>
							<a href="#">edit widgets</a>
						</div>
				
						<div class="hero-image">
							<div class="photo-bg"></div>
						</div>
					</header>
				</div>

				<!-- WIDGETS -->
				
				<div class="large-widgets">
					<div class="widget wkreport">
						<div class="widget-inner">
							<h3 class="widget-title">Weekly Report<h3>
						</div>
					</div>
				</div>
				
				<div class="medium-widgets">
					<div class="widget portfolio">
						<div class="widget-inner">
							<h3 class="widget-title">Portfolio<h3>
						</div>
					</div>
					
					<div class="widget notification">
						<div class="widget-inner">
							<h3 class="widget-title">Notifications<h3>
						</div>
					</div>
				</div>

				
			</div>
		</main>

		
		<script src="main.js"</script>
	</body>
</html>