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

    <!-- Contact Section -->
    <div class="w-full max-w-[90%] h-auto mx-auto py-10 flex gap-6 justify-between rounded-md relative">
        <!-- First Form Div -->
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

        <!-- Second Form Div -->
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
