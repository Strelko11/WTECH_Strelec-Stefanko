<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <div class="flex-grow">

    <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md py-4 px-6 flex justify-between items-center z-50">
        <a href="{{ route('welcome') }}" id="company" class="text-xl font-semibold flex items-center">
            <i class="fas fa-globe mr-2"></i> TechSphere
        </a>
        <input type="text" class="w-1/2 px-4 py-2 border rounded-lg  text-white " placeholder="Search...">
        <div class="flex space-x-4">
            <a href="{{ route('kosikView') }}" class="text-white text-xl hover:scale-105 transition-transform"><i class="fas fa-shopping-cart"></i></a>

            <div class="relative group inline-block">
                <button class="text-white text-xl focus:outline-none">
                    <i class="fas fa-user"></i>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg
                opacity-0 invisible group-hover:visible group-hover:opacity-100
                transition-all duration-200 border border-gray-300 z-50">
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

    <!-- 🔹 Hlavná sekcia -->
    <div class="w-full mt-18 border-b border-gray-400 shadow-md px-15 pt-15 pb-5 bg-gray-100">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8">
                <h1 class="text-4xl font-bold text-gray-900">Prinášame budúcnosť technológií do vašich rúk.</h1>
                <p class="mt-2 text-gray-700 text-xl">Najnovšie smartfóny a tablety za skvelé ceny. Rýchle doručenie, spoľahlivosť a odborné poradenstvo. Vyberte si to najlepšie ešte dnes.</p>
            </div>
            <div class="col-span-4 flex justify-center bg-white h-40 w-40 rounded-lg border border-gray-400">
                <img src="https://static.vecteezy.com/system/resources/previews/022/722/945/non_2x/samsung-galaxy-s23-ultra-transparent-image-free-png.png" alt="">
            </div>
        </div>
    </div>

    <!-- 🔹 Telefóny -->
    <div class="w-full max-w-[90%] mx-auto px-6 py-10 border-l border-r border-gray-500 custom-shadow mt-4 rounded-md bg-gray-100">
        <h4 class="text-2xl font-bold mb-10 text-gray-900">Telefóny</h4>
        <div class="flex flex-wrap justify-center gap-10">
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 bg-white   rounded bg-[url('https://pngimg.com/d/iphone16_PNG38.png')] bg-contain bg-no-repeat   bg-center"></div>
                    <span class="text-2xl">iPhone</span>
                </div>
            </a>
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 rounded bg-[url('https://s7d1.scene7.com/is/image/dish/S25_Icyblue_Hero_P1?$ProductBase$&fmt=webp-alpha')] bg-white  bg-contain bg-no-repeat bg-center"></div>
                    <span class="text-2xl">Samsung</span>
                </div>
            </a>
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 rounded bg-[url('https://www.geekwills.com/media/catalog/product/cache/d368225e56c0af8fed569f12698f474d/x/i/xiaomi_15.png')]  bg-white bg-contain bg-no-repeat bg-center"></div>
                    <span class="text-2xl">Xiaomi</span>
                </div>
            </a>

        </div>

        <h4 class="text-2xl font-bold mt-6 mb-10 text-gray-900">Tablety</h4>
        <div class="flex flex-wrap justify-center gap-10">
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 rounded bg-white bg-[url('https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/ipad-2022-hero-silver-wifi-select_FMT_WHH?wid=940&hei=1112&fmt=png-alpha&.v=1664387253605')] bg-contain bg-no-repeat bg-center"></div>
                    <span class="text-2xl">iPad</span>
                </div>
            </a>
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 rounded bg-white  bg-[url('https://crdms.images.consumerreports.org/prod/products/cr/models/415678-9-inch-screen-and-larger-tablets-samsung-galaxy-tab-s10-ultra-256gb-wifi-10041162.png')] bg-contain bg-no-repeat bg-center"></div>
                    <span class="text-2xl">Galaxy Tab</span>
                </div>
            </a>
            <a href="{{ route('strankaProdukty') }}">
                <div class="bg-white p-4 rounded-lg flex items-center space-x-2 shadow-md w-1/4 min-w-[380px] h-40 border border-gray-400  hover:text-black hover:scale-105 transition-transform duration-300">
                    <div class="h-38 w-38 rounded bg-white  bg-[url('https://i02.appmifile.com/73_operatorx_operatorx_opx/21/05/2024/9da572f0718c2baa9421143d9e848b48.png')] bg-contain bg-no-repeat bg-center"></div>
                    <span class="text-2xl">Xiaomi Pad</span>
                </div>
            </a>
        </div>
    </div>
    </div>

    <footer class="text-center py-4 bg-gray-900 mt-6 border-t  text-white">
        <p>&copy; 2025 TechSphere. Všetky práva vyhradené.</p>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
