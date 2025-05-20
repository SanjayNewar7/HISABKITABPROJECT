document.addEventListener('DOMContentLoaded', () => {
    const addItemBtn = document.querySelector('.add-item-btn');
    const orderItemsContainer = document.querySelector('.order-items-container');

    
    function attachEvents(orderItem) {
        const foodSelect = orderItem.querySelector('.food-select');
        const quantityInput = orderItem.querySelector('.quantity-input');
        const totalAmountInput = orderItem.querySelector('.total-amount');

        function calculateTotal() {
            const selectedOption = foodSelect.options[foodSelect.selectedIndex];
            const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const quantity = parseInt(quantityInput.value) || 1;
             const total = price * quantity;
            totalAmountInput.value = total.toFixed(2);
        }

        foodSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);

        
        const removeBtn = orderItem.querySelector('.remove-item-btn');
        removeBtn.addEventListener('click', () => {
            orderItem.remove();
        });
    }

    
    document.querySelectorAll('.order-item').forEach(attachEvents);

   
  addItemBtn.addEventListener('click', () => {
    const originalSelect = document.querySelector('.food-select');
    const options = Array.from(originalSelect.options)
        .filter(opt => !opt.selected || !opt.disabled) // exclude the placeholder
        .map(opt => `<option value="${opt.value}" data-price="${opt.getAttribute('data-price')}">${opt.text}</option>`)
        .join('');

    const newItem = document.createElement('div');
    newItem.classList.add('order-item');

    newItem.innerHTML = `
        <label>Food Item Name:</label>
        <select name="foodItem[]" class="food-select" required>
            <option value="" disabled selected>Select a food item</option>
            ${options}
        </select>

        <label>Quantity:</label>
        <input type="number" name="quantity[]" class="quantity-input" min="1">

        <label>Total Amount (Rs):</label>
        <input type="number"  class="total-amount" readonly required>

        <button type="button" class="remove-item-btn">Remove</button>
    `;

    orderItemsContainer.appendChild(newItem);
    attachEvents(newItem);
});

});
