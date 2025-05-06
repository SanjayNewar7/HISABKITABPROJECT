<!DOCTYPE html>
<html lang="en">
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
    <div class="panel-bar">
        <h2>Checkout</h2>

        <div class="checkout-section">
            <h3>Table Number: <span id="tableNumber">12</span></h3>
            <h3>Bill Number: <span id="billNumber">12345</span></h3>

            <table class="checkout-table">
                <thead>
                    <tr>
                        <th>Ordered Item</th>
                        <th>Quantity</th>
                        <th>Amount (Rs)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pizza</td>
                        <td>2</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>Chicken Burger</td>
                        <td>1</td>
                        <td>250</td>
                    </tr>
                    <tr>
                        <td>Coffee</td>
                        <td>3</td>
                        <td>460</td>
                    </tr>
                </tbody>
            </table>

            <div class="promo-section">
                <label>Promo Code:</label>
                <input type="text" id="promoCode" placeholder="Enter promo code">
                <button id="applyPromo" class="apply-btn">Apply</button>
            </div>

            <div class="total-section">
                <label>Total Amount: </label>
                <span id="totalAmount">$45</span> <!-- This will be updated dynamically -->
                <br>
                <label>Discounted After Amount: </label>
                <span id="discountedAmount"></span> <!-- This will be updated dynamically -->
            </div>

            <div class="popup">
                <div class="popup-content">
                    <i class="fa-solid fa-check-circle" style="color: green; font-size: 50px;"></i>
                    <h3>Checkout Completed</h3>
                    <button>Close</button>
                </div>
            </div>


            <div class="payment-section">
                <label>Select Payment Method:</label><br>
                <input type="radio" name="paymentMethod" value="Cash" checked> Cash
                <input type="radio" name="paymentMethod" value="Online"> Online
            </div>

            <div class="checkout-buttons">
                <a href="orders.html" id="cancelCheckout" class="cancel-btn">Cancel</a>
                <button id="submitCheckout" class="submit-btn">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
</body>
</html>
