<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Sphere</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>
    <script src="{{ mix('resources/js/orderConfirmation.js') }}" defer></script>

</head>


    <div id="overlay" class="overlay hidden">
        <div class="modal">
         <p>Objednávka bola úspešne odoslaná</p>
         <p>Budete presmerovany na hlavnu stranku</p>
        </div>
    </div>


<body class="flex flex-col min-h-screen bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex justify-between items-center z-50">
        <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere
        </a>
        <input type="text" class="w-1/2 px-4 py-2 border rounded-lg" placeholder="Search...">
        <div class="flex space-x-4">
            <a href="{{ route('kosikView') }}" class="text-gray-700 text-xl"><i class="fas fa-shopping-cart"></i></a>
            <a href="{{ route('loginForm') }}" class="text-gray-700 text-xl"><i class="fas fa-user"></i></a>
        </div>
    </nav>

    <!-- Main Content -->
    <!-- Container for main content -->
<div class="w-full flex flex-col justify-center items-center mt-32 space-y-6 flex-grow">
    <!-- Spôsob Doručenia -->
    <div class="w-full max-w-[65%] px-6 py-8 border border-gray-100 shadow-lg flex flex-col gap-4 rounded-md bg-white">
        <h3 class="text-xl font-medium text-center">Spôsob doručenia</h3>
        <form class="space-y-4">
            <div class="flex items-center">
                <input type="radio" id="adresa" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                <label for="adresa" class="ml-2 text-sm font-medium">Na adresu</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="balikobox" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                <label for="balikobox" class="ml-2 text-sm font-medium">Balikobox</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="posta" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                <label for="posta" class="ml-2 text-sm font-medium">Na poštu</label>
            </div>
        </form>
    </div>

    <!-- Spôsob Platby -->
    <div class="w-full max-w-[65%] px-6 py-8 border border-gray-100 shadow-lg flex flex-col gap-4 rounded-md bg-white">
        <h3 class="text-xl font-medium text-center">Spôsob platby</h3>
        <form class="space-y-4">
            <div class="flex items-center">
                <input type="radio" id="hotovost" name="sposob_platby" class="h-5 w-5 text-blue-600">
                <label for="hotovost" class="ml-2 text-sm font-medium">Platba v hotovosti</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="prevod_ucet" name="sposob_platby" class="h-5 w-5 text-blue-600">
                <label for="prevod_ucet" class="ml-2 text-sm font-medium">Prevod na účet</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="apple_pay" name="sposob_platby" class="h-5 w-5 text-blue-600">
                <label for="apple_pay" class="ml-2 text-sm font-medium">Apple Pay</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="google_pay" name="sposob_platby" class="h-5 w-5 text-blue-600">
                <label for="google_pay" class="ml-2 text-sm font-medium">Google Pay</label>
            </div>
        </form>
    </div>

    <!-- Odoslať Objednávku Button (Now placed below the second div) -->
    <!-- Potvrdiť objednávku Button -->
    <div class="w-full fixed bottom-0 left-0 p-4 bg-white border-t border-gray-400 shadow-lg flex justify-center">
        <button id="potvrditButton" class="bg-blue-600 text-white px-10 py-3 rounded-md hover:bg-blue-700 transition">Potvrdiť objednávku</button>
    </div>

</div>

</body>
<footer class="mt-auto text-center py-4 bg-gray-900 border-t text-white">
    <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
</footer>
</html>
