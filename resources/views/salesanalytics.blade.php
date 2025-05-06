<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Link to Custom Stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <!-- Font Awesome Icons Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>
<body>
<!-- Page Wrapper Starts -->
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
			<img src="images/logo.png">
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


    <!-- Contents Section Starts -->
    <div class="contents">
        <!-- Panel Bar Starts -->
        <div class="panel-bar">
            <div class="row-1">
                <h1>Sales Insight</h1>
            </div>
            <div class="row-2">
                <a href="salesInsight.html" class="active">Sales Insight</a>
            </div>
        </div>
        <!-- Panel Bar Ends -->

        <!-- Sales Chart and Data Section Starts -->
       <!-- Sales Chart and Data Section Starts -->
<div class="sales-insight-section">
    <div class="table-container">
        <h2>Category Overview</h2>
        <table>
            <thead>
                <tr>
                    <th>Food Category</th>
                    <th>Total Orders</th>
                    <th>Revenue (Rs)</th>
                    <th>Percentage (%)</th>
                </tr>
            </thead>
            <tbody id="salesDataBody">
                <!-- Sales Data will be populated here by the JS -->
            </tbody>
        </table>
    </div>
    <div class="chart-container">
        <canvas id="salesChart"></canvas>
    </div>
</div>
<!-- Sales Chart and Data Section Ends -->

        <!-- Sales Chart and Data Section Ends -->
    </div>
    <!-- Contents Section Ends -->
</div>
<!-- Page Wrapper Ends -->

<!-- External JavaScript for Sales Insight -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('js/salesinslight.js') }}"></script> -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Sample data for categories
    const salesData = [
        { category: 'Tea', totalOrders: 120, revenue: 6000 },
        { category: 'Coffee', totalOrders: 80, revenue: 4000 },
        { category: 'Soft Drinks', totalOrders: 150, revenue: 4500 },
        { category: 'Momos', totalOrders: 60, revenue: 3000 },
        { category: 'Sizzler', totalOrders: 30, revenue: 9000 },
        { category: 'Combo', totalOrders: 90, revenue: 4500 },
        { category: 'Cigarettes', totalOrders: 40, revenue: 2000 },
        { category: 'Lassi', totalOrders: 70, revenue: 3500 },
        { category: 'Khaja Set', totalOrders: 50, revenue: 2500 },
        { category: 'Breakfast', totalOrders: 20, revenue: 2000 }
    ];

    // Data for pie chart
    const labels = salesData.map(data => data.category);
    const totalOrders = salesData.map(data => data.totalOrders);
    const revenue = salesData.map(data => data.revenue);
    const backgroundColors = [
        'green', // Tea
        'brown', // Coffee
        'blue', // Soft Drinks
        'orange', // Momos
        'purple', // Sizzler
        'red', // Combo
        'grey', // Cigarettes
        'yellow', // Lassi
        'pink', // Khaja Set
        'lightblue' // Breakfast
    ];

    // Create the pie chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: totalOrders,
                backgroundColor: backgroundColors,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const dataIndex = tooltipItem.dataIndex;
                            const percentage = ((totalOrders[dataIndex] / totalOrders.reduce((a, b) => a + b)) * 100).toFixed(2);
                            return `${tooltipItem.label}: ${percentage}% (${totalOrders[dataIndex]} orders)`;
                        }
                    }
                }
            }
        }
    });

    // Populate the table with sales data
    const salesDataBody = document.getElementById('salesDataBody');
    salesData.forEach(data => {
        const percentage = ((data.totalOrders / totalOrders.reduce((a, b) => a + b)) * 100).toFixed(2);
        const row = `
            <tr>
                <td>${data.category}</td>
                <td>${data.totalOrders}</td>
                <td>${data.revenue}</td>
                <td>${percentage}</td>
            </tr>
        `;
        salesDataBody.innerHTML += row;
    });
});

    </script>
</body>
</html>
