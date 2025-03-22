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

</head>
<body class="flex flex-col min-h-screen bg-gray-100">
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


    <!-- Main div -->
    <div class="w-full max-w-[90%] h-auto mx-auto py-10 flex flex-col gap-6 rounded-md relative">

        <!-- Screen 1: Spôsob Doručenia -->
        <div class="screen-section w-full sm:max-w-[48%] h-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow flex flex-col gap-4 rounded-md relative">
            <h3 class="text-xl font-medium">Spôsob doručenia</h3>
            <form class="space-y-4">
                <div class="flex items-center">
                    <label for="adresa" class="w-28 text-sm font-medium">Na adresu</label>
                    <input type="radio" id="adresa" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                </div>
                <div class="flex items-center">
                    <label for="balikobox" class="w-28 text-sm font-medium">Balikobox</label>
                    <input type="radio" id="balikobox" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                </div>
                <div class="flex items-center">
                    <label for="posta" class="w-28 text-sm font-medium">Na poštu</label>
                    <input type="radio" id="posta" name="sposob_dorucenia" class="h-5 w-5 text-blue-600">
                </div>
            </form>
        </div>

        <!-- Screen 2: Spôsob Platby -->
        <div class="screen-section w-full sm:max-w-[48%] h-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow flex flex-col gap-4 rounded-md relative">
            <h3 class="text-xl font-medium">Spôsob platby</h3>
            <form class="space-y-4">
                <div class="flex items-center">
                    <label for="hotovost" class="w-28 text-sm font-medium">Platba v hotovosti</label>
                    <input type="radio" id="hotovost" name="sposob_platby" class="h-5 w-5 text-blue-600">
                </div>
                <div class="flex items-center">
                    <label for="prevod_ucet" class="w-28 text-sm font-medium">Prevod na účet</label>
                    <input type="radio" id="prevod_ucet" name="sposob_platby" class="h-5 w-5 text-blue-600">
                </div>
                <div class="flex items-center">
                    <label for="apple_pay" class="w-28 text-sm font-medium">Apple Pay</label>
                    <input type="radio" id="apple_pay" name="sposob_platby" class="h-5 w-5 text-blue-600">
                </div>
                <div class="flex items-center">
                    <label for="google_pay" class="w-28 text-sm font-medium">Google Pay</label>
                    <input type="radio" id="google_pay" name="sposob_platby" class="h-5 w-5 text-blue-600">
                </div>
            </form>
        </div>

    </div>

    <!-- Odoslat Objednavku Button -->
    <div class="w-full fixed bottom-0 left-0 p-4 bg-white border-t border-gray-400 shadow-lg flex justify-center">
        <button class="bg-blue-600 text-white px-10 py-3 rounded-md hover:bg-blue-700 transition">Odoslať objednávku</button>
    </div>

</body>
</html>
