const decreaseBtn = document.getElementById("decrease");
        const increaseBtn = document.getElementById("increase");
        const quantityInput = document.getElementById("quantity");

        decreaseBtn.addEventListener("click", (event) => {
            event.preventDefault(); // Zabráni nežiaducemu dvojitému kliknutiu
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener("click", (event) => {
            event.preventDefault(); // Zabráni nežiaducemu dvojitému kliknutiu
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
