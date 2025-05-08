document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function () {
            const section = this.closest('section');
            const id = section.dataset.id;
            const unitPrice = parseFloat(section.dataset.unitPrice);
            let quantity = parseInt(section.querySelector('input').value);



            // Update input field value
            section.querySelector('input').value = quantity;

            // Send AJAX to update session (cart)
            fetch('/update-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ id, quantity })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const totalPrice = section.querySelector('.total-price');
                        totalPrice.textContent = (unitPrice * quantity).toFixed(2).replace('.', ',') + ' €';
                    } else {
                        console.error('Failed to update session');
                    }
                })
                .catch(error => console.error('Session update error:', error));
        });
    });
});
