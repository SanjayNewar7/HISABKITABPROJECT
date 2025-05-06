// Script File
var hamburgerBtn = document.querySelector('.hamburger-btn');
var sideBar = document.querySelector('.side-bar');

// Toggle the sidebar on hamburger button click
hamburgerBtn.addEventListener('click', sidebarToggle);
function sidebarToggle() {
    sideBar.classList.toggle('active');
}

// Code For Light/Dark Mode Toggle
var modeSwitcher = document.querySelector('.mode-switch i');
var body = document.querySelector('body');

// Check for saved theme on page load
window.addEventListener('load', function () {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        body.classList.add(savedTheme === 'dark' ? 'active' : ''); // 'active' class for dark mode
    }
});

// Toggle the dark mode on mode switch icon click
modeSwitcher.addEventListener('click', modeSwitch);
function modeSwitch() {
    body.classList.toggle('active');
    // Save the current theme in localStorage
    const currentTheme = body.classList.contains('active') ? 'dark' : 'light';
    localStorage.setItem('theme', currentTheme);
}

// Select all anchor tags within row-2
const navLinks = document.querySelectorAll('.contents .panel-bar .row-2 a');

// Loop through each link
navLinks.forEach(link => {
    link.addEventListener('click', function () {
        // Remove the 'active' class from all links
        navLinks.forEach(item => item.classList.remove('active'));
        // Add the 'active' class to the clicked link
        this.classList.add('active');
        // Update localStorage with the active link's relative path
        localStorage.setItem('activeRowLink', this.getAttribute('href')); // Store link's relative href
    });
});

// On page load, set the active link from localStorage
window.addEventListener('load', function () {
    let activeRowLink = localStorage.getItem('activeRowLink');
    if (activeRowLink !== null) {
        navLinks.forEach(item => item.classList.remove('active'));
        // Find the link with the stored relative href and set it active
        const activeLink = Array.from(navLinks).find(link => link.getAttribute('href') === activeRowLink);
        if (activeLink) activeLink.classList.add('active');
    }
});

// Select all sidebar links
const sidebarLinks = document.querySelectorAll('.side-bar ul.navbar-links li');

// Loop through each link and add click event listener
sidebarLinks.forEach(link => {
    link.addEventListener('click', function () {
        // Remove 'active' class from all links
        sidebarLinks.forEach(item => item.classList.remove('active'));
        // Add 'active' class to the clicked link
        this.classList.add('active');
        // Update localStorage with the sidebar link's relative path
        localStorage.setItem('activeSidebarLink', this.querySelector('a').getAttribute('href')); // Store link's relative href
    });
});

// On page load, set the active sidebar link from localStorage
window.addEventListener('load', function () {
    let activeSidebarLink = localStorage.getItem('activeSidebarLink');
    if (activeSidebarLink !== null) {
        sidebarLinks.forEach(item => item.classList.remove('active'));
        // Find the link with the stored relative href and set it active
        const activeSidebar = Array.from(sidebarLinks).find(link => link.querySelector('a').getAttribute('href') === activeSidebarLink);
        if (activeSidebar) activeSidebar.classList.add('active');
    }
});

// Add Item Functionality
document.querySelector('.add-item-btn').addEventListener('click', function () {
    const container = document.querySelector('.order-items-container');
    const newItem = document.createElement('div');
    newItem.classList.add('order-item');
    newItem.innerHTML = `
        <label>Food Item Name:</label>
        <select name="foodItem[]" required>
            <option value="" disabled selected>Select a food item</option>
            <option value="chiya">Chiya</option>
            <option value="hukka">Hukka</option>
            <option value="momo">Momo</option>
        </select>
        <label>Quantity:</label>
        <input type="number" name="quantity[]" min="1" required>
        <label>Total Amount (Rs):</label>
        <input type="number" name="totalAmount[]" required>
        <button type="button" class="remove-item-btn">Remove</button>
    `;
    container.appendChild(newItem);

    newItem.querySelector('.remove-item-btn').addEventListener('click', function () {
        container.removeChild(newItem);
    });
});

