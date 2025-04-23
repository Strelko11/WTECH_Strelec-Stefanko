document.addEventListener('DOMContentLoaded', () => {
    const formatPrice = (value) => {
        return value.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    };

    document.querySelectorAll('section').forEach(section => {
        const increaseBtn = section.querySelector('button[id^="increase-"]');
        const decreaseBtn = section.querySelector('button[id^="decrease-"]');
        const quantityInput = section.querySelector('input[name^="quantity"]');
        const priceDisplay = section.querySelector('.bg-gradient-to-r');

        if (!increaseBtn || !decreaseBtn || !quantityInput || !priceDisplay) return;

        const itemId = increaseBtn.id.split('-')[1];

        // Grab the original price from Blade via data attribute (you'll need to add it in the Blade file)
        const unitPrice = parseFloat(section.dataset.unitPrice);

        const updatePrice = () => {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = unitPrice * quantity;
            priceDisplay.textContent = `${formatPrice(totalPrice)} €`;
        };

        increaseBtn.addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updatePrice();
        });

        decreaseBtn.addEventListener('click', () => {
            const newQuantity = Math.max(1, parseInt(quantityInput.value) - 1);
            quantityInput.value = newQuantity;
            updatePrice();
        });
    });
});
