const images = [
    "https://image.alza.cz/products/RI051c4/RI051c4.jpg?width=2000&height=2000",
    "https://image.alza.cz/products/RI051c4/RI051c4-01.jpg?width=2000&height=2000",
    "https://image.alza.cz/products/RI051c4/RI051c4-02.jpg?width=1400&height=1400",
    "https://image.alza.cz/products/RI051c4/RI051c4-03.jpg?width=1400&height=1400"
];


let currentIndex = 0;
const modal = document.getElementById("gallery-modal");
const modalImage = document.getElementById("gallery-image");
const imageCounter = document.getElementById("image-counter"); // Element pre číslo obrázka
const mainImage = document.getElementById("main-image");

function openGallery() {
    modalImage.src = images[currentIndex];
    modal.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");
    // Aktualizuj číslo obrázka pri otvorení
    updateImageCounter();

    setTimeout(() => {
        modal.classList.add("active");
    }, 10);
}

function updateImageCounter() {
    imageCounter.textContent = `${currentIndex + 1} / ${images.length}`;
}

function changeImage(index) {
    mainImage.classList.remove("active");

    setTimeout(() => {
        currentIndex = index;
        mainImage.src = images[currentIndex];
        mainImage.classList.add("active");
    }, 100);
}



function closeGallery() {
    modal.classList.remove("active");
    document.body.classList.remove("overflow-hidden");
    setTimeout(() => modal.classList.add("hidden"), 300);
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    animateImageChange();
    updateImageCounter(); // Aktualizácia čísla obrázka
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    animateImageChange();
    updateImageCounter(); // Aktualizácia čísla obrázka
}

function animateImageChange() {
    modalImage.classList.remove("active");

    setTimeout(() => {
        modalImage.src = images[currentIndex];
        modalImage.classList.add("active");
    }, 100);
}

// Kliknutím mimo obrázka zatvoríme modal
modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        closeGallery();
    }
});

closeGallery()




