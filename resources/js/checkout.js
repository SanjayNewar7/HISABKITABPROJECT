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
