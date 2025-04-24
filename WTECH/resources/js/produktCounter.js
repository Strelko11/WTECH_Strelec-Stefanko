document.addEventListener('DOMContentLoaded', () => {
    const formatPrice = (value) => {
        return value.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    };

    const increaseBtn = document.querySelector('#increase');
    const decreaseBtn = document.querySelector('#decrease');
    const quantityInput = document.querySelector('#quantity');
    const quantityHiddenInput = document.querySelector('#quantity-input'); // Hidden input for quantity
    const priceDisplay = document.getElementById('total-price'); // Price display element

    const unitPrice = parseFloat(priceDisplay.dataset.unitPrice); // Get the unit price from Blade via data attribute

    const updatePrice = () => {
        const quantity = parseInt(quantityInput.value);
        const totalPrice = unitPrice * quantity;
        priceDisplay.textContent = `${formatPrice(totalPrice)} €`;
    };

    increaseBtn.addEventListener('click', () => {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        quantityHiddenInput.value = quantityInput.value; // Update hidden input for the quantity
        updatePrice();
    });

    decreaseBtn.addEventListener('click', () => {
        const newQuantity = Math.max(1, parseInt(quantityInput.value) - 1);
        quantityInput.value = newQuantity;
        quantityHiddenInput.value = quantityInput.value; // Update hidden input for the quantity
        updatePrice();
    });
});
