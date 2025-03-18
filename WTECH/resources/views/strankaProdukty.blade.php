<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col min-h-screen bg-gray-100">



    <div class="flex-grow">
    <!-- 🔹 Navigačný panel -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <a href="{{ route('welcome') }}" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere
        </a>
        <input type="text" class="w-1/2 px-4 py-2 border rounded-lg" placeholder="Search...">
        <div class="flex space-x-4">
            <a href="#" class="text-gray-700 text-xl"><i class="fas fa-shopping-cart"></i></a>
            <a href="#" class="text-gray-700 text-xl"><i class="fas fa-user"></i></a>
        </div>
    </nav>


    <!-- 🔹 Hlavná sekcia -->
    <div class="w-full mt-24 border-b border-gray-400 shadow-md px-15  pt-15  pb-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8">
                <h1 class="text-4xl font-bold">Prinášame budúcnosť technológií do vašich rúk.</h1>
                <p class="mt-2 text-gray-600 text-xl ">Najnovšie smartfóny a tablety za skvelé ceny. Rýchle doručenie, spoľahlivosť a odborné poradenstvo. Vyberte si to najlepšie ešte dnes.</p>
            </div>
            <div class="col-span-4 flex justify-center  bg-gray-300 h-40 w-40 rounded-lg">
                <img src="https://static.vecteezy.com/system/resources/previews/022/722/945/non_2x/samsung-galaxy-s23-ultra-transparent-image-free-png.png" alt="">
            </div>
        </div>
    </div>

    <div class="flex flex-wrap justify-center gap-6 my-6">
        <!-- Filtrovanie podľa ceny -->
        <div>
            <label for="priceFilter" class="text-lg font-semibold">Cena:</label>
            <select id="priceFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky ceny</option>
                <option value="low">Do 500 €</option>
                <option value="mid">500 € - 1000 €</option>
                <option value="high">1000 € a viac</option>
            </select>
        </div>

        <!-- Filtrovanie podľa série -->
        <div>
            <label for="seriesFilter" class="text-lg font-semibold">Séria:</label>
            <select id="seriesFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky série</option>
                <option value="iphone-16">iPhone 16</option>
                <option value="samsung-s24">iPhone 15</option>
                <option value="xiaomi-15">iPhone 14</option>
            </select>
        </div>

        <!-- Filtrovanie podľa kapacity úložiska -->
        <div>
            <label for="storageFilter" class="text-lg font-semibold">Úložisko:</label>
            <select id="storageFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky kapacity</option>
                <option value="64">64 GB</option>
                <option value="128">128 GB</option>
                <option value="256">256 GB</option>
                <option value="512">512 GB</option>
                <option value="1tb">1 TB</option>
            </select>
        </div>

        <!-- Filtrovanie podľa RAM -->
        <div>
            <label for="ramFilter" class="text-lg font-semibold">RAM:</label>
            <select id="ramFilter" class="px-4 py-2 border rounded-lg">
                <option value="all">Všetky veľkosti</option>
                <option value="4">4 GB</option>
                <option value="6">6 GB</option>
                <option value="8">8 GB</option>
                <option value="12">12 GB</option>
            </select>
        </div>
    </div>

    <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-400 custom-shadow ">
        <h4 class="text-2xl font-bold mb-10">Telefóny iPhone</h4>
        <div class="flex flex-wrap justify-center gap-10">
            <a href="strankaProdukty" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4">
                            <button class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Kúpiť
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="strankaProdukty" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4">
                            <button class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Kúpiť
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            <a href="strankaProdukty" class="w-full md:w-4/5">
                <div class="bg-gray-300 p-4 rounded-lg flex flex-col md:flex-row items-center shadow-md w-full min-w-[300px] h-auto gap-4">
                    <div class="flex space-x-4">
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                        <div class="h-38 w-38 bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat bg-center bg-gray-500 rounded"></div>
                    </div>
                    <div class="ml-6 flex flex-col text-center md:text-left text-black text-lg w-full">
                        <span class="font-bold">iPhone 16 Pro Max 256 GB čierny titán</span>
                        <span>Séria: 16</span>
                        <span>Cena: 1449 €</span>
                        <div class="flex justify-center md:justify-start w-full">
                            <span>Pamäť: 256GB</span>
                            <span class="ml-4">RAM: 8GB</span>
                        </div>
                        <div class="w-full flex justify-center md:justify-end mt-4">
                            <button class="bg-gray-400 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-500 flex justify-center w-[120px]">
                                Kúpiť
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>







    </div>


    <footer class="text-center py-4 bg-gray-200 mt-6 border-t">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
