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
                <img src="images/profile.jpg" alt="Profile">
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
    </aside>
    <!-- Contents Section Starts -->
    <div class="contents">
        <!-- Panel Bar Starts -->
        <div class="panel-bar">
            <div class="row-1">
                <h1>Table Management</h1>
            </div>
            <div class="row-2">
                <a href="{{ route('tables') }}">Add Table</a>
                <a href="{{ route('viewtable') }}">View table</a>
            </div>
        </div>
        <!-- Panel Bar Ends -->

        <div class="add-order-section">
            <h2>Add Tables</h2>

            <form id="menuForm" action="{{ route('table.store') }}" method="POST">
                @csrf <!-- CSRF token for security -->
                <button type="button" class="add-table-btn">Add Another Table</button>
                <div class="order-items-container">
                    <div class="order-item">
                        <label for="tableNumber">Table Number:</label>
                        <input type="number" name="tableNumber" required> <!-- Updated name -->

                        <label for="tablecapacity">Table Capacity:</label>
                        <input type="number" name="tablecapacity" required>

                        <label for="tablestatus">Table Status:</label>
                        <select name="tableStatus" required>
                            <option value="" disabled selected>Select a status</option>
                            <option value="Available">Available</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Reserved">Reserved</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-order-btn">Proceed</button>
                </div>

                @if($errors->any())
                    <div class="alert" style="background-color: red; color: white; border: 1px solid darkred;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>



        </div>

        <!-- Link to Custom Script File -->
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        <script>
            let tableCounter = 1; // Counter for generating temporary table IDs

            // Event listener for adding a new table
            document.querySelector('.add-table-btn').addEventListener('click', function () {
                const container = document.querySelector('.order-items-container');
                const newItem = document.createElement('div');
                newItem.classList.add('order-item');
                newItem.innerHTML = `
                    <label>Table ID: ${tableCounter}</label> <!-- Display temporary Table ID -->
                    <input type="hidden" name="tableId[]" value="temp-${tableCounter}">
                    <label>Table Number:</label>
                    <input type="number" name="tableNumber[]" required>
                    <select name="tableStatus[]" required>
                        <option value="" disabled selected>Select a status</option>
                        <option value="Available">Available</option>
                        <option value="Occupied">Occupied</option>
                        <option value="Reserved">Reserved</option>
                    </select>
                    <button type="button" class="remove-item-btn">Remove</button>
                `;
                container.appendChild(newItem);

                // Increment table counter for each new table
                tableCounter++;

                // Add event listener for the new remove button
                newItem.querySelector('.remove-item-btn').addEventListener('click', function () {
                    container.removeChild(newItem);
                });
            });

            // Handle form submission with AJAX
            // document.getElementById('menuForm').addEventListener('submit', function (e) {
            //    // e.preventDefault(); // Prevent default form submission

            //     const formData = new FormData(this);

            //     fetch("{{ route('table.store') }}", { // Update to correct route here
            //         method: "POST",
            //         headers: {
            //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //         },
            //         body: formData
            //     })
            //     .then(response => response.json())
            //     .then(data => {
            //         if (data.success) {
            //             alert(data.success); // Success message
            //         } else {
            //             console.log("Error:", data); // Log if response is not success
            //             alert('Failed to save tables. Please check your data.');
            //         }
            //     })
            //     .catch(error => console.error('Error:', error)); // Log any fetch error
            // });
        </script>

    </div>
</div>
</body>
</html>
