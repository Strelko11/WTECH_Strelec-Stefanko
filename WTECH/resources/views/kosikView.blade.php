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
<body class="flex-grow">

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md py-4 px-6 flex justify-between items-center z-50">
        <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere
        </a>
        <input type="text" class="w-1/2 px-4 py-2 border rounded-lg  text-white " placeholder="Search...">
        <div class="flex space-x-4">
            <a href="{{ route('kosikView') }}" class="text-white text-xl"><i class="fas fa-shopping-cart"></i></a>

            <div class="relative group">
                <button class="text-white text-xl focus:outline-none">
                    <i class="fas fa-user"></i>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 border border-gray-300">
                    <div class="px-4 py-3 text-sm text-black">
                        <div>Meno používateľa</div>
                        <div class="font-medium truncate">E-mail používateľa</div>
                    </div>
                    <a href="{{ route('loginForm') }}" class="block px-4 py-2 hover:bg-gray-300 rounded-t-lg">Prihlásiť sa</a>
                    <a href="{{ route('adminObrazovka') }}" class="block px-4 py-2 hover:bg-gray-300">Admin</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-300 rounded-b-lg">Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Product Section -->
    <section class="mt-32 w-full max-w-4xl mx-auto px-6 py-8 bg-white rounded-lg shadow-lg flex items-center justify-start gap-6">
        <div id="Produkt" class="h-36 w-36 bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-contain bg-no-repeat bg-center rounded-md"></div>
        <div class="flex items-center space-x-4">
            <button class="quantity-btn" id="decrease">−</button>
            <input type="text" id="quantity" value="1" readonly class="w-16 text-center border border-gray-300 rounded-md py-2 px-4 text-xl">
            <button class="quantity-btn" id="increase">+</button>
        </div>
        <div class="ml-6 flex flex-col text-center md:text-left text-gray-900 text-lg w-full">
            <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
            <span>Séria: 16</span>
            <span>Cena: 1449 €</span>
            <div class="flex justify-center md:justify-start w-full">
                <span>Pamäť: 256GB</span>
                <span class="ml-4">RAM: 8GB</span>
            </div>

        </div>
    </section>

    <!-- Contact Form -->
    <div class="w-full max-w-4xl mx-auto py-10 px-6 bg-white rounded-lg shadow-lg mt-8">
        <form action="{{ route('dorucenie&platba') }}" method="GET" class="space-y-6">
            <div class="flex items-center">
                <label for="meno" class="w-32 text-sm font-medium text-gray-700">Meno</label>
                <input type="text" id="meno" name="meno" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="priezvisko" class="w-32 text-sm font-medium text-gray-700">Priezvisko</label>
                <input type="text" id="priezvisko" name="priezvisko" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="email" class="w-32 text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="telefon" class="w-32 text-sm font-medium text-gray-700">Telefón</label>
                <input type="tel" id="telefon" name="telefon" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="cislo-domu" class="w-32 text-sm font-medium text-gray-700">Číslo domu</label>
                <input type="text" id="cislo-domu" name="cislo-domu" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="obec" class="w-32 text-sm font-medium text-gray-700">Obec</label>
                <input type="text" id="obec" name="obec" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex items-center">
                <label for="psc" class="w-32 text-sm font-medium text-gray-700">PSČ</label>
                <input type="text" id="psc" name="psc" class="w-full rounded-md border border-gray-300 h-12 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition text-center">
                Potvrdiť
            </button>

        </form>
    </div>
</body>
<footer class="mt-auto text-center py-4 bg-gray-900 border-t text-white">
    <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
</footer>
</html>
