<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link to Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <!-- Side Bar Starts -->
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
    <!-- Side Bar Ends -->

   <!-- Contents Section Starts -->
<div class="contents">
    <!-- Panel Bar Starts -->
    <div class="panel-bar">
        <div class="row-1">
            <h1>Menu Management</h1>
        </div>
        <div class="row-2">
            <a href="{{ route('menu') }}">Add Item</a>
            <a href="{{ route('viewmenu') }}">View Menu</a>
        </div>
    </div>
    <!-- Panel Bar Ends -->

        <!-- Panel Bar Ends -->

        <!-- Add  Orders Section Starts -->
        <div class="add-menu-section">
            <h2>Add Menu</h2>
            {{-- @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
            <form id="menuForm" action="{{ route('menu.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <button type="button" class="add-item-btn">+ Add Another Item</button>
                    <div class="add-menu-container">
                        <div class="menu-item">
                            <label for="foodItemName">Food Item Name:</label>
                            <input type="text" name="foodItemName[]" id="foodItemName" placeholder="Enter Item Name" required>

                            <label for="foodCategory">Food Category:</label>
                            <select name="foodCategory[]" id="foodCategory" required>
                                <option value="" disabled selected>Select a Category</option>
                                <option value="tea">Tea</option>
                                <option value="fastfood">Fast Food</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="softdrinks">Soft Drinks</option>
                                <option value="cigarette">Cigarette</option>
                                <option value="harddrink">Hard Drink</option>
                                <option value="momo">Momo/Dumplings</option>
                                <option value="snacks">Snacks (Nepalese Style)</option>
                                <option value="thakali">Thakali Set/Thali</option>
                                <option value="curries">Curries</option>
                                <option value="soup">Soup</option>
                                <option value="newari">Newari Dishes</option>
                                <option value="noodles">Noodles/Chowmein</option>
                                <option value="grill">Grilled Items/BBQ</option>
                                <option value="dessert">Desserts</option>
                                <option value="pastry">Pastries/Baked Goods</option>
                                <option value="specialty">Specialty Drinks (Lassi, Milkshakes)</option>
                                <option value="hotbeverages">Hot Beverages (Coffee, Hot Chocolate)</option>
                                <!-- add other categories here as needed -->
                            </select>

                            <label for="itemPrice">Item Price (Rs):</label>
                            <input type="number" name="itemPrice[]" min="1" placeholder="Enter Price" required>

                            <button type="button" class="remove-item-btn">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-menu-btn">Submit Menu</button>
                </div>
            </form>

        </div>

</div>
<!-- Add this somewhere in your Blade file -->
{{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}



    </div>
    <!-- Contents Section Ends -->
</div>
<!-- Page Wrapper Ends -->

<!-- Link to Custom Script File -->
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script>
    // Script File
// Add Menu Item Functionality
document.addEventListener('DOMContentLoaded', function () {
    const addItemBtn = document.querySelector('.add-item-btn'); // Button to add new menu item
    const menuForm = document.querySelector('#menuForm'); // Menu form element
    const addMenuContainer = document.querySelector('.add-menu-container'); // Container for menu items

    // Function to add a new menu item
    function addMenuItem() {
        const newMenuItem = document.createElement('div');
        newMenuItem.classList.add('menu-item');
        newMenuItem.innerHTML = `
            <label>Food Item Name:</label>
            <input type="text" name="foodItemName[]" placeholder="Enter Item Name" required>

            <label>Food Category:</label>
          <select name="foodCategory[]" required>
    <option value="" disabled selected>Select a Category</option>
    <option value="tea">Tea</option>
    <option value="fastfood">Fast Food</option>
    <option value="breakfast">Breakfast</option>
    <option value="softdrinks">Soft Drinks</option>
    <option value="cigarette">Cigarette</option>
    <option value="harddrink">Hard Drink</option>
    <option value="momo">Momo/Dumplings</option>
    <option value="snacks">Snacks (Nepalese Style)</option>
    <option value="thakali">Thakali Set/Thali</option>
    <option value="curries">Curries</option>
    <option value="soup">Soup</option>
    <option value="newari">Newari Dishes</option>
    <option value="noodles">Noodles/Chowmein</option>
    <option value="grill">Grilled Items/BBQ</option>
    <option value="dessert">Desserts</option>
    <option value="pastry">Pastries/Baked Goods</option>
    <option value="specialty">Specialty Drinks (Lassi, Milkshakes)</option>
    <option value="hotbeverages">Hot Beverages (Coffee, Hot Chocolate)</option>
</select>


            <label>Item Price (Rs):</label>
            <input type="number" name="itemPrice[]" min="1" placeholder="Enter Price" required>

            <button type="button" class="remove-item-btn">Remove</button>
        `;
        addMenuContainer.appendChild(newMenuItem);

        newMenuItem.querySelector('.remove-item-btn').addEventListener('click', function () {
            newMenuItem.remove();
        });
    }

    addItemBtn.addEventListener('click', function () {
        addMenuItem();
    });

    // Optional: Form submission handling
    menuForm.addEventListener('submit', function (event) {
        // event.preventDefault(); // Prevent form submission (if needed)
     //
        alert('Menu submitted successfully!');
    });
});

    </script>
</body>
</html>
