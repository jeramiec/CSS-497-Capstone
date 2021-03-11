<?php
session_start();

$con = mysqli_connect('localhost','jeramiec','1234');
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_select_db($con,'tallyup');
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Homepage dashboard</title>
		<link rel="stylesheet" href="css/mainstyle.css" />
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Month', 'Company', 'Personal'],
					<?php
					$query = "SELECT * FROM tallyup.monthly_sales WHERE account_id = {$_SESSION['account_id']} AND month IS NOT NULL";
					$result = mysqli_query($con, $query) or die(mysqli_error());
					while($row = mysqli_fetch_assoc($result)) {
						echo "['".$row['month']."', ".$row['s_company'].", ".$row['s_personal']."],";
					}
					?>
				]);
				
				var options = {
					title: '',
					curveType: 'function',
					legend: { position: 'right' }
				};

				var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

				chart.draw(data, options);
			}
		</script>
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
							<h3 class="widget-title">Annual Report<h3>
						</div>
						<div id="curve_chart" style="width: 900px; height: 500px"></div>
					</div>
				</div>
				
				<div class="medium-widgets homepage">
					<div class="widget portfolio">
						<div class="widget-inner">
							<h3 class="widget-title">Portfolio<h3>
						</div>
						<div class="current-totals">
							<ul>
								<li><img src="icons/homepage/portfolio_inventory.svg" alt="portfolio_inventory">
								<?php
								$query = "SELECT total_available_items FROM tallyup.total_available_items WHERE account_id = {$_SESSION['account_id']}";
								$run = mysqli_query($con, $query) or die(mysqli_error());
								$row = mysqli_fetch_assoc($run);
								echo $row['total_available_items'];
								?>
								Total items</li>
								<li><img src="icons/homepage/portfolio_sales.svg" alt="portfolio_sales">
								<?php
								$query = "SELECT total_sold FROM tallyup.total_sold WHERE account_id = {$_SESSION['account_id']}";
								$run = mysqli_query($con, $query) or die(mysqli_error());
								$row = mysqli_fetch_assoc($run);
								echo $row['total_sold'];
								?>
								Sold</li>
								<li><img src="icons/homepage/portfolio_expenses.svg" alt="portfolio_expenses">
								<?php
								$query = "SELECT total_purchases FROM tallyup.total_purchases WHERE account_id = {$_SESSION['account_id']}";
								$run = mysqli_query($con, $query) or die(mysqli_error());
								$row = mysqli_fetch_assoc($run);
								if($row['total_purchases'] == 1) {
									echo $row['total_purchases'] . " Purchased";
								}
								else {
									echo $row['total_purchases'] . " Purchases";
								}
								?></li>
							</ul>
						</div>
						<div class="widget-content">
							<ul>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							<ul>
								<li></li>
								<li></li>
								<li></li>
							</ul>
							<ul>
								<li></li>
								<li></li>
								<li></li>
							</ul>
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

		
		<script src="js/main.js"</script>
	</body>
</html>