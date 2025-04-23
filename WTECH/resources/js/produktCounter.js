document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('quantity');
    const formQuantity = document.getElementById('form-quantity');
    document.getElementById('increase').addEventListener('click', () => {
        input.value = parseInt(input.value) + 1;
        formQuantity.value = input.value;
    });
    document.getElementById('decrease').addEventListener('click', () => {
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            formQuantity.value = input.value;
        }
    });
});
