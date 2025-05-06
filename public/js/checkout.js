// Grab the necessary elements
const popup = document.querySelector('.popup');
const popupCloseBtn = document.querySelector('.popup-content button');
const totalAmountElement = document.querySelector('#totalAmount');
const discountedAmountElement = document.querySelector('#discountedAmount'); // Assuming this element exists
const promoCodeInput = document.querySelector('#promoCode');
const applyPromoButton = document.querySelector('#applyPromo');
let ordersUrl = "http://127.0.0.1:8000/orders";

// Define promo codes and their corresponding discount rates
const promoCodes = {
    OCEM: 0.10,
    NEWAR: 0.15,
    GURUNG: 0.15,
    RAJAN: 0.15,
    HISABOFF: 0.12,
    KITABOFF: 0.12
};

// Function to calculate total amount
function calculateTotal() {
    let total = 0;
    const rows = document.querySelectorAll('.checkout-table tbody tr');

    rows.forEach(row => {
        const amountText = row.cells[2].textContent.trim(); // Assuming amount is in the third cell
        const amount = parseFloat(amountText.replace('Rs', '').trim());
        total += amount;
    });

    totalAmountElement.textContent = `Rs ${total.toFixed(2)}`;
    return total;
}

// Function to show the popup
function showPopup() {
    popup.classList.add('show');
    setTimeout(() => {
        popup.classList.remove('show');
        window.location.href = ordersUrl; // Redirect after 3 seconds
    }, 3000); // Show for 3 seconds
}

// Function to apply the promo code
applyPromoButton.addEventListener('click', function () {
    const promoCode = promoCodeInput.value.trim();
    const totalAmount = calculateTotal(); // Calculate total before applying discount
    let discount = 0;

    if (promoCodes[promoCode]) {
        discount = totalAmount * promoCodes[promoCode];
        const discountedAmount = totalAmount - discount;

        discountedAmountElement.textContent = ` ${discountedAmount.toFixed(2)}`;
    } else {
        alert('Invalid promo code');
        discountedAmountElement.textContent = ''; // Clear the discounted amount if invalid
    }
});

// Event listener for closing popup manually
popupCloseBtn.addEventListener('click', () => {
    popup.classList.remove('show');
    window.location.href = ordersUrl; // Redirect on close button
});

// Checkout Form Handling
const submitCheckout = document.querySelector('#submitCheckout');

// When submit button is clicked
submitCheckout.addEventListener('click', function () {
    showPopup(); // Show the popup when checkout is successful
});

// Initialize total amount on page load
calculateTotal(); // Calculate and display total amount when the page loads



document.querySelector('.checkout-table tbody').addEventListener('click', function (e) {
    if (e.target.classList.contains('edit-btn')) {
        const row = e.target.closest('tr');
        const itemNameCell = row.cells[0];
        const quantityCell = row.querySelector('.quantity');
        const amountCell = row.querySelector('.amount');

        // Show edit form
        showEditForm(itemNameCell, quantityCell, amountCell);
    }
});
