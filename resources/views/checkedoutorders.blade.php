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
    <!-- Top Bar Starts -->
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
    <!-- Top Bar Ends -->

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
    <!-- Contents Section Starts -->
    <div class="contents">
        <!-- Panel Bar Starts -->
        <div class="panel-bar">
            <div class="row-1">
                <h1>Order Management</h1>
            </div>
            <div class="row-2">
                <a href="{{ route('addorders') }}">Add Orders</a>
                <a href="{{ route('all-orders') }}">All Orders</a>
                <a href="{{ route('neworders') }}">New Orders</a>
                <a href="{{ route('checkedoutorders') }}">Checked-out Orders</a>
                <a href="{{ route('cancelledorders') }}">Cancelled Orders</a>
            </div>
        </div>
        <!-- Panel Bar Ends -->

        <!-- All Orders Section Starts -->
        <div class="chart1">
            <div class="trans-header">
                <h2>All Orders</h2>
            </div>
            <div class="recent-transaction">
                <table>
                    <thead>
                        <tr>
                            <th>Table No.</th>
                            <th>Time of Order</th>
                            <th>Total Amount (Rs)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11</td>
                            <td>10:15 AM</td>
                            <td>Rs 2,500</td>
                            <td>
                                <div class="order-dropdown">
                                    <button class="dropdown-btn">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">Checkout</a>
                                        <a href="#">Cancel Order</a>
                                        <a href="#">Change Order</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td>11</td>
                            <td>10:15 AM</td>
                            <td>Rs 2,500</td>
                            <td>
                                <div class="order-dropdown">
                                    <button class="dropdown-btn">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">Checkout</a>
                                        <a href="#">Cancel Order</a>
                                        <a href="#">Change Order</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td>11</td>
                            <td>10:15 AM</td>
                            <td>Rs 2,500</td>
                            <td>
                                <div class="order-dropdown">
                                    <button class="dropdown-btn">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">Checkout</a>
                                        <a href="#">Cancel Order</a>
                                        <a href="#">Change Order</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td>11</td>
                            <td>10:15 AM</td>
                            <td>Rs 2,500</td>
                            <td>
                                <div class="order-dropdown">
                                    <button class="dropdown-btn">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">Checkout</a>
                                        <a href="#">Cancel Order</a>
                                        <a href="#">Change Order</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td>11</td>
                            <td>10:15 AM</td>
                            <td>Rs 2,500</td>
                            <td>
                                <div class="order-dropdown">
                                    <button class="dropdown-btn">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">Checkout</a>
                                        <a href="#">Cancel Order</a>
                                        <a href="#">Change Order</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- All Orders Section Ends -->

    </div>
    <!-- Contents Section Ends -->
</div>
<!-- Page Wrapper Ends -->

<!-- Link to Custom Script File -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>
