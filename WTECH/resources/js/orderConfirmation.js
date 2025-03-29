document.addEventListener("DOMContentLoaded", function () {
    const potvrditButton = document.getElementById("potvrditButton");
    const overlay = document.getElementById("overlay");

    if (potvrditButton) {
        potvrditButton.addEventListener("click", function () {

            overlay.classList.remove("hidden");


            setTimeout(() => {
                overlay.classList.add("hidden");
                window.location.href = "/";
            }, 3000);
        });
    }
});
