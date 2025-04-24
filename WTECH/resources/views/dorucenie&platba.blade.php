<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tech Sphere</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>
    <script src="{{ mix('resources/js/orderConfirmation.js') }}" defer></script>

</head>
<div id="overlay" class="overlay hidden p-10">
    <div class="modal">
        <p>Objednávka bola úspešne odoslaná</p>
        <p>Budete presmerovany na hlavnu stranku</p>
    </div>
</div>

</head>

<body class="flex flex-col min-h-screen bg-gray-50">
    <!-- Navbar -->
    @include('navbar')


    <!-- Main Content -->
    <div class="w-full flex flex-col justify-between items-center mt-16 md:mt-32 space-y-6 md:space-y-8 flex-grow px-4">
        <!-- Spôsob Doručenia -->
        <div
            class="w-full md:max-w-[65%] px-4 md:px-8 py-6 md:py-10 shadow-xl flex flex-col gap-6 rounded-lg bg-white border border-gray-300">
            <h3 class="text-xl md:text-2xl font-semibold text-center text-gray-800">Spôsob doručenia</h3>
            <form class="space-y-4 md:space-y-6">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="adresa" name="sposob_dorucenia"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="adresa" class="text-base md:text-lg font-medium text-gray-700">Na adresu</label>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="balikobox" name="sposob_dorucenia"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="balikobox" class="text-base md:text-lg font-medium text-gray-700">Balikobox</label>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="posta" name="sposob_dorucenia"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="posta" class="text-base md:text-lg font-medium text-gray-700">Na poštu</label>
                </div>
            </form>
        </div>

        <!-- Spôsob Platby -->
        <div
            class="w-full md:max-w-[65%] px-4 md:px-8 py-6 md:py-10 shadow-xl flex flex-col gap-6 rounded-lg bg-white border border-gray-300">
            <h3 class="text-xl md:text-2xl font-semibold text-center text-gray-800">Spôsob platby</h3>
            <form class="space-y-4 md:space-y-6">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="hotovost" name="sposob_platby"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="hotovost" class="text-base md:text-lg font-medium text-gray-700">Platba v
                        hotovosti</label>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="prevod_ucet" name="sposob_platby"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="prevod_ucet" class="text-base md:text-lg font-medium text-gray-700">Prevod na
                        účet</label>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="apple_pay" name="sposob_platby"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="apple_pay" class="text-base md:text-lg font-medium text-gray-700">Apple Pay</label>
                </div>
                <div class="flex items-center space-x-2 md:space-x-3">
                    <input type="radio" id="google_pay" name="sposob_platby"
                        class="h-4 w-4 md:h-5 md:w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="google_pay" class="text-base md:text-lg font-medium text-gray-700">Google Pay</label>
                </div>
            </form>
        </div>



        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE') <!-- This makes the form send a DELETE request -->
            <div class="w-auto p-4 flex justify-center">
                <button id="potvrditButton"
                    class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-[120px] transition">Potvrdiť
                    objednávku</button>
            </div>
        </form>


        <script>
            document.getElementById("potvrditButton").addEventListener("click", function () {
                // Check if the user is logged in using a server-side check
                const userId = {{ auth()->check() ? Auth::user()->id : 'null' }}; // Set user_id as null if not logged in

                if (userId !== null) {
                    // User is logged in, send AJAX request to clear the cart
                    fetch('/clear-cart', {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            user_id: userId // Pass the authenticated user ID
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Cart cleared:', data);
                            // Optionally handle the response, e.g., show success message or redirect
                        })
                        .catch(error => console.error('Error clearing cart:', error));
                } else {
                    // User is not logged in, you can either show a message or handle it differently
                    console.log('User is not logged in, cart will not be cleared.');
                    // Optionally, you can redirect or show a message for the user
                }
            });


        </script>



    </div>

    <!-- Footer -->
    @include('footer')

</body>

</html>