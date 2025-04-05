<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Sphere</title>


    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/produktCounter.js') }}" defer></script>

</head>
<body class="flex-grow bg-gray-50">


   @include('navbar')


    <section class="mt-32 w-full max-w-4xl mx-auto px-6 py-8 bg-white rounded-lg custom-shadow flex items-center justify-start gap-6  border-l border-r border-gray-500">
        <div id="Produkt" class="h-36 w-36 bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-contain bg-no-repeat bg-center rounded-md"></div>
        <div class="flex items-center space-x-4">
            <button class="quantity-btn" id="decrease">−</button>
            <input type="text" id="quantity" value="1" readonly class="w-16 text-center border border-gray-300 rounded-md py-2 px-4 text-xl">
            <button class="quantity-btn" id="increase">+</button>
        </div>
        <div class="ml-6 flex flex-col text-center md:text-left text-gray-900 text-lg w-full">
            <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
            <span>Séria: 16</span>
            <div class="flex justify-center md:justify-start w-full">
                <span>Pamäť: 256GB</span>
                <span class="ml-4">RAM: 8GB</span>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <span class="font-semibold text-lg text-gray-700">Cena:</span>
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-black p-3 rounded-lg shadow-md font-medium text-xl border border-gray-200">
                1500€
            </div>
        </div>

    </section>


    <div class="w-full max-w-4xl mx-auto py-10 px-6 bg-white rounded-lg custom-shadow mt-8 border-l border-r border-gray-500">
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
                <label for="telefon" class="w-32 text-sm font-medium text-gray-700">Ulica</label>
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
            <button type="submit" class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-800 flex justify-center w-[120px] transition text-center">
                Potvrdiť
            </button>

        </form>
    </div>
</body>
@include('footer')
</html>
