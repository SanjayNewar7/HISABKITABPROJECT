<!DOCTYPE html>
<html>
<head>
	<!--   ***** Link To Custom Stylesheet *****   -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


	<!-- *******  Font Awesome Icons Link  ******* -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<body>
<!--   *** Page Wrapper Starts ***   -->
<div class="page-wrapper">

<!--   *** Top Bar Starts ***   -->
<div class="top-bar">
	<div class="top-bar-left">
		<div class="hamburger-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="logo">
			<img src="images/logo.png" alt="logo">
		</div>
	</div>

	<div class="search-box">
		<input type="text" class="input-box" placeholder="Search...">
		<span class="search-btn">
			<i class="fa-solid fa-search"></i>
		</span>
	</div>

	<div class="top-bar-right">
		<div class="mode-switch">
			<i class="fa-solid fa-moon"></i>
		</div>
		<div class="notifications">
			<i class="fa-solid fa-bell"></i>
		</div>
		<div class="profile">
			<img src="images/profile.jpg" alt="profile">
		</div>
	</div>
</div>
<!--   *** Top Bar Ends ***   -->

<!--   === Side Bar Starts ===   -->
<!--   === Side Bar Starts ===   -->
<aside class="side-bar">
    <!--   === Nav Bar Links Starts ===   -->
    <span class="menu-label">Services</span>
    <ul class="navbar-links navbar-links-1">
        <li class="active">
            <a href="{{ route('dashboard') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('addorders') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-tasks"></i>
                </span>
                <span class="nav-text">Orders</span>
            </a>
        </li>

        <li>
            <a href="{{ route('menu') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-list"></i>
                </span>
                <span class="nav-text">Menu</span>
            </a>
        </li>

        <li>
            <a href="{{ route('sales-analytics') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>
                <span class="nav-text"> Sales Analytics</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tables') }}">
                <span class="nav-icon">
                    <i class="fa-solid fa-table"></i>
                </span>
                <span class="nav-text">Tables</span>
            </a>
        </li>
    </ul>
    <span class="line"></span>
<!--   === Side Bar Ends ===   -->

	<!--   === Side Bar Footer Ends ===   -->
</aside>
<!--   === Side Bar Ends ===   -->

