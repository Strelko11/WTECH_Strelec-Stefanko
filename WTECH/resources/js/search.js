// Get elements
const searchButton = document.getElementById('searchButton');
const searchInput = document.getElementById('searchInput');
const navbarElements = document.querySelectorAll('.navbar-element'); // Elements to hide

// Function to show search input
function showSearchInput() {
    searchInput.classList.remove('hidden');
    searchInput.classList.add('transition-all', 'duration-300', 'ease-in-out', 'w-full');
    searchInput.style.width = '0'; // Initially set width to 0
    setTimeout(() => {
        searchInput.style.width = '100vw'; // Set max-width to 100% of the screen width
    }, 50);

    // Hide navbar elements
    navbarElements.forEach(element => element.classList.add('invisible'));

    searchInput.focus(); // Focus on the input
}

// Function to hide search input
function hideSearchInput() {
    searchInput.classList.add('hidden');
    searchInput.style.width = '0'; // Reset width to 0 when hiding

    // Show navbar elements
    navbarElements.forEach(element => element.classList.remove('invisible'));
}

// Add click event to search button (magnifying glass)
searchButton.addEventListener('click', () => {
    if (searchInput.classList.contains('hidden')) {
        showSearchInput();
    } else {
        hideSearchInput();
    }
});

// Optional: Close the search input if the user clicks outside
document.addEventListener('click', (event) => {
    if (!searchButton.contains(event.target) && !searchInput.contains(event.target)) {
        hideSearchInput();
    }
});