// Category Filter Functionality
document.addEventListener('DOMContentLoaded', function () {
    const categories = ["Tea", "Coffee", "Momo", "Breakfast", "Sizzler", "Combo", "Cigarettes", "Soft Drinks", "Lassi", "Khaja Set"];
    const categoryInput = document.getElementById('foodCategoryInput');
    const categoryDropdown = document.getElementById('categoryDropdown');

    // Filter categories based on input
    categoryInput.addEventListener('input', function () {
        const searchText = categoryInput.value.toLowerCase();
        categoryDropdown.innerHTML = '';  // Clear previous suggestions

        // Filter categories that match the input
        const filteredCategories = categories.filter(category =>
            category.toLowerCase().startsWith(searchText)
        );

        // Display matching categories in the dropdown
        filteredCategories.forEach(category => {
            const li = document.createElement('li');
            li.textContent = category;
            categoryDropdown.appendChild(li);

            // Handle click event to select a category
            li.addEventListener('click', function () {
                categoryInput.value = category;
                categoryDropdown.innerHTML = '';  // Hide suggestions after selection
            });
        });
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function (e) {
        if (!categoryInput.contains(e.target)) {
            categoryDropdown.innerHTML = '';  // Close the dropdown
        }
    });
});

// Add Menu Item Functionality
// document.addEventListener('DOMContentLoaded', function () {
//     const addItemBtn = document.querySelector('.add-item-btn'); // Button to add new menu item
//     const menuForm = document.querySelector('#menuForm'); // Menu form element
//     const addMenuContainer = document.querySelector('.add-menu-container'); // Container for menu items

//     // Function to add a new menu item
//     function addMenuItem() {
//         const newMenuItem = document.createElement('div');
//         newMenuItem.classList.add('menu-item');
//         newMenuItem.innerHTML = `
//             <label>Food Item Name:</label>
//             <input type="text" name="foodItemName[]" placeholder="Enter Item Name" required>

//             <label>Food Category:</label>
//           <select name="foodCategory[]" required>
//     <option value="" disabled selected>Select a Category</option>
//     <option value="tea">Tea</option>
//     <option value="fastfood">Fast Food</option>
//     <option value="breakfast">Breakfast</option>
//     <option value="softdrinks">Soft Drinks</option>
//     <option value="cigarette">Cigarette</option>
//     <option value="harddrink">Hard Drink</option>
//     <option value="momo">Momo/Dumplings</option>
//     <option value="snacks">Snacks (Nepalese Style)</option>
//     <option value="thakali">Thakali Set/Thali</option>
//     <option value="curries">Curries</option>
//     <option value="soup">Soup</option>
//     <option value="newari">Newari Dishes</option>
//     <option value="noodles">Noodles/Chowmein</option>
//     <option value="grill">Grilled Items/BBQ</option>
//     <option value="dessert">Desserts</option>
//     <option value="pastry">Pastries/Baked Goods</option>
//     <option value="specialty">Specialty Drinks (Lassi, Milkshakes)</option>
//     <option value="hotbeverages">Hot Beverages (Coffee, Hot Chocolate)</option>
// </select>


//             <label>Item Price (Rs):</label>
//             <input type="number" name="itemPrice[]" min="1" placeholder="Enter Price" required>

//             <button type="button" class="remove-item-btn">Remove</button>
//         `;
//         addMenuContainer.appendChild(newMenuItem);

//         newMenuItem.querySelector('.remove-item-btn').addEventListener('click', function () {
//             newMenuItem.remove();
//         });
//     }

//     addItemBtn.addEventListener('click', function () {
//         addMenuItem();
//     });

//     // Optional: Form submission handling
//     menuForm.addEventListener('submit', function (event) {
//         event.preventDefault(); // Prevent form submission (if needed)
//         // alert('Menu submitted successfully!');
//     });
// });

// Sales Data Visualization
document.addEventListener('DOMContentLoaded', () => {
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

    const labels = salesData.map(data => data.category);
    const totalOrders = salesData.map(data => data.totalOrders);
    const backgroundColors = [
        'green', 'brown', 'blue', 'orange', 'purple', 'red', 'grey', 'yellow', 'pink', 'lightblue'
    ];

    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Total Orders',
            data: totalOrders,
            backgroundColor: backgroundColors,
        }]
    };

    const config = {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Sales Data Overview'
                }
            }
        }
    };

    const salesChart = new Chart(
        document.getElementById('salesChart'),
        config
    );
});


/*tables */
document.querySelector('.add-table-btn').addEventListener('click', function () {
    const container = document.querySelector('.order-items-container');
    const newItem = document.createElement('div');
    newItem.classList.add('order-item');
    newItem.innerHTML = `
        <label>Table Number:</label>
        <input type="number" name="tableNumber[]" required>
        <label>Capacity:</label>
        <input type="number" name="capacity[]" required>
        <label>Table Status:</label>
        <select name="tableStatus[]" required>
            <option value="" disabled selected>Select a status</option>
            <option value="Available">Available</option>
            <option value="Occupied">Occupied</option>
            <option value="Reserved">Reserved</option>
        </select>
        <button type="button" class="remove-item-btn">Remove</button>
    `;
    container.appendChild(newItem);

    // Add event listener for the new remove button
    newItem.querySelector('.remove-item-btn').addEventListener('click', function () {
        container.removeChild(newItem);
    });
});

// Handle form submission
document.getElementById('orderForm').addEventListener('submit', function (e) {
    e.preventDefault();
    // Add your form submission logic here
    console.log("Form submitted!");

    // Here you can gather data and perform further actions
    const formData = new FormData(this);
    // Example: convert FormData to an object
    const data = Object.fromEntries(formData.entries());
    console.log(data);
});



/*checkout*/

/*checkout ends*/

