<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>

<div class="page-wrapper">

<!-- Top Bar -->
@include('partials.topbar') <!-- (Keep your topbar same as you already have) -->

<!-- Sidebar -->
@include('partials.sidebar') <!-- (Keep your sidebar same as you already have) -->

<!-- Contents -->
<div class="contents">
    <div class="panel-bar">
        <div class="row-1">
            <h1>Orders Management</h1>
        </div>
        <div class="row-2">
            <a href="{{ route('tables') }}">Add Table</a>
            <a href="{{ route('viewtable') }}">View Table</a>
        </div>
    </div>

    <!-- Table Layout Grid -->
    <div class="table-layout" id="tableContainer">
        <!-- Boxes will be injected dynamically -->
    </div>

    <!-- Popup Modal -->
    <div id="popupModal" class="popup-modal hidden">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <div id="popupOptions">
                <button id="takeOrderBtn">Take Order</button>
                <button id="changeOrderBtn">Change Order</button>
                <button id="checkoutBtn">Check Out</button>
            </div>

            <!-- Take Order Form -->
            <div id="takeOrderForm" class="hidden">
                <h3>Take Order</h3>
                <form id="orderForm">
                    <div id="orderItems">
                        <div class="order-item">
                            <select name="menuItem[]" required>
                                @foreach($menuItems as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }} - Rs.{{ $item->price }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="quantity[]" min="1" value="1" required>
                            <span class="price"></span>
                        </div>
                    </div>
                    <button type="button" id="addMoreItem">+ Add More</button>
                    <br><br>
                    <div>Total: Rs.<span id="totalPrice">0</span></div>
                    <button type="submit">Submit Order</button>
                </form>
            </div>

            <!-- Change Order Form -->
            <div id="changeOrderForm" class="hidden">
                <h3>Change Existing Order</h3>
                <!-- We'll load the existing order here dynamically -->
                <div id="existingOrderItems">
                    <!-- Existing order items will be populated -->
                </div>
                <button type="submit" id="updateOrderBtn">Update Order</button>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Scripts -->
<script>
    let tableData = @json($tableData);
    let menuItems = @json($menuItems);

    const container = document.getElementById('tableContainer');
    const popupModal = document.getElementById('popupModal');
    const popupOptions = document.getElementById('popupOptions');
    const takeOrderForm = document.getElementById('takeOrderForm');
    const changeOrderForm = document.getElementById('changeOrderForm');
    const orderForm = document.getElementById('orderForm');
    const totalPriceElement = document.getElementById('totalPrice');
    let selectedTable = null;

    function renderTables() {
        container.innerHTML = '';
        tableData.forEach(table => {
            const div = document.createElement('div');
            div.className = `table-box ${table.table_status.toLowerCase()}`;
            div.innerText = `Table ${table.table_number}`;
            div.dataset.tableNumber = table.table_number;
            div.addEventListener('click', () => openPopup(table.table_number));
            container.appendChild(div);
        });
    }

    function openPopup(tableNumber) {
        selectedTable = tableNumber;
        popupModal.classList.remove('hidden');
        popupOptions.classList.remove('hidden');
        takeOrderForm.classList.add('hidden');
        changeOrderForm.classList.add('hidden');
    }

    document.querySelector('.close-btn').addEventListener('click', () => {
        popupModal.classList.add('hidden');
    });

    document.getElementById('takeOrderBtn').addEventListener('click', () => {
        popupOptions.classList.add('hidden');
        takeOrderForm.classList.remove('hidden');
        calculateTotal();
    });

    document.getElementById('changeOrderBtn').addEventListener('click', () => {
        popupOptions.classList.add('hidden');
        changeOrderForm.classList.remove('hidden');
        loadExistingOrder(selectedTable);
    });

    document.getElementById('checkoutBtn').addEventListener('click', () => {
        window.location.href = "{{ route('checkoutorders') }}?table=" + selectedTable;
    });

    document.getElementById('addMoreItem').addEventListener('click', () => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'order-item';
        itemDiv.innerHTML = `
            <select name="menuItem[]" required>
                ${menuItems.map(item => `<option value="${item.id}" data-price="${item.price}">${item.name} - Rs.${item.price}</option>`).join('')}
            </select>
            <input type="number" name="quantity[]" min="1" value="1" required>
            <span class="price"></span>
        `;
        document.getElementById('orderItems').appendChild(itemDiv);
        updatePriceListeners();
    });

    function updatePriceListeners() {
        document.querySelectorAll('select, input[type=number]').forEach(input => {
            input.addEventListener('change', calculateTotal);
        });
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.order-item').forEach(item => {
            const select = item.querySelector('select');
            const quantity = item.querySelector('input').value;
            const price = select.options[select.selectedIndex].dataset.price;
            item.querySelector('.price').innerText = `Rs.${price * quantity}`;
            total += price * quantity;
        });
        totalPriceElement.innerText = total;
    }

    function loadExistingOrder(tableNumber) {
        // Load orders dynamically (fake for now)
        document.getElementById('existingOrderItems').innerHTML = `
            <div>Pizza - Quantity: 2</div>
            <div>Momo - Quantity: 1</div>
            <!-- Example - In real case load from DB -->
        `;
    }

    orderForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Order submitted for Table ' + selectedTable);
        popupModal.classList.add('hidden');
    });

    renderTables();
    updatePriceListeners();
</script>

<style>
    /* Simple popup modal styling */
    .hidden { display: none; }
    .popup-modal {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5); display: flex;
        justify-content: center; align-items: center;
    }
    .popup-content {
        background: white; padding: 20px; border-radius: 8px; width: 400px;
        position: relative;
    }
    .close-btn {
        position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 20px;
    }
    .order-item { margin-bottom: 10px; }
</style>

</body>
</html>