<!--   === Contents Section Starts ===   -->
<div class="contents">
	<!--   === Panel Bar Starts ===   -->
	<div class="panel-bar">
		<div class="row-1">
			<h1>Chiya Kuna</h1>
		</div>
		<div class="row-2">
			<a href="{{ route('dashboard') }}">Overview</a>
			<a href="{{ route('orders') }}">Orders</a>
			<a href="{{ route('transactions') }}">Transcations</a>
		</div>
	</div>
	<!--   === Panel Bar Ends ===   -->
	<!--   === Description Starts ===   -->
	<div class="description">
		<!--   === Column 1 Starts ===   -->
		<div class="col-1">
		<!--   === Boxes Row Starts ===   -->
		<div class="boxes-row">
			<div class="balance-box">
				<div class="subject-row">
					<div class="text">
						<h3>Total Sales</h3>
						<h1>30,452<sub>(Rs)</sub></h1>
					</div>
					<div class="icon">
						<i class="fa-solid fa-arrow-up"></i>
					</div>
				</div>
				<div class="progress-row">
					<div class="subject">progress</div>
					<div class="progress-bar">
						<div class="progress-line" value="47%" style="max-width: 47%"></div>
					</div>
				</div>
			</div>

			<div class="balance-box">
				<div class="subject-row">
					<div class="text">
						<h3>Total Orders</h3>
						<h1>56</h1>
					</div>
					<div class="icon">
						<i class="fa-solid fa-arrow-down"></i>
					</div>
				</div>
				<div class="progress-row">
					<div class="subject">progress</div>
					<div class="progress-bar">
						<div class="progress-line" value="34%" style="max-width: 34%"></div>
					</div>
				</div>
			</div>
		</div>
		<!--   === Boxes Row Ends ===   -->
		<!--   === Analytics Chart Starts ===   -->
		<div class="chart">
			<div class="chart-header">
				<h2>Transcations Activities</h2>
				<input type="month" class="date" value="2024-12">
			</div>
			<div class="chart-contents">
				<section class="chart-grid">
					<div class="grid-line" value="250"></div>
					<div class="grid-line" value="200"></div>
					<div class="grid-line" value="150"></div>
					<div class="grid-line" value="100"></div>
					<div class="grid-line" value="50"></div>
					<div class="grid-line" value="0"></div>
				</section>
				<section class="chart-value-wrapper">
					<div class="chart-value" style="max-height: 62%"></div>
					<div class="chart-value" style="max-height: 76%"></div>
					<div class="chart-value" style="max-height: 70%"></div>
					<div class="chart-value" style="max-height: 82%"></div>
					<div class="chart-value" style="max-height: 78%"></div>
					<div class="chart-value" style="max-height: 94%"></div>
				</section>
				<section class="chart-labels">
					<div>8am-10am</div>
					<div>10am-12pm</div>
					<div>12pm-2pm</div>
					<div>2pm-4pm</div>
					<div>4pm-6pm</div>
					<div>6pm-8pm</div>
				</section>
			</div>
		</div>
		<div class="chart1">
			<div class="trans-header">
				<h2>Recent Transaction</h2>
			</div>
			<div class="recent-transaction">
				<table>
					<thead>
						<tr>
							<th>Table No.</th>
							<th>Time</th>
							<th>Amount (Rs)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>11</td>
							<td>10:15 AM</td>
							<td>2500</td>
						</tr>
						<tr>
							<td>8</td>
							<td>10:30 AM</td>
							<td>1800</td>
						</tr>
						<tr>
							<td>5</td>
							<td>11:00 AM</td>
							<td>3200</td>
						</tr>
						<tr></tr>
							<td>4</td>
							<td>10:15 AM</td>
							<td>200</td>
						</tr>
						<tr>
							<td>2</td>
							<td>10:30 AM</td>
							<td>1900</td>
						</tr>

						<!-- Add more rows as needed -->
					</tbody>
				</table>
			</div>
		</div>

		<!--   === Analytics Chart Ends ===   -->
		</div>
		<!--   === Column 1 Ends ===   -->
		<!--   === Column 2 Starts ===   -->
		<div class="col-2">
			<!--   === Top Products Starts ===   -->
			<div class="top-products">
				<header class="products-header">
					<h1>Top Selling Items</h1>
				</header>
				<div class="products-wrapper">

					<div class="product">
						<div class="product-img">
							<img src="images/Chiya.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Chiya</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Milk Tea</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/Hukka.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Hukka</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Smoke sweetened & flavored tobacco</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/shikhar-ice-pcs.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Shikar Ice</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>cigarettes</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/MOMO.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Momo</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Chicken Momo</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/blue lagoon.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Blue lagoon</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Blend of lemongrass</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/Lassi.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Plain Lassi</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Typical Lassi</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/Lassi.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Banana Lassi</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>Typical Banana lassi</p>
							</div>
						</div>
					</div>

					<div class="product">
						<div class="product-img">
							<img src="images/shikhar-ice-pcs.jpg">
						</div>
						<div class="product-desc">
							<div class="product-row-1">
								<h2>Surya Churot</h2>
								<i class="fa-solid fa-shopping-cart"></i>
							</div>
							<div class="product-row-2">
								<p>cigarettes</p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<br>



			<div class="col-2">
				<!--   === Top Products Starts ===   -->
				<div class="top-products">
					<header class="products-header">
						<h1>Peak Hour</h1>
					</header>
					<div class="products-wrapper">

						<div class="product">
							<div class="product-desc">
								<div class="product-row-1">
									<h2>6pm-8pm</h2>
									<h2>75 Transactions</h2>

								</div>
							</div>
						</div>

						<div class="product">

							<div class="product-desc">
								<div class="product-row-1">
									<h2>4pm-6pm</h2>
									<h2>56 Transaction</h2>
								</div>
							</div>
						</div>


						<div class="product">

							<div class="product-desc">
								<div class="product-row-1">
									<h2>8am-10am</h2>
									<h2>46 Transaction</h2>
								</div>

							</div>
						</div>

						<div class="product">

							<div class="product-desc">
								<div class="product-row-1">
									<h2>10am-12pm</h2>
									<h2>34 Transcation</h2>
								</div>
							</div>
						</div>

					</div>
				</div>
				</div>
			<!--   === Top Products Ends ===   -->
			<!--   === Total Balance Card Starts ===   -->
			<div class="balance-card">
				<div class="balance-card-top">
					<div class="text">
						<h3>Total Income In This Month</h3>
						<h1>560,452<sub>(Rs)</sub></h1>
					</div>
					<div class="icon">
						<i class="fa-solid fa-arrow-up"></i>
					</div>
				</div>
				<div class="balance-card-middle">
					<div class="subject">Progress</div>
					<div class="progress-bar">
						<div class="progress-line" value="93%" style="max-width: 93%"></div>
					</div>
				</div>

			</div>
			<!--   === Total Balance Card Ends ===   -->
		</div>
		<!--   === Column 2 Ends ===   -->
	</div>
	<!--   === Description Ends ===   -->
</div>
<!--   === Contents Section Ends ===   -->

</div>
<!--   *** Page Wrapper Ends ***   -->



<!--   *** Link To Custom Script File ***   -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>
</html>
