document.addEventListener("DOMContentLoaded", function () {
    const potvrditButton = document.getElementById("potvrditButton");  // The button to confirm the order
    const overlay = document.getElementById("overlay");

    if (potvrditButton) {
        potvrditButton.addEventListener("click", function () {
            // Show the modal (overlay + modal)
            overlay.classList.remove("hidden");

            // Hide the modal and redirect after 3 seconds
            setTimeout(() => {
                overlay.classList.add("hidden");
                window.location.href = "/"; // Redirect to the main page
            }, 3000);
        });
    }
});
