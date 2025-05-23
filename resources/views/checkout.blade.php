<!DOCTYPE html>
<html lang="en">
    <head>
        <!--   ***** Link To Custom Stylesheet *****   -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <!-- *******  Font Awesome Icons Link  ******* -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add CSRF token for AJAX -->
        <title>Checkout</title>
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
            </aside>
            <!--   === Side Bar Ends ===   -->

            <!--   === Contents Section Starts ===   -->
            <div class="contents">
                <div class="panel-bar">
                    <h2>Checkout</h2>

                    <div class="checkout-section">
                        <h3>Table Number: <span id="tableNumber">{{ $tableNumber }}</span></h3>

                        <table class="checkout-table">
                            <thead>
                                <tr>
                                    <th>Ordered Item</th>
                                    <th>Quantity</th>
                                    <th>Amount (Rs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="total-section">
                            <label>Total Amount: </label>
                            <span id="totalAmount">Rs {{ $totalAmount }}</span>
                            <br>
                            <label>Discounted After Amount: </label>
                            <span id="discountedAmount"></span>
                        </div>

                        <div class="popup" style="display:none;">
                            <div class="popup-content">
                                <i class="fa-solid fa-check-circle" style="color: green; font-size: 50px;"></i>
                                <h3>Checkout Successful</h3>
                                <button id="okButton" style="background-color: green; color: white; border: none; padding: 10px 20px; cursor: pointer;">OK</button>
                            </div>
                        </div>

                        <div class="payment-section">
                            <label>Select Payment Method:</label><br>
                            <input type="radio" name="paymentMethod" value="Cash" checked> Cash
                            <input type="radio" name="paymentMethod" value="Online"> Online
                        </div>

                        <div class="checkout-buttons">
                            <a href="{{ route('addorders') }}" id="cancelCheckout" class="cancel-btn">Cancel</a>
                            <button id="submitCheckout" class="submit-btn" data-table-id="{{ $table_id }}">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const submitCheckoutBtn = document.getElementById('submitCheckout');
    const popup = document.querySelector('.popup');
    const okButton = document.getElementById('okButton');
    let timeoutId;

    submitCheckoutBtn.addEventListener('click', function () {
        // Show popup
        popup.style.display = 'block';

        // Set 3-second timeout
        timeoutId = setTimeout(() => {
            if (popup.style.display === 'block') {
                submitCheckoutForm();
            }
        }, 3000);
    });

    okButton.addEventListener('click', function () {
        // Clear timeout and submit form immediately
        clearTimeout(timeoutId);
        submitCheckoutForm();
    });

    function submitCheckoutForm() {
        const tableId = submitCheckoutBtn.getAttribute('data-table-id');
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
        const totalAmount = document.getElementById('totalAmount').textContent.replace('Rs ', '');

        fetch('/checkout/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                table_id: tableId,
                payment_method: paymentMethod,
                total_amount: totalAmount
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                popup.style.display = 'none';
                window.location.href = '{{ route('addorders') }}';
            } else {
                alert('Error during checkout');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error during checkout');
        });
    }
});

        </script>
    </body>
</html>
