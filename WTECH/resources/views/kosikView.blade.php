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

    <!-- Product Section -->
    <div class="mb-10 w-full max-w-[90%] h-auto mx-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow mt-22 flex items-center justify-start rounded-md relative">
        <div id="Produkt" class="h-35 w-35 bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-contain bg-no-repeat bg-center"></div>
        <button class="quantity-btn" id="decrease">−</button>
        <input type="text" id="quantity" value="1" readonly>
        <button class="quantity-btn" id="increase">+</button>
    </div>

    <!-- Main div-->
    <div class="w-full max-w-[90%] h-auto mx-auto py-10 flex gap-6 justify-between rounded-md relative">
        <!-- Kontaktne udaje -->
        <div class="w-full sm:max-w-[48%] h-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow flex flex-col gap-4 rounded-md relative">
            <form action="#" class="space-y-4">
                <div class="flex items-center">
                    <label for="meno" class="w-28 text-sm font-medium">Meno</label>
                    <input type="text" id="meno" name="meno" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="priezvisko" class="w-28 text-sm font-medium">Priezvisko</label>
                    <input type="text" id="priezvisko" name="priezvisko" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="email" class="w-28 text-sm font-medium">E-mail</label>
                    <input type="email" id="email" name="email" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="telefon" class="w-28 text-sm font-medium">Telefón</label>
                    <input type="tel" id="telefon" name="telefon" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="cislo-domu" class="w-28 text-sm font-medium">Číslo domu</label>
                    <input type="text" id="cislo-domu" name="cislo-domu" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="obec" class="w-28 text-sm font-medium">Obec</label>
                    <input type="text" id="obec" name="obec" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex items-center">
                    <label for="psc" class="w-28 text-sm font-medium">PSČ</label>
                    <input type="text" id="psc" name="psc" class="w-full rounded-md border border-gray-400 h-12 px-3">
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">Skontrolovat udaje</button>
                </div>
            </form>
        </div>




        <!-- Vyber sposobu dorucenia -->
        <div class="w-full sm:max-w-[48%] h-auto px-4 py-10 border-l border-r border-gray-400 custom-shadow flex gap rounded-md relative">
            <form action="#">
                <div>
                    <label for="meno" class="block text-sm font-medium ml-10">Meno
                        <input type="text" id="meno" name="meno" class="rounded-md border border-color-grey h-10 p-2 mr-10">
                    </label>
                </div>
                <div>
                    <label for="priezvisko" class="block text-sm font-medium">Priezvisko
                        <input type="text" id="priezvisko" name="priezvisko" class="rounded-md border border-color-grey h-10 p-2">
                    </label>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
