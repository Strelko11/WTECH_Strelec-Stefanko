document.addEventListener('DOMContentLoaded', () => {
    // Update quantities and total price on button clicks
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const section = this.closest('section');
            const id = section.dataset.id;
            const unitPrice = parseFloat(section.dataset.unitPrice);
            let quantity = parseInt(section.querySelector('input').value);

            // Update quantity based on button type
            if (this.id.startsWith('increase')) {
                quantity++;
            } else if (this.id.startsWith('decrease') && quantity > 1) {
                quantity--;
            }

            // Update the quantity in the input field
            section.querySelector('input').value = quantity;

            // Update the total price for this product
            const totalPrice = section.querySelector('.total-price');
            totalPrice.textContent = (unitPrice * quantity).toFixed(2).replace('.', ',') + ' €';

            // Update the grand total dynamically before sending to the session
            updateGrandTotal();

            // Update the session via AJAX (Cart session)
            updateCartSession(id, quantity, unitPrice * quantity);
        });
    });

    // Function to send AJAX request to update cart session
    function updateCartSession(id, quantity, totalPrice) {
        fetch('/update-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ id, quantity, totalPrice })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cart session updated successfully');
            } else {
                console.error('Failed to update session');
            }
        })
        .catch(error => console.error('Session update error:', error));
    }

    // Function to calculate and update the grand total
    function updateGrandTotal() {
        let grandTotal = 0;

        // Iterate through each section and add the product total to the grand total
        document.querySelectorAll('section[data-id]').forEach(section => {
            const quantity = parseInt(section.querySelector('input').value);
            const unitPrice = parseFloat(section.dataset.unitPrice);
            grandTotal += quantity * unitPrice;
        });

        // Update the grand total in the UI dynamically
        document.getElementById('grand-total').textContent = grandTotal.toFixed(2).replace('.', ',') + ' €';
    }

    // Initialize the grand total (load the correct values on page load)
    updateGrandTotalFromSession();

    // Function to get and set the initial grand total from the session
    function updateGrandTotalFromSession() {
        fetch('/get-grand-total')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateGrandTotal();  // Call this function to calculate the grand total
                } else {
                    console.error('Failed to load grand total');
                }
            })
            .catch(error => console.error('Error fetching grand total:', error));
    }
});
